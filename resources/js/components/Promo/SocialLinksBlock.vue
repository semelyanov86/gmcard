<script setup lang="ts">
import TrashIcon from '@/components/primitives/icons/TrashIcon.vue';
import type { SocialNetworkModel } from '@/types';
import { computed, ref, watch } from 'vue';
import ToggleSwitch from './ToggleSwitch.vue';

const props = defineProps<{
    socialNetworks: SocialNetworkModel[];
    modelValue: Record<string, string[]>;
}>();

const emit = defineEmits<{
    'update:modelValue': [value: Record<string, string[]>];
}>();

const hasData = Object.keys(props.modelValue).some(key => props.modelValue[key]?.length > 0);
const isOpen = ref(hasData);

const visibleNetworksState = ref<Record<string, boolean>>(
    Object.fromEntries(
        props.socialNetworks.map((network) => [
            network.id,
            props.modelValue[network.id]?.some((link: string) => link.trim()) ?? false
        ])
    )
);

const links = computed<Record<string, string[]>>(() =>
    Object.fromEntries(
        props.socialNetworks.map((network) => [network.id, props.modelValue[network.id]?.length ? [...props.modelValue[network.id]] : ['']]),
    ),
);

const visibleNetworks = computed<Record<string, boolean>>(() => visibleNetworksState.value);

const showInstagramWarning = computed(() => visibleNetworks.value.ins && links.value.ins?.some((v) => v.trim()));

function updateLink(networkId: string, index: number, value: string) {
    const updated = { ...links.value };
    updated[networkId] = [...updated[networkId]];
    updated[networkId][index] = value;
    emit('update:modelValue', Object.fromEntries(Object.entries(updated).map(([id, vals]) => [id, vals.filter(Boolean)])));
}

function toggleVisibility(networkId: string) {
    if (!isOpen.value) {
        isOpen.value = true;
    }
    
    visibleNetworksState.value[networkId] = !visibleNetworksState.value[networkId];
    
    if (!visibleNetworksState.value[networkId]) {
        const updated = { ...links.value };
        updated[networkId] = [];
        emit('update:modelValue', Object.fromEntries(Object.entries(updated).map(([id, vals]) => [id, vals.filter(Boolean)])));
    }
}

function addLink(networkId: string) {
    const updated = { ...links.value };
    updated[networkId] = [...updated[networkId], ''];
    emit('update:modelValue', Object.fromEntries(Object.entries(updated).map(([id, vals]) => [id, vals.filter(Boolean)])));
}

function removeLink(networkId: string, index: number) {
    const updated = { ...links.value };
    if (updated[networkId].length > 1) {
        updated[networkId] = updated[networkId].filter((_, i) => i !== index);
    } else {
        updated[networkId] = [];
        visibleNetworksState.value[networkId] = false;
    }
    emit('update:modelValue', Object.fromEntries(Object.entries(updated).map(([id, vals]) => [id, vals.filter(Boolean)])));
}

watch(isOpen, (newValue) => {
    if (!newValue) {
        const emptyLinks: Record<string, string[]> = {};
        props.socialNetworks.forEach(network => {
            emptyLinks[network.id] = [];
        });
        emit('update:modelValue', emptyLinks);
        
        props.socialNetworks.forEach(network => {
            visibleNetworksState.value[network.id] = false;
        });
    }
});
</script>

<template>
    <div class="mt-8 flex flex-col rounded-2xl bg-white p-8 max-md:p-4" id="devyatyi">
        <div class="flex flex-row items-center justify-between max-md:flex-col max-md:items-start">
            <h3 class="mr-4 font-bold max-md:mr-0 max-md:mb-4">При наличии, добавьте ссылки на ваш сайт или страницы в соцсетях.</h3>
            <ToggleSwitch v-model="isOpen" />
        </div>
        <div v-show="isOpen" class="my-4" id="allSocial">
            <div class="h-px w-full bg-black/30"></div>

            <div class="mt-6 flex flex-wrap gap-3">
                <div
                    v-for="network in socialNetworks"
                    :key="network.id"
                    @click="isOpen ? toggleVisibility(network.id) : null"
                    class="flex items-center rounded-md bg-slate-100 px-3 py-2"
                    :class="!isOpen ? 'opacity-50 cursor-not-allowed' : 'cursor-pointer'"
                    :id="`soc${network.id}`"
                >
                    <img :src="network.icon" :alt="network.name" />
                    <span class="ml-1 text-base max-sm:text-sm">{{ network.name }}</span>
                </div>

                <div v-if="showInstagramWarning" class="mt-4 text-xs text-gray-500">
                    Instagram - соцсеть принадлежит компании Meta, признанной экстремистской и запрещенной на территории России
                </div>
            </div>

            <div class="mt-6">
                <div v-for="network in socialNetworks" :key="`${network.id}-inputs`" v-show="visibleNetworks[network.id]" :id="`${network.id}Div`">
                    <div
                        v-for="(link, index) in links[network.id] ?? []"
                        :key="`${network.id}-${index}`"
                        class="mt-4 flex flex-row items-center gap-4 max-md:flex-col max-md:items-start"
                    >
                        <div class="relative">
                            <div class="absolute top-3 left-2 flex items-center">
                                <img :src="network.icon" :alt="network.name" />
                            </div>
                            <input
                                :value="link"
                                @input="updateLink(network.id, index as number, ($event.target as HTMLInputElement).value)"
                                type="text"
                                :disabled="!isOpen || !visibleNetworks[network.id]"
                                class="link_url link_social max-w-md rounded-md ring-black/30 pr-12 max-md:w-full"
                                :class="{ 'opacity-50 cursor-not-allowed': !isOpen || !visibleNetworks[network.id] }"
                                :placeholder="network.placeholder"
                            />
                            <div class="left_del absolute top-1 right-9 h-9 w-0.5 bg-black/30"></div>
                            <TrashIcon
                                @click.stop="(isOpen && visibleNetworks[network.id]) ? removeLink(network.id, index as number) : null"
                                :custom-class="`left_delSvg absolute right-1 top-2 h-6 w-6 text-black/50 ${
                                    isOpen && visibleNetworks[network.id] 
                                        ? 'cursor-pointer hover:text-black/30' 
                                        : 'cursor-not-allowed opacity-50'
                                }`"
                            />
                        </div>
                        <span
                            v-if="index === (links[network.id] ?? []).length - 1 && (links[network.id] ?? []).length < 2"
                            @click="(isOpen && visibleNetworks[network.id]) ? addLink(network.id) : null"
                            class="text-sm"
                            :class="isOpen && visibleNetworks[network.id] 
                                ? 'cursor-pointer text-blue-700 hover:text-orange-800' 
                                : 'cursor-not-allowed opacity-50 text-gray-400'"
                            >+ еще {{ network.name }}</span
                        >
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
