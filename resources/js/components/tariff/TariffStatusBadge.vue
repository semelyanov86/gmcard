<script setup lang="ts">
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
    <div
        v-if="isActive"
        class="tariff-status rounded-[12px] bg-[#1d3154] px-4 py-2 text-sm font-bold text-[#8a9cae] md:px-5 md:text-sm lg:px-6 lg:text-base"
    >
        Активен
    </div>
    <div
        v-else
        class="tariff-status rounded-[12px] bg-brand-yellow-dark px-4 py-2 text-sm font-bold text-black md:px-5 md:text-sm lg:px-6 lg:text-base"
    >
        Перейти
    </div>
</template>
