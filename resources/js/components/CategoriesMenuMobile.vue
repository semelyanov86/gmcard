<script setup lang="ts">
import type { CategoryModel } from '@/types';
import { Link } from '@inertiajs/vue3';
import { computed } from 'vue';

interface Props {
    categories?: CategoryModel[];
}

const props = defineProps<Props>();

const mainCategories = computed(() => props.categories || []);

function mainCategoryVisualIndex(category: CategoryModel, fallbackIndex: number): number {
    const normalizeCategoryName = (name: string): string => name.toLowerCase().replace(/\s+/g, ' ').trim();

    const rootIconIndexByName: Record<string, number> = {
        'товары для детей': 1,
        'мода и стиль': 2,
        'электроника и бытовая техника': 3,
        'дом, ремонт и сад': 4,
        'рестораны, кафе и доставка': 5,
        'цветы и подарки': 6,
        'красота, здоровье, гигиена': 7,
        'спорт и активный образ жизни': 8,
        'авто- и мототовары': 9,
        'услуги, образование и курсы': 10,
        зоотовары: 11,
        'досуг, культура и путешествия': 12,
    };

    return rootIconIndexByName[normalizeCategoryName(category.name)] ?? category.icon_index ?? fallbackIndex;
}
</script>

<template>
    <div class="mobile_scroll -mx-2 hidden items-end justify-between px-4 lg:px-0">
        <Link
            v-for="(category, index) in mainCategories"
            :key="`mobile-${category.id || category.name}`"
            :href="route('categories.promos', category.id)"
            :class="[
                `mains${mainCategoryVisualIndex(category, index + 1)}`,
                'icons_block relative mx-2 flex w-[120px] min-w-[100px] flex-shrink-0 cursor-pointer flex-col items-center no-underline',
            ]"
        >
            <div class="relative flex w-full flex-col items-center justify-center">
                <div :class="`image-${mainCategoryVisualIndex(category, index + 1)}`" class="h-13 w-13 rounded-lg px-4 py-3" />
                <p class="category-name mt-2 line-clamp-3 w-full px-1 text-center font-bold break-words text-white lg:text-sm">
                    {{ category.name }}
                </p>
            </div>
        </Link>
    </div>
</template>

<style scoped>
.category-name {
    min-height: 5em;
    max-height: 5em;
    overflow: hidden;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
}
</style>
