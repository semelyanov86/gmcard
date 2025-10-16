<script setup lang="ts">
import CategoriesMenu from '@/components/CategoriesMenu.vue';
import Footer from '@/components/Footer.vue';
import Header from '@/components/Header.vue';
import NavBar from '@/components/NavBar.vue';
import AddressContactBlock from '@/components/Promo/AddressContactBlock.vue';
import CategorySelector from '@/components/Promo/CategorySelector.vue';
import ConditionsExampleModal from '@/components/Promo/ConditionsExampleModal.vue';
import DiscountInputBlock from '@/components/Promo/DiscountInputBlock.vue';
import FreeDeliveryBlock from '@/components/Promo/FreeDeliveryBlock.vue';
import GeographySelector from '@/components/Promo/GeographySelector.vue';
import PhotoUploadBlock from '@/components/Promo/PhotoUploadBlock.vue';
import PremiumOptions from '@/components/Promo/PremiumOptions.vue';
import PricingSummary from '@/components/Promo/PricingSummary.vue';
import PromoDescriptionBlock from '@/components/Promo/PromoDescriptionBlock.vue';
import PromoTypeSelector from '@/components/Promo/PromoTypeSelector.vue';
import ScheduleBlock from '@/components/Promo/ScheduleBlock.vue';
import SideNavigation from '@/components/Promo/SideNavigation.vue';
import SocialLinksBlock from '@/components/Promo/SocialLinksBlock.vue';
import YouTubeBlock from '@/components/Promo/YouTubeBlock.vue';
import ChevronRightIcon from '@/components/primitives/icons/ChevronRightIcon.vue';
import CloseIcon from '@/components/primitives/icons/CloseIcon.vue';
import InfoIcon from '@/components/primitives/icons/InfoIcon.vue';
import type { CategoryModel, CityModel, ContactModel, PromoTypeModel } from '@/types';
import { computed, ref } from 'vue';
import '../../../css/internal/output.css';

const props = defineProps<{
    contact: ContactModel;
    categories: CategoryModel[];
    cities: CityModel[];
    promoTypes: PromoTypeModel[];
    userBalance: number;
}>();

const selectedPromo = ref<number>(1);

const showPervyi = computed(() => [1, 2, 3].includes(selectedPromo.value));
const showPerviNew = computed(() => [6, 7].includes(selectedPromo.value));
const showVtoroi = computed(() => [1, 2].includes(selectedPromo.value));
const showTretiy = computed(() => [1, 2, 3, 4, 5, 6, 7].includes(selectedPromo.value));
const showChetvertyi = computed(() => [1, 2, 3, 7].includes(selectedPromo.value));

const discountAmount = ref('');
const currency1Value = ref('%');
const cashbackAmount = ref('');
const currency2Value = ref('%');

const conditionsModalOpen = ref(false);

const selectedCategories = ref<string[]>([]);
</script>

