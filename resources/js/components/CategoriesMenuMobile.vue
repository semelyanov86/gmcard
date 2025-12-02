<script setup lang="ts">
import type { CategoryModel } from '@/types';
import { computed } from 'vue';

interface Props {
    categories?: CategoryModel[];
    isDropdownOpen: boolean;
}

const props = defineProps<Props>();

const mainCategories = computed(() => props.categories || []);

const emit = defineEmits<{
    'open-dropdown': [];
}>();

const handleClick = () => {
    emit('open-dropdown');
};
</script>

<template>
    <div class="mobile_scroll -mx-2 hidden items-end justify-between px-4 lg:px-0">
        <div
            v-for="(category, index) in mainCategories"
            :key="`mobile-${category.id || category.name}`"
            :class="[
                `mains${category.icon_index ?? index + 1}`,
                'icons_block relative mx-2 flex w-[120px] min-w-[100px] flex-shrink-0 cursor-pointer flex-col items-center',
            ]"
            @click="handleClick"
        >
            <div class="relative flex w-full flex-col items-center justify-center">
                <div :class="`image-${category.icon_index ?? index + 1}`" class="h-13 w-13 rounded-lg px-4 py-3" />
                <p class="category-name mt-2 line-clamp-3 w-full px-1 text-center font-bold break-words text-white lg:text-sm">
                    {{ category.name }}
                </p>
            </div>
        </div>
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
