<script setup lang="ts">
import { onMounted } from 'vue';
import AdaptiveImage from '@/components/ui/AdaptiveImage.vue';

onMounted(() => {
    import('@/dropdown.js').catch(err => {
        console.error('Ошибка загрузки dropdown.js:', err);
    });

    const categoryItems = document.querySelectorAll('#lists .my-class');
    categoryItems.forEach(item => {
        item.addEventListener('mouseenter', () => {
            const categoryName = item.getAttribute('data-category');
            const titleElement = document.getElementById('categoryTitle');
            if (titleElement && categoryName) {
                titleElement.childNodes[0].textContent = categoryName + ' ';
            }
        });
    });
});
</script>

<template>
    <div class="w-full md:py-0 py-4 relative">
        <div class="flex items-end justify-between -mx-2 lg:px-0 px-4 mobile_desctop">
            <div class=" relative flex flex-col items-center cursor-pointer">
                <div class="flex flex-col items-center justify-center relative mains" data-index="1">
                    <div class="rounded-lg py-3 px-4 image-1 w-[51px] h-[51px] ">
                    </div>
                    <p class="lg:text-sm font-bold mt-2 text-white">Для него</p>
                </div>
                <svg fill="currentColor" id="icons1" class="hidden w-6 h-7 absolute -bottom-6 text-[#F9D914]"
                     viewBox="0 0 24 11" xmlns="http://www.w3.org/2000/svg">
                    <path d="M24 11H0L12 0L24 11Z" fill="currentColor" />
                </svg>
            </div>
            <div class=" relative flex flex-col items-center cursor-pointer">
                <div class="flex flex-col items-center justify-center relative mains2" data-index="2">
                    <div class=" rounded-lg py-3 px-4 image-2 w-[51px] h-[51px]">
                    </div>
                    <p class="lg:text-sm font-bold mt-2 text-white">Для нее</p>
                </div>
                <svg fill="currentColor" id="icons2" class="hidden w-6 h-7 absolute -bottom-6 text-[#F9D914]"
                     viewBox="0 0 24 11" xmlns="http://www.w3.org/2000/svg">
                    <path d="M24 11H0L12 0L24 11Z" fill="currentColor" />
                </svg>
            </div>
            <div class="  relative flex flex-col items-center cursor-pointer">
                <div class="flex flex-col justify-center items-center relative mains3" data-index="3">
                    <div class="rounded-lg py-3 px-4 w-[51px] image-3 h-[51px] ">
                    </div>
                    <p class="lg:text-sm font-bold mt-2 text-white">Детям</p>
                </div>
                <svg fill="currentColor" id="icons3" class="hidden w-6 h-7 absolute -bottom-6 text-[#F9D914]"
                     viewBox="0 0 24 11" xmlns="http://www.w3.org/2000/svg">
                    <path d="M24 11H0L12 0L24 11Z" fill="currentColor" />
                </svg>
            </div>
            <div class="  relative flex flex-col items-center cursor-pointer">
                <div class="flex flex-col items-center justify-center relative mains4" data-index="4">
                    <div class=" rounded-lg py-3 px-4 w-[51px] image-4 h-[51px] ">
                    </div>
                    <p class="lg:text-sm font-bold mt-2 text-white">Для дома</p>
                </div>
                <svg fill="currentColor" id="icons4" class="hidden w-6 h-7 absolute -bottom-6 text-[#F9D914]"
                     viewBox="0 0 24 11" xmlns="http://www.w3.org/2000/svg">
                    <path d="M24 11H0L12 0L24 11Z" fill="currentColor" />
                </svg>
            </div>
            <div class="  relative flex flex-col items-center cursor-pointer">
                <div class="flex flex-col items-center justify-center relative mains5" data-index="5">
                    <div class=" rounded-lg py-3 px-4 w-[51px] image-5 h-[51px] ">
                    </div>
                    <p class="lg:text-sm font-bold mt-2 text-white">Техника</p>
                </div>
                <svg fill="currentColor" id="icons5" class="hidden w-6 h-7 absolute -bottom-6 text-[#F9D914]"
                     viewBox="0 0 24 11" xmlns="http://www.w3.org/2000/svg">
                    <path d="M24 11H0L12 0L24 11Z" fill="currentColor" />
                </svg>
            </div>
            <div class="  relative flex flex-col items-center cursor-pointer">
                <div class="flex flex-col items-center justify-center relative mains6" data-index="6">
                    <div class="rounded-lg py-3 px-4 w-[51px] image-6 h-[51px] ">
                    </div>
                    <p class="lg:text-sm font-bold mt-2 text-white">Красота</p>
                </div>
                <svg fill="currentColor" id="icons6" class="hidden w-6 h-7 absolute -bottom-6 text-[#F9D914]"
                     viewBox="0 0 24 11" xmlns="http://www.w3.org/2000/svg">
                    <path d="M24 11H0L12 0L24 11Z" fill="currentColor" />
                </svg>
            </div>
            <div class="  relative flex flex-col items-center cursor-pointer">
                <div class="flex flex-col items-center justify-center relative mains7" data-index="7">
                    <div class=" rounded-lg py-3 px-4 w-[51px] image-7 h-[51px] ">
                    </div>
                    <p class="lg:text-sm font-bold mt-2 text-white">Услуги</p>
                </div>
                <svg fill="currentColor" id="icons7" class="hidden w-6 h-7 absolute -bottom-6 text-[#F9D914]"
                     viewBox="0 0 24 11" xmlns="http://www.w3.org/2000/svg">
                    <path d="M24 11H0L12 0L24 11Z" fill="currentColor" />
                </svg>
            </div>
            <div class="  relative flex flex-col items-center cursor-pointer">
                <div class="flex flex-col items-center justify-center relative mains8" data-index="8">
                    <div class=" rounded-lg py-3 px-4 w-[51px] image-8 h-[51px] ">
                    </div>
                    <p class="lg:text-sm font-bold mt-2 text-white">Туризм</p>
                </div>
                <svg fill="currentColor" id="icons8" class="hidden w-6 h-7 absolute -bottom-6 text-[#F9D914]"
                     viewBox="0 0 24 11" xmlns="http://www.w3.org/2000/svg">
                    <path d="M24 11H0L12 0L24 11Z" fill="currentColor" />
                </svg>
            </div>
            <div class="  relative flex flex-col items-center cursor-pointer">
                <div class="flex flex-col items-center justify-center relative mains9" data-index="9">
                    <div class=" rounded-lg py-3 px-4 w-[51px] image-9 h-[51px] ">
                    </div>
                    <p class="lg:text-sm font-bold mt-2 text-white">Магазины</p>
                </div>
                <svg fill="currentColor" id="icons9" class="hidden w-6 h-7 absolute -bottom-6 text-[#F9D914]"
                     viewBox="0 0 24 11" xmlns="http://www.w3.org/2000/svg">
                    <path d="M24 11H0L12 0L24 11Z" fill="currentColor" />
                </svg>
            </div>
            <div class="  relative flex flex-col items-center cursor-pointer">
                <div class="flex flex-col items-center justify-center relative mains10" data-index="10">
                    <div class=" rounded-lg py-3 px-4 w-[51px] image-10 h-[51px] ">
                    </div>
                    <p class="lg:text-sm font-bold mt-2 text-white">Поесть</p>
                </div>
                <svg fill="currentColor" id="icons10" class="hidden w-6 h-7 absolute -bottom-6 text-[#F9D914]"
                     viewBox="0 0 24 11" xmlns="http://www.w3.org/2000/svg">
                    <path d="M24 11H0L12 0L24 11Z" fill="currentColor" />
                </svg>
            </div>
            <div class=" relative flex flex-col items-center cursor-pointer">
                <div class="flex flex-col items-center justify-center relative mains11" data-index="11">
                    <div class=" rounded-lg py-3  w-[51px] image-11 h-[51px] ">
                    </div>
                    <p class="lg:text-sm font-bold mt-2 text-white">Для авто</p>
                </div>
                <svg fill="currentColor" id="icons11" class="hidden w-6 h-7 absolute -bottom-6 text-[#F9D914]"
                     viewBox="0 0 24 11" xmlns="http://www.w3.org/2000/svg">
                    <path d="M24 11H0L12 0L24 11Z" fill="currentColor" />
                </svg>
            </div>
            <div class="  relative flex flex-col items-center cursor-pointer">
                <div class="flex flex-col items-center justify-center relative mains12" data-index="12">
                    <div class=" rounded-lg py-3 px-4 w-[51px] image-12 h-[51px] ">
                    </div>
                    <p class="lg:text-sm font-bold mt-2 text-white">Обучение</p>
                </div>
                <svg fill="currentColor" id="icons12" class="hidden w-6 h-7 absolute -bottom-6 text-[#F9D914]"
                     viewBox="0 0 24 11" xmlns="http://www.w3.org/2000/svg">
                    <path d="M24 11H0L12 0L24 11Z" fill="currentColor" />
                </svg>
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
        <div class="drop_list flex-col mt-3 hidden absolute w-full bg-white shadow-lg z-50">
            <div class="w-full bg-[#F9D914] z-[1] h-[16px]"></div>
            <div id="blocks_list" class="flex gap-1 overflow-y-scroll bg-white px-[15px] py-[2px]  z-[10]">
                <ul id="lists" class="relative w-1/3  py-2 bg-white z-10 overflow-y-scroll pr-[16px] mt-[10px]">
                    <li class="my-class" data-category="Грузоперевозки">
                        <div class="icon-container">
                            <AdaptiveImage image-path="menu_icons/carpng" alt="Грузоперевозки" image-class="category-icon" />
                            <span>Грузоперевозки</span>
                        </div>
                        <span class="strelka">›</span>
                    </li>
                    <li class="my-class" data-category="Фото, видео, аудио">
                        <div class="icon-container">
                            <AdaptiveImage image-path="menu_icons/photo" alt="Фото, видео, аудио" image-class="category-icon" />
                            <span>Фото, видео, аудио</span>
                        </div>
                        <span class="strelka">›</span>
                    </li>
                    <li class="my-class" data-category="Свадьба и торжества">
                        <div class="icon-container">
                            <AdaptiveImage image-path="menu_icons/ring" alt="Свадьба и торжества" image-class="category-icon" />
                            <span>Свадьба и торжества</span>
                        </div>
                        <span class="strelka">›</span>
                    </li>
                    <li class="my-class" data-category="Все для красоты">
                        <div class="icon-container">
                            <AdaptiveImage image-path="menu_icons/kiss" alt="Все для красоты" image-class="category-icon" />
                            <span>Все для красоты</span>
                        </div>
                        <span class="strelka">›</span>
                    </li>
                    <li class="my-class" data-category="Врачи">
                        <div class="icon-container">
                            <AdaptiveImage image-path="menu_icons/hos" alt="Врачи" image-class="category-icon" />
                            <span>Врачи</span>
                        </div>
                        <span class="strelka">›</span>
                    </li>
                    <li class="my-class" data-category="IT-фрилансеры">
                        <div class="icon-container">
                            <AdaptiveImage image-path="menu_icons/comp" alt="IT-фрилансеры" image-class="category-icon" />
                            <span>IT-фрилансеры</span>
                        </div>
                        <span class="strelka">›</span>
                    </li>
                    <li class="my-class" data-category="Ремонт и стройка">
                        <div class="icon-container">
                            <AdaptiveImage image-path="menu_icons/tools" alt="Ремонт и стройка" image-class="category-icon" />
                            <span>Ремонт и стройка</span>
                        </div>
                        <span class="strelka">›</span>
                    </li>
                    <li class="my-class" data-category="Для авто">
                        <div class="icon-container">
                            <AdaptiveImage image-path="menu_icons/wheel" alt="Для авто" image-class="category-icon" />
                            <span>Для авто</span>
                        </div>
                        <span class="strelka">›</span>
                    </li>
                    <li class="my-class" data-category="Бухгалтеры и юристы">
                        <div class="icon-container">
                            <AdaptiveImage image-path="menu_icons/teach" alt="Бухгалтеры и юристы" image-class="category-icon" />
                            <span>Бухгалтеры и юристы</span>
                        </div>
                        <span class="strelka">›</span>
                    </li>
                    <li class="my-class" data-category="Ветеринары">
                        <div class="icon-container">
                            <AdaptiveImage image-path="menu_icons/dog" alt="Ветеринары" image-class="category-icon" />
                            <span>Ветеринары</span>
                        </div>
                        <span class="strelka">›</span>
                    </li>
                </ul>
                <div class="rightSide overflow-y-scroll flex-1 py-5 px-10">
                    <div class="headerWrap flex justify-between items-center mb-6">
                        <h1 id="categoryTitle" class="text-2xl flex align-center gap-3 font-bold text-black">
                            Грузоперевозки <span class="strelka">></span></h1>

                        <!-- Поле поиска -->
                        <div class="relative mb-6">
                            <div class="absolute left-3 top-1/2 -translate-y-1/2">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                                     viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </div>
                            <input
                                type="text"
                                placeholder="Найти категорию..."
                                class="inputMenu w-full pl-10 pr-4 py-2 rounded-[10px]! border! border-[#1344871A]! bg-[#1344871A] focus:outline-none focus:border-blue-500"
                                style="border-width: 1px;"
                            />
                        </div>
                    </div>
                    <!-- Заголовок -->

                    <div class="grid grid-cols-3 gap-7">
                        <div class="category-block">
                            <h3 class="text-base font-semibold text-black mb-2">Заголовок категории</h3>
                            <ul class="space-y-1 mt-3 gap-2 flex flex-col">
                                <li class="text-sm text-[#585858]">Подраздел 1</li>
                                <li class="text-sm text-[#585858]">Подраздел 2</li>
                                <li class="text-sm text-[#585858]">Подраздел 3</li>
                            </ul>
                        </div>
                        <div class="category-block">
                            <h3 class="text-base font-semibold text-black mb-2">Заголовок категории</h3>
                            <ul class="space-y-1 mt-3 gap-2 flex flex-col">
                                <li class="text-sm text-[#585858]">Подраздел 1</li>
                                <li class="text-sm text-[#585858]">Подраздел 2</li>
                                <li class="text-sm text-[#585858]">Подраздел 3</li>
                            </ul>
                        </div>
                        <div class="category-block">
                            <h3 class="text-base font-semibold text-black mb-2">Заголовок категории</h3>
                            <ul class="space-y-1 mt-3 gap-2 flex flex-col">
                                <li class="text-sm text-[#585858]">Подраздел 1</li>
                                <li class="text-sm text-[#585858]">Подраздел 2</li>
                                <li class="text-sm text-[#585858]">Подраздел 3</li>
                            </ul>
                        </div>
                        <div class="category-block">
                            <h3 class="text-base font-semibold text-black mb-2">Заголовок категории</h3>
                            <ul class="space-y-1 mt-3 gap-2 flex flex-col">
                                <li class="text-sm text-[#585858]">Подраздел 1</li>
                                <li class="text-sm text-[#585858]">Подраздел 2</li>
                                <li class="text-sm text-[#585858]">Подраздел 3</li>
                            </ul>
                        </div>
                        <div class="category-block">
                            <h3 class="text-base font-semibold text-black mb-2">Заголовок категории</h3>
                            <ul class="space-y-1 mt-3 gap-2 flex flex-col">
                                <li class="text-sm text-[#585858]">Подраздел 1</li>
                                <li class="text-sm text-[#585858]">Подраздел 2</li>
                                <li class="text-sm text-[#585858]">Подраздел 3</li>
                            </ul>
                        </div>
                        <div class="category-block">
                            <h3 class="text-base font-semibold text-black mb-2">Заголовок категории</h3>
                            <ul class="space-y-1 mt-3 gap-2 flex flex-col">
                                <li class="text-sm text-[#585858]">Подраздел 1</li>
                                <li class="text-sm text-[#585858]">Подраздел 2</li>
                                <li class="text-sm text-[#585858]">Подраздел 3</li>
                            </ul>
                        </div>
                        <div class="category-block">
                            <h3 class="text-base font-semibold text-black mb-2">Заголовок категории</h3>
                            <ul class="space-y-1 mt-3 gap-2 flex flex-col">
                                <li class="text-sm text-[#585858]">Подраздел 1</li>
                                <li class="text-sm text-[#585858]">Подраздел 2</li>
                                <li class="text-sm text-[#585858]">Подраздел 3</li>
                            </ul>
                        </div>
                        <div class="category-block">
                            <h3 class="text-base font-semibold text-black mb-2">Заголовок категории</h3>
                            <ul class="space-y-1 mt-3 gap-2 flex flex-col">
                                <li class="text-sm text-[#585858]">Подраздел 1</li>
                                <li class="text-sm text-[#585858]">Подраздел 2</li>
                                <li class="text-sm text-[#585858]">Подраздел 3</li>
                            </ul>
                        </div>
                        <div class="category-block">
                            <h3 class="text-base font-semibold text-black mb-2">Заголовок категории</h3>
                            <ul class="space-y-1 mt-3 gap-2 flex flex-col">
                                <li class="text-sm text-[#585858]">Подраздел 1</li>
                                <li class="text-sm text-[#585858]">Подраздел 2</li>
                                <li class="text-sm text-[#585858]">Подраздел 3</li>
                            </ul>
                        </div>
                        <div class="category-block">
                            <h3 class="text-base font-semibold text-black mb-2">Заголовок категории</h3>
                            <ul class="space-y-1 mt-3 gap-2 flex flex-col">
                                <li class="text-sm text-[#585858]">Подраздел 1</li>
                                <li class="text-sm text-[#585858]">Подраздел 2</li>
                                <li class="text-sm text-[#585858]">Подраздел 3</li>
                            </ul>
                        </div>
                        <div class="category-block">
                            <h3 class="text-base font-semibold text-black mb-2">Заголовок категории</h3>
                            <ul class="space-y-1 mt-3 gap-2 flex flex-col">
                                <li class="text-sm text-[#585858]">Подраздел 1</li>
                                <li class="text-sm text-[#585858]">Подраздел 2</li>
                                <li class="text-sm text-[#585858]">Подраздел 3</li>
                            </ul>
                        </div>
                        <div class="category-block">
                            <h3 class="text-base font-semibold text-black mb-2">Заголовок категории</h3>
                            <ul class="space-y-1 mt-3 gap-2 flex flex-col">
                                <li class="text-sm text-[#585858]">Подраздел 1</li>
                                <li class="text-sm text-[#585858]">Подраздел 2</li>
                                <li class="text-sm text-[#585858]">Подраздел 3</li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</template>
