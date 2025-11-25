<script setup lang="ts">
import CategoriesMenuMobile from '@/components/CategoriesMenuMobile.vue';
import SearchIcon from '@/components/primitives/icons/SearchIcon.vue';
import TriangleUpIcon from '@/components/primitives/icons/TriangleUpIcon.vue';
import type { CategoryModel } from '@/types';
import { computed, ref } from 'vue';

interface Props {
    categories?: CategoryModel[];
}

const props = withDefaults(defineProps<Props>(), {
    categories: () => [],
});

const activeMainCategory = ref<CategoryModel | null>(null);
const selectedSubCategory = ref<CategoryModel | null>(null);
const searchQuery = ref('');

const filteredSubSubCategories = computed(() => {
    if (!selectedSubCategory.value?.children) return [];
    if (!searchQuery.value.trim()) return selectedSubCategory.value.children;

    const query = searchQuery.value.toLowerCase();
    return selectedSubCategory.value.children.filter((cat) => cat.name.toLowerCase().includes(query));
});

const handleMainCategoryHover = (category: CategoryModel) => {
    activeMainCategory.value = category;
    selectedSubCategory.value = category.children?.[0] || null;
    searchQuery.value = '';
};

const handleContainerLeave = () => {
    activeMainCategory.value = null;
    selectedSubCategory.value = null;
    searchQuery.value = '';
};

const handleSubCategoryHover = (category: CategoryModel) => {
    selectedSubCategory.value = category;
};
</script>

<template>
    <div class="relative w-full py-4 md:py-0" @mouseleave="handleContainerLeave">
        <div class="mobile_desctop -mx-2 flex items-end justify-between px-4 lg:px-0">
            <div
                v-for="(category, index) in props.categories"
                :key="category.id"
                :class="[
                    `mains${category.icon_index ?? index + 1}`,
                    'relative flex w-[95px] min-w-0 flex-shrink-0 cursor-pointer flex-col items-center',
                ]"
                @mouseenter="handleMainCategoryHover(category)"
            >
                <div class="relative flex w-full flex-col items-center justify-center">
                    <div :class="`image-${category.icon_index ?? index + 1}`" class="h-13 w-13 rounded-lg px-4 py-3" />
                    <p
                        class="mt-2 line-clamp-3 w-full px-1 text-center font-bold break-words text-white lg:text-sm"
                        style="
                            min-height: 5em;
                            max-height: 5em;
                            overflow: hidden;
                            display: -webkit-box;
                            -webkit-line-clamp: 3;
                            -webkit-box-orient: vertical;
                        "
                    >
                        {{ category.name }}
                    </p>
                </div>
                <TriangleUpIcon
                    :class="{ hidden: activeMainCategory?.id !== category.id }"
                    custom-class="absolute -bottom-6 h-7 w-6 text-brand-yellow"
                />
            </div>
        </div>

        <CategoriesMenuMobile
            :categories="props.categories"
            :is-dropdown-open="!!activeMainCategory"
            @open-dropdown="activeMainCategory = props.categories[0]"
        />

        <div v-show="activeMainCategory" class="drop_list absolute z-50 mt-3 flex w-full flex-col bg-white shadow-lg">
            <div class="bg-brand-yellow z-[1] h-[16px] w-full" />
            <div class="z-[10] flex gap-1 overflow-y-scroll bg-white px-[15px] py-[2px]">
                <ul class="relative z-10 mt-[10px] w-1/3 overflow-y-scroll bg-white py-2 pr-[16px]">
                    <li
                        v-for="subCategory in activeMainCategory?.children || []"
                        :key="subCategory.id"
                        class="my-class hover:bg-hover cursor-pointer rounded-lg px-4 py-3 transition-colors"
                        :class="{ 'bg-hover': selectedSubCategory?.id === subCategory.id }"
                        @mouseenter="handleSubCategoryHover(subCategory)"
                    >
                        <div class="icon-container flex items-center gap-3">
                            <span>{{ subCategory.name }}</span>
                        </div>
                        <span class="strelka">›</span>
                    </li>
                </ul>

                <div class="rightSide flex-1 overflow-y-scroll px-10 py-5">
                    <div class="headerWrap mb-6 flex items-center justify-between">
                        <h1 class="align-center flex gap-3 text-2xl font-bold text-black">
                            {{ selectedSubCategory?.name || 'Выберите категорию' }} <span class="strelka">></span>
                        </h1>
                        <div class="relative mb-6">
                            <div class="absolute inset-y-0 left-3 flex items-center">
                                <SearchIcon custom-class="h-5 w-5 text-gray-400" />
                            </div>
                            <input
                                v-model="searchQuery"
                                type="text"
                                placeholder="Найти категорию..."
                                class="inputMenu border-brand-blue-alpha bg-brand-blue-alpha w-full rounded-[10px] border py-2 pr-4 pl-10 focus:border-blue-500 focus:outline-none"
                            />
                        </div>
                    </div>
                    <div v-if="filteredSubSubCategories.length > 0" class="grid grid-cols-3 gap-7">
                        <div v-for="category in filteredSubSubCategories" :key="category.id" class="category-block">
                            <h3 class="mb-2 text-base font-semibold text-black">{{ category.name }}</h3>
                            <ul v-if="category.children && category.children.length > 0" class="mt-3 flex flex-col gap-2 space-y-1">
                                <li
                                    v-for="child in category.children"
                                    :key="child.id"
                                    class="text-brand-text cursor-pointer text-sm hover:text-blue-600"
                                >
                                    {{ child.name }}
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div v-else-if="selectedSubCategory && !selectedSubCategory.children?.length" class="py-8 text-center text-gray-500">
                        Нет подкатегорий
                    </div>
                    <div v-else-if="!selectedSubCategory" class="py-8 text-center text-gray-500">Выберите категорию из списка слева</div>
                    <div v-else class="py-8 text-center text-gray-500">Ничего не найдено</div>
                </div>
            </div>
        </div>
    </div>
</template>
