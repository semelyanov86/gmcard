<script setup lang="ts">
interface Props {
    customClass?: string;
}

const props = withDefaults(defineProps<Props>(), {
    customClass: '',
});
</script>

<template>
    <svg fill="currentColor" :class="['h-7 w-6', props.customClass]" viewBox="0 0 24 11" xmlns="http://www.w3.org/2000/svg">
        <path d="M24 11H0L12 0L24 11Z" fill="currentColor" />
    </svg>
</template>
