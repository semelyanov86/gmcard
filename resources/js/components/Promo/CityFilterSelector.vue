<script setup lang="ts">
import ChevronDownIcon from '@/components/primitives/icons/ChevronDownIcon.vue';
import type { CityModel } from '@/types';
import { computed, ref } from 'vue';

interface Props {
    cities: CityModel[];
    modelValue?: string;
}

const props = withDefaults(defineProps<Props>(), {
    modelValue: '',
});

const emit = defineEmits<{
    'update:modelValue': [value: string];
}>();

const isOpen = ref(false);
const searchQuery = ref('');
const selectedCity = ref(props.modelValue || 'Чебоксары');

const filteredCities = computed(() => {
    if (!searchQuery.value) {
        return props.cities;
    }
    const query = searchQuery.value.toLowerCase();
    return props.cities.filter((city) => city.name.toLowerCase().includes(query));
});

function selectCity(cityName: string) {
    selectedCity.value = cityName;
    emit('update:modelValue', cityName);
    isOpen.value = false;
    searchQuery.value = '';
}

function toggleDropdown() {
    isOpen.value = !isOpen.value;
    if (isOpen.value) {
        searchQuery.value = '';
    }
}
</script>

<template>
    <div class="gapper filter_inp relative flex items-center gap-6 lg:flex-col">
        <label for="city" class="text-base text-white">Ваш город</label>
        <div class="selected_block relative inline-block h-12">
            <div
                @click="toggleDropdown"
                class="custom-select focus:shadow-outline flex h-12 w-52 cursor-pointer appearance-none items-center rounded-md border border-white bg-none px-4 py-2 pr-8 leading-tight text-white shadow hover:border-gray-300 focus:outline-none"
            >
                <span class="mr-2">{{ selectedCity }}</span>
                <ChevronDownIcon custom-class="pointer-events-none absolute top-2 right-0 mt-3 mr-2 h-1 w-2 text-white" />
            </div>
            <div v-show="isOpen" class="custom-options absolute z-50 mt-1 w-52 overflow-hidden rounded-b border border-gray-400 bg-white shadow-lg">
                <input
                    v-model="searchQuery"
                    type="text"
                    placeholder="Поиск города..."
                    class="w-full border-b border-gray-300 px-4 py-2 text-sm focus:outline-none"
                />
                <div class="max-h-45 overflow-y-scroll">
                    <div
                        v-for="city in filteredCities"
                        :key="city.id"
                        @click="selectCity(city.name)"
                        class="custom-option cursor-pointer px-4 py-2 hover:bg-gray-200"
                        :class="{ 'bg-yellow-400': city.name === selectedCity }"
                    >
                        {{ city.name }}
                    </div>
                    <div v-if="filteredCities.length === 0" class="px-4 py-2 text-gray-500">Город не найден</div>
                </div>
            </div>
        </div>
    </div>
</template>
