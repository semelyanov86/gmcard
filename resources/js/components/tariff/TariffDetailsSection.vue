<script setup lang="ts">
import TariffInfoModal from '@/components/tariff/TariffInfoModal.vue';
import TariffBottomPlansSection from '@/components/tariff/TariffBottomPlansSection.vue';
import TariffTopPlansSection from '@/components/tariff/TariffTopPlansSection.vue';
import TariffPriceRow from '@/components/tariff/TariffPriceRow.vue';
import TariffNumberRow from '@/components/tariff/TariffNumberRow.vue';
import TariffFeatureRow from '@/components/tariff/TariffFeatureRow.vue';
import TariffOwnBannerSlotsRow from '@/components/tariff/TariffOwnBannerSlotsRow.vue';
import TariffBooleanRow from '@/components/tariff/TariffBooleanRow.vue';
import TariffCashbackRow from '@/components/tariff/TariffCashbackRow.vue';
import TariffInfoNote from '@/components/tariff/TariffInfoNote.vue';
import type { TariffPlanModel } from '@/types/tariff/TariffPlanModel';
import { onUnmounted, ref, watch } from 'vue';

const isModalOpen = ref(false);

const { tariffPlans } = defineProps<{
    tariffPlans: TariffPlanModel[];
}>();

const freeTariff = tariffPlans[0];
const proTariff = tariffPlans[1];
const expTariff = tariffPlans[2];

const getFeatureTitle = (systemName: string): string =>
    freeTariff.features.find((feature) => feature.system_name === systemName)?.display_name ?? '';

const openModal = () => {
    isModalOpen.value = true;
};

const closeModal = () => {
    isModalOpen.value = false;
};

const handleKeydown = (event: KeyboardEvent) => {
    if (event.key === 'Escape') {
        closeModal();
    }
};

watch(
    isModalOpen,
    (value) => {
        if (value) {
            window.addEventListener('keydown', handleKeydown);
        } else {
            window.removeEventListener('keydown', handleKeydown);
        }
    },
    { immediate: true },
);

onUnmounted(() => {
    window.removeEventListener('keydown', handleKeydown);
});
</script>

<template>
    <section class="border-brand w-full border-t py-3">
        <TariffInfoNote @trigger="openModal" />

        <TariffTopPlansSection
            :free-tariff="freeTariff"
            :pro-tariff="proTariff"
            :exp-tariff="expTariff"
        />

        <TariffFeatureRow
            :title="getFeatureTitle('custom_promotions')"
            :free-tariff="freeTariff"
            :pro-tariff="proTariff"
            :exp-tariff="expTariff"
            system-name="custom_promotions"
        />
        <div class="features-section grid-cols-30-70 container grid items-center justify-around gap-5 rounded-3xl text-white">
            <div class="features-description col-span-1">
                <h2 class="features-title text-16 relative">
                    {{ getFeatureTitle('free_promos_limit') }}
                    <span
                        class="group absolute top-[47%] left-[100%] inline-flex"
                        role="button"
                        tabindex="0"
                        @click="openModal"
                        @keyup.enter.prevent="openModal"
                        @keyup.space.prevent="openModal"
                    >
                        <img src="/images/svg/tarif/question.svg" alt="Подробнее" class="tariff-info-image mr-2 ml-2 group-hover:hidden" />
                        <img
                            src="/images/svg/tarif/questionHover.svg"
                            alt="Подробнее"
                            class="tariff-info-image-hover mr-2 ml-2 hidden group-hover:inline-block"
                        />
                    </span>
                </h2>
            </div>

            <div class="features-images col-span-1 grid h-100 grid-cols-3 gap-10">
                <div class="image-item text-18 flex h-full w-64 flex-col items-center justify-center">{{ freeTariff.ads_count }}</div>
                <div class="image-item image-itemSec dark-blue text-18 flex h-full w-64 flex-col items-center justify-center">
                    {{ proTariff.ads_count }}
                </div>
                <div class="image-item text-18 flex h-full w-64 flex-col items-center justify-center">{{ expTariff.ads_count }}</div>
            </div>
        </div>

        <TariffPriceRow
            :title="getFeatureTitle('extra_ad_price')"
            :free-tariff="freeTariff"
            :pro-tariff="proTariff"
            :exp-tariff="expTariff"
            field="extra_ad_price"
        />

        <TariffPriceRow
            :title="getFeatureTitle('banner_price')"
            :free-tariff="freeTariff"
            :pro-tariff="proTariff"
            :exp-tariff="expTariff"
            field="banner_price"
        />

        <TariffNumberRow
            :title="getFeatureTitle('banner_slots_total')"
            :free-tariff="freeTariff"
            :pro-tariff="proTariff"
            :exp-tariff="expTariff"
            field="banner_slots_total"
        />

        <TariffOwnBannerSlotsRow
            :title="getFeatureTitle('own_banner_slots_total')"
            :free-tariff="freeTariff"
            :pro-tariff="proTariff"
            :exp-tariff="expTariff"
        />

        <TariffCashbackRow
            :title="getFeatureTitle('cashback_bonus')"
            :free-tariff="freeTariff"
            :pro-tariff="proTariff"
            :exp-tariff="expTariff"
        />

        <TariffBooleanRow
            :title="getFeatureTitle('auto_schedule_enabled')"
            :free-tariff="freeTariff"
            :pro-tariff="proTariff"
            :exp-tariff="expTariff"
            field="auto_schedule_enabled"
        />

        <TariffBooleanRow
            :title="getFeatureTitle('auto_restart_enabled')"
            :free-tariff="freeTariff"
            :pro-tariff="proTariff"
            :exp-tariff="expTariff"
            field="auto_restart_enabled"
        />

        <TariffBooleanRow
            :title="getFeatureTitle('auto_bump_enabled')"
            :free-tariff="freeTariff"
            :pro-tariff="proTariff"
            :exp-tariff="expTariff"
            field="auto_bump_enabled"
        />

        <TariffBottomPlansSection />
    </section>
    <TariffInfoModal v-model="isModalOpen" />
