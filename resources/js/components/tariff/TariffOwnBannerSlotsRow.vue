<script setup lang="ts">
import TariffLayoutRow from '@/components/tariff/TariffLayoutRow.vue';
import type { TariffPlanModel } from '@/types/tariff/TariffPlanModel';

const props = defineProps<{
    title: string;
    freeTariff: TariffPlanModel;
    proTariff: TariffPlanModel;
    expTariff: TariffPlanModel;
}>();
</script>

<template>
    <TariffLayoutRow :title="props.title">
        <div class="features-images col-span-1 grid h-100 grid-cols-3 gap-10">
            <div class="image-item text-18 flex h-full w-64 flex-col items-center justify-center">
                {{ props.freeTariff.own_banner_slots_total }} (если есть место)
            </div>
            <div class="image-item image-itemSec dark-blue text-18 flex h-full w-64 flex-col items-center justify-center">
                {{ props.proTariff.own_banner_slots_total }} (если есть место)
            </div>
            <div class="image-item text-18 flex h-full w-64 flex-col items-center justify-center">
                {{ props.expTariff.own_banner_slots_total }} (если есть место)
            </div>
        </div>
    </TariffLayoutRow>
</template>
