<script setup lang="ts"></script>

<template>
    <div class="relative h-[380px] w-full overflow-visible rounded-t-3xl">
        <div class="absolute -top-6 left-4 z-10">
            <img class="specImgSale h-[90px] w-[90px]" src="/images/png/images/discount.png" alt="Скидка на товар" />
        </div>
        <div class="absolute -top-6 right-10 z-10">
            <img class="specImgSale h-[70px] w-[120px] object-contain" src="/images/png/sale/delivary.png" alt="Скидка на товар" />
            <p id="sale_for_promo" class="inline-block rounded-lg border border-gray-200 bg-white px-2 py-1 font-bold text-black shadow-sm"></p>
        </div>
        <img src="https://vorle.ru/media/konkurs/logo/shuba1.jpg/" class="h-full w-full rounded-t-3xl object-cover" alt="Promo" />
    </div>
</template>
