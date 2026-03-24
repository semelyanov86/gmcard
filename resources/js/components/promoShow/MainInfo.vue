<script setup lang="ts">
import PromoTypeIcon from '@/components/main/PromoTypeIcon.vue';
import dayjs from 'dayjs';
import duration from 'dayjs/plugin/duration';
import { onMounted, onUnmounted, ref } from 'vue';

const props = defineProps<{
    promoTypeIcon?: string | null;
    promoName?: string | null;
    extraConditions?: string | null;
    salesOrderFrom?: number | null;
    availableTill?: string | null;
}>();

const emit = defineEmits<{
    'get-promo-code': [];
}>();

dayjs.extend(duration);

const timeLeft = ref('Срок не указан');
let timer: ReturnType<typeof setInterval> | null = null;

function updateTimeLeft(): void {
    if (!props.availableTill) {
        timeLeft.value = 'Срок не указан';
        return;
    }

    const endDate = dayjs(props.availableTill);
    if (!endDate.isValid()) {
        timeLeft.value = 'Срок не указан';
        return;
    }

    const diffMs = endDate.diff(dayjs());
    if (diffMs <= 0) {
        timeLeft.value = 'Акция завершена';
        if (timer) {
            clearInterval(timer);
            timer = null;
        }
        return;
    }

    const diff = dayjs.duration(diffMs);
    const days = Math.floor(diff.asDays());
    const hours = String(diff.hours()).padStart(2, '0');
    const minutes = String(diff.minutes()).padStart(2, '0');
    const seconds = String(diff.seconds()).padStart(2, '0');

    timeLeft.value = `${days} дн. ${hours}:${minutes}:${seconds}`;
}

onMounted(() => {
    updateTimeLeft();
    timer = setInterval(updateTimeLeft, 1000);
});

onUnmounted(() => {
    if (timer) {
        clearInterval(timer);
        timer = null;
    }
});
</script>

<template>
    <div class="salesLink2 rounded-3xl border bg-white py-4 shadow-2xl">
        <div class="">
            <p class="flex items-center px-6 py-2">
                До конца акции
                <img src="/images/png/images/alarm.png" class="mx-2 opacity-50" alt="time" />
                <strong>{{ timeLeft }}</strong>
            </p>
            <div class="h-px w-full bg-black/20"></div>
            <div class="px-6 py-2">
                <h2 class="mt-2 text-lg">Зимняя распродажа до -50% на все в Снежная Королева!</h2>
                <div class="mt-4 flex items-center gap-2">
                    <PromoTypeIcon v-if="promoTypeIcon" :icon="promoTypeIcon" sizeClass="w-12 h-12" alt="discount" />
                    <img v-else src="/images/png/images/discount.png" class="w-12" alt="discount" />
                    <span class="text-3xl font-bold">
                        {{ promoName || 'Акция' }}
                    </span>
                </div>
                <div class="relative flex w-full min-w-0 flex-col items-start">
                    <div class="promo-accent-line absolute left-10 h-full"></div>
                    <h4 class="ml-14 w-[calc(100%-3.5rem)] text-sm font-bold">Дополнительные условия</h4>
                    <p v-if="extraConditions" class="ml-14 w-[calc(100%-3.5rem)] text-sm break-all" v-html="extraConditions"></p>
                    <p v-else class="ml-14 w-[calc(100%-3.5rem)] text-sm break-all">Не указаны</p>
                    <h4 class="mt-4 ml-14 w-[calc(100%-3.5rem)] text-sm font-bold">Минимальная сумма</h4>
                    <p class="ml-14 w-[calc(100%-3.5rem)] text-sm break-all">
                        {{ salesOrderFrom ? `${salesOrderFrom} рублей` : 'Не указана' }}
                    </p>
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
