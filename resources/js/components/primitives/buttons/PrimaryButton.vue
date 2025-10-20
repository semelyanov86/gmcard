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
            'flex cursor-pointer items-center justify-center gap-3 rounded-md bg-brand-blue shadow-lg hover:opacity-90',
            large ? 'w-full py-8 text-3xl font-bold' : 'h-14 w-60',
            disabled ? 'opacity-50' : '',
            fullWidth ? 'max-md:w-full' : '',
        ]"
        type="button"
    >
        <slot />
    </button>
</template>

