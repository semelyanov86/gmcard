<script setup lang="ts">
import CategoriesMenu from '@/components/CategoriesMenu.vue';
import Footer from '@/components/Footer.vue';
import Header from '@/components/Header.vue';
import MobileMenu from '@/components/MobileMenu.vue';
import NavBar from '@/components/NavBar.vue';
import AddressContactBlock from '@/components/Promo/AddressContactBlock.vue';
import CategorySelector from '@/components/Promo/CategorySelector.vue';
import CityFilterSelector from '@/components/Promo/CityFilterSelector.vue';
import ConditionsExampleModal from '@/components/Promo/ConditionsExampleModal.vue';
import DiscountInputBlock from '@/components/Promo/DiscountInputBlock.vue';
import FreeDeliveryBlock from '@/components/Promo/FreeDeliveryBlock.vue';
import GeographySelector from '@/components/Promo/GeographySelector.vue';
import PhotoUploadBlock from '@/components/Promo/PhotoUploadBlock.vue';
import PremiumOptions from '@/components/Promo/PremiumOptions.vue';
import PricingSummary from '@/components/Promo/PricingSummary.vue';
import PromoDescriptionBlock from '@/components/Promo/PromoDescriptionBlock.vue';
import PromoTitleInput from '@/components/Promo/PromoTitleInput.vue';
import PromoTypeSelector from '@/components/Promo/PromoTypeSelector.vue';
import ScheduleBlock from '@/components/Promo/ScheduleBlock.vue';
import SideNavigation from '@/components/Promo/SideNavigation.vue';
import SocialLinksBlock from '@/components/Promo/SocialLinksBlock.vue';
import ToggleSwitch from '@/components/Promo/ToggleSwitch.vue';
import TwoColumnFormBlock from '@/components/Promo/TwoColumnFormBlock.vue';
import YouTubeBlock from '@/components/Promo/YouTubeBlock.vue';
import Input from '@/components/primitives/Input.vue';
import PrimaryButton from '@/components/primitives/buttons/PrimaryButton.vue';
import ChevronRightIcon from '@/components/primitives/icons/ChevronRightIcon.vue';
import CloseIcon from '@/components/primitives/icons/CloseIcon.vue';
import EyeIcon from '@/components/primitives/icons/EyeIcon.vue';
import FileIcon from '@/components/primitives/icons/FileIcon.vue';
import type {
    AppPageProps,
    CategoryModel,
    CityModel,
    ContactModel,
    DiscountFilterModel,
    MenuData,
    PromoTypeModel,
    ScheduleModel,
    SocialNetworkModel,
    WeekdayModel,
} from '@/types';
import { MoneyValueObject } from '@/types/MoneyValueObject';
import { useForm, usePage } from '@inertiajs/vue3';
import { computed, ref, watch } from 'vue';
import '../../../css/internal/output.css';

const page = usePage<AppPageProps>();
const successMessage = ref<string | null>(null);

interface UserWithTariff {
    id: number
    name: string
    email: string
    balance: number
    active_promos_count: number
    tariff_plan?: {
        id: number
        slug: string
        name: string
        ads_count: number
        extra_ad_price: number
        banner_price: number
    }
}

const props = defineProps<{
    contact: ContactModel;
    categories: CategoryModel[];
    cities: CityModel[];
    promoTypes: PromoTypeModel[];
    discountFilters: DiscountFilterModel[];
    defaultDescription: string;
    weekdays: WeekdayModel[];
    socialNetworks: SocialNetworkModel[];
    user?: UserWithTariff;
    navbarMenu: MenuData[];
    sidebarMenu: MenuData[];
}>();

const userData = page.props.userData;

const form = useForm({
    promo_type_id: 1,
    discount: { amount: null as number | null, currency: '%' },
    cashback: { amount: null as number | null, currency: '%' },
    category_ids: [] as string[],
    title: '',
    description: props.defaultDescription,
    conditions: null as string | null,
    minimum_order_amount: null as number | null,
    promo_code: '',
    free_delivery: false,
    free_delivery_from: null as number | null,
    duration_days: 1,
    show_in_banner: false,
    addresses: [] as any[],
    schedule: {
        enabled: false,
        days: [] as string[],
        timeRange: { enabled: false, start: '00:00', end: '23:59' },
    },
    filter_city: '',
    city_ids: [] as number[],
    youtube_url: '',
    social_links: {} as Record<string, string[]>,
    photos: [] as File[],
    agree_to_terms: false,
});

