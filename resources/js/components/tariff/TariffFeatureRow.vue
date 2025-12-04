<script setup lang="ts">
import TariffLayoutRow from '@/components/tariff/TariffLayoutRow.vue';
import type { TariffFeatureModel } from '@/types/tariff/TariffFeatureModel';
import type { TariffPlanModel } from '@/types/tariff/TariffPlanModel';

const props = defineProps<{
    title: string;
    freeTariff: TariffPlanModel;
    proTariff: TariffPlanModel;
    expTariff: TariffPlanModel;
    systemName: string;
}>();

const hasFeature = (features: TariffFeatureModel[], systemName: string): boolean =>
    features.some((feature) => feature.system_name === systemName && feature.pivot?.is_included);
</script>

<template>
    <TariffLayoutRow :title="props.title">
        <div class="features-images col-span-1 grid h-100 grid-cols-3 gap-10">
            <div class="image-item flex h-full w-64 flex-col items-center justify-center">
                <img
                    v-if="hasFeature(props.freeTariff.features, props.systemName)"
                    src="/images/svg/tarif/check_yz81wi204gqx.svg"
                    alt="Да"
                    class="h-auto w-6"
                />
                <img v-else src="/images/svg/tarif/minus.svg" alt="Нет" class="h-auto w-6" />
            </div>
            <div class="image-item image-itemSec dark-blue flex h-full w-64 flex-col items-center justify-center">
                <img
                    v-if="hasFeature(props.proTariff.features, props.systemName)"
                    src="/images/svg/tarif/check_yz81wi204gqx.svg"
                    alt="Да"
                    class="h-auto w-6"
                />
                <img v-else src="/images/svg/tarif/minus.svg" alt="Нет" class="h-auto w-6" />
            </div>
            <div class="image-item flex h-full w-64 flex-col items-center justify-center">
                <img
                    v-if="hasFeature(props.expTariff.features, props.systemName)"
                    src="/images/svg/tarif/check_yz81wi204gqx.svg"
                    alt="Да"
                    class="h-auto w-6"
                />
                <img v-else src="/images/svg/tarif/minus.svg" alt="Нет" class="h-auto w-6" />
            </div>
        </div>
    </TariffLayoutRow>
</template>
