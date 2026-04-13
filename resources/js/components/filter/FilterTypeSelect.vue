<script setup lang="ts">
import type { PromoTypeModel } from '@/types';
import { computed, onMounted, onUnmounted, ref } from 'vue';

const props = defineProps<{
    promoTypes: PromoTypeModel[];
    modelValue: number | null;
}>();

const emit = defineEmits<{
    (e: 'update:modelValue', value: number | null): void;
}>();

const promoTypeOpen = ref(false);
const promoTypeRoot = ref<HTMLElement | null>(null);

const selectPromoTypeTitle = computed(() => {
    if (props.modelValue === null) {
        return 'Все';
    }
    return props.promoTypes.find((t) => t.id === props.modelValue)?.title ?? 'Все';
});

function togglePromoTypeOpen() {
    promoTypeOpen.value = !promoTypeOpen.value;
}

function selectPromoType(type: PromoTypeModel) {
    emit('update:modelValue', type.id);
    promoTypeOpen.value = false;
}

function selectAllPromoTypes() {
    emit('update:modelValue', null);
    promoTypeOpen.value = false;
}

function onDocumentClick(e: MouseEvent) {
    if (!(e.target instanceof Node)) {
        return;
    }
    if (promoTypeRoot.value && !promoTypeRoot.value.contains(e.target)) {
        promoTypeOpen.value = false;
    }
}

onMounted(() => document.addEventListener('click', onDocumentClick));
onUnmounted(() => document.removeEventListener('click', onDocumentClick));
</script>

<template>
    <div class="gapper filter_inp relative flex items-center gap-6">
        <label for="sale" class="text-base text-white">Вид акции</label>
        <div ref="promoTypeRoot" class="selected_block relative inline-block h-12">
            <div
                class="custom_selected focus:shadow-outline flex h-12 w-52 cursor-pointer appearance-none items-center rounded-md border border-white bg-none px-4 py-2 pr-8 leading-tight text-white shadow hover:border-gray-300 focus:outline-none"
                role="button"
                tabindex="0"
                :aria-expanded="promoTypeOpen"
                @click.stop="togglePromoTypeOpen"
            >
                <div id="spaner1" class="mr-2">{{ selectPromoTypeTitle }}</div>
                <img src="/images/png/icons/down.png" class="pointer-events-none absolute top-2 right-0 mt-3 mr-2 h-1 w-2" alt="" />
            </div>
            <div
                class="custom-options_2 absolute z-40 mt-1 h-48 w-52 overflow-y-scroll rounded-b border border-gray-400 bg-white text-black shadow-lg"
                :class="{ hidden: !promoTypeOpen }"
            >
                <div
                    class="custom-option_2 cursor-pointer px-4 py-2 hover:bg-gray-200"
                    :class="{ 'filter-option-selected': props.modelValue === null }"
                    @click.stop="selectAllPromoTypes"
                >
                    Все
                </div>
                <div
                    v-for="type in props.promoTypes"
                    :key="type.id"
                    class="custom-option_2 cursor-pointer px-4 py-2 hover:bg-gray-200"
                    :class="{ 'filter-option-selected': props.modelValue === type.id }"
                    @click.stop="selectPromoType(type)"
                >
                    {{ type.title }}
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
.filter-option-selected {
    background-color: #f9d914;
}
</style>
