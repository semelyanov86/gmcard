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
            :class="[`mains${category.icon_index ?? index + 1}`, 'icons_block relative mx-2 flex cursor-pointer flex-col items-center flex-shrink-0 min-w-[100px] w-[120px]']"
            @click="handleClick"
        >
            <div class="relative flex flex-col items-center justify-center w-full">
                <div :class="`image-${category.icon_index ?? index + 1}`" class="h-13 w-13 rounded-lg px-4 py-3" />
                <p class="mt-2 font-bold text-white lg:text-sm text-center w-full px-1 line-clamp-3 break-words" style="min-height: 5em; max-height: 5em; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;">{{ category.name }}</p>
            </div>
        </div>
    </div>
</template>

