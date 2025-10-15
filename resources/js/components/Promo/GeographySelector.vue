<script setup lang="ts">
import { ref, computed } from 'vue';

interface Props {
    maxCities?: number;
}

withDefaults(defineProps<Props>(), {
    maxCities: 20,
});

const searchQuery = ref('');
const dropdownVisible = ref(false);
const selectedCities = ref<string[]>([]);

const allCities = [
    'Москва',
    'Санкт-Петербург',
    'Новосибирск',
    'Екатеринбург',
    'Казань',
    'Нижний Новгород',
    'Челябинск',
    'Самара',
    'Омск',
    'Ростов-на-Дону',
];

const filteredCities = computed(() => {
    const query = searchQuery.value.toLowerCase();
    return allCities.filter(city => 
        city.toLowerCase().includes(query) && !selectedCities.value.includes(city)
    );
});

function showDropdown() {
    dropdownVisible.value = true;
}

function hideDropdown() {
    setTimeout(() => {
        dropdownVisible.value = false;
    }, 200);
}

function selectCity(city: string) {
    if (!selectedCities.value.includes(city)) {
        selectedCities.value.push(city);
        searchQuery.value = '';
        dropdownVisible.value = false;
    }
}

function removeCity(city: string) {
    selectedCities.value = selectedCities.value.filter(c => c !== city);
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
                @focus="showDropdown"
                @blur="hideDropdown"
            >
            <ul 
                v-show="dropdownVisible && filteredCities.length > 0"
                class="absolute z-50 w-full p-0 mt-1 bg-white border border-[#ccc] max-h-[200px] overflow-y-auto rounded-md shadow-lg"
            >
                <li 
                    v-for="city in filteredCities" 
                    :key="city" 
                    @click="selectCity(city)"
                    class="p-2 cursor-pointer hover:bg-[#f5f5f5]"
                >
                    {{ city }}
                </li>
            </ul>
        </div>
        <div class="mt-5 flex flex-wrap gap-4 all_text">
            <div 
                v-for="city in selectedCities" 
                :key="city"
                class="flex items-center gap-2 bg-[#e9eef1] px-4 py-2 rounded-md"
            >
                <span>{{ city }}</span>
                <img 
                    @click="removeCity(city)"
                    src="/images/png/constructor/delete.svg" 
                    alt="Удалить"
                    class="w-6 cursor-pointer hover:opacity-70"
                >
            </div>
        </div>
    </div>
</template>
