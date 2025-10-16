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

const emit = defineEmits<{
    'update:selectedCategories': [value: string[]];
}>();

const hoveredPath = ref<CategoryModel[]>([]);
const localSelectedCategories = ref<string[]>([...props.selectedCategories]);

function setHover(category: CategoryModel, level: number) {
    hoveredPath.value = [...hoveredPath.value.slice(0, level), category];
}

function toggleCategory(categoryId: number) {
    const categoryIdStr = String(categoryId);
    const index = localSelectedCategories.value.indexOf(categoryIdStr);
    
    if (index > -1) {
        localSelectedCategories.value.splice(index, 1);
    } else {
        localSelectedCategories.value.push(categoryIdStr);
    }
    
    emit('update:selectedCategories', [...localSelectedCategories.value]);
}

function isCategorySelected(categoryId: number): boolean {
    return localSelectedCategories.value.includes(String(categoryId));
}

const visibleLevels = computed(() => {
    const levels: CategoryModel[][] = [props.categories];
    hoveredPath.value.forEach((cat) => {
        if (cat.children?.length) levels.push(cat.children);
    });
    return levels;
});

const selectedCategoriesNames = computed(() => {
    const findCategoryById = (cats: CategoryModel[], id: string): CategoryModel | null => {
        for (const cat of cats) {
            if (String(cat.id) === id) return cat;
            if (cat.children) {
                const found = findCategoryById(cat.children, id);
                if (found) return found;
            }
        }
        return null;
    };
    
    return localSelectedCategories.value
        .map(id => findCategoryById(props.categories, id))
        .filter(cat => cat !== null)
        .map(cat => cat!.name);
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
                        <input 
                            v-if="level >= 2" 
                            type="checkbox" 
                            :checked="isCategorySelected(category.id)"
                            @click.stop="toggleCategory(category.id)"
                        />
                        <span class="flex-1">{{ category.name }}</span>
                        <span v-if="category.children?.length" class="strelka">›</span>
                    </div>
                </li>
            </ul>
        </div>
        <div class="mx-8">
            <h3 class="mt-5 font-bold">Вы выбрали</h3>
            <div id="tag-container" class="flex flex-wrap gap-3 py-3">
                <span 
                    v-for="name in selectedCategoriesNames" 
                    :key="name"
                    class="rounded-md bg-[#e9eef1] px-4 py-2"
                >
                    {{ name }}
                </span>
            </div>
        </div>
    </div>
</template>
