<script setup lang="ts">
import { ProfilePromo } from '@/types/promo/ProfilePromo';

const props = defineProps<{
    promo: ProfilePromo;
}>();
</script>

<template>
    <div>
        <div class="rounded-xl lg:w-[232px] w-[262px] mt-7 relative main_card">
            <img
                :src="
                    props.promo.img && typeof props.promo.img === 'string' && props.promo.img.trim() !== ''
                        ? props.promo.img.startsWith('http')
                            ? props.promo.img
                            : `/storage/${props.promo.img}`
                        : '/images/png/profile/product6.png'
                "
                class="w-full rounded-t-3xl"
                alt="Товар"
                @error="$event.target.src = '/images/png/profile/product6.png'"
            />
            <div class="absolute -top-6 left-4 z-40" data-tooltip-target="tooltip-default" type="button">
                <img class="w-[77px] h-[52px]" src="/images/png/profile/sale4.png" alt="Скидка на товар" />
            </div>
            <div class="bg-white rounded-b-3xl lg:h-[150px] h-[136px] down_block text-[15px] text-[#000000] overflow-hidden">
                <h3 class="px-6 py-4 line-clamp-2">{{ props.promo.description || 'Без описания' }}</h3>
                <div class="w-full h-[1px] bg-black opacity-10"></div>
                <div class="flex items-center justify-between px-6 py-4">
                    <span class="text-[17px] font-bold">{{ props.promo.type }}</span>
                    <img src="/images/png/profile/sale4.png" class="w-[26px] h-[26px]" alt="скидка на товар" />
                </div>
            </div>
        </div>
        <div class="flex justify-between mt-5 items-center">
            <span class="text-sm" style="color: #648099">{{ props.promo.created_at }}</span>
            <div class="flex items-center gap-1">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="#648099"
                    class="w-6 cursor-pointer"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z"
                    />
                </svg>
                <span class="text-sm" style="color: #648099">{{ props.promo.likes_count || 0 }}</span>
            </div>
        </div>
    </div>
</template>
