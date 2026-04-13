<script setup lang="ts">
import type { DiscountFilterOptionModel } from '@/types';
import { onMounted, onUnmounted, ref } from 'vue';

const props = defineProps<{
    discountFilterOptions: DiscountFilterOptionModel[];
    modelValue: number | null;
}>();

const emit = defineEmits<{
    (e: 'update:modelValue', value: number | null): void;
}>();

const discountOpen = ref(false);
const discountRoot = ref<HTMLElement | null>(null);

function toggleDiscountOpen() {
    discountOpen.value = !discountOpen.value;
}

function selectDiscount(option: DiscountFilterOptionModel) {
    emit('update:modelValue', option.minPercent);
    discountOpen.value = false;
}

function selectAllDiscounts() {
    emit('update:modelValue', null);
    discountOpen.value = false;
}

function onDocumentClick(e: MouseEvent) {
    if (!(e.target instanceof Node)) {
        return;
    }
    if (discountRoot.value && !discountRoot.value.contains(e.target)) {
        discountOpen.value = false;
    }
}

onMounted(() => document.addEventListener('click', onDocumentClick));
onUnmounted(() => document.removeEventListener('click', onDocumentClick));
</script>

<template>
    <div class="gapper filter_inp relative flex items-center gap-6">
        <label for="shop" class="text-base text-white">Скидки</label>
        <div ref="discountRoot" class="selected_block relative inline-block h-12">
            <div
                id="custom_select"
                class="custom_select focus:shadow-outline flex h-12 w-52 cursor-pointer appearance-none items-center rounded-md border border-white bg-none px-4 py-2 pr-8 leading-tight text-white shadow hover:border-gray-300 focus:outline-none"
                role="button"
                tabindex="0"
                :aria-expanded="discountOpen"
                @click.stop="toggleDiscountOpen"
            >
                <div id="spaner" class="mr-2">
                    {{ props.modelValue ? `Не менее ${props.modelValue}%` : 'Выберите скидку' }}
                </div>
                <img src="/images/png/icons/down.png" class="pointer-events-none absolute top-2 right-0 mt-3 mr-2 h-1 w-2" alt="" />
            </div>
            <div
                class="custom-options_1 absolute z-40 mt-1 h-48 w-52 overflow-y-scroll rounded-b border border-gray-400 bg-white text-black shadow-lg"
                :class="{ hidden: !discountOpen }"
            >
                <div
                    class="custom-option_1 cursor-pointer px-4 py-2 hover:bg-gray-200"
                    :class="{ 'filter-option-selected': props.modelValue === null }"
                    @click.stop="selectAllDiscounts"
                >
                    Любая скидка
                </div>
                <div
                    v-for="opt in props.discountFilterOptions"
                    :key="opt.id"
                    class="custom-option_1 cursor-pointer px-4 py-2 hover:bg-gray-200"
                    :class="{ 'filter-option-selected': opt.minPercent === props.modelValue }"
                    @click.stop="selectDiscount(opt)"
                >
                    Не менее {{ opt.minPercent }}%
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
