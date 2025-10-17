<script setup lang="ts">
defineProps<{
    disabled?: boolean;
    fullWidth?: boolean;
    large?: boolean;
}>();

defineEmits<{
    click: [];
}>();
</script>

<template>
    <button
        @click="$emit('click')"
        :disabled="disabled"
        :class="[
            'flex cursor-pointer items-center justify-center gap-3 rounded-md bg-[#1d89f2] shadow-lg hover:opacity-90',
            large ? 'w-full py-8 text-3xl font-bold' : 'h-[56px] w-[238px]',
            disabled ? 'opacity-50' : '',
            fullWidth ? 'max-md:w-full' : '',
        ]"
        type="button"
    >
        <slot />
    </button>
</template>

