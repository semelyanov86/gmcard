<script setup lang="ts">
import '../../css/internal/output.css';
import Header from '@/components/Header.vue';
import FlashToaster from '@/components/system/FlashToaster.vue';
import CategoriesMenu from '@/components/CategoriesMenu.vue';
import NavBar from '@/components/NavBar.vue';
import { usePage } from '@inertiajs/vue3';
import type { AppPageProps } from '@/types';
import type { CategoryModel, MenuData } from '@/types';
import MobileMenu from '@/components/MobileMenu.vue';

const page = usePage<AppPageProps>();
const props = defineProps<{
    categories: CategoryModel[];
    navbarMenu: MenuData[];
}>();
</script>

<template>
    <div class="main-page">
        <Header :user-data="page.props.userData" />
        <FlashToaster />

        <section id="section-1" class="body h-full max-w-full overflow-hidden pb-9">
            <MobileMenu />
            <div class="mx-auto w-[1140px] 2xl:w-full 2xl:px-4">
                <NavBar :menu-items="props.navbarMenu" />
                <CategoriesMenu :categories="props.categories" />

                <div id="controls-carousel" class="banner_one relative w-full py-10" data-carousel="static">
                    <div class="banner_all relative flex h-96 items-center overflow-hidden rounded-2xl shadow-2xl">
                        <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
                            <img src="/images/png/images/banner.png" class="absolute mt-6 block h-full w-full shadow-2xl" alt="..." />
                            <img src="/images/png/images/discount.png" alt="Скидка на товар" class="discount_ofBanner absolute top-0 left-10 z-50" />
                            <img
                                src="/images/png/images/discount.png"
                                alt="Скидка на товар"
                                class="discount_ofBanner1 absolute top-0 right-6 z-50 hidden"
                            />
                            <div class="verhniy_block absolute top-12 right-[240px] flex flex-col gap-10 2xl:right-[200px]">
                                <div class="div_verh flex items-center gap-2 rounded-md bg-[#F5F5F5] px-10 py-2">
                                    <span class="span_text text-[15px]">До конца акции</span>
                                    <img src="/images/png/images/alarm.png" alt="Время акции" />
                                    <span class="span_text-1 text-xl font-bold">4 дня 15:13:15</span>
                                </div>
                                <h3 class="text_large w-[280px] text-[31px] font-bold">Скидка -50% на стрижку! Так можем только мы!</h3>
                            </div>
                            <div class="nijniy_block absolute right-[320px] bottom-6 flex items-center justify-start">
                                <img src="/images/png/images/sale.png" class="mr-1 h-[37px] w-[37px]" alt="Скидка" />
                                <span class="skidki text-[27px] font-bold">Скидка от 150 руб.</span>
                            </div>
                            <div class="span_like absolute top-12 right-6 ml-16 flex items-center gap-2 rounded-md bg-[#0B9A5C] px-6 py-2">
                                <a href="#"
                                    ><img src="/images/png/images/heart.png" class="h-[16px] w-[16px] opacity-70 hover:opacity-100" alt="Сердце"
                                /></a>
                                <span class="text-white">1258</span>
                            </div>
                            <div class="absolute right-6 bottom-6 flex flex-col items-center">
                                <a
                                    href="#"
                                    class="btn_info rounded-lg bg-[#F9D914] px-12 py-4 text-[16px] font-bold text-[#9d7307] focus:ring-2 focus:ring-[#F9D914] min-lg:px-20"
                                    >Подробнее</a
                                >
                            </div>
                        </div>
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img
                                src="/images/png/images/banner.png"
                                class="banner_one shadow-b-2xl filter: drop-shadow(0 3px 0 rgba(0,26,40,.29)) absolute mt-6 block h-full w-full"
                                alt="..."
                            />
                        </div>
                    </div>
                    <button
                        type="button"
                        class="group absolute top-6 -left-3 z-30 flex h-full cursor-pointer items-center justify-center focus:outline-none"
                        data-carousel-prev
                    >
                        <span
                            class="dark:group-focus:ring-bg-[#F9D914] inline-flex h-10 w-10 items-center justify-center rounded-full bg-[#F9D914] group-hover:bg-[#F9D914] group-focus:ring-1 group-focus:ring-[#F9D914] group-focus:outline-none dark:bg-gray-800/30 dark:group-hover:bg-gray-800/60"
                        >
                            <svg
                                aria-hidden="true"
                                class="h-6 w-6 text-black"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                            </svg>
                            <span class="sr-only">Previous</span>
                        </span>
                    </button>
                    <button
                        type="button"
                        class="group absolute top-6 -right-3 z-30 flex h-full cursor-pointer items-center justify-center focus:outline-none"
                        data-carousel-next
                    >
                        <span
                            class="dark:group-focus:ring-bg-[#F9D914] inline-flex h-10 w-10 items-center justify-center rounded-full bg-[#F9D914] group-hover:bg-[#F9D914] group-focus:ring-1 group-focus:ring-[#F9D914] group-focus:outline-none dark:bg-gray-800/30 dark:group-hover:bg-gray-800/60"
                        >
                            <svg
                                aria-hidden="true"
                                class="h-6 w-6 text-black"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                            <span class="sr-only">Next</span>
                        </span>
                    </button>
                </div>

                <div class="swiper-container block_under my-10 hidden">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide mr-2 rounded-2xl">
                            <img src="/images/png/images/banner.png" alt="баннер" class="h-[150px] w-full" />
                        </div>

                        <div class="swiper-slide mr-2 rounded-2xl" style="background-image: url(https://source.unsplash.com/random?sig=53)"></div>
                    </div>
                </div>

                <div class="filter_block z-31 mb-6 flex h-[46px] items-center justify-between lg:h-full">
                    <h3 class="text_filter text-2xl font-bold text-white">Фильтровать</h3>
                    <div class="gapper filter_inp relative flex h-full items-center gap-6 lg:flex-col">
                        <label for="city" class="text-[15px] text-white">Ваш город</label>
                        <div class="selected_block relative inline-block h-[46px]">
                            <div
                                class="custom-select focus:shadow-outline flex h-[46px] w-[202px] appearance-none items-center rounded-md border border-white bg-none px-4 py-2 pr-8 leading-tight text-white shadow hover:border-gray-300 focus:outline-none"
                            >
                                <span class="mr-2">Чебоксары</span>
                                <img
                                    src="/images/png/icons/down.png"
                                    class="pointer-events-none absolute top-2 right-0 mt-3 mr-2 h-[5px] w-2"
                                    alt="Вверх"
                                    id="icons"
                                />
                            </div>
                            <div
                                class="custom-options absolute z-50 mt-1 hidden h-[200px] w-[202px] overflow-y-scroll rounded-b border border-gray-400 bg-white shadow-lg"
                            >
                                <div class="custom-option cursor-pointer bg-[#F9D914] px-4 py-2 hover:bg-gray-200">Чебоксары</div>
                                <div class="custom-option cursor-pointer px-4 py-2 hover:bg-gray-200">Москва</div>
                                <div class="custom-option cursor-pointer px-4 py-2 hover:bg-gray-200">Санкт-Петербург</div>
                                <div class="custom-option cursor-pointer px-4 py-2 hover:bg-gray-200">Другой город</div>
                            </div>
                        </div>
                    </div>
                    <div class="gapper filter_inp relative flex items-center gap-6 lg:flex-col">
                        <label for="shop" class="tex-[15px] text-white">Скидки</label>
                        <div class="selected_block relative inline-block h-[46px]">
                            <div
                                id="custom_select"
                                class="custom_select focus:shadow-outline flex h-[46px] w-[202px] appearance-none items-center rounded-md border border-white bg-none px-4 py-2 pr-8 leading-tight text-white shadow hover:border-gray-300 focus:outline-none"
                            >
                                <div id="spaner" class="mr-2">Не менее 5%</div>
                                <img
                                    src="/images/png/icons/down.png"
                                    class="pointer-events-none absolute top-2 right-0 mt-3 mr-2 h-[5px] w-2"
                                    alt="Вверх"
                                    id="icons"
                                />
                            </div>
                            <div
                                class="custom-options_1 absolute z-50 mt-1 hidden h-[200px] w-[202px] overflow-y-scroll rounded-b border border-gray-400 bg-white shadow-lg"
                            >
                                <div class="custom-option_1 cursor-pointer bg-[#F9D914] px-4 py-2 hover:bg-gray-200">Не менее 5%</div>
                                <div class="custom-option_1 cursor-pointer px-4 py-2 hover:bg-gray-200">Не менее 10%</div>
                                <div class="custom-option_1 cursor-pointer px-4 py-2 hover:bg-gray-200">Не менее 15%</div>
                                <div class="custom-option_1 cursor-pointer px-4 py-2 hover:bg-gray-200">Не менее 20%</div>
                                <div class="custom-option_1 cursor-pointer px-4 py-2 hover:bg-gray-200">Не менее 25%</div>
                                <div class="custom-option_1 cursor-pointer px-4 py-2 hover:bg-gray-200">Не менее 30%</div>
                                <div class="custom-option_1 cursor-pointer px-4 py-2 hover:bg-gray-200">Не менее 35%</div>
                                <div class="custom-option_1 cursor-pointer px-4 py-2 hover:bg-gray-200">Не менее 40%</div>
                                <div class="custom-option_1 cursor-pointer px-4 py-2 hover:bg-gray-200">Не менее 45%</div>
                                <div class="custom-option_1 cursor-pointer px-4 py-2 hover:bg-gray-200">Не менее 50%</div>
                                <div class="custom-option_1 cursor-pointer px-4 py-2 hover:bg-gray-200">Не менее 55%</div>
                                <div class="custom-option_1 cursor-pointer px-4 py-2 hover:bg-gray-200">Не менее 60%</div>
                                <div class="custom-option_1 cursor-pointer px-4 py-2 hover:bg-gray-200">Не менее 65%</div>
                                <div class="custom-option_1 cursor-pointer px-4 py-2 hover:bg-gray-200">Не менее 70%</div>
                                <div class="custom-option_1 cursor-pointer px-4 py-2 hover:bg-gray-200">Не менее 75%</div>
                                <div class="custom-option_1 cursor-pointer px-4 py-2 hover:bg-gray-200">Не менее 80%</div>
                                <div class="custom-option_1 cursor-pointer px-4 py-2 hover:bg-gray-200">Не менее 85%</div>
                                <div class="custom-option_1 cursor-pointer px-4 py-2 hover:bg-gray-200">Не менее 90%</div>
                                <div class="custom-option_1 cursor-pointer px-4 py-2 hover:bg-gray-200">Не менее 95%</div>
                                <div class="custom-option_1 cursor-pointer px-4 py-2 hover:bg-gray-200">Не менее 100%</div>
                            </div>
                        </div>
                    </div>
                    <div class="gapper filter_inp relative flex items-center gap-6 lg:flex-col">
                        <label for="sale" class="tex-[15px] text-white">Вид акции</label>
                        <div class="selected_block relative inline-block h-[46px]">
                            <div
                                class="custom_selected focus:shadow-outline flex h-[46px] w-[202px] appearance-none items-center rounded-md border border-white bg-none px-4 py-2 pr-8 leading-tight text-white shadow hover:border-gray-300 focus:outline-none"
                            >
                                <div id="spaner1" class="mr-2">Все</div>
                                <img
                                    src="/images/png/icons/down.png"
                                    class="pointer-events-none absolute top-2 right-0 mt-3 mr-2 h-[5px] w-2"
                                    alt="Вверх"
                                    id="icons"
                                />
                            </div>
                            <div
                                class="custom-options_2 absolute z-50 mt-1 hidden h-[200px] w-[202px] overflow-y-scroll rounded-b border border-gray-400 bg-white shadow-lg"
                            >
                                <div class="custom-option_2 cursor-pointer bg-[#F9D914] px-4 py-2 hover:bg-gray-200">Все</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="h-[1px] w-full bg-white opacity-10"></div>
                <div class="mt-6 mb-12 flex w-full flex-col">
                    <h3 class="text-[34px] font-bold text-white">Популярные акции</h3>
                    <div class="flex flex-wrap justify-between">
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
                                <h3 class="px-6 py-4">Полный курс обучения вождению автомобиля</h3>
                                <div class="h-[1px] w-full bg-black opacity-10"></div>
                                <div class="flex items-center justify-between px-6 py-4">
                                    <span class="text-[17px] font-bold">Купон на скидку 30%</span>
                                    <img src="/images/png/images/sale2.png" class="h-[24px] w-[33px]" alt="скидка на товар" />
                                </div>
                            </div>
                            <span
                                class="absolute top-0 left-0 h-full w-full rounded-3xl bg-[#02030a] opacity-0 transition-opacity duration-300 hover:opacity-75"
                            >
                                <span
                                    class="absolute top-1/2 left-1/2 flex w-full -translate-x-1/2 -translate-y-1/2 transform flex-col items-center gap-3 px-7 text-lg font-bold text-white"
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
                        <div class="main_card relative mx-1 mt-11 w-[262px] rounded-xl lg:w-[232px]">
                            <img src="/images/png/images/product4.png" class="w-full" alt="Товар" />
                            <div class="absolute -top-6 left-4 z-40" data-tooltip-target="tooltip-default" type="button">
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
                            <div class="down_block h-[136px] rounded-b-3xl bg-white text-[15px] text-[#000000] lg:h-[150px]">
                                <h3 class="px-6 py-4">Празднование любого торжества (юбилей)</h3>
                                <div class="h-[1px] w-full bg-black opacity-10"></div>
                                <div class="flex items-center justify-between px-6 py-4">
                                    <span class="text-[17px] font-bold">Подарок за покупку</span>
                                    <img src="/images/png/images/present.png" class="h-[26px] w-[26px]" alt="скидка на товар" />
                                </div>
                            </div>
                        </div>
                        <div class="main_card relative mx-1 mt-11 w-[262px] rounded-xl lg:w-[232px]">
                            <img src="/images/png/images/product5.png" class="w-full" alt="Товар" />
                            <div class="absolute -top-6 left-4 z-50" data-tooltip-target="tooltip-default" type="button">
                                <img class="h-[78px] w-[78px]" src="/images/png/images/sale3.png" alt="Скидка на товар" />
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
                                <h3 class="px-6 py-4">Возвращаем деньги за покупку телефона Honor V10</h3>
                                <div class="h-[1px] w-full bg-black opacity-10"></div>
                                <div class="flex items-center justify-between px-6 py-4">
                                    <span class="text-[17px] font-bold">Кэшбек 10%</span>
                                    <img src="/images/png/images/sale3.png" class="h-[26px] w-[26px]" alt="скидка на товар" />
                                </div>
                            </div>
                        </div>
                        <div class="main_card relative mx-1 mt-11 w-[262px] rounded-xl lg:w-[232px]">
                            <img src="/images/png/images/product6.png" class="w-full" alt="Товар" />
                            <div class="absolute -top-6 left-4 z-50" data-tooltip-target="tooltip-default" type="button">
                                <img class="h-[52px] w-[77px]" src="/images/png/images/sale4.png" alt="Скидка на товар" />
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
                                    <span class="text-[17px] font-bold">Акция 2+1</span>
                                    <img src="/images/png/images/sale4.png" class="h-[26px] w-[26px]" alt="скидка на товар" />
                                </div>
                            </div>
                        </div>
                        <div class="main_card relative mx-1 mt-11 w-[262px] rounded-xl lg:w-[232px]">
                            <img src="/images/png/images/product7.png" class="w-full" alt="Товар" />
                            <div class="absolute -top-6 left-4 z-50" data-tooltip-target="tooltip-default" type="button">
                                <span class="absolute top-2 left-3 text-start text-[13px] text-white italic"
                                    >скидка до
                                    <span class="text-4xl font-bold" style="font-style: normal">80</span>
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
                                <h3 class="px-6 py-4">Аренда Porshe 911 на неделю со скидкой 80%</h3>
                                <div class="h-[1px] w-full bg-black opacity-10"></div>
                                <div class="flex items-center justify-between px-6 py-4">
                                    <span class="text-[17px] font-bold">Скидка 80%</span>
                                    <img src="/images/png/images/sale.png" class="h-[26px] w-[26px]" alt="скидка на товар" />
                                </div>
                            </div>
                        </div>
                        <div class="main_card relative mx-1 mt-11 w-[262px] rounded-xl lg:w-[232px]">
                            <img src="/images/png/images/product8.png" class="w-full" alt="Товар" />
                            <div class="absolute -top-6 left-4 z-50" data-tooltip-target="tooltip-default" type="button">
                                <img class="h-[69px] w-[67px]" src="/images/png/images/podium.png" alt="Скидка на товар" />
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
                                    <span class="text-[17px] font-bold">Конкурс</span>
                                    <img src="/images/png/images/podium.png" class="h-[26px] w-[26px]" alt="скидка на товар" />
                                </div>
                            </div>
                        </div>
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
                            <span
                                class="absolute top-0 left-0 h-full w-full rounded-3xl bg-[#02030a] opacity-0 transition-opacity duration-300 hover:opacity-75"
                            >
                                <span
                                    class="absolute top-1/2 left-1/2 flex w-full -translate-x-1/2 -translate-y-1/2 transform flex-col items-center gap-3 px-7 text-lg font-bold text-white"
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
                            <span
                                class="absolute top-0 left-0 h-full w-full rounded-3xl bg-[#02030a] opacity-0 transition-opacity duration-300 hover:opacity-75"
                            >
                                <span
                                    class="absolute top-1/2 left-1/2 flex w-full -translate-x-1/2 -translate-y-1/2 transform flex-col items-center gap-3 px-7 text-lg font-bold text-white"
                                >
                                    <img src="/images/png/icons/end_sale.png" class="h-[60px] w-[60px]" alt="Время истек!" />
                                    <span class="text-center text-xl">Акция доступна с 12:00 до 18:00</span>
                                </span>
                            </span>
                        </div>
                    </div>
                    <div class="mt-16 flex items-center justify-center">
                        <button
                            class="flex h-[55px] w-[449px] items-center justify-center rounded-md bg-[#F9D914] text-center focus:ring-2 focus:ring-[#F9D914]"
                        >
                            Показать еще
                            <img src="/images/png/images/spiner.png" class="ml-4 h-[16px] w-[16px]" alt="loading" />
                        </button>
                    </div>
                    <div class="mt-12 h-[1px] w-full bg-white opacity-10"></div>
                    <div id="popular" class="mt-6 mb-12 flex w-full flex-col">
                        <h3 class="text-[34px] font-bold text-white">Популярные акции</h3>
                        <div class="flex flex-wrap justify-between">
                            <div class="main_card mx-1 mt-11 h-[327px] w-[263px] overflow-hidden rounded-3xl bg-white shadow-md lg:w-[232px]">
                                <div class="relative flex h-[153px] items-center justify-center">
                                    <img src="/images/png/images/ali.png" alt="Название магазина" />
                                    <img
                                        src="/images/png/images/shape.png"
                                        class="absolute top-4 right-4 h-5 w-5 cursor-pointer hover:opacity-70"
                                        alt="Лайк"
                                    />
                                </div>
                                <div class="h-[1px] w-full bg-black opacity-10"></div>
                                <ul class="list-none px-3 py-5 text-center">
                                    <li><a href="#" class="text-[15px] opacity-50">AliExpress</a></li>
                                    <li><a href="#" class="text-xl font-bold">Кэшбек до 5.0%</a></li>
                                    <li><a href="#" class="text-sm text-[#0081db] hover:border-b-2 hover:border-b-[#0081db]">Подробнее</a></li>
                                    <li>
                                        <a
                                            href="#"
                                            class="mt-2 flex h-[57px] w-full items-center justify-center rounded-xl bg-[#152041] pl-8 text-lg font-bold text-white hover:bg-[#20305e] focus:ring-2 focus:ring-[#20305e]"
                                            >В магазин
                                            <svg xmlns="http://www.w3.org/2000/svg" class="ml-10 h-5 w-5 text-white" viewBox="0 0 512 512">
                                                <path
                                                    fill="none"
                                                    stroke="currentColor"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="48"
                                                    d="M184 112l144 144-144 144"
                                                />
                                            </svg>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="main_card mt-11 h-[327px] w-[263px] overflow-hidden rounded-3xl bg-white shadow-md lg:w-[232px]">
                                <div class="relative flex h-[153px] items-center justify-center">
                                    <img src="/images/png/images/lamoda.png" alt="Название магазина" />
                                    <img
                                        src="/images/png/images/shape_1.png"
                                        class="absolute top-4 right-4 h-5 w-5 cursor-pointer hover:opacity-70"
                                        alt="Лайк"
                                    />
                                </div>
                                <div class="h-[1px] w-full bg-black opacity-10"></div>
                                <ul class="list-none px-3 py-5 text-center">
                                    <li><a href="#" class="text-[15px] opacity-50">Lamoda RU</a></li>
                                    <li><a href="#" class="text-xl font-bold">Кэшбек до 4.5%</a></li>
                                    <li><a href="#" class="text-sm text-[#0081db] hover:border-b-2 hover:border-b-[#0081db]">Подробнее</a></li>
                                    <li>
                                        <a
                                            href="#"
                                            class="mt-2 flex h-[57px] w-full items-center justify-center rounded-xl bg-[#152041] pl-8 text-lg font-bold text-white hover:bg-[#20305e] focus:ring-2 focus:ring-[#20305e]"
                                            >В магазин
                                            <svg xmlns="http://www.w3.org/2000/svg" class="ml-10 h-5 w-5 text-white" viewBox="0 0 512 512">
                                                <path
                                                    fill="none"
                                                    stroke="currentColor"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="48"
                                                    d="M184 112l144 144-144 144"
                                                />
                                            </svg>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="main_card mt-11 h-[327px] w-[263px] overflow-hidden rounded-3xl bg-white shadow-md lg:w-[232px]">
                                <div class="relative flex h-[153px] items-center justify-center">
                                    <img src="/images/png/images/ebay.png" alt="Название магазина" />
                                    <img
                                        src="/images/png/images/shape.png"
                                        class="absolute top-4 right-4 h-5 w-5 cursor-pointer hover:opacity-70"
                                        alt="Лайк"
                                    />
                                </div>
                                <div class="h-[1px] w-full bg-black opacity-10"></div>
                                <ul class="list-none px-3 py-5 text-center">
                                    <li><a href="#" class="text-[15px] opacity-50">Ebay US</a></li>
                                    <li><a href="#" class="text-xl font-bold">Кэшбек до 5.0%</a></li>
                                    <li><a href="#" class="text-sm text-[#0081db] hover:border-b-2 hover:border-b-[#0081db]">Подробнее</a></li>
                                    <li>
                                        <a
                                            href="#"
                                            class="mt-2 flex h-[57px] w-full items-center justify-center rounded-xl bg-[#152041] pl-8 text-lg font-bold text-white hover:bg-[#20305e] focus:ring-2 focus:ring-[#20305e]"
                                            >В магазин
                                            <svg xmlns="http://www.w3.org/2000/svg" class="ml-10 h-5 w-5 text-white" viewBox="0 0 512 512">
                                                <path
                                                    fill="none"
                                                    stroke="currentColor"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="48"
                                                    d="M184 112l144 144-144 144"
                                                />
                                            </svg>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="main_card mt-11 h-[327px] w-[263px] overflow-hidden rounded-3xl bg-white shadow-md lg:w-[232px]">
                                <div class="relative flex h-[153px] items-center justify-center">
                                    <img src="/images/png/images/ulmart.png" alt="Название магазина" />
                                    <img
                                        src="/images/png/images/shape.png"
                                        class="absolute top-4 right-4 h-5 w-5 cursor-pointer hover:opacity-70"
                                        alt="Лайк"
                                    />
                                </div>
                                <div class="h-[1px] w-[262px] bg-black opacity-10"></div>
                                <ul class="list-none px-3 py-5 text-center">
                                    <li><a href="#" class="text-[15px] opacity-50">Юлмарт</a></li>
                                    <li><a href="#" class="text-xl font-bold">Кэшбек до 5.0%</a></li>
                                    <li><a href="#" class="text-sm text-[#0081db] hover:border-b-2 hover:border-b-[#0081db]">Подробнее</a></li>
                                    <li>
                                        <a
                                            href="#"
                                            class="mt-2 flex h-[57px] w-full items-center justify-center rounded-xl bg-[#152041] pl-8 text-lg font-bold text-white hover:bg-[#20305e] focus:ring-2 focus:ring-[#20305e]"
                                            >В магазин
                                            <svg xmlns="http://www.w3.org/2000/svg" class="ml-10 h-5 w-5 text-white" viewBox="0 0 512 512">
                                                <path
                                                    fill="none"
                                                    stroke="currentColor"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="48"
                                                    d="M184 112l144 144-144 144"
                                                />
                                            </svg>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="main_card mt-11 h-[327px] w-[263px] overflow-hidden rounded-3xl bg-white shadow-md lg:w-[232px]">
                                <div class="relative flex h-[153px] items-center justify-center">
                                    <img src="/images/png/images/tvoe.png" alt="Название магазина" />
                                    <img
                                        src="/images/png/images/shape_1.png"
                                        class="absolute top-4 right-4 h-5 w-5 cursor-pointer hover:opacity-70"
                                        alt="Лайк"
                                    />
                                </div>
                                <div class="h-[1px] w-full bg-black opacity-10"></div>
                                <ul class="list-none px-3 py-5 text-center">
                                    <li><a href="#" class="text-[15px] opacity-50">Твое</a></li>
                                    <li><a href="#" class="text-xl font-bold">Кэшбек до 5.0%</a></li>
                                    <li><a href="#" class="text-sm text-[#0081db] hover:border-b-2 hover:border-b-[#0081db]">Подробнее</a></li>
                                    <li>
                                        <a
                                            href="#"
                                            class="mt-2 flex h-[57px] w-full items-center justify-center rounded-xl bg-[#152041] pl-8 text-lg font-bold text-white hover:bg-[#20305e] focus:ring-2 focus:ring-[#20305e]"
                                            >В магазин
                                            <svg xmlns="http://www.w3.org/2000/svg" class="ml-10 h-5 w-5 text-white" viewBox="0 0 512 512">
                                                <path
                                                    fill="none"
                                                    stroke="currentColor"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="48"
                                                    d="M184 112l144 144-144 144"
                                                />
                                            </svg>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="main_card mt-11 h-[327px] w-[263px] overflow-hidden rounded-3xl bg-white shadow-md lg:w-[232px]">
                                <div class="relative flex h-[153px] items-center justify-center">
                                    <img src="/images/png/images/ozon.png" alt="Название магазина" />
                                    <img
                                        src="/images/png/images/shape.png"
                                        class="absolute top-4 right-4 h-5 w-5 cursor-pointer hover:opacity-70"
                                        alt="Лайк"
                                    />
                                </div>
                                <div class="h-[1px] w-full bg-black opacity-10"></div>
                                <ul class="list-none px-3 py-5 text-center">
                                    <li><a href="#" class="text-[15px] opacity-50">Ozon</a></li>
                                    <li><a href="#" class="text-xl font-bold">Кэшбек до 4.5%</a></li>
                                    <li><a href="#" class="text-sm text-[#0081db] hover:border-b-2 hover:border-b-[#0081db]">Подробнее</a></li>
                                    <li>
                                        <a
                                            href="#"
                                            class="mt-2 flex h-[57px] w-full items-center justify-center rounded-xl bg-[#152041] pl-8 text-lg font-bold text-white hover:bg-[#20305e] focus:ring-2 focus:ring-[#20305e]"
                                            >В магазин
                                            <svg xmlns="http://www.w3.org/2000/svg" class="ml-10 h-5 w-5 text-white" viewBox="0 0 512 512">
                                                <path
                                                    fill="none"
                                                    stroke="currentColor"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="48"
                                                    d="M184 112l144 144-144 144"
                                                />
                                            </svg>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="main_card mt-11 h-[327px] w-[263px] overflow-hidden rounded-3xl bg-white shadow-md lg:w-[232px]">
                                <div class="relative flex h-[153px] items-center justify-center">
                                    <img src="/images/png/images/booking.png" alt="Название магазина" />
                                    <img
                                        src="/images/png/images/shape.png"
                                        class="absolute top-4 right-4 h-5 w-5 cursor-pointer hover:opacity-70"
                                        alt="Лайк"
                                    />
                                </div>
                                <div class="h-[1px] w-full bg-black opacity-10"></div>
                                <ul class="list-none px-3 py-5 text-center">
                                    <li><a href="#" class="text-[15px] opacity-50">Booking</a></li>
                                    <li><a href="#" class="text-xl font-bold">Кэшбек до 1.5%</a></li>
                                    <li><a href="#" class="text-sm text-[#0081db] hover:border-b-2 hover:border-b-[#0081db]">Подробнее</a></li>
                                    <li>
                                        <a
                                            href="#"
                                            class="mt-2 flex h-[57px] w-full items-center justify-center rounded-xl bg-[#152041] pl-8 text-lg font-bold text-white hover:bg-[#20305e] focus:ring-2 focus:ring-[#20305e]"
                                            >В магазин
                                            <svg xmlns="http://www.w3.org/2000/svg" class="ml-10 h-5 w-5 text-white" viewBox="0 0 512 512">
                                                <path
                                                    fill="none"
                                                    stroke="currentColor"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="48"
                                                    d="M184 112l144 144-144 144"
                                                />
                                            </svg>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="main_card mt-11 h-[327px] w-[263px] overflow-hidden rounded-3xl bg-white shadow-md lg:w-[232px]">
                                <div class="relative flex h-[153px] items-center justify-center">
                                    <img src="/images/png/images/video.png" alt="Название магазина" />
                                    <img
                                        src="/images/png/images/shape.png"
                                        class="absolute top-4 right-4 h-5 w-5 cursor-pointer hover:opacity-70"
                                        alt="Лайк"
                                    />
                                </div>
                                <div class="h-[1px] w-full bg-black opacity-10"></div>
                                <ul class="list-none px-3 py-5 text-center">
                                    <li><a href="#" class="text-[15px] opacity-50">Мвидео</a></li>
                                    <li><a href="#" class="text-xl font-bold">Кэшбек до 5.87%</a></li>
                                    <li><a href="#" class="text-sm text-[#0081db] hover:border-b-2 hover:border-b-[#0081db]">Подробнее</a></li>
                                    <li>
                                        <a
                                            href="#"
                                            class="mt-2 flex h-[57px] w-full items-center justify-center rounded-xl bg-[#152041] pl-8 text-lg font-bold text-white hover:bg-[#20305e] focus:ring-2 focus:ring-[#20305e]"
                                            >В магазин
                                            <svg xmlns="http://www.w3.org/2000/svg" class="ml-10 h-5 w-5 text-white" viewBox="0 0 512 512">
                                                <path
                                                    fill="none"
                                                    stroke="currentColor"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="48"
                                                    d="M184 112l144 144-144 144"
                                                />
                                            </svg>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="mt-6 mb-12 flex w-full flex-col">
                        <h3 class="text-[34px] font-bold text-white">Новые магазины</h3>
                        <div class="flex flex-wrap justify-between">
                            <div class="main_card mt-11 h-[327px] w-[263px] overflow-hidden rounded-3xl bg-white shadow-md lg:w-[232px]">
                                <div class="relative flex h-[153px] items-center justify-center">
                                    <img src="/images/png/images/dns.png" alt="Название магазина" />
                                    <img
                                        src="/images/png/images/shape.png"
                                        class="absolute top-4 right-4 h-5 w-5 cursor-pointer hover:opacity-70"
                                        alt="Лайк"
                                    />
                                </div>
                                <div class="h-[1px] w-full bg-black opacity-10"></div>
                                <ul class="list-none px-3 py-5 text-center">
                                    <li><a href="#" class="text-[15px] opacity-50">DNS</a></li>
                                    <li><a href="#" class="text-xl font-bold">Кэшбек до 5.0%</a></li>
                                    <li><a href="#" class="text-sm text-[#0081db] hover:border-b-2 hover:border-b-[#0081db]">Подробнее</a></li>
                                    <li>
                                        <a
                                            href="#"
                                            class="mt-2 flex h-[57px] w-full items-center justify-center rounded-xl bg-[#152041] pl-8 text-lg font-bold text-white hover:bg-[#20305e] focus:ring-2 focus:ring-[#20305e]"
                                            >В магазин
                                            <svg xmlns="http://www.w3.org/2000/svg" class="ml-10 h-5 w-5 text-white" viewBox="0 0 512 512">
                                                <path
                                                    fill="none"
                                                    stroke="currentColor"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="48"
                                                    d="M184 112l144 144-144 144"
                                                />
                                            </svg>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="main_card mt-11 h-[327px] w-[263px] overflow-hidden rounded-3xl bg-white shadow-md lg:w-[232px]">
                                <div class="relative flex h-[153px] items-center justify-center">
                                    <img src="/images/png/images/sitilnik.png" alt="Название магазина" />
                                    <img
                                        src="/images/png/images/shape_1.png"
                                        class="absolute top-4 right-4 h-5 w-5 cursor-pointer hover:opacity-70"
                                        alt="Лайк"
                                    />
                                </div>
                                <div class="h-[1px] w-full bg-black opacity-10"></div>
                                <ul class="list-none px-3 py-5 text-center">
                                    <li><a href="#" class="text-[15px] opacity-50">Ситильник</a></li>
                                    <li><a href="#" class="text-xl font-bold">Кэшбек до 4.5%</a></li>
                                    <li><a href="#" class="text-sm text-[#0081db] hover:border-b-2 hover:border-b-[#0081db]">Подробнее</a></li>
                                    <li>
                                        <a
                                            href="#"
                                            class="mt-2 flex h-[57px] w-full items-center justify-center rounded-xl bg-[#152041] pl-8 text-lg font-bold text-white hover:bg-[#20305e] focus:ring-2 focus:ring-[#20305e]"
                                            >В магазин
                                            <svg xmlns="http://www.w3.org/2000/svg" class="ml-10 h-5 w-5 text-white" viewBox="0 0 512 512">
                                                <path
                                                    fill="none"
                                                    stroke="currentColor"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="48"
                                                    d="M184 112l144 144-144 144"
                                                />
                                            </svg>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="main_card mt-11 h-[327px] w-[263px] overflow-hidden rounded-3xl bg-white shadow-md lg:w-[232px]">
                                <div class="relative flex h-[153px] items-center justify-center">
                                    <img src="/images/png/images/djungli.png" alt="Название магазина" />
                                    <img
                                        src="/images/png/images/shape.png"
                                        class="absolute top-4 right-4 h-5 w-5 cursor-pointer hover:opacity-70"
                                        alt="Лайк"
                                    />
                                </div>
                                <div class="h-[1px] w-full bg-black opacity-10"></div>
                                <ul class="list-none px-3 py-5 text-center">
                                    <li><a href="#" class="text-[15px] opacity-50">Джунгли</a></li>
                                    <li><a href="#" class="text-xl font-bold">Кэшбек до 1.5%</a></li>
                                    <li><a href="#" class="text-sm text-[#0081db] hover:border-b-2 hover:border-b-[#0081db]">Подробнее</a></li>
                                    <li>
                                        <a
                                            href="#"
                                            class="mt-2 flex h-[57px] w-full items-center justify-center rounded-xl bg-[#152041] pl-8 text-lg font-bold text-white hover:bg-[#20305e] focus:ring-2 focus:ring-[#20305e]"
                                            >В магазин
                                            <svg xmlns="http://www.w3.org/2000/svg" class="ml-10 h-5 w-5 text-white" viewBox="0 0 512 512">
                                                <path
                                                    fill="none"
                                                    stroke="currentColor"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="48"
                                                    d="M184 112l144 144-144 144"
                                                />
                                            </svg>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="main_card mt-11 h-[327px] w-[263px] overflow-hidden rounded-3xl bg-white shadow-md lg:w-[232px]">
                                <div class="relative flex h-[153px] items-center justify-center">
                                    <img src="/images/png/images/5ka.png" alt="Название магазина" />
                                    <img
                                        src="/images/png/images/shape.png"
                                        class="absolute top-4 right-4 h-5 w-5 cursor-pointer hover:opacity-70"
                                        alt="Лайк"
                                    />
                                </div>
                                <div class="h-[1px] w-full bg-black opacity-10"></div>
                                <ul class="list-none px-3 py-5 text-center">
                                    <li><a href="#" class="text-[15px] opacity-50">Пятерочка</a></li>
                                    <li><a href="#" class="text-xl font-bold">Кэшбек до 5.87%</a></li>
                                    <li><a href="#" class="text-sm text-[#0081db] hover:border-b-2 hover:border-b-[#0081db]">Подробнее</a></li>
                                    <li>
                                        <a
                                            href="#"
                                            class="mt-2 flex h-[57px] w-full items-center justify-center rounded-xl bg-[#152041] pl-8 text-lg font-bold text-white hover:bg-[#20305e] focus:ring-2 focus:ring-[#20305e]"
                                            >В магазин
                                            <svg xmlns="http://www.w3.org/2000/svg" class="ml-10 h-5 w-5 text-white" viewBox="0 0 512 512">
                                                <path
                                                    fill="none"
                                                    stroke="currentColor"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="48"
                                                    d="M184 112l144 144-144 144"
                                                />
                                            </svg>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center justify-center">
                        <button
                            class="flex h-[55px] w-[449px] items-center justify-center rounded-md bg-[#F9D914] text-center focus:ring-2 focus:ring-[#F9D914]"
                        >
                            Показать еще
                        </button>
                    </div>
                    <div class="mt-12 h-[1px] w-full bg-white opacity-10"></div>
                    <div class="mt-6 mb-12 flex w-full flex-col">
                        <h3 class="text-[34px] font-bold text-white">Скидочные купоны</h3>
                        <div class="flex flex-wrap items-center justify-between">
                            <div
                                class="card_promo main_card mt-11 h-[413px] min-h-[413px] w-[263px] overflow-hidden rounded-3xl bg-white shadow-md lg:w-[232px]"
                            >
                                <div class="relative flex h-[154px] items-center justify-center">
                                    <img src="/images/png/images/virchy.png" alt="Название магазина" />
                                </div>
                                <div class="h-[1px] w-full bg-black opacity-10"></div>
                                <ul class="list-none px-3 py-5">
                                    <li class="flex justify-center">
                                        <a href="#" class="mb-4 flex items-center text-center text-[15px] text-[#ce161d]"
                                            ><img src="/images/png/icons/history.png" class="mr-2 h-5 w-5" alt="Время купона" />Осталось 2 часа</a
                                        >
                                    </li>
                                    <li class="text-center">
                                        <a href="#" class="text-center text-[15px]">Скидка-20% на все продукты серии LUXORY и PREMIUM!</a>
                                    </li>
                                </ul>
                                <ul class="h-full w-full bg-[#f4d715] p-2">
                                    <li>
                                        <a href="#" class="kupon mt-2 mr-3 ml-3 flex items-center justify-between text-sm"
                                            >Код купона<span class="text-lg leading-0 font-bold uppercase">Prosale2G5112</span></a
                                        >
                                    </li>
                                    <li>
                                        <a
                                            href="#"
                                            class="mt-2 flex h-[57px] w-full items-center justify-center rounded-xl bg-[#152041] pl-10 text-lg font-bold text-white hover:bg-[#20305e] focus:ring-2 focus:ring-[#20305e]"
                                            >В магазин
                                            <svg xmlns="http://www.w3.org/2000/svg" class="ml-10 h-5 w-5 text-white" viewBox="0 0 512 512">
                                                <path
                                                    fill="none"
                                                    stroke="currentColor"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="48"
                                                    d="M184 112l144 144-144 144"
                                                />
                                            </svg>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div
                                class="card_promo main_card mt-11 h-[413px] min-h-[413px] w-[263px] overflow-hidden rounded-3xl bg-white shadow-md lg:w-[232px]"
                            >
                                <div class="relative flex h-[154px] items-center justify-center">
                                    <img src="/images/png/images/net.png" alt="Название магазина" />
                                </div>
                                <div class="h-[1px] w-full bg-black opacity-10"></div>
                                <ul class="list-none px-[15px] py-5">
                                    <li class="flex justify-center">
                                        <a href="#" class="mb-4 flex items-center text-[15px] text-black opacity-50"
                                            ><img src="/images/png/icons/history_clock.png" class="mr-2 h-5 w-5" alt="Время купона" />Осталось 2 часа</a
                                        >
                                    </li>
                                    <li class="text-center">
                                        <a href="#" class="text-[15px]">Маленькая книга про большие чувства: Бесплатный Минибук!</a>
                                    </li>
                                </ul>
                                <ul class="h-full w-full bg-[#f4d715] p-2">
                                    <li>
                                        <a href="#" class="kupon mt-2 mr-3 ml-3 flex items-center justify-between text-sm"
                                            >Код купона<span class="text-lg leading-0 font-bold uppercase">MINIC</span></a
                                        >
                                    </li>
                                    <li>
                                        <a
                                            href="#"
                                            class="mt-2 flex h-[57px] w-full items-center justify-center rounded-xl bg-[#152041] pl-10 text-lg font-bold text-white hover:bg-[#20305e] focus:ring-2 focus:ring-[#20305e]"
                                            >В магазин
                                            <svg xmlns="http://www.w3.org/2000/svg" class="ml-10 h-5 w-5 text-white" viewBox="0 0 512 512">
                                                <path
                                                    fill="none"
                                                    stroke="currentColor"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="48"
                                                    d="M184 112l144 144-144 144"
                                                />
                                            </svg>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div
                                class="card_promo main_card mt-11 h-[413px] min-h-[413px] w-[263px] overflow-hidden rounded-3xl bg-white shadow-md lg:w-[232px]"
                            >
                                <div class="relative flex h-[154px] items-center justify-center">
                                    <img src="/images/png/images/galereya.png" alt="Название магазина" />
                                </div>
                                <div class="h-[1px] w-full bg-black opacity-10"></div>
                                <ul class="list-none px-[15px] py-5">
                                    <li class="flex justify-center">
                                        <a href="#" class="mb-4 flex items-center text-[15px] text-black opacity-50"
                                            ><img src="/images/png/icons/history_clock.png" class="mr-2 h-5 w-5" alt="Время купона" />Осталось 4 дня</a
                                        >
                                    </li>
                                    <li class="text-center"><a href="#" class="text-[15px]">Лучшие акции интернет-магазина Галерея Косметики!</a></li>
                                </ul>
                                <ul class="h-full w-full bg-[#f4d715] p-2">
                                    <li>
                                        <a href="#" class="kupon mt-2 mr-3 ml-3 flex items-center justify-between text-sm"
                                            >Код купона<span class="text-lg leading-0 font-bold uppercase">НЕ ТРЕБУЕТСЯ</span></a
                                        >
                                    </li>
                                    <li>
                                        <a
                                            href="#"
                                            class="mt-2 flex h-[57px] w-full items-center justify-center rounded-xl bg-[#152041] pl-10 text-lg font-bold text-white hover:bg-[#20305e] focus:ring-2 focus:ring-[#20305e]"
                                            >В магазин
                                            <svg xmlns="http://www.w3.org/2000/svg" class="ml-10 h-5 w-5 text-white" viewBox="0 0 512 512">
                                                <path
                                                    fill="none"
                                                    stroke="currentColor"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="48"
                                                    d="M184 112l144 144-144 144"
                                                />
                                            </svg>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div
                                class="card_promo main_card mt-11 h-[413px] min-h-[413px] w-[263px] overflow-hidden rounded-3xl bg-white shadow-md lg:w-[232px]"
                            >
                                <div class="relative flex h-[154px] items-center justify-center">
                                    <img src="/images/png/images/lamoda.png" alt="Название магазина" />
                                </div>
                                <div class="h-[1px] w-full bg-black opacity-10"></div>
                                <div class="h-[258px]">
                                    <ul class="list-none px-[15px] py-5">
                                        <li class="flex justify-center">
                                            <a href="#" class="mb-4 flex items-center text-[15px] text-black opacity-50"
                                                ><img src="/images/png/icons/history_clock.png" class="mr-2 h-5 w-5" alt="Время купона" />Осталось 2
                                                часа</a
                                            >
                                        </li>
                                        <li class="text-center"><a href="#" class="text-[15px]">Скидки до 75% на Верхнюю одежду для мужчин!</a></li>
                                    </ul>
                                    <ul class="h-full w-full bg-[#f4d715] p-2">
                                        <li>
                                            <a href="#" class="kupon mt-2 mr-3 ml-3 flex items-center justify-between text-sm"
                                                >Код купона<span class="text-lg leading-0 font-bold uppercase">sale75</span></a
                                            >
                                        </li>
                                        <li class="">
                                            <a
                                                href="#"
                                                class="mt-2 flex h-[57px] w-full items-center justify-center rounded-xl bg-[#152041] pl-10 text-lg font-bold text-white hover:bg-[#20305e] focus:ring-2 focus:ring-[#20305e]"
                                                >В магазин
                                                <svg xmlns="http://www.w3.org/2000/svg" class="ml-10 h-5 w-5 text-white" viewBox="0 0 512 512">
                                                    <path
                                                        fill="none"
                                                        stroke="currentColor"
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="48"
                                                        d="M184 112l144 144-144 144"
                                                    />
                                                </svg>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center justify-center">
                        <button
                            class="flex h-[55px] w-[449px] items-center justify-center rounded-md bg-[#F9D914] text-center focus:ring-2 focus:ring-[#F9D914]"
                        >
                            Показать еще
                            <img src="/images/png/images/spiner.png" class="ml-4 h-[16px] w-[16px]" alt="loading" />
                        </button>
                    </div>
                </div>
            </div>
        </section>
        <footer class="relative overflow-hidden bg-[#101121]">
            <div class="relative mx-auto w-[1140px] py-9 2xl:w-full 2xl:px-4">
                <img src="/images/png/images/phone.png" class="hand absolute -bottom-2 -left-11 z-10" alt="Телефон" />
                <ul class="footer_navBlock relative z-20 flex flex-wrap items-center justify-between">
                    <li>
                        <a href="#" class="footer_nav text-sm font-bold text-white uppercase hover:border-b-2 hover:border-b-white">Все магазины</a>
                    </li>
                    <li>
                        <a href="#" class="footer_nav text-sm font-bold text-white uppercase hover:border-b-2 hover:border-b-white">Все промокоды</a>
                    </li>
                    <li>
                        <a href="#" class="footer_nav text-sm font-bold text-white uppercase hover:border-b-2 hover:border-b-white">Все скидки</a>
                    </li>
                    <li>
                        <a href="#" class="footer_nav text-sm font-bold text-white uppercase hover:border-b-2 hover:border-b-white">Все конкурсы</a>
                    </li>
                    <li><a href="#" class="footer_nav text-sm font-bold text-white uppercase hover:border-b-2 hover:border-b-white">О нас</a></li>
                    <li><a href="#" class="footer_nav text-sm font-bold text-white uppercase hover:border-b-2 hover:border-b-white">Помощь</a></li>
                    <li><a href="#" class="footer_nav text-sm font-bold text-white uppercase hover:border-b-2 hover:border-b-white">Контакты</a></li>
                </ul>
                <div class="my-10 h-[1px] w-full bg-white opacity-10"></div>
                <div class="footer_block relative z-20 flex justify-between">
                    <ul class="footer_upBlock flex w-[143px] list-none flex-col gap-3">
                        <li><a href="#" class="text-lg font-bold text-white opacity-30">Больше скидок</a></li>
                        <li><a href="#" class="text-[15px] text-white">В нашем мобильном приложении</a></li>
                        <div class="upBlock_phones flex flex-col gap-3">
                            <li class="flex h-[54px] w-[143px] items-center justify-center rounded-lg bg-[#000000] hover:opacity-80">
                                <a href="#"
                                    ><img
                                        src="/images/png/images/app_store.png"
                                        class="h-[31px] w-[106px]"
                                        alt="Скачать на IPhone"
                                        data-tooltip-target="tooltip-app"
                                        type="button"
                                /></a>
                            </li>
                            <li>
                                <a href="#" class=""
                                    ><img
                                        src="/images/png/images/store.png"
                                        class="h-[54px] w-[143px] hover:opacity-80"
                                        alt="Скачать на Android"
                                        data-tooltip-target="tooltip-app"
                                        type="button"
                                /></a>
                            </li>
                        </div>
                        <div
                            id="tooltip-app"
                            role="tooltip"
                            class="tooltip invisible absolute z-10 inline-block w-[150px] rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-700"
                        >
                            В разработке!
                        </div>
                    </ul>
                    <ul class="list_footer footer_downBlock ml-[250px] list-none">
                        <li class="text-lg font-bold text-white opacity-30">Следите за новостями и акциями</li>
                        <div class="mt-[15px] flex flex-wrap items-center gap-3">
                            <li>
                                <a
                                    href=""
                                    class="flex h-[48px] w-[147px] items-center justify-center rounded-lg text-[16px] text-white ring-[1px] ring-white/50 hover:ring-white"
                                    data-tooltip-target="tooltip-social"
                                    type="button"
                                    ><img src="/images/png/icons/vk.png" class="mr-[14px] opacity-50" alt="Вконтакте" />Вконтакте</a
                                >
                            </li>
                            <li>
                                <a
                                    href=""
                                    class="flex h-[48px] w-[147px] items-center justify-center rounded-lg text-[16px] text-white ring-[1px] ring-white/50 hover:ring-white"
                                    data-tooltip-target="tooltip-social"
                                    type="button"
                                    ><svg
                                        class="h-5 w-5 text-white opacity-50"
                                        viewBox="0 0 24 24"
                                        fill="currentColor"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <g id="SVGRepo_bgCarrier" stroke-width="0" />
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />
                                        <g id="SVGRepo_iconCarrier">
                                            <path
                                                d="M21.426 2.19a1.5 1.5 0 0 0-1.931-.72L2.562 9.697a1.5 1.5 0 0 0 .106 2.78l4.15 1.3 1.98 6.15a1.5 1.5 0 0 0 2.74.14l2.69-6.8 4.44-4.27a1.5 1.5 0 0 0-.5-2.82zM9.58 14.78l-.88-2.73 7.31-5.1-8.43 7.83z"
                                            />
                                        </g>
                                    </svg>
                                    Telegramm</a
                                >
                            </li>

                            <div
                                id="tooltip-social"
                                role="tooltip"
                                class="tooltip invisible absolute z-10 inline-block w-[250px] rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-700"
                            >
                                Руки никак не доходят :)
                            </div>
                        </div>
                        <p class="mt-5 max-w-xs text-sm text-white opacity-30 hover:opacity-100">
                            Instagram - соцсеть принадлежит компании Meta, признанной экстремистской и запрещенной на территории России
                        </p>

                        <li class="mt-12 text-lg font-bold text-white opacity-30">Служба поддержки GM</li>
                        <div class="mt-[15px] flex flex-wrap gap-7">
                            <li>
                                <a href="mailto:admin@gmcard.ru" class="flex items-center border-b-2 border-b-white/30 text-[16px] text-white"
                                    ><img src="/images/png/icons/email.png" class="mr-[14px] opacity-50" alt="" />admin@gmcard.ru</a
                                >
                            </li>
                            <li>
                                <button id="modal-cash" class="flex items-center border-b-2 border-b-white/30 text-[16px] text-white">
                                    Где мой кэшбэк?
                                </button>
                                <div id="staticModals" class="bg-opacity-30 fixed top-0 left-0 z-50 hidden h-full w-full overflow-auto bg-black">
                                    <div class="flex w-full justify-center px-4 py-10">
                                        <div class="relative z-50 max-h-full w-full max-w-[500px]">
                                            <div class="relative rounded-lg bg-white dark:bg-gray-700">
                                                <div class="flex items-start justify-between rounded-t border-b p-4 dark:border-gray-600">
                                                    <h3 class="text-2xl font-semibold text-gray-900 dark:text-white">Где мой кэшбек?</h3>
                                                    <button
                                                        type="button"
                                                        class="ml-auto inline-flex items-center rounded-lg bg-transparent p-1.5 text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white"
                                                        id="close_Modal"
                                                    >
                                                        <svg
                                                            class="h-5 w-5"
                                                            fill="currentColor"
                                                            viewBox="0 0 20 20"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                        >
                                                            <path
                                                                fill-rule="evenodd"
                                                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                                clip-rule="evenodd"
                                                            ></path>
                                                        </svg>
                                                    </button>
                                                </div>
                                                <div class="space-y-1 p-6">
                                                    <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                                        Пожалуйста заполните эту форму и мы поможем Вам найти кэшбек Поиск кэшбека возможен, если с
                                                        момента соверщения покупки прошло не более 6 месяцев, т.е. если Вы потеряли бонус за покупку,
                                                        которую сделали более полугода назад, то найти нам его, скорее всего, не удастся.
                                                    </p>
                                                    <form action="">
                                                        <div class="mt-2">
                                                            <label
                                                                for="email-address-icon"
                                                                class="mb-2 block text-base font-medium text-gray-900 dark:text-white"
                                                                >Email, указанный при регистрации</label
                                                            >
                                                            <div class="relative">
                                                                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                                                    <svg
                                                                        aria-hidden="true"
                                                                        class="h-5 w-5 text-gray-500 dark:text-gray-400"
                                                                        fill="currentColor"
                                                                        viewBox="0 0 20 20"
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                    >
                                                                        <path
                                                                            d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"
                                                                        ></path>
                                                                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                                                                    </svg>
                                                                </div>
                                                                <input
                                                                    type="text"
                                                                    id="email-address-icon"
                                                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 pl-10 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                                                    placeholder="ivanov@gmail.com"
                                                                />
                                                            </div>
                                                        </div>
                                                        <div class="mt-2">
                                                            <label
                                                                for="email-address-icon"
                                                                class="block text-base font-medium text-gray-900 dark:text-white"
                                                                >Дата покупки</label
                                                            >
                                                            <p class="mb-2 block text-sm font-medium text-gray-500 dark:text-gray-400">
                                                                Дата покупки должна быть не менее 5 дней назад, т.к. в некоторых интернет-магазинах
                                                                отслеживание Вашей покупки и зачисление бонуса может занять до 5 дней.
                                                            </p>
                                                            <div class="relative max-w-full">
                                                                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                                                    <svg
                                                                        aria-hidden="true"
                                                                        class="h-5 w-5 text-gray-500 dark:text-gray-400"
                                                                        fill="currentColor"
                                                                        viewBox="0 0 20 20"
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                    >
                                                                        <path
                                                                            fill-rule="evenodd"
                                                                            d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                                                            clip-rule="evenodd"
                                                                        ></path>
                                                                    </svg>
                                                                </div>
                                                                <input
                                                                    datepicker
                                                                    datepicker-autohide
                                                                    type="text"
                                                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 pl-10 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                                                    placeholder="Выберите дату"
                                                                />
                                                            </div>
                                                        </div>
                                                        <div class="mt-2">
                                                            <label
                                                                for="email-address-icon"
                                                                class="block text-base font-medium text-gray-900 dark:text-white"
                                                                >Магазин</label
                                                            >
                                                            <p class="mb-2 block text-sm font-medium text-gray-500 dark:text-gray-400">
                                                                Здесь отображаются магазины, которые Вы посещали в течение 7 дней.
                                                            </p>
                                                            <div class="relative max-w-full">
                                                                <input
                                                                    type="text"
                                                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 pl-10 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                                                    placeholder=""
                                                                />
                                                            </div>
                                                        </div>
                                                        <div class="mt-2">
                                                            <label
                                                                for="email-address-icon"
                                                                class="block text-base font-medium text-gray-900 dark:text-white"
                                                                >Номер заказа</label
                                                            >
                                                            <div class="relative max-w-full">
                                                                <input
                                                                    type="text"
                                                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 pl-10 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                                                    placeholder=""
                                                                />
                                                            </div>
                                                        </div>
                                                        <div class="mt-2">
                                                            <label
                                                                for="countries"
                                                                class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
                                                                >Валюта</label
                                                            >
                                                            <select
                                                                id="countries"
                                                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                                            >
                                                                <option selected>RUB</option>
                                                                <option value="US">USD</option>
                                                            </select>
                                                        </div>
                                                        <div class="mt-3">
                                                            <p class="text-base text-gray-900 dark:text-gray-300">
                                                                Покупка совершена через мобильное приложение?
                                                            </p>
                                                            <div class="mt-1 flex items-center">
                                                                <div class="mr-4 flex items-center">
                                                                    <label
                                                                        for="inline-radio"
                                                                        class="text-sm font-medium text-gray-900 dark:text-gray-300"
                                                                        >Да</label
                                                                    >
                                                                    <input
                                                                        id="inline-radio"
                                                                        type="radio"
                                                                        value=""
                                                                        name="inline-radio-group"
                                                                        class="ml-2 h-4 w-4 border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600"
                                                                    />
                                                                </div>
                                                                <div class="mr-4 flex items-center">
                                                                    <label
                                                                        for="inline-2-radio"
                                                                        class="text-sm font-medium text-gray-900 dark:text-gray-300"
                                                                        >Нет</label
                                                                    >
                                                                    <input
                                                                        id="inline-2-radio"
                                                                        type="radio"
                                                                        value=""
                                                                        name="inline-radio-group"
                                                                        class="ml-2 h-4 w-4 border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600"
                                                                    />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mt-3">
                                                            <p class="text-base text-gray-900 dark:text-gray-300">Вы использовали промокоды?</p>
                                                            <div class="mt-1 flex items-center">
                                                                <div class="mr-4 flex items-center">
                                                                    <label
                                                                        for="inline-radio"
                                                                        class="text-sm font-medium text-gray-900 dark:text-gray-300"
                                                                        >Да</label
                                                                    >
                                                                    <input
                                                                        id="inline-radio"
                                                                        type="radio"
                                                                        value=""
                                                                        name="inline-radio-group"
                                                                        class="ml-2 h-4 w-4 border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600"
                                                                    />
                                                                </div>
                                                                <div class="mr-4 flex items-center">
                                                                    <label
                                                                        for="inline-2-radio"
                                                                        class="text-sm font-medium text-gray-900 dark:text-gray-300"
                                                                        >Нет</label
                                                                    >
                                                                    <input
                                                                        id="inline-2-radio"
                                                                        type="radio"
                                                                        value=""
                                                                        name="inline-radio-group"
                                                                        class="ml-2 h-4 w-4 border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600"
                                                                    />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mt-3">
                                                            <p class="text-base text-gray-900 dark:text-gray-300">
                                                                Находились ли товары в корзине до перехода через GmCash?
                                                            </p>
                                                            <div class="mt-1 flex items-center">
                                                                <div class="mr-4 flex items-center">
                                                                    <label
                                                                        for="inline-radio"
                                                                        class="text-sm font-medium text-gray-900 dark:text-gray-300"
                                                                        >Да</label
                                                                    >
                                                                    <input
                                                                        id="inline-radio"
                                                                        type="radio"
                                                                        value=""
                                                                        name="inline-radio-group"
                                                                        class="ml-2 h-4 w-4 border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600"
                                                                    />
                                                                </div>
                                                                <div class="mr-4 flex items-center">
                                                                    <label
                                                                        for="inline-2-radio"
                                                                        class="text-sm font-medium text-gray-900 dark:text-gray-300"
                                                                        >Нет</label
                                                                    >
                                                                    <input
                                                                        id="inline-2-radio"
                                                                        type="radio"
                                                                        value=""
                                                                        name="inline-radio-group"
                                                                        class="ml-2 h-4 w-4 border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600"
                                                                    />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mt-3">
                                                            <label
                                                                class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
                                                                for="file_input"
                                                                >Пожалуйста, прикрепите скриншот заказа, где видно номер заказа, дату заказа и полную
                                                                сумму покупки</label
                                                            >
                                                            <input
                                                                class="block w-full cursor-pointer rounded-lg border border-gray-300 bg-gray-50 text-sm text-gray-900 focus:outline-none dark:border-gray-600 dark:bg-gray-700 dark:text-gray-400 dark:placeholder-gray-400"
                                                                aria-describedby="file_input_help"
                                                                id="file_input"
                                                                type="file"
                                                            />
                                                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400" id="file_input_help">
                                                                Прикрепите файл (рамер до 1МБ): (*.pdf, *.png, *.jpg, *.gif, *.jpeg)
                                                            </p>
                                                        </div>
                                                        <div class="mt-3">
                                                            <label for="message" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
                                                                >Комментарий</label
                                                            >
                                                            <textarea
                                                                id="message"
                                                                rows="4"
                                                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                                                placeholder=""
                                                            ></textarea>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="flex items-center space-x-2 rounded-b border-t border-gray-200 p-6 dark:border-gray-600">
                                                    <button
                                                        id="close_Submit"
                                                        type="button"
                                                        class="rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 focus:outline-none dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                                    >
                                                        Отправить
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </div>
                        <div class="politic relative z-30 mt-11 flex gap-4">
                            <li><a href="#" class="text-sm text-white opacity-30 hover:opacity-100">Политика защиты персональный информации</a></li>
                            <li><a href="#" class="text-sm text-white opacity-30 hover:opacity-100">Пользовательское соглашение</a></li>
                        </div>
                    </ul>
                    <ul class="pay_block block list-none">
                        <li class="mb-6 text-lg font-bold text-white opacity-30">Мы работаем с</li>
                        <ul class="flex gap-5">
                            <li>
                                <ul class="flex flex-col">
                                    <li><img src="/images/png/icons/visa.png" class="mt-1 mb-11 h-[14px] w-[47px]" alt="Visa" /></li>
                                    <li><img src="/images/png/icons/sberbank.png" class="mb-11" alt="Сбер Банк" /></li>
                                    <li><img src="/images/png/icons/alfa.png" alt="Альфа Банк" /></li>
                                </ul>
                            </li>
                            <div class="h-full w-[1px] bg-white"></div>
                            <li>
                                <ul class="flex flex-col">
                                    <li><img src="/images/png/icons/master.png" class="mb-8" alt="MasterCard" /></li>
                                    <li><img src="/images/png/icons/robbo.png" class="mb-9" alt="Robbo" /></li>
                                    <li><img src="/images/png/icons/yandex.png" alt="Яндекс" /></li>
                                </ul>
                            </li>
                            <div></div>
                            <li>
                                <ul class="flex flex-col">
                                    <li><img src="/images/png/icons/maestro.png" class="mb-10" alt="Maestro" /></li>
                                    <li><img src="/images/png/icons/webmoney.png" class="mb-9" alt="Webmoney" /></li>
                                    <li><img src="/images/png/icons/qiwi.png" alt="Qiwi" /></li>
                                </ul>
                            </li>
                        </ul>
                        <li class="mt-11 text-end text-sm text-white opacity-30">И другие</li>
                    </ul>
                </div>
                <div class="my-8 h-[1px] w-full bg-white opacity-10"></div>
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-[16px]">
                        <img src="/images/png/icons/logo.png" class="h-[26px] w-[26px]" alt="GM" />
                        <span class="text-sm text-white opacity-30">GM 2014 - 2025</span>
                    </div>
                    <ul class="partner_link flex items-center">
                        <li class="relative z-10 font-bold text-[#eacc14] hover:opacity-80"><a href="#">+ Партнерская программа</a></li>
                        <div class="mx-5 h-[30px] w-[1px] bg-white opacity-10"></div>
                        <li class="font-bold text-[#eacc14] hover:opacity-80"><a href="#">+ Добавить магазин</a></li>
                    </ul>
                    <div
                        class="flex h-[39px] w-[141px] items-center justify-center gap-2 rounded-lg ring-1 ring-white/30 hover:ring-white"
                        data-tooltip-target="tooltip-country"
                        type="button"
                    >
                        <img src="/images/png/icons/russia.png" class="h-[9px] w-[13px]" alt="Россия" />
                        <span class="text-[12px] font-bold text-white">Россия</span>
                        <img src="/images/png/icons/up.png" alt="Вверх" />
                        <div
                            id="tooltip-country"
                            role="tooltip"
                            class="tooltip invisible absolute z-10 inline-block w-[250px] rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-700"
                        >
                            Данный выпадающий список - находится в разработке!
                            <div class="tooltip-arrow" data-popper-arrow></div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</template>
