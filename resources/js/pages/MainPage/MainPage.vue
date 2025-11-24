<script setup lang="ts">
import CategoriesMenu from '@/components/CategoriesMenu.vue';
import Footer from '@/components/Footer.vue';
import Header from '@/components/Header.vue';
import MobileMenu from '@/components/MobileMenu.vue';
import NavBar from '@/components/NavBar.vue';
import CityFilterSelector from '@/components/Promo/CityFilterSelector.vue';
import CloseIcon from '@/components/primitives/icons/CloseIcon.vue';
import type { AppPageProps, CategoryModel, CityModel, ContactModel, DiscountFilterModel, MenuData } from '@/types';
import { usePage } from '@inertiajs/vue3';
import { ref } from 'vue';
import '../../../css/internal/output.css';

const page = usePage<AppPageProps>();

const props = defineProps<{
    contact: ContactModel;
    categories: CategoryModel[];
    cities: CityModel[];
    discountFilters: DiscountFilterModel[];
    navbarMenu: MenuData[];
    sidebarMenu: MenuData[];
}>();

const userData = page.props.userData;
const selectedCity = ref('');
</script>

<template>
    <Header :userData="userData" />
    <section id="section-1" class="body h-full max-w-full overflow-hidden pb-9">
        <MobileMenu />

        <div class="mx-auto max-w-6xl 2xl:w-full 2xl:px-4">
            <NavBar :menu-items="navbarMenu" />
            <CategoriesMenu></CategoriesMenu>
            <div class="fixed top-0 left-0 z-50 hidden h-screen w-full overflow-auto bg-white" id="modal_sub">
                <div class="relative m-auto flex h-full w-full flex-col p-6">
                    <CloseIcon id="modal-closeSub" custom-class="w-5 h-5 text-gray-500 font-extrabold absolute right-5 top-5" />
                    <div class="rounded-lg bg-white px-4 py-8">
                        <ul class="mb-6 list-none" id="list_subMenu"></ul>
                    </div>
                </div>
            </div>
            <div class="h-px w-full bg-white opacity-10"></div>

            <!-- Banner Carousel -->
            <div id="controls-carousel" class="relative w-full py-10 banner_one" data-carousel="static">
                <div class="relative banner_all flex h-96 items-center overflow-hidden rounded-2xl shadow-2xl">
                    <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
                        <img src="/assets/images/banner.png" class="absolute mt-6 block h-full w-full shadow-2xl" alt="..." />
                        <img src="/assets/images/discount.png" alt="Скидка на товар" class="discount_ofBanner absolute left-10 top-0 z-50" />
                        <img src="/assets/images/discount.png" alt="Скидка на товар" class="discount_ofBanner1 absolute right-6 top-0 z-50 hidden" />
                        <div class="verhniy_block absolute top-12 right-[240px] flex flex-col gap-10 2xl:right-[200px]">
                            <div class="div_verh flex items-center gap-2 rounded-md bg-[#F5F5F5] px-10 py-2">
                                <span class="span_text text-[15px]">До конца акции</span>
                                <img src="/assets/images/alarm.png" alt="Время акции" />
                                <span class="span_text-1 text-xl font-bold">4 дня 15:13:15</span>
                            </div>
                            <h3 class="text_large w-[280px] text-[31px] font-bold">Скидка -50% на стрижку! Так можем только мы!</h3>
                        </div>
                        <div class="nijniy_block absolute bottom-6 right-[320px] flex items-center justify-start">
                            <img src="/assets/images/sale.png" class="mr-1 h-[37px] w-[37px]" alt="Скидка" />
                            <span class="skidki text-[27px] font-bold">Скидка от 150 руб.</span>
                        </div>
                        <div class="span_like absolute top-12 right-6 ml-16 flex items-center gap-2 rounded-md bg-[#0B9A5C] px-6 py-2">
                            <a href="#"><img src="/assets/images/heart.png" class="h-[16px] w-[16px] opacity-70 hover:opacity-100" alt="Сердце" /></a>
                            <span class="text-white">1258</span>
                        </div>
                        <div class="absolute bottom-6 right-6 flex flex-col items-center">
                            <a href="#" class="btn_info rounded-lg bg-[#F9D914] px-12 py-4 text-[16px] font-bold text-[#9d7307] focus:ring-2 focus:ring-[#F9D914] min-lg:px-20">Подробнее</a>
                        </div>
                    </div>
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="/assets/images/banner.png" class="absolute mt-6 block h-full w-full shadow-b-2xl filter: drop-shadow(0 3px 0 rgba(0,26,40,.29)) banner_one" alt="..." />
                    </div>
                </div>
                <button
                    type="button"
                    class="group absolute -left-3 top-6 z-30 flex h-full cursor-pointer items-center justify-center focus:outline-none"
                    data-carousel-prev
                >
                    <span
                        class="inline-flex h-10 w-10 items-center justify-center rounded-full bg-[#F9D914] group-hover:bg-[#F9D914] group-focus:ring-1 group-focus:ring-[#F9D914] dark:bg-gray-800/30 dark:group-hover:bg-gray-800/60 dark:group-focus:ring-bg-[#F9D914]"
                    >
                        <svg aria-hidden="true" class="w-6 h-6 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                        <span class="sr-only">Previous</span>
                    </span>
                </button>
                <button
                    type="button"
                    class="group absolute -right-3 top-6 z-30 flex h-full cursor-pointer items-center justify-center focus:outline-none"
                    data-carousel-next
                >
                    <span
                        class="inline-flex h-10 w-10 items-center justify-center rounded-full bg-[#F9D914] group-hover:bg-[#F9D914] group-focus:ring-1 group-focus:ring-[#F9D914] dark:bg-gray-800/30 dark:group-hover:bg-gray-800/60 dark:group-focus:ring-bg-[#F9D914]"
                    >
                        <svg aria-hidden="true" class="w-6 h-6 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                        <span class="sr-only">Next</span>
                    </span>
                </button>
            </div>

            <!-- Filter Block -->
            <div class="filter_block z-31 mb-6 flex h-[46px] items-center justify-between lg:h-full">
                <h3 class="text_filter text-2xl font-bold text-white">Фильтровать</h3>
                <div class="gapper filter_inp relative flex h-full items-center gap-6 lg:flex-col">
                    <label for="city" class="text-[15px] text-white">Ваш город</label>
                    <CityFilterSelector :cities="props.cities" v-model="selectedCity" />
                </div>
                <div class="gapper filter_inp relative flex items-center gap-6 lg:flex-col">
                    <label for="shop" class="tex-[15px] text-white">Скидки</label>
                    <div class="selected_block relative inline-block h-[46px]">
                        <div
                            id="custom_select"
                            class="custom_select flex h-[46px] w-[202px] appearance-none items-center rounded-md border border-white bg-none px-4 py-2 pr-8 leading-tight text-white shadow hover:border-gray-300 focus:outline-none focus:shadow-outline"
                        >
                            <div id="spaner" class="mr-2">Не менее 5%</div>
                            <img src="/assets/icons/down.png" class="pointer-events-none absolute right-0 top-2 mt-3 mr-2 h-[5px] w-2" alt="Вверх" id="icons" />
                        </div>
                        <div
                            class="custom-options_1 absolute z-50 mt-1 hidden h-50 w-[202px] overflow-y-scroll rounded-b border border-gray-400 bg-white shadow-lg"
                        >
                            <div
                                v-for="(filter, index) in props.discountFilters"
                                :key="filter.value"
                                class="custom-option_1 cursor-pointer px-4 py-2 hover:bg-gray-200"
                                :class="{ 'bg-[#F9D914]': index === 0 }"
                            >
                                {{ filter.label }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="gapper filter_inp relative flex items-center gap-6 lg:flex-col">
                    <label for="sale" class="tex-[15px] text-white">Вид акции</label>
                    <div class="selected_block relative inline-block h-[46px]">
                        <div
                            class="custom_selected flex h-[46px] w-[202px] appearance-none items-center rounded-md border border-white bg-none px-4 py-2 pr-8 leading-tight text-white shadow hover:border-gray-300 focus:outline-none focus:shadow-outline"
                        >
                            <div id="spaner1" class="mr-2">Все</div>
                            <img src="/assets/icons/down.png" class="pointer-events-none absolute right-0 top-2 mt-3 mr-2 h-[5px] w-2" alt="Вверх" id="icons" />
                        </div>
                        <div
                            class="custom-options_2 absolute z-50 mt-1 hidden h-[200px] w-[202px] overflow-y-scroll rounded-b border border-gray-400 bg-white shadow-lg"
                        >
                            <div class="custom-option_2 cursor-pointer bg-[#F9D914] px-4 py-2 hover:bg-gray-200">Все</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="h-px w-full bg-white opacity-10"></div>

            <!-- Popular Promotions -->
            <div class="mt-6 mb-12 flex w-full flex-col">
                <h3 class="text-[34px] font-bold text-white">Популярные акции</h3>
                <div class="flex flex-wrap justify-between">
                    <div class="main_card relative mx-1 mt-11 w-[262px] rounded-xl lg:w-[232px]">
                        <img src="/assets/images/product1.png" class="w-full" alt="Товар" />
                        <div class="absolute -top-6 left-4 z-40" data-tooltip-target="tooltip-default" type="button">
                            <span class="absolute left-3 top-2 text-start text-[13px] italic text-white">
                                скидка до
                                <span class="absolute right-3 top-5 text-[13px] italic">%</span>
                                <span class="text-4xl font-bold" style="font-style: normal">50</span>
                            </span>
                            <img class="h-[79px] w-[83px]" src="/assets/images/sale1.png" alt="Скидка на товар" />
                        </div>
                        <div class="down_block rounded-b-3xl bg-white text-[15px] text-[#000000] lg:h-[150px] h-[136px]">
                            <h3 class="px-6 py-4">Скидка на модели AirMax до 50% в Магазине StoreShop</h3>
                            <div class="h-[1px] w-full bg-black opacity-10"></div>
                            <div class="flex items-center justify-between px-6 py-4">
                                <span class="text-[17px] font-bold">Скидка 50%</span>
                                <img src="/assets/images/sale.png" class="h-[26px] w-[26px]" alt="скидка на товар" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-16 flex items-center justify-center">
                    <button class="flex h-[55px] w-[449px] items-center justify-center rounded-md bg-[#F9D914] text-center focus:ring-2 focus:ring-[#F9D914]">
                        Показать еще
                        <img src="/assets/images/spiner.png" class="ml-4 h-[16px] w-[16px]" alt="loading" />
                    </button>
                </div>
            </div>

            <div class="mt-12 h-[1px] w-full bg-white opacity-10"></div>

            <!-- Cashback Section -->
            <div id="popular" class="mt-6 mb-12 flex w-full flex-col">
                <h3 class="text-[34px] font-bold text-white">Популярные акции</h3>
                <div class="flex flex-wrap justify-between">
                    <!-- Cashback cards will be added here -->
                </div>
            </div>
        </div>
    </section>
    <Footer :contact="contact"></Footer>
</template>
