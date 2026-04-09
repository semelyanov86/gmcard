<script setup lang="ts">
import FilterCitySelect from '@/components/filter/FilterCitySelect.vue';
import FilterDiscountSelect from '@/components/filter/FilterDiscountSelect.vue';
import FilterTypeSelect from '@/components/filter/FilterTypeSelect.vue';
import type { CityModel, DiscountFilterOptionModel, PromoTypeModel } from '@/types';
import type { PromoFiltersModel } from '@/types/filter/PromoFiltersModel';
import { router } from '@inertiajs/vue3';
import { ref, watch } from 'vue';

const props = defineProps<{
    cities: CityModel[];
    discountFilterOptions: DiscountFilterOptionModel[];
    promoTypes: PromoTypeModel[];
    filters?: PromoFiltersModel;
    submitUrl: string;
}>();

const city = ref<number | null>(props.filters?.city ?? null);
const minDiscount = ref<number | null>(props.filters?.min_discount ?? null);
const promoType = ref<number | null>(props.filters?.promo_type ?? null);


watch([city, minDiscount, promoType], () => {
    router.get(
        props.submitUrl,
        {
            city: city.value ?? undefined,
            min_discount: minDiscount.value ?? undefined,
            promo_type: promoType.value ?? undefined,
        },
        {
            preserveState: true,
            preserveScroll: true,
            replace: true,
            only: ['promos', 'filters'],
        },
    );
});
</script>

<template>
    <div class="filter_block z-31 mb-6 flex h-12 items-center justify-between lg:h-full">
        <h3 class="text_filter text-2xl font-bold text-white">Фильтровать</h3>
        <FilterCitySelect v-model="city" :cities="props.cities" />
        <FilterDiscountSelect v-model="minDiscount" :discount-filter-options="props.discountFilterOptions" />
        <FilterTypeSelect v-model="promoType" :promo-types="props.promoTypes" />
    </div>
</template>

<style scoped>
</style>
