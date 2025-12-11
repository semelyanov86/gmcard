<script setup lang="ts">
import { computed } from 'vue';
import type { ProfilePromo } from '@/types/promo/ProfilePromo';
import PromoTypeIcon from '@/components/main/PromoTypeIcon.vue';

const props = defineProps<{
    promo?: ProfilePromo;
}>();

const imageSrc = computed(() => {
    if (props.promo?.img && typeof props.promo.img === 'string' && props.promo.img.trim() !== '') {
        return props.promo.img.startsWith('http') ? props.promo.img : `/storage/${props.promo.img}`;
    }
    return '';
});

</script>

<template>
    <div class="main_card relative mx-1 mt-11 w-[262px] rounded-xl lg:w-[232px]">
        <img :src="imageSrc" class="h-[200px] w-full rounded-t-xl object-cover" alt="Товар" />
        <div class="absolute -top-6 left-4 z-40">
            <PromoTypeIcon :type="props.promo?.type" />
        </div>
        <div class="down_block flex h-[136px] flex-col justify-between rounded-b-3xl bg-white text-[15px] text-[#000000] lg:h-[150px]">
            <h3 class="line-clamp-2 px-6 py-4">
                {{ props.promo?.name ?? '' }}
            </h3>
            <div class="h-[1px] w-full bg-black opacity-10"></div>
            <div class="flex items-center justify-between px-6 py-4">
                <span class="text-[17px] font-bold">{{ props.promo?.type ?? '' }}</span>
                <img src="/images/png/images/sale.png" class="h-[26px] w-[26px]" alt="скидка на товар" />
            </div>
        </div>
    </div>
</template>

<style scoped></style>

