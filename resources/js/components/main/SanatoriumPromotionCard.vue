<script setup lang="ts">
import PromoTypeIcon from '@/components/main/PromoTypeIcon.vue';
import type { ProfilePromo } from '@/types/promo/ProfilePromo';
import { Link } from '@inertiajs/vue3';
import { computed } from 'vue';

const props = defineProps<{
    promo: ProfilePromo;
}>();

const imageSrc = computed(() => {
    if (props.promo.img && typeof props.promo.img === 'string' && props.promo.img.trim() !== '') {
        return props.promo.img.startsWith('http') ? props.promo.img : `/storage/${props.promo.img}`;
    }
    return '';
});
</script>

<template>
    <Link :href="route('promo.show', props.promo.id)" class="block">
        <div class="main_card sanatorium-card relative mx-1 mt-11 rounded-xl">
            <img :src="imageSrc" class="sanatorium-image w-full rounded-t-xl bg-white object-cover" alt="Товар" />
            <div class="absolute -top-6 left-4 z-10">
                <PromoTypeIcon :icon="props.promo.promoTypeIcon ?? null" />
            </div>
            <div class="down_block sanatorium-content flex flex-col justify-between rounded-b-3xl bg-white text-[#000000]">
                <h3 class="line-clamp-2 px-6 py-4">
                    {{ props.promo.name ?? '' }}
                </h3>
                <div class="h-px w-full bg-black opacity-10"></div>
                <div class="flex items-center justify-between px-6 py-4">
                    <span class="sanatorium-type font-bold">{{ props.promo.type ?? '' }}</span>
                    <PromoTypeIcon :icon="props.promo.promoTypeIcon ?? null" sizeClass="sanatorium-icon-small" />
                </div>
            </div>
        </div>
    </Link>
</template>

<style scoped>
.sanatorium-card {
    width: 232px;
}

@media (min-width: 1024px) {
    .sanatorium-card {
        width: 262px;
    }
}

.sanatorium-image {
    height: 200px;
}

.sanatorium-content {
    height: 136px;
    font-size: 15px;
}

@media (min-width: 1024px) {
    .sanatorium-content {
        height: 150px;
    }
}

.sanatorium-type {
    font-size: 17px;
}

.sanatorium-icon-small {
    height: 26px;
    width: 26px;
}
</style>
