<script setup lang="ts">
import type { CityModel } from '@/types';
import { computed, onMounted, onUnmounted, ref, watch } from 'vue';

const props = defineProps<{
    cities: CityModel[];
    modelValue: number | null;
}>();

const searchQuery = ref('');

const filteredCities = computed(() => {
    const q = searchQuery.value.trim().toLowerCase();
    if (!q) return props.cities;

    return props.cities
        .filter((city) => city.name.toLowerCase().includes(q))
        .sort((a, b) => {
            const aStarts = a.name.toLowerCase().startsWith(q) ? 0 : 1;
            const bStarts = b.name.toLowerCase().startsWith(q) ? 0 : 1;

            return aStarts - bStarts;
        });
});


const emit = defineEmits<{
    (e: 'update:modelValue', value: number | null): void;
}>();

const cityOpen = ref(false);
const cityRoot = ref<HTMLElement | null>(null);

const selectedCityName = computed(() => {
    if (props.modelValue === null) {
        return '';
    }
    return props.cities.find((c) => c.id === props.modelValue)?.name ?? '';
});

function toggleCityOpen() {
    cityOpen.value = !cityOpen.value;
}

function onCityInput() {
    cityOpen.value = true;
    emit('update:modelValue', null);
}

function selectCity(city: CityModel) {
    emit('update:modelValue', city.id);
    searchQuery.value = city.name;
    cityOpen.value = false;
}

function selectAllCities() {
    emit('update:modelValue', null);
    searchQuery.value = '';
    cityOpen.value = false;
}

watch(
    () => props.modelValue,
    () => {
        searchQuery.value = selectedCityName.value || '';
    },
    { immediate: true },
);

function onDocumentClick(e: MouseEvent) {
    if (!(e.target instanceof Node)) {
        return;
    }
    if (cityRoot.value && !cityRoot.value.contains(e.target)) {
        cityOpen.value = false;
    }
}

onMounted(() => document.addEventListener('click', onDocumentClick));
onUnmounted(() => document.removeEventListener('click', onDocumentClick));
</script>

<template>
    <div class="gapper filter_inp relative flex h-full items-center gap-6">
        <label for="city" class="text-base text-white">Ваш город</label>
        <div ref="cityRoot" class="selected_block relative inline-block h-12">
            <div
                class="custom-select focus:shadow-outline flex h-12 w-52 items-center rounded-md border border-white px-4 py-2 pr-8 text-white shadow hover:border-gray-300 focus:outline-none"
                role="combobox"
                tabindex="0"
                :aria-expanded="cityOpen"
                @click.stop="cityOpen = true"
            >
                <input
                    v-model="searchQuery"
                    type="text"
                    placeholder="Select city"
                    class="w-full appearance-none border-none bg-transparent text-white outline-none ring-0 placeholder:text-white/70 focus:border-none focus:outline-none focus:ring-0"
                    @input="onCityInput"
                    @focus="cityOpen = true"
                />
                <img src="/images/png/icons/down.png" class="pointer-events-none absolute top-2 right-0 mt-3 mr-2 h-1 w-2" alt="" />
            </div>
            <div
                class="custom-options absolute z-40 mt-1 h-48 w-52 overflow-y-scroll rounded-b border border-gray-400 bg-white text-black shadow-lg"
                :class="{ hidden: !cityOpen }"
                role="listbox"
            >
                <div
                    class="custom-option cursor-pointer px-4 py-2 hover:bg-gray-200"
                    :class="{ 'filter-option-selected': props.modelValue === null }"
                    role="option"
                    :aria-selected="props.modelValue === null"
                    @click.stop="selectAllCities"
                >
                    Все города
                </div>
                <div
                    v-for="city in filteredCities"
                    :key="city.id"
                    class="custom-option cursor-pointer px-4 py-2 hover:bg-gray-200"
                    :class="{ 'filter-option-selected': city.id === props.modelValue }"
                    role="option"
                    :aria-selected="city.id === props.modelValue"
                    @click.stop="selectCity(city)"
                >
                    {{ city.name }}
                </div>
                <div v-if="filteredCities.length === 0" class="px-4 py-2 text-gray-500">Город не найден</div>
            </div>
        </div>
    </div>
</template>

<style scoped>
.filter-option-selected {
    background-color: #f9d914;
}
</style>
