<script setup lang="ts">
import PromoTypeIcon from '@/components/main/PromoTypeIcon.vue';
import PromoDeliveryBadge from '@/components/promoShow/PromoDeliveryBadge.vue';
import { computed } from 'vue';

const props = defineProps<{
    img?: string | null;
    photos?: string[] | null;
    title?: string | null;
    promoTypeIcon?: string | null;
    hasFreeDeliveryBadge?: boolean | null;
}>();

function resolvePhotoUrl(path: string) {
    return path.startsWith('http') ? path : `/storage/${path}`;
}

const allPhotoUrls = computed(() => (props.photos ?? []).map(resolvePhotoUrl).filter(Boolean));

const imageSrc = computed(() => {
    if (allPhotoUrls.value.length > 0) {
        return allPhotoUrls.value[0];
    }

    if (props.img && typeof props.img === 'string' && props.img.trim() !== '') {
        return resolvePhotoUrl(props.img);
    }

    return '/images/png/profile/product6.png';
});
</script>

<template>
    <div class="promo-image relative w-full overflow-visible rounded-t-3xl">
        <div class="absolute -top-6 left-4 z-10">
            <PromoTypeIcon v-if="props.promoTypeIcon" :icon="props.promoTypeIcon" sizeClass="promo-image-type-badge" alt="Тип акции" />
            <img v-else class="specImgSale promo-image-badge-main" src="/images/png/images/discount.png" alt="Скидка на товар" />
        </div>
        <PromoDeliveryBadge v-if="props.hasFreeDeliveryBadge" label="Бесплатная доставка" />

        <img
            data-role="promo-main-gallery-image"
            :src="imageSrc"
            class="h-full w-full rounded-t-3xl object-cover"
            :alt="props.title || 'Promo'"
        />
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

.promo-image-type-badge {
    height: 90px;
    width: 90px;
}

.promo-image-badge-delivery {
    height: 70px;
    width: 120px;
}
</style>
