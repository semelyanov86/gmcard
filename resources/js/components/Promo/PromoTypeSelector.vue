<script setup lang="ts">
import type { PromoTypeModel } from '@/types';
import { ref } from 'vue';

interface Props {
    selectedPromo: number;
    promoTypes: PromoTypeModel[];
}

interface Emits {
    (e: 'update:selectedPromo', value: number): void;
}

const props = defineProps<Props>();
const emit = defineEmits<Emits>();

const hoveredPromo = ref<number | null>(null);
const activeTooltip = ref<number | null>(null);

function selectPromo(id: number) {
    emit('update:selectedPromo', id);
}

function getPromoClasses(id: number) {
    const isSelected = props.selectedPromo === id;
    const isHovered = hoveredPromo.value === id;

    const isLarge = id <= 3;
    const sizeClasses = isLarge ? 'promo-block-large' : 'promo-block-small';

    let colorClasses = '';

    if (isSelected) {
        colorClasses = `bgColor${id}`;
    } else if (isHovered) {
        colorClasses = id === 1 ? 'bgColor1' : `promo_hover${id}`;
    } else {
        colorClasses = `promo_image${id}`;
    }

    const blockType = isLarge ? 'promo_blocks' : 'promo_blocks2';

    return `${blockType} ${sizeClasses} rounded-2xl relative flex justify-center cursor-pointer ${colorClasses}`;
}

function showTooltip(id: number) {
    activeTooltip.value = id;
}

function hideTooltip() {
    activeTooltip.value = null;
}
</script>

<template>
    <div class="mt-4 flex flex-wrap justify-between gap-4 rounded-2xl bg-white p-8 md:mt-8 md:gap-2 md:p-4">
        <div
            v-for="promo in promoTypes"
            :key="promo.id"
            :id="`promo${promo.id}`"
            :class="getPromoClasses(promo.id)"
            @mouseenter="hoveredPromo = promo.id"
            @mouseleave="hoveredPromo = null"
            @click="selectPromo(promo.id)"
        >
            <span class="text-bottom absolute bottom-4 text-base font-bold">{{ promo.title }}</span>
            <span
                @mouseenter="showTooltip(promo.id)"
                @mouseleave="hideTooltip"
                class="absolute top-2 right-4 cursor-pointer rounded-full bg-white px-2 py-0.5 text-xs hover:bg-gray-100"
            >
                ?
            </span>
            <div
                v-show="activeTooltip === promo.id"
                role="tooltip"
                class="absolute top-8 right-0 z-10 inline-block w-80 rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white shadow-sm"
            >
                {{ promo.description }}
            </div>
        </div>
    </div>
</template>
