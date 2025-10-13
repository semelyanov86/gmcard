<script setup lang="ts">
defineProps<{
    modelValue: boolean;
}>();

defineEmits<{
    'update:modelValue': [value: boolean];
}>();
</script>

<template>
    <label class="toggle-switch relative inline-flex items-center cursor-pointer">
        <input
            type="checkbox"
            :checked="modelValue"
            @change="$emit('update:modelValue', ($event.target as HTMLInputElement).checked)"
            class="sr-only peer"
        >
        <div class="w-14 h-7 bg-gray-200 border border-gray-200 peer-focus:outline-none rounded-full peer-checked:after:translate-x-[1.75rem] peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all peer-checked:bg-blue-600 peer-checked:border-blue-600"></div>
    </label>
</template>

