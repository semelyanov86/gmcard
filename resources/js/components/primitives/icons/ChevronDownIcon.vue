<script setup lang="ts">
interface Props {
    customClass?: string;
}

const props = withDefaults(defineProps<Props>(), {
    customClass: 'w-5 h-5',
});
</script>

<template>
    <svg :class="props.customClass" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M7 10L12 15L17 10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
    </svg>
</template>
