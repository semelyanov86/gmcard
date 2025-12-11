<script setup lang="ts">
import SanatoriumPromotionCard from '@/components/main/SanatoriumPromotionCard.vue';
import { computed } from 'vue';
import type { ProfilePromo } from '@/types/promo/ProfilePromo';

const props = defineProps<{
    promos?: ProfilePromo[];
}>();

const featuredPromos = computed(() => props.promos ?? []);
</script>

<template>
    <div class="h-[1px] w-full bg-white opacity-10"></div>
    <div class="mt-6 mb-12 flex w-full flex-col">
        <h3 class="text-[34px] font-bold text-white">Популярные акции</h3>
        <div class="flex flex-wrap justify-between">

            <SanatoriumPromotionCard v-for="promo in featuredPromos" :key="promo.id" :promo="promo" />

            <div class="main_card relative mx-1 mt-11 w-[262px] rounded-xl lg:w-[232px]">
                <img src="/images/png/images/product1.png" class="w-full" alt="Товар" />
                <div class="absolute -top-6 left-4 z-40" data-tooltip-target="tooltip-default" type="button">
                    <span class="absolute top-2 left-3 text-start text-[13px] text-white italic"
                        >скидка до
                        <span class="text-4xl font-bold" style="font-style: normal">50</span>
                        <span class="absolute top-5 right-3 text-[13px] italic">%</span>
                    </span>
                    <img class="h-[79px] w-[83px]" src="/images/png/images/sale1.png" alt="Скидка на товар" />
                    <div
                        id="tooltip-default"
                        role="tooltip"
                        class="tooltip invisible absolute z-10 inline-block w-[250px] rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-700"
                    >
                        Скидки по промокодам и кэшбэк от онлайн-магазинов и сервисов - на одежду. Каждый день что-то новое.
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                </div>
                <div class="down_block h-[136px] rounded-b-3xl bg-white text-[15px] text-[#000000] lg:h-[150px]">
                    <h3 class="px-6 py-4">Скидка на модели AirMax до 50% в Магазине StoreShop</h3>
                    <div class="h-[1px] w-full bg-black opacity-10"></div>
                    <div class="flex items-center justify-between px-6 py-4">
                        <span class="text-[17px] font-bold">Скидка 50%</span>
                        <img src="/images/png/images/sale.png" class="h-[26px] w-[26px]" alt="скидка на товар" />
                    </div>
                </div>
            </div>

            <div class="main_card relative mx-1 mt-11 w-[262px] rounded-xl lg:w-[232px]">
                <img src="/images/png/images/product2.png" class="w-full" alt="Товар" />
                <div class="absolute -top-6 left-4 z-40" data-tooltip-target="tooltip-default" type="button">
                    <img class="h-[62px] w-[83px]" src="/images/png/images/sale2.png" alt="Скидка на товар" />
                    <div
                        id="tooltip-default"
                        role="tooltip"
                        class="tooltip invisible absolute z-10 inline-block w-[250px] rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-700"
                    >
                        Скидки по промокодам и кэшбэк от онлайн-магазинов и сервисов - на одежду. Каждый день что-то новое.
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                </div>
                <div class="down_block h-[136px] rounded-b-3xl bg-white text-[15px] text-[#000000] lg:h-[150px]">
                    <h3 class="px-6 py-4">Полный курс обучения вождению автомобиля потом</h3>
                    <div class="h-[1px] w-full bg-black opacity-10"></div>
                    <div class="flex items-center justify-between px-6 py-4">
                        <span class="text-[17px] font-bold">Купон на скидку 30%</span>
                        <img src="/images/png/images/sale2.png" class="h-[24px] w-[33px]" alt="скидка на товар" />
                    </div>
                </div>
                <span class="absolute top-0 left-0 h-full w-full rounded-3xl bg-[#02030a] opacity-0 transition-opacity duration-300 hover:opacity-75">
                    <span
                        class="absolute mt-16 flex w-full transform flex-col items-center gap-3 px-7 text-lg font-bold text-white"
                    >
                        <img src="/images/png/icons/end_sale.png" class="h-[60px] w-[60px]" alt="Время истек!" />
                        <span class="text-center text-xl">Акция доступна с 12:00 до 16:00</span>
                    </span>
                    <div class="absolute right-0 bottom-10 left-0 px-1.5">
                        <div class="flex justify-between text-lg">
                            <span class="rounded-md border p-1 text-white">пн</span>
                            <span class="active_day rounded-md border p-1 text-white">вт</span>
                            <span class="active_day rounded-md border p-1 text-white">ср</span>
                            <span class="rounded-md border p-1 text-white">чт</span>
                            <span class="active_day rounded-md border p-1 text-white">пт</span>
                            <span class="rounded-md border p-1 text-white">сб</span>
                            <span class="rounded-md border p-1 text-white">вс</span>
                        </div>
                    </div>
                </span>
            </div>

            <div class="main_card relative mx-1 mt-11 w-[262px] rounded-xl lg:w-[232px]">
                <img src="/images/png/images/product3.png" class="w-full" alt="Товар" />
                <div class="absolute -top-6 left-4 z-40" data-tooltip-target="tooltip-default" type="button">
                    <img class="h-[77px] w-[77px]" src="/images/png/images/sale.png" alt="Скидка на товар" />
                    <div
                        id="tooltip-default"
                        role="tooltip"
                        class="tooltip invisible absolute z-10 inline-block w-[250px] rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-700"
                    >
                        Скидки по промокодам и кэшбэк от онлайн-магазинов и сервисов - на одежду. Каждый день что-то новое.
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                </div>
                <div class="down_block h-[136px] rounded-b-3xl bg-white text-[15px] text-[#000000] lg:h-[150px]">
                    <h3 class="px-6 py-4">7 дней проживания с питанием в санатории "Солнечный"</h3>
                    <div class="h-[1px] w-full bg-black opacity-10"></div>
                    <div class="flex items-center justify-between px-6 py-4">
                        <span class="text-[17px] font-bold">Скидка 14 000 руб.</span>
                        <img src="/images/png/images/sale.png" class="h-[26px] w-[26px]" alt="скидка на товар" />
                    </div>
                </div>
            </div>


