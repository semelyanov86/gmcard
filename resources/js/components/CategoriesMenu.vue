<script setup lang="ts">
import SearchIcon from '@/components/primitives/icons/SearchIcon.vue';
import TriangleUpIcon from '@/components/primitives/icons/TriangleUpIcon.vue';
import AdaptiveImage from '@/components/ui/AdaptiveImage.vue';
import CategoriesMenuMobile from '@/components/CategoriesMenuMobile.vue';
import type { CategoryModel } from '@/types';
import { computed, ref } from 'vue';

interface Props {
    categories?: CategoryModel[];
}

const props = withDefaults(defineProps<Props>(), {
    categories: () => [],
});

interface SubCategory {
    name: string;
    iconPath: string;
}

const mainCategories = computed(() => props.categories || []);

const subCategories: SubCategory[] = [
    { name: 'Грузоперевозки', iconPath: 'menu_icons/carpng' },
    { name: 'Фото, видео, аудио', iconPath: 'menu_icons/photo' },
    { name: 'Свадьба и торжества', iconPath: 'menu_icons/ring' },
    { name: 'Все для красоты', iconPath: 'menu_icons/kiss' },
    { name: 'Врачи', iconPath: 'menu_icons/hos' },
    { name: 'IT-фрилансеры', iconPath: 'menu_icons/comp' },
    { name: 'Ремонт и стройка', iconPath: 'menu_icons/tools' },
    { name: 'Для авто', iconPath: 'menu_icons/wheel' },
    { name: 'Бухгалтеры и юристы', iconPath: 'menu_icons/teach' },
    { name: 'Ветеринары', iconPath: 'menu_icons/dog' },
];

const activeCategoryIndex = ref<number | null>(null);
const isDropdownOpen = ref(false);
const selectedSubCategory = ref('Грузоперевозки');

const handleMainCategoryHover = (index: number) => {
    activeCategoryIndex.value = index;
    isDropdownOpen.value = true;
};

const handleContainerLeave = () => {
    isDropdownOpen.value = false;
    activeCategoryIndex.value = null;
};

const handleSubCategoryHover = (categoryName: string) => {
    selectedSubCategory.value = categoryName;
};
</script>

<template>
    <div class="relative w-full py-4 md:py-0" @mouseleave="handleContainerLeave">
        <div class="mobile_desctop -mx-2 flex items-end justify-between px-4 lg:px-0">
            <div
                v-for="(category, index) in mainCategories"
                :key="category.id || category.name"
                :class="[`mains${category.icon_index ?? index + 1}`, 'relative flex cursor-pointer flex-col items-center flex-shrink-0 min-w-0 w-[95px]']"
                @mouseenter="handleMainCategoryHover(index)"
            >
                <div class="relative flex flex-col items-center justify-center w-full">
                    <div :class="`image-${category.icon_index ?? index + 1}`" class="h-13 w-13 rounded-lg px-4 py-3" />
                    <p class="mt-2 font-bold text-white lg:text-sm text-center w-full px-1 line-clamp-3 break-words" style="min-height: 5em; max-height: 5em; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;">{{ category.name }}</p>
                </div>
                <TriangleUpIcon :class="{ hidden: activeCategoryIndex !== index }" custom-class="absolute -bottom-6 h-7 w-6 text-brand-yellow" />
            </div>
        </div>

        <CategoriesMenuMobile :categories="mainCategories" :is-dropdown-open="isDropdownOpen" @open-dropdown="isDropdownOpen = true" />

        <div v-show="isDropdownOpen" class="drop_list absolute z-50 mt-3 flex w-full flex-col bg-white shadow-lg" @mouseenter="isDropdownOpen = true">
            <div class="bg-brand-yellow z-[1] h-[16px] w-full" />
            <div class="z-[10] flex gap-1 overflow-y-scroll bg-white px-[15px] py-[2px]">
                <ul class="relative z-10 mt-[10px] w-1/3 overflow-y-scroll bg-white py-2 pr-[16px]">
                    <li
                        v-for="subCategory in subCategories"
                        :key="subCategory.name"
                        class="my-class"
                        @mouseenter="handleSubCategoryHover(subCategory.name)"
                    >
                        <div class="icon-container">
                            <AdaptiveImage :image-path="subCategory.iconPath" :alt="subCategory.name" image-class="category-icon" />
                            <span>{{ subCategory.name }}</span>
                        </div>
                        <span class="strelka">›</span>
                    </li>
                </ul>

                <div class="rightSide flex-1 overflow-y-scroll px-10 py-5">
                    <div class="headerWrap mb-6 flex items-center justify-between">
                        <h1 class="align-center flex gap-3 text-2xl font-bold text-black">
                            {{ selectedSubCategory }} <span class="strelka">></span>
                        </h1>
                        <div class="relative mb-6">
                            <div class="absolute inset-y-0 left-3 flex items-center">
                                <SearchIcon custom-class="h-5 w-5 text-gray-400" />
                            </div>
                            <input
                                type="text"
                                placeholder="Найти категорию..."
                                class="inputMenu border-brand-blue-alpha bg-brand-blue-alpha w-full rounded-[10px] border py-2 pr-4 pl-10 focus:border-blue-500 focus:outline-none"
                            />
                        </div>
                    </div>
                    <div class="grid grid-cols-3 gap-7">
                        <div v-for="i in 12" :key="i" class="category-block">
                            <h3 class="mb-2 text-base font-semibold text-black">Заголовок категории</h3>
                            <ul class="mt-3 flex flex-col gap-2 space-y-1">
                                <li class="text-brand-text text-sm">Подраздел 1</li>
                                <li class="text-brand-text text-sm">Подраздел 2</li>
                                <li class="text-brand-text text-sm">Подраздел 3</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
