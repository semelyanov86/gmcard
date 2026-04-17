<script setup lang="ts">
import CategoriesMenu from '@/components/CategoriesMenu.vue';
import Footer from '@/components/Footer.vue';
import Header from '@/components/Header.vue';
import DiscountCoupons from '@/components/main/DiscountCoupons.vue';
import PromoTypeIcon from '@/components/main/PromoTypeIcon.vue';
import MobileMenu from '@/components/MobileMenu.vue';
import NavBar from '@/components/NavBar.vue';
import MainInfo from '@/components/promoShow/MainInfo.vue';
import PromoAddress from '@/components/promoShow/PromoAddress.vue';
import PromoDescription from '@/components/promoShow/PromoDescription.vue';
import PromoImage from '@/components/promoShow/PromoImage.vue';
import PromoTypeAccentLine from '@/components/promoShow/PromoTypeAccentLine.vue';
import PromoTypeActionButton from '@/components/promoShow/PromoTypeActionButton.vue';
import type { AppPageProps, CategoryModel, ContactModel, MenuData } from '@/types';
import { useClipboard } from '@vueuse/core';
import { usePage } from '@inertiajs/vue3';
import { computed, ref } from 'vue';
import '../../../css/internal/output.css';

const page = usePage<AppPageProps>();

const props = defineProps<{
    contact: ContactModel;
    navbarMenu: MenuData[];
    categories: CategoryModel[];
    promo: {
        id: number;
        img?: string | null;
        photos?: string[] | null;
        description?: string | null;
        name: string;
        promoTypeIcon?: string | null;
        promoTypeId?: number | null;
        simpleActionButtonTitle?: string | null;
        extraConditions?: string | null;
        salesOrderFrom?: number | null;
        availableTill?: string | null;
        hasFreeDeliveryBadge?: boolean | null;
        socialLinks?: Record<string, string[] | null> | null;
        promoCode?: string | null;
        addresses: Array<{
            id: number;
            name: string;
            openHours?: Record<string, string> | null;
            phone?: string | null;
            phoneSecondary?: string | null;
            website?: string | null;
        }>;
    };
}>();

const showPromoCode = ref(false);

const { copy, copied } = useClipboard({
    legacy: true,
    copiedDuring: 2000,
});

const promoCodeToCopy = computed(() => props.promo.promoCode?.trim() ?? '');

function copyPromoCode(): void {
    const text = promoCodeToCopy.value;
    if (!text) {
        return;
    }
    void copy(text);
}
</script>

