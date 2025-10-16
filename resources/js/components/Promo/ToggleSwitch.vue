<script setup lang="ts">
defineProps<{
    modelValue: boolean;
}>();

defineEmits<{
    'update:modelValue': [value: boolean];
}>();
</script>

<template>
    <label class="toggle-switch relative inline-flex cursor-pointer items-center">
        <input
            type="checkbox"
            :checked="modelValue"
            @change="$emit('update:modelValue', ($event.target as HTMLInputElement).checked)"
            class="peer sr-only"
        />
        <div
            class="h-7 w-14 rounded-full border border-gray-200 bg-gray-200 peer-checked:border-blue-600 peer-checked:bg-blue-600 peer-focus:outline-none after:absolute after:top-[2px] after:left-[2px] after:h-6 after:w-6 after:rounded-full after:border after:border-gray-300 after:bg-white after:transition-all after:content-[''] peer-checked:after:translate-x-[1.75rem] peer-checked:after:border-white"
        ></div>
    </label>
</template>