<template>
    <Header></Header>
    <section id="section-1" class="body h-full max-w-full overflow-hidden pb-9">
        <div class="animated-block hidden w-full rounded-b-md bg-[#28A8EB] px-12 py-4 font-semibold shadow-lg">
            <ul class="flex flex-col">
                <li class="py-3 opacity-85 hover:opacity-100"><a href="#" class="text-base text-white">Главная</a></li>
                <li class="py-3 opacity-85 hover:opacity-100"><a href="discount.html" class="text-base text-white">Пользователям</a></li>
                <li class="py-3 opacity-85 hover:opacity-100"><a href="kashback.html" class="text-base text-white">Кэшбек</a></li>
                <li class="py-3 opacity-85 hover:opacity-100"><a href="buis.html" class="text-base text-white">Для бизнеса</a></li>
                <li class="py-3 opacity-85 hover:opacity-100"><a href="help.html" class="text-base text-white">Правила</a></li>
                <li class="py-3 opacity-85 hover:opacity-100"><a href="help.html" class="text-base text-white">Контакты</a></li>
            </ul>
        </div>
        <div class="mx-auto w-[1140px] 2xl:w-full 2xl:px-4">
            <NavBar></NavBar>
            <CategoriesMenu></CategoriesMenu>
            <!-- mobile modal -->
            <div class="fixed top-0 left-0 z-50 hidden h-screen w-full overflow-auto bg-white" id="modal_sub">
                <div class="relative m-auto flex h-full w-full flex-col p-6">
                    <CloseIcon id="modal-closeSub" custom-class="w-5 h-5 text-[#7f8588] font-extrabold absolute right-5 top-5" />
                    <div class="rounded-lg bg-white px-4 py-8">
                        <ul class="mb-6 list-none" id="list_subMenu"></ul>
                    </div>
                </div>
            </div>
            <!-- mobile modal -->
            <div class="h-[1px] w-full bg-white opacity-10"></div>
            <div class="filter_block mb-6 hidden h-[46px] items-center justify-between lg:h-full">
                <h3 class="text_filter text-2xl font-bold text-white">Фильтровать</h3>
                <div class="gapper filter_inp relative flex h-full items-center gap-6 lg:flex-col">
                    <label for="city" class="text-[15px] text-white">Ваш город</label>
                    <div class="selected_block relative inline-block h-[46px]">
                        <div
                            class="custom-select focus:shadow-outline flex h-[46px] w-[202px] appearance-none items-center rounded-md border border-white bg-none px-4 py-2 pr-8 leading-tight text-white shadow hover:border-gray-300 focus:outline-none"
                        >
                            <span class="mr-2">Чебоксары</span>
                            <img
                                src="/assets/icons/down.png"
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
                                src="/assets/icons/down.png"
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
                                src="/assets/icons/down.png"
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
            <div class="myBlocks mt-12 flex h-full w-full gap-10">
                <SideNavigation mode="mobile" />
                <div class="main_block w-3/4 rounded-2xl bg-[#063966] p-8 md:w-full md:p-4">
                    <h2 class="text-4xl font-bold text-white md:text-3xl">Создание новой акции, выберите тип акции</h2>
                    <PromoTypeSelector :selectedPromo="selectedPromo" :promoTypes="props.promoTypes" @update:selectedPromo="selectedPromo = $event" />
                    <DiscountInputBlock
                        :show="showPervyi"
                        label="Какой % скидки или суммы в рублях вы готовы предоставить?"
                        v-model:amount="discountAmount"
                        v-model:currency="currency1Value"
                    />
                    <DiscountInputBlock
                        :show="showPerviNew"
                        label="Какой % кэшбэка вы готовы предоставить?"
                        v-model:amount="cashbackAmount"
                        v-model:currency="currency2Value"
                    />
                    <div
                        v-show="showTretiy"
                        class="m-8 mt-8 flex flex-row items-center justify-between rounded-2xl bg-white p-8 max-md:flex-col max-md:p-4"
                        id="tretiy"
                    >
                        <div class="flex w-[450px] flex-col max-md:w-full">
                            <p class="all_text text-black/50">
                                <strong class="text-base text-black">Если одним из условий является минимальная сумма заказа,</strong> то необходимо
                                указать от какой суммы именно. Если такого условия нет, то оставьте поле пустым.
                            </p>
                        </div>
                        <div class="relative ml-12 flex h-[74px] w-[210px] flex-col max-md:mt-4 max-md:ml-0 max-md:h-auto max-md:w-full">
                            <label for="code_for_sale" class="text-sm font-bold">Минимальная сумма заказа</label>
                            <input type="text" name="code_for_sale" placeholder="1000" class="mt-3 w-full rounded-lg border-gray-300 pr-8 pl-3" />
                            <span class="absolute right-3 bottom-2 text-black/50">₽</span>
                        </div>
                    </div>
                    <div
                        v-show="showVtoroi"
                        class="mt-8 flex flex-row items-center justify-between rounded-2xl bg-white p-8 max-md:flex-col max-md:p-4"
                        id="vtoroi"
                    >
                        <div class="flex w-[450px] flex-col max-md:w-full">
                            <h3 class="text-base font-bold">Если для получения скидки необходимо вводить код</h3>
                            <p class="all_text text-black/50">
                                (например интернет-магазин), то вы можете указать его здесь. Если ничего вводить не нужно, то оставьте поле пустым.
                            </p>
                        </div>
                        <div class="ml-12 flex h-[74px] w-[210px] flex-col max-md:mt-4 max-md:ml-0 max-md:h-auto max-md:w-full">
                            <label for="code_for_sale" class="text-sm font-bold">Код для скидки</label>
                            <input type="text" name="code_for_sale" placeholder="NJTON564YNN565N56" class="mt-3 w-full rounded-lg border-gray-300" />
                        </div>
                    </div>
                    <FreeDeliveryBlock :show="showChetvertyi" />
                    <div class="mt-8 flex w-full flex-col rounded-2xl bg-white p-8 max-md:p-4" id="pyatyi">
                        <h3 class="text-base font-bold">Введите заголовок (названии акции), максимум 64 символа.</h3>
                        <p class="all_text text-black/50">
                            Вы можете указать в заголовке имя своего бренда (пример в строке), что поможет пользователям отслеживать все ваши акции и
                            возможно сделает вас более узнаваемым.
                        </p>
                        <div class="relative">
                            <input
                                type="text"
                                oninput="countDown(event)"
                                class="mt-3 w-full rounded-lg border-gray-300"
                                placeholder="Скидки до 30% в Desigual! Зарядись энергией Desigual!"
                                id="textSymbol"
                                maxlength="64"
                            />
                            <span id="count" class="absolute right-3 bottom-[10px] font-bold text-[#2578cf]">64</span>
                        </div>
                    </div>
                    <PhotoUploadBlock />
                    <YouTubeBlock />
                    <PromoDescriptionBlock @openConditionsModal="conditionsModalOpen = true" />
                    <ConditionsExampleModal :isOpen="conditionsModalOpen" @close="conditionsModalOpen = false" />
                    <SocialLinksBlock />
                    <AddressContactBlock />
                    <ScheduleBlock />
                    <GeographySelector :cities="props.cities" />
                    <div class="mt-8 flex hidden flex-col rounded-2xl bg-white p-4 max-md:flex max-md:p-4" id="">
                        <div class="flex flex-col">
                            <h2 class="font-bold">К каким категориям относится ваша акция?</h2>
                            <button class="mt-2 flex justify-between rounded-lg bg-[#0066cb] px-8 py-3 text-white">
                                Открыть категории
                                <ChevronRightIcon custom-class="text-white w-6" />
                            </button>
                        </div>
                        <!-- <div class="mx-8">
                            <h3 class="font-bold mt-5">Вы выбрали</h3>
                            <div id="tag-container" class="flex flex-wrap gap-3 py-3"></div>
                        </div> -->
                    </div>
                    <CategorySelector :categories="props.categories" v-model:selectedCategories="selectedCategories" />
                    <div class="mt-8 flex flex-row justify-between rounded-2xl bg-white p-8 max-md:flex-col max-md:p-4" id="chetyrnadsat">
                        <p class="w-[380px] text-black/50 max-md:mb-4 max-md:w-full">
                            <strong class="text-black">На какое количество дней будет запущена акция?</strong><br />Максимум 30 дней.
                        </p>
                        <div class="flex items-center gap-4">
                            <div class="relative flex w-[180px] items-center gap-2 max-md:w-full">
                                <span class="text-xs opacity-80">0</span>
                                <input id="slider" class="w-[150px]" type="range" min="0" max="30" value="0" />
                                <div id="slider-value" class="slider-value">0</div>
                                <span class="text-xs opacity-80">30</span>
                            </div>
                            <div class="w-[50px] rounded-md border py-2 text-center text-lg" id="slider_value">0</div>
                        </div>
                    </div>
                    <div class="mt-8 flex flex-row items-start justify-between rounded-2xl bg-white p-8 max-md:flex-col max-md:p-4" id="pyatnadsat">
                        <div class="w-[450px] max-md:mb-4 max-md:w-full">
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
                            <label class="toggle-switch relative inline-flex cursor-pointer items-center">
                                <input type="checkbox" value="" class="peer sr-only" id="saleValue" />
                                <div
                                    class="h-7 w-14 rounded-full border border-gray-200 bg-gray-200 peer-checked:border-blue-600 peer-checked:bg-blue-600 peer-focus:outline-none after:absolute after:top-[2px] after:left-[2px] after:h-6 after:w-6 after:rounded-full after:border after:border-gray-300 after:bg-white after:transition-all after:content-[''] peer-checked:after:translate-x-[1.75rem] peer-checked:after:border-white"
                                ></div>
                            </label>
                            <span class="all_text text_opac text-base" id="agree">Да, желаю</span>
                        </div>
                    </div>
                    <PremiumOptions />
                    <PricingSummary :balance="props.userBalance" />
                </div>
                <SideNavigation mode="desktop" />
            </div>
        </div>
    </section>
    <div id="alertFile" class="fixed top-2 left-[40%] mb-4 hidden rounded-md border-4 border-[#0066CB] bg-white p-4">
        <div class="flex items-center">
            <InfoIcon custom-class="w-4 h-4 mr-2 text-[#0066CB]" />
            <span class="sr-only">Info</span>
            <h3 class="text-lg font-black">Внимание!</h3>
        </div>
        <div class="mt-2 mb-4 text-sm text-black">Файл слишком большой. Максимальный размер файла - 10 МБ.</div>
        <div class="flex">
            <button
                type="button"
                id="alertClose"
                class="focus:ring-blue/20 rounded-lg border-2 border-[#0066CB] bg-transparent px-3 py-1.5 text-center text-base font-medium text-[#0066CB] hover:bg-[#0066CB] hover:text-white focus:ring-4 focus:outline-none dark:border-red-600 dark:text-red-500 dark:hover:bg-red-600 dark:hover:text-white dark:focus:ring-red-800"
            >
                Понятно
            </button>
        </div>
    </div>
    <Footer :contact="contact"></Footer>
</template>

<style>
.toggle-switch input:checked ~ div::after {
    transform: translateX(1.75rem);
}
</style>
