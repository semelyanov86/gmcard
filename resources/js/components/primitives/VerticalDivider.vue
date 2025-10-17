<template>
    <div :class="customClass" class="absolute h-[29px] w-[1px] bg-[#c6c7c6]" />
</template>

<script setup lang="ts">
defineProps<{
    customClass?: string;
}>();
</script>

