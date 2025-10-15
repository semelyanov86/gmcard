<script setup lang="ts">
import { ref, computed } from 'vue';

interface Category {
    id: number;
    name: string;
    children?: Category[];
}

interface Props {
    categories: Category[];
    selectedCategories?: string[];
}

const props = withDefaults(defineProps<Props>(), {
    selectedCategories: () => [],
});

const hoveredPath = ref<Category[]>([]);

function setHover(category: Category, level: number) {
    hoveredPath.value = [...hoveredPath.value.slice(0, level), category];
}

const visibleLevels = computed(() => {
    const levels: Category[][] = [props.categories];
    hoveredPath.value.forEach((cat) => {
        if (cat.children?.length) levels.push(cat.children);
    });
    return levels;
});
</script>

<template>
    <div class="flex bg-white p-8 max-md:p-4 max-md:hidden mt-8 rounded-2xl flex-col min-h-[100vh]">
        <h3 class="font-bold ml-8">Выберите категории, к которым будет прикреплена ваша акция</h3>
        <div 
            class="mt-5 bg-category w-full flex max-h-[100vh]" 
            @mouseleave="hoveredPath = []"
        >
            <ul 
                v-for="(levelCategories, level) in visibleLevels" 
                :key="level"
                class="bg-[#fdfdfd] overflow-y-scroll max-h-[100vh]"
                :class="level === 0 ? 'w-[150px]' : level < 2 ? 'min-w-[200px]' : 'min-w-[250px]'"
            >
                <li 
                    v-for="category in levelCategories" 
                    :key="category.id"
                    @mouseenter="setHover(category, level)"
                    class="py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex cursor-pointer"
                    :class="{ 'bg-[#0066cb] text-white': hoveredPath[level]?.id === category.id }"
                >
                    <div class="flex items-center gap-3 w-full">
                        <input 
                            v-if="level >= 2" 
                            type="checkbox" 
                            :value="category.id"
                            @click.stop
                        >
                        <span class="flex-1">{{ category.name }}</span>
                        <span v-if="category.children?.length" class="strelka">›</span>
                    </div>
                </li>
            </ul>
        </div>
        <div class="mx-8">
            <h3 class="font-bold mt-5">Вы выбрали</h3>
            <div id="tag-container" class="flex flex-wrap gap-3 py-3"></div>
        </div>
    </div>
</template>
