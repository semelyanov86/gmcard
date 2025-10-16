<script setup lang="ts">
import type { CategoryModel } from '@/types';
import { computed, ref } from 'vue';

interface Props {
    categories: CategoryModel[];
    selectedCategories?: string[];
}

const props = withDefaults(defineProps<Props>(), {
    selectedCategories: () => [],
});

const hoveredPath = ref<CategoryModel[]>([]);

function setHover(category: CategoryModel, level: number) {
    hoveredPath.value = [...hoveredPath.value.slice(0, level), category];
}

const visibleLevels = computed(() => {
    const levels: CategoryModel[][] = [props.categories];
    hoveredPath.value.forEach((cat) => {
        if (cat.children?.length) levels.push(cat.children);
    });
    return levels;
});
</script>

<template>
    <div class="mt-8 flex min-h-[100vh] flex-col rounded-2xl bg-white p-8 max-md:hidden max-md:p-4">
        <h3 class="ml-8 font-bold">Выберите категории, к которым будет прикреплена ваша акция</h3>
        <div class="bg-category mt-5 flex max-h-[100vh] w-full" @mouseleave="hoveredPath = []">
            <ul
                v-for="(levelCategories, level) in visibleLevels"
                :key="level"
                class="max-h-[100vh] overflow-y-scroll bg-[#fdfdfd]"
                :class="level === 0 ? 'w-[150px]' : level < 2 ? 'min-w-[200px]' : 'min-w-[250px]'"
            >
                <li
                    v-for="category in levelCategories"
                    :key="category.id"
                    @mouseenter="setHover(category, level)"
                    class="flex cursor-pointer border-t-[1px] px-4 py-2 hover:bg-[#0066cb] hover:text-white"
                    :class="{ 'bg-[#0066cb] text-white': hoveredPath[level]?.id === category.id }"
                >
                    <div class="flex w-full items-center gap-3">
                        <input v-if="level >= 2" type="checkbox" :value="category.id" @click.stop />
                        <span class="flex-1">{{ category.name }}</span>
                        <span v-if="category.children?.length" class="strelka">›</span>
                    </div>
                </li>
            </ul>
        </div>
        <div class="mx-8">
            <h3 class="mt-5 font-bold">Вы выбрали</h3>
            <div id="tag-container" class="flex flex-wrap gap-3 py-3"></div>
        </div>
    </div>
</template>
