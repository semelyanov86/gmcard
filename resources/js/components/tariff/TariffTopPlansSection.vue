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
        class="tariff-details bg-brand-darker border-brand grid-cols-30-70 sticky top-0 z-10 container mt-4 grid items-center justify-around gap-5 border-b text-white"
    >
        <div class="tariff-header col-span-1">
            <h2 class="tariff-title text-left text-4xl leading-normal">
                Тарифы и что <br />
                в них входит
            </h2>
        </div>

        <div class="tariff-plans col-span-1 grid grid-cols-3 gap-10">
            <div class="sr tarifFree flex w-64 flex-col items-center gap-3 rounded-[14px] bg-transparent p-4 text-center">
                <h3 class="tariff-name text-2xl font-bold">
                    {{ props.freeTariff.name }}
                </h3>
                <TariffStatusBadge :tariff="props.freeTariff" />
            </div>

            <div class="sr dark-blue tarifPro flex w-64 flex-col items-center gap-3 rounded-[14px] rounded-b-none p-4 text-center">
                <h3 class="tariff-name tariffName text-2xl font-bold">
                    {{ props.proTariff.name }}
                </h3>
                <TariffStatusBadge :tariff="props.proTariff" />
            </div>

            <div class="sr tarifExp flex w-64 flex-col items-center gap-3 rounded-[14px] bg-transparent p-4 text-center">
                <h3 class="tariff-name tariffName text-2xl font-bold">
                    {{ props.expTariff.name }}
                </h3>
                <TariffStatusBadge :tariff="props.expTariff" />
            </div>
        </div>
    </div>
</template>

<style scoped>
@media (max-width: 1024px) {
    .tariff-details {
        grid-template-columns: 1fr;
        gap: 20px;
        margin-top: 15px;
        background-color: #041a41;
        border-color: #203457;
    }

    .tariff-title {
        text-align: center;
        font-size: 36px;
    }

    .tariff-plans {
        gap: 12px;
        grid-template-columns: repeat(3, minmax(0, 1fr));
    }

    .tariff-plans .sr {
        width: 100%;
        max-width: 120px;
        padding: 12px;
        margin: 0 auto;
    }

    .tariff-name {
        font-size: 20px;
    }
}
</style>
