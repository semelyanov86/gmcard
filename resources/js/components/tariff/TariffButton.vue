<script setup lang="ts">
import TariffGoButton from '@/components/tariff/TariffGoButton.vue';
import TariffStatusButton from '@/components/tariff/TariffStatusButton.vue';
import type { AppPageProps } from '@/types';
import type { TariffPlanModel } from '@/types/tariff/TariffPlanModel';
import { usePage } from '@inertiajs/vue3';
import { computed } from 'vue';

interface Props {
    tariff: TariffPlanModel;
}

const props = defineProps<Props>();

const page = usePage<AppPageProps>();

const currentTariffSlug = computed(() => {
    const user = page.props.auth?.user as { tariff_plan?: { slug?: string } } | undefined;
    return user?.tariff_plan?.slug ?? 'free';
});

const isActive = computed(() => currentTariffSlug.value === props.tariff.slug);
</script>

<template>
    <TariffStatusButton v-if="isActive" />
    <TariffGoButton v-else />
</template>
