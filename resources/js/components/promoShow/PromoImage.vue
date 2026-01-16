<script setup lang="ts">
</script>

<template>
    <div class="relative w-full h-[380px] overflow-visible rounded-t-3xl">
        <div class="absolute -top-6 left-4 z-10">
            <img class="w-[90px] h-[90px] specImgSale" src="/images/png/images/discount.png" alt="Скидка на товар" />
        </div>
        <div class="absolute -top-6 right-10 z-10">
            <img class="w-[120px] h-[70px] specImgSale object-contain" src="/images/png/sale/delivary.png" alt="Скидка на товар" />
            <p id="sale_for_promo" class="bg-white px-2 py-1 rounded-lg font-bold text-black inline-block border border-gray-200 shadow-sm"></p>
        </div>
        <img src="https://vorle.ru/media/konkurs/logo/shuba1.jpg/" class="w-full h-full object-cover rounded-t-3xl" alt="Promo" />
    </div>
</template>

