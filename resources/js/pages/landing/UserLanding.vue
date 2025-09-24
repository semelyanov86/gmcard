<script setup lang="ts">
import '../../../css/internal/discount.css';
import AdaptiveImage from '@/components/ui/AdaptiveImage.vue';
</script>

<template>
    <body class="flex flex-col items-center justify-center py-10">
        <div class="header flex items-center justify-center gap-2">
            <AdaptiveImage image-path="discount_images/logo" alt="Логотип" image-class="h-14 w-14" :critical="true" />
            <span class="text-lg font-bold tracking-[4px] text-white">CARD</span>
        </div>
        <section class="flex flex-col">
            <div class="mt-12 tracking-[3px]">
                <p class="text-center text-[40px] font-bold text-white">
                    ВЕРНЁМ ВАМ ДО <span class="bg-[#f6db12] px-4 text-black">50%</span> <br />ОТ СТОИМОСТИ ЛЮБЫХ ПОКУПОК!
                </p>
                <p class="mt-5 mb-5 text-center text-[20px] font-bold text-[#f6db12]">7 дней премиума за регистрацию в подарок</p>
            </div>
            <button class="mx-auto mb-10 w-full max-w-[320px] cursor-pointer rounded-[50px] bg-[#f6db12] px-3 py-5 text-[19px] font-bold text-black">
                Присоедениться бесплатно
            </button>
            <div class="flex items-baseline justify-center">
                <div class="blockCol flex flex-col items-center justify-center">
                    <AdaptiveImage image-path="discount_images/computer" alt="" image-class="comp w-[183px] pl-[54px]" />
                    <p class="mt-3 max-w-[200px] text-center text-[14px] text-white">
                        Зарегистрируйтесь в GM или войдите под вашим логином и выберите любимый магазин
                    </p>
                </div>
                <AdaptiveImage image-path="discount_images/arrow" alt="" />
                <div class="blockCol flex flex-col items-center justify-center">
                    <AdaptiveImage image-path="discount_images/basket" alt="" image-class="cart w-[190px] pr-[59px]" />
                    <p class="mt-3 max-w-[200px] text-center text-[14px] text-white">Перейдите в магазин и совершите покупку как обычно</p>
                </div>
                <AdaptiveImage image-path="discount_images/arrow" alt="" />
                <div class="blockCol flex flex-col items-center justify-center">
                    <AdaptiveImage image-path="discount_images/pay" alt="" image-class="pay w-[85px] pr-[14px]" />
                    <p class="mt-3 max-w-[200px] text-center text-[14px] text-white">
                        Мы получаем комиссию от магазина и переводим кэшбэк на ваш счет
                    </p>
                </div>
            </div>
            <div class="mt-10">
                <p class="text-center text-[22px] font-bold text-white">
                    А также на сайте можно найти <br />
                    <span class="rounded-sm bg-[#f6db12] px-1 text-black"> бесплатные </span> купоны и промокоды <br />
                    на скидки до <span class="rounded-sm bg-[#f6db12] px-1 text-black">100%</span>
                </p>
            </div>
        </section>
<!--        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>-->
    </body>
</template>
