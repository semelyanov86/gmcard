<script setup lang="ts">
import { ref, computed } from 'vue';

interface City {
    id: number;
    name: string;
}

interface Props {
    cities: City[];
    maxCities?: number;
}

const { cities, maxCities = 20 } = defineProps<Props>();

const searchQuery = ref('');
const dropdownVisible = ref(false);
const selectedCityIds = ref<Set<number>>(new Set());

const filteredCities = computed(() => {
    const query = searchQuery.value.toLowerCase();
    return cities.filter(city => 
        city.name.toLowerCase().includes(query) && 
        !selectedCityIds.value.has(city.id)
    );
});

const selectedCities = computed(() => 
    cities.filter(city => selectedCityIds.value.has(city.id))
);

function selectCity(city: City) {
    selectedCityIds.value.add(city.id);
    searchQuery.value = '';
    dropdownVisible.value = false;
}

function removeCity(cityId: number) {
    selectedCityIds.value.delete(cityId);
}

function closeDropdown() {
    setTimeout(() => dropdownVisible.value = false, 200);
}
</script>

<template>
    <div class="flex bg-white p-8 max-md:p-4 mt-8 rounded-2xl flex-col">
        <h3 class="font-bold">География акции, не более {{ maxCities }} городов</h3>
        <div class="custom-select relative w-full mt-5">
            <input 
                v-model="searchQuery"
                type="text" 
                class="w-full rounded-md border-gray-300" 
                placeholder="Укажите город"
                @focus="dropdownVisible = true"
                @blur="closeDropdown"
            >
            <ul 
                v-show="dropdownVisible && filteredCities.length > 0"
                class="absolute z-50 w-full p-0 mt-1 bg-white border border-[#ccc] max-h-[200px] overflow-y-auto rounded-md shadow-lg"
            >
                <li 
                    v-for="city in filteredCities" 
                    :key="city.id" 
                    @click="selectCity(city)"
                    class="p-2 cursor-pointer hover:bg-[#f5f5f5]"
                >
                    {{ city.name }}
                </li>
            </ul>
        </div>
        <div class="mt-5 flex flex-wrap gap-4 all_text">
            <div 
                v-for="city in selectedCities" 
                :key="city.id"
                class="flex items-center gap-2 bg-[#e9eef1] px-4 py-2 rounded-md"
            >
                <span>{{ city.name }}</span>
                <img 
                    @click="removeCity(city.id)"
                    src="/images/png/constructor/delete.svg" 
                    alt="Удалить"
                    class="w-6 cursor-pointer hover:opacity-70"
                >
            </div>
        </div>
    </div>
</template>