const showPervyi = computed(() => [1, 2, 3].includes(form.promo_type_id));
const showPerviNew = computed(() => [6, 7].includes(form.promo_type_id));
const showVtoroi = computed(() => [1, 2].includes(form.promo_type_id));
const showTretiy = computed(() => [1, 2, 3, 4, 5, 6, 7].includes(form.promo_type_id));
const showChetvertyi = computed(() => [1, 2, 3, 7].includes(form.promo_type_id));

const discountMoney = computed({
    get: () => new MoneyValueObject(form.discount.amount, form.discount.currency),
    set: (value: MoneyValueObject) => {
        form.discount = { amount: value.amount, currency: value.currency };
    },
});

const cashbackMoney = computed({
    get: () => new MoneyValueObject(form.cashback.amount, form.cashback.currency),
    set: (value: MoneyValueObject) => {
        form.cashback = { amount: value.amount, currency: value.currency };
    },
});

const conditionsModalOpen = ref(false);

watch(
    () => page.props.flash,
    (flash) => {
        if (flash?.success) {
            successMessage.value = flash.success as string;
            form.reset();
            form.clearErrors();
            setTimeout(() => {
                successMessage.value = null;
            }, 5000);
        }
    },
    { immediate: true, deep: true },
);

function handlePreview() {}

function handleSaveDraft() {
    form.transform((data) => ({ ...data, is_draft: true })).post(route('promos.store'), {
        preserveScroll: false,
        onSuccess: () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        },
        onError: () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        },
    });
}

function handleLaunch() {
    form.post(route('promos.store'), {
        preserveScroll: false,
        onSuccess: () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        },
        onError: () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        },
    });
}
</script>

