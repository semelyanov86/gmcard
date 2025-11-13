<script setup lang="ts">
import '../../../css/internal/output.css';
import Footer from '@/components/Footer.vue';
import Header from '@/components/Header.vue';
import type { AppPageProps, ContactModel } from '@/types';
import { usePage } from '@inertiajs/vue3';

const page = usePage<AppPageProps>();

const props = defineProps<{
    contact: ContactModel;
}>();

const userData = page.props.userData;

</script>

<template>
    <Header :user-data="userData"></Header>
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
            <div class="hidden h-full md:flex items-center w-full pt-10 " id="topBar">
                <div class="flex items-center shadow-2xl bg-[#2AACF0] h-[55px]  rounded-md  w-full px-5 xl:pl-7 mb-4 xl:pr-5">
                    <ul class="flex items-center justify-between w-full">
                        <li class="text-[16px] text-white cursor-pointer">
                            <a href="" class="hover:border-b-2 hover:border-white">Главная</a>
                        </li>
                        <li class="text-[16px] text-white cursor-pointer">
                            <a href="discount.html" class="hover:border-b-2 hover:border-white">Пользователям</a>
                        </li>
                        <li class="text-[16px] text-white cursor-pointer">
                            <a href="kashback.html" class="hover:border-b-2 hover:border-white">Кэшбэк</a>
                        </li>
                        <li class="text-[16px] text-white cursor-pointer">
                            <a href="buis_new.html" class="hover:border-b-2 hover:border-white">Для бизнеса</a>
                        </li>
                        <li class="text-[16px] text-white cursor-pointer">
                            <a href="help.html" class="hover:border-b-2 hover:border-white">Правила</a>
                        </li>
                        <li class="text-[16px] text-white cursor-pointer">
                            <a href="help.html" class="hover:border-b-2 hover:border-white">Контакты</a>
                        </li>
                        <li class="text-[16px] text-white cursor-pointer">
                            <a href="buis.html" class="hover:border-b-2 hover:border-white">GM</a>
                        </li>
                        <li class="text-[16px] text-white cursor-pointer">
                            <a href="coupon.html" class="hover:border-b-2 hover:border-white">₽</a>
                        </li>
                    </ul>
                    <div class="hidden lg:flex items-center">
                        <div class="block h-[55px] w-[1px] bg-[#065d8b] ml-[52px]"></div>
                        <form name="search" class="s flex items-center ml-4">
                            <input
                                type="text"
                                class="h-[41px] 2xl:w-[200px] w-[280px] rounded-l-md outline-none border-none pl-4 pr-4"
                                placeholder="Что вы хотите найти?"
                            />
                            <div class="h-[41px] w-[1px] bg-[#4890b8]"></div>
                            <select name="location" id="location" class="h-[41px] rounded-r-md border-none outline-none focus:ring-1 focus:ring-[#2AACF0] "
                            >
                                <option value="" class="text-lg">Везде</option>
                            </select>
                        </form>
                        <button class="flex items-center justify-center px-6  bg-[#f4d710] h-[41px] text-[16px] rounded-md  font-bold ml-2 focus:ring-2 hover:text-[#983301] focus:ring-[#f4d710]"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-1  group-hover:stroke-[#983301]">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                            </svg>
                            Найти
                        </button>
                    </div>
                </div>
            </div>
            <div class="w-full md:py-0 py-4 relative">
                <div class="flex items-end justify-between -mx-2 lg:px-0 px-4 mobile_desctop">
                    <div class=" relative flex flex-col items-center cursor-pointer">
                        <div class="flex flex-col items-center justify-center relative mains" data-index="1">
                            <div class="rounded-lg py-3 px-4 image-1 w-[51px] h-[51px] ">
                            </div>
                            <p class="lg:text-sm font-bold mt-2 text-white">Для него</p>
                        </div>
                        <svg fill="currentColor" id="icons1" class="hidden w-6 h-7 absolute -bottom-6 text-[#F9D914]" viewBox="0 0 24 11" xmlns="http://www.w3.org/2000/svg"><path d="M24 11H0L12 0L24 11Z" fill="currentColor"/></svg>
                    </div>
                    <div class=" relative flex flex-col items-center cursor-pointer">
                        <div class="flex flex-col items-center justify-center relative mains2" data-index="2">
                            <div class=" rounded-lg py-3 px-4 image-2 w-[51px] h-[51px]">
                            </div>
                            <p class="lg:text-sm font-bold mt-2 text-white">Для нее</p>
                        </div>
                        <svg fill="currentColor" id="icons2" class="hidden w-6 h-7 absolute -bottom-6 text-[#F9D914]" viewBox="0 0 24 11" xmlns="http://www.w3.org/2000/svg"><path d="M24 11H0L12 0L24 11Z" fill="currentColor"/></svg>
                    </div>
                    <div class="  relative flex flex-col items-center cursor-pointer">
                        <div class="flex flex-col justify-center items-center relative mains3" data-index="3">
                            <div class="rounded-lg py-3 px-4 w-[49px] image-3 h-[41px] ">
                            </div>
                            <p class="lg:text-sm font-bold mt-3 text-white">Детям</p>
                        </div>
                        <svg fill="currentColor" id="icons3" class="hidden w-6 h-7 absolute -bottom-6 text-[#F9D914]" viewBox="0 0 24 11" xmlns="http://www.w3.org/2000/svg"><path d="M24 11H0L12 0L24 11Z" fill="currentColor"/></svg>
                    </div>
                    <div class="  relative flex flex-col items-center cursor-pointer">
                        <div class="flex flex-col items-center justify-center relative mains4" data-index="4">
                            <div class=" rounded-lg py-3 px-4 w-[51px] image-4 h-[41px] ">
                            </div>
                            <p class="lg:text-sm font-bold mt-3 text-white">Для дома</p>
                        </div>
                        <svg fill="currentColor" id="icons4" class="hidden w-6 h-7 absolute -bottom-6 text-[#F9D914]" viewBox="0 0 24 11" xmlns="http://www.w3.org/2000/svg"><path d="M24 11H0L12 0L24 11Z" fill="currentColor"/></svg>
                    </div>
                    <div class="  relative flex flex-col items-center cursor-pointer">
                        <div class="flex flex-col items-center justify-center relative mains5" data-index="5">
                            <div class=" rounded-lg py-3 px-4 w-[52px] image-5 h-[50px] ">
                            </div>
                            <p class="lg:text-sm font-bold mt-3 text-white">Техника</p>
                        </div>
                        <svg fill="currentColor" id="icons5" class="hidden w-6 h-7 absolute -bottom-6 text-[#F9D914]" viewBox="0 0 24 11" xmlns="http://www.w3.org/2000/svg"><path d="M24 11H0L12 0L24 11Z" fill="currentColor"/></svg>
                    </div>
                    <div class="  relative flex flex-col items-center cursor-pointer">
                        <div class="flex flex-col items-center justify-center relative mains6" data-index="6">
                            <div class="rounded-lg py-3 px-4 w-[52px] image-6 h-[50px] ">
                            </div>
                            <p class="lg:text-sm font-bold mt-2 text-white">Красота</p>
                        </div>
                        <svg fill="currentColor" id="icons6" class="hidden w-6 h-7 absolute -bottom-6 text-[#F9D914]" viewBox="0 0 24 11" xmlns="http://www.w3.org/2000/svg"><path d="M24 11H0L12 0L24 11Z" fill="currentColor"/></svg>
                    </div>
                    <div class="  relative flex flex-col items-center cursor-pointer">
                        <div class="flex flex-col items-center justify-center relative mains7" data-index="7">
                            <div class=" rounded-lg py-3 px-4 w-[46px] image-7 h-[44px] ">
                            </div>
                            <p class="lg:text-sm font-bold mt-2 text-white">Услуги</p>
                        </div>
                        <svg fill="currentColor" id="icons7" class="hidden w-6 h-7 absolute -bottom-6 text-[#F9D914]" viewBox="0 0 24 11" xmlns="http://www.w3.org/2000/svg"><path d="M24 11H0L12 0L24 11Z" fill="currentColor"/></svg>
                    </div>
                    <div class="  relative flex flex-col items-center cursor-pointer">
                        <div class="flex flex-col items-center justify-center relative mains8" data-index="8">
                            <div class=" rounded-lg py-3 px-4 w-[56px] image-8 h-[38px] ">
                            </div>
                            <p class="lg:text-sm font-bold mt-2 text-white">Туризм</p>
                        </div>
                        <svg fill="currentColor" id="icons8" class="hidden w-6 h-7 absolute -bottom-6 text-[#F9D914]" viewBox="0 0 24 11" xmlns="http://www.w3.org/2000/svg"><path d="M24 11H0L12 0L24 11Z" fill="currentColor"/></svg>
                    </div>
                    <div class="  relative flex flex-col items-center cursor-pointer">
                        <div class="flex flex-col items-center justify-center relative mains9" data-index="9">
                            <div class=" rounded-lg py-3 px-4 w-[49px] image-9 h-[42px] ">
                            </div>
                            <p class="lg:text-sm font-bold mt-2 text-white">Магазины</p>
                        </div>
                        <svg fill="currentColor" id="icons9" class="hidden w-6 h-7 absolute -bottom-6 text-[#F9D914]" viewBox="0 0 24 11" xmlns="http://www.w3.org/2000/svg"><path d="M24 11H0L12 0L24 11Z" fill="currentColor"/></svg>
                    </div>
                    <div class="  relative flex flex-col items-center cursor-pointer">
                        <div class="flex flex-col items-center justify-center relative mains10" data-index="10">
                            <div class=" rounded-lg py-3 px-4 w-[48px] image-10 h-[49px] ">
                            </div>
                            <p class="lg:text-sm font-bold mt-2 text-white">Поесть</p>
                        </div>
                        <svg fill="currentColor" id="icons10" class="hidden w-6 h-7 absolute -bottom-6 text-[#F9D914]" viewBox="0 0 24 11" xmlns="http://www.w3.org/2000/svg"><path d="M24 11H0L12 0L24 11Z" fill="currentColor"/></svg>
                    </div>
                    <div class=" relative flex flex-col items-center cursor-pointer">
                        <div class="flex flex-col items-center justify-center relative mains11" data-index="11">
                            <div class=" rounded-lg py-3  w-[40px] image-11 h-[46px] ">
                            </div>
                            <p class="lg:text-sm font-bold mt-2 text-white">Для авто</p>
                        </div>
                        <svg fill="currentColor" id="icons11" class="hidden w-6 h-7 absolute -bottom-6 text-[#F9D914]" viewBox="0 0 24 11" xmlns="http://www.w3.org/2000/svg"><path d="M24 11H0L12 0L24 11Z" fill="currentColor"/></svg>
                    </div>
                    <div class="  relative flex flex-col items-center cursor-pointer">
                        <div class="flex flex-col items-center justify-center relative mains12" data-index="12">
                            <div class=" rounded-lg py-3 px-4 w-[47px] image-12 h-[43px] ">
                            </div>
                            <p class="lg:text-sm font-bold mt-2 text-white">Обучение</p>
                        </div>
                        <svg fill="currentColor" id="icons12" class="hidden w-6 h-7 absolute -bottom-6 text-[#F9D914]" viewBox="0 0 24 11" xmlns="http://www.w3.org/2000/svg"><path d="M24 11H0L12 0L24 11Z" fill="currentColor"/></svg>
                    </div>
                </div>
                <!-- 768px mobile -->
                <div class="items-end justify-between -mx-2 lg:px-0 px-4 hidden mobile_scroll">
                    <div class=" relative flex flex-col items-center cursor-pointer mx-2 icons_block min-w-[100px]">
                        <div class="flex flex-col items-center justify-center relative " id="icons_block1" data-index="1">
                            <div class="rounded-lg py-3 px-4 image-1 w-[51px] h-[51px] ">
                            </div>
                            <p class="lg:text-sm font-bold mt-2 text-white">Для него</p>
                        </div>
                    </div>
                    <div class=" relative flex flex-col items-center cursor-pointer mx-2 icons_block min-w-[100px]">
                        <div class="flex flex-col items-center justify-center relative " id="icons_block2" data-index="2">
                            <div class=" rounded-lg py-3 px-4 image-2 w-[51px] h-[51px]">
                            </div>
                            <p class="lg:text-sm font-bold mt-2 text-white">Для нее</p>
                        </div>
                    </div>
                    <div class="  relative flex flex-col items-center cursor-pointer mx-2 icons_block min-w-[100px]">
                        <div class="flex flex-col justify-center items-center relative " id="icons_block3" data-index="3">
                            <div class="rounded-lg py-3 px-4 w-[49px] image-3 h-[41px] ">
                            </div>
                            <p class="lg:text-sm font-bold mt-3 text-white">Детям</p>
                        </div>
                    </div>
                    <div class="  relative flex flex-col items-center cursor-pointer mx-2 icons_block min-w-[100px]">
                        <div class="flex flex-col items-center justify-center relative " id="icons_block4" data-index="4">
                            <div class=" rounded-lg py-3 px-4 w-[51px] image-4 h-[41px] ">
                            </div>
                            <p class="lg:text-sm font-bold mt-3 text-white">Для дома</p>
                        </div>
                    </div>
                    <div class="  relative flex flex-col items-center cursor-pointer mx-2 icons_block min-w-[100px]">
                        <div class="flex flex-col items-center justify-center relative " id="icons_block5" data-index="5">
                            <div class=" rounded-lg py-3 px-4 w-[52px] image-5 h-[50px] ">
                            </div>
                            <p class="lg:text-sm font-bold mt-3 text-white">Техника</p>
                        </div>
                    </div>
                    <div class="  relative flex flex-col items-center cursor-pointer mx-2 icons_block min-w-[100px]">
                        <div class="flex flex-col items-center justify-center relative " id="icons_block6" data-index="6">
                            <div class="rounded-lg py-3 px-4 w-[52px] image-6 h-[50px] ">
                            </div>
                            <p class="lg:text-sm font-bold mt-2 text-white">Красота</p>
                        </div>
                    </div>
                    <div class="  relative flex flex-col items-center cursor-pointer mx-2 icons_block min-w-[100px]">
                        <div class="flex flex-col items-center justify-center relative " id="icons_block7" data-index="7">
                            <div class=" rounded-lg py-3 px-4 w-[46px] image-7 h-[44px] ">
                            </div>
                            <p class="lg:text-sm font-bold mt-2 text-white">Услуги</p>
                        </div>
                    </div>
                    <div class="  relative flex flex-col items-center cursor-pointer mx-2 icons_block min-w-[100px]">
                        <div class="flex flex-col items-center justify-center relative " id="icons_block8" data-index="8">
                            <div class=" rounded-lg py-3 px-4 w-[56px] image-8 h-[38px] ">
                            </div>
                            <p class="lg:text-sm font-bold mt-2 text-white">Туризм</p>
                        </div>
                    </div>
                    <div class="  relative flex flex-col items-center cursor-pointer mx-2 icons_block min-w-[100px]">
                        <div class="flex flex-col items-center justify-center relative " id="icons_block9" data-index="9">
                            <div class=" rounded-lg py-3 px-4 w-[49px] image-9 h-[42px] ">
                            </div>
                            <p class="lg:text-sm font-bold mt-2 text-white">Магазины</p>
                        </div>
                    </div>
                    <div class="  relative flex flex-col items-center cursor-pointer mx-2 icons_block min-w-[100px]">
                        <div class="flex flex-col items-center justify-center relative " id="icons_block10" data-index="10">
                            <div class=" rounded-lg py-3 px-4 w-[48px] image-10 h-[49px] ">
                            </div>
                            <p class="lg:text-sm font-bold mt-2 text-white">Поесть</p>
                        </div>
                    </div>
                    <div class=" relative flex flex-col items-center cursor-pointer mx-2 icons_block min-w-[100px]">
                        <div class="flex flex-col items-center justify-center relative " id="icons_block11" data-index="11">
                            <div class=" rounded-lg py-3  w-[40px] image-11 h-[46px] ">
                            </div>
                            <p class="lg:text-sm font-bold mt-2 text-white">Для авто</p>
                        </div>
                    </div>
                    <div class="  relative flex flex-col items-center cursor-pointer mx-2 icons_block min-w-[100px]">
                        <div class="flex flex-col items-center justify-center relative " id="icons_block12" data-index="12">
                            <div class=" rounded-lg py-3 px-4 w-[47px] image-12 h-[43px] ">
                            </div>
                            <p class="lg:text-sm font-bold mt-2 text-white">Обучение</p>
                        </div>
                    </div>
                </div>
                <!-- 768px mobile -->
                <div class="drop_list flex-col mt-3 hidden absolute w-full h-[450px] overflow-hidden shadow-lg z-50">
                    <div class="h-4 w-full bg-[#F9D914] rounded-t-md">
                    </div>
                    <div id="blocks_list" class="flex gap-1 overflow-y-scroll bg-white">
                        <ul id="lists" class="relative w-1/3 h-full  py-2  bg-white rounded-b-md z-10 overflow-y-scroll">
                        </ul>
                        <ul id="lists2" class="hidden relative w-1/3 h-full  py-2 bg-white rounded-b-md z-10 overflow-y-scroll">
                        </ul>
                        <ul id="lists3" class="hidden relative w-1/3 h-full  py-2 bg-white rounded-b-md z-10 overflow-y-scroll">
                        </ul>
                    </div>
                </div>
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
            </div>
            <div class="w-full h-[1px] bg-white opacity-10"></div>
            <div class="items-center justify-between mb-6 lg:h-full h-[46px] filter_block hidden">
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
            <div class="w-full h-[1px] bg-white opacity-10"></div>
            <!-- Личный кабинет -->
            <div class="flex justify-between my-12">
                <!-- Личный кабинет -->
                <div class="w-3/4" id="block1DATA">
                    <div class="p-2 md:p-8 rounded-2xl min-h-[500px] bg-white flex flex-col gap-5">
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
                                        <img src="/assets/images/product8.png" id="cropperResult2" class="object-cover w-full h-full" alt="Account">
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
                                    <img src="/assets/images/product6.png" class="w-full" alt="Товар">
                                    <div class="absolute -top-6 left-4 z-40" data-tooltip-target="tooltip-default" type="button">
                                        <img  class="w-[77px] h-[52px]" src="/assets/images/sale4.png" alt="Скидка на товар">
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
                                            <img src="/assets/images/sale4.png" class="w-[26px] h-[26px]" alt="скидка на товар">
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
                                    <img src="/assets/images/product6.png" class="w-full" alt="Товар">
                                    <div class="absolute -top-6 left-4 z-40" data-tooltip-target="tooltip-default" type="button">
                                        <img  class="w-[77px] h-[52px]" src="/assets/images/sale4.png" alt="Скидка на товар">
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
                                            <img src="/assets/images/sale4.png" class="w-[26px] h-[26px]" alt="скидка на товар">
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
                                    <img src="/assets/images/product6.png" class="w-full" alt="Товар">
                                    <div class="absolute -top-6 left-4 z-40" data-tooltip-target="tooltip-default" type="button">
                                        <img  class="w-[77px] h-[52px]" src="/assets/images/sale4.png" alt="Скидка на товар">
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
                                            <img src="/assets/images/sale4.png" class="w-[26px] h-[26px]" alt="скидка на товар">
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
                                    <img src="/assets/images/product6.png" class="w-full" alt="Товар">
                                    <div class="absolute -top-6 left-4 z-40" data-tooltip-target="tooltip-default" type="button">
                                        <img  class="w-[77px] h-[52px]" src="/assets/images/sale4.png" alt="Скидка на товар">
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
                                            <img src="/assets/images/sale4.png" class="w-[26px] h-[26px]" alt="скидка на товар">
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
