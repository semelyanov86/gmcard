<script setup lang="ts">
import { ref, computed } from 'vue';
import '../../../css/internal/output.css';
import Footer from '@/components/Footer.vue';
import Header from '@/components/Header.vue';
import NavBar from '@/components/NavBar.vue';
import CategoriesMenu from '@/components/CategoriesMenu.vue';
import YouTubeBlock from '@/components/Promo/YouTubeBlock.vue';
import SocialLinksBlock from '@/components/Promo/SocialLinksBlock.vue';
import PromoTypeSelector from '@/components/Promo/PromoTypeSelector.vue';
import PhotoUploadBlock from '@/components/Promo/PhotoUploadBlock.vue';
import AddressContactBlock from '@/components/Promo/AddressContactBlock.vue';
import DiscountInputBlock from '@/components/Promo/DiscountInputBlock.vue';
import ConditionsExampleModal from '@/components/Promo/ConditionsExampleModal.vue';
import CategorySelector from '@/components/Promo/CategorySelector.vue';
import SideNavigation from '@/components/Promo/SideNavigation.vue';
import ScheduleBlock from '@/components/Promo/ScheduleBlock.vue';
import PremiumOptions from '@/components/Promo/PremiumOptions.vue';
import PricingSummary from '@/components/Promo/PricingSummary.vue';
import GeographySelector from '@/components/Promo/GeographySelector.vue';
import PromoDescriptionBlock from '@/components/Promo/PromoDescriptionBlock.vue';
import FreeDeliveryBlock from '@/components/Promo/FreeDeliveryBlock.vue';

