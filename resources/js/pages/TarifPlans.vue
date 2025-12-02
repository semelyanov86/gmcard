<script setup lang="ts">
import Footer from '@/components/Footer.vue';
import Header from '@/components/Header.vue';
import ServiceStatusSection from '@/components/tariff/ServiceStatusSection.vue';
import TariffDetailsSection from '@/components/tariff/TariffDetailsSection.vue';
import TariffSaleCards from '@/components/tariff/TariffSaleCards.vue';
import type { ContactModel } from '@/types';
import type { ServiceStatusBlock } from '@/types/tariff/ServiceStatusBlock';
import '../../css/internal/output.css';
import '../../css/internal/outputsec.css';

const { contact, serviceStatusBlocks } = defineProps<{
    contact: ContactModel;
    serviceStatusBlocks: ServiceStatusBlock[];
}>();
</script>

<template>
    <div class="bg-[#041A41] font-sans text-white">
        <Header />
        <main class="mainSection py-4 text-white">
            <div class="mx-auto w-full max-w-[1140px]">
                <ServiceStatusSection :services="serviceStatusBlocks" />
                <TariffSaleCards />
                <TariffDetailsSection />
            </div>
        </main>

        <Footer :contact="contact"></Footer>
    </div>
</template>
