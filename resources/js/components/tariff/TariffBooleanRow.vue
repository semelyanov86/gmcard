<script setup lang="ts">
import TariffLayoutRow from '@/components/tariff/TariffLayoutRow.vue';
import type { TariffPlanModel } from '@/types/tariff/TariffPlanModel';
import { TariffBooleanField } from '@/types/tariff/TariffBooleanField';

const props = defineProps<{
    title: string;
    freeTariff: TariffPlanModel;
    proTariff: TariffPlanModel;
    expTariff: TariffPlanModel;
    field: TariffBooleanField;
}>();

const getFlag = (tariff: TariffPlanModel, field: TariffBooleanField): boolean => Boolean(tariff[field]);
</script>

<template>
    <TariffLayoutRow :title="props.title">
        <div class="features-images col-span-1 grid h-100 grid-cols-3 gap-10">
            <div class="image-item flex h-full w-64 flex-col items-center justify-center">
                <img v-if="getFlag(props.freeTariff, props.field)" src="/images/svg/tarif/check_yz81wi204gqx.svg" alt="Да" class="h-auto w-6" />
                <img v-else src="/images/svg/tarif/minus.svg" alt="Нет" class="h-auto w-6" />
            </div>
            <div class="image-item image-itemSec dark-blue flex h-full w-64 flex-col items-center justify-center">
                <img v-if="getFlag(props.proTariff, props.field)" src="/images/svg/tarif/check_yz81wi204gqx.svg" alt="Да" class="h-auto w-6" />
                <img v-else src="/images/svg/tarif/minus.svg" alt="Нет" class="h-auto w-6" />
            </div>
            <div class="image-item flex h-full w-64 flex-col items-center justify-center">
                <img v-if="getFlag(props.expTariff, props.field)" src="/images/svg/tarif/check_yz81wi204gqx.svg" alt="Да" class="h-auto w-6" />
                <img v-else src="/images/svg/tarif/minus.svg" alt="Нет" class="h-auto w-6" />
            </div>
        </div>
    </TariffLayoutRow>
</template>
