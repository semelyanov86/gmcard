<script setup lang="ts">
import { LoaderCircle } from 'lucide-vue-next';
import { withDefaults, useAttrs } from 'vue';

const attrs = useAttrs();

const props = withDefaults(defineProps<{
    type?: 'button' | 'submit' | 'reset';
    loading?: boolean;
    disabled?: boolean;
    class?: string;
}>(), {
    type: 'button',
    loading: false,
    disabled: false,
    class: '',
});
</script>

<template>
    <button
        :type="props.type"
        :disabled="props.disabled || props.loading"
        class="bg-[#F4D710] hover:bg-[#F9D914] disabled:opacity-50 disabled:cursor-not-allowed py-4 w-full text-lg font-bold rounded-2xl cursor-pointer flex items-center justify-center gap-2"
        :class="props.class"
        v-bind="attrs"
    >
        <LoaderCircle v-if="props.loading" class="h-5 w-5 animate-spin" />
        <slot />
    </button>
    
</template>


