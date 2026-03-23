<script setup lang="ts">
import { computed } from 'vue';

const props = defineProps<{
    img?: string | null;
    title?: string | null;
}>();

const imageSrc = computed(() => {
    if (props.img && typeof props.img === 'string' && props.img.trim() !== '') {
        return props.img.startsWith('http') ? props.img : `/storage/${props.img}`;
    }

    return '/images/png/profile/product6.png';
});
</script>

<template>
    <div class="promo-image relative w-full overflow-visible rounded-t-3xl">
        <div class="absolute -top-6 left-4 z-10">
            <img class="specImgSale promo-image-badge-main" src="/images/png/images/discount.png" alt="Скидка на товар" />
        </div>
        <div class="absolute -top-6 right-10 z-10">
            <img class="specImgSale promo-image-badge-delivery object-contain" src="/images/png/sale/delivary.png" alt="Скидка на товар" />
            <p id="sale_for_promo" class="inline-block rounded-lg border border-gray-200 bg-white px-2 py-1 font-bold text-black shadow-sm"></p>
        </div>
        <img :src="imageSrc" class="h-full w-full rounded-t-3xl object-cover" :alt="props.title || 'Promo'" />
    </div>
</template>

<style scoped>
.promo-image {
    height: 380px;
}

.promo-image-badge-main {
    height: 90px;
    width: 90px;
}

.promo-image-badge-delivery {
    height: 70px;
    width: 120px;
}
</style>
