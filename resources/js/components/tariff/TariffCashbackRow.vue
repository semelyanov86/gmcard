<script setup lang="ts">
import type { TariffPlanModel } from '@/types/tariff/TariffPlanModel';
import TariffLayoutRow from '@/components/tariff/TariffLayoutRow.vue';

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
                {{ props.freeTariff.cashback_bonus_percent }}%
            </div>
            <div class="image-item image-itemSec dark-blue text-18 flex h-full w-64 flex-col items-center justify-center">
                {{ props.proTariff.cashback_bonus_percent }}%
            </div>
            <div class="image-item text-18 flex h-full w-64 flex-col items-center justify-center">
                {{ props.expTariff.cashback_bonus_percent }}%
            </div>
        </div>
    </TariffLayoutRow>
</template>