<!--            <div class="main_card relative mx-1 mt-11 w-[262px] rounded-xl lg:w-[232px]">-->
<!--                <img src="/images/png/images/product4.png" class="w-full" alt="Товар" />-->
<!--                <div class="absolute -top-6 left-4 z-40" data-tooltip-target="tooltip-default" type="button">-->
<!--                    <img class="h-[69px] w-[67px]" src="/images/png/images/present.png" alt="Скидка на товар" />-->
<!--                    <div-->
<!--                        id="tooltip-default"-->
<!--                        role="tooltip"-->
<!--                        class="tooltip invisible absolute z-10 inline-block w-[250px] rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-700"-->
<!--                    >-->
<!--                        Скидки по промокодам и кэшбэк от онлайн-магазинов и сервисов - на одежду. Каждый день что-то новое.-->
<!--                        <div class="tooltip-arrow" data-popper-arrow></div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="down_block h-[136px] rounded-b-3xl bg-white text-[15px] text-[#000000] lg:h-[150px]">-->
<!--                    <h3 class="px-6 py-4">Празднование любого торжества (юбилей)</h3>-->
<!--                    <div class="h-[1px] w-full bg-black opacity-10"></div>-->
<!--                    <div class="flex items-center justify-between px-6 py-4">-->
<!--                        <span class="text-[17px] font-bold">Подарок за покупку</span>-->
<!--                        <img src="/images/png/images/present.png" class="h-[26px] w-[26px]" alt="скидка на товар" />-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->

