<script setup lang="ts">
import { computed } from 'vue';

const props = defineProps<{
    type?: string | null;
}>();

const icons: Record<string, { src: string; class: string; alt: string }> = {
    'Простая акция': { src: '/images/png/images/sale.png', class: 'h-[77px] w-[77px]', alt: 'Скидка на товар' },
    'Купон': { src: '/images/png/images/sale2.png', class: 'h-[62px] w-[83px]', alt: 'Купон' },
    'Подарок': { src: '/images/png/images/present.png', class: 'h-[69px] w-[67px]', alt: 'Подарок' },
    'Кэшбэк': { src: '/images/png/images/sale3.png', class: 'h-[78px] w-[78px]', alt: 'Кэшбэк' },
    'Два плюс один': { src: '/images/png/images/sale4.png', class: 'h-[52px] w-[77px]', alt: 'Два плюс один' },
    'Конкурс': { src: '/images/png/images/podium.png', class: 'h-[69px] w-[67px]', alt: 'Конкурс' },
    'Один плюс один': { src: '/images/png/images/sale5.png', class: 'h-[54px] w-[82px]', alt: 'Один плюс один' },
};

const fallback = icons['Простая акция'];

const current = computed(() => (props.type && icons[props.type]) || fallback);
</script>

<template>
    <img :src="current.src" :class="current.class" :alt="current.alt" />
</template>

