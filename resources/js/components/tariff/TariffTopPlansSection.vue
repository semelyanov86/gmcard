<script setup lang="ts">
import type { TariffPlanModel } from '@/types/tariff/TariffPlanModel';

const props = defineProps<{
    freeTariff: TariffPlanModel;
    proTariff: TariffPlanModel;
    expTariff: TariffPlanModel;
}>();
</script>

<template>
    <div
        class="tariff-details bg-brand-darker border-brand grid-cols-30-70 sticky top-0 z-10 container mt-4 grid items-center justify-around gap-5 border-b text-white"
    >
        <div class="tariff-header col-span-1">
            <h2 class="tariff-title text-4xl leading-normal">
                Тарифы и что <br />
                в них входит
            </h2>
        </div>

        <div class="tariff-plans col-span-1 grid grid-cols-3 gap-10">
            <!-- Тариф Free -->
            <div class="sr tarifFree flex w-64 flex-col items-center gap-3 rounded-[14px] bg-transparent p-4 text-center">
                <h3 class="tariff-name text-2xl font-bold">
                    {{ props.freeTariff.name }}
                </h3>
                <div class="tariff-status rounded-[12px] bg-[#1d3154] px-6 py-2 font-bold text-[#8a9cae]">Активен</div>
            </div>

            <!-- Тариф Pro -->
            <div class="sr dark-blue tarifPro flex w-64 flex-col items-center gap-3 rounded-[14px] rounded-b-none p-4 text-center">
                <h3 class="tariff-name tariffName text-2xl font-bold">
                    {{ props.proTariff.name }}
                </h3>
                <div class="tariff-status bg-brand-yellow-dark rounded-[12px] px-6 py-2 font-bold text-black">Перейти</div>
            </div>

            <!-- Тариф Exp -->
            <div class="sr tarifExp flex w-64 flex-col items-center gap-3 rounded-[14px] bg-transparent p-4 text-center">
                <h3 class="tariff-name tariffName text-2xl font-bold">
                    {{ props.expTariff.name }}
                </h3>
                <div class="tariff-status bg-brand-yellow-dark rounded-[12px] px-6 py-2 font-bold text-black">Перейти</div>
            </div>
        </div>
    </div>
</template>
