<script setup lang="ts">
import { LoaderCircle } from 'lucide-vue-next';
import { useAttrs, withDefaults } from 'vue';

const attrs = useAttrs();

const props = withDefaults(
    defineProps<{
        type?: 'button' | 'submit' | 'reset';
        loading?: boolean;
        disabled?: boolean;
        class?: string;
    }>(),
    {
        type: 'button',
        loading: false,
        disabled: false,
        class: '',
    },
);
</script>

<template>
    <button
        :type="props.type"
        :disabled="props.disabled || props.loading"
        class="flex w-full cursor-pointer items-center justify-center gap-2 rounded-2xl bg-[#F4D710] py-4 text-lg font-bold hover:bg-[#F9D914] disabled:cursor-not-allowed disabled:opacity-50"
        :class="props.class"
        v-bind="attrs"
    >
        <LoaderCircle v-if="props.loading" class="h-5 w-5 animate-spin" />
        <slot />
    </button>
</template>
