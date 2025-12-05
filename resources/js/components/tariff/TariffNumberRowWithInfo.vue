<script setup lang="ts">
import TariffInfoButton from '@/components/tariff/TariffInfoButton.vue';

interface Props {
    title: string;
    freeValue: number;
    proValue: number;
    expValue: number;
}

const props = defineProps<Props>();
</script>

<template>
    <div class="features-section grid-cols-30-70 container grid items-center justify-around gap-5 rounded-3xl text-white">
        <div class="features-description col-span-1">
            <h2 class="features-title text-16 relative">
                {{ props.title }}
                <TariffInfoButton :href="route('tarif.plans.info-modal')" />
            </h2>
        </div>

        <div class="features-images col-span-1 grid h-100 grid-cols-3 gap-10">
            <div class="image-item text-18 flex h-full w-64 flex-col items-center justify-center">{{ props.freeValue }}</div>
            <div class="image-item image-itemSec dark-blue text-18 flex h-full w-64 flex-col items-center justify-center">
                {{ props.proValue }}
            </div>
            <div class="image-item text-18 flex h-full w-64 flex-col items-center justify-center">{{ props.expValue }}</div>
        </div>
    </div>
</template>