<!--            <div class="main_card relative mx-1 mt-11 w-[262px] rounded-xl lg:w-[232px]">-->
<!--                <img src="/images/png/images/product5.png" class="w-full" alt="Товар" />-->
<!--                <div class="absolute -top-6 left-4 z-50" data-tooltip-target="tooltip-default" type="button">-->
<!--                    <img class="h-[78px] w-[78px]" src="/images/png/images/sale3.png" alt="Скидка на товар" />-->
<!--                    <div-->
<!--                        id="tooltip-default"-->
<!--                        role="tooltip"-->
<!--                        class="tooltip invisible absolute z-10 inline-block w-[250px] rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-700"-->
<!--                    >-->
<!--                        Скидки по промокодам и кэшбэк от онлайн-магазинов и сервисов - на одежду. Каждый день что-то новое.-->
<!--                        <div class="tooltip-arrow" data-popper-arrow></div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="down_block h-[136px] rounded-b-3xl bg-white text-[15px] text-[#000000] lg:h-[150px]">-->
<!--                    <h3 class="px-6 py-4">Возвращаем деньги за покупку телефона Honor V10</h3>-->
<!--                    <div class="h-[1px] w-full bg-black opacity-10"></div>-->
<!--                    <div class="flex items-center justify-between px-6 py-4">-->
<!--                        <span class="text-[17px] font-bold">Кэшбек 10%</span>-->
<!--                        <img src="/images/png/images/sale3.png" class="h-[26px] w-[26px]" alt="скидка на товар" />-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="main_card relative mx-1 mt-11 w-[262px] rounded-xl lg:w-[232px]">-->
<!--                <img src="/images/png/images/product6.png" class="w-full" alt="Товар" />-->
<!--                <div class="absolute -top-6 left-4 z-50" data-tooltip-target="tooltip-default" type="button">-->
<!--                    <img class="h-[52px] w-[77px]" src="/images/png/images/sale4.png" alt="Скидка на товар" />-->
<!--                    <div-->
<!--                        id="tooltip-default"-->
<!--                        role="tooltip"-->
<!--                        class="tooltip invisible absolute z-10 inline-block w-[250px] rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-700"-->
<!--                    >-->
<!--                        Скидки по промокодам и кэшбэк от онлайн-магазинов и сервисов - на одежду. Каждый день что-то новое.-->
<!--                        <div class="tooltip-arrow" data-popper-arrow></div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="down_block h-[136px] rounded-b-3xl bg-white text-[15px] text-[#000000] lg:h-[150px]">-->
<!--                    <h3 class="px-6 py-4">При покупке двух часов третьи в подарок от производителя</h3>-->
<!--                    <div class="h-[1px] w-full bg-black opacity-10"></div>-->
<!--                    <div class="flex items-center justify-between px-6 py-4">-->
<!--                        <span class="text-[17px] font-bold">Акция 2+1</span>-->
<!--                        <img src="/images/png/images/sale4.png" class="h-[26px] w-[26px]" alt="скидка на товар" />-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="main_card relative mx-1 mt-11 w-[262px] rounded-xl lg:w-[232px]">-->
<!--                <img src="/images/png/images/product7.png" class="w-full" alt="Товар" />-->
<!--                <div class="absolute -top-6 left-4 z-50" data-tooltip-target="tooltip-default" type="button">-->
<!--                    <span class="absolute top-2 left-3 text-start text-[13px] text-white italic"-->
<!--                        >скидка до-->
<!--                        <span class="text-4xl font-bold" style="font-style: normal">80</span>-->
<!--                        <span class="absolute top-5 right-3 text-[13px] italic">%</span>-->
<!--                    </span>-->
<!--                    <img class="h-[80px] w-[84px]" src="/images/png/images/sale1.png" alt="Скидка на товар" />-->
<!--                    <div-->
<!--                        id="tooltip-default"-->
<!--                        role="tooltip"-->
<!--                        class="tooltip invisible absolute z-10 inline-block w-[250px] rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-700"-->
<!--                    >-->
<!--                        Скидки по промокодам и кэшбэк от онлайн-магазинов и сервисов - на одежду. Каждый день что-то новое.-->
<!--                        <div class="tooltip-arrow" data-popper-arrow></div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="down_block h-[136px] rounded-b-3xl bg-white text-[15px] text-[#000000] lg:h-[150px]">-->
<!--                    <h3 class="px-6 py-4">Аренда Porshe 911 на неделю со скидкой 80%</h3>-->
<!--                    <div class="h-[1px] w-full bg-black opacity-10"></div>-->
<!--                    <div class="flex items-center justify-between px-6 py-4">-->
<!--                        <span class="text-[17px] font-bold">Скидка 80%</span>-->
<!--                        <img src="/images/png/images/sale.png" class="h-[26px] w-[26px]" alt="скидка на товар" />-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="main_card relative mx-1 mt-11 w-[262px] rounded-xl lg:w-[232px]">-->
<!--                <img src="/images/png/images/product8.png" class="w-full" alt="Товар" />-->
<!--                <div class="absolute -top-6 left-4 z-50" data-tooltip-target="tooltip-default" type="button">-->
<!--                    <img class="h-[69px] w-[67px]" src="/images/png/images/podium.png" alt="Скидка на товар" />-->
<!--                    <div-->
<!--                        id="tooltip-default"-->
<!--                        role="tooltip"-->
<!--                        class="tooltip invisible absolute z-10 inline-block w-[250px] rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-700"-->
<!--                    >-->
<!--                        Скидки по промокодам и кэшбэк от онлайн-магазинов и сервисов - на одежду. Каждый день что-то новое.-->
<!--                        <div class="tooltip-arrow" data-popper-arrow></div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="down_block h-[136px] rounded-b-3xl bg-white text-[15px] text-[#000000] lg:h-[150px]">-->
<!--                    <h3 class="px-6 py-4">Конкурс на лучший дизайн одежды для швеи</h3>-->
<!--                    <div class="h-[1px] w-full bg-black opacity-10"></div>-->
<!--                    <div class="flex items-center justify-between px-6 py-4">-->
<!--                        <span class="text-[17px] font-bold">Конкурс</span>-->
<!--                        <img src="/images/png/images/podium.png" class="h-[26px] w-[26px]" alt="скидка на товар" />-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
            <div class="main_card relative mx-1 mt-11 w-[262px] rounded-xl lg:w-[232px]">
                <img src="/images/png/images/product9.png" class="w-full" alt="Товар" />
                <div class="absolute -top-6 left-4 z-50" data-tooltip-target="tooltip-default" type="button">
                    <img class="h-[54px] w-[82px]" src="/images/png/images/sale5.png" alt="Скидка на товар" />
                    <div
                        id="tooltip-default"
                        role="tooltip"
                        class="tooltip invisible absolute z-10 inline-block w-[250px] rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-700"
                    >
                        Скидки по промокодам и кэшбэк от онлайн-магазинов и сервисов - на одежду. Каждый день что-то новое.
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                </div>
                <div class="down_block h-[136px] rounded-b-3xl bg-white text-[15px] text-[#000000] lg:h-[150px]">
                    <h3 class="px-6 py-4">При покупке двух часов третьи в подарок от производителя</h3>
                    <div class="h-[1px] w-full bg-black opacity-10"></div>
                    <div class="flex items-center justify-between px-6 py-4">
                        <span class="text-[17px] font-bold">Акция 1+1</span>
                        <img src="/images/png/images/sale5.png" class="h-[26px] w-[26px]" alt="скидка на товар" />
                    </div>
                </div>
            </div>
            <div class="card main_card relative mx-1 mt-11 w-[262px] rounded-xl lg:w-[232px]">
                <img src="/images/png/images/product9.png" class="w-full" alt="Товар" />
                <div class="absolute -top-6 left-4 z-50" data-tooltip-target="tooltip-default" type="button">
                    <img class="h-[62px] w-[85px]" src="/images/png/images/sale2.png" alt="Скидка на товар" />
                    <div
                        id="tooltip-default"
                        role="tooltip"
                        class="tooltip invisible absolute z-10 inline-block w-[250px] rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-700"
                    >
                        Скидки по промокодам и кэшбэк от онлайн-магазинов и сервисов - на одежду. Каждый день что-то новое.
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                </div>
                <div class="down_block h-[136px] rounded-b-3xl bg-white text-[15px] text-[#000000] lg:h-[150px]">
                    <h3 class="px-6 py-4">Конкурс на лучший дизайн одежды для швеи</h3>
                    <div class="h-[1px] w-full bg-black opacity-10"></div>
                    <div class="flex items-center justify-between px-6 py-4">
                        <span class="text-[17px] font-bold">Купон на скидку 30%</span>
                        <img src="/images/png/images/sale2.png" class="h-[26px] w-[26px]" alt="скидка на товар" />
                    </div>
                </div>
                <span class="absolute top-0 left-0 h-full w-full rounded-3xl bg-[#02030a] opacity-0 transition-opacity duration-300 hover:opacity-75">
                    <span
                        class="absolute flex w-full mt-16 transform flex-col items-center gap-3 px-7 text-lg font-bold text-white"
                    >
                        <img src="/images/png/icons/end_sale.png" class="h-[60px] w-[60px]" alt="Время истек!" />
                        <span class="text-center text-xl">Акция доступна с 12:00 до 16:00</span>
                    </span>
                    <div class="absolute right-0 bottom-10 left-0 px-1.5">
                        <div class="flex justify-between text-lg">
                            <span class="rounded-md border p-1 text-white">пн</span>
                            <span class="active_day rounded-md border p-1 text-white">вт</span>
                            <span class="active_day rounded-md border p-1 text-white">ср</span>
                            <span class="rounded-md border p-1 text-white">чт</span>
                            <span class="active_day rounded-md border p-1 text-white">пт</span>
                            <span class="rounded-md border p-1 text-white">сб</span>
                            <span class="rounded-md border p-1 text-white">вс</span>
                        </div>
                    </div>
                </span>
            </div>
            <div class="main_card relative mx-1 mt-11 w-[262px] rounded-xl lg:w-[232px]">
                <img src="/images/png/images/product10.png" class="w-full" alt="Товар" />
                <div class="absolute -top-6 left-4 z-50" data-tooltip-target="tooltip-default" type="button">
                    <span class="absolute top-2 left-3 text-start text-[13px] text-white italic"
                        >скидка до
                        <span class="text-4xl font-bold" style="font-style: normal">20</span>
                        <span class="absolute top-5 right-3 text-[13px] italic">%</span>
                    </span>
                    <img class="h-[80px] w-[84px]" src="/images/png/images/sale1.png" alt="Скидка на товар" />
                    <div
                        id="tooltip-default"
                        role="tooltip"
                        class="tooltip invisible absolute z-10 inline-block w-[250px] rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-700"
                    >
                        Скидки по промокодам и кэшбэк от онлайн-магазинов и сервисов - на одежду. Каждый день что-то новое.
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                </div>
                <div class="down_block h-[136px] rounded-b-3xl bg-white text-[15px] text-[#000000] lg:h-[150px]">
                    <h3 class="px-6 py-4">7 дней на проживание в санатории "Солнечный"</h3>
                    <div class="h-[1px] w-full bg-black opacity-10"></div>
                    <div class="flex items-center justify-between px-6 py-4">
                        <span class="text-[17px] font-bold">Скидка 20%</span>
                        <img src="/images/png/images/sale.png" class="h-[26px] w-[26px]" alt="скидка на товар" />
                    </div>
                </div>
            </div>
            <div class="main_card relative mx-1 mt-11 w-[262px] rounded-xl lg:w-[232px]">
                <img src="/images/png/images/product8.png" class="w-full" alt="Товар" />
                <div class="absolute -top-6 left-4 z-50" data-tooltip-target="tooltip-default" type="button">
                    <img class="h-[69px] w-[67px]" src="/images/png/images/present.png" alt="Скидка на товар" />
                    <div
                        id="tooltip-default"
                        role="tooltip"
                        class="tooltip invisible absolute z-10 inline-block w-[250px] rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-700"
                    >
                        Скидки по промокодам и кэшбэк от онлайн-магазинов и сервисов - на одежду. Каждый день что-то новое.
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                </div>
                <div class="h-[136px] rounded-b-3xl bg-white text-[15px] text-[#000000] lg:h-[150px]">
                    <h3 class="px-6 py-4">Празднование любого торжества</h3>
                    <div class="h-[1px] w-full bg-black opacity-10"></div>
                    <div class="flex items-center justify-between px-6 py-4">
                        <span class="text-[17px] font-bold">Подарок за покупку</span>
                        <img src="/images/png/images/present.png" class="h-[26px] w-[26px]" alt="скидка на товар" />
                    </div>
                </div>
                <span class="absolute top-0 left-0 h-full w-full rounded-3xl bg-[#02030a] opacity-0 transition-opacity duration-300 hover:opacity-75">
                    <span
                        class="absolute flex w-full mt-16 transform flex-col items-center gap-3 px-7 text-lg font-bold text-white"
                    >
                        <img src="/images/png/icons/end_sale.png" class="h-[60px] w-[60px]" alt="Время истек!" />
                        <span class="text-center text-xl">Акция доступна с 12:00 до 18:00</span>
                    </span>
                </span>
            </div>
        </div>
        <div class="mt-16 flex items-center justify-center">
            <button class="flex h-[55px] w-[449px] items-center justify-center rounded-md bg-[#F9D914] text-center focus:ring-2 focus:ring-[#F9D914]">
                Показать еще
                <img src="/images/png/images/spiner.png" class="ml-4 h-[16px] w-[16px]" alt="loading" />
            </button>
        </div>
        <div class="mt-12 h-[1px] w-full bg-white opacity-10"></div>
    </div>
</template>

<style scoped></style>