defineProps<{
    contact: {
        email: string;
        phone: string;
    };
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
    <section id="section-1" class="body max-w-full h-full pb-9 overflow-hidden">
        <div class="py-4 px-12 bg-[#28A8EB] shadow-lg font-semibold rounded-b-md w-full hidden animated-block">
            <ul class="flex flex-col">
                <li class="py-3 opacity-85 hover:opacity-100"><a href="#" class="text-white text-base">Главная</a></li>
                <li class="py-3 opacity-85 hover:opacity-100"><a href="discount.html" class="text-white text-base">Пользователям</a></li>
                <li class="py-3 opacity-85 hover:opacity-100"><a href="kashback.html" class="text-white text-base">Кэшбек</a></li>
                <li class="py-3 opacity-85 hover:opacity-100"><a href="buis.html" class="text-white text-base">Для бизнеса</a></li>
                <li class="py-3 opacity-85 hover:opacity-100"><a href="help.html" class="text-white text-base">Правила</a></li>
                <li class="py-3 opacity-85 hover:opacity-100"><a href="help.html" class="text-white text-base">Контакты</a></li>
            </ul>
        </div>
        <div class="2xl:w-full 2xl:px-4 w-[1140px] mx-auto">
           <NavBar></NavBar>
            <CategoriesMenu></CategoriesMenu>
                <!-- mobile modal -->
                <div class="fixed top-0 left-0 h-screen z-50 overflow-auto bg-white w-full hidden" id="modal_sub">
                    <div class="relative w-full h-full  m-auto flex-col flex p-6">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" id="modal-closeSub" stroke="currentColor" class="w-5 h-5 text-[#7f8588] font-extrabold absolute right-5 top-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        <div class="bg-white rounded-lg px-4 py-8">
                            <ul class="mb-6 list-none" id="list_subMenu">

                            </ul>
                        </div>
                    </div>
                </div>
                <!-- mobile modal -->
            <div class="w-full h-[1px] bg-white opacity-10"></div>
            <div class=" items-center justify-between mb-6 lg:h-full h-[46px] filter_block hidden">
                <h3 class="text-2xl text-white font-bold text_filter">Фильтровать</h3>
                <div class="flex items-center lg:flex-col gapper gap-6 h-full relative filter_inp">
                    <label for="city" class="text-white text-[15px]">Ваш город</label>
                    <div class="relative inline-block selected_block h-[46px]">
                        <div class="custom-select h-[46px] flex items-center appearance-none w-[202px] bg-none border text-white border-white hover:border-gray-300 px-4 py-2 pr-8 rounded-md shadow leading-tight focus:outline-none focus:shadow-outline">
                            <span class=" mr-2">Чебоксары</span>
                            <img src="/assets/icons/down.png" class="h-[5px] w-2 absolute right-0 top-2 mt-3 mr-2 pointer-events-none" alt="Вверх" id="icons">
                        </div>
                        <div class="custom-options absolute hidden mt-1 w-[202px] h-[200px] overflow-y-scroll bg-white shadow-lg rounded-b border border-gray-400 z-50">
                            <div class="custom-option px-4 py-2 cursor-pointer bg-[#F9D914] hover:bg-gray-200">Чебоксары</div>
                            <div class="custom-option px-4 py-2 cursor-pointer hover:bg-gray-200">Москва </div>
                            <div class="custom-option px-4 py-2 cursor-pointer hover:bg-gray-200">Санкт-Петербург</div>
                            <div class="custom-option px-4 py-2 cursor-pointer hover:bg-gray-200">Другой город</div>
                        </div>
                    </div>
                </div>
                <div class="flex items-center lg:flex-col gapper gap-6 relative filter_inp">
                    <label for="shop" class="text-white tex-[15px]">Скидки</label>
                    <div class="relative inline-block selected_block h-[46px]">
                        <div id="custom_select" class="custom_select h-[46px] flex items-center appearance-none w-[202px] bg-none border text-white border-white hover:border-gray-300 px-4 py-2 pr-8 rounded-md shadow leading-tight focus:outline-none focus:shadow-outline">
                            <div id="spaner" class="mr-2">Не менее 5%</div>
                            <img src="/assets/icons/down.png" class="h-[5px] w-2 absolute right-0 top-2 mt-3 mr-2 pointer-events-none" alt="Вверх" id="icons">
                        </div>
                        <div class="custom-options_1 absolute hidden mt-1 w-[202px] h-[200px] overflow-y-scroll bg-white shadow-lg rounded-b border border-gray-400 z-50">
                            <div class="custom-option_1 px-4 py-2 cursor-pointer bg-[#F9D914] hover:bg-gray-200">Не менее 5%</div>
                            <div class="custom-option_1 px-4 py-2 cursor-pointer hover:bg-gray-200">Не менее 10%</div>
                            <div class="custom-option_1 px-4 py-2 cursor-pointer hover:bg-gray-200">Не менее 15%</div>
                            <div class="custom-option_1 px-4 py-2 cursor-pointer hover:bg-gray-200">Не менее 20%</div>
                            <div class="custom-option_1 px-4 py-2 cursor-pointer hover:bg-gray-200">Не менее 25%</div>
                            <div class="custom-option_1 px-4 py-2 cursor-pointer hover:bg-gray-200">Не менее 30%</div>
                            <div class="custom-option_1 px-4 py-2 cursor-pointer hover:bg-gray-200">Не менее 35%</div>
                            <div class="custom-option_1 px-4 py-2 cursor-pointer hover:bg-gray-200">Не менее 40%</div>
                            <div class="custom-option_1 px-4 py-2 cursor-pointer hover:bg-gray-200">Не менее 45%</div>
                            <div class="custom-option_1 px-4 py-2 cursor-pointer hover:bg-gray-200">Не менее 50%</div>
                            <div class="custom-option_1 px-4 py-2 cursor-pointer hover:bg-gray-200">Не менее 55%</div>
                            <div class="custom-option_1 px-4 py-2 cursor-pointer hover:bg-gray-200">Не менее 60%</div>
                            <div class="custom-option_1 px-4 py-2 cursor-pointer hover:bg-gray-200">Не менее 65%</div>
                            <div class="custom-option_1 px-4 py-2 cursor-pointer hover:bg-gray-200">Не менее 70%</div>
                            <div class="custom-option_1 px-4 py-2 cursor-pointer hover:bg-gray-200">Не менее 75%</div>
                            <div class="custom-option_1 px-4 py-2 cursor-pointer hover:bg-gray-200">Не менее 80%</div>
                            <div class="custom-option_1 px-4 py-2 cursor-pointer hover:bg-gray-200">Не менее 85%</div>
                            <div class="custom-option_1 px-4 py-2 cursor-pointer hover:bg-gray-200">Не менее 90%</div>
                            <div class="custom-option_1 px-4 py-2 cursor-pointer hover:bg-gray-200">Не менее 95%</div>
                            <div class="custom-option_1 px-4 py-2 cursor-pointer hover:bg-gray-200">Не менее 100%</div>
                        </div>
                    </div>
                </div>
                <div class="flex items-center lg:flex-col gapper gap-6 relative filter_inp">
                    <label for="sale" class="text-white tex-[15px]">Вид акции</label>
                    <div class="relative inline-block selected_block h-[46px]">
                        <div class="custom_selected h-[46px] flex items-center appearance-none w-[202px] bg-none border text-white border-white hover:border-gray-300 px-4 py-2 pr-8 rounded-md shadow leading-tight focus:outline-none focus:shadow-outline">
                            <div id="spaner1" class="mr-2">Все</div>
                            <img src="/assets/icons/down.png" class="h-[5px] w-2 absolute right-0 top-2 mt-3 mr-2 pointer-events-none" alt="Вверх" id="icons">
                        </div>
                        <div class="custom-options_2 absolute hidden mt-1 w-[202px] h-[200px] overflow-y-scroll bg-white shadow-lg rounded-b border border-gray-400 z-50">
                            <div class="custom-option_2 px-4 py-2 cursor-pointer bg-[#F9D914] hover:bg-gray-200">Все</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex myBlocks gap-10 w-full h-full mt-12">
                <SideNavigation mode="mobile" />
                <div class="w-3/4 md:w-full main_block bg-[#063966] p-8 md:p-4 rounded-2xl">
                    <h2 class="text-4xl md:text-3xl font-bold text-white">Создание новой акции, выберите тип акции</h2>
                    <PromoTypeSelector 
                        :selectedPromo="selectedPromo"
                        @update:selectedPromo="selectedPromo = $event"
                    />
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
                    <div v-show="showTretiy" class="flex bg-white p-8 max-md:p-4 mt-8 m-8 rounded-2xl flex-row max-md:flex-col justify-between items-center" id="tretiy">
                        <div class="flex flex-col w-[450px] max-md:w-full">
                            <p class="text-black/50 all_text"> <strong class="text-black text-base">Если одним из условий является минимальная сумма заказа,</strong> то необходимо указать от какой суммы именно. Если такого условия нет, то оставьте поле пустым.</p>
                        </div>
                        <div class="flex flex-col w-[210px] h-[74px] ml-12 max-md:w-full max-md:h-auto max-md:mt-4 max-md:ml-0 relative">
                            <label for="code_for_sale" class="text-sm font-bold">Минимальная сумма заказа</label>
                            <input type="text" name="code_for_sale" placeholder="1000" class="border-gray-300 rounded-lg w-full mt-3 pl-3 pr-8">
                            <span class="absolute bottom-2 right-3 text-black/50">₽</span>
                        </div>
                    </div>
                    <div v-show="showVtoroi" class="flex bg-white p-8 max-md:p-4 mt-8 rounded-2xl flex-row max-md:flex-col justify-between items-center" id="vtoroi">
                        <div class="flex flex-col w-[450px] max-md:w-full">
                            <h3 class="text-base font-bold">Если для получения скидки необходимо вводить код</h3>
                            <p class="text-black/50 all_text">(например интернет-магазин), то вы можете указать его здесь. Если ничего вводить не нужно, то оставьте поле пустым.</p>
                        </div>
                        <div class="flex flex-col w-[210px] h-[74px] ml-12 max-md:w-full max-md:h-auto max-md:mt-4 max-md:ml-0">
                            <label for="code_for_sale" class="text-sm font-bold">Код для скидки</label>
                            <input type="text" name="code_for_sale" placeholder="NJTON564YNN565N56" class="border-gray-300 rounded-lg w-full mt-3">
                        </div>
                    </div>
                    <FreeDeliveryBlock :show="showChetvertyi" />
                    <div class="flex bg-white p-8 max-md:p-4 mt-8 rounded-2xl flex-col w-full" id="pyatyi">
                        <h3 class="text-base font-bold">Введите заголовок (названии акции), максимум 64 символа.</h3>
                        <p class="text-black/50 all_text">Вы можете указать в заголовке имя своего бренда (пример в строке), что поможет пользователям отслеживать все ваши акции и возможно сделает вас более узнаваемым.</p>
                        <div class="relative">
                            <input type="text" oninput="countDown(event)" class="border-gray-300 w-full rounded-lg mt-3" placeholder="Скидки до 30% в Desigual! Зарядись энергией Desigual!" id="textSymbol" maxlength="64">
                            <span id="count" class="absolute right-3 bottom-[10px] text-[#2578cf] font-bold">64</span>
                        </div>
                    </div>
                    <PhotoUploadBlock />
                    <YouTubeBlock />
                    <PromoDescriptionBlock @openConditionsModal="conditionsModalOpen = true" />
                    <ConditionsExampleModal 
                        :isOpen="conditionsModalOpen" 
                        @close="conditionsModalOpen = false" 
                    />
                    <SocialLinksBlock />
                    <AddressContactBlock />
                    <ScheduleBlock />
                    <GeographySelector />
                    <div class="flex bg-white p-4 max-md:p-4 mt-8 rounded-2xl flex-col max-md:flex hidden" id="">
                        <div class="flex flex-col">
                            <h2 class="font-bold">
                                К каким категориям относится ваша акция?
                            </h2>
                            <button class="bg-[#0066cb] text-white py-3 flex justify-between px-8 mt-2 rounded-lg">Открыть категории
                                <svg class="text-white w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10 7L15 12L10 17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </button>
                        </div>
                        <!-- <div class="mx-8">
                            <h3 class="font-bold mt-5">Вы выбрали</h3>
                            <div id="tag-container" class="flex flex-wrap gap-3 py-3"></div>
                        </div> -->
                    </div>
                    <CategorySelector v-model:selectedCategories="selectedCategories" />
                    <div class="flex bg-white p-8 max-md:p-4 mt-8 rounded-2xl justify-between flex-row max-md:flex-col" id="chetyrnadsat">
                        <p class="w-[380px] max-md:w-full text-black/50 max-md:mb-4"><strong class="text-black">На какое количество дней будет запущена акция?</strong><br>Максимум 30 дней.</p>
                        <div class="flex items-center gap-4">
                            <div class="flex items-center gap-2 relative w-[180px] max-md:w-full">
                                <span class="text-xs opacity-80">0</span>
                                <input id="slider" class="w-[150px]" type="range" min="0" max="30" value="0">
                                <div id="slider-value" class="slider-value">0</div>
                                <span class="text-xs opacity-80">30</span>
                            </div>
                            <div class="border text-center py-2 w-[50px] rounded-md text-lg" id="slider_value">0</div>
                        </div>
                    </div>
                    <div class="flex bg-white p-8 max-md:p-4 mt-8 rounded-2xl justify-between items-start flex-row max-md:flex-col" id="pyatnadsat">
                        <div class="w-[450px] max-md:w-full max-md:mb-4">
                            <h3 class="font-bold">Желаете чтобы ваша акция так же появлялась и в баннере на главной странице сайта?<span id="hiddenText" class="hidden font-normal text-black/50">В этом случае стоимость запуска акции будет в 3 раза дороже. Бесплатно, если вы предлагаете скидку более 50%.</span></h3>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="text-base all_text" id="notAgree">Нет</span>
                            <label class="toggle-switch relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" value="" class="sr-only peer" id="saleValue">
                                <div class="w-14 h-7 bg-gray-200 border border-gray-200 peer-focus:outline-none rounded-full peer-checked:after:translate-x-[1.75rem] peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all peer-checked:bg-blue-600 peer-checked:border-blue-600"></div>
                            </label>
                            <span class="text-base all_text text_opac" id="agree">Да, желаю</span>
                        </div>
                    </div>
                    <PremiumOptions />
                    <PricingSummary />
                </div>
                <SideNavigation mode="desktop" />
            </div>
        </div>
    </section>
    <div id="alertFile" class="fixed top-2 left-[40%] p-4 mb-4 border-4 border-[#0066CB] rounded-md bg-white hidden" >
        <div class="flex items-center">
            <svg class="w-4 h-4 mr-2 text-[#0066CB]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <span class="sr-only">Info</span>
            <h3 class="text-lg font-black ">Внимание!</h3>
        </div>
        <div class="mt-2 mb-4 text-sm text-black">
            Файл слишком большой. Максимальный размер файла - 10 МБ.
        </div>
        <div class="flex">
            <button type="button" id="alertClose" class="text-[#0066CB] bg-transparent border-2 border-[#0066CB] hover:bg-[#0066CB] hover:text-white focus:ring-4 focus:outline-none focus:ring-blue/20 font-medium rounded-lg text-base px-3 py-1.5 text-center dark:hover:bg-red-600 dark:border-red-600 dark:text-red-500 dark:hover:text-white dark:focus:ring-red-800">
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
