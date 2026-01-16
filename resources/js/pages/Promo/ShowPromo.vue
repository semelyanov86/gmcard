<script setup lang="ts">
import CategoriesMenu from '@/components/CategoriesMenu.vue';
import DiscountCoupons from '@/components/main/DiscountCoupons.vue';
import Footer from '@/components/Footer.vue';
import Header from '@/components/Header.vue';
import MobileMenu from '@/components/MobileMenu.vue';
import NavBar from '@/components/NavBar.vue';
import MainInfo from '@/components/promoShow/MainInfo.vue';
import PromoAddress from '@/components/promoShow/PromoAddress.vue';
import PromoDescription from '@/components/promoShow/PromoDescription.vue';
import PromoImage from '@/components/promoShow/PromoImage.vue';
import type { AppPageProps, CategoryModel, ContactModel, MenuData } from '@/types';
import { usePage } from '@inertiajs/vue3';
import { ref } from 'vue';
import '../../../css/internal/output.css';

const page = usePage<AppPageProps>();

const props = defineProps<{
    contact: ContactModel;
    navbarMenu: MenuData[];
    categories: CategoryModel[];
}>();

const showPromoCode = ref(false);
</script>

<template>
    <div class="promo-page">
        <Header :user-data="page.props.userData" />

        <section class="body h-full max-w-full overflow-hidden pb-9">
            <MobileMenu />
            <div class="mx-auto w-[1140px] 2xl:w-full 2xl:px-4">
                <NavBar :menu-items="props.navbarMenu" />

                <CategoriesMenu :categories="props.categories" />

                <div class="flex w-full h-full mt-12 saleBlocks">
                    <div id="promoHiddenMob" class="bg-white py-4 rounded-3xl shadow-2xl border mb-10 hidden salesLink1">
                        <div class="">
                            <p class="px-6 py-2 flex items-center">
                                До конца акции
                                <img src="/images/png/images/alarm.png" class="mx-2 opacity-50" alt="time" />
                                <strong>4 дня 15:13:15</strong>
                            </p>
                            <div class="w-full h-[1px] bg-black/20"></div>
                            <div class="px-6 py-2">
                                <h2 class="text-lg mt-2">Зимняя распродажа до -50% на все в Снежная Королева!</h2>
                                <div class="flex items-center gap-2 mt-4">
                                    <img src="/images/png/images/discount.png" class="w-12" alt="discount" />
                                    <span class="text-2xl font-bold">Скидка 50%</span>
                                </div>
                                <div class="flex flex-col items-start relative">
                                    <div class="absolute left-10 bg-[#0CA563] w-[3px] h-full"></div>
                                    <h4 class="ml-14 text-sm font-bold">Дополнительный условия</h4>
                                    <p class="ml-14 text-sm">Сделай покупки на сумму выше 60 000 рублей и используй промокод что бы получить скидку до 10 000 рублей</p>
                                    <h4 class="ml-14 text-sm font-bold mt-4">Минимальная сумма</h4>
                                    <p class="ml-14 text-sm">10 000 рублей</p>
                                </div>
                            </div>
                            <div class="px-3 w-full">
                                <button id="openThePromoMob" class="bg-[#0CA563] w-full py-4 inline-block text-center mt-5 rounded-xl text-white text-lg opacity-80 hover:opacity-100">
                                    Получить промокод
                                </button>
                            </div>
                        </div>
                    </div>
                    <div id="promoCopyMob" class="bg-white py-4 rounded-3xl shadow-2xl border mb-10 hidden">
                        <div class="w-full h-full rounded-3xl shadow-2xl py-20 px-12 relative">
                            <svg id="closeThePromoMob" class="w-8 h-8 absolute top-4 right-4 p-1 rounded-full cursor-pointer hover:bg-black/50" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="24" height="24" fill="white" />
                                <path d="M7 17L16.8995 7.10051" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M7 7.00001L16.8995 16.8995" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div class="flex flex-col items-center justify-center relative">
                                <div class="bg-[#F4D710] w-12 p-2 rounded-lg rotate-12">
                                    <img src="/images/png/constructor/constructor_sale2_hover.png" class="w-full" alt="promo" />
                                </div>
                                <h4 class="text-black/50 mt-1">Ваш промокод</h4>
                                <h2 id="promoCodeMob" class="text-lg mt-2 font-bold">vesna-9LSwVx-sWxB-MNbT0</h2>
                                <div class="bg-black/20 w-full h-[1px] mt-4"></div>
                                <button id="copyBtnMob" class="w-full py-4 bg-[#F4D710] mt-4 rounded-3xl font-bold">
                                    Скопировать и перейти на сайт
                                </button>
                                <p id="copyJustMob" class="text-black/50 mt-4 cursor-pointer">Просто скопировать</p>
                                <p id="copyYesMob" class="py-2 px-3 shadow-xl rounded-xl absolute -bottom-10 text-center hidden">Скопировано!</p>
                            </div>
                        </div>
                    </div>
                    <div class="w-[780px] box-border h-full rightBlocsks">
                        <PromoImage />
                        <PromoDescription />
                    </div>
                    <div class="relative w-[410px] h-full leftMainBlocks">
                        <div class="absolute w-[400px] top-12 -left-[20px] z-40 h-full leftBlocsk">
                            <MainInfo v-if="!showPromoCode" @get-promo-code="showPromoCode = true" />
                            <div v-show="showPromoCode" class="bg-white p-4 rounded-3xl shadow-2xl border salesLink2">
                                <div class="w-full h-full rounded-3xl shadow-2xl py-20 px-12 relative">
                                    <svg @click="showPromoCode = false" class="w-8 h-8 absolute top-4 right-4 p-1 rounded-full cursor-pointer hover:bg-black/50" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect width="24" height="24" fill="white" />
                                        <path d="M7 17L16.8995 7.10051" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M7 7.00001L16.8995 16.8995" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <div class="flex flex-col items-center justify-center relative">
                                        <div class="bg-[#F4D710] w-12 p-2 rounded-lg rotate-12">
                                            <img src="/images/png/constructor/constructor_sale2_hover.png" class="w-full" alt="promo" />
                                        </div>
                                        <h4 class="text-black/50 mt-1">Ваш промокод</h4>
                                        <h2 id="promoCode" class="text-lg mt-2 font-bold">vesna-9LSwVx-sWxB-MNbT0</h2>
                                        <div class="bg-black/20 w-full h-[1px] mt-4"></div>
                                        <button id="copyBtn" class="w-full py-4 bg-[#F4D710] mt-4 rounded-3xl font-bold">
                                            Скопировать и перейти на сайт
                                        </button>
                                        <p id="copyJust" class="text-black/50 mt-4 cursor-pointer">Просто скопировать</p>
                                        <p id="copyYes" class="py-2 px-3 shadow-xl rounded-xl absolute -bottom-10 text-center hidden">Скопировано!</p>
                                    </div>
                                </div>
                            </div>
                            <PromoAddress />
                        </div>
                    </div>
                </div>

            <DiscountCoupons />
            </div>
        </section>

        <Footer :contact="contact" />
    </div>
</template>

<style scoped></style>