<template>
    <div class="promo-page">
        <Header :user-data="page.props.userData" />

        <section class="body promo-show-section h-full max-w-full pb-9">
            <MobileMenu />
            <div class="promo-container mx-auto 2xl:w-full 2xl:px-4">
                <NavBar :menu-items="props.navbarMenu" />

                <CategoriesMenu :categories="props.categories" />

                <div class="saleBlocks mt-12 flex w-full items-start overflow-visible">
                    <div id="promoHiddenMob" class="salesLink1 mb-10 hidden rounded-3xl border bg-white py-4 shadow-2xl">
                        <div class="">
                            <p class="flex items-center px-6 py-2">
                                До конца акции
                                <img src="/images/png/images/alarm.png" class="mx-2 opacity-50" alt="time" />
                                <strong>4 дня 15:13:15</strong>
                            </p>
                            <div class="h-px w-full bg-black/20"></div>
                            <div class="px-6 py-2">
                                <!-- <h2 class="mt-2 text-lg">Зимняя распродажа до -50% на все в Снежная Королева!</h2> -->
                                <div class="mt-4 flex items-center gap-2">
                                    <PromoTypeIcon
                                        v-if="props.promo.promoTypeIcon"
                                        :icon="props.promo.promoTypeIcon"
                                        sizeClass="w-12 h-12"
                                        alt="discount"
                                    />
                                    <img v-else src="/images/png/images/discount.png" class="w-12" alt="discount" />
                                    <span class="text-2xl font-bold">{{ props.promo.name }}</span>
                                </div>
                                <div class="relative flex flex-col items-start">
                                    <PromoTypeAccentLine :promo-type-icon="props.promo.promoTypeIcon" class="absolute left-10 h-full" />
                                    <h4 class="ml-14 text-sm font-bold">Дополнительный условия</h4>
                                    <p class="ml-14 text-sm">{{ props.promo.extraConditions || 'Не указаны' }}</p>
                                    <h4 class="mt-4 ml-14 text-sm font-bold">Минимальная сумма</h4>
                                    <p class="ml-14 text-sm">
                                        {{ props.promo.salesOrderFrom ? `${props.promo.salesOrderFrom} рублей` : 'Не указана' }}
                                    </p>
                                </div>
                            </div>
                            <div class="w-full px-3">
                                <PromoTypeActionButton
                                    id="openThePromoMob"
                                    :promo-type-icon="props.promo.promoTypeIcon"
                                    :promo-type-id="props.promo.promoTypeId"
                                    :custom-label="props.promo.simpleActionButtonTitle"
                                />
                            </div>
                        </div>
                    </div>
                    <div id="promoCopyMob" class="mb-10 hidden rounded-3xl border bg-white py-4 shadow-2xl">
                        <div class="relative h-full w-full rounded-3xl px-12 py-20 shadow-2xl">
                            <svg
                                id="closeThePromoMob"
                                class="absolute top-4 right-4 h-8 w-8 cursor-pointer rounded-full p-1 hover:bg-black/50"
                                viewBox="0 0 24 24"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <rect width="24" height="24" fill="white" />
                                <path d="M7 17L16.8995 7.10051" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M7 7.00001L16.8995 16.8995" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div class="relative flex flex-col items-center justify-center">
                                <div class="w-12 rotate-12 rounded-lg bg-[#F4D710] p-2">
                                    <img src="/images/png/sale/promo.png" class="w-full" alt="promo" />
                                </div>
                                <h4 class="mt-1 text-black/50">Ваш промокод</h4>
                                <h2 id="promoCodeMob" class="mt-2 text-lg font-bold">
                                    {{ props.promo.promoCode ?? 'Уточняйте у менеджера' }}
                                </h2>
                                <div class="mt-4 h-px w-full bg-black/20"></div>
                                <button
                                    id="copyBtnMob"
                                    type="button"
                                    class="promo-mobile-copy-button mt-4 w-full rounded-3xl py-4 font-bold"
                                    @click="copyPromoCode"
                                >
                                    Скопировать и перейти на сайт
                                </button>
                                <p
                                    id="copyJustMob"
                                    role="button"
                                    class="mt-4 cursor-pointer text-black/50"
                                    @click="copyPromoCode"
                                >
                                    Просто скопировать
                                </p>
                                <p
                                    v-show="copied"
                                    id="copyYesMob"
                                    class="absolute -bottom-10 rounded-xl px-3 py-2 text-center shadow-xl"
                                >
                                    Скопировано!
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="rightBlocsks promo-right box-border overflow-visible">
                        <PromoImage
                            :img="props.promo.img"
                            :photos="props.promo.photos || null"
                            :title="props.promo.name"
                            :promo-type-icon="props.promo.promoTypeIcon"
                            :has-free-delivery-badge="props.promo.hasFreeDeliveryBadge"
                        />
                        <PromoDescription
                            :description="props.promo.description"
                            :social-links="props.promo.socialLinks || null"
                            :photos="props.promo.photos || null"
                        />
                    </div>
                    <div class="leftMainBlocks promo-left relative shrink-0 overflow-visible">
                        <div class="leftBlocsk promo-left-inner relative -left-[20px] z-40 mt-12 w-[400px]">
                            <MainInfo
                                v-if="!showPromoCode"
                                :promo-type-icon="props.promo.promoTypeIcon"
                                :promo-name="props.promo.name"
                                :extra-conditions="props.promo.extraConditions"
                                :sales-order-from="props.promo.salesOrderFrom"
                                :available-till="props.promo.availableTill"
                                :promo-type-id="props.promo.promoTypeId"
                                :simple-action-button-title="props.promo.simpleActionButtonTitle"
                                @get-promo-code="showPromoCode = true"
                            />
                            <div v-show="showPromoCode" class="salesLink2 rounded-3xl border bg-white p-4 shadow-2xl">
                                <div class="relative h-full w-full rounded-3xl px-12 py-20 shadow-2xl">
                                    <svg
                                        @click="showPromoCode = false"
                                        class="absolute top-4 right-4 h-8 w-8 cursor-pointer rounded-full p-1 hover:bg-black/50"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <rect width="24" height="24" fill="white" />
                                        <path d="M7 17L16.8995 7.10051" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M7 7.00001L16.8995 16.8995" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <div class="relative flex flex-col items-center justify-center">
                                        <div class="w-12 rotate-12 rounded-lg bg-[#F4D710] p-2">
                                            <img src="/images/png/sale/promo.png" class="w-full" alt="promo" />
                                        </div>
                                        <h4 class="mt-1 text-black/50">Ваш промокод</h4>
                                        <h2 id="promoCode" class="mt-2 text-lg font-bold">
                                            {{ props.promo.promoCode ?? 'Уточняйте у менеджера' }}
                                        </h2>
                                        <div class="mt-4 h-px w-full bg-black/20"></div>
                                        <button
                                            id="copyBtn"
                                            type="button"
                                            class="promo-mobile-copy-button mt-4 w-full rounded-3xl py-4 font-bold"
                                            @click="copyPromoCode"
                                        >
                                            Скопировать и перейти на сайт
                                        </button>
                                        <p
                                            id="copyJust"
                                            role="button"
                                            class="mt-4 cursor-pointer text-black/50"
                                            @click="copyPromoCode"
                                        >
                                            Просто скопировать
                                        </p>
                                        <p
                                            v-show="copied"
                                            id="copyYes"
                                            class="absolute -bottom-10 rounded-xl px-3 py-2 text-center shadow-xl"
                                        >
                                            Скопировано!
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <PromoAddress :addresses="props.promo.addresses" />
                        </div>
                    </div>
                </div>

                <DiscountCoupons />
            </div>
        </section>

        <Footer :contact="contact" />
    </div>
</template>

<style scoped>
/* overflow visible: иначе overflow-hidden на секции обрезает «наезд» карточки на карусель */
.promo-show-section {
    overflow: visible;
}

.promo-container {
    width: 1140px;
    overflow: visible;
}

.promo-right {
    width: 780px;
}

.promo-left {
    width: 410px;
}

.promo-left-inner {
    width: 400px;
}

.promo-mobile-copy-button {
    background-color: #f4d710;
}
</style>
