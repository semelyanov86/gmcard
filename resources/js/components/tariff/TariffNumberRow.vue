<script setup lang="ts">
import type { TariffPlanModel } from '@/types/tariff/TariffPlanModel';
import TariffLayoutRow from '@/components/tariff/TariffLayoutRow.vue';

const props = defineProps<{
    title: string;
    freeTariff: TariffPlanModel;
    proTariff: TariffPlanModel;
    expTariff: TariffPlanModel;
    field: keyof TariffPlanModel;
}>();

const formatValue = (value: unknown): string => {
    if (value === null || value === undefined) {
        return '-';
    }

    return String(value);
};
</script>

<template>
    <TariffLayoutRow :title="props.title">
        <div class="features-images col-span-1 grid h-100 grid-cols-3 gap-10">
            <div class="image-item text-18 flex h-full w-64 flex-col items-center justify-center">
                {{ formatValue(props.freeTariff[props.field]) }}
            </div>
            <div class="image-item image-itemSec dark-blue text-18 flex h-full w-64 flex-col items-center justify-center">
                {{ formatValue(props.proTariff[props.field]) }}
            </div>
            <div class="image-item text-18 flex h-full w-64 flex-col items-center justify-center">
                {{ formatValue(props.expTariff[props.field]) }}
            </div>
        </div>
    </TariffLayoutRow>
</template>



