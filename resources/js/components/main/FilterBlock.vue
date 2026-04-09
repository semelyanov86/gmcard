<script setup lang="ts">
import type { CityModel, DiscountFilterOptionModel, PromoTypeModel } from '@/types';
import FilterCitySelect from '@/components/filter/FilterCitySelect.vue';
import FilterDiscountSelect from '@/components/filter/FilterDiscountSelect.vue';
import FilterTypeSelect from '@/components/filter/FilterTypeSelect.vue';

const props = defineProps<{
    cities: CityModel[];
    discountFilterOptions: DiscountFilterOptionModel[];
    promoTypes: PromoTypeModel[];
}>();

</script>

<template>
    <div class="filter_block z-31 mb-6 flex h-12 items-center justify-between lg:h-full">
        <h3 class="text_filter text-2xl font-bold text-white">Фильтровать</h3>
        <FilterCitySelect  :cities="props.cities"/>
        <FilterDiscountSelect :discount-filter-options="props.discountFilterOptions" />
        <FilterTypeSelect :promo-types="props.promoTypes" />
    </div>
</template>

<style scoped>
.filter-option-selected {
    background-color: #f9d914;
}

.custom-option,
.custom-option_1,
.custom-option_2 {
    color: #000;
}
</style>
