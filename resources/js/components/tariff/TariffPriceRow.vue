<script setup lang="ts">
import TariffLayoutRow from '@/components/tariff/TariffLayoutRow.vue';
import type { TariffPlanModel } from '@/types/tariff/TariffPlanModel';

const props = defineProps<{
    title: string;
    freeTariff: TariffPlanModel;
    proTariff: TariffPlanModel;
    expTariff: TariffPlanModel;
    field: 'extra_ad_price' | 'banner_price';
}>();
</script>

<template>
    <TariffLayoutRow :title="props.title">
        <div class="features-images col-span-1 grid h-100 grid-cols-3 gap-10">
            <div class="image-item text-18 flex h-full w-64 flex-col items-center justify-center">{{ props.freeTariff[props.field] }} ₽ в день</div>
            <div class="image-item image-itemSec dark-blue text-18 flex h-full w-64 flex-col items-center justify-center">
                {{ props.proTariff[props.field] }} ₽ в день
            </div>
            <div class="image-item text-18 flex h-full w-64 flex-col items-center justify-center">{{ props.expTariff[props.field] }} ₽ в день</div>
        </div>
    </TariffLayoutRow>
</template>
