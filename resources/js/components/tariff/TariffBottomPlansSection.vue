<script setup lang="ts">
import TariffStatusBadge from '@/components/tariff/TariffStatusBadge.vue';
import type { TariffPlanModel } from '@/types/tariff/TariffPlanModel';

const props = defineProps<{
    freeTariff: TariffPlanModel;
    proTariff: TariffPlanModel;
    expTariff: TariffPlanModel;
}>();
</script>

<template>
    <div
        class="tariff-details tariff-details-Bottom border-brand grid-cols-30-70 container grid items-center justify-around gap-5 border-t text-white"
    >
        <div class="tariff-header col-span-1">
            <h2 class="tariff-title text-[36px] leading-normal"></h2>
        </div>

        <div class="tariff-plans tariff-plans-Bottom col-span-1 grid grid-cols-3 gap-10">
            <div class="sr tarifFree flex w-64 flex-col items-center gap-3 rounded-[14px] bg-transparent p-4 text-center">
                <h3 class="tariff-name text-2xl font-bold">
                    {{ props.freeTariff.name }}
                </h3>
                <TariffStatusBadge :tariff="props.freeTariff" />
            </div>

            <div class="sr dark-blue tarifPro tarifPro-Bottom flex w-64 flex-col items-center gap-3 rounded-[14px] rounded-t-none p-4 text-center">
                <h3 class="tariff-name text-2xl font-bold">
                    {{ props.proTariff.name }}
                </h3>
                <TariffStatusBadge :tariff="props.proTariff" />
            </div>

            <div class="sr tarifExp flex w-64 flex-col items-center gap-3 rounded-[14px] bg-transparent p-4 text-center">
                <h3 class="tariff-name text-2xl font-bold">
                    {{ props.expTariff.name }}
                </h3>
                <TariffStatusBadge :tariff="props.expTariff" />
            </div>
        </div>
    </div>
</template>
