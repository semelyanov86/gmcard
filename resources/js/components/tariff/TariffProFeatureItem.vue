<script setup lang="ts">
const props = defineProps<{
    text: string;
}>();
</script>

<template>
    <li class="mt-2 flex items-center">
        <img src="/images/svg/saleBlocks/plusSec.svg" alt="icon" class="mr-2 h-6 w-6" />
        {{ props.text }}
    </li>
</template>

