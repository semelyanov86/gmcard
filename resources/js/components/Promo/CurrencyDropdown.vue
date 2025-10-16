<script setup lang="ts">
import ChevronDownIcon from '@/components/primitives/icons/ChevronDownIcon.vue';
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
            class="focus:ring-blue flex h-[38px] w-[112px] items-center justify-between rounded-md border border-gray-300 bg-white px-4 text-sm leading-5 font-medium text-gray-700 shadow-sm transition duration-150 ease-in-out hover:text-gray-500 focus:border-blue-300 focus:outline-none active:bg-gray-100 active:text-gray-700"
        >
            <span>{{ modelValue }}</span>
            <ChevronDownIcon custom-class="w-4 h-4 ml-2 -mr-1 text-[#2578cf]" />
        </button>
        <ul v-show="isOpen" class="absolute z-10 mt-2 w-28 rounded-md border border-gray-300 bg-white shadow-lg">
            <li @click="selectOption('%')" class="cursor-pointer px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-blue-100 hover:text-blue-700">
                %
            </li>
            <li @click="selectOption('₽')" class="cursor-pointer px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-blue-100 hover:text-blue-700">
                ₽
            </li>
        </ul>
    </div>
</template>