</template>

<style>
.info {
    left: 2%;
}

.dark-blue {
    background-color: #11254a;
}

.tariff-info-image {
    transition: 0.3s linear;
}

.tariff-info-image-hover {
    display: none;
    transition: 0.3s linear;
}

.tariff-info-image:hover {
    display: none;
}

.tariff-info-image:hover + .tariff-info-image-hover {
    display: block;
}

.tariff-details {
    position: sticky;
    top: 0;
    z-index: 10;
}

.leading-normal {
    line-height: 1.5;
}

.col-span-1 {
    grid-column: span 1 / span 1;
}

.tariff-status {
    cursor: pointer;
}

.features-section {
    transition: 0.3s linear;
}

.features-section:hover {
    background-color: #10264d;
    .image-itemSec {
        background-color: #1d2f53;
    }
}

.image-itemSec {
    transition: 0.3s linear;
}

.tariff-header {
    text-align: left;
}

.tariff-details {
    position: sticky;
    top: 0;
    z-index: 10;
}

.grid-cols-30-70 {
    grid-template-columns: 30% 70%;
}

@media (max-width: 1330px) {
    .tariff-info-image {
        position: static;
    }

    .tariff-info-image-hover {
        position: static;
    }

    .tariff-details {
        flex-direction: column;
        align-items: center;
        justify-content: center;
        position: relative;
    }

    .tariff-details-Bottom {
        display: block;
    }

    .tariff-title {
        margin-top: 15px;
        text-align: left;
        font-weight: bold;
        font-size: 29px;
        br {
            display: none;
        }
    }

    .tariff-plans {
        grid-template-columns: 1fr;
        gap: 20px;
        width: 100%;
        display: flex;
        justify-content: center;
        position: sticky;
        top: 0;
    }

    .tarifFree {
        padding: 0;
        padding-bottom: 10px;
    }

    .tariff-status {
        cursor: pointer;
    }

    .tarifPro {
        background-color: transparent;
        border-bottom: 1px solid #495975;
        padding: 0;
        padding-bottom: 10px;
    }

    .tarifExp {
        padding: 0;
        padding-bottom: 10px;
    }

    .features-section {
        flex-direction: column;
        align-items: center;
        border-bottom: 1px solid #293c5d;
        border-radius: 0;
    }

    .features-section:hover {
        background-color: #10264d;
        .image-itemSec {
            background-color: transparent;
        }
    }

    .features-description {
        margin-top: 15px;
        width: 100%;
    }

    .features-title {
        display: flex;
        br {
            display: none;
        }
    }

    .features-images {
        grid-template-columns: repeat(3, 1fr);
        height: auto;
        width: 100%;
    }

    .image-item {
        height: auto;
        width: auto;
        padding-bottom: 24px;
    }

    .image-itemSec {
        background-color: transparent;
        border-bottom: 1px solid #495975;
    }
    .tariff-details {
        flex-direction: column;
        align-items: center;
        justify-content: center;
        position: relative;
    }

    .tariff-details-Bottom {
        display: block;
    }

    .features-description {
        margin-top: 15px;
        width: 100%;
    }
}
</style>
