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
            class="toggle-bg relative h-7 w-14 rounded-full border border-gray-200 bg-gray-200 peer-checked:border-blue-600 peer-checked:bg-blue-600 peer-focus:outline-none"
        ></div>
    </label>
</template>

<style scoped>
.toggle-bg::after {
    content: '';
    position: absolute;
    top: 0.0625rem;
    left: 0.125rem;
    height: 1.5rem;
    width: 1.5rem;
    border-radius: 9999px;
    border: 1px solid rgb(209, 213, 219);
    background-color: white;
    transition: transform 0.2s ease-in-out;
}

.peer:checked ~ .toggle-bg::after {
    transform: translateX(1.55rem);
    border-color: white;
}
</style>
