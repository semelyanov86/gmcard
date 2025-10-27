<script setup lang="ts">
import { ref } from 'vue';
import ToggleSwitch from './ToggleSwitch.vue';

const autoRaiseHours = ref(0);
const autoRaiseEnabled = ref(false);

const autoRestartDays = ref(0);
const autoRestartEnabled = ref(false);
</script>

<template>
    <div class="mt-8 flex flex-col rounded-2xl bg-white p-8 max-md:p-4">
        <div class="flex w-full flex-row items-center justify-between max-md:flex-col max-md:items-start">
            <h3 class="w-auto font-bold max-md:mb-2 max-md:w-full">Дополнительные опции (нужен премиум)</h3>
            <a href="#" class="w-auto text-blue-700 hover:underline max-md:w-full">Смотреть тарифы</a>
        </div>
        <div class="my-5 h-px w-full bg-black/20"></div>
        <div class="flex flex-row items-center justify-between max-md:flex-col max-md:items-start">
            <div class="flex items-center gap-1 max-md:mb-4">
                <p class="all_text text-base">Поднимать акцию на первое<br />место каждые</p>
                <input v-model.number="autoRaiseHours" type="number" class="bg_inp w-11 rounded-md border-gray-300 no-spinner" placeholder="0" />
                <label class="text-base max-sm:text-sm">часа</label>
            </div>
            <ToggleSwitch v-model="autoRaiseEnabled" />
        </div>
        <div class="my-5 h-px w-full bg-black/20"></div>
        <div class="flex flex-row items-center justify-between max-md:flex-col max-md:items-start">
            <div class="flex items-center gap-1 max-md:mb-4">
                <p class="all_text text-base">Автоматически перезапускать акцию после завершения на</p>
                <input v-model.number="autoRestartDays" type="number" class="bg_inp w-11 rounded-md border-gray-300 no-spinner" placeholder="0" />
                <label>дней</label>
            </div>
            <ToggleSwitch v-model="autoRestartEnabled" />
        </div>
    </div>
</template>

<style scoped>
/* Скрытие стрелочек в input[type="number"] */
.no-spinner::-webkit-outer-spin-button,
.no-spinner::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}

.no-spinner {
    -moz-appearance: textfield; /* Firefox */
}
</style>
