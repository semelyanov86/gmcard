<script setup lang="ts">
import type { CityModel } from '@/types';
import { computed, onMounted, onUnmounted, ref } from 'vue';

const props = defineProps<{
    cities: CityModel[];
}>();

const cityOpen = ref(false);
const selectedCityId = ref<number | null>(null);
const cityRoot = ref<HTMLElement | null>(null);

const selectedCityName = computed(() => {
    if (selectedCityId.value === null) {
        return '';
    }
    return props.cities.find((c) => c.id === selectedCityId.value)?.name ?? '';
});

function toggleCityOpen() {
    cityOpen.value = !cityOpen.value;
}

function selectCity(city: CityModel) {
    selectedCityId.value = city.id;
    cityOpen.value = false;
}

function onDocumentClick(e: MouseEvent) {
    const el = cityRoot.value;
    if (!el || !(e.target instanceof Node)) {
        return;
    }
    if (!el.contains(e.target)) {
        cityOpen.value = false;
    }
}

onMounted(() => document.addEventListener('click', onDocumentClick));
onUnmounted(() => document.removeEventListener('click', onDocumentClick));
</script>

<template>
    <div class="filter_block z-31 mb-6 flex h-12 items-center justify-between lg:h-full">
        <h3 class="text_filter text-2xl font-bold text-white">Фильтровать</h3>
        <div class="gapper filter_inp relative flex h-full items-center gap-6">
            <label for="city" class="text-base text-white">Ваш город</label>
            <div ref="cityRoot" class="selected_block relative inline-block h-12">
                <div
                    class="custom-select focus:shadow-outline flex h-12 w-52 cursor-pointer appearance-none items-center rounded-md border border-white bg-none px-4 py-2 pr-8 leading-tight text-white shadow hover:border-gray-300 focus:outline-none"
                    role="button"
                    tabindex="0"
                    :aria-expanded="cityOpen"
                    @click.stop="toggleCityOpen"
                >
                    <span class="mr-2">{{ selectedCityName || 'Выберите город' }}</span>
                    <img src="/images/png/icons/down.png" class="pointer-events-none absolute top-2 right-0 mt-3 mr-2 h-1 w-2" alt="" />
                </div>
                <div
                    class="custom-options absolute z-50 mt-1 h-48 w-52 overflow-y-scroll rounded-b border border-gray-400 bg-white shadow-lg"
                    :class="{ hidden: !cityOpen }"
                    role="listbox"
                >
                    <div
                        v-for="city in props.cities"
                        :key="city.id"
                        class="custom-option cursor-pointer px-4 py-2 hover:bg-gray-200"
                        :class="{ 'filter-option-selected': city.id === selectedCityId }"
                        role="option"
                        :aria-selected="city.id === selectedCityId"
                        @click.stop="selectCity(city)"
                    >
                        {{ city.name }}
                    </div>
                </div>
            </div>
        </div>
        <div class="gapper filter_inp relative flex items-center gap-6">
            <label for="shop" class="text-base text-white">Скидки</label>
            <div class="selected_block relative inline-block h-12">
                <div
                    id="custom_select"
                    class="custom_select focus:shadow-outline flex h-12 w-52 appearance-none items-center rounded-md border border-white bg-none px-4 py-2 pr-8 leading-tight text-white shadow hover:border-gray-300 focus:outline-none"
                >
                    <div id="spaner" class="mr-2">Не менее 5%</div>
                    <img src="/images/png/icons/down.png" class="pointer-events-none absolute top-2 right-0 mt-3 mr-2 h-1 w-2" alt="" />
                </div>
                <div
                    class="custom-options_1 absolute z-50 mt-1 hidden h-48 w-52 overflow-y-scroll rounded-b border border-gray-400 bg-white shadow-lg"
                >
                    <div class="custom-option_1 filter-option-selected cursor-pointer px-4 py-2 hover:bg-gray-200">Не менее 5%</div>
                    <div class="custom-option_1 cursor-pointer px-4 py-2 hover:bg-gray-200">Не менее 10%</div>
                    <div class="custom-option_1 cursor-pointer px-4 py-2 hover:bg-gray-200">Не менее 15%</div>
                    <div class="custom-option_1 cursor-pointer px-4 py-2 hover:bg-gray-200">Не менее 20%</div>
                    <div class="custom-option_1 cursor-pointer px-4 py-2 hover:bg-gray-200">Не менее 25%</div>
                    <div class="custom-option_1 cursor-pointer px-4 py-2 hover:bg-gray-200">Не менее 30%</div>
                    <div class="custom-option_1 cursor-pointer px-4 py-2 hover:bg-gray-200">Не менее 35%</div>
                    <div class="custom-option_1 cursor-pointer px-4 py-2 hover:bg-gray-200">Не менее 40%</div>
                    <div class="custom-option_1 cursor-pointer px-4 py-2 hover:bg-gray-200">Не менее 45%</div>
                    <div class="custom-option_1 cursor-pointer px-4 py-2 hover:bg-gray-200">Не менее 50%</div>
                    <div class="custom-option_1 cursor-pointer px-4 py-2 hover:bg-gray-200">Не менее 55%</div>
                    <div class="custom-option_1 cursor-pointer px-4 py-2 hover:bg-gray-200">Не менее 60%</div>
                    <div class="custom-option_1 cursor-pointer px-4 py-2 hover:bg-gray-200">Не менее 65%</div>
                    <div class="custom-option_1 cursor-pointer px-4 py-2 hover:bg-gray-200">Не менее 70%</div>
                    <div class="custom-option_1 cursor-pointer px-4 py-2 hover:bg-gray-200">Не менее 75%</div>
                    <div class="custom-option_1 cursor-pointer px-4 py-2 hover:bg-gray-200">Не менее 80%</div>
                    <div class="custom-option_1 cursor-pointer px-4 py-2 hover:bg-gray-200">Не менее 85%</div>
                    <div class="custom-option_1 cursor-pointer px-4 py-2 hover:bg-gray-200">Не менее 90%</div>
                    <div class="custom-option_1 cursor-pointer px-4 py-2 hover:bg-gray-200">Не менее 95%</div>
                    <div class="custom-option_1 cursor-pointer px-4 py-2 hover:bg-gray-200">Не менее 100%</div>
                </div>
            </div>
        </div>
        <div class="gapper filter_inp relative flex items-center gap-6">
            <label for="sale" class="text-base text-white">Вид акции</label>
            <div class="selected_block relative inline-block h-12">
                <div
                    class="custom_selected focus:shadow-outline flex h-12 w-52 appearance-none items-center rounded-md border border-white bg-none px-4 py-2 pr-8 leading-tight text-white shadow hover:border-gray-300 focus:outline-none"
                >
                    <div id="spaner1" class="mr-2">Все</div>
                    <img src="/images/png/icons/down.png" class="pointer-events-none absolute top-2 right-0 mt-3 mr-2 h-1 w-2" alt="" />
                </div>
                <div
                    class="custom-options_2 absolute z-50 mt-1 hidden h-48 w-52 overflow-y-scroll rounded-b border border-gray-400 bg-white shadow-lg"
                >
                    <div class="custom-option_2 filter-option-selected cursor-pointer px-4 py-2 hover:bg-gray-200">Все</div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
.filter-option-selected {
    background-color: #f9d914;
}
</style>
