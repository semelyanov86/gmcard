<script setup lang="ts">
import TrashIcon from '@/components/primitives/icons/TrashIcon.vue';
import type { SocialNetworkModel } from '@/types';
import { computed, ref } from 'vue';
import ToggleSwitch from './ToggleSwitch.vue';

const props = defineProps<{
    socialNetworks: SocialNetworkModel[];
    modelValue: Record<string, string[]>;
}>();

const emit = defineEmits<{
    'update:modelValue': [value: Record<string, string[]>];
}>();

const isOpen = ref(false);

const links = computed<Record<string, string[]>>(() =>
    Object.fromEntries(
        props.socialNetworks.map((network) => [
            network.id,
            props.modelValue[network.id]?.length ? [...props.modelValue[network.id]] : [''],
        ])
    )
);

const visibleNetworks = computed<Record<string, boolean>>(() =>
    Object.fromEntries(
        props.socialNetworks.map((network) => [network.id, links.value[network.id]?.some((link) => link.trim()) ?? false])
    )
);

const showInstagramWarning = computed(() => visibleNetworks.value.ins && links.value.ins?.some((v) => v.trim()));

function updateLink(networkId: string, index: number, value: string) {
    const updated = { ...links.value };
    updated[networkId] = [...updated[networkId]];
    updated[networkId][index] = value;
    emit(
        'update:modelValue',
        Object.fromEntries(Object.entries(updated).map(([id, vals]) => [id, vals.filter(Boolean)]))
    );
}

function toggleVisibility(networkId: string) {
    const updated = { ...links.value };
    if (visibleNetworks.value[networkId]) {
        updated[networkId] = [''];
    } else {
        if (!updated[networkId] || updated[networkId].length === 0) {
            updated[networkId] = [''];
        }
    }
    emit(
        'update:modelValue',
        Object.fromEntries(Object.entries(updated).map(([id, vals]) => [id, vals.filter(Boolean)]))
    );
}

function addLink(networkId: string) {
    const updated = { ...links.value };
    updated[networkId] = [...updated[networkId], ''];
    emit(
        'update:modelValue',
        Object.fromEntries(Object.entries(updated).map(([id, vals]) => [id, vals.filter(Boolean)]))
    );
}

function removeLink(networkId: string, index: number) {
    const updated = { ...links.value };
    if (updated[networkId].length > 1) {
        updated[networkId] = updated[networkId].filter((_, i) => i !== index);
    } else {
        updated[networkId] = [''];
    }
    emit(
        'update:modelValue',
        Object.fromEntries(Object.entries(updated).map(([id, vals]) => [id, vals.filter(Boolean)]))
    );
}
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
                    @click="toggleVisibility(network.id)"
                    class="flex cursor-pointer items-center rounded-md bg-slate-100 px-3 py-2"
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
                <div
                    v-for="network in socialNetworks"
                    :key="`${network.id}-inputs`"
                    v-show="visibleNetworks[network.id]"
                    :id="`${network.id}Div`"
                >
                    <div
                        v-for="(link, index) in links.value[network.id]"
                        :key="`${network.id}-${index}`"
                        class="mt-4 flex flex-row items-center gap-4 max-md:flex-col max-md:items-start"
                    >
                        <div class="relative">
                            <div class="absolute left-2 top-3 flex items-center">
                                <img :src="network.icon" :alt="network.name" />
                            </div>
                            <input
                                :value="link"
                                @input="updateLink(network.id, index, ($event.target as HTMLInputElement).value)"
                                type="text"
                                class="link_url link_social max-w-md rounded-md ring-black/30 max-md:w-full"
                                :placeholder="network.placeholder"
                            />
                            <div class="left_del absolute left-96 top-1 h-9 w-0.5 bg-black/30"></div>
                            <TrashIcon
                                @click="removeLink(network.id, index)"
                                custom-class="left_delSvg absolute left-96 top-2 h-6 w-6 cursor-pointer text-black/50 hover:text-black/30"
                            />
                        </div>
                        <span
                            v-if="index === links.value[network.id].length - 1 && links.value[network.id].length < 2"
                            @click="addLink(network.id)"
                            class="cursor-pointer text-sm text-blue-700 hover:text-orange-800"
                            >+ еще {{ network.name }}</span
                        >
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
