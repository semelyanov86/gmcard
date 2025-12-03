<script setup lang="ts">
import Footer from '@/components/Footer.vue';
import Header from '@/components/Header.vue';
import ServiceStatusSection from '@/components/tariff/ServiceStatusSection.vue';
import TariffSaleCards from '@/components/tariff/TariffSaleCards.vue';
import TariffDetailsSection from '@/components/tariff/TariffDetailsSection.vue';
import type { ContactModel } from '@/types';
import type { ServiceStatusBlock } from '@/types/tariff/ServiceStatusBlock';
import type { TariffPlanModel } from '@/types/tariff/TariffPlanModel';
import '../../css/internal/output.css';

const props = defineProps<{
    contact: ContactModel;
    serviceStatusBlocks: ServiceStatusBlock[];
    tariffPlans: TariffPlanModel[];
}>();
</script>

<template>
    <div class="bg-[#041A41] font-sans text-white">
        <Header />
        <main class="mainSection py-4 text-white">
            <div class="mx-auto w-full max-w-[1140px]">
                <ServiceStatusSection :services="props.serviceStatusBlocks" />
                <TariffSaleCards :tariff-plans="props.tariffPlans" />
                <TariffDetailsSection :tariff-plans="props.tariffPlans" />
            </div>
        </main>
        <Footer :contact="props.contact" />
    </div>
</template>
