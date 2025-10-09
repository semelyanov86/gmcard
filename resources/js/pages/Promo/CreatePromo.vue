<script setup lang="ts">

import '../../../css/internal/output.css';
import Footer from '@/components/Footer.vue';
import Header from '@/components/Header.vue';

defineProps<{
    contact: {
        email: string;
        phone: string;
    };
}>();
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
            <div class="hidden h-full md:flex items-center w-full pt-10 " id="topBar">
                <div class="flex items-center shadow-2xl bg-[#2AACF0] h-[55px]  rounded-md  w-full px-5 xl:pl-7 mb-4 xl:pr-5">
                    <ul class="flex items-center justify-between w-full">
                        <li class="text-[16px] text-white cursor-pointer">
                            <a target="_blank" rel="noopener noreferrer" href="" class="hover:border-b-2 hover:border-white">Главная</a>
                        </li>
                        <li class="text-[16px] text-white cursor-pointer">
                            <a target="_blank" rel="noopener noreferrer" href="discount.html" class="hover:border-b-2 hover:border-white">Пользователям</a>
                        </li>
                        <li class="text-[16px] text-white cursor-pointer">
                            <a target="_blank" rel="noopener noreferrer" href="/#popular" class="hover:border-b-2 hover:border-white">Кэшбэк</a>
                        </li>
                        <li class="text-[16px] text-white cursor-pointer">
                            <a target="_blank" rel="noopener noreferrer" href="buis_new.html" class="hover:border-b-2 hover:border-white">Для бизнеса</a>
                        </li>
                        <li class="text-[16px] text-white cursor-pointer">
                            <a target="_blank" rel="noopener noreferrer" href="help.html" class="hover:border-b-2 hover:border-white">Правила</a>
                        </li>
                        <li class="text-[16px] text-white cursor-pointer">
                            <a target="_blank" rel="noopener noreferrer" href="help.html" class="hover:border-b-2 hover:border-white">Контакты</a>
                        </li>
                        <li class="text-[16px] text-white cursor-pointer">
                            <a target="_blank" rel="noopener noreferrer" href="buis.html" class="hover:border-b-2 hover:border-white">GM</a>
                        </li>
                        <li class="text-[16px] text-white cursor-pointer">
                            <a target="_blank" rel="noopener noreferrer" href="coupon.html" class="hover:border-b-2 hover:border-white">₽</a>
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
                    <div class="h-4 w-full bg-[#F9D914] rounded-t-md relative top-2 z-1">
                    </div>
                    <div id="blocks_list" class="flex gap-1 overflow-y-scroll bg-white h-[90vh] z-10">
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
                <div class="hidden flex-col relative" id="mainBlock">
                    <button id="openMyBlocks" class="w-full bg-[#FAE115] z-50 h-[50px] shadow-2xl rounded-md">Мои разделы</button>
                    <div id="myBlocks" class="bg-white rounded-b-2xl z-10 -mt-1 hidden">
                        <ul class="w-full flex flex-col ">
                            <a href="" class="px-4 mx-4 py-2 my-2 underline text-[#1d89f2] hover:bg-[#063966] hover:text-white hover:rounded-lg hover:no-underline">Личный кабинет</a>
                            <div class="w-full h-[1px] bg-black/20 "></div>
                            <a href="" class="px-4 mx-4 py-2 my-2 underline text-[#1d89f2] hover:bg-[#063966] hover:text-white hover:rounded-lg hover:no-underline">Запустить акцию</a>
                            <div class="w-full h-[1px] bg-black/20 "></div>
                            <a href="" class="px-4 mx-4 py-2 my-2 underline text-[#1d89f2] hover:bg-[#063966] hover:text-white hover:rounded-lg hover:no-underline">Мои акции</a>
                            <div class="w-full h-[1px] bg-black/20 "></div>
                            <a href="" class="px-4 mx-4 py-2 my-2 underline text-[#1d89f2] hover:bg-[#063966] hover:text-white hover:rounded-lg hover:no-underline">Мои акции с купонами</a>
                            <div class="w-full h-[1px] bg-black/20 "></div>
                            <a href="" class="px-4 mx-4 py-2 my-2 underline text-[#1d89f2] hover:bg-[#063966] hover:text-white hover:rounded-lg hover:no-underline">Мои купоны</a>
                            <div class="w-full h-[1px] bg-black/20 "></div>
                            <a href="" class="px-4 mx-4 py-2 my-2 underline text-[#1d89f2] hover:bg-[#063966] hover:text-white hover:rounded-lg hover:no-underline">Мои черновики</a>
                        </ul>
                    </div>
                </div>
                <div class="w-3/4 main_block bg-[#063966] p-2 md:p-8 rounded-2xl">
                    <h2 class="text-3xl md:text-4xl font-bold text-white">Создание новой акции, выберите тип акции</h2>
                    <div class="flex flex-wrap bg-white p-4 md:p-8 md:mt-4 mt-8 rounded-2xl justify-between gap-2 sm:gap-4">
                        <div id="promo1" class="promo_image1 hover:bg-[#fae115] promo_blocks w-[230px] h-[230px] bg-[#e4ecef] rounded-2xl relative flex justify-center cursor-pointer">
                            <span class="absolute bottom-4 text-bottom text-base font-bold">Просто скидка</span>
                            <span data-tooltip-target="tooltip-just" data-tooltip-trigger="hover" type="button" class="absolute right-4 text-xs top-2 bg-white px-[8px] py-[2px] rounded-full">?</span>
                            <div id="tooltip-just" role="tooltip" class="absolute w-[320px] z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                Просто скидка - вы предлагаете пользователям скидку на ваш товар или услугу, при этом она может быть применена при наборе определенной суммы или без таковой. Для скидки не требуется купон. Если у вас интернет магазин - вы можете указать промокод для скидки в конструкторе акций ниже.

                            </div>
                        </div>
                        <div id="promo2" class="promo_image2 promo_blocks w-[230px] h-[230px] bg-[#e4ecef] rounded-2xl relative flex justify-center hover:bg-[#fae115] cursor-pointer">
                            <span class="absolute bottom-4 text-bottom text-base font-bold">Купон на скидку</span>
                            <span data-tooltip-target="tooltip-sale" data-tooltip-trigger="hover" type="button" class="absolute right-4 text-xs top-2 bg-white px-[8px] py-[2px] rounded-full">?</span>
                            <div id="tooltip-sale" role="tooltip" class="absolute w-[320px] z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                Купон на скидку - почти тоже, что и просто скидка, но в этом случае пользователю необходимо предоставить купон на скидку. Может быть применено правило что акция действует при наборе определенной суммы.

                            </div>
                        </div>
                        <div id="promo3" class="promo_image3 promo_blocks w-[230px] h-[230px] bg-[#e4ecef] rounded-2xl relative flex justify-center hover:bg-[#fae115] cursor-pointer">
                            <span class="absolute bottom-4 text-bottom text-base font-bold">Подарок при покупке</span>
                            <span data-tooltip-target="tooltip-buy" data-tooltip-trigger="hover" type="button" class="absolute right-4 text-xs top-2 bg-white px-[8px] py-[2px] rounded-full">?</span>
                            <div id="tooltip-buy" role="tooltip" class="absolute w-[320px] z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                Подарок при покупке - вы предлагаете пользователям подарок при покупке вашего товара или услуги, при этом подарок может быть применен при наборе определенной суммы или без таковой.

                            </div>
                        </div>
                        <div id="promo4" class="promo_image4 promo_blocks2 w-[160px] h-[160px] bg-[#e4ecef] rounded-2xl relative flex justify-center hover:bg-[#fae115] cursor-pointer">
                            <span class="absolute bottom-4 text-bottom text-base font-bold">2 по цене 1</span>
                            <span data-tooltip-target="tooltip-two" data-tooltip-trigger="hover" type="button" class="absolute right-4 text-xs top-2 bg-white px-[8px] py-[2px] rounded-full">?</span>
                            <div id="tooltip-two" role="tooltip" class="absolute w-[320px] z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                2 по цене 1 - вы предлагаете пользователям воспользоваться приобретением вашего товара или услуги и получить второй аналогичный товар или услугу  бесплатно. Может быть применено правило что акция действует при наборе определенной суммы.

                            </div>
                        </div>
                        <div id="promo5" class="promo_image5 promo_blocks2 w-[160px] h-[160px] bg-[#e4ecef] rounded-2xl relative flex justify-center hover:bg-[#fae115] cursor-pointer">
                            <span class="absolute bottom-4 text-bottom text-base font-bold">3 по цене 2</span>
                            <span data-tooltip-target="tooltip-three" data-tooltip-trigger="hover" type="button" class="absolute right-4 text-xs top-2 bg-white px-[8px] py-[2px] rounded-full">?</span>
                            <div id="tooltip-three" role="tooltip" class="absolute w-[320px] z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                3 по цене 2 - вы предлагаете пользователям воспользоваться приобретением 2х ваших товаров или услуг и получить третий аналогичный товар или услугу  бесплатно. Может быть применено правило что акция действует при наборе определенной суммы.

                            </div>
                        </div>
                        <div id="promo6" class="promo_image6 promo_blocks2 w-[160px] h-[160px] bg-[#e4ecef] rounded-2xl relative flex justify-center hover:bg-[#fae115] cursor-pointer">
                            <span class="absolute bottom-4 text-bottom text-base font-bold"> Кэшбек</span>
                            <span data-tooltip-target="tooltip-cash" data-tooltip-trigger="hover" type="button" class="absolute right-4 text-xs top-2 bg-white px-[8px] py-[2px] rounded-full">?</span>
                            <div id="tooltip-cash" role="tooltip" class="absolute w-[320px] z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                Совместная покупка - вы предлагаете пользователям приобрести у вас товар или услугу с большим дисконтом, смысл ее в том что вы сразу получается поток заказов, а пользователи получают хороший дисконт.

                            </div>
                        </div>
                        <div id="promo7" class="promo_image7 promo_blocks2 w-[160px] h-[160px] bg-[#e4ecef] rounded-2xl relative flex justify-center hover:bg-[#fae115] cursor-pointer">
                            <span class="absolute bottom-4 text-bottom text-base font-bold">Конкурс</span>
                            <span data-tooltip-target="tooltip-celebrity" data-tooltip-trigger="hover" type="button" class="absolute right-4 text-xs top-2 bg-white px-[8px] py-[2px] rounded-full">?</span>
                            <div id="tooltip-celebrity" role="tooltip" class="absolute w-[320px] z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                Конкурс - вы предлагаете пользователям принять участие в конкурсе, где предлагаете им сделать определённое действие и по итогам конкурса вами будет разыгран какой-то ценный предмет или услуга, которых в свою очередь может быть несколько.

                            </div>
                        </div>
                    </div>
                    <div class="flex bg-white p-4 md:p-8 mt-8 flex-col sm:flex-row rounded-2xl justify-between items-center" id="pervyi">
                        <h3 class="text-base font-bold w-full sm:w-[280px]">Какой % скидки или суммы в рублях вы готовы предоставить?</h3>
                        <div class="flex gap-5 w-full sm:w-auto mt-4 sm:mt-0">
                            <input type="text" name="" id="" placeholder="50" maxlength="4" class="border-gray-300 rounded-lg w-full sm:w-[120px]">
                            <div class="relative inline-block ">
                                <button id="toggleBtn" type="button" class="w-28 py-2 px-4 bg-white border border-gray-300 rounded-md shadow-sm text-sm leading-5 font-medium text-gray-700 hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:ring-blue active:bg-gray-100 active:text-gray-700 transition duration-150 ease-in-out flex items-center justify-between">
                                    <span id="spanOfBtn">%</span>
                                    <svg class="w-4 h-4 ml-2 -mr-1 text-[#2578cf]" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                                <ul id="dropdownList" class="absolute z-10 w-28 mt-2 bg-white border border-gray-300 rounded-md shadow-lg hidden">
                                    <li class="py-2 px-4 text-sm leading-5 text-gray-700 hover:bg-blue-100 hover:text-blue-700 cursor-pointer">%</li>
                                    <li class="py-2 px-4 text-sm leading-5 text-gray-700 hover:bg-blue-100 hover:text-blue-700 cursor-pointer">₽</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="flex bg-white p-4 md:p-8 mt-8 flex-col sm:flex-row rounded-2xl justify-between items-center" id="pervyi_new">
                        <h3 class="text-base font-bold w-full sm:w-[280px]">Какой % кэшбэка вы готовы предоставить?</h3>
                        <div class="flex gap-5 w-full sm:w-auto mt-4 sm:mt-0">
                            <input type="text" name="" id="" placeholder="50" maxlength="4" class="border-gray-300 rounded-lg w-full sm:w-[120px]">
                            <div class="relative inline-block ">
                                <button id="toggleBtn" type="button" class="w-28 py-2 px-4 bg-white border border-gray-300 rounded-md shadow-sm text-sm leading-5 font-medium text-gray-700 hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:ring-blue active:bg-gray-100 active:text-gray-700 transition duration-150 ease-in-out flex items-center justify-between">
                                    <span id="spanOfBtn">%</span>

                                </button>
                                <ul id="dropdownList" class="absolute z-10 w-28 mt-2 bg-white border border-gray-300 rounded-md shadow-lg hidden">
                                    <li class="py-2 px-4 text-sm leading-5 text-gray-700 hover:bg-blue-100 hover:text-blue-700 cursor-pointer">%</li>
                                    <li class="py-2 px-4 text-sm leading-5 text-gray-700 hover:bg-blue-100 hover:text-blue-700 cursor-pointer">₽</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="flex bg-white p-4 md:p-8 mt-8 rounded-2xl flex-col sm:flex-row justify-between items-center" id="vtoroi">
                        <div class="flex flex-col w-[450px] price_block ">
                            <h3 class="text-base font-bold ">Если для получения скидки необходимо вводить код</h3>
                            <p class="text-black/50 all_text">(например интернет-магазин), то вы можете указать его здесь. Если ничего вводить не нужно, то оставьте поле пустым.</p>
                        </div>
                        <div class="flex mt-4 sm:mt-0 w-full sm:w-auto flex-col sm:ml-12">
                            <label for="code_for_sale" class="text-sm font-bold">Код для скидки</label>
                            <input type="text" name="code_for_sale" placeholder="NJTON564YNN565N56" class="border-gray-300 rounded-lg sm:w-[250px] mt-3">
                        </div>
                    </div>
                    <div class="flex bg-white p-4 md:p-8 mt-8 rounded-2xl flex-col sm:flex-row justify-between items-center" id="tretiy">
                        <div class="flex flex-col w-[450px] price_block">
                            <p class="text-black/50 all_text"> <strong class="text-black text-base">Если одним из условий является минимальная сумма заказа,</strong> то необходимо указать от какой суммы именно. Если такого условия нет, то оставьте поле пустым.</p>
                        </div>
                        <div class="flex w-full sm:w-auto flex-col mt-4 sm:mt-0 ml-0 sm:ml-12 relative">
                            <label for="code_for_sale" class="text-sm font-bold">Минимальная сумма заказа</label>
                            <input type="text" name="code_for_sale" placeholder="1000" class="border-gray-300 rounded-lg sm:w-[250px] mt-3 pl-3">
                            <span class="absolute bottom-2 right-3 text-black/50">₽</span>
                        </div>
                    </div>
                    <div class="flex bg-white p-4 md:p-8 mt-8 rounded-2xl flex-col" id="chetvertyi">
                        <div class="flex justify-between items-center">
                            <div class="w-[450px] price_block">
                                <h3 class="text-base font-bold">Если у вас есть бесплатная доставка, то вы можете отметить этот пункт.</h3>
                                <p class="text-black/50 all_text">Если бесплатной доставки нет, то ничего отмечать не нужно.</p>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" value="" id="delivary" class="sr-only peer">
                                <div class="w-14 h-7 bg-gray-200 peer-focus:outline-none peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[4px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                            </label>
                        </div>
                        <div class="my-4 hidden" id="delivaryBlock">
                            <div class="h-[1px] w-full bg-black/30"></div>
                            <div class="mt-4 flex flex-col sm:flex-row justify-between items-center">
                                <div class="">
                                    <p class="text-black/50 all_text"><strong class="text-black text-base">Есть бесплатная доставка.</strong> Если бесплатная доставка действует при заказе от определенной суммы, то необходимо указать это здесь.</p>
                                </div>
                                <div class="flex flex-col w-full sm:w-auto mt-4 sm:mt-0 ml-0 sm:ml-12 relative">
                                    <label for="code_for_sale" class="text-sm font-bold">Действует при заказе от</label>
                                    <input type="number" name="code_for_sale_new_prom" placeholder="1000" class="border-gray-300 rounded-lg w-full sm:w-[200px] mt-3 pl-3">
                                    <span class="absolute bottom-2 right-3 text-black/50">₽</span>
                                    <button class="mt-2 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                                        Сохранить
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex bg-white p-4 md:p-8 mt-8 rounded-2xl flex-col w-full" id="pyatyi">
                        <h3 class="text-base font-bold">Введите заголовок (названии акции), максимум 64 символа.</h3>
                        <p class="text-black/50 all_text">Вы можете указать в заголовке имя своего бренда (пример в строке), что поможет пользователям отслеживать все ваши акции и возможно сделает вас более узнаваемым.</p>
                        <div class="relative">
                            <input type="text" oninput="countDown(event)" class="border-gray-300 w-full rounded-lg mt-3" placeholder="Скидки до 30% в Desigual! Зарядись энергией Desigual!" id="textSymbol" maxlength="64">
                            <span id="count" class="absolute right-3 bottom-[10px] text-[#2578cf] font-bold">64</span>
                        </div>
                    </div>
                    <div class="flex bg-white p-4 md:p-8 mt-8 rounded-2xl flex-col w-full" id="shestoi">
                        <div class="flex flex-col sm:flex-row justify-between mb-8">
                            <div class="w-3/3]">
                                <h3 class="text-base font-bold">Загрузите привлекательное изображение для вашей акции</h3>
                                <p class="text-black/50 all_text">Обязательна только 1 (первая) фотография, остальные по желанию.</p>
                            </div>
                            <div class="flex gap-2 w-3/1 mt-4 sm:mt-0">
                                <img src="/assets/constructor/picture-sale.png" class="w-8 h-6 " alt="Картинка">
                                <button type="button" data-modal-target="staticModal" data-modal-toggle="staticModal" class="text-sm text-[#2578cf] font-semibold hover:underline">
                                    У меня нет фото,<br class="hidden sm:block"> что делать?
                                </button>
                                <div id="staticModal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative w-full max-w-2xl max-h-full">
                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 bgSh">
                                            <div class="flex items-start justify-between bg-[#0066cb] p-4 border-b rounded-t dark:border-gray-600">
                                                <h3 class="text-xl font-semibold text-white dark:text-white">
                                                    У меня нет фото, что делать?
                                                </h3>
                                                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="staticModal">
                                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                            </div>
                                            <div class="p-3 sm:p-6">
                                                <div class="bg-white p-3 sm:p-6 space-y-6 shadoFi">
                                                    <p class="text-base font-black text-center leading-relaxed text-gray-500 dark:text-gray-400 all_text">
                                                        Вы можете воспользоваться сервисом "Google Картинки" и поискать изображения там. Важным параметром является то, что изображение должно быть не менее 800x600 пикселей.
                                                    </p>
                                                    <p class="text-center leading-relaxed text-lg font-black dark:text-gray-400">
                                                        Ниже мы сделали несколко примеров:
                                                    </p>
                                                    <div class="flex flex-wrap justify-between mx-8 sm:mx-12">
                                                        <ul>
                                                            <li><a class="text-[#0066cb] border-b border-[#0066cb] border-dashed hover:border-solid" target="_blank" href="https://ru.freepik.com/search?format=search&query=%D0%B7%D0%B0%D0%BF%D1%87%D0%B0%D1%81%D1%82%D0%B8">Запчасти</a></li>
                                                            <li><a class="text-[#0066cb] border-b border-[#0066cb] border-dashed hover:border-solid" target="_blank" href="https://ru.freepik.com/search?format=search&query=%D0%AE%D1%80%D0%B8%D0%B4%D0%B8%D1%87%D0%B5%D1%81%D0%BA%D0%B0%D1%8F%20%D0%BF%D0%BE%D0%BC%D0%BE%D1%89%D1%8C">Юридическая помощь</a></li>
                                                            <li><a class="text-[#0066cb] border-b border-[#0066cb] border-dashed hover:border-solid" target="_blank" href="https://ru.freepik.com/search?format=search&query=%D0%9C%D0%B5%D0%B1%D0%B5%D0%BB%D1%8C">Мебель</a></li>
                                                            <li><a class="text-[#0066cb] border-b border-[#0066cb] border-dashed hover:border-solid" target="_blank" href="https://ru.freepik.com/search?format=search&query=%D0%A8%D1%83%D0%B3%D0%B0%D1%80%D0%B8%D0%BD%D0%B3">Шугаринг</a></li>
                                                        </ul>
                                                        <ul>
                                                            <li><a class="text-[#0066cb] border-b border-[#0066cb] border-dashed hover:border-solid" target="_blank" href="https://ru.freepik.com/search?format=search&query=%D0%9E%D0%B4%D0%B5%D0%B6%D0%B4%D0%B0">Одежда</a></li>
                                                            <li><a class="text-[#0066cb] border-b border-[#0066cb] border-dashed hover:border-solid" target="_blank" href="https://ru.freepik.com/search?format=search&query=SPA%20%D0%BF%D1%80%D0%BE%D1%86%D0%B5%D0%B4%D1%83%D1%80%D1%8B">SPA процедуры</a></li>
                                                            <li><a class="text-[#0066cb] border-b border-[#0066cb] border-dashed hover:border-solid" target="_blank" href="https://ru.freepik.com/search?format=search&query=%D1%81%D0%B0%D1%83%D0%BD%D1%8B">Сауны</a></li>
                                                        </ul>
                                                        <ul>
                                                            <li><a class="text-[#0066cb] border-b border-[#0066cb] border-dashed hover:border-solid" target="_blank" href="https://ru.freepik.com/search?format=search&query=%D0%A0%D0%B5%D0%BC%D0%BE%D0%BD%D1%82%20%D0%BA%D0%BE%D0%BC%D0%BF%D1%8C%D1%8E%D1%82%D0%B5%D1%80%D0%BE%D0%B2">Ремонт компьютеров</a></li>
                                                            <li><a class="text-[#0066cb] border-b border-[#0066cb] border-dashed hover:border-solid" target="_blank" href="https://ru.freepik.com/search?format=search&query=%D0%A1%D1%82%D0%BE%D0%BC%D0%B0%D1%82%D0%BE%D0%BB%D0%BE%D0%B3%D0%B8%D1%8F">Стоматология</a></li>
                                                            <li><a class="text-[#0066cb] border-b border-[#0066cb] border-dashed hover:border-solid" target="_blank" href="https://ru.freepik.com/search?format=search&query=%D0%9C%D0%B0%D0%BD%D0%B8%D0%BA%D1%8E%D1%80">Маникюр</a></li>
                                                        </ul>
                                                    </div>
                                                    <p class="text-sm text-center  leading-relaxed text-gray-700 dark:text-gray-400 mx-1 sm:mx-12">Вашего товара нет в примерах? <br> Ничего страшного, просто откройте любой пример и измените ключевое слово запроса или нажмите на кнопку ниже.</p>
                                                    <div class="flex items-center justify-center">
                                                        <button data-modal-hide="staticModal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-base px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Нет примеров</button>
                                                    </div>
                                                    <p class="text-sm text-center leading-relaxed text-black dark:text-gray-400 mx-1 sm:mx-12"><span class="font-black text-black">Остались вопросы?</span> Посетите наш раздел <a class="text-[#0066cb] hover:underline" href="/help.html">'GM Справка'</a> в котором можно найти различную полезную информацию или же увидеть те задачи, над которыми мы работаем в данный момент.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-wrap gap-2 justify-between">
                            <div class="file_upload files_img w-[230px] h-[230px] bg-[#fae115] rounded-2xl flex flex-col justify-center items-center relative overflow-hidden">
                                <div id="file_block" class="flex flex-col items-center justify-center relative w-full h-full ">
                                    <h2 class="font-bold text-sm lg:text-base">Обложка (обязательно)</h2>
                                    <label for="" class="text-[#a1a5a6] text-sm">Файл не выбран</label>
                                    <input type="file" id="uploadImage" class="absolute files_inp left-10 bottom-10 custom-file-input focus:outline-none focus:border-none">
                                </div>
                                <img id="cropperResult" alt="Cropped Image" class="hidden w-full object-cover h-full rounded-2xl">
                                <div id="cropModal" class="modal z-50 w-full h-auto">
                                    <div class="modal-content w-[600px] p-4 bg-white">
                                        <h2 class="text-xl mb-4">Фотография на вашей странице</h2>
                                        <div class="cropper-container">
                                            <img id="cropperImage" alt="Crop Image" class="w-full object-cover">
                                        </div>
                                        <div class="flex flex-col gap-2 sm:gap-0 sm:flex-row items-center p-4 justify-between">
                                            <h2 class="text-base">Выберите длинное изображение</h2>
                                            <div class="flex gap-4">
                                                <button id="cancelButton" class="px-10 py-2 bg-black/10 text-black rounded-md hover:bg-black/20">Отмена</button>
                                                <button id="cropButton" class="px-10 py-2 bg-[#0066cb] text-white rounded-md hover:bg-opacity-80">Сохранить</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="file_uploaded files_img w-[230px] h-[230px] bg-[#e9eef1] rounded-2xl flex flex-col justify-center items-center relative overflow-hidden">
                                <div id="file_block2" class="flex flex-col items-center justify-center relative w-full h-full">
                                    <h2 class="font-bold text-sm lg:text-base">Обложка (необязательно)</h2>
                                    <label for="" class="text-[#a1a5a6] text-sm">Файл не выбран</label>
                                    <input type="file" id="uploadImage2" class="absolute files_inp left-10 bottom-10 custom-file-input focus:outline-none focus:border-none">
                                </div>
                                <img id="cropperResult2" alt="Cropped Image" class="hidden w-full object-cover h-full rounded-2xl">
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
                            </div>
                            <div class="file_uploadPlus files_img w-[230px] h-[230px] p-8 bg-white border rounded-2xl flex flex-col justify-center items-center relative overflow-hidden hover:cursor-pointer hover:border-[#0066cb] hover:border-dashed">
                                <span class="textPlus text-center absolute bottom-10">Добавить еще место <br> под фото</span>
                            </div>
                            <div id="fileUpload3" class="file_upload files_img hidden w-[230px] h-[230px] bg-[#e9eef1] rounded-2xl flex-col justify-center items-center relative overflow-hidden">
                                <div id="file_block3" class="flex flex-col items-center justify-center relative w-full h-full">
                                    <h2 class="font-bold text-sm lg:text-base">Обложка (необязательно)</h2>
                                    <label for="" class="text-[#a1a5a6] text-sm">Файл не выбран</label>
                                    <input type="file" id="uploadImage3" class="absolute files_inp left-10 bottom-10 custom-file-input focus:outline-none focus:border-none">
                                </div>
                                <img id="cropperResult3" alt="Cropped Image" class="hidden w-full object-cover h-full rounded-2xl">
                                <div id="cropModal3" class="modal z-50 w-full h-auto">
                                    <div class="modal-content w-[600px] p-4 bg-white">
                                        <h2 class="text-xl mb-4">Фотография на вашей странице</h2>
                                        <div class="cropper-container">
                                            <img id="cropperImage3" alt="Crop Image" class="w-full object-cover">
                                        </div>
                                        <div class="flex flex-col gap-2 sm:gap-0 sm:flex-row items-center p-4 justify-between">
                                            <h2 class="text-base">Выберите длинное изображение</h2>
                                            <div class="flex gap-4">
                                                <button id="cancelButton3" class="px-10 py-2 bg-black/10 text-black rounded-md hover:bg-black/20">Отмена</button>
                                                <button id="cropButton3" class="px-10 py-2 bg-[#0066cb] text-white rounded-md hover:bg-opacity-80">Сохранить</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center justify-center mt-5">
                            <p class="text-[#2578cf] text-sm sm:text-base border-b border-dashed border-[#2578cf] cursor-pointer" id="moreImg">
                                Загрузить дополнительные фотографии
                            </p>
                            <svg id="svgImg" class="w-5 h-5 text-[#2578cf] cursor-pointer" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7 10L12 15L17 10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <div id="moreImgShow" class="hidden flex flex-col mt-5">
                            <h3 class="font-bold text-center">Дополнительные фото в карточке под спойлером (не обязательно)</h3>
                            <p class="text-center mt-5 text-black/50 px-0 sm:px-16 all_text">Выберите стиль отображения дополнительных фото, увидеть отличия вы сможете при просмотре акции.</p>
                            <div class="relative flex flex-wrap justify-between mt-4 add_more_photos">
                                <div id="photoBlock" class="overflow-hidden relative w-[130px] h-full">
                                    <div id="photoCard" class="relative bg-[#e9eef1] w-full h-[130px] rounded-2xl customPhoto1">
                                        <svg fill="currentColor" id="delPhoto" class="hidden w-7 h-7 absolute z-50 text-black/30 right-0 bg-white rounded-md hover:opacity-80 cursor-pointer" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M17,8 C17.5522847,8 18,8.44771525 18,9 L18,19 C18,20.6568542 16.6568542,22 15,22 L9,22 C7.34314575,22 6,20.6568542 6,19 L6,9 C6,8.44771525 6.44771525,8 7,8 L17,8 Z M16,10 L8,10 L8,19 C8,19.5522847 8.44771525,20 9,20 L15,20 C15.5522847,20 16,19.5522847 16,19 L16,10 Z M9,3 C9,2.44771525 9.44771525,2 10,2 L14,2 C14.5522847,2 15,2.44771525 15,3 L15,4 L19,4 C19.5522847,4 20,4.44771525 20,5 C20,5.55228475 19.5522847,6 19,6 L5,6 C4.44771525,6 4,5.55228475 4,5 C4,4.44771525 4.44771525,4 5,4 L9,4 L9,3 Z"/>
                                        </svg>
                                    </div>
                                    <img src="" id="photoPlace" class="w-full object-cover h-[130px] rounded-2xl hidden" alt="Фото">
                                    <div id="blockFile" class="flex flex-col items-center relative w-full h-[80px]">
                                        <input type="file" id="photoOne" class="absolute left-0 w-full top-4 custom-file-inputs focus:outline-none focus:border-none">
                                        <label for="photoOne" class="text-[#a1a5a6] text-sm absolute top-14">Файл не выбран</label>
                                    </div>
                                </div>
                                <div id="photoBlock2" class="overflow-hidden relative w-[130px] h-full">
                                    <div id="photoCard2" class="relative bg-[#e9eef1] w-full h-[130px] rounded-2xl customPhoto1">
                                        <svg fill="currentColor" id="delPhoto2" class="hidden w-7 h-7 absolute z-50 text-black/30 right-0 bg-white rounded-md hover:opacity-80 cursor-pointer" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M17,8 C17.5522847,8 18,8.44771525 18,9 L18,19 C18,20.6568542 16.6568542,22 15,22 L9,22 C7.34314575,22 6,20.6568542 6,19 L6,9 C6,8.44771525 6.44771525,8 7,8 L17,8 Z M16,10 L8,10 L8,19 C8,19.5522847 8.44771525,20 9,20 L15,20 C15.5522847,20 16,19.5522847 16,19 L16,10 Z M9,3 C9,2.44771525 9.44771525,2 10,2 L14,2 C14.5522847,2 15,2.44771525 15,3 L15,4 L19,4 C19.5522847,4 20,4.44771525 20,5 C20,5.55228475 19.5522847,6 19,6 L5,6 C4.44771525,6 4,5.55228475 4,5 C4,4.44771525 4.44771525,4 5,4 L9,4 L9,3 Z"/>
                                        </svg>
                                    </div>
                                    <img src="" id="photoPlace2" class="w-full object-cover h-[130px] rounded-2xl hidden" alt="Фото">
                                    <div id="blockFile2" class="flex flex-col items-center relative w-full h-[80px]">
                                        <input type="file" id="photoOne2" class="absolute left-0 w-full top-4 custom-file-inputs focus:outline-none focus:border-none">
                                        <label for="photoOne" class="text-[#a1a5a6] text-sm absolute top-14">Файл не выбран</label>
                                    </div>
                                </div>
                                <div id="photoBlock3" class="overflow-hidden relative w-[130px] h-full">
                                    <div id="photoCard3" class="relative bg-[#e9eef1] w-full h-[130px] rounded-2xl customPhoto1">
                                        <svg fill="currentColor" id="delPhoto3" class="hidden w-7 h-7 absolute z-50 text-black/30 right-0 bg-white rounded-md hover:opacity-80 cursor-pointer" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M17,8 C17.5522847,8 18,8.44771525 18,9 L18,19 C18,20.6568542 16.6568542,22 15,22 L9,22 C7.34314575,22 6,20.6568542 6,19 L6,9 C6,8.44771525 6.44771525,8 7,8 L17,8 Z M16,10 L8,10 L8,19 C8,19.5522847 8.44771525,20 9,20 L15,20 C15.5522847,20 16,19.5522847 16,19 L16,10 Z M9,3 C9,2.44771525 9.44771525,2 10,2 L14,2 C14.5522847,2 15,2.44771525 15,3 L15,4 L19,4 C19.5522847,4 20,4.44771525 20,5 C20,5.55228475 19.5522847,6 19,6 L5,6 C4.44771525,6 4,5.55228475 4,5 C4,4.44771525 4.44771525,4 5,4 L9,4 L9,3 Z"/>
                                        </svg>
                                    </div>
                                    <img src="" id="photoPlace3" class="w-full object-cover h-[130px] rounded-2xl hidden" alt="Фото">
                                    <div id="blockFile3" class="flex flex-col items-center relative w-full h-[80px]">
                                        <input type="file" id="photoOne3" class="absolute left-0 w-full top-4 custom-file-inputs focus:outline-none focus:border-none">
                                        <label for="photoOne" class="text-[#a1a5a6] text-sm absolute top-14">Файл не выбран</label>
                                    </div>
                                </div>
                                <div id="photoBlock4" class="overflow-hidden relative w-[130px] h-full">
                                    <div id="photoCard4" class="relative bg-[#e9eef1] w-full h-[130px] rounded-2xl customPhoto1">
                                        <svg fill="currentColor" id="delPhoto4" class="hidden w-7 h-7 absolute z-50 text-black/30 right-0 bg-white rounded-md hover:opacity-80 cursor-pointer" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M17,8 C17.5522847,8 18,8.44771525 18,9 L18,19 C18,20.6568542 16.6568542,22 15,22 L9,22 C7.34314575,22 6,20.6568542 6,19 L6,9 C6,8.44771525 6.44771525,8 7,8 L17,8 Z M16,10 L8,10 L8,19 C8,19.5522847 8.44771525,20 9,20 L15,20 C15.5522847,20 16,19.5522847 16,19 L16,10 Z M9,3 C9,2.44771525 9.44771525,2 10,2 L14,2 C14.5522847,2 15,2.44771525 15,3 L15,4 L19,4 C19.5522847,4 20,4.44771525 20,5 C20,5.55228475 19.5522847,6 19,6 L5,6 C4.44771525,6 4,5.55228475 4,5 C4,4.44771525 4.44771525,4 5,4 L9,4 L9,3 Z"/>
                                        </svg>
                                    </div>
                                    <img src="" id="photoPlace4" class="w-full object-cover h-[130px] rounded-2xl hidden" alt="Фото">
                                    <div id="blockFile4" class="flex flex-col items-center relative w-full h-[80px]">
                                        <input type="file" id="photoOne4" class="absolute left-0 w-full top-4 custom-file-inputs focus:outline-none focus:border-none">
                                        <label for="photoOne" class="text-[#a1a5a6] text-sm absolute top-14">Файл не выбран</label>
                                    </div>
                                </div>
                                <div id="morePhotos" class="w-[130px] h-[200px] reltive morePhoto bg-white border rounded-2xl flex flex-col justify-center items-center relative overflow-hidden hover:cursor-pointer hover:border-[#0066cb] hover:border-dashed">
                                    <span class="absolute bottom-8 text-sm text-center px-4">Добавить еще место <br> под фото</span>
                                </div>
                                <div id="photoBlock5" class="overflow-hidden relative w-[130px] h-full hidden">
                                    <div id="photoCard5" class="relative bg-[#e9eef1] w-full h-[130px] rounded-2xl customPhoto1">
                                        <svg fill="currentColor" id="delPhoto5" class="hidden w-7 h-7 absolute z-50 text-black/30 right-0 bg-white rounded-md hover:opacity-80 cursor-pointer" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M17,8 C17.5522847,8 18,8.44771525 18,9 L18,19 C18,20.6568542 16.6568542,22 15,22 L9,22 C7.34314575,22 6,20.6568542 6,19 L6,9 C6,8.44771525 6.44771525,8 7,8 L17,8 Z M16,10 L8,10 L8,19 C8,19.5522847 8.44771525,20 9,20 L15,20 C15.5522847,20 16,19.5522847 16,19 L16,10 Z M9,3 C9,2.44771525 9.44771525,2 10,2 L14,2 C14.5522847,2 15,2.44771525 15,3 L15,4 L19,4 C19.5522847,4 20,4.44771525 20,5 C20,5.55228475 19.5522847,6 19,6 L5,6 C4.44771525,6 4,5.55228475 4,5 C4,4.44771525 4.44771525,4 5,4 L9,4 L9,3 Z"/>
                                        </svg>
                                    </div>
                                    <img src="" id="photoPlace5" class="w-full object-cover h-[130px] rounded-2xl hidden" alt="Фото">
                                    <div id="blockFile5" class="flex flex-col items-center relative w-full h-[80px]">
                                        <input type="file" id="photoOne5" class="absolute left-0 w-full top-4 custom-file-inputs focus:outline-none focus:border-none">
                                        <label for="photoOne" class="text-[#a1a5a6] text-sm absolute top-14">Файл не выбран</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex bg-white p-4 md:p-8 mt-8 rounded-2xl flex-col" id="sedmoi">
                        <div class="flex justify-between items-center">
                            <p class="w-[450px] text-black/50 all_text"><strong class="text-black text-base">Если у вас есть видео на YouTube о том, чем вы занимаетесь</strong>
                                или продаете, вы можете указать здесь ссылку на него.
                            </p>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" value="" class="sr-only peer" id="checkYoutube">
                                <div class="w-14 h-7 bg-gray-200 peer-focus:outline-none peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[4px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                            </label>
                        </div>
                        <div class="my-4 hidden" id="youtube_link">
                            <div class="h-[1px] w-full bg-black/30"></div>
                            <div class="flex flex-col mt-4">
                                <label for="" class="font-bold">Ссылка на ролик</label>
                                <input type="text" class="w-full rounded-lg mt-3 border-gray-300" placeholder="https://www.youtube.com/watch?v=4kwHJWwJxnU">
                            </div>
                        </div>
                    </div>
                    <div class="flex bg-white p-4 md:p-8 mt-8 rounded-2xl flex-col w-full" id="vosmoi">
                        <h3 class="font-bold mb-4">Описание акции</h3>
                        <textarea id="editor" class="w-full h-[200px]">✨ «-30% на всё от Desigual» ✨<br><br>Приготовьтесь к яркому обновлению гардероба! Бренд Desigual дарит вам уникальную возможность приобрести любую вещь из своего ассортимента со скидкой 30%.<br><br>🗓️ Срок действия акции: Предложение действует с [Укажите дату начала акции] по [Укажите последний день текущего месяца]. Успейте воспользоваться!<br><br>🛍️ Что входит в акцию: Скидка 30% распространяется на абсолютно все товары в каталоге Desigual:<br>Одежда: платья, юбки, брюки, джинсы, куртки, пальто, футболки, рубашки, свитера и многое другое для мужчин и женщин.<br>Обувь: кроссовки, ботинки, сапоги, туфли, сандалии.<br>Аксессуары: сумки, рюкзаки, шарфы, головные уборы, украшения, ремни.<br>И другие категории товаров бренда Desigual.<br><br><br>📍 Где действует акция:<br>Онлайн: на официальном сайте Desigual [укажите ссылку на сайт, если применимо].<br>Оффлайн: во всех фирменных магазинах Desigual, расположенных в [укажите города или регионы, где действует акция, например: "Москве и Санкт-Петербурге"].<br><br><br>⚠️ Важные условия:<br>Скидка 30% применяется автоматически при оформлении заказа или на кассе.<br>Акция не суммируется с другими скидками, специальными предложениями и промокодами.<br>Количество товаров ограничено.<br>Возврат и обмен товаров осуществляется согласно стандартным правилам магазина.<br>Организатор акции оставляет за собой право изменить условия или досрочно завершить акцию.<br>Не упустите шанс добавить красок в свою жизнь с Desigual! 💖</textarea>
                        <div class="my-6">
                            <div class="h-[1px] w-full bg-black/30"></div>
                            <div class="flex justify-between items-center my-4">
                                <p class="mr-10 text-black/50 all_text"><strong class="text-black text-base">Допополнительные условия.</strong>
                                    Если по вашей акции есть какие-то дополнительные условия, о которых вы считаете нужным заявить - вы можете сделать это ниже. Если никаких дополнительных условий нет, то оставьте поле пустым.
                                    <span id="MOre_examp" class="text-[#2578cf] ml-3 hover:underline cursor-pointer">Подробнее</span>
                                </p>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" value="" class="sr-only peer" id="editor_vis">
                                    <div class="w-14 h-7 bg-gray-200 peer-focus:outline-none peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[4px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                                </label>
                            </div>
                        </div>
                        <div class="mb-4 hidden" id="text_editor">
                            <div class="h-[1px] w-full bg-black/30"></div>
                            <textarea id="editor2" class="w-full min-h-[200px]"></textarea>
                        </div>
                    </div>
                    <div id="modal_examp" class="fixed bg-black/50 z-50 top-0 left-0 w-full h-full hidden items-start justify-center py-5">
                        <div class="p-2 bg-white rounded-md border-4 border-[#2578cf] relative w-full max-w-2xl max-h-[300px] overflow-y-auto">
                            <div class="flex flex-col gap-4">
                                <div class="flex items-start justify-between bg-[#0066cb] p-4 border-b rounded-t dark:border-gray-600">
                                    <h3 class="text-xl font-semibold text-white">Пример вопросов</h3>
                                    <svg id="close_morexamp" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 hover:bg-black/50 hover:text-white cursor-pointer text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                    </svg>
                                </div>

                                <!-- Контент -->
                                <div class="p-3 sm:p-6 space-y-4">
                                    <p class="text-base text-gray-700 dark:text-gray-300 font-semibold text-center">
                                        Пункты раздела «дополнительные условия» отображаются здесь:
                                    </p>

                                    <div class="flex justify-center">
                                        <img src="/assets/images/img-doc.png" alt="Пример документа" class="rounded-md border shadow-md max-w-full">
                                    </div>

                                    <p class="text-gray-700 dark:text-gray-300">
                                        В данном блоке необходимо указывать все дополнительные условия, чтобы не вводить пользователей в заблуждение.
                                    </p>

                                    <p class="text-gray-700 dark:text-gray-300">
                                        Когда, например, при создании акции вы заполняете такие блоки как «код для скидки», «минимальная сумма заказа», «бесплатная доставка» и т.д., то данный блок включается автоматически и там прописываются дополнительные условия, которые будут отображены в акции. Вы можете редактировать данный блок самостоятельно, кратко, но не злоупотребляя им.
                                    </p>

                                    <p class="text-gray-700 dark:text-gray-300 font-semibold">
                                        В качестве примера несколько условий:
                                    </p>

                                    <ul class="list-disc list-inside text-gray-700 dark:text-gray-300 space-y-1">
                                        <li>Минимальная сумма 10 000 рублей</li>
                                        <li>В конкурсе могут участвовать только лица, достигшие 18 лет и имеющие художественное образование</li>
                                        <li>Сделай покупку на сумму свыше 60 000 рублей и используй промокод чтобы получить кэшбэк 10%</li>
                                        <li>Соверши покупку на сумму от 10 000 рублей и получи сумочку из натуральной кожи в подарок</li>
                                        <li>Сделай покупку на сумму свыше 60 000 рублей и используй промокод чтобы получить скидку 10 000 рублей</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex bg-white p-4 md:p-8 mt-8 rounded-2xl flex-col" id="devyatyi">
                        <div class="flex justify-between items-center">
                            <h3 class="mr-4 font-bold">
                                При наличии, добавьте ссылки на ваш сайт или страницы в соцсетях.
                            </h3>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" value="" class="sr-only peer" id="social">
                                <div class="w-14 h-7 bg-gray-200 peer-focus:outline-none peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[4px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                            </label>
                        </div>
                        <div class="my-4 hidden" id="allSocial">
                            <div class="h-[1px] w-full bg-black/30"></div>
                            <div class="flex flex-wrap gap-3 mt-6">
                                <div class="flex px-3 rounded-md items-center py-2 bg-[#E5ECF0] cursor-pointer" id="socWeb">
                                    <img src="/assets/constructor/socialWeb.png" alt="web" >
                                    <span class="text-sm sm:text-base ml-1">Веб-сайт</span>
                                </div>
                                <div class="flex px-3 rounded-md items-center py-2 bg-[#E5ECF0] cursor-pointer" id="socEmail">
                                    <img src="/assets/constructor/socialemail.png" alt="Email" >
                                    <span class="text-sm sm:text-base ml-1">Электронная почта</span>
                                </div>
                                <div class="flex px-3 rounded-md items-center py-2 bg-[#E5ECF0] cursor-pointer" id="socVk">
                                    <img src="/assets/constructor/socialVk.png" alt="Vk" >
                                    <span class="text-sm sm:text-base ml-1">Вконтакте</span>
                                </div>
                                <div class="flex px-3 rounded-md items-center py-2 bg-[#E5ECF0] cursor-pointer" id="socIns">
                                    <img src="/assets/constructor/socialIns.png" alt="ins" >
                                    <span class="text-sm sm:text-base ml-1">Instagram</span>
                                </div>
                                <div class="flex px-3 rounded-md items-center py-2 bg-[#E5ECF0] cursor-pointer" id="socYou">
                                    <img src="/assets/constructor/socialYou.png" alt="Youtube">
                                    <span class="text-sm sm:text-base ml-1">YouTube</span>
                                </div>
                                <div class="flex px-3 rounded-md items-center py-2 bg-[#E5ECF0] cursor-pointer" id="socLin">
                                    <img src="/assets/constructor/socialLinkedin.png" alt="Linkedin">
                                    <span class="text-sm sm:text-base ml-1">Linkedin</span>
                                </div>
                                <div class="flex px-3 rounded-md items-center py-2 bg-[#E5ECF0] cursor-pointer" id="socOk">
                                    <img src="/assets/constructor/socialOk.png" alt="OK">
                                    <span class="text-sm sm:text-base ml-1">Одноклассники</span>
                                </div>
                                <div class="flex px-3 rounded-md items-center py-2 bg-[#E5ECF0] cursor-pointer" id="socTel">
                                    <img src="/assets/constructor/socialTelegram.png" alt="telegram">
                                    <span class="text-sm sm:text-base ml-1">Telegram</span>
                                </div>
                                <div class="flex px-3 rounded-md items-center py-2 bg-[#E5ECF0] cursor-pointer" id="socWha">
                                    <img src="/assets/constructor/socialWha.png" alt="Whattsapp">
                                    <span class="text-sm sm:text-base ml-1">WhatsApp</span>
                                </div>
                                <div class="flex px-3 rounded-md items-center py-2 bg-[#E5ECF0] cursor-pointer" id="socViber">
                                    <img src="/assets/constructor/socialViber.png" alt="Viber">
                                    <span class="text-sm sm:text-base ml-1">Viber</span>
                                </div>
                                <div class="text-xs text-gray-500 mt-4">Instagram - соцсеть принадлежит компании Meta, признанной экстремистской и запрещенной на территории России</div>
                            </div>
                            <div class="mt-6">
                                <div class="hidden" id="webDiv">
                                    <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4">
                                        <div class="relative">
                                            <div class="flex items-center absolute top-3 left-2">
                                                <img src="/assets/constructor/socialWeb.png" alt="web">
                                            </div>
                                            <input type="text" class="w-[450px] link_url rounded-md ring-black/30 link_social" placeholder="Веб-сайт">
                                            <div class="absolute top-1  left_del left-[415px] h-[34px] w-[2px] bg-black/30"></div>
                                            <svg fill="currentColor" id="delweb1" class="w-6 h-6 absolute top-2 text-black/50 left_delSvg left-[420px] hover:text-black/30 cursor-pointer" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M17,8 C17.5522847,8 18,8.44771525 18,9 L18,19 C18,20.6568542 16.6568542,22 15,22 L9,22 C7.34314575,22 6,20.6568542 6,19 L6,9 C6,8.44771525 6.44771525,8 7,8 L17,8 Z M16,10 L8,10 L8,19 C8,19.5522847 8.44771525,20 9,20 L15,20 C15.5522847,20 16,19.5522847 16,19 L16,10 Z M9,3 C9,2.44771525 9.44771525,2 10,2 L14,2 C14.5522847,2 15,2.44771525 15,3 L15,4 L19,4 C19.5522847,4 20,4.44771525 20,5 C20,5.55228475 19.5522847,6 19,6 L5,6 C4.44771525,6 4,5.55228475 4,5 C4,4.44771525 4.44771525,4 5,4 L9,4 L9,3 Z"/>
                                            </svg>
                                        </div>
                                        <span class="text-sm text-[#0066CC] hover:text-[#993300] cursor-pointer" id="moreWeb">+ еще Веб-сайт</span>
                                    </div>
                                    <div class="relative mt-4 hidden" id="web2">
                                        <div class="flex items-center absolute top-3 left-2">
                                            <img src="/assets/constructor/socialWeb.png" alt="web">
                                        </div>
                                        <input type="text" class="w-[450px] link_url rounded-md ring-black/30 link_social" placeholder="Веб-сайт">
                                        <div class="absolute top-1 left_del left-[415px] h-[34px] w-[2px] bg-black/30"></div>
                                        <svg fill="currentColor" id="delWeb" class="w-6 h-6 absolute top-2 text-black/50 left_delSvg left-[420px] hover:text-black/30 cursor-pointer" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M17,8 C17.5522847,8 18,8.44771525 18,9 L18,19 C18,20.6568542 16.6568542,22 15,22 L9,22 C7.34314575,22 6,20.6568542 6,19 L6,9 C6,8.44771525 6.44771525,8 7,8 L17,8 Z M16,10 L8,10 L8,19 C8,19.5522847 8.44771525,20 9,20 L15,20 C15.5522847,20 16,19.5522847 16,19 L16,10 Z M9,3 C9,2.44771525 9.44771525,2 10,2 L14,2 C14.5522847,2 15,2.44771525 15,3 L15,4 L19,4 C19.5522847,4 20,4.44771525 20,5 C20,5.55228475 19.5522847,6 19,6 L5,6 C4.44771525,6 4,5.55228475 4,5 C4,4.44771525 4.44771525,4 5,4 L9,4 L9,3 Z"/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="hidden" id="emailDiv">
                                    <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4 mt-4">
                                        <div class="relative">
                                            <div class="flex items-center absolute top-3 left-2">
                                                <img src="/assets/constructor/socialemail.png" alt="web">
                                            </div>
                                            <input type="text" class="w-[450px] link_url rounded-md ring-black/30 link_social" placeholder="Электронная почта">
                                            <div class="absolute top-1 left_del left-[415px] h-[34px] w-[2px] bg-black/30"></div>
                                            <svg fill="currentColor" id="delEmail1" class="w-6 h-6 absolute top-2 text-black/50 left_delSvg left-[420px] hover:text-black/30 cursor-pointer" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M17,8 C17.5522847,8 18,8.44771525 18,9 L18,19 C18,20.6568542 16.6568542,22 15,22 L9,22 C7.34314575,22 6,20.6568542 6,19 L6,9 C6,8.44771525 6.44771525,8 7,8 L17,8 Z M16,10 L8,10 L8,19 C8,19.5522847 8.44771525,20 9,20 L15,20 C15.5522847,20 16,19.5522847 16,19 L16,10 Z M9,3 C9,2.44771525 9.44771525,2 10,2 L14,2 C14.5522847,2 15,2.44771525 15,3 L15,4 L19,4 C19.5522847,4 20,4.44771525 20,5 C20,5.55228475 19.5522847,6 19,6 L5,6 C4.44771525,6 4,5.55228475 4,5 C4,4.44771525 4.44771525,4 5,4 L9,4 L9,3 Z"/>
                                            </svg>
                                        </div>
                                        <span class="text-sm text-[#0066CC] hover:text-[#993300] cursor-pointer" id="moreEmail">+ еще Электронная почта</span>
                                    </div>
                                    <div class="relative mt-4 hidden" id="email2">
                                        <div class="flex items-center absolute top-3 left-2">
                                            <img src="/assets/constructor/socialemail.png" alt="web">
                                        </div>
                                        <input type="text" class="w-[450px] link_url rounded-md ring-black/30 link_social" placeholder="Электронная почта">
                                        <div class="absolute top-1 left_del left-[415px] h-[34px] w-[2px] bg-black/30"></div>
                                        <svg fill="currentColor" id="delEmail2" class="w-6 h-6 absolute top-2 text-black/50 left_delSvg left-[420px] hover:text-black/30 cursor-pointer" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M17,8 C17.5522847,8 18,8.44771525 18,9 L18,19 C18,20.6568542 16.6568542,22 15,22 L9,22 C7.34314575,22 6,20.6568542 6,19 L6,9 C6,8.44771525 6.44771525,8 7,8 L17,8 Z M16,10 L8,10 L8,19 C8,19.5522847 8.44771525,20 9,20 L15,20 C15.5522847,20 16,19.5522847 16,19 L16,10 Z M9,3 C9,2.44771525 9.44771525,2 10,2 L14,2 C14.5522847,2 15,2.44771525 15,3 L15,4 L19,4 C19.5522847,4 20,4.44771525 20,5 C20,5.55228475 19.5522847,6 19,6 L5,6 C4.44771525,6 4,5.55228475 4,5 C4,4.44771525 4.44771525,4 5,4 L9,4 L9,3 Z"/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="hidden" id="insDiv">
                                    <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4 mt-4">
                                        <div class="relative">
                                            <div class="flex items-center absolute top-3 left-2">
                                                <img src="/assets/constructor/socialIns.png" alt="web">
                                            </div>
                                            <input type="text" class="w-[450px] link_url rounded-md ring-black/30 link_social" placeholder="Instagram">
                                            <div class="absolute top-1 left_del left-[415px] h-[34px] w-[2px] bg-black/30"></div>
                                            <svg fill="currentColor" id="delIns1" class="w-6 h-6 absolute top-2 text-black/50 left_delSvg left-[420px] hover:text-black/30 cursor-pointer" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M17,8 C17.5522847,8 18,8.44771525 18,9 L18,19 C18,20.6568542 16.6568542,22 15,22 L9,22 C7.34314575,22 6,20.6568542 6,19 L6,9 C6,8.44771525 6.44771525,8 7,8 L17,8 Z M16,10 L8,10 L8,19 C8,19.5522847 8.44771525,20 9,20 L15,20 C15.5522847,20 16,19.5522847 16,19 L16,10 Z M9,3 C9,2.44771525 9.44771525,2 10,2 L14,2 C14.5522847,2 15,2.44771525 15,3 L15,4 L19,4 C19.5522847,4 20,4.44771525 20,5 C20,5.55228475 19.5522847,6 19,6 L5,6 C4.44771525,6 4,5.55228475 4,5 C4,4.44771525 4.44771525,4 5,4 L9,4 L9,3 Z"/>
                                            </svg>
                                        </div>
                                        <span class="text-sm text-[#0066CC] hover:text-[#993300] cursor-pointer" id="moreIns">+ еще Instagram</span>
                                    </div>
                                    <div class="relative mt-4 hidden" id="ins2">
                                        <div class="flex items-center absolute top-3 left-2">
                                            <img src="/assets/constructor/socialIns.png" alt="web">
                                        </div>
                                        <input type="text" class="w-[450px] link_url rounded-md ring-black/30 link_social" placeholder="Instagram">
                                        <div class="absolute top-1 left_del left-[415px] h-[34px] w-[2px] bg-black/30"></div>
                                        <svg fill="currentColor" id="delIns2" class="w-6 h-6 absolute top-2 text-black/50 left_delSvg left-[420px] hover:text-black/30 cursor-pointer" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M17,8 C17.5522847,8 18,8.44771525 18,9 L18,19 C18,20.6568542 16.6568542,22 15,22 L9,22 C7.34314575,22 6,20.6568542 6,19 L6,9 C6,8.44771525 6.44771525,8 7,8 L17,8 Z M16,10 L8,10 L8,19 C8,19.5522847 8.44771525,20 9,20 L15,20 C15.5522847,20 16,19.5522847 16,19 L16,10 Z M9,3 C9,2.44771525 9.44771525,2 10,2 L14,2 C14.5522847,2 15,2.44771525 15,3 L15,4 L19,4 C19.5522847,4 20,4.44771525 20,5 C20,5.55228475 19.5522847,6 19,6 L5,6 C4.44771525,6 4,5.55228475 4,5 C4,4.44771525 4.44771525,4 5,4 L9,4 L9,3 Z"/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="hidden" id="vkDiv">
                                    <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4 mt-4">
                                        <div class="relative">
                                            <div class="flex items-center absolute top-3 left-2">
                                                <img src="/assets/constructor/socialVk.png" alt="web">
                                            </div>
                                            <input type="text" class="w-[450px] link_url rounded-md ring-black/30 link_social" placeholder="Вконтакте">
                                            <div class="absolute top-1 left_del left-[415px] h-[34px] w-[2px] bg-black/30"></div>
                                            <svg fill="currentColor" id="delVk1" class="w-6 h-6 absolute top-2 text-black/50 left_delSvg left-[420px] hover:text-black/30 cursor-pointer" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M17,8 C17.5522847,8 18,8.44771525 18,9 L18,19 C18,20.6568542 16.6568542,22 15,22 L9,22 C7.34314575,22 6,20.6568542 6,19 L6,9 C6,8.44771525 6.44771525,8 7,8 L17,8 Z M16,10 L8,10 L8,19 C8,19.5522847 8.44771525,20 9,20 L15,20 C15.5522847,20 16,19.5522847 16,19 L16,10 Z M9,3 C9,2.44771525 9.44771525,2 10,2 L14,2 C14.5522847,2 15,2.44771525 15,3 L15,4 L19,4 C19.5522847,4 20,4.44771525 20,5 C20,5.55228475 19.5522847,6 19,6 L5,6 C4.44771525,6 4,5.55228475 4,5 C4,4.44771525 4.44771525,4 5,4 L9,4 L9,3 Z"/>
                                            </svg>
                                        </div>
                                        <span class="text-sm text-[#0066CC] hover:text-[#993300] cursor-pointer" id="moreVk">+ еще Вконтакте</span>
                                    </div>
                                    <div class="relative mt-4 hidden" id="vk2">
                                        <div class="flex items-center absolute top-3 left-2">
                                            <img src="/assets/constructor/socialVk.png" alt="web">
                                        </div>
                                        <input type="text" class="w-[450px] link_url rounded-md ring-black/30 link_social" placeholder="Вконтакте">
                                        <div class="absolute top-1 left_del left-[415px] h-[34px] w-[2px] bg-black/30"></div>
                                        <svg fill="currentColor" id="delVk2" class="w-6 h-6 absolute top-2 text-black/50 left_delSvg left-[420px] hover:text-black/30 cursor-pointer" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M17,8 C17.5522847,8 18,8.44771525 18,9 L18,19 C18,20.6568542 16.6568542,22 15,22 L9,22 C7.34314575,22 6,20.6568542 6,19 L6,9 C6,8.44771525 6.44771525,8 7,8 L17,8 Z M16,10 L8,10 L8,19 C8,19.5522847 8.44771525,20 9,20 L15,20 C15.5522847,20 16,19.5522847 16,19 L16,10 Z M9,3 C9,2.44771525 9.44771525,2 10,2 L14,2 C14.5522847,2 15,2.44771525 15,3 L15,4 L19,4 C19.5522847,4 20,4.44771525 20,5 C20,5.55228475 19.5522847,6 19,6 L5,6 C4.44771525,6 4,5.55228475 4,5 C4,4.44771525 4.44771525,4 5,4 L9,4 L9,3 Z"/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="hidden" id="YouDiv">
                                    <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4 mt-4">
                                        <div class="relative">
                                            <div class="flex items-center absolute top-3 left-2">
                                                <img src="/assets/constructor/socialYou.png" alt="web">
                                            </div>
                                            <input type="text" class="w-[450px] link_url rounded-md ring-black/30 link_social" placeholder="YouTube">
                                            <div class="absolute top-1 left_del left-[415px] h-[34px] w-[2px] bg-black/30"></div>
                                            <svg fill="currentColor" id="delYou1" class="w-6 h-6 absolute top-2 text-black/50 left_delSvg left-[420px] hover:text-black/30 cursor-pointer" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M17,8 C17.5522847,8 18,8.44771525 18,9 L18,19 C18,20.6568542 16.6568542,22 15,22 L9,22 C7.34314575,22 6,20.6568542 6,19 L6,9 C6,8.44771525 6.44771525,8 7,8 L17,8 Z M16,10 L8,10 L8,19 C8,19.5522847 8.44771525,20 9,20 L15,20 C15.5522847,20 16,19.5522847 16,19 L16,10 Z M9,3 C9,2.44771525 9.44771525,2 10,2 L14,2 C14.5522847,2 15,2.44771525 15,3 L15,4 L19,4 C19.5522847,4 20,4.44771525 20,5 C20,5.55228475 19.5522847,6 19,6 L5,6 C4.44771525,6 4,5.55228475 4,5 C4,4.44771525 4.44771525,4 5,4 L9,4 L9,3 Z"/>
                                            </svg>
                                        </div>
                                        <span class="text-sm text-[#0066CC] hover:text-[#993300] cursor-pointer" id="moreYou">+ еще YouTube</span>
                                    </div>
                                    <div class="relative mt-4 hidden" id="you2">
                                        <div class="flex items-center absolute top-3 left-2">
                                            <img src="/assets/constructor/socialYou.png" alt="web">
                                        </div>
                                        <input type="text" class="w-[450px] link_url rounded-md ring-black/30 link_social" placeholder="YouTube">
                                        <div class="absolute top-1 left_del left-[415px] h-[34px] w-[2px] bg-black/30"></div>
                                        <svg fill="currentColor" id="delYou2" class="w-6 h-6 absolute top-2 text-black/50 left_delSvg left-[420px] hover:text-black/30 cursor-pointer" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M17,8 C17.5522847,8 18,8.44771525 18,9 L18,19 C18,20.6568542 16.6568542,22 15,22 L9,22 C7.34314575,22 6,20.6568542 6,19 L6,9 C6,8.44771525 6.44771525,8 7,8 L17,8 Z M16,10 L8,10 L8,19 C8,19.5522847 8.44771525,20 9,20 L15,20 C15.5522847,20 16,19.5522847 16,19 L16,10 Z M9,3 C9,2.44771525 9.44771525,2 10,2 L14,2 C14.5522847,2 15,2.44771525 15,3 L15,4 L19,4 C19.5522847,4 20,4.44771525 20,5 C20,5.55228475 19.5522847,6 19,6 L5,6 C4.44771525,6 4,5.55228475 4,5 C4,4.44771525 4.44771525,4 5,4 L9,4 L9,3 Z"/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="hidden" id="linDiv">
                                    <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4 mt-4">
                                        <div class="relative">
                                            <div class="flex items-center absolute top-3 left-2">
                                                <img src="/assets/constructor/socialLinkedin.png" alt="web">
                                            </div>
                                            <input type="text" class="w-[450px] link_url rounded-md ring-black/30 link_social" placeholder="Linkedin">
                                            <div class="absolute top-1 left_del left-[415px] h-[34px] w-[2px] bg-black/30"></div>
                                            <svg fill="currentColor" id="delLin1" class="w-6 h-6 absolute top-2 text-black/50 left_delSvg left-[420px] hover:text-black/30 cursor-pointer" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M17,8 C17.5522847,8 18,8.44771525 18,9 L18,19 C18,20.6568542 16.6568542,22 15,22 L9,22 C7.34314575,22 6,20.6568542 6,19 L6,9 C6,8.44771525 6.44771525,8 7,8 L17,8 Z M16,10 L8,10 L8,19 C8,19.5522847 8.44771525,20 9,20 L15,20 C15.5522847,20 16,19.5522847 16,19 L16,10 Z M9,3 C9,2.44771525 9.44771525,2 10,2 L14,2 C14.5522847,2 15,2.44771525 15,3 L15,4 L19,4 C19.5522847,4 20,4.44771525 20,5 C20,5.55228475 19.5522847,6 19,6 L5,6 C4.44771525,6 4,5.55228475 4,5 C4,4.44771525 4.44771525,4 5,4 L9,4 L9,3 Z"/>
                                            </svg>
                                        </div>
                                        <span class="text-sm text-[#0066CC] hover:text-[#993300] cursor-pointer" id="moreLin">+ еще Linkedin</span>
                                    </div>
                                    <div class="relative mt-4 hidden" id="lin2">
                                        <div class="flex items-center absolute top-3 left-2">
                                            <img src="/assets/constructor/socialLinkedin.png" alt="web">
                                        </div>
                                        <input type="text" class="w-[450px] link_url rounded-md ring-black/30 link_social" placeholder="Linkedin">
                                        <div class="absolute top-1 left_del left-[415px] h-[34px] w-[2px] bg-black/30"></div>
                                        <svg fill="currentColor" id="delLin2" class="w-6 h-6 absolute top-2 text-black/50 left_delSvg left-[420px] hover:text-black/30 cursor-pointer" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M17,8 C17.5522847,8 18,8.44771525 18,9 L18,19 C18,20.6568542 16.6568542,22 15,22 L9,22 C7.34314575,22 6,20.6568542 6,19 L6,9 C6,8.44771525 6.44771525,8 7,8 L17,8 Z M16,10 L8,10 L8,19 C8,19.5522847 8.44771525,20 9,20 L15,20 C15.5522847,20 16,19.5522847 16,19 L16,10 Z M9,3 C9,2.44771525 9.44771525,2 10,2 L14,2 C14.5522847,2 15,2.44771525 15,3 L15,4 L19,4 C19.5522847,4 20,4.44771525 20,5 C20,5.55228475 19.5522847,6 19,6 L5,6 C4.44771525,6 4,5.55228475 4,5 C4,4.44771525 4.44771525,4 5,4 L9,4 L9,3 Z"/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="hidden" id="okDiv">
                                    <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4 mt-4">
                                        <div class="relative">
                                            <div class="flex items-center absolute top-3 left-2">
                                                <img src="/assets/constructor/socialOk.png" alt="web">
                                            </div>
                                            <input type="text" class="w-[450px] link_url rounded-md ring-black/30 link_social" placeholder="Одноклассники">
                                            <div class="absolute top-1 left_del left-[415px] h-[34px] w-[2px] bg-black/30"></div>
                                            <svg fill="currentColor" id="delOk1" class="w-6 h-6 absolute top-2 text-black/50 left_delSvg left-[420px] hover:text-black/30 cursor-pointer" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M17,8 C17.5522847,8 18,8.44771525 18,9 L18,19 C18,20.6568542 16.6568542,22 15,22 L9,22 C7.34314575,22 6,20.6568542 6,19 L6,9 C6,8.44771525 6.44771525,8 7,8 L17,8 Z M16,10 L8,10 L8,19 C8,19.5522847 8.44771525,20 9,20 L15,20 C15.5522847,20 16,19.5522847 16,19 L16,10 Z M9,3 C9,2.44771525 9.44771525,2 10,2 L14,2 C14.5522847,2 15,2.44771525 15,3 L15,4 L19,4 C19.5522847,4 20,4.44771525 20,5 C20,5.55228475 19.5522847,6 19,6 L5,6 C4.44771525,6 4,5.55228475 4,5 C4,4.44771525 4.44771525,4 5,4 L9,4 L9,3 Z"/>
                                            </svg>
                                        </div>
                                        <span class="text-sm text-[#0066CC] hover:text-[#993300] cursor-pointer" id="moreOk">+ еще Одноклассники</span>
                                    </div>
                                    <div class="relative mt-4 hidden" id="ok2">
                                        <div class="flex items-center absolute top-3 left-2">
                                            <img src="/assets/constructor/socialOk.png" alt="web">
                                        </div>
                                        <input type="text" class="w-[450px] link_url rounded-md ring-black/30 link_social" placeholder="Одноклассники">
                                        <div class="absolute top-1 left_del left-[415px] h-[34px] w-[2px] bg-black/30"></div>
                                        <svg fill="currentColor" id="delOk2" class="w-6 h-6 absolute top-2 text-black/50 left_delSvg left-[420px] hover:text-black/30 cursor-pointer" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M17,8 C17.5522847,8 18,8.44771525 18,9 L18,19 C18,20.6568542 16.6568542,22 15,22 L9,22 C7.34314575,22 6,20.6568542 6,19 L6,9 C6,8.44771525 6.44771525,8 7,8 L17,8 Z M16,10 L8,10 L8,19 C8,19.5522847 8.44771525,20 9,20 L15,20 C15.5522847,20 16,19.5522847 16,19 L16,10 Z M9,3 C9,2.44771525 9.44771525,2 10,2 L14,2 C14.5522847,2 15,2.44771525 15,3 L15,4 L19,4 C19.5522847,4 20,4.44771525 20,5 C20,5.55228475 19.5522847,6 19,6 L5,6 C4.44771525,6 4,5.55228475 4,5 C4,4.44771525 4.44771525,4 5,4 L9,4 L9,3 Z"/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="hidden" id="mirDiv">
                                    <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4 mt-4">
                                        <div class="relative">
                                            <div class="flex items-center absolute top-3 left-2">
                                                <img src="/assets/constructor/socialSmile.png" alt="web">
                                            </div>
                                            <input type="text" class="w-[450px] link_url rounded-md ring-black/30 link_social" placeholder="Мой Мир">
                                            <div class="absolute top-1 left_del left-[415px] h-[34px] w-[2px] bg-black/30"></div>
                                            <svg fill="currentColor" id="delMir1" class="w-6 h-6 absolute top-2 text-black/50 left_delSvg left-[420px] hover:text-black/30 cursor-pointer" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M17,8 C17.5522847,8 18,8.44771525 18,9 L18,19 C18,20.6568542 16.6568542,22 15,22 L9,22 C7.34314575,22 6,20.6568542 6,19 L6,9 C6,8.44771525 6.44771525,8 7,8 L17,8 Z M16,10 L8,10 L8,19 C8,19.5522847 8.44771525,20 9,20 L15,20 C15.5522847,20 16,19.5522847 16,19 L16,10 Z M9,3 C9,2.44771525 9.44771525,2 10,2 L14,2 C14.5522847,2 15,2.44771525 15,3 L15,4 L19,4 C19.5522847,4 20,4.44771525 20,5 C20,5.55228475 19.5522847,6 19,6 L5,6 C4.44771525,6 4,5.55228475 4,5 C4,4.44771525 4.44771525,4 5,4 L9,4 L9,3 Z"/>
                                            </svg>
                                        </div>
                                        <span class="text-sm text-[#0066CC] hover:text-[#993300] cursor-pointer" id="moreMir">+ еще Мой Мир</span>
                                    </div>
                                    <div class="relative mt-4 hidden" id="mir2">
                                        <div class="flex items-center absolute top-3 left-2">
                                            <img src="/assets/constructor/socialSmile.png" alt="web">
                                        </div>
                                        <input type="text" class="w-[450px] link_url rounded-md ring-black/30 link_social" placeholder="Мой Мир">
                                        <div class="absolute top-1 left_del left-[415px] h-[34px] w-[2px] bg-black/30"></div>
                                        <svg fill="currentColor" id="delMir2" class="w-6 h-6 absolute top-2 text-black/50 left_delSvg left-[420px] hover:text-black/30 cursor-pointer" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M17,8 C17.5522847,8 18,8.44771525 18,9 L18,19 C18,20.6568542 16.6568542,22 15,22 L9,22 C7.34314575,22 6,20.6568542 6,19 L6,9 C6,8.44771525 6.44771525,8 7,8 L17,8 Z M16,10 L8,10 L8,19 C8,19.5522847 8.44771525,20 9,20 L15,20 C15.5522847,20 16,19.5522847 16,19 L16,10 Z M9,3 C9,2.44771525 9.44771525,2 10,2 L14,2 C14.5522847,2 15,2.44771525 15,3 L15,4 L19,4 C19.5522847,4 20,4.44771525 20,5 C20,5.55228475 19.5522847,6 19,6 L5,6 C4.44771525,6 4,5.55228475 4,5 C4,4.44771525 4.44771525,4 5,4 L9,4 L9,3 Z"/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="hidden" id="mainDiv">
                                    <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4 mt-4">
                                        <div class="relative">
                                            <div class="flex items-center absolute top-3 left-2">
                                                <img src="/assets/constructor/socialGM.png" alt="web">
                                            </div>
                                            <input type="text" class="w-[450px] link_url rounded-md ring-black/30 link_social" placeholder="Main Face">
                                            <div class="absolute top-1 left_del left-[415px] h-[34px] w-[2px] bg-black/30"></div>
                                            <svg fill="currentColor" id="delMain1" class="w-6 h-6 absolute top-2 text-black/50 left_delSvg left-[420px] hover:text-black/30 cursor-pointer" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M17,8 C17.5522847,8 18,8.44771525 18,9 L18,19 C18,20.6568542 16.6568542,22 15,22 L9,22 C7.34314575,22 6,20.6568542 6,19 L6,9 C6,8.44771525 6.44771525,8 7,8 L17,8 Z M16,10 L8,10 L8,19 C8,19.5522847 8.44771525,20 9,20 L15,20 C15.5522847,20 16,19.5522847 16,19 L16,10 Z M9,3 C9,2.44771525 9.44771525,2 10,2 L14,2 C14.5522847,2 15,2.44771525 15,3 L15,4 L19,4 C19.5522847,4 20,4.44771525 20,5 C20,5.55228475 19.5522847,6 19,6 L5,6 C4.44771525,6 4,5.55228475 4,5 C4,4.44771525 4.44771525,4 5,4 L9,4 L9,3 Z"/>
                                            </svg>
                                        </div>
                                        <span class="text-sm text-[#0066CC] hover:text-[#993300] cursor-pointer" id="moreMain">+ еще Main Face</span>
                                    </div>
                                    <div class="relative mt-4 hidden" id="main2">
                                        <div class="flex items-center absolute top-3 left-2">
                                            <img src="/assets/constructor/socialGM.png" alt="web">
                                        </div>
                                        <input type="text" class="w-[450px] link_url rounded-md ring-black/30 link_social" placeholder="Main Face">
                                        <div class="absolute top-1 left_del left-[415px] h-[34px] w-[2px] bg-black/30"></div>
                                        <svg fill="currentColor" id="delMain2" class="w-6 h-6 absolute top-2 text-black/50 left_delSvg left-[420px] hover:text-black/30 cursor-pointer" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M17,8 C17.5522847,8 18,8.44771525 18,9 L18,19 C18,20.6568542 16.6568542,22 15,22 L9,22 C7.34314575,22 6,20.6568542 6,19 L6,9 C6,8.44771525 6.44771525,8 7,8 L17,8 Z M16,10 L8,10 L8,19 C8,19.5522847 8.44771525,20 9,20 L15,20 C15.5522847,20 16,19.5522847 16,19 L16,10 Z M9,3 C9,2.44771525 9.44771525,2 10,2 L14,2 C14.5522847,2 15,2.44771525 15,3 L15,4 L19,4 C19.5522847,4 20,4.44771525 20,5 C20,5.55228475 19.5522847,6 19,6 L5,6 C4.44771525,6 4,5.55228475 4,5 C4,4.44771525 4.44771525,4 5,4 L9,4 L9,3 Z"/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="hidden" id="twitDiv">
                                    <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4 mt-4">
                                        <div class="relative">
                                            <div class="flex items-center absolute top-3 left-2">
                                                <img src="/assets/constructor/socialTwitter.png" alt="web">
                                            </div>
                                            <input type="text" class="w-[450px] link_url rounded-md ring-black/30 link_social" placeholder="Twitter">
                                            <div class="absolute top-1 left_del left-[415px] h-[34px] w-[2px] bg-black/30"></div>
                                            <svg fill="currentColor" id="delTwit1" class="w-6 h-6 absolute top-2 text-black/50 left_delSvg left-[420px] hover:text-black/30 cursor-pointer" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M17,8 C17.5522847,8 18,8.44771525 18,9 L18,19 C18,20.6568542 16.6568542,22 15,22 L9,22 C7.34314575,22 6,20.6568542 6,19 L6,9 C6,8.44771525 6.44771525,8 7,8 L17,8 Z M16,10 L8,10 L8,19 C8,19.5522847 8.44771525,20 9,20 L15,20 C15.5522847,20 16,19.5522847 16,19 L16,10 Z M9,3 C9,2.44771525 9.44771525,2 10,2 L14,2 C14.5522847,2 15,2.44771525 15,3 L15,4 L19,4 C19.5522847,4 20,4.44771525 20,5 C20,5.55228475 19.5522847,6 19,6 L5,6 C4.44771525,6 4,5.55228475 4,5 C4,4.44771525 4.44771525,4 5,4 L9,4 L9,3 Z"/>
                                            </svg>
                                        </div>
                                        <span class="text-sm text-[#0066CC] hover:text-[#993300] cursor-pointer" id="moreTwit">+ еще Twitter</span>
                                    </div>
                                    <div class="relative mt-4 hidden" id="twit2">
                                        <div class="flex items-center absolute top-3 left-2">
                                            <img src="/assets/constructor/socialTwitter.png" alt="web">
                                        </div>
                                        <input type="text" class="w-[450px] link_url rounded-md ring-black/30 link_social" placeholder="Twitter">
                                        <div class="absolute top-1 left_del left-[415px] h-[34px] w-[2px] bg-black/30"></div>
                                        <svg fill="currentColor" id="delTwit2" class="w-6 h-6 absolute top-2 text-black/50 left_delSvg left-[420px] hover:text-black/30 cursor-pointer" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M17,8 C17.5522847,8 18,8.44771525 18,9 L18,19 C18,20.6568542 16.6568542,22 15,22 L9,22 C7.34314575,22 6,20.6568542 6,19 L6,9 C6,8.44771525 6.44771525,8 7,8 L17,8 Z M16,10 L8,10 L8,19 C8,19.5522847 8.44771525,20 9,20 L15,20 C15.5522847,20 16,19.5522847 16,19 L16,10 Z M9,3 C9,2.44771525 9.44771525,2 10,2 L14,2 C14.5522847,2 15,2.44771525 15,3 L15,4 L19,4 C19.5522847,4 20,4.44771525 20,5 C20,5.55228475 19.5522847,6 19,6 L5,6 C4.44771525,6 4,5.55228475 4,5 C4,4.44771525 4.44771525,4 5,4 L9,4 L9,3 Z"/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="hidden" id="tumbDiv">
                                    <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4 mt-4">
                                        <div class="relative">
                                            <div class="flex items-center absolute top-3 left-2">
                                                <img src="/assets/constructor/socialThumb.png" alt="web">
                                            </div>
                                            <input type="text" class="w-[450px] link_url rounded-md ring-black/30 link_social" placeholder="Tumblr">
                                            <div class="absolute top-1 left_del left-[415px] h-[34px] w-[2px] bg-black/30"></div>
                                            <svg fill="currentColor" id="delTumb1" class="w-6 h-6 absolute top-2 text-black/50 left_delSvg left-[420px] hover:text-black/30 cursor-pointer" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M17,8 C17.5522847,8 18,8.44771525 18,9 L18,19 C18,20.6568542 16.6568542,22 15,22 L9,22 C7.34314575,22 6,20.6568542 6,19 L6,9 C6,8.44771525 6.44771525,8 7,8 L17,8 Z M16,10 L8,10 L8,19 C8,19.5522847 8.44771525,20 9,20 L15,20 C15.5522847,20 16,19.5522847 16,19 L16,10 Z M9,3 C9,2.44771525 9.44771525,2 10,2 L14,2 C14.5522847,2 15,2.44771525 15,3 L15,4 L19,4 C19.5522847,4 20,4.44771525 20,5 C20,5.55228475 19.5522847,6 19,6 L5,6 C4.44771525,6 4,5.55228475 4,5 C4,4.44771525 4.44771525,4 5,4 L9,4 L9,3 Z"/>
                                            </svg>
                                        </div>
                                        <span class="text-sm text-[#0066CC] hover:text-[#993300] cursor-pointer" id="moreTumb">+ еще Tumblr</span>
                                    </div>
                                    <div class="relative mt-4 hidden" id="tumb2">
                                        <div class="flex items-center absolute top-3 left-2">
                                            <img src="/assets/constructor/socialThumb.png" alt="web">
                                        </div>
                                        <input type="text" class="w-[450px] link_url rounded-md ring-black/30 link_social" placeholder="Tumblr">
                                        <div class="absolute top-1 left_del left-[415px] h-[34px] w-[2px] bg-black/30"></div>
                                        <svg fill="currentColor" id="delTumb2" class="w-6 h-6 absolute top-2 text-black/50 left_delSvg left-[420px] hover:text-black/30 cursor-pointer" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M17,8 C17.5522847,8 18,8.44771525 18,9 L18,19 C18,20.6568542 16.6568542,22 15,22 L9,22 C7.34314575,22 6,20.6568542 6,19 L6,9 C6,8.44771525 6.44771525,8 7,8 L17,8 Z M16,10 L8,10 L8,19 C8,19.5522847 8.44771525,20 9,20 L15,20 C15.5522847,20 16,19.5522847 16,19 L16,10 Z M9,3 C9,2.44771525 9.44771525,2 10,2 L14,2 C14.5522847,2 15,2.44771525 15,3 L15,4 L19,4 C19.5522847,4 20,4.44771525 20,5 C20,5.55228475 19.5522847,6 19,6 L5,6 C4.44771525,6 4,5.55228475 4,5 C4,4.44771525 4.44771525,4 5,4 L9,4 L9,3 Z"/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="hidden" id="pinDiv">
                                    <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4 mt-4">
                                        <div class="relative">
                                            <div class="flex items-center absolute top-3 left-2">
                                                <img src="/assets/constructor/socialPin.png" alt="web">
                                            </div>
                                            <input type="text" class="w-[450px] link_url rounded-md ring-black/30 link_social" placeholder="Pinterest">
                                            <div class="absolute top-1 left_del left-[415px] h-[34px] w-[2px] bg-black/30"></div>
                                            <svg fill="currentColor" id="delPin1" class="w-6 h-6 absolute top-2 text-black/50 left_delSvg left-[420px] hover:text-black/30 cursor-pointer" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M17,8 C17.5522847,8 18,8.44771525 18,9 L18,19 C18,20.6568542 16.6568542,22 15,22 L9,22 C7.34314575,22 6,20.6568542 6,19 L6,9 C6,8.44771525 6.44771525,8 7,8 L17,8 Z M16,10 L8,10 L8,19 C8,19.5522847 8.44771525,20 9,20 L15,20 C15.5522847,20 16,19.5522847 16,19 L16,10 Z M9,3 C9,2.44771525 9.44771525,2 10,2 L14,2 C14.5522847,2 15,2.44771525 15,3 L15,4 L19,4 C19.5522847,4 20,4.44771525 20,5 C20,5.55228475 19.5522847,6 19,6 L5,6 C4.44771525,6 4,5.55228475 4,5 C4,4.44771525 4.44771525,4 5,4 L9,4 L9,3 Z"/>
                                            </svg>
                                        </div>
                                        <span class="text-sm text-[#0066CC] hover:text-[#993300] cursor-pointer" id="morePin">+ еще Pinterest</span>
                                    </div>
                                    <div class="relative mt-4 hidden" id="pin2">
                                        <div class="flex items-center absolute top-3 left-2">
                                            <img src="/assets/constructor/socialPin.png" alt="web">
                                        </div>
                                        <input type="text" class="w-[450px] link_url rounded-md ring-black/30 link_social" placeholder="Pinterest">
                                        <div class="absolute top-1 left_del left-[415px] h-[34px] w-[2px] bg-black/30"></div>
                                        <svg fill="currentColor" id="delPin2" class="w-6 h-6 absolute top-2 text-black/50 left_delSvg left-[420px] hover:text-black/30 cursor-pointer" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M17,8 C17.5522847,8 18,8.44771525 18,9 L18,19 C18,20.6568542 16.6568542,22 15,22 L9,22 C7.34314575,22 6,20.6568542 6,19 L6,9 C6,8.44771525 6.44771525,8 7,8 L17,8 Z M16,10 L8,10 L8,19 C8,19.5522847 8.44771525,20 9,20 L15,20 C15.5522847,20 16,19.5522847 16,19 L16,10 Z M9,3 C9,2.44771525 9.44771525,2 10,2 L14,2 C14.5522847,2 15,2.44771525 15,3 L15,4 L19,4 C19.5522847,4 20,4.44771525 20,5 C20,5.55228475 19.5522847,6 19,6 L5,6 C4.44771525,6 4,5.55228475 4,5 C4,4.44771525 4.44771525,4 5,4 L9,4 L9,3 Z"/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="hidden" id="foursDiv">
                                    <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4 mt-4">
                                        <div class="relative">
                                            <div class="flex items-center absolute top-3 left-2">
                                                <img src="/assets/constructor/socialFours.png" alt="web">
                                            </div>
                                            <input type="text" class="w-[450px] link_url rounded-md ring-black/30 link_social" placeholder="Foursquare">
                                            <div class="absolute top-1 left_del left-[415px] h-[34px] w-[2px] bg-black/30"></div>
                                            <svg fill="currentColor" id="delFours1" class="w-6 h-6 absolute top-2 text-black/50 left_delSvg left-[420px] hover:text-black/30 cursor-pointer" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M17,8 C17.5522847,8 18,8.44771525 18,9 L18,19 C18,20.6568542 16.6568542,22 15,22 L9,22 C7.34314575,22 6,20.6568542 6,19 L6,9 C6,8.44771525 6.44771525,8 7,8 L17,8 Z M16,10 L8,10 L8,19 C8,19.5522847 8.44771525,20 9,20 L15,20 C15.5522847,20 16,19.5522847 16,19 L16,10 Z M9,3 C9,2.44771525 9.44771525,2 10,2 L14,2 C14.5522847,2 15,2.44771525 15,3 L15,4 L19,4 C19.5522847,4 20,4.44771525 20,5 C20,5.55228475 19.5522847,6 19,6 L5,6 C4.44771525,6 4,5.55228475 4,5 C4,4.44771525 4.44771525,4 5,4 L9,4 L9,3 Z"/>
                                            </svg>
                                        </div>
                                        <span class="text-sm text-[#0066CC] hover:text-[#993300] cursor-pointer" id="moreFours">+ еще Foursquare</span>
                                    </div>
                                    <div class="relative mt-4 hidden" id="fours2">
                                        <div class="flex items-center absolute top-3 left-2">
                                            <img src="/assets/constructor/socialFours.png" alt="web">
                                        </div>
                                        <input type="text" class="w-[450px] link_url rounded-md ring-black/30 link_social" placeholder="Foursquare">
                                        <div class="absolute top-1 left_del left-[415px] h-[34px] w-[2px] bg-black/30"></div>
                                        <svg fill="currentColor" id="delFours2" class="w-6 h-6 absolute top-2 text-black/50 left_delSvg left-[420px] hover:text-black/30 cursor-pointer" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M17,8 C17.5522847,8 18,8.44771525 18,9 L18,19 C18,20.6568542 16.6568542,22 15,22 L9,22 C7.34314575,22 6,20.6568542 6,19 L6,9 C6,8.44771525 6.44771525,8 7,8 L17,8 Z M16,10 L8,10 L8,19 C8,19.5522847 8.44771525,20 9,20 L15,20 C15.5522847,20 16,19.5522847 16,19 L16,10 Z M9,3 C9,2.44771525 9.44771525,2 10,2 L14,2 C14.5522847,2 15,2.44771525 15,3 L15,4 L19,4 C19.5522847,4 20,4.44771525 20,5 C20,5.55228475 19.5522847,6 19,6 L5,6 C4.44771525,6 4,5.55228475 4,5 C4,4.44771525 4.44771525,4 5,4 L9,4 L9,3 Z"/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="hidden" id="telDiv">
                                    <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4 mt-4">
                                        <div class="relative">
                                            <div class="flex items-center absolute top-3 left-2">
                                                <img src="/assets/constructor/socialTelegram.png" alt="web">
                                            </div>
                                            <input type="text" class="w-[450px] link_url rounded-md ring-black/30 link_social" placeholder="Telegram">
                                            <div class="absolute top-1 left_del left-[415px] h-[34px] w-[2px] bg-black/30"></div>
                                            <svg fill="currentColor" id="delTel1" class="w-6 h-6 absolute top-2 text-black/50 left_delSvg left-[420px] hover:text-black/30 cursor-pointer" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M17,8 C17.5522847,8 18,8.44771525 18,9 L18,19 C18,20.6568542 16.6568542,22 15,22 L9,22 C7.34314575,22 6,20.6568542 6,19 L6,9 C6,8.44771525 6.44771525,8 7,8 L17,8 Z M16,10 L8,10 L8,19 C8,19.5522847 8.44771525,20 9,20 L15,20 C15.5522847,20 16,19.5522847 16,19 L16,10 Z M9,3 C9,2.44771525 9.44771525,2 10,2 L14,2 C14.5522847,2 15,2.44771525 15,3 L15,4 L19,4 C19.5522847,4 20,4.44771525 20,5 C20,5.55228475 19.5522847,6 19,6 L5,6 C4.44771525,6 4,5.55228475 4,5 C4,4.44771525 4.44771525,4 5,4 L9,4 L9,3 Z"/>
                                            </svg>
                                        </div>
                                        <span class="text-sm text-[#0066CC] hover:text-[#993300] cursor-pointer" id="moreTel">+ еще Telegram</span>
                                    </div>
                                    <div class="relative mt-4 hidden" id="tel2">
                                        <div class="flex items-center absolute top-3 left-2">
                                            <img src="/assets/constructor/socialTelegram.png" alt="web">
                                        </div>
                                        <input type="text" class="w-[450px] link_url rounded-md ring-black/30 link_social" placeholder="Telegram">
                                        <div class="absolute top-1 left_del left-[415px] h-[34px] w-[2px] bg-black/30"></div>
                                        <svg fill="currentColor" id="delTel2" class="w-6 h-6 absolute top-2 text-black/50 left_delSvg left-[420px] hover:text-black/30 cursor-pointer" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M17,8 C17.5522847,8 18,8.44771525 18,9 L18,19 C18,20.6568542 16.6568542,22 15,22 L9,22 C7.34314575,22 6,20.6568542 6,19 L6,9 C6,8.44771525 6.44771525,8 7,8 L17,8 Z M16,10 L8,10 L8,19 C8,19.5522847 8.44771525,20 9,20 L15,20 C15.5522847,20 16,19.5522847 16,19 L16,10 Z M9,3 C9,2.44771525 9.44771525,2 10,2 L14,2 C14.5522847,2 15,2.44771525 15,3 L15,4 L19,4 C19.5522847,4 20,4.44771525 20,5 C20,5.55228475 19.5522847,6 19,6 L5,6 C4.44771525,6 4,5.55228475 4,5 C4,4.44771525 4.44771525,4 5,4 L9,4 L9,3 Z"/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="hidden" id="whaDiv">
                                    <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4 mt-4">
                                        <div class="relative">
                                            <div class="flex items-center absolute top-3 left-2">
                                                <img src="/assets/constructor/socialWha.png" alt="web">
                                            </div>
                                            <input type="text" class="w-[450px] link_url rounded-md ring-black/30 link_social" placeholder="WhatsApp">
                                            <div class="absolute top-1 left_del left-[415px] h-[34px] w-[2px] bg-black/30"></div>
                                            <svg fill="currentColor" id="delWha1" class="w-6 h-6 absolute top-2 text-black/50 left_delSvg left-[420px] hover:text-black/30 cursor-pointer" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M17,8 C17.5522847,8 18,8.44771525 18,9 L18,19 C18,20.6568542 16.6568542,22 15,22 L9,22 C7.34314575,22 6,20.6568542 6,19 L6,9 C6,8.44771525 6.44771525,8 7,8 L17,8 Z M16,10 L8,10 L8,19 C8,19.5522847 8.44771525,20 9,20 L15,20 C15.5522847,20 16,19.5522847 16,19 L16,10 Z M9,3 C9,2.44771525 9.44771525,2 10,2 L14,2 C14.5522847,2 15,2.44771525 15,3 L15,4 L19,4 C19.5522847,4 20,4.44771525 20,5 C20,5.55228475 19.5522847,6 19,6 L5,6 C4.44771525,6 4,5.55228475 4,5 C4,4.44771525 4.44771525,4 5,4 L9,4 L9,3 Z"/>
                                            </svg>
                                        </div>
                                        <span class="text-sm text-[#0066CC] hover:text-[#993300] cursor-pointer" id="moreWha">+ еще WhatsApp</span>
                                    </div>
                                    <div class="relative mt-4 hidden" id="wha2">
                                        <div class="flex items-center absolute top-3 left-2">
                                            <img src="/assets/constructor/socialWha.png" alt="web">
                                        </div>
                                        <input type="text" class="w-[450px] link_url rounded-md ring-black/30 link_social" placeholder="WhatsApp">
                                        <div class="absolute top-1 left_del left-[415px] h-[34px] w-[2px] bg-black/30"></div>
                                        <svg fill="currentColor" id="delWha2" class="w-6 h-6 absolute top-2 text-black/50 left_delSvg left-[420px] hover:text-black/30 cursor-pointer" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M17,8 C17.5522847,8 18,8.44771525 18,9 L18,19 C18,20.6568542 16.6568542,22 15,22 L9,22 C7.34314575,22 6,20.6568542 6,19 L6,9 C6,8.44771525 6.44771525,8 7,8 L17,8 Z M16,10 L8,10 L8,19 C8,19.5522847 8.44771525,20 9,20 L15,20 C15.5522847,20 16,19.5522847 16,19 L16,10 Z M9,3 C9,2.44771525 9.44771525,2 10,2 L14,2 C14.5522847,2 15,2.44771525 15,3 L15,4 L19,4 C19.5522847,4 20,4.44771525 20,5 C20,5.55228475 19.5522847,6 19,6 L5,6 C4.44771525,6 4,5.55228475 4,5 C4,4.44771525 4.44771525,4 5,4 L9,4 L9,3 Z"/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="hidden" id="vibDiv">
                                    <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4 mt-4">
                                        <div class="relative">
                                            <div class="flex items-center absolute top-3 left-2">
                                                <img src="/assets/constructor/socialViber.png" alt="web">
                                            </div>
                                            <input type="text" class="w-[450px] link_url rounded-md ring-black/30 link_social" placeholder="Viber">
                                            <div class="absolute top-1 left_del left-[415px] h-[34px] w-[2px] bg-black/30"></div>
                                            <svg fill="currentColor" id="delVib1" class="w-6 h-6 absolute top-2 text-black/50 left_delSvg left-[420px] hover:text-black/30 cursor-pointer" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M17,8 C17.5522847,8 18,8.44771525 18,9 L18,19 C18,20.6568542 16.6568542,22 15,22 L9,22 C7.34314575,22 6,20.6568542 6,19 L6,9 C6,8.44771525 6.44771525,8 7,8 L17,8 Z M16,10 L8,10 L8,19 C8,19.5522847 8.44771525,20 9,20 L15,20 C15.5522847,20 16,19.5522847 16,19 L16,10 Z M9,3 C9,2.44771525 9.44771525,2 10,2 L14,2 C14.5522847,2 15,2.44771525 15,3 L15,4 L19,4 C19.5522847,4 20,4.44771525 20,5 C20,5.55228475 19.5522847,6 19,6 L5,6 C4.44771525,6 4,5.55228475 4,5 C4,4.44771525 4.44771525,4 5,4 L9,4 L9,3 Z"/>
                                            </svg>
                                        </div>
                                        <span class="text-sm text-[#0066CC] hover:text-[#993300] cursor-pointer" id="moreVib">+ еще Viber</span>
                                    </div>
                                    <div class="relative mt-4 hidden" id="vib2">
                                        <div class="flex items-center absolute top-3 left-2">
                                            <img src="/assets/constructor/socialViber.png" alt="web">
                                        </div>
                                        <input type="text" class="w-[450px] link_url rounded-md ring-black/30 link_social" placeholder="Viber">
                                        <div class="absolute top-1 left_del left-[415px] h-[34px] w-[2px] bg-black/30"></div>
                                        <svg fill="currentColor" id="delVib2" class="w-6 h-6 absolute top-2 text-black/50 left_delSvg left-[420px] hover:text-black/30 cursor-pointer" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M17,8 C17.5522847,8 18,8.44771525 18,9 L18,19 C18,20.6568542 16.6568542,22 15,22 L9,22 C7.34314575,22 6,20.6568542 6,19 L6,9 C6,8.44771525 6.44771525,8 7,8 L17,8 Z M16,10 L8,10 L8,19 C8,19.5522847 8.44771525,20 9,20 L15,20 C15.5522847,20 16,19.5522847 16,19 L16,10 Z M9,3 C9,2.44771525 9.44771525,2 10,2 L14,2 C14.5522847,2 15,2.44771525 15,3 L15,4 L19,4 C19.5522847,4 20,4.44771525 20,5 C20,5.55228475 19.5522847,6 19,6 L5,6 C4.44771525,6 4,5.55228475 4,5 C4,4.44771525 4.44771525,4 5,4 L9,4 L9,3 Z"/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="hidden" id="skyDiv">
                                    <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4 mt-4">
                                        <div class="relative">
                                            <div class="flex items-center absolute top-3 left-2">
                                                <img src="/assets/constructor/socialSkype.png" alt="web">
                                            </div>
                                            <input type="text" class="w-[450px] link_url rounded-md ring-black/30 link_social" placeholder="Skype">
                                            <div class="absolute top-1 left_del left-[415px] h-[34px] w-[2px] bg-black/30"></div>
                                            <svg fill="currentColor" id="delSky1" class="w-6 h-6 absolute top-2 text-black/50 left_delSvg left-[420px] hover:text-black/30 cursor-pointer" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M17,8 C17.5522847,8 18,8.44771525 18,9 L18,19 C18,20.6568542 16.6568542,22 15,22 L9,22 C7.34314575,22 6,20.6568542 6,19 L6,9 C6,8.44771525 6.44771525,8 7,8 L17,8 Z M16,10 L8,10 L8,19 C8,19.5522847 8.44771525,20 9,20 L15,20 C15.5522847,20 16,19.5522847 16,19 L16,10 Z M9,3 C9,2.44771525 9.44771525,2 10,2 L14,2 C14.5522847,2 15,2.44771525 15,3 L15,4 L19,4 C19.5522847,4 20,4.44771525 20,5 C20,5.55228475 19.5522847,6 19,6 L5,6 C4.44771525,6 4,5.55228475 4,5 C4,4.44771525 4.44771525,4 5,4 L9,4 L9,3 Z"/>
                                            </svg>
                                        </div>
                                        <span class="text-sm text-[#0066CC] hover:text-[#993300] cursor-pointer" id="moreSky">+ еще Skype</span>
                                    </div>
                                    <div class="relative mt-4 hidden" id="sky2">
                                        <div class="flex items-center absolute top-3 left-2">
                                            <img src="/assets/constructor/socialSkype.png" alt="web">
                                        </div>
                                        <input type="text" class="w-[450px] link_url rounded-md ring-black/30 link_social" placeholder="Skype">
                                        <div class="absolute top-1 left_del left-[415px] h-[34px] w-[2px] bg-black/30"></div>
                                        <svg fill="currentColor" id="delSky2" class="w-6 h-6 absolute top-2 text-black/50 left_delSvg left-[420px] hover:text-black/30 cursor-pointer" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M17,8 C17.5522847,8 18,8.44771525 18,9 L18,19 C18,20.6568542 16.6568542,22 15,22 L9,22 C7.34314575,22 6,20.6568542 6,19 L6,9 C6,8.44771525 6.44771525,8 7,8 L17,8 Z M16,10 L8,10 L8,19 C8,19.5522847 8.44771525,20 9,20 L15,20 C15.5522847,20 16,19.5522847 16,19 L16,10 Z M9,3 C9,2.44771525 9.44771525,2 10,2 L14,2 C14.5522847,2 15,2.44771525 15,3 L15,4 L19,4 C19.5522847,4 20,4.44771525 20,5 C20,5.55228475 19.5522847,6 19,6 L5,6 C4.44771525,6 4,5.55228475 4,5 C4,4.44771525 4.44771525,4 5,4 L9,4 L9,3 Z"/>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex bg-white p-4 md:p-8 mt-8 rounded-2xl flex-col" id="desyatyi">
                        <h3 class="font-bold text-base">Укажите в блоке: график работы, адрес и телефоны</h3>
                        <p class="text-black/50 all_text">для одной акции можно заполнить не более 4-х блоков</p>
                        <div class="bg-[#e9eef1] h-full w-full rounded-lg mt-5">
                            <div class="flex justify-between p-6">
                                <div class="flex items-center gap-1">
                                    <svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                         class="w-5 h-6 text-[#abacab]" viewBox="0 0 64 64" enable-background="new 0 0 64 64" xml:space="preserve">
                                    <path fill="currentColor" d="M32,0C18.746,0,8,10.746,8,24c0,5.219,1.711,10.008,4.555,13.93c0.051,0.094,0.059,0.199,0.117,0.289l16,24
	                                    C29.414,63.332,30.664,64,32,64s2.586-0.668,3.328-1.781l16-24c0.059-0.09,0.066-0.195,0.117-0.289C54.289,34.008,56,29.219,56,24
	                                    C56,10.746,45.254,0,32,0z M32,32c-4.418,0-8-3.582-8-8s3.582-8,8-8s8,3.582,8,8S36.418,32,32,32z"/>
                                    </svg>
                                    <span class="font-bold text-base">Адрес 1</span>
                                </div>
                            </div>
                            <div class="w-full h-[1px] bg-black/10"></div>
                            <div class="flex flex-wrap flex-col sm:flex-row items-center w-full p-6">
                                <div class="flex flex-col w-full sm:w-1/2 p-3" >
                                    <label for="address" class="mb-2 font-bold text-sm">Адрес</label>
                                    <input type="text" name="address" class="rounded-md border-none" placeholder="Москва, проспект Мира 82 корпус 1">
                                </div>
                                <div class="flex flex-col w-full sm:w-1/2 p-3" >
                                    <label for="time" class="mb-2 font-bold text-sm">Гафик работы:</label>
                                    <input type="text" name="time" class="rounded-md border-none" placeholder="пн-сб:с 10.00 до 20.00 вс с 10.00 до 16.00">
                                </div>
                                <div class="flex flex-col w-full sm:w-1/2 p-3" >
                                    <label for="phone" class="mb-2 font-bold text-sm">Телефон</label>
                                    <input type="text" name="phone" class="rounded-md border-none " placeholder="+7 (000) 000-00-00">
                                </div>
                                <span id="showTel1" class="mt-6 ml-6 font-bold text-sm text-[#5fa0de] cursor-pointer hover:border-b-2 hover:border-dashed hover:border-[#5fa0de]">+ еще телефон</span>
                                <div class="flex-col w-full sm:w-1/2 p-3 relative hidden" id="phone1">
                                    <label for="phone" class="mb-2 font-bold text-sm">Телефон</label>
                                    <input type="text" name="phone" class="rounded-md border-none pr-[40px]" placeholder="+7 (000) 000-00-00">
                                    <div class="h-[29px] w-[1px] bg-[#c6c7c6] absolute bottom-4 right-[50px]"></div>
                                    <svg class="text-[#ababab] w-6 h-6 cursor-pointer hover:opacity-80 absolute bottom-5 right-[20px]" id="delPhon1" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <g id="页面-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <g id="System" transform="translate(-576.000000, -192.000000)" fill-rule="nonzero">
                                                <g id="delete_2_line" transform="translate(576.000000, 192.000000)">
                                                    <path d="M24,0 L24,24 L0,24 L0,0 L24,0 Z M12.5934901,23.257841 L12.5819402,23.2595131 L12.5108777,23.2950439 L12.4918791,23.2987469 L12.4918791,23.2987469 L12.4767152,23.2950439 L12.4056548,23.2595131 C12.3958229,23.2563662 12.3870493,23.2590235 12.3821421,23.2649074 L12.3780323,23.275831 L12.360941,23.7031097 L12.3658947,23.7234994 L12.3769048,23.7357139 L12.4804777,23.8096931 L12.4953491,23.8136134 L12.4953491,23.8136134 L12.5071152,23.8096931 L12.6106902,23.7357139 L12.6232938,23.7196733 L12.6232938,23.7196733 L12.6266527,23.7031097 L12.609561,23.275831 C12.6075724,23.2657013 12.6010112,23.2592993 12.5934901,23.257841 L12.5934901,23.257841 Z M12.8583906,23.1452862 L12.8445485,23.1473072 L12.6598443,23.2396597 L12.6498822,23.2499052 L12.6498822,23.2499052 L12.6471943,23.2611114 L12.6650943,23.6906389 L12.6699349,23.7034178 L12.6699349,23.7034178 L12.678386,23.7104931 L12.8793402,23.8032389 C12.8914285,23.8068999 12.9022333,23.8029875 12.9078286,23.7952264 L12.9118235,23.7811639 L12.8776777,23.1665331 C12.8752882,23.1545897 12.8674102,23.1470016 12.8583906,23.1452862 L12.8583906,23.1452862 Z M12.1430473,23.1473072 C12.1332178,23.1423925 12.1221763,23.1452606 12.1156365,23.1525954 L12.1099173,23.1665331 L12.0757714,23.7811639 C12.0751323,23.7926639 12.0828099,23.8018602 12.0926481,23.8045676 L12.108256,23.8032389 L12.3092106,23.7104931 L12.3186497,23.7024347 L12.3186497,23.7024347 L12.3225043,23.6906389 L12.340401,23.2611114 L12.337245,23.2485176 L12.337245,23.2485176 L12.3277531,23.2396597 L12.1430473,23.1473072 Z" id="MingCute" fill-rule="nonzero">
                                                    </path>
                                                    <path d="M14.2792,2 C15.1401,2 15.9044,2.55086 16.1766,3.36754 L16.7208,5 L20,5 C20.5523,5 21,5.44772 21,6 C21,6.55227 20.5523,6.99998 20,7 L19.9975,7.07125 L19.9975,7.07125 L19.1301,19.2137 C19.018,20.7837 17.7117,22 16.1378,22 L7.86224,22 C6.28832,22 4.982,20.7837 4.86986,19.2137 L4.00254,7.07125 C4.00083,7.04735 3.99998,7.02359 3.99996,7 C3.44769,6.99998 3,6.55227 3,6 C3,5.44772 3.44772,5 4,5 L7.27924,5 L7.82339,3.36754 C8.09562,2.55086 8.8599,2 9.72076,2 L14.2792,2 Z M17.9975,7 L6.00255,7 L6.86478,19.0712 C6.90216,19.5946 7.3376,20 7.86224,20 L16.1378,20 C16.6624,20 17.0978,19.5946 17.1352,19.0712 L17.9975,7 Z M10,10 C10.51285,10 10.9355092,10.386027 10.9932725,10.8833761 L11,11 L11,16 C11,16.5523 10.5523,17 10,17 C9.48715929,17 9.06449214,16.613973 9.00672766,16.1166239 L9,16 L9,11 C9,10.4477 9.44771,10 10,10 Z M14,10 C14.5523,10 15,10.4477 15,11 L15,16 C15,16.5523 14.5523,17 14,17 C13.4477,17 13,16.5523 13,16 L13,11 C13,10.4477 13.4477,10 14,10 Z M14.2792,4 L9.72076,4 L9.38743,5 L14.6126,5 L14.2792,4 Z" id="形状" fill="currentColor">
                                                    </path>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="bg-[#e9eef1] h-full w-full rounded-lg mt-5 hidden" id="organization2">
                            <div class="flex justify-between p-6">
                                <div class="flex items-center gap-1">
                                    <svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                         class="w-5 h-6 text-[#abacab]" viewBox="0 0 64 64" enable-background="new 0 0 64 64" xml:space="preserve">
                                    <path fill="currentColor" d="M32,0C18.746,0,8,10.746,8,24c0,5.219,1.711,10.008,4.555,13.93c0.051,0.094,0.059,0.199,0.117,0.289l16,24
	                                    C29.414,63.332,30.664,64,32,64s2.586-0.668,3.328-1.781l16-24c0.059-0.09,0.066-0.195,0.117-0.289C54.289,34.008,56,29.219,56,24
	                                    C56,10.746,45.254,0,32,0z M32,32c-4.418,0-8-3.582-8-8s3.582-8,8-8s8,3.582,8,8S36.418,32,32,32z"/>
                                    </svg>
                                    <span class="font-bold text-base">Адрес 2</span>
                                </div>
                                <svg class="text-[#ababab] w-6 h-6 cursor-pointer hover:opacity-80" id="delOrg2" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <g id="页面-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <g id="System" transform="translate(-576.000000, -192.000000)" fill-rule="nonzero">
                                            <g id="delete_2_line" transform="translate(576.000000, 192.000000)">
                                                <path d="M24,0 L24,24 L0,24 L0,0 L24,0 Z M12.5934901,23.257841 L12.5819402,23.2595131 L12.5108777,23.2950439 L12.4918791,23.2987469 L12.4918791,23.2987469 L12.4767152,23.2950439 L12.4056548,23.2595131 C12.3958229,23.2563662 12.3870493,23.2590235 12.3821421,23.2649074 L12.3780323,23.275831 L12.360941,23.7031097 L12.3658947,23.7234994 L12.3769048,23.7357139 L12.4804777,23.8096931 L12.4953491,23.8136134 L12.4953491,23.8136134 L12.5071152,23.8096931 L12.6106902,23.7357139 L12.6232938,23.7196733 L12.6232938,23.7196733 L12.6266527,23.7031097 L12.609561,23.275831 C12.6075724,23.2657013 12.6010112,23.2592993 12.5934901,23.257841 L12.5934901,23.257841 Z M12.8583906,23.1452862 L12.8445485,23.1473072 L12.6598443,23.2396597 L12.6498822,23.2499052 L12.6498822,23.2499052 L12.6471943,23.2611114 L12.6650943,23.6906389 L12.6699349,23.7034178 L12.6699349,23.7034178 L12.678386,23.7104931 L12.8793402,23.8032389 C12.8914285,23.8068999 12.9022333,23.8029875 12.9078286,23.7952264 L12.9118235,23.7811639 L12.8776777,23.1665331 C12.8752882,23.1545897 12.8674102,23.1470016 12.8583906,23.1452862 L12.8583906,23.1452862 Z M12.1430473,23.1473072 C12.1332178,23.1423925 12.1221763,23.1452606 12.1156365,23.1525954 L12.1099173,23.1665331 L12.0757714,23.7811639 C12.0751323,23.7926639 12.0828099,23.8018602 12.0926481,23.8045676 L12.108256,23.8032389 L12.3092106,23.7104931 L12.3186497,23.7024347 L12.3186497,23.7024347 L12.3225043,23.6906389 L12.340401,23.2611114 L12.337245,23.2485176 L12.337245,23.2485176 L12.3277531,23.2396597 L12.1430473,23.1473072 Z" id="MingCute" fill-rule="nonzero">
                                                </path>
                                                <path d="M14.2792,2 C15.1401,2 15.9044,2.55086 16.1766,3.36754 L16.7208,5 L20,5 C20.5523,5 21,5.44772 21,6 C21,6.55227 20.5523,6.99998 20,7 L19.9975,7.07125 L19.9975,7.07125 L19.1301,19.2137 C19.018,20.7837 17.7117,22 16.1378,22 L7.86224,22 C6.28832,22 4.982,20.7837 4.86986,19.2137 L4.00254,7.07125 C4.00083,7.04735 3.99998,7.02359 3.99996,7 C3.44769,6.99998 3,6.55227 3,6 C3,5.44772 3.44772,5 4,5 L7.27924,5 L7.82339,3.36754 C8.09562,2.55086 8.8599,2 9.72076,2 L14.2792,2 Z M17.9975,7 L6.00255,7 L6.86478,19.0712 C6.90216,19.5946 7.3376,20 7.86224,20 L16.1378,20 C16.6624,20 17.0978,19.5946 17.1352,19.0712 L17.9975,7 Z M10,10 C10.51285,10 10.9355092,10.386027 10.9932725,10.8833761 L11,11 L11,16 C11,16.5523 10.5523,17 10,17 C9.48715929,17 9.06449214,16.613973 9.00672766,16.1166239 L9,16 L9,11 C9,10.4477 9.44771,10 10,10 Z M14,10 C14.5523,10 15,10.4477 15,11 L15,16 C15,16.5523 14.5523,17 14,17 C13.4477,17 13,16.5523 13,16 L13,11 C13,10.4477 13.4477,10 14,10 Z M14.2792,4 L9.72076,4 L9.38743,5 L14.6126,5 L14.2792,4 Z" id="形状" fill="currentColor">
                                                </path>
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                            </div>
                            <div class="w-full h-[1px] bg-black/10"></div>
                            <div class="flex flex-wrap flex-col sm:flex-row items-center w-full p-6">
                                <div class="flex flex-col w-full sm:w-1/2 p-3" >
                                    <label for="address" class="mb-2 font-bold text-sm">Адрес</label>
                                    <input type="text" name="address" class="rounded-md border-none" placeholder="Москва, проспект Мира 82 корпус 1">
                                </div>
                                <div class="flex flex-col w-full sm:w-1/2 p-3" >
                                    <label for="time" class="mb-2 font-bold text-sm">Гафик работы:</label>
                                    <input type="text" name="time" class="rounded-md border-none" placeholder="пн-сб:с 10.00 до 20.00 вс с 10.00 до 16.00">
                                </div>
                                <div class="flex flex-col w-full sm:w-1/2 p-3" >
                                    <label for="phone" class="mb-2 font-bold text-sm">Телефон</label>
                                    <input type="text" name="phone" class="rounded-md border-none" placeholder="+7 (000) 000-00-00">
                                </div>
                                <span id="showTel2" class="mt-6 ml-6 font-bold text-sm text-[#5fa0de] cursor-pointer hover:border-b-2 hover:border-dashed hover:border-[#5fa0de]">+ еще телефон</span>
                                <div class="flex-col w-full sm:w-1/2 p-3 hidden relative" id="phone2">
                                    <label for="phone" class="mb-2 font-bold text-sm">Телефон</label>
                                    <input type="text" name="phone" class="rounded-md border-none" placeholder="+7 (000) 000-00-00">
                                    <div class="h-[29px] w-[1px] bg-[#c6c7c6] absolute bottom-4 right-[50px]"></div>
                                    <svg class="text-[#ababab] w-6 h-6 cursor-pointer hover:opacity-80 absolute bottom-5 right-[20px]" id="delPhon2" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <g id="页面-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <g id="System" transform="translate(-576.000000, -192.000000)" fill-rule="nonzero">
                                                <g id="delete_2_line" transform="translate(576.000000, 192.000000)">
                                                    <path d="M24,0 L24,24 L0,24 L0,0 L24,0 Z M12.5934901,23.257841 L12.5819402,23.2595131 L12.5108777,23.2950439 L12.4918791,23.2987469 L12.4918791,23.2987469 L12.4767152,23.2950439 L12.4056548,23.2595131 C12.3958229,23.2563662 12.3870493,23.2590235 12.3821421,23.2649074 L12.3780323,23.275831 L12.360941,23.7031097 L12.3658947,23.7234994 L12.3769048,23.7357139 L12.4804777,23.8096931 L12.4953491,23.8136134 L12.4953491,23.8136134 L12.5071152,23.8096931 L12.6106902,23.7357139 L12.6232938,23.7196733 L12.6232938,23.7196733 L12.6266527,23.7031097 L12.609561,23.275831 C12.6075724,23.2657013 12.6010112,23.2592993 12.5934901,23.257841 L12.5934901,23.257841 Z M12.8583906,23.1452862 L12.8445485,23.1473072 L12.6598443,23.2396597 L12.6498822,23.2499052 L12.6498822,23.2499052 L12.6471943,23.2611114 L12.6650943,23.6906389 L12.6699349,23.7034178 L12.6699349,23.7034178 L12.678386,23.7104931 L12.8793402,23.8032389 C12.8914285,23.8068999 12.9022333,23.8029875 12.9078286,23.7952264 L12.9118235,23.7811639 L12.8776777,23.1665331 C12.8752882,23.1545897 12.8674102,23.1470016 12.8583906,23.1452862 L12.8583906,23.1452862 Z M12.1430473,23.1473072 C12.1332178,23.1423925 12.1221763,23.1452606 12.1156365,23.1525954 L12.1099173,23.1665331 L12.0757714,23.7811639 C12.0751323,23.7926639 12.0828099,23.8018602 12.0926481,23.8045676 L12.108256,23.8032389 L12.3092106,23.7104931 L12.3186497,23.7024347 L12.3186497,23.7024347 L12.3225043,23.6906389 L12.340401,23.2611114 L12.337245,23.2485176 L12.337245,23.2485176 L12.3277531,23.2396597 L12.1430473,23.1473072 Z" id="MingCute" fill-rule="nonzero">
                                                    </path>
                                                    <path d="M14.2792,2 C15.1401,2 15.9044,2.55086 16.1766,3.36754 L16.7208,5 L20,5 C20.5523,5 21,5.44772 21,6 C21,6.55227 20.5523,6.99998 20,7 L19.9975,7.07125 L19.9975,7.07125 L19.1301,19.2137 C19.018,20.7837 17.7117,22 16.1378,22 L7.86224,22 C6.28832,22 4.982,20.7837 4.86986,19.2137 L4.00254,7.07125 C4.00083,7.04735 3.99998,7.02359 3.99996,7 C3.44769,6.99998 3,6.55227 3,6 C3,5.44772 3.44772,5 4,5 L7.27924,5 L7.82339,3.36754 C8.09562,2.55086 8.8599,2 9.72076,2 L14.2792,2 Z M17.9975,7 L6.00255,7 L6.86478,19.0712 C6.90216,19.5946 7.3376,20 7.86224,20 L16.1378,20 C16.6624,20 17.0978,19.5946 17.1352,19.0712 L17.9975,7 Z M10,10 C10.51285,10 10.9355092,10.386027 10.9932725,10.8833761 L11,11 L11,16 C11,16.5523 10.5523,17 10,17 C9.48715929,17 9.06449214,16.613973 9.00672766,16.1166239 L9,16 L9,11 C9,10.4477 9.44771,10 10,10 Z M14,10 C14.5523,10 15,10.4477 15,11 L15,16 C15,16.5523 14.5523,17 14,17 C13.4477,17 13,16.5523 13,16 L13,11 C13,10.4477 13.4477,10 14,10 Z M14.2792,4 L9.72076,4 L9.38743,5 L14.6126,5 L14.2792,4 Z" id="形状" fill="currentColor">
                                                    </path>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="bg-[#e9eef1] h-full w-full rounded-lg mt-5 hidden" id="organization3">
                            <div class="flex justify-between p-6">
                                <div class="flex items-center gap-1">
                                    <svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                         class="w-5 h-6 text-[#abacab]" viewBox="0 0 64 64" enable-background="new 0 0 64 64" xml:space="preserve">
                                    <path fill="currentColor" d="M32,0C18.746,0,8,10.746,8,24c0,5.219,1.711,10.008,4.555,13.93c0.051,0.094,0.059,0.199,0.117,0.289l16,24
	                                    C29.414,63.332,30.664,64,32,64s2.586-0.668,3.328-1.781l16-24c0.059-0.09,0.066-0.195,0.117-0.289C54.289,34.008,56,29.219,56,24
	                                    C56,10.746,45.254,0,32,0z M32,32c-4.418,0-8-3.582-8-8s3.582-8,8-8s8,3.582,8,8S36.418,32,32,32z"/>
                                    </svg>
                                    <span class="font-bold text-base">Адрес 3</span>
                                </div>
                                <svg class="text-[#ababab] w-6 h-6 cursor-pointer hover:opacity-80" id="delOrg3" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <g id="页面-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <g id="System" transform="translate(-576.000000, -192.000000)" fill-rule="nonzero">
                                            <g id="delete_2_line" transform="translate(576.000000, 192.000000)">
                                                <path d="M24,0 L24,24 L0,24 L0,0 L24,0 Z M12.5934901,23.257841 L12.5819402,23.2595131 L12.5108777,23.2950439 L12.4918791,23.2987469 L12.4918791,23.2987469 L12.4767152,23.2950439 L12.4056548,23.2595131 C12.3958229,23.2563662 12.3870493,23.2590235 12.3821421,23.2649074 L12.3780323,23.275831 L12.360941,23.7031097 L12.3658947,23.7234994 L12.3769048,23.7357139 L12.4804777,23.8096931 L12.4953491,23.8136134 L12.4953491,23.8136134 L12.5071152,23.8096931 L12.6106902,23.7357139 L12.6232938,23.7196733 L12.6232938,23.7196733 L12.6266527,23.7031097 L12.609561,23.275831 C12.6075724,23.2657013 12.6010112,23.2592993 12.5934901,23.257841 L12.5934901,23.257841 Z M12.8583906,23.1452862 L12.8445485,23.1473072 L12.6598443,23.2396597 L12.6498822,23.2499052 L12.6498822,23.2499052 L12.6471943,23.2611114 L12.6650943,23.6906389 L12.6699349,23.7034178 L12.6699349,23.7034178 L12.678386,23.7104931 L12.8793402,23.8032389 C12.8914285,23.8068999 12.9022333,23.8029875 12.9078286,23.7952264 L12.9118235,23.7811639 L12.8776777,23.1665331 C12.8752882,23.1545897 12.8674102,23.1470016 12.8583906,23.1452862 L12.8583906,23.1452862 Z M12.1430473,23.1473072 C12.1332178,23.1423925 12.1221763,23.1452606 12.1156365,23.1525954 L12.1099173,23.1665331 L12.0757714,23.7811639 C12.0751323,23.7926639 12.0828099,23.8018602 12.0926481,23.8045676 L12.108256,23.8032389 L12.3092106,23.7104931 L12.3186497,23.7024347 L12.3186497,23.7024347 L12.3225043,23.6906389 L12.340401,23.2611114 L12.337245,23.2485176 L12.337245,23.2485176 L12.3277531,23.2396597 L12.1430473,23.1473072 Z" id="MingCute" fill-rule="nonzero">
                                                </path>
                                                <path d="M14.2792,2 C15.1401,2 15.9044,2.55086 16.1766,3.36754 L16.7208,5 L20,5 C20.5523,5 21,5.44772 21,6 C21,6.55227 20.5523,6.99998 20,7 L19.9975,7.07125 L19.9975,7.07125 L19.1301,19.2137 C19.018,20.7837 17.7117,22 16.1378,22 L7.86224,22 C6.28832,22 4.982,20.7837 4.86986,19.2137 L4.00254,7.07125 C4.00083,7.04735 3.99998,7.02359 3.99996,7 C3.44769,6.99998 3,6.55227 3,6 C3,5.44772 3.44772,5 4,5 L7.27924,5 L7.82339,3.36754 C8.09562,2.55086 8.8599,2 9.72076,2 L14.2792,2 Z M17.9975,7 L6.00255,7 L6.86478,19.0712 C6.90216,19.5946 7.3376,20 7.86224,20 L16.1378,20 C16.6624,20 17.0978,19.5946 17.1352,19.0712 L17.9975,7 Z M10,10 C10.51285,10 10.9355092,10.386027 10.9932725,10.8833761 L11,11 L11,16 C11,16.5523 10.5523,17 10,17 C9.48715929,17 9.06449214,16.613973 9.00672766,16.1166239 L9,16 L9,11 C9,10.4477 9.44771,10 10,10 Z M14,10 C14.5523,10 15,10.4477 15,11 L15,16 C15,16.5523 14.5523,17 14,17 C13.4477,17 13,16.5523 13,16 L13,11 C13,10.4477 13.4477,10 14,10 Z M14.2792,4 L9.72076,4 L9.38743,5 L14.6126,5 L14.2792,4 Z" id="形状" fill="currentColor">
                                                </path>
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                            </div>
                            <div class="w-full h-[1px] bg-black/10"></div>
                            <div class="flex flex-wrap flex-col sm:flex-row items-center w-full p-6">
                                <div class="flex flex-col w-full sm:w-1/2 p-3" >
                                    <label for="address" class="mb-2 font-bold text-sm">Адрес</label>
                                    <input type="text" name="address" class="rounded-md border-none" placeholder="Москва, проспект Мира 82 корпус 1">
                                </div>
                                <div class="flex flex-col w-full sm:w-1/2 p-3" >
                                    <label for="time" class="mb-2 font-bold text-sm">Гафик работы:</label>
                                    <input type="text" name="time" class="rounded-md border-none" placeholder="пн-сб:с 10.00 до 20.00 вс с 10.00 до 16.00">
                                </div>
                                <div class="flex flex-col w-full sm:w-1/2 p-3" >
                                    <label for="phone" class="mb-2 font-bold text-sm">Телефон</label>
                                    <input type="text" name="phone" class="rounded-md border-none" placeholder="+7 (000) 000-00-00">
                                </div>
                                <span id="showTel3" class="mt-6 ml-6 font-bold text-sm text-[#5fa0de] cursor-pointer hover:border-b-2 hover:border-dashed hover:border-[#5fa0de]">+ еще телефон</span>
                                <div class="flex-col w-full sm:w-1/2 p-3 relative hidden" id="phone3">
                                    <label for="phone" class="mb-2 font-bold text-sm">Телефон</label>
                                    <input type="text" name="phone" class="rounded-md border-none" placeholder="+7 (000) 000-00-00">
                                    <div class="h-[29px] w-[1px] bg-[#c6c7c6] absolute bottom-4 right-[50px]"></div>
                                    <svg class="text-[#ababab] w-6 h-6 cursor-pointer hover:opacity-80 absolute bottom-5 right-[20px]" id="delPhon3" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <g id="页面-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <g id="System" transform="translate(-576.000000, -192.000000)" fill-rule="nonzero">
                                                <g id="delete_2_line" transform="translate(576.000000, 192.000000)">
                                                    <path d="M24,0 L24,24 L0,24 L0,0 L24,0 Z M12.5934901,23.257841 L12.5819402,23.2595131 L12.5108777,23.2950439 L12.4918791,23.2987469 L12.4918791,23.2987469 L12.4767152,23.2950439 L12.4056548,23.2595131 C12.3958229,23.2563662 12.3870493,23.2590235 12.3821421,23.2649074 L12.3780323,23.275831 L12.360941,23.7031097 L12.3658947,23.7234994 L12.3769048,23.7357139 L12.4804777,23.8096931 L12.4953491,23.8136134 L12.4953491,23.8136134 L12.5071152,23.8096931 L12.6106902,23.7357139 L12.6232938,23.7196733 L12.6232938,23.7196733 L12.6266527,23.7031097 L12.609561,23.275831 C12.6075724,23.2657013 12.6010112,23.2592993 12.5934901,23.257841 L12.5934901,23.257841 Z M12.8583906,23.1452862 L12.8445485,23.1473072 L12.6598443,23.2396597 L12.6498822,23.2499052 L12.6498822,23.2499052 L12.6471943,23.2611114 L12.6650943,23.6906389 L12.6699349,23.7034178 L12.6699349,23.7034178 L12.678386,23.7104931 L12.8793402,23.8032389 C12.8914285,23.8068999 12.9022333,23.8029875 12.9078286,23.7952264 L12.9118235,23.7811639 L12.8776777,23.1665331 C12.8752882,23.1545897 12.8674102,23.1470016 12.8583906,23.1452862 L12.8583906,23.1452862 Z M12.1430473,23.1473072 C12.1332178,23.1423925 12.1221763,23.1452606 12.1156365,23.1525954 L12.1099173,23.1665331 L12.0757714,23.7811639 C12.0751323,23.7926639 12.0828099,23.8018602 12.0926481,23.8045676 L12.108256,23.8032389 L12.3092106,23.7104931 L12.3186497,23.7024347 L12.3186497,23.7024347 L12.3225043,23.6906389 L12.340401,23.2611114 L12.337245,23.2485176 L12.337245,23.2485176 L12.3277531,23.2396597 L12.1430473,23.1473072 Z" id="MingCute" fill-rule="nonzero">
                                                    </path>
                                                    <path d="M14.2792,2 C15.1401,2 15.9044,2.55086 16.1766,3.36754 L16.7208,5 L20,5 C20.5523,5 21,5.44772 21,6 C21,6.55227 20.5523,6.99998 20,7 L19.9975,7.07125 L19.9975,7.07125 L19.1301,19.2137 C19.018,20.7837 17.7117,22 16.1378,22 L7.86224,22 C6.28832,22 4.982,20.7837 4.86986,19.2137 L4.00254,7.07125 C4.00083,7.04735 3.99998,7.02359 3.99996,7 C3.44769,6.99998 3,6.55227 3,6 C3,5.44772 3.44772,5 4,5 L7.27924,5 L7.82339,3.36754 C8.09562,2.55086 8.8599,2 9.72076,2 L14.2792,2 Z M17.9975,7 L6.00255,7 L6.86478,19.0712 C6.90216,19.5946 7.3376,20 7.86224,20 L16.1378,20 C16.6624,20 17.0978,19.5946 17.1352,19.0712 L17.9975,7 Z M10,10 C10.51285,10 10.9355092,10.386027 10.9932725,10.8833761 L11,11 L11,16 C11,16.5523 10.5523,17 10,17 C9.48715929,17 9.06449214,16.613973 9.00672766,16.1166239 L9,16 L9,11 C9,10.4477 9.44771,10 10,10 Z M14,10 C14.5523,10 15,10.4477 15,11 L15,16 C15,16.5523 14.5523,17 14,17 C13.4477,17 13,16.5523 13,16 L13,11 C13,10.4477 13.4477,10 14,10 Z M14.2792,4 L9.72076,4 L9.38743,5 L14.6126,5 L14.2792,4 Z" id="形状" fill="currentColor">
                                                    </path>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="bg-[#e9eef1] h-full w-full rounded-lg mt-5 hidden" id="organization4">
                            <div class="flex justify-between p-6">
                                <div class="flex items-center gap-1">
                                    <svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                         class="w-5 h-6 text-[#abacab]" viewBox="0 0 64 64" enable-background="new 0 0 64 64" xml:space="preserve">
                                    <path fill="currentColor" d="M32,0C18.746,0,8,10.746,8,24c0,5.219,1.711,10.008,4.555,13.93c0.051,0.094,0.059,0.199,0.117,0.289l16,24
	                                    C29.414,63.332,30.664,64,32,64s2.586-0.668,3.328-1.781l16-24c0.059-0.09,0.066-0.195,0.117-0.289C54.289,34.008,56,29.219,56,24
	                                    C56,10.746,45.254,0,32,0z M32,32c-4.418,0-8-3.582-8-8s3.582-8,8-8s8,3.582,8,8S36.418,32,32,32z"/>
                                    </svg>
                                    <span class="font-bold text-base">Адрес 4</span>
                                </div>
                                <svg class="text-[#ababab] w-6 h-6 cursor-pointer hover:opacity-80" id="delOrg4" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <g id="页面-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <g id="System" transform="translate(-576.000000, -192.000000)" fill-rule="nonzero">
                                            <g id="delete_2_line" transform="translate(576.000000, 192.000000)">
                                                <path d="M24,0 L24,24 L0,24 L0,0 L24,0 Z M12.5934901,23.257841 L12.5819402,23.2595131 L12.5108777,23.2950439 L12.4918791,23.2987469 L12.4918791,23.2987469 L12.4767152,23.2950439 L12.4056548,23.2595131 C12.3958229,23.2563662 12.3870493,23.2590235 12.3821421,23.2649074 L12.3780323,23.275831 L12.360941,23.7031097 L12.3658947,23.7234994 L12.3769048,23.7357139 L12.4804777,23.8096931 L12.4953491,23.8136134 L12.4953491,23.8136134 L12.5071152,23.8096931 L12.6106902,23.7357139 L12.6232938,23.7196733 L12.6232938,23.7196733 L12.6266527,23.7031097 L12.609561,23.275831 C12.6075724,23.2657013 12.6010112,23.2592993 12.5934901,23.257841 L12.5934901,23.257841 Z M12.8583906,23.1452862 L12.8445485,23.1473072 L12.6598443,23.2396597 L12.6498822,23.2499052 L12.6498822,23.2499052 L12.6471943,23.2611114 L12.6650943,23.6906389 L12.6699349,23.7034178 L12.6699349,23.7034178 L12.678386,23.7104931 L12.8793402,23.8032389 C12.8914285,23.8068999 12.9022333,23.8029875 12.9078286,23.7952264 L12.9118235,23.7811639 L12.8776777,23.1665331 C12.8752882,23.1545897 12.8674102,23.1470016 12.8583906,23.1452862 L12.8583906,23.1452862 Z M12.1430473,23.1473072 C12.1332178,23.1423925 12.1221763,23.1452606 12.1156365,23.1525954 L12.1099173,23.1665331 L12.0757714,23.7811639 C12.0751323,23.7926639 12.0828099,23.8018602 12.0926481,23.8045676 L12.108256,23.8032389 L12.3092106,23.7104931 L12.3186497,23.7024347 L12.3186497,23.7024347 L12.3225043,23.6906389 L12.340401,23.2611114 L12.337245,23.2485176 L12.337245,23.2485176 L12.3277531,23.2396597 L12.1430473,23.1473072 Z" id="MingCute" fill-rule="nonzero">
                                                </path>
                                                <path d="M14.2792,2 C15.1401,2 15.9044,2.55086 16.1766,3.36754 L16.7208,5 L20,5 C20.5523,5 21,5.44772 21,6 C21,6.55227 20.5523,6.99998 20,7 L19.9975,7.07125 L19.9975,7.07125 L19.1301,19.2137 C19.018,20.7837 17.7117,22 16.1378,22 L7.86224,22 C6.28832,22 4.982,20.7837 4.86986,19.2137 L4.00254,7.07125 C4.00083,7.04735 3.99998,7.02359 3.99996,7 C3.44769,6.99998 3,6.55227 3,6 C3,5.44772 3.44772,5 4,5 L7.27924,5 L7.82339,3.36754 C8.09562,2.55086 8.8599,2 9.72076,2 L14.2792,2 Z M17.9975,7 L6.00255,7 L6.86478,19.0712 C6.90216,19.5946 7.3376,20 7.86224,20 L16.1378,20 C16.6624,20 17.0978,19.5946 17.1352,19.0712 L17.9975,7 Z M10,10 C10.51285,10 10.9355092,10.386027 10.9932725,10.8833761 L11,11 L11,16 C11,16.5523 10.5523,17 10,17 C9.48715929,17 9.06449214,16.613973 9.00672766,16.1166239 L9,16 L9,11 C9,10.4477 9.44771,10 10,10 Z M14,10 C14.5523,10 15,10.4477 15,11 L15,16 C15,16.5523 14.5523,17 14,17 C13.4477,17 13,16.5523 13,16 L13,11 C13,10.4477 13.4477,10 14,10 Z M14.2792,4 L9.72076,4 L9.38743,5 L14.6126,5 L14.2792,4 Z" id="形状" fill="currentColor">
                                                </path>
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                            </div>
                            <div class="w-full h-[1px] bg-black/10"></div>
                            <div class="flex flex-wrap flex-col sm:flex-row items-center w-full p-6">
                                <div class="flex flex-col w-full sm:w-1/2 p-3" >
                                    <label for="address" class="mb-2 font-bold text-sm">Адрес</label>
                                    <input type="text" name="address" class="rounded-md border-none" placeholder="Москва, проспект Мира 82 корпус 1">
                                </div>
                                <div class="flex flex-col w-full sm:w-1/2 p-3" >
                                    <label for="time" class="mb-2 font-bold text-sm">Гафик работы:</label>
                                    <input type="text" name="time" class="rounded-md border-none" placeholder="пн-сб:с 10.00 до 20.00 вс с 10.00 до 16.00">
                                </div>
                                <div class="flex flex-col w-full sm:w-1/2 p-3" >
                                    <label for="phone" class="mb-2 font-bold text-sm">Телефон</label>
                                    <input type="text" name="phone" class="rounded-md border-none" placeholder="+7 (000) 000-00-00">
                                </div>
                                <span id="showTel4" class="mt-6 ml-6 font-bold text-sm text-[#5fa0de] cursor-pointer hover:border-b-2 hover:border-dashed hover:border-[#5fa0de]">+ еще телефон</span>
                                <div class="flex-col w-full sm:w-1/2 p-3 relative hidden" id="phone4">
                                    <label for="phone" class="mb-2 font-bold text-sm">Телефон</label>
                                    <input type="text" name="phone" class="rounded-md border-none" placeholder="+7 (000) 000-00-00">
                                    <div class="h-[29px] w-[1px] bg-[#c6c7c6] absolute bottom-4 right-[50px]"></div>
                                    <svg class="text-[#ababab] w-6 h-6 cursor-pointer hover:opacity-80 absolute bottom-5 right-[20px]" id="delPhon4" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <g id="页面-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <g id="System" transform="translate(-576.000000, -192.000000)" fill-rule="nonzero">
                                                <g id="delete_2_line" transform="translate(576.000000, 192.000000)">
                                                    <path d="M24,0 L24,24 L0,24 L0,0 L24,0 Z M12.5934901,23.257841 L12.5819402,23.2595131 L12.5108777,23.2950439 L12.4918791,23.2987469 L12.4918791,23.2987469 L12.4767152,23.2950439 L12.4056548,23.2595131 C12.3958229,23.2563662 12.3870493,23.2590235 12.3821421,23.2649074 L12.3780323,23.275831 L12.360941,23.7031097 L12.3658947,23.7234994 L12.3769048,23.7357139 L12.4804777,23.8096931 L12.4953491,23.8136134 L12.4953491,23.8136134 L12.5071152,23.8096931 L12.6106902,23.7357139 L12.6232938,23.7196733 L12.6232938,23.7196733 L12.6266527,23.7031097 L12.609561,23.275831 C12.6075724,23.2657013 12.6010112,23.2592993 12.5934901,23.257841 L12.5934901,23.257841 Z M12.8583906,23.1452862 L12.8445485,23.1473072 L12.6598443,23.2396597 L12.6498822,23.2499052 L12.6498822,23.2499052 L12.6471943,23.2611114 L12.6650943,23.6906389 L12.6699349,23.7034178 L12.6699349,23.7034178 L12.678386,23.7104931 L12.8793402,23.8032389 C12.8914285,23.8068999 12.9022333,23.8029875 12.9078286,23.7952264 L12.9118235,23.7811639 L12.8776777,23.1665331 C12.8752882,23.1545897 12.8674102,23.1470016 12.8583906,23.1452862 L12.8583906,23.1452862 Z M12.1430473,23.1473072 C12.1332178,23.1423925 12.1221763,23.1452606 12.1156365,23.1525954 L12.1099173,23.1665331 L12.0757714,23.7811639 C12.0751323,23.7926639 12.0828099,23.8018602 12.0926481,23.8045676 L12.108256,23.8032389 L12.3092106,23.7104931 L12.3186497,23.7024347 L12.3186497,23.7024347 L12.3225043,23.6906389 L12.340401,23.2611114 L12.337245,23.2485176 L12.337245,23.2485176 L12.3277531,23.2396597 L12.1430473,23.1473072 Z" id="MingCute" fill-rule="nonzero">
                                                    </path>
                                                    <path d="M14.2792,2 C15.1401,2 15.9044,2.55086 16.1766,3.36754 L16.7208,5 L20,5 C20.5523,5 21,5.44772 21,6 C21,6.55227 20.5523,6.99998 20,7 L19.9975,7.07125 L19.9975,7.07125 L19.1301,19.2137 C19.018,20.7837 17.7117,22 16.1378,22 L7.86224,22 C6.28832,22 4.982,20.7837 4.86986,19.2137 L4.00254,7.07125 C4.00083,7.04735 3.99998,7.02359 3.99996,7 C3.44769,6.99998 3,6.55227 3,6 C3,5.44772 3.44772,5 4,5 L7.27924,5 L7.82339,3.36754 C8.09562,2.55086 8.8599,2 9.72076,2 L14.2792,2 Z M17.9975,7 L6.00255,7 L6.86478,19.0712 C6.90216,19.5946 7.3376,20 7.86224,20 L16.1378,20 C16.6624,20 17.0978,19.5946 17.1352,19.0712 L17.9975,7 Z M10,10 C10.51285,10 10.9355092,10.386027 10.9932725,10.8833761 L11,11 L11,16 C11,16.5523 10.5523,17 10,17 C9.48715929,17 9.06449214,16.613973 9.00672766,16.1166239 L9,16 L9,11 C9,10.4477 9.44771,10 10,10 Z M14,10 C14.5523,10 15,10.4477 15,11 L15,16 C15,16.5523 14.5523,17 14,17 C13.4477,17 13,16.5523 13,16 L13,11 C13,10.4477 13.4477,10 14,10 Z M14.2792,4 L9.72076,4 L9.38743,5 L14.6126,5 L14.2792,4 Z" id="形状" fill="currentColor">
                                                    </path>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-center items_center">
                            <p id="show_org2" class="text-center mt-5 font-bold text-sm text-[#5fa0de] cursor-pointer hover:border-b-2 hover:border-dashed hover:border-[#5fa0de]">Добавить еще организацию</p>
                            <p id="show_org3" class="text-center mt-5 font-bold text-sm text-[#5fa0de] cursor-pointer hover:border-b-2 hover:border-dashed hover:border-[#5fa0de] hidden">Добавить еще организацию</p>
                            <p id="show_org4" class="text-center mt-5 font-bold text-sm text-[#5fa0de] cursor-pointer hover:border-b-2 hover:border-dashed hover:border-[#5fa0de] hidden">Добавить еще организацию</p>
                        </div>
                    </div>
                    <div class="flex bg-white p-4 md:p-8 mt-8 rounded-2xl flex-col" id="odinnadsat">
                        <div class="flex items-start">
                            <div>
                                <h3 class="font-bold">Если ваша акция доступна только в определенные дни и часы.</h3>
                                <p class="text-black/50 all_text">Общий отсчет времени до конца акции не прекратится, она так же будет находится на сайте, но пользователи смогут перейти в нее только в указанные вами дни и часы.</p>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer ml-10">
                                <input type="checkbox" value="" class="sr-only peer" id="graphicsCkeck">
                                <div class="w-14 h-7 bg-gray-200 peer-focus:outline-none peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[4px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                            </label>
                        </div>
                        <div class="mt-5 hidden" id="grphicsBlock">
                            <div class="h-[1px] w-full bg-black/20"></div>
                            <div class="mt-5 flex flex-col sm:flex-row items-start sm:items-center gap-3">
                                <div class="flex items-center gap-2">
                                    <input type="checkbox" name="check_day" id="checkDay" class="check_day rounded-md">
                                    <label for="check_day" class="font-bold">Акция доступна в</label>
                                </div>
                                <ul class="flex flex-wrap items-center gap-2">
                                    <li id="md" class="px-3 py-2 cursor-pointer bg-[#e9eef1] rounded-md">пн</li>
                                    <li id="tu" class="px-3 py-2 cursor-pointer bg-[#e9eef1] rounded-md">вт</li>
                                    <li id="wd" class="px-3 py-2 cursor-pointer bg-[#e9eef1] rounded-md">ср</li>
                                    <li id="th" class="px-3 py-2 cursor-pointer bg-[#e9eef1] rounded-md">чт</li>
                                    <li id="fr" class="px-3 py-2 cursor-pointer bg-[#e9eef1] rounded-md">пт</li>
                                    <li id="su" class="px-3 py-2 cursor-pointer bg-[#e9eef1] rounded-md">сб</li>
                                    <li id="sn" class="px-3 py-2 cursor-pointer bg-[#e9eef1] rounded-md">вс</li>
                                </ul>
                            </div>
                            <div class="mt-5 flex flex-col sm:flex-row items-start sm:items-center gap-3">
                                <div class="flex items-center gap-2">
                                    <input type="checkbox" name="check_day" id="checkTime" class="check_day rounded-md">
                                    <label for="check_day" class="font-bold">Акция доступна с</label>
                                </div>
                                <div class="flex items-center gap-3">
                                    <div class="flex items-center gap-2">
                                        <input type="text" placeholder="00" maxlength="2"  class="w-[45px] rounded-lg border border-gray-300" >
                                        <span>:</span>
                                        <input type="text" placeholder="00" maxlength="2"  class="w-[45px] rounded-lg border border-gray-300" >
                                    </div>
                                    <span>- до</span>
                                    <div class="flex items-center gap-2">
                                        <input type="text" placeholder="00" maxlength="2"  class="w-[45px] rounded-lg border border-gray-300" >
                                        <span>:</span>
                                        <input type="text" placeholder="00" maxlength="2"  class="w-[45px] rounded-lg border border-gray-300" >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex bg-white p-4 md:p-8 mt-8 rounded-2xl flex-col" id="dvenadsat">
                        <h3 class="font-bold">География акции, не более 20 городов</h3>
                        <div class="custom-select relative w-full mt-5">
                            <input type="text" class="select-input w-full rounded-md border-gray-300" placeholder="Укажите город">
                            <ul class="select-dropdown hidden absolute z-50 w-full p-0 mt-1 bg-white border border-[#ccc] max-h-[200px] overflow-y-auto">
                                <li class="p-1 cursor-pointer hover:bg-[#f5f5f5]">Москва</li>
                                <li class="p-1 cursor-pointer hover:bg-[#f5f5f5]">Санкт-Петербург</li>
                                <li class="p-1 cursor-pointer hover:bg-[#f5f5f5]">Новосибирск</li>
                                <li class="p-1 cursor-pointer hover:bg-[#f5f5f5]">Екатеринбург</li>
                                <li class="p-1 cursor-pointer hover:bg-[#f5f5f5]">Казань</li>
                                <li class="p-1 cursor-pointer hover:bg-[#f5f5f5]">Нижний Новгород</li>
                                <li class="p-1 cursor-pointer hover:bg-[#f5f5f5]">Челябинск</li>
                                <li class="p-1 cursor-pointer hover:bg-[#f5f5f5]">Самара</li>
                                <li class="p-1 cursor-pointer hover:bg-[#f5f5f5]">Омск</li>
                                <li class="p-1 cursor-pointer hover:bg-[#f5f5f5]">Ростов-на-Дону</li>
                            </ul>
                        </div>
                        <div>
                            <div id="selectedCities" class="mt-5 flex flex-wrap gap-4 all_text"></div>
                        </div>
                    </div>
                    <div class="flex bg-white p-4 md:p-8 mt-8 rounded-2xl flex-col md:hidden" id="">
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
                    <div class="hidden md:flex bg-white p-4 md:p-8 mt-8 rounded-2xl flex-col min-h-[100vh]" id="trinadsat">
                        <h3 class="font-bold ml-8">Выберите категории, к которым будет прикреплена ваша акция</h3>
                        <div class="mt-5 bg-category w-full flex max-h-[100vh]" id="container_block">
                            <ul class="bg-[#fdfdfd] w-[150px] overflow-y-scroll max-h-[100vh]" id="category_list1">
                                <li class="hoverable py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex justify-between">Кафе/Бары <span class="strelka">›</span></li>
                                <li class="hoverable py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex justify-between">Для нее <span class="strelka">›</span></li>
                                <li class="hoverable py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex justify-between">Для него <span class="strelka">›</span></li>
                                <li class="hoverable py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex justify-between">Детям <span class="strelka">›</span></li>
                                <li class="hoverable py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex justify-between">Для дома <span class="strelka">›</span></li>
                                <li class="hoverable py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex justify-between">Техника <span class="strelka">›</span></li>
                                <li class="hoverable py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex justify-between">Услуги <span class="strelka">›</span></li>
                                <li class="hoverable py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex justify-between">Красота <span class="strelka">›</span></li>
                                <li class="hoverable py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex justify-between">Туры и отели <span class="strelka">›</span></li>
                                <li class="hoverable py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex justify-between">Магазины <span class="strelka">›</span></li>
                                <li class="hoverable py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex justify-between">Для авто <span class="strelka">›</span></li>
                                <li class="hoverable py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex justify-between">Курсы <span class="strelka">›</span></li>
                                <li class="hoverable py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex justify-between">Репетиторы <span class="strelka">›</span></li>
                            </ul>
                            <ul class="bg-[#fdfdfd] min-w-[200px] hidden overflow-y-scroll max-h-[100vh]" id="category_list2">
                                <li class="hoverable2 py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex justify-between">🚗Грузоперевозки <span class="strelka">›</span></li>
                                <li class="hoverable2 py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex justify-between">Фото, видео, аудио<span class="strelka">›</span></li>
                                <li class="hoverable2 py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex justify-between">Свадьба и торжества <span class="strelka">›</span></li>
                                <li class="hoverable2 py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex justify-between">Все для красоты <span class="strelka">›</span></li>
                                <li class="hoverable2 py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex justify-between">Врачи <span class="strelka">›</span></li>
                                <li class="hoverable2 py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex justify-between">IT-фрилансеры <span class="strelka">›</span></li>
                                <li class="hoverable2 py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex justify-between">Ремонт и стройка <span class="strelka">›</span></li>
                                <li class="hoverable2 py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex justify-between">Для авто <span class="strelka">›</span></li>
                                <li class="hoverable2 py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex justify-between">Бухгалтеры <span class="strelka">›</span></li>
                                <li class="hoverable2 py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex justify-between">Ветеринары <span class="strelka">›</span></li>
                                <li class="hoverable2 py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex justify-between">Автоинструкторы <span class="strelka">›</span></li>
                                <li class="hoverable2 py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex justify-between">Домашний персонал <span class="strelka">›</span></li>
                                <li class="hoverable2 py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex justify-between">Уборка <span class="strelka">›</span></li>
                                <li class="hoverable2 py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex justify-between">Туризм <span class="strelka">›</span></li>
                                <li class="hoverable2 py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex justify-between">Авиабилеты <span class="strelka">›</span></li>
                                <li class="hoverable2 py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex justify-between">Деньги <span class="strelka">›</span></li>
                            </ul>
                            <ul class="bg-[#fdfdfd] min-w-[350px] hidden overflow-y-scroll max-h-[100vh]" id="category_list3">
                                <li class=" py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex items-center gap-3"><input type="checkbox" value="item1">Аренда инструмента</li>
                                <li class=" py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex items-center gap-3"><input type="checkbox" value="item2">Благоустройства территории</li>
                                <li class=" py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex items-center gap-3"><input type="checkbox" value="item3">Бурение скважин</li>
                                <li class=" py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex items-center gap-3"><input type="checkbox" value="item4">Бытовая техника</li>
                                <li class=" py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex items-center gap-3"><input type="checkbox" value="item5">Вентиляция и кондиционеры</li>
                                <li class=" py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex items-center gap-3"><input type="checkbox" value="item6">Возведение стен и перегородок</li>
                                <li class=" py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex items-center gap-3"><input type="checkbox" value="item7">Вывоз мусора</li>
                                <li class=" py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex items-center gap-3"><input type="checkbox" value="item8">Гипсокартон</li>
                                <li class=" py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex items-center gap-3"><input type="checkbox" value="item9">Гончарные работы</li>
                                <li class=" py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex items-center gap-3"><input type="checkbox" value="item10">Двери</li>
                                <li class=" py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex items-center gap-3"><input type="checkbox" value="item11">Витражи</li>
                                <li class=" py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex items-center gap-3"><input type="checkbox" value="item12">Декоративно-прикладный работы</li>
                                <li class=" py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex items-center gap-3"><input type="checkbox" value="item13">Демонтаж сооружений и конструкций</li>
                                <li class=" py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex items-center gap-3"><input type="checkbox" value="item14">Сантехника</li>
                                <li class=" py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex items-center gap-3"><input type="checkbox" value="item15">Сантехника</li>
                            </ul>
                            <ul class="bg-[#fdfdfd] min-w-[350px] hidden overflow-y-scroll max-h-[100vh]" id="category_list4">
                                <li class=" py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex items-center gap-3"><input type="checkbox" value="item1">Аренда инструмента</li>
                                <li class=" py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex items-center gap-3"><input type="checkbox" value="item2">Благоустройства территории</li>
                                <li class=" py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex items-center gap-3"><input type="checkbox" value="item3">Бурение скважин</li>
                                <li class=" py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex items-center gap-3"><input type="checkbox" value="item4">Бытовая техника</li>
                                <li class=" py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex items-center gap-3"><input type="checkbox" value="item5">Вентиляция и кондиционеры</li>
                                <li class=" py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex items-center gap-3"><input type="checkbox" value="item6">Возведение стен и перегородок</li>
                                <li class=" py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex items-center gap-3"><input type="checkbox" value="item7">Вывоз мусора</li>
                                <li class=" py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex items-center gap-3"><input type="checkbox" value="item8">Гипсокартон</li>
                                <li class=" py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex items-center gap-3"><input type="checkbox" value="item9">Гончарные работы</li>
                                <li class=" py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex items-center gap-3"><input type="checkbox" value="item10">Двери</li>
                                <li class=" py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex items-center gap-3"><input type="checkbox" value="item11">Витражи</li>
                                <li class=" py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex items-center gap-3"><input type="checkbox" value="item12">Декоративно-прикладный работы</li>
                                <li class=" py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex items-center gap-3"><input type="checkbox" value="item13">Демонтаж сооружений и конструкций</li>
                                <li class=" py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex items-center gap-3"><input type="checkbox" value="item14">Сантехника</li>
                                <li class=" py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex items-center gap-3"><input type="checkbox" value="item15">Сантехника</li>
                            </ul>
                        </div>
                        <div class="mx-8">
                            <h3 class="font-bold mt-5">Вы выбрали</h3>
                            <div id="tag-container" class="flex flex-wrap gap-3 py-3"></div>
                        </div>
                    </div>
                    <div class="flex bg-white p-4 md:p-8 mt-8 rounded-2xl justify-between flex-col md:flex-row" id="chetyrnadsat">
                        <p class="w-full md:w-[380px] text-black/50"><strong class="text-black">На какое количество дней будет запущена акция?</strong><br>Максимум 30 дней.</p>
                        <div class="flex items-center gap-4 mt-4 md:mt-0">
                            <div class="flex items-center gap-2 relative w-full md:w-[180px]">
                                <span class="text-xs opacity-80">0</span>
                                <input id="slider" class=" w-[150px] price_block" type="range" min="0" max="30" value="0">
                                <div id="slider-value" class="slider-value">0</div>
                                <span class="text-xs opacity-80">30</span>
                            </div>
                            <div class="border text-center py-2 w-[50px] rounded-md text-lg" id="slider_value">0</div>
                        </div>
                    </div>
                    <div class="flex bg-white p-4 md:p-8 mt-8 rounded-2xl justify-between items-start flex-col md:flex-row" id="pyatnadsat">
                        <div class="price_block w-[450px]">
                            <h3 class="font-bold">Желаете чтобы ваша акция так же появлялась и в баннере на главной странице сайта?<span id="hiddenText" class="hidden font-normal text-black/50">В этом случае стоимость запуска акции будет в 3 раза дороже. Бесплатно, если вы предлагаете скидку более 50%.</span></h3>
                        </div>
                        <div class="flex items-center gap-2 mt-4 md:mt-0">
                            <span class="text-base all_text" id="notAgree">Нет</span>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" value="" class="sr-only peer" id="saleValue">
                                <div class="w-14 h-7 bg-gray-200 peer-focus:outline-none peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[4px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                            </label>
                            <span class="text-base all_text text_opac" id="agree">Да, желаю</span>
                        </div>
                    </div>
                    <div class="flex bg-white p-4 md:p-8 mt-8 rounded-2xl flex-col" id="shestnadsat">
                        <div class="flex items-center justify-between px-0 md:px-8 w-full flex-col md:flex-row">
                            <h3 class="font-bold w-full md:w-auto">Дополнительные опции (нужен премиум)</h3>
                            <a href="#" class="text-[#0066CB] hover:underline w-full md:w-auto">Смотреть тарифы</a>
                        </div>
                        <div class="w-full h-[1px] bg-black/20 my-5"></div>
                        <div class="flex justify-between items-center px-0 md:px-8 ">
                            <div class="flex items-center gap-1">
                                <p class="text-base all_text">Поднимать акцию на первое место каждые</p>
                                <input type="text" id="timeValue" class="w-[45px] bg_inp rounded-md border-gray-300" placeholder="0">
                                <label for="timeValue" class="text-sm md:text-base">часа</label>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" value="" class="sr-only peer" id="timeValueCheck">
                                <div class="w-14 h-7 bg-gray-200 peer-focus:outline-none peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[4px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                            </label>
                        </div>
                        <div class="w-full h-[1px] bg-black/20 my-5"></div>
                        <div class="flex justify-between items-center px-0 md:px-8">
                            <div class="flex items-center gap-1">
                                <p class="text-base all_text">Автоматически перезапускать акцию после завершения на</p>
                                <input type="text" id="dayValue" class="w-[45px] bg_inp rounded-md border-gray-300" placeholder="0">
                                <label for="dayValue">дней</label>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" value="" class="sr-only peer" id="dayValueCheck">
                                <div class="w-14 h-7 bg-gray-200 peer-focus:outline-none peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[4px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                            </label>
                        </div>
                    </div>
                    <div class="pt-8 flex justify-between flex-col lg:flex-row">
                        <div class="flex flex-col price_block w-[450px]">
                            <div class="flex pricer_blocks justify-between">
                                <div class="">
                                    <span class="text-[#159FF5] text-base">Ваш баланс</span>
                                    <h3 class="text-white text-3xl price_text">100 000 руб.</h3>
                                </div>
                                <div class="">
                                    <span class="text-[#159FF5] text-base">Стоимость акции составит</span>
                                    <h3 class="text-white text-3xl price_text">594 руб.</h3>
                                </div>
                            </div>
                            <div class="flex gap-2  items-center mt-5">
                                <input type="checkbox" name="" id="rules" >
                                <label for="rules" class="text-[#607990] all_text">С условиями пользования сервисом и стоимостью ознакомлен и полностью согласен</label>
                            </div>
                        </div>
                        <div class="flex flex-col gap-3 mt-4 lg:mt-0">
                            <div class="p-4 w-full lg:w-[230px] bg-[#1d89f2] flex items-center justify-center shadow-lg gap-3 rounded-md hover:opacity-90">
                                <img class="w-6 h-6" src="/assets/constructor/eye.svg" alt="eye">
                                <a href="#" class="text-white all_text">Предпросмотр акции</a>
                            </div>
                            <div class="p-4 w-full lg:w-[280px] bg-[#1d89f2] flex items-center justify-center shadow-lg gap-3 rounded-md hover:opacity-90">
                                <img class="w-6 h-6" src="/assets/constructor/file.svg" alt="eye">
                                <button class="text-white all_text">Сохранить как черновик</button>
                            </div>
                        </div>
                    </div>
                    <button class="w-full text-3xl text-white font-bold py-8 mt-5 bg-[#1d89f2] rounded-md shadow-lg hover:opacity-90">Запустить акцию</button>
                </div>
                <div class="w-[250px] route_block bg-white rounded-2xl py-2 h-full">
                    <ul class="w-full flex flex-col">
                        <a href="" class="px-4 mx-4 py-2 my-2 underline text-[#1d89f2] hover:bg-[#063966] hover:text-white hover:rounded-lg hover:no-underline">Личный кабинет</a>
                        <div class="w-full h-[1px] bg-black/20 "></div>
                        <a href="" class="px-4 mx-4 py-2 my-2 underline text-[#1d89f2] hover:bg-[#063966] hover:text-white hover:rounded-lg hover:no-underline">Запустить акцию</a>
                        <div class="w-full h-[1px] bg-black/20 "></div>
                        <a href="" class="px-4 mx-4 py-2 my-2 underline text-[#1d89f2] hover:bg-[#063966] hover:text-white hover:rounded-lg hover:no-underline">Мои акции</a>
                        <div class="w-full h-[1px] bg-black/20 "></div>
                        <a href="" class="px-4 mx-4 py-2 my-2 underline text-[#1d89f2] hover:bg-[#063966] hover:text-white hover:rounded-lg hover:no-underline">Мои акции с купонами</a>
                        <div class="w-full h-[1px] bg-black/20 "></div>
                        <a href="" class="px-4 mx-4 py-2 my-2 underline text-[#1d89f2] hover:bg-[#063966] hover:text-white hover:rounded-lg hover:no-underline">Мои купоны</a>
                        <div class="w-full h-[1px] bg-black/20 "></div>
                        <a href="" class="px-4 mx-4 py-2 my-2 underline text-[#1d89f2] hover:bg-[#063966] hover:text-white hover:rounded-lg hover:no-underline">Мои черновики</a>
                    </ul>
                </div>
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

<!--    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>-->
<!--    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/datepicker.min.js"></script>-->
<!--    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>-->
<!--    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.11/cropper.min.js"></script>-->
<!--    <script src="/js/dropdown.js"></script>-->
<!--    <script src="/js/promo_cost.js"></script>-->
<!--    <script src="/js/promo.js"></script>-->
    <Footer :contact="contact"></Footer>
</template>
