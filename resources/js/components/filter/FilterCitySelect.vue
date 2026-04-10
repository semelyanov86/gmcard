<script setup lang="ts">
import type { CityModel } from '@/types';
import { computed, onMounted, onUnmounted, ref } from 'vue';

const props = defineProps<{
    cities: CityModel[];
    modelValue: number | null;
}>();

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

function selectCity(city: CityModel) {
    emit('update:modelValue', city.id);
    cityOpen.value = false;
}

function selectAllCities() {
    emit('update:modelValue', null);
    cityOpen.value = false;
}

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
                class="custom-options absolute z-50 mt-1 h-48 w-52 overflow-y-scroll rounded-b border border-gray-400 bg-white text-black shadow-lg"
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
                    v-for="city in props.cities"
                    :key="city.id"
                    class="custom-option cursor-pointer px-4 py-2 hover:bg-gray-200"
                    :class="{ 'filter-option-selected': city.id === props.modelValue }"
                    role="option"
                    :aria-selected="city.id === props.modelValue"
                    @click.stop="selectCity(city)"
                >
                    {{ city.name }}
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
