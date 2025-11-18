<script setup lang="ts">
import { ProfilePromo } from '@/types/promo/ProfilePromo';

const props = defineProps<{
    promo: ProfilePromo;
}>();
</script>

<template>
    <div>
        <div class="main_card relative mt-7 w-262 rounded-3xl border border-white/10 lg:w-232">
            <img
                :src="
                    props.promo.img
                        ? props.promo.img.startsWith('http')
                            ? props.promo.img
                            : `/storage/${props.promo.img}`
                        : '/images/png/profile/product6.png'
                "
                class="h-44 w-full rounded-t-3xl object-cover"
                alt="Товар"
            />
            <div class="pointer-events-none absolute -top-6 left-4 z-10">
                <img class="h-14 w-20" src="/images/png/profile/sale4.png" alt="Скидка на товар" />
            </div>
            <div class="down_block h-36 rounded-b-3xl bg-white text-sm text-[#000000] lg:h-36">
                <h3 class="line-clamp-2 overflow-hidden px-6 py-4">{{ props.promo.description || 'Без описания' }}</h3>
                <div class="h-line w-full bg-black opacity-10"></div>
                <div class="flex items-center justify-between px-6 py-4">
                    <span class="text-[17px] font-bold">{{ props.promo.type }}</span>
                    <img src="/images/png/profile/sale4.png" class="h-7 w-7" alt="скидка на товар" />
                </div>
            </div>
        </div>
        <div class="mt-5 flex items-center justify-between">
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
