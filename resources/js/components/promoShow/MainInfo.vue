<script setup lang="ts">
const emit = defineEmits<{
    'get-promo-code': [];
}>();
</script>

<template>
    <div class="bg-white py-4 rounded-3xl shadow-2xl border salesLink2">
        <div class="">
            <p class="px-6 py-2 flex items-center">
                До конца акции
                <img src="/images/png/images/alarm.png" class="mx-2 opacity-50" alt="time" />
                <strong>4 дня 15:13:15</strong>
            </p>
            <div class="w-full h-[1px] bg-black/20"></div>
            <div class="px-6 py-2">
                <h2 class="text-lg mt-2">Зимняя распродажа до -50% на все в Снежная Королева!</h2>
                <div class="flex items-center gap-2 mt-4">
                    <img src="/images/png/images/discount.png" class="w-12" alt="discount" />
                    <span class="text-3xl font-bold">Скидка 50%</span>
                </div>
                <div class="flex flex-col items-start relative">
                    <div class="absolute left-10 bg-[#0CA563] w-[3px] h-full"></div>
                    <h4 class="ml-14 text-sm font-bold">Дополнительный условия</h4>
                    <p class="ml-14 text-sm">Сделай покупки на сумму выше 60 000 рублей и используй промокод что бы получить скидку до 10 000 рублей</p>
                    <h4 class="ml-14 text-sm font-bold mt-4">Минимальная сумма</h4>
                    <p class="ml-14 text-sm">10 000 рублей</p>
                </div>
            </div>
            <div class="px-3 w-full">
                <button
                    @click="emit('get-promo-code')"
                    class="bg-[#0CA563] w-full py-4 inline-block text-center mt-5 rounded-xl text-white text-lg opacity-80 hover:opacity-100"
                >
                    Получить промокод
                </button>
            </div>
        </div>
    </div>
</template>

