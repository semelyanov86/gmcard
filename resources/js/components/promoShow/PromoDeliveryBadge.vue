<script setup lang="ts">
defineProps<{
    label: string | null;
}>();
</script>

<template>
    <div class="absolute -top-6 right-10 z-10">
        <img class="specImgSale promo-image-badge-delivery object-contain" src="/images/png/sale/delivary.png" alt="Скидка на товар" />
        <p id="sale_for_promo" class="inline-block rounded-lg border border-gray-200 bg-white px-2 py-1 font-bold text-black shadow-sm"></p>
    </div>
</template>

<style scoped>

</style>
