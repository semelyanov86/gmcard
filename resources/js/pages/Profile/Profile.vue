<script setup lang="ts">
import '../../../css/internal/output.css';
import CategoriesMenu from '@/components/CategoriesMenu.vue';
import Footer from '@/components/Footer.vue';
import Header from '@/components/Header.vue';
import MobileMenu from '@/components/MobileMenu.vue';
import NavBar from '@/components/NavBar.vue';
import type { AppPageProps, ContactModel, MenuData } from '@/types';
import { usePage } from '@inertiajs/vue3';

const page = usePage<AppPageProps>();

const props = defineProps<{
    contact: ContactModel;
    navbarMenu: MenuData[];
}>();

const userData = page.props.userData;

</script>

<template>
    <Header :user-data="userData"></Header>
    <section id="section-1" class="body max-w-full h-full pb-9 overflow-visible">
        <MobileMenu />
        <div class="2xl:w-full 2xl:px-4 w-[1140px] mx-auto">
            <NavBar :menu-items="navbarMenu" />
            <CategoriesMenu />
            <div class="w-full h-[1px] bg-white opacity-10"></div>
            <div class="items-center justify-between mb-6 lg:h-full h-[46px] filter_block hidden">
                <h3 class="text-2xl text-white font-bold text_filter">Фильтровать</h3>
                <div class="flex items-center lg:flex-col gapper gap-6 h-full relative filter_inp">
                    <label for="city" class="text-white text-[15px]">Ваш город</label>
                    <div class="relative inline-block selected_block h-[46px]">
                        <div class="custom-select h-[46px] flex items-center appearance-none w-[202px] bg-none border text-white border-white hover:border-gray-300 px-4 py-2 pr-8 rounded-md shadow leading-tight focus:outline-none focus:shadow-outline">
                            <span class=" mr-2">Чебоксары</span>
                            <img src="/images/png/icons/down.png" class="h-[5px] w-2 absolute right-0 top-2 mt-3 mr-2 pointer-events-none" alt="Вверх" id="icons">
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
                            <img src="/images/png/icons/down.png" class="h-[5px] w-2 absolute right-0 top-2 mt-3 mr-2 pointer-events-none" alt="Вверх" id="icons">
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
                            <img src="/images/png/icons/down.png" class="h-[5px] w-2 absolute right-0 top-2 mt-3 mr-2 pointer-events-none" alt="Вверх" id="icons">
                        </div>
                        <div class="custom-options_2 absolute hidden mt-1 w-[202px] h-[200px] overflow-y-scroll bg-white shadow-lg rounded-b border border-gray-400 z-50">
                            <div class="custom-option_2 px-4 py-2 cursor-pointer bg-[#F9D914] hover:bg-gray-200">Все</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full h-[1px] bg-white opacity-10"></div>
            <!-- Личный кабинет -->
            <div class="flex justify-between my-12">
                <!-- Личный кабинет -->
                <div class="w-3/4" id="block1DATA">
                    <div class="p-8 md:p-2 rounded-2xl min-h-[500px] bg-white flex flex-col gap-5">
                        <h2 class="text-start text-5xl font-medium">Личный кабинет</h2>
                        <div class="flex border-2 p-8 justify-between">
                            <div class="profMenu flex gap-10">
                                <div>
                                    <div id="cropModal2" class="modal z-50 w-full h-auto">
                                        <div class="modal-content w-[600px] p-4 bg-white">
                                            <h2 class="text-xl mb-4">Фотография на вашей странице</h2>
                                            <div class="cropper-container ">
                                                <img id="cropperImage2" alt="Crop Image" class="w-full ">
                                            </div>
                                            <div class="flex flex-col gap-2 sm:gap-0 sm:flex-row items-center p-4 justify-between">
                                                <h2 class="text-base">Выберите длинное изображение</h2>
                                                <div class="flex gap-4">
                                                    <button id="cancelButton2" class="px-10 py-2 bg-black/10 text-black rounded-md hover:bg-black/20">Отмена</button>
                                                    <button id="cropButton2" class="px-10 py-2 bg-[#0066cb] text-white rounded-md hover:bg-opacity-80">Сохранить</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-[200px] h-[200px] rounded-full overflow-hidden relative flex items-center justify-center" id="photoBlock">
                                        <img src="/images/png/profile/product8.png" id="cropperResult2" class="object-cover w-full h-full" alt="Account">
                                        <div class="w-full h-full flex items-center justify-center absolute bottom-0 bg-black/50 hidden" id="photoChangeBtn">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-14 text-white cursor-pointer">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 0 1 5.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 0 0-1.134-.175 2.31 2.31 0 0 1-1.64-1.055l-.822-1.316a2.192 2.192 0 0 0-1.736-1.039 48.774 48.774 0 0 0-5.232 0 2.192 2.192 0 0 0-1.736 1.039l-.821 1.316Z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0ZM18.75 10.5h.008v.008h-.008V10.5Z" />
                                            </svg>
                                            <input type="file" class="hidden" id="uploadImage2">
                                        </div>
                                    </div>
                                </div>
                                <div class="flex flex-col items-start gap-3">
                                    <h2 class="text-3xl w-full">Дмитрий Шошин</h2>
                                    <p class="text-[#1d89f2] w-full">27 лет</p>
                                    <ul>
                                        <li><span>Место работы:</span> <span class="text-[#1d89f2]">Программист</span></li>
                                        <li><span>Место проживания:</span> <span class="text-[#1d89f2]">город Санкт-Петербург</span></li>
                                        <li><span>Страна:</span> <span class="text-[#1d89f2]">Россия</span></li>
                                    </ul>
                                    <p class="text-[#1d89f2] w-full">27 лет</p>
                                    <div class="py-2 border-t border-b w-full">
                                        <p class="font-semibold">Баланс</p>
                                        <div class="flex items-center gap-4">
                                            <span class="text-[#152041] text-3xl">0 руб.</span>
                                            <p class="text-[#1d89f2] hover:underline text-sm cursor-pointer">Пополнить</p>
                                            <p data-tooltip-target="tooltip-not-money" class="text-[#1d89f2] hover:underline text-sm cursor-pointer">Вывести</p>
                                            <div id="tooltip-not-money" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                                Вывод средств недоступно
                                                <div class="tooltip-arrow" data-popper-arrow></div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="" class="py-2 px-4 bg-[#1d89f2] hover:opacity-90 text-white rounded-lg">Запустить акцию</a>
                                </div>
                            </div>
                            <p class="text-[#1d89f2] cursor-pointer hover:underline">Редактировать</p>
                        </div>
                    </div>
                    <div></div>
                </div>
                <!-- На модерации -->
                <div class="w-3/4 hidden p-10 rounded-2xl" style="background-color:#063965" id="namoderasii">
                    <h2 class="text-4xl text-white mb-5">Заявки на модерацию</h2>
                    <div class="flex flex-wrap justify-between gap-4">
                        <div class="bg-none border border-white/10 px-5 pb-5 min-w-[300px] rounded-xl flex gap-5">
                            <div>
                                <div class="rounded-xl lg:w-[232px] w-[262px] mt-7 relative main_card">
                                    <img src="/images/png/profile/product6.png" class="w-full" alt="Товар">
                                    <div class="absolute -top-6 left-4 z-40" data-tooltip-target="tooltip-default" type="button">
                                        <img  class="w-[77px] h-[52px]" src="/images/png/profile/sale4.png" alt="Скидка на товар">
                                        <div id="tooltip-default" role="tooltip" class="absolute z-10 w-[250px] invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                            Скидки по промокодам и кэшбэк от онлайн-магазинов и сервисов - на одежду. Каждый день что-то новое.
                                            <div class="tooltip-arrow" data-popper-arrow></div>
                                        </div>
                                    </div>
                                    <div class="bg-white rounded-b-3xl lg:h-[150px] h-[136px] down_block text-[15px] text-[#000000]">
                                        <h3 class="px-6 py-4">При покупке двух часов третьи в подарок от производителя</h3>
                                        <div class="w-full h-[1px] bg-black opacity-10"></div>
                                        <div class="flex items-center justify-between px-6 py-4">
                                            <span class="text-[17px] font-bold">Акция 2+1</span>
                                            <img src="/images/png/profile/sale4.png" class="w-[26px] h-[26px]" alt="скидка на товар">
                                        </div>
                                    </div>
                                </div>
                                <div class="flex justify-between mt-5 items-center" >
                                    <span class="text-sm " style="color: #648099;">18 сентрября 2014 23:10</span>
                                    <div class="flex items-center gap-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#648099" class="w-6 cursor-pointer">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                        </svg>
                                        <span  class="text-sm " style="color: #648099;">2000</span>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-7 flex flex-col items-center gap-4">
                                <button data-tooltip-target="tooltip-delete" class="hovBg">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-9 p-1 cursor-pointer text-[#648099] hover:bg-[#648099] hover:text-white rounded-md" >
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                    </svg>
                                </button>
                                <div id="tooltip-delete" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                    Удалить
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- активные акции -->
                <div class="w-3/4 hidden p-10 rounded-2xl" style="background-color:#063965" id="activePromo">
                    <h2 class="text-4xl text-white mb-5">Мои активные акции</h2>
                    <div class="flex flex-wrap justify-between gap-4">
                        <div class="bg-none border border-white/10 px-5 pb-5 min-w-[300px] rounded-xl flex gap-5">
                            <div>
                                <div class="rounded-xl lg:w-[232px] w-[262px] mt-7 relative main_card">
                                    <img src="/images/png/profile/product6.png" class="w-full" alt="Товар">
                                    <div class="absolute -top-6 left-4 z-40" data-tooltip-target="tooltip-default" type="button">
                                        <img  class="w-[77px] h-[52px]" src="/images/png/profile/sale4.png" alt="Скидка на товар">
                                        <div id="tooltip-default" role="tooltip" class="absolute z-10 w-[250px] invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                            Скидки по промокодам и кэшбэк от онлайн-магазинов и сервисов - на одежду. Каждый день что-то новое.
                                            <div class="tooltip-arrow" data-popper-arrow></div>
                                        </div>
                                    </div>
                                    <div class="bg-white rounded-b-3xl lg:h-[150px] h-[136px] down_block text-[15px] text-[#000000]">
                                        <h3 class="px-6 py-4">При покупке двух часов третьи в подарок от производителя</h3>
                                        <div class="w-full h-[1px] bg-black opacity-10"></div>
                                        <div class="flex items-center justify-between px-6 py-4">
                                            <span class="text-[17px] font-bold">Акция 2+1</span>
                                            <img src="/images/png/profile/sale4.png" class="w-[26px] h-[26px]" alt="скидка на товар">
                                        </div>
                                    </div>
                                </div>
                                <div class="flex justify-between mt-5 items-center" >
                                    <span class="text-sm " style="color: #648099;">18 сентрября 2014 23:10</span>
                                    <div class="flex items-center gap-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#648099" class="w-6 cursor-pointer">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                        </svg>
                                        <span  class="text-sm " style="color: #648099;">2000</span>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-7 flex flex-col items-center gap-4">
                                <button data-tooltip-target="tooltip-delete" class="">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-9 p-1 cursor-pointer text-[#648099] hover:bg-[#648099] hover:text-white rounded-md" >
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                    </svg>
                                </button>
                                <button data-tooltip-target="tooltip-up">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-8 p-1 cursor-pointer text-[#648099] hover:bg-[#648099] hover:text-white rounded-md">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 10.5 12 3m0 0 7.5 7.5M12 3v18" />
                                    </svg>
                                </button>
                                <button data-tooltip-target="tooltip-write" class="">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-8 p-1 cursor-pointer text-[#648099] hover:bg-[#648099] hover:text-white rounded-md">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                                    </svg>
                                </button>
                                <button data-tooltip-target="tooltip-end">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-9 p-1 cursor-pointer text-[#648099] hover:bg-[#648099] hover:text-white rounded-md">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                                    </svg>
                                </button>
                                <div id="tooltip-end" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                    Завершить акцию
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>
                                <div id="tooltip-up" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                    Поднять акцию
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>
                                <div id="tooltip-write" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                    Редактировать
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>
                                <div id="tooltip-delete" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                    Удалить
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- завершенные акции -->
                <div class="w-3/4 hidden p-10 rounded-2xl" style="background-color:#063965" id="endPromo">
                    <h2 class="text-4xl text-white mb-5">Мои завершенные акции</h2>
                    <div class="flex flex-wrap justify-between gap-4">
                        <div class="bg-none border border-white/10 px-5 pb-5 min-w-[300px] rounded-xl flex gap-5">
                            <div>
                                <div class="rounded-xl lg:w-[232px] w-[262px] mt-7 relative main_card">
                                    <img src="/images/png/profile/product6.png" class="w-full" alt="Товар">
                                    <div class="absolute -top-6 left-4 z-40" data-tooltip-target="tooltip-default" type="button">
                                        <img  class="w-[77px] h-[52px]" src="/images/png/profile/sale4.png" alt="Скидка на товар">
                                        <div id="tooltip-default" role="tooltip" class="absolute z-10 w-[250px] invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                            Скидки по промокодам и кэшбэк от онлайн-магазинов и сервисов - на одежду. Каждый день что-то новое.
                                            <div class="tooltip-arrow" data-popper-arrow></div>
                                        </div>
                                    </div>
                                    <div class="bg-white rounded-b-3xl lg:h-[150px] h-[136px] down_block text-[15px] text-[#000000]">
                                        <h3 class="px-6 py-4">При покупке двух часов третьи в подарок от производителя</h3>
                                        <div class="w-full h-[1px] bg-black opacity-10"></div>
                                        <div class="flex items-center justify-between px-6 py-4">
                                            <span class="text-[17px] font-bold">Акция 2+1</span>
                                            <img src="/images/png/profile/sale4.png" class="w-[26px] h-[26px]" alt="скидка на товар">
                                        </div>
                                    </div>
                                </div>
                                <div class="flex justify-between mt-5 items-center" >
                                    <span class="text-sm " style="color: #648099;">18 сентрября 2014 23:10</span>
                                    <div class="flex items-center gap-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#648099" class="w-6 cursor-pointer">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                        </svg>
                                        <span  class="text-sm " style="color: #648099;">2000</span>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-7 flex flex-col items-center gap-4">
                                <button data-tooltip-target="tooltip-delete" class="hovBg">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-9 p-1 cursor-pointer text-[#648099] hover:bg-[#648099] hover:text-white rounded-md" >
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                    </svg>
                                </button>
                                <button data-tooltip-target="tooltip-write" class="hovBg">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-8 p-1 cursor-pointer text-[#648099] hover:bg-[#648099] hover:text-white rounded-md">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                                    </svg>
                                </button>
                                <div id="tooltip-delete" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                    Удалить
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>
                                <div id="tooltip-write" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                    Редактировать
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- отклоненные акции -->
                <div class="w-3/4 hidden p-10 rounded-2xl" style="background-color:#063965" id="rejectPromo">
                    <h2 class="text-4xl text-white mb-5">Мои отклоненные акции</h2>
                    <div class="flex flex-wrap justify-between gap-4">
                        <div class="bg-none border border-white/10 px-5 pb-5 min-w-[300px] rounded-xl flex gap-5">
                            <div>
                                <div class="rounded-xl lg:w-[232px] w-[262px] mt-7 relative main_card">
                                    <img src="/images/png/profile/product6.png" class="w-full" alt="Товар">
                                    <div class="absolute -top-6 left-4 z-40" data-tooltip-target="tooltip-default" type="button">
                                        <img  class="w-[77px] h-[52px]" src="/images/png/profile/sale4.png" alt="Скидка на товар">
                                        <div id="tooltip-default" role="tooltip" class="absolute z-10 w-[250px] invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                            Скидки по промокодам и кэшбэк от онлайн-магазинов и сервисов - на одежду. Каждый день что-то новое.
                                            <div class="tooltip-arrow" data-popper-arrow></div>
                                        </div>
                                    </div>
                                    <div class="bg-white rounded-b-3xl lg:h-[150px] h-[136px] down_block text-[15px] text-[#000000]">
                                        <h3 class="px-6 py-4">При покупке двух часов третьи в подарок от производителя</h3>
                                        <div class="w-full h-[1px] bg-black opacity-10"></div>
                                        <div class="flex items-center justify-between px-6 py-4">
                                            <span class="text-[17px] font-bold">Акция 2+1</span>
                                            <img src="/images/png/profile/sale4.png" class="w-[26px] h-[26px]" alt="скидка на товар">
                                        </div>
                                    </div>
                                </div>
                                <div class="flex justify-between mt-5 items-center" >
                                    <span class="text-sm " style="color: #648099;">18 сентрября 2014 23:10</span>
                                    <div class="flex items-center gap-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#648099" class="w-6 cursor-pointer">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                        </svg>
                                        <span  class="text-sm " style="color: #648099;">2000</span>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-7 flex flex-col items-center gap-4">
                                <button data-tooltip-target="tooltip-delete" class="hovBg">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-9 p-1 cursor-pointer text-[#648099] hover:bg-[#648099] hover:text-white rounded-md" >
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                    </svg>
                                </button>
                                <button data-tooltip-target="tooltip-write" class="hovBg">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-8 p-1 cursor-pointer text-[#648099] hover:bg-[#648099] hover:text-white rounded-md">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                                    </svg>
                                </button>
                                <button data-tooltip-target="tooltip-defaulter" class="hovBg" id="feedBack">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-8 p-1 cursor-pointer text-[#648099] hover:bg-[#648099] hover:text-white rounded-md">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                                    </svg>
                                </button>
                                <div id="tooltip-defaulter" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                    Сообщение от администрации
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>
                                <div id="tooltip-write" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                    Редактировать
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>
                                <div id="tooltip-delete" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                    Удалить
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="fixed top-0 left-0 w-full h-full bg-black/10 flex items-center justify-center z-50 hidden" id="modalFromService">
                    <div class="flex flex-col w-[600px] shadow-2xl relative z-50 rounded-xl overflow-hidden">
                        <div class="bg-[#0066CC] h-14 flex items-center px-4 justify-between">
                            <span class="text-2xl text-white font-medium">Сообщение от администрации</span>
                            <button id="closeModal">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 text-white hover:bg-black/20 rounded-md">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                        <div class="p-5 bg-white">
                            <textarea name="" id="" placeholder="Напишите что-нибудь" class="w-full h-[200px] rounded-lg border border-black/20 placeholder:font-semibold"></textarea>
                            <p class="text-sm text-black/70">Вы получили сообщение от администрации сервиса. В сообщении указываются причины, почему ваше объявление на данный момент не может быть опубликовано. Устраните данные нарушения и отправьте заявку на публикацию заново. После проверки, если все недочеты устранены - ваша акция будет опубликована. Подробнее в разделе <a href="/rules.html" class="text-blue-500">"GM Справка"</a></p>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col gap-5">
                    <div class="w-[250px] route_block bg-white rounded-2xl py-2">
                        <ul class="w-full flex flex-col">
                            <p class="px-4 mx-4 py-2 my-2 bg-[#063966] text-white rounded-lg hover:no-underline cursor-pointer" id="lichnyi">Личный кабинет</p>
                            <div class="w-full h-[1px] bg-black/20 "></div>
                            <a href="/create_promo.html" class="px-4 mx-4 py-2 my-2 underline text-[#1d89f2] hover:bg-[#063966] hover:text-white hover:rounded-lg hover:no-underline">Запустить акцию</a>
                            <div class="w-full h-[1px] bg-black/20 "></div>
                            <p class="px-4 mx-4 py-2 my-2 underline text-[#1d89f2] cursor-pointer hover:bg-[#063966] hover:text-white hover:rounded-lg hover:no-underline" id="activeBtn">Мои активные акции</p>
                            <div class="w-full h-[1px] bg-black/20 "></div>
                            <p class="px-4 mx-4 py-2 my-2 underline text-[#1d89f2] cursor-pointer hover:bg-[#063966] hover:text-white hover:rounded-lg hover:no-underline" id="endBtn">Мои завершенные акции</p>
                            <div class="w-full h-[1px] bg-black/20 "></div>
                            <p class="px-4 mx-4 py-2 my-2 underline text-[#1d89f2] cursor-pointer hover:bg-[#063966] hover:text-white hover:rounded-lg hover:no-underline" id="rejectBtn">Мои отклоненные акции</p>
                            <div class="w-full h-[1px] bg-black/20 "></div>
                            <p class="px-4 mx-4 py-2 my-2 underline text-[#1d89f2] cursor-pointer hover:bg-[#063966] hover:text-white hover:rounded-lg hover:no-underline">Черновики</p>
                            <div class="w-full h-[1px] bg-black/20 "></div>
                            <p class="px-4 mx-4 py-2 my-2 underline text-[#1d89f2] cursor-pointer hover:bg-[#063966] hover:text-white hover:rounded-lg hover:no-underline">Избранное</p>
                        </ul>
                    </div>
                    <button class="px-6 py-2 bg-[#f4d710] h-[41px] text-[16px] rounded-lg  font-bold ml-2 focus:ring-2 hover:text-[#983301] focus:ring-[#f4d710]" id="zayavka">Заявки на модерацию</button>
                </div>
            </div>
        </div>
    </section>
    <Footer :contact="contact"></Footer>
</template>
