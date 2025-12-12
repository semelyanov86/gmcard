<script setup lang="ts">
import SanatoriumPromotionCard from '@/components/main/SanatoriumPromotionCard.vue';
import type { ProfilePromo } from '@/types/promo/ProfilePromo';
import { computed, ref } from 'vue';

const props = defineProps<{
    promos?: ProfilePromo[];
}>();

const visibleCount = ref(12);
const allPromos = computed(() => props.promos ?? []);
const featuredPromos = computed(() => allPromos.value.slice(0, visibleCount.value));
const hasMore = computed(() => allPromos.value.length > featuredPromos.value.length);

const loadMore = () => {
    if (!hasMore.value) return;
    visibleCount.value += 12;
};
</script>

<template>
    <div class="h-[1px] w-full bg-white opacity-10"></div>
    <div class="mt-6 mb-12 flex w-full flex-col">
        <h3 class="text-[34px] font-bold text-white">Популярные акции</h3>
        <div class="flex flex-wrap justify-between">
            <SanatoriumPromotionCard v-for="promo in featuredPromos" :key="promo.id" :promo="promo" />
        </div>
        <div class="mt-16 flex items-center justify-center">
            <button
                class="flex h-[55px] w-[449px] items-center justify-center rounded-md bg-[#F9D914] text-center focus:ring-2 focus:ring-[#F9D914]"
                type="button"
                :disabled="!hasMore"
                @click="loadMore"
            >
                Показать еще
                <img src="/images/png/images/spiner.png" class="ml-4 h-[16px] w-[16px]" alt="loading" />
            </button>
        </div>
        <div class="mt-12 h-[1px] w-full bg-white opacity-10"></div>
    </div>
</template>

<style scoped></style>
