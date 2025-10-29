<script setup lang="ts">
import DeleteIcon from '@/components/primitives/icons/DeleteIcon.vue';
import type { CityModel } from '@/types';
import { computed, ref } from 'vue';

interface Props {
    cities: CityModel[];
    modelValue: number[];
    maxCities?: number;
    error?: string;
}

const props = defineProps<Props>();

const emit = defineEmits<{
    'update:modelValue': [value: number[]];
}>();

const searchQuery = ref('');
const dropdownVisible = ref(false);
const selectedCityIds = ref<Set<number>>(new Set(props.modelValue));

const filteredCities = computed(() => {
    const query = searchQuery.value.toLowerCase();
    return props.cities.filter((city) => city.name.toLowerCase().includes(query) && !selectedCityIds.value.has(city.id));
});

const selectedCities = computed(() => props.cities.filter((city) => selectedCityIds.value.has(city.id)));

function selectCity(city: CityModel) {
    if (selectedCityIds.value.size >= (props.maxCities ?? 20)) {
        return;
    }
    selectedCityIds.value.add(city.id);
    searchQuery.value = '';
    dropdownVisible.value = false;
    emitChanges();
}

function removeCity(cityId: number) {
    selectedCityIds.value.delete(cityId);
    emitChanges();
}

function closeDropdown() {
    setTimeout(() => (dropdownVisible.value = false), 200);
}

function emitChanges() {
    emit('update:modelValue', Array.from(selectedCityIds.value));
}
</script>

<template>
    <div class="mt-8 flex flex-col rounded-2xl bg-white p-8 max-md:p-4">
        <h3 class="font-bold">География акции, не более {{ maxCities }} городов</h3>
        <div class="custom-select relative mt-5 w-full">
            <input
                v-model="searchQuery"
                type="text"
                class="w-full rounded-md border-gray-300"
                placeholder="Укажите город"
                @focus="dropdownVisible = true"
                @blur="closeDropdown"
            />
            <ul
                v-show="dropdownVisible && filteredCities.length > 0"
                class="absolute z-50 mt-1 max-h-50 w-full overflow-y-auto rounded-md border border-gray-300 bg-white p-0 shadow-lg"
            >
                <li v-for="city in filteredCities" :key="city.id" @click="selectCity(city)" class="cursor-pointer p-2 hover:bg-gray-100">
                    {{ city.name }}
                </li>
            </ul>
        </div>
        <div class="all_text mt-5 flex flex-wrap gap-4">
            <div v-for="city in selectedCities" :key="city.id" class="flex items-center gap-2 rounded-md bg-slate-100 px-4 py-2">
                <span>{{ city.name }}</span>
                <DeleteIcon @click="removeCity(city.id)" custom-class="cursor-pointer hover:opacity-70" />
            </div>
        </div>
        <p v-if="error" class="mt-4 text-sm text-red-600">{{ error }}</p>
    </div>
</template>
