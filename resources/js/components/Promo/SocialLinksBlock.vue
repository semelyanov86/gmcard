<script setup lang="ts">
import TrashIcon from '@/components/primitives/icons/TrashIcon.vue';
import type { SocialNetworkModel } from '@/types';
import { computed, reactive, ref, watch } from 'vue';
import ToggleSwitch from './ToggleSwitch.vue';

interface SocialLink {
    id: string;
    value: string;
}

const props = defineProps<{
    socialNetworks: SocialNetworkModel[];
    modelValue: Record<string, string[]>;
}>();

const emit = defineEmits<{
    'update:modelValue': [value: Record<string, string[]>];
}>();

const isOpen = ref(false);

const visibilityState = reactive<Record<string, boolean>>({});
const linksState = reactive<Record<string, SocialLink[]>>({});

props.socialNetworks.forEach((network) => {
    const savedLinks = props.modelValue[network.id] || [];
    visibilityState[network.id] = savedLinks.length > 0 && savedLinks.some(link => link !== '');
    
    if (savedLinks.length > 0) {
        linksState[network.id] = savedLinks.map((value, idx) => ({
            id: `${network.id}${idx + 1}`,
            value
        }));
    } else {
        linksState[network.id] = [{ id: `${network.id}1`, value: '' }];
    }
});

const showInstagramWarning = computed(() => {
    return props.socialNetworks.some((network) => network.id === 'ins' && visibilityState[network.id]);
});

function emitChanges() {
    const result: Record<string, string[]> = {};
    props.socialNetworks.forEach((network) => {
        const links = linksState[network.id];
        result[network.id] = links.map(link => link.value).filter(value => value !== '');
    });
    emit('update:modelValue', result);
}

function toggleVisibility(networkId: string) {
    visibilityState[networkId] = !visibilityState[networkId];
}

function addLink(networkId: string) {
    const links = linksState[networkId];
    const newId = `${networkId}${links.length + 1}`;
    links.push({ id: newId, value: '' });
    emitChanges();
}

function removeLink(networkId: string, index: number) {
    const links = linksState[networkId];
    links.splice(index, 1);

    if (links.length === 0) {
        visibilityState[networkId] = false;
        links.push({ id: `${networkId}1`, value: '' });
    }
    emitChanges();
}

watch(linksState, () => {
    emitChanges();
}, { deep: true });
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
                    class="flex cursor-pointer items-center rounded-md bg-[#E5ECF0] px-3 py-2"
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
                    v-show="visibilityState[network.id]"
                    :id="`${network.id}Div`"
                >
                    <div
                        v-for="(link, index) in linksState[network.id]"
                        :key="link.id"
                        class="mt-4 flex flex-row items-center gap-4 max-md:flex-col max-md:items-start"
                    >
                        <div class="relative">
                            <div class="absolute left-2 top-3 flex items-center">
                                <img :src="network.icon" :alt="network.name" />
                            </div>
                            <input
                                v-model="link.value"
                                type="text"
                                class="link_url link_social w-[450px] rounded-md ring-black/30 max-md:w-full"
                                :placeholder="network.placeholder"
                            />
                            <div class="left_del absolute left-[415px] top-1 h-[34px] w-0.5 bg-black/30"></div>
                            <TrashIcon
                                @click="removeLink(network.id, index)"
                                custom-class="left_delSvg absolute left-[420px] top-2 h-6 w-6 cursor-pointer text-black/50 hover:text-black/30"
                            />
                        </div>
                        <span
                            v-if="index === linksState[network.id].length - 1 && linksState[network.id].length < 2"
                            @click="addLink(network.id)"
                            class="cursor-pointer text-sm text-[#0066CC] hover:text-[#993300]"
                            >+ еще {{ network.name }}</span
                        >
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
