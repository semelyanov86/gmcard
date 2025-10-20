<script setup lang="ts">
import TrashIcon from '@/components/primitives/icons/TrashIcon.vue';
import type { SocialNetworkModel } from '@/types';
import { computed, reactive, ref, watch } from 'vue';
import ToggleSwitch from './ToggleSwitch.vue';

const props = defineProps<{
    socialNetworks: SocialNetworkModel[];
    modelValue: Record<string, string[]>;
}>();

const emit = defineEmits<{
    'update:modelValue': [value: Record<string, string[]>];
}>();

const isOpen = ref(false);

const links = reactive<Record<string, string[]>>(
    Object.fromEntries(
        props.socialNetworks.map((network) => [
            network.id,
            props.modelValue[network.id]?.length ? [...props.modelValue[network.id]] : [''],
        ])
    )
);

const visibleNetworks = reactive<Record<string, boolean>>(
    Object.fromEntries(
        props.socialNetworks.map((network) => [
            network.id,
            props.modelValue[network.id]?.some((link) => link.trim()),
        ])
    )
);

const showInstagramWarning = computed(() => visibleNetworks.ins && links.ins?.some((v) => v.trim()));

function emitChanges() {
    emit(
        'update:modelValue',
        Object.fromEntries(Object.entries(links).map(([id, vals]) => [id, vals.filter(Boolean)]))
    );
}

function toggleVisibility(networkId: string) {
    visibleNetworks[networkId] = !visibleNetworks[networkId];
}

function addLink(networkId: string) {
    links[networkId].push('');
}

function removeLink(networkId: string, index: number) {
    if (links[networkId].length > 1) {
        links[networkId].splice(index, 1);
    } else {
        links[networkId][0] = '';
        visibleNetworks[networkId] = false;
    }
    emitChanges();
}

watch(links, emitChanges, { deep: true });
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
                        v-for="(link, index) in links[network.id]"
                        :key="`${network.id}-${index}`"
                        class="mt-4 flex flex-row items-center gap-4 max-md:flex-col max-md:items-start"
                    >
                        <div class="relative">
                            <div class="absolute left-2 top-3 flex items-center">
                                <img :src="network.icon" :alt="network.name" />
                            </div>
                            <input
                                v-model="links[network.id][index]"
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
                            v-if="index === links[network.id].length - 1 && links[network.id].length < 2"
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
