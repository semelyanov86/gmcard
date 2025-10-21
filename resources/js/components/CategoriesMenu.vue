<script setup lang="ts">
import AdaptiveImage from '@/components/ui/AdaptiveImage.vue';
import SearchIcon from '@/components/primitives/icons/SearchIcon.vue';
import TriangleUpIcon from '@/components/primitives/icons/TriangleUpIcon.vue';
import { onMounted } from 'vue';

onMounted(() => {
    setTimeout(() => {
        const categoryItems = document.querySelectorAll('#lists .my-class');
        categoryItems.forEach((item) => {
            item.addEventListener('mouseenter', () => {
                const categoryName = item.getAttribute('data-category');
                const titleElement = document.getElementById('categoryTitle');
                if (titleElement && categoryName) {
                    titleElement.childNodes[0].textContent = categoryName + ' ';
                }
            });
        });
    }, 100);
});
</script>

<template>
    <div class="relative w-full py-4 md:py-0">
        <div class="mobile_desctop -mx-2 flex items-end justify-between px-4 lg:px-0">
            <div class="relative flex cursor-pointer flex-col items-center">
                <div class="mains relative flex flex-col items-center justify-center" data-index="1">
                    <div class="image-1 h-[51px] w-[51px] rounded-lg px-4 py-3"></div>
                    <p class="mt-2 font-bold text-white lg:text-sm">Для него</p>
                </div>
                <TriangleUpIcon id="icons1" custom-class="absolute -bottom-6 hidden h-7 w-6 text-[#F9D914]" />
            </div>
            <div class="relative flex cursor-pointer flex-col items-center">
                <div class="mains2 relative flex flex-col items-center justify-center" data-index="2">
                    <div class="image-2 h-[51px] w-[51px] rounded-lg px-4 py-3"></div>
                    <p class="mt-2 font-bold text-white lg:text-sm">Для нее</p>
                </div>
                <TriangleUpIcon id="icons2" custom-class="absolute -bottom-6 hidden h-7 w-6 text-[#F9D914]" />
            </div>
            <div class="relative flex cursor-pointer flex-col items-center">
                <div class="mains3 relative flex flex-col items-center justify-center" data-index="3">
                    <div class="image-3 h-[51px] w-[51px] rounded-lg px-4 py-3"></div>
                    <p class="mt-2 font-bold text-white lg:text-sm">Детям</p>
                </div>
                <TriangleUpIcon id="icons3" custom-class="absolute -bottom-6 hidden h-7 w-6 text-[#F9D914]" />
            </div>
            <div class="relative flex cursor-pointer flex-col items-center">
                <div class="mains4 relative flex flex-col items-center justify-center" data-index="4">
                    <div class="image-4 h-[51px] w-[51px] rounded-lg px-4 py-3"></div>
                    <p class="mt-2 font-bold text-white lg:text-sm">Для дома</p>
                </div>
                <TriangleUpIcon id="icons4" custom-class="absolute -bottom-6 hidden h-7 w-6 text-[#F9D914]" />
            </div>
            <div class="relative flex cursor-pointer flex-col items-center">
                <div class="mains5 relative flex flex-col items-center justify-center" data-index="5">
                    <div class="image-5 h-[51px] w-[51px] rounded-lg px-4 py-3"></div>
                    <p class="mt-2 font-bold text-white lg:text-sm">Техника</p>
                </div>
                <TriangleUpIcon id="icons5" custom-class="absolute -bottom-6 hidden h-7 w-6 text-[#F9D914]" />
            </div>
            <div class="relative flex cursor-pointer flex-col items-center">
                <div class="mains6 relative flex flex-col items-center justify-center" data-index="6">
                    <div class="image-6 h-[51px] w-[51px] rounded-lg px-4 py-3"></div>
                    <p class="mt-2 font-bold text-white lg:text-sm">Красота</p>
                </div>
                <TriangleUpIcon id="icons6" custom-class="absolute -bottom-6 hidden h-7 w-6 text-[#F9D914]" />
            </div>
            <div class="relative flex cursor-pointer flex-col items-center">
                <div class="mains7 relative flex flex-col items-center justify-center" data-index="7">
                    <div class="image-7 h-[51px] w-[51px] rounded-lg px-4 py-3"></div>
                    <p class="mt-2 font-bold text-white lg:text-sm">Услуги</p>
                </div>
                <TriangleUpIcon id="icons7" custom-class="absolute -bottom-6 hidden h-7 w-6 text-[#F9D914]" />
            </div>
            <div class="relative flex cursor-pointer flex-col items-center">
                <div class="mains8 relative flex flex-col items-center justify-center" data-index="8">
                    <div class="image-8 h-[51px] w-[51px] rounded-lg px-4 py-3"></div>
                    <p class="mt-2 font-bold text-white lg:text-sm">Туризм</p>
                </div>
                <TriangleUpIcon id="icons8" custom-class="absolute -bottom-6 hidden h-7 w-6 text-[#F9D914]" />
            </div>
            <div class="relative flex cursor-pointer flex-col items-center">
                <div class="mains9 relative flex flex-col items-center justify-center" data-index="9">
                    <div class="image-9 h-[51px] w-[51px] rounded-lg px-4 py-3"></div>
                    <p class="mt-2 font-bold text-white lg:text-sm">Магазины</p>
                </div>
                <TriangleUpIcon id="icons9" custom-class="absolute -bottom-6 hidden h-7 w-6 text-[#F9D914]" />
            </div>
            <div class="relative flex cursor-pointer flex-col items-center">
                <div class="mains10 relative flex flex-col items-center justify-center" data-index="10">
                    <div class="image-10 h-[51px] w-[51px] rounded-lg px-4 py-3"></div>
                    <p class="mt-2 font-bold text-white lg:text-sm">Поесть</p>
                </div>
                <TriangleUpIcon id="icons10" custom-class="absolute -bottom-6 hidden h-7 w-6 text-[#F9D914]" />
            </div>
            <div class="relative flex cursor-pointer flex-col items-center">
                <div class="mains11 relative flex flex-col items-center justify-center" data-index="11">
                    <div class="image-11 h-[51px] w-[51px] rounded-lg py-3"></div>
                    <p class="mt-2 font-bold text-white lg:text-sm">Для авто</p>
                </div>
                <TriangleUpIcon id="icons11" custom-class="absolute -bottom-6 hidden h-7 w-6 text-[#F9D914]" />
            </div>
            <div class="relative flex cursor-pointer flex-col items-center">
                <div class="mains12 relative flex flex-col items-center justify-center" data-index="12">
                    <div class="image-12 h-[51px] w-[51px] rounded-lg px-4 py-3"></div>
                    <p class="mt-2 font-bold text-white lg:text-sm">Обучение</p>
                </div>
                <TriangleUpIcon id="icons12" custom-class="absolute -bottom-6 hidden h-7 w-6 text-[#F9D914]" />
            </div>
        </div>
        <!-- 768px mobile -->
        <div class="mobile_scroll -mx-2 hidden items-end justify-between px-4 lg:px-0">
            <div class="icons_block relative mx-2 flex min-w-[100px] cursor-pointer flex-col items-center">
                <div class="relative flex flex-col items-center justify-center" id="icons_block1" data-index="1">
                    <div class="image-1 h-[51px] w-[51px] rounded-lg px-4 py-3"></div>
                    <p class="mt-2 font-bold text-white lg:text-sm">Для него</p>
                </div>
            </div>
            <div class="icons_block relative mx-2 flex min-w-[100px] cursor-pointer flex-col items-center">
                <div class="relative flex flex-col items-center justify-center" id="icons_block2" data-index="2">
                    <div class="image-2 h-[51px] w-[51px] rounded-lg px-4 py-3"></div>
                    <p class="mt-2 font-bold text-white lg:text-sm">Для нее</p>
                </div>
            </div>
            <div class="icons_block relative mx-2 flex min-w-[100px] cursor-pointer flex-col items-center">
                <div class="relative flex flex-col items-center justify-center" id="icons_block3" data-index="3">
                    <div class="image-3 h-[41px] w-[49px] rounded-lg px-4 py-3"></div>
                    <p class="mt-3 font-bold text-white lg:text-sm">Детям</p>
                </div>
            </div>
            <div class="icons_block relative mx-2 flex min-w-[100px] cursor-pointer flex-col items-center">
                <div class="relative flex flex-col items-center justify-center" id="icons_block4" data-index="4">
                    <div class="image-4 h-[41px] w-[51px] rounded-lg px-4 py-3"></div>
                    <p class="mt-3 font-bold text-white lg:text-sm">Для дома</p>
                </div>
            </div>
            <div class="icons_block relative mx-2 flex min-w-[100px] cursor-pointer flex-col items-center">
                <div class="relative flex flex-col items-center justify-center" id="icons_block5" data-index="5">
                    <div class="image-5 h-[50px] w-[52px] rounded-lg px-4 py-3"></div>
                    <p class="mt-3 font-bold text-white lg:text-sm">Техника</p>
                </div>
            </div>
            <div class="icons_block relative mx-2 flex min-w-[100px] cursor-pointer flex-col items-center">
                <div class="relative flex flex-col items-center justify-center" id="icons_block6" data-index="6">
                    <div class="image-6 h-[50px] w-[52px] rounded-lg px-4 py-3"></div>
                    <p class="mt-2 font-bold text-white lg:text-sm">Красота</p>
                </div>
            </div>
            <div class="icons_block relative mx-2 flex min-w-[100px] cursor-pointer flex-col items-center">
                <div class="relative flex flex-col items-center justify-center" id="icons_block7" data-index="7">
                    <div class="image-7 h-[44px] w-[46px] rounded-lg px-4 py-3"></div>
                    <p class="mt-2 font-bold text-white lg:text-sm">Услуги</p>
                </div>
            </div>
            <div class="icons_block relative mx-2 flex min-w-[100px] cursor-pointer flex-col items-center">
                <div class="relative flex flex-col items-center justify-center" id="icons_block8" data-index="8">
                    <div class="image-8 h-[38px] w-[56px] rounded-lg px-4 py-3"></div>
                    <p class="mt-2 font-bold text-white lg:text-sm">Туризм</p>
                </div>
            </div>
            <div class="icons_block relative mx-2 flex min-w-[100px] cursor-pointer flex-col items-center">
                <div class="relative flex flex-col items-center justify-center" id="icons_block9" data-index="9">
                    <div class="image-9 h-[42px] w-[49px] rounded-lg px-4 py-3"></div>
                    <p class="mt-2 font-bold text-white lg:text-sm">Магазины</p>
                </div>
            </div>
            <div class="icons_block relative mx-2 flex min-w-[100px] cursor-pointer flex-col items-center">
                <div class="relative flex flex-col items-center justify-center" id="icons_block10" data-index="10">
                    <div class="image-10 h-[49px] w-[48px] rounded-lg px-4 py-3"></div>
                    <p class="mt-2 font-bold text-white lg:text-sm">Поесть</p>
                </div>
            </div>
            <div class="icons_block relative mx-2 flex min-w-[100px] cursor-pointer flex-col items-center">
                <div class="relative flex flex-col items-center justify-center" id="icons_block11" data-index="11">
                    <div class="image-11 h-[46px] w-[40px] rounded-lg py-3"></div>
                    <p class="mt-2 font-bold text-white lg:text-sm">Для авто</p>
                </div>
            </div>
            <div class="icons_block relative mx-2 flex min-w-[100px] cursor-pointer flex-col items-center">
                <div class="relative flex flex-col items-center justify-center" id="icons_block12" data-index="12">
                    <div class="image-12 h-[43px] w-[47px] rounded-lg px-4 py-3"></div>
                    <p class="mt-2 font-bold text-white lg:text-sm">Обучение</p>
                </div>
            </div>
        </div>
        <!-- 768px mobile -->
        <div class="drop_list absolute z-50 mt-3 hidden w-full flex-col bg-white shadow-lg">
            <div class="z-[1] h-[16px] w-full bg-[#F9D914]"></div>
            <div id="blocks_list" class="z-[10] flex gap-1 overflow-y-scroll bg-white px-[15px] py-[2px]">
                <ul id="lists" class="relative z-10 mt-[10px] w-1/3 overflow-y-scroll bg-white py-2 pr-[16px]">
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
                <div class="rightSide flex-1 overflow-y-scroll px-10 py-5">
                    <div class="headerWrap mb-6 flex items-center justify-between">
                        <h1 id="categoryTitle" class="align-center flex gap-3 text-2xl font-bold text-black">
                            Грузоперевозки <span class="strelka">></span>
                        </h1>

                        <!-- Поле поиска -->
                        <div class="relative mb-6">
                            <div class="absolute top-1/2 left-3 -translate-y-1/2">
                                <SearchIcon custom-class="h-5 w-5 text-gray-400" />
                            </div>
                            <input
                                type="text"
                                placeholder="Найти категорию..."
                                class="inputMenu w-full rounded-[10px]! border! border-[#1344871A]! bg-[#1344871A] py-2 pr-4 pl-10 focus:border-blue-500 focus:outline-none"
                                style="border-width: 1px"
                            />
                        </div>
                    </div>
                    <!-- Заголовок -->

                    <div class="grid grid-cols-3 gap-7">
                        <div class="category-block">
                            <h3 class="mb-2 text-base font-semibold text-black">Заголовок категории</h3>
                            <ul class="mt-3 flex flex-col gap-2 space-y-1">
                                <li class="text-sm text-[#585858]">Подраздел 1</li>
                                <li class="text-sm text-[#585858]">Подраздел 2</li>
                                <li class="text-sm text-[#585858]">Подраздел 3</li>
                            </ul>
                        </div>
                        <div class="category-block">
                            <h3 class="mb-2 text-base font-semibold text-black">Заголовок категории</h3>
                            <ul class="mt-3 flex flex-col gap-2 space-y-1">
                                <li class="text-sm text-[#585858]">Подраздел 1</li>
                                <li class="text-sm text-[#585858]">Подраздел 2</li>
                                <li class="text-sm text-[#585858]">Подраздел 3</li>
                            </ul>
                        </div>
                        <div class="category-block">
                            <h3 class="mb-2 text-base font-semibold text-black">Заголовок категории</h3>
                            <ul class="mt-3 flex flex-col gap-2 space-y-1">
                                <li class="text-sm text-[#585858]">Подраздел 1</li>
                                <li class="text-sm text-[#585858]">Подраздел 2</li>
                                <li class="text-sm text-[#585858]">Подраздел 3</li>
                            </ul>
                        </div>
                        <div class="category-block">
                            <h3 class="mb-2 text-base font-semibold text-black">Заголовок категории</h3>
                            <ul class="mt-3 flex flex-col gap-2 space-y-1">
                                <li class="text-sm text-[#585858]">Подраздел 1</li>
                                <li class="text-sm text-[#585858]">Подраздел 2</li>
                                <li class="text-sm text-[#585858]">Подраздел 3</li>
                            </ul>
                        </div>
                        <div class="category-block">
                            <h3 class="mb-2 text-base font-semibold text-black">Заголовок категории</h3>
                            <ul class="mt-3 flex flex-col gap-2 space-y-1">
                                <li class="text-sm text-[#585858]">Подраздел 1</li>
                                <li class="text-sm text-[#585858]">Подраздел 2</li>
                                <li class="text-sm text-[#585858]">Подраздел 3</li>
                            </ul>
                        </div>
                        <div class="category-block">
                            <h3 class="mb-2 text-base font-semibold text-black">Заголовок категории</h3>
                            <ul class="mt-3 flex flex-col gap-2 space-y-1">
                                <li class="text-sm text-[#585858]">Подраздел 1</li>
                                <li class="text-sm text-[#585858]">Подраздел 2</li>
                                <li class="text-sm text-[#585858]">Подраздел 3</li>
                            </ul>
                        </div>
                        <div class="category-block">
                            <h3 class="mb-2 text-base font-semibold text-black">Заголовок категории</h3>
                            <ul class="mt-3 flex flex-col gap-2 space-y-1">
                                <li class="text-sm text-[#585858]">Подраздел 1</li>
                                <li class="text-sm text-[#585858]">Подраздел 2</li>
                                <li class="text-sm text-[#585858]">Подраздел 3</li>
                            </ul>
                        </div>
                        <div class="category-block">
                            <h3 class="mb-2 text-base font-semibold text-black">Заголовок категории</h3>
                            <ul class="mt-3 flex flex-col gap-2 space-y-1">
                                <li class="text-sm text-[#585858]">Подраздел 1</li>
                                <li class="text-sm text-[#585858]">Подраздел 2</li>
                                <li class="text-sm text-[#585858]">Подраздел 3</li>
                            </ul>
                        </div>
                        <div class="category-block">
                            <h3 class="mb-2 text-base font-semibold text-black">Заголовок категории</h3>
                            <ul class="mt-3 flex flex-col gap-2 space-y-1">
                                <li class="text-sm text-[#585858]">Подраздел 1</li>
                                <li class="text-sm text-[#585858]">Подраздел 2</li>
                                <li class="text-sm text-[#585858]">Подраздел 3</li>
                            </ul>
                        </div>
                        <div class="category-block">
                            <h3 class="mb-2 text-base font-semibold text-black">Заголовок категории</h3>
                            <ul class="mt-3 flex flex-col gap-2 space-y-1">
                                <li class="text-sm text-[#585858]">Подраздел 1</li>
                                <li class="text-sm text-[#585858]">Подраздел 2</li>
                                <li class="text-sm text-[#585858]">Подраздел 3</li>
                            </ul>
                        </div>
                        <div class="category-block">
                            <h3 class="mb-2 text-base font-semibold text-black">Заголовок категории</h3>
                            <ul class="mt-3 flex flex-col gap-2 space-y-1">
                                <li class="text-sm text-[#585858]">Подраздел 1</li>
                                <li class="text-sm text-[#585858]">Подраздел 2</li>
                                <li class="text-sm text-[#585858]">Подраздел 3</li>
                            </ul>
                        </div>
                        <div class="category-block">
                            <h3 class="mb-2 text-base font-semibold text-black">Заголовок категории</h3>
                            <ul class="mt-3 flex flex-col gap-2 space-y-1">
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
