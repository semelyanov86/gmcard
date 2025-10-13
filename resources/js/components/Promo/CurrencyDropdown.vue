<script setup lang="ts">
import { ref } from 'vue';

defineProps<{
    modelValue: string;
}>();

const emit = defineEmits<{
    'update:modelValue': [value: string];
}>();

const isOpen = ref(false);

function toggleDropdown() {
    isOpen.value = !isOpen.value;
}

function selectOption(value: string) {
    emit('update:modelValue', value);
    isOpen.value = false;
}
</script>

<template>
    <div class="relative inline-block">
        <button 
            @click="toggleDropdown" 
            type="button" 
            class="w-[112px] h-[38px] px-4 bg-white border border-gray-300 rounded-md shadow-sm text-sm leading-5 font-medium text-gray-700 hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:ring-blue active:bg-gray-100 active:text-gray-700 transition duration-150 ease-in-out flex items-center justify-between"
        >
            <span>{{ modelValue }}</span>
            <svg class="w-4 h-4 ml-2 -mr-1 text-[#2578cf]" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
        </button>
        <ul 
            v-show="isOpen" 
            class="absolute z-10 w-28 mt-2 bg-white border border-gray-300 rounded-md shadow-lg"
        >
            <li 
                @click="selectOption('%')" 
                class="py-2 px-4 text-sm leading-5 text-gray-700 hover:bg-blue-100 hover:text-blue-700 cursor-pointer"
            >
                %
            </li>
            <li 
                @click="selectOption('₽')" 
                class="py-2 px-4 text-sm leading-5 text-gray-700 hover:bg-blue-100 hover:text-blue-700 cursor-pointer"
            >
                ₽
            </li>
        </ul>
    </div>
</template>