<template>
    <Header :userData="userData" />
    <section id="section-1" class="body h-full max-w-full overflow-hidden pb-9">
        <MobileMenu />

        <!-- Уведомление об успехе -->
        <Transition
            enter-active-class="transition ease-out duration-300"
            enter-from-class="translate-x-full opacity-0"
            enter-to-class="translate-x-0 opacity-100"
            leave-active-class="transition ease-in duration-200"
            leave-from-class="translate-x-0 opacity-100"
            leave-to-class="translate-x-full opacity-0"
        >
            <div v-if="successMessage" class="fixed top-4 right-4 z-50 max-w-md rounded-lg bg-green-500 px-6 py-4 text-white shadow-lg">
                <div class="flex items-center gap-3">
                    <svg class="h-6 w-6 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <p class="font-medium">{{ successMessage }}</p>
                    <button @click="successMessage = null" class="ml-auto hover:opacity-80">
                        <CloseIcon custom-class="h-5 w-5" />
                    </button>
                </div>
            </div>
        </Transition>

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
            <div class="filter_block mb-6 hidden h-12 items-center justify-between lg:h-full">
                <h3 class="text_filter text-2xl font-bold text-white">Фильтровать</h3>
                <CityFilterSelector :cities="props.cities" v-model="form.filter_city" />
                <div class="gapper filter_inp relative flex items-center gap-6 lg:flex-col">
                    <label for="shop" class="text-base text-white">Скидки</label>
                    <div class="selected_block relative inline-block h-12">
                        <div
                            id="custom_select"
                            class="custom_select focus:shadow-outline flex h-12 w-52 appearance-none items-center rounded-md border border-white bg-none px-4 py-2 pr-8 leading-tight text-white shadow hover:border-gray-300 focus:outline-none"
                        >
                            <div id="spaner" class="mr-2">Не менее 5%</div>
                            <img
                                src="/images/png/icons/down.png"
                                class="pointer-events-none absolute top-2 right-0 mt-3 mr-2 h-1 w-2"
                                alt="Вверх"
                                id="icons"
                            />
                        </div>
                        <div
                            class="custom-options_1 absolute z-50 mt-1 hidden h-50 w-52 overflow-y-scroll rounded-b border border-gray-400 bg-white shadow-lg"
                        >
                            <div
                                v-for="(filter, index) in props.discountFilters"
                                :key="filter.value"
                                class="custom-option_1 cursor-pointer px-4 py-2 hover:bg-gray-200"
                                :class="{ 'bg-yellow-400': index === 0 }"
                            >
                                {{ filter.label }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="gapper filter_inp relative flex items-center gap-6 lg:flex-col">
                    <label for="sale" class="text-base text-white">Вид акции</label>
                    <div class="selected_block relative inline-block h-12">
                        <div
                            class="custom_selected focus:shadow-outline flex h-12 w-52 appearance-none items-center rounded-md border border-white bg-none px-4 py-2 pr-8 leading-tight text-white shadow hover:border-gray-300 focus:outline-none"
                        >
                            <div id="spaner1" class="mr-2">Все</div>
                            <img
                                src="/images/png/icons/down.png"
                                class="pointer-events-none absolute top-2 right-0 mt-3 mr-2 h-1 w-2"
                                alt="Вверх"
                                id="icons"
                            />
                        </div>
                        <div
                            class="custom-options_2 absolute z-50 mt-1 hidden h-50 w-52 overflow-y-scroll rounded-b border border-gray-400 bg-white shadow-lg"
                        >
                            <div class="custom-option_2 cursor-pointer bg-yellow-400 px-4 py-2 hover:bg-gray-200">Все</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="myBlocks mt-12 flex h-full w-full gap-10">
                <SideNavigation mode="mobile" :menu-items="sidebarMenu" />
                <div class="main_block w-3/4 rounded-2xl bg-blue-950 p-8 md:w-full md:p-4">
                    <h2 class="text-4xl font-bold text-white md:text-3xl">Создание новой акции, выберите тип акции</h2>
                    <PromoTypeSelector
                        :selectedPromo="form.promo_type_id"
                        :promoTypes="props.promoTypes"
                        @update:selectedPromo="form.promo_type_id = $event"
                    />
                    <DiscountInputBlock
                        :show="showPervyi"
                        label="Какой % скидки или суммы в рублях вы готовы предоставить?"
                        v-model="discountMoney"
                        :error="form.errors['discount.amount'] || form.errors['discount.currency']"
                    />
                    <DiscountInputBlock
                        :show="showPerviNew"
                        label="Какой % кэшбэка вы готовы предоставить?"
                        v-model="cashbackMoney"
                        :error="form.errors['cashback.amount'] || form.errors['cashback.currency']"
                    />
                    <TwoColumnFormBlock :show="showTretiy" class="m-8" id="tretiy">
                        <template #description>
                            <p class="all_text text-black/50">
                                <strong class="text-base text-black">Если одним из условий является минимальная сумма заказа,</strong> то необходимо
                                указать от какой суммы именно. Если такого условия нет, то оставьте поле пустым.
                            </p>
                        </template>
                        <template #input>
                            <div class="relative">
                                <label for="minimum_order" class="text-sm font-bold">Минимальная сумма заказа</label>
                                <Input
                                    v-model="form.minimum_order_amount"
                                    type="number"
                                    name="minimum_order"
                                    placeholder="1000"
                                    min="0"
                                    step="1"
                                    class="mt-3 w-full pr-8"
                                    :error="!!form.errors.minimum_order_amount"
                                />
                                <span class="absolute right-3 bottom-2 text-black/50">₽</span>
                                <p v-if="form.errors.minimum_order_amount" class="mt-2 text-sm text-red-600">
                                    {{ form.errors.minimum_order_amount }}
                                </p>
                            </div>
                        </template>
                    </TwoColumnFormBlock>
                    <TwoColumnFormBlock :show="showVtoroi" id="vtoroi">
                        <template #description>
                            <h3 class="text-base font-bold">Если для получения скидки необходимо вводить код</h3>
                            <p class="all_text text-black/50">
                                (например интернет-магазин), то вы можете указать его здесь. Если ничего вводить не нужно, то оставьте поле пустым.
                            </p>
                        </template>
                        <template #input>
                            <label for="promo_code" class="text-sm font-bold">Код для скидки</label>
                            <Input
                                v-model="form.promo_code"
                                type="text"
                                name="promo_code"
                                placeholder="NJTON564YNN565N56"
                                class="mt-3 w-full"
                                :error="!!form.errors.promo_code"
                            />
                            <p v-if="form.errors.promo_code" class="mt-2 text-sm text-red-600">{{ form.errors.promo_code }}</p>
                        </template>
                    </TwoColumnFormBlock>
                    <FreeDeliveryBlock
                        :show="showChetvertyi"
                        v-model:freeDelivery="form.free_delivery"
                        v-model:freeDeliveryFrom="form.free_delivery_from"
                    />
                    <PromoTitleInput v-model="form.title" :error="form.errors.title" />
                    <PhotoUploadBlock />
                    <YouTubeBlock v-model="form.youtube_url as string" :error="form.errors.youtube_url" />
                    <PromoDescriptionBlock
                        v-model:description="form.description"
                        v-model:conditions="form.conditions"
                        :descriptionError="form.errors.description"
                        :conditionsError="form.errors.conditions"
                        @openConditionsModal="conditionsModalOpen = true"
                    />
                    <ConditionsExampleModal :isOpen="conditionsModalOpen" @close="conditionsModalOpen = false" />
                    <SocialLinksBlock v-model="form.social_links as Record<string, string[]>" :socialNetworks="props.socialNetworks" />
                    <AddressContactBlock v-model="form.addresses" />
                    <ScheduleBlock v-model="form.schedule as unknown as ScheduleModel" :weekdays="props.weekdays" />
                    <GeographySelector v-model="form.city_ids as number[]" :cities="props.cities" :error="form.errors.city_ids" />
                    <div class="mt-8 flex hidden flex-col rounded-2xl bg-white p-4 max-md:flex max-md:p-4" id="">
                        <div class="flex flex-col">
                            <h2 class="font-bold">К каким категориям относится ваша акция?</h2>
                            <button class="mt-2 flex justify-between rounded-lg bg-blue-700 px-8 py-3 text-white">
                                Открыть категории
                                <ChevronRightIcon custom-class="text-white w-6" />
                            </button>
                        </div>
                        <!-- <div class="mx-8">
                            <h3 class="font-bold mt-5">Вы выбрали</h3>
                            <div id="tag-container" class="flex flex-wrap gap-3 py-3"></div>
                        </div> -->
                    </div>
                    <CategorySelector
                        :categories="props.categories"
                        v-model:selectedCategories="form.category_ids as string[]"
                        :error="form.errors.category_ids"
                    />
                    <div class="mt-8 flex flex-row justify-between rounded-2xl bg-white p-8 max-md:flex-col max-md:p-4" id="chetyrnadsat">
                        <p class="w-96 text-black/50 max-md:mb-4 max-md:w-full">
                            <strong class="text-black">На какое количество дней будет запущена акция?</strong><br />Максимум 30 дней.
                        </p>
                        <div class="flex flex-col gap-2">
                            <div class="flex items-center gap-4">
                                <div class="relative flex w-44 items-center gap-2 max-md:w-full">
                                    <span class="text-xs opacity-80">1</span>
                                    <input v-model.number="form.duration_days" class="w-36" type="range" min="1" max="30" />
                                    <span class="text-xs opacity-80">30</span>
                                </div>
                                <Input
                                    v-model="form.duration_days"
                                    type="number"
                                    min="1"
                                    max="30"
                                    class="w-16 text-center text-lg"
                                    :error="!!form.errors.duration_days"
                                />
                            </div>
                            <p v-if="form.errors.duration_days" class="text-sm text-red-600">{{ form.errors.duration_days }}</p>
                        </div>
                    </div>
                    <div class="mt-8 flex flex-row items-start justify-between rounded-2xl bg-white p-8 max-md:flex-col max-md:p-4" id="pyatnadsat">
                        <div class="max-w-md max-md:mb-4 max-md:w-full">
                            <h3 class="font-bold">
                                Желаете чтобы ваша акция так же появлялась и в баннере на главной странице сайта?<span
                                    id="hiddenText"
                                    class="hidden font-normal text-black/50"
                                    >В этом случае стоимость запуска акции будет в 3 раза дороже. Бесплатно, если вы предлагаете скидку более
                                    50%.</span
                                >
                            </h3>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="all_text text-base" id="notAgree">Нет</span>
                            <ToggleSwitch v-model="form.show_in_banner" />
                            <span class="all_text text_opac text-base" id="agree">Да, желаю</span>
                        </div>
                    </div>
                    <PremiumOptions />
                    <PricingSummary
                        :balance="props.user?.balance"
                        :duration-days="form.duration_days"
                        :show-in-banner="form.show_in_banner"
                        :active-promos-count="props.user?.active_promos_count"
                        :user-tariff="props.user?.tariff_plan"
                    />
                    <div class="mt-5 flex items-center gap-2">
                        <input v-model="form.agree_to_terms" type="checkbox" id="rules" />
                        <label for="rules" class="all_text text-slate-600">
                            С условиями пользования сервисом и стоимостью ознакомлен и полностью согласен
                        </label>
                    </div>
                    <div class="mt-5 flex flex-row justify-between gap-3 max-md:flex-col">
                        <div class="flex flex-col gap-3 max-md:w-full">
                            <PrimaryButton @click="handlePreview" full-width>
                                <EyeIcon />
                                <span class="all_text text-white">Предпросмотр акции</span>
                            </PrimaryButton>
                            <PrimaryButton @click="handleSaveDraft" :disabled="form.processing" full-width>
                                <FileIcon />
                                <span class="all_text text-white">Сохранить как черновик</span>
                            </PrimaryButton>
                        </div>
                    </div>
                    <PrimaryButton @click="handleLaunch" :disabled="form.processing || !form.agree_to_terms" large class="mt-5">
                        <span class="text-white">Запустить акцию</span>
                    </PrimaryButton>
                </div>
                <SideNavigation mode="desktop" :menu-items="sidebarMenu" />
            </div>
        </div>
    </section>
    <Footer :contact="contact"></Footer>
</template>
