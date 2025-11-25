<script setup lang="ts">
import LikeIcon from '@/components/Promo/icons/LikeIcon.vue';
import { ProfilePromo } from '@/types/promo/ProfilePromo';
import { computed } from 'vue';

const props = defineProps<{
    promo: ProfilePromo;
}>();

const imageSrc = computed(() => {
    if (props.promo.img && typeof props.promo.img === 'string' && props.promo.img.trim() !== '') {
        return props.promo.img.startsWith('http') ? props.promo.img : `/storage/${props.promo.img}`;
    }
    return '/images/png/profile/product6.png';
});

function handleImageError(e: Event) {
    const target = e.target as HTMLImageElement;
    if (target) {
        target.src = '/images/png/profile/product6.png';
    }
}
</script>

<template>
    <div>
        <div class="main_card relative mt-7 w-[262px] rounded-xl lg:w-[232px]">
            <img :src="imageSrc" class="w-full rounded-t-3xl" alt="Товар" @error="handleImageError" />
            <div class="absolute -top-6 left-4 z-40" data-tooltip-target="tooltip-default" type="button">
                <img class="h-[52px] w-[77px]" src="/images/png/profile/sale4.png" alt="Скидка на товар" />
            </div>
            <div class="down_block h-[136px] overflow-hidden rounded-b-3xl bg-white text-[15px] text-black lg:h-[150px]">
                <h3 class="line-clamp-2 px-6 py-4">{{ props.promo.description || 'Без описания' }}</h3>
                <div class="h-[1px] w-full bg-black opacity-10"></div>
                <div class="flex items-center justify-between px-6 py-4">
                    <span class="text-[17px] font-bold">{{ props.promo.type }}</span>
                    <img src="/images/png/profile/sale4.png" class="h-[26px] w-[26px]" alt="скидка на товар" />
                </div>
            </div>
        </div>
        <div class="mt-5 flex items-center justify-between">
            <span class="text-sm text-icon">{{ props.promo.created_at }}</span>
            <div class="flex items-center gap-1">
                <LikeIcon />
                <span class="text-sm text-icon">{{ props.promo.likes_count || 0 }}</span>
            </div>
        </div>
    </div>
</template>
