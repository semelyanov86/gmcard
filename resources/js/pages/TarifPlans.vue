<script setup lang="ts">
import Header from '@/components/Header.vue';
import ServiceStatusSection from '@/components/tariff/ServiceStatusSection.vue';
import TariffSaleCards from '@/components/tariff/TariffSaleCards.vue';
import TariffDetailsSection from '@/components/tariff/TariffDetailsSection.vue';
import '../../css/internal/outputsec.css';
import '../../css/internal/output.css';
import Footer from '@/components/Footer.vue';
import type { ContactModel } from '@/types';
import type { ServiceStatusBlock } from '@/types/tariff/ServiceStatusBlock';

const { contact, serviceStatusBlocks } = defineProps<{
    contact: ContactModel;
    serviceStatusBlocks: ServiceStatusBlock[];
}>();

</script>

<template>
    <div class="bg-[#041A41] font-sans text-white">
        <Header />
        <main class="py-4 text-white mainSection">
            <div class="max-w-[1140px] w-full mx-auto">
                <ServiceStatusSection :services="serviceStatusBlocks" />
                <TariffSaleCards />
                <TariffDetailsSection />
            </div>
        </main>

        <Footer :contact="contact"></Footer>
    </div>
</template>

