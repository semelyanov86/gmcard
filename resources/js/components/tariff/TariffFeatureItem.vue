<script setup lang="ts">
const props = defineProps<{
    text: string;
}>();
</script>

<template>
    <li class="flex items-center">
        <img src="/images/svg/saleBlocks/plus.svg" alt="icon" class="w-6 h-6 mr-2" />
        {{ props.text }}
    </li>
</template>



