<script setup lang="ts">
import PromoTypeIcon from '@/components/main/PromoTypeIcon.vue';

defineProps<{
    promoTypeIcon?: string | null;
    promoName?: string | null;
}>();

const emit = defineEmits<{
    'get-promo-code': [];

}>();
</script>

<template>
    <div class="salesLink2 rounded-3xl border bg-white py-4 shadow-2xl">
        <div class="">
            <p class="flex items-center px-6 py-2">
                До конца акции
                <img src="/images/png/images/alarm.png" class="mx-2 opacity-50" alt="time" />
                <strong>4 дня 15:13:15</strong>
            </p>
            <div class="h-px w-full bg-black/20"></div>
            <div class="px-6 py-2">
                <h2 class="mt-2 text-lg">Зимняя распродажа до -50% на все в Снежная Королева!</h2>
                <div class="mt-4 flex items-center gap-2">
                    <PromoTypeIcon
                        v-if="promoTypeIcon"
                        :icon="promoTypeIcon"
                        sizeClass="w-12 h-12"
                        alt="discount"
                    />
                    <img v-else src="/images/png/images/discount.png" class="w-12" alt="discount" />
                    <span class="text-3xl font-bold">
                        {{ promoName }}
                    </span>
                </div>
                <div class="relative flex flex-col items-start">
                    <div class="promo-accent-line absolute left-10 h-full"></div>
                    <h4 class="ml-14 text-sm font-bold">Дополнительный условия</h4>
                    <p class="ml-14 text-sm">
                        Сделай покупки на сумму выше 60 000 рублей и используй промокод что бы получить скидку до 10 000 рублей
                    </p>
                    <h4 class="mt-4 ml-14 text-sm font-bold">Минимальная сумма</h4>
                    <p class="ml-14 text-sm">10 000 рублей</p>
                </div>
            </div>
            <div class="w-full px-3">
                <button
                    @click="emit('get-promo-code')"
                    class="promo-main-button mt-5 inline-block w-full rounded-xl py-4 text-center text-lg text-white opacity-80 hover:opacity-100"
                >
                    Получить промокод
                </button>
            </div>
        </div>
    </div>
</template>

<style scoped>
.promo-accent-line {
    width: 3px;
    background-color: #0ca563;
}

.promo-main-button {
    background-color: #0ca563;
}
</style>
