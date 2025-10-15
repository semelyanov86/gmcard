<script setup lang="ts">
import { ref } from 'vue';
import ToggleSwitch from './ToggleSwitch.vue';

const isEnabled = ref(false);
const showDays = ref(false);
const showTime = ref(false);

const days = [
    { id: 'md', label: 'пн' },
    { id: 'tu', label: 'вт' },
    { id: 'wd', label: 'ср' },
    { id: 'th', label: 'чт' },
    { id: 'fr', label: 'пт' },
    { id: 'su', label: 'сб' },
    { id: 'sn', label: 'вс' },
];
</script>

<template>
    <div class="flex bg-white p-8 max-md:p-4 mt-8 rounded-2xl flex-col">
        <div class="flex flex-row max-md:flex-col items-start max-md:items-start">
            <div class="max-md:mb-4">
                <h3 class="font-bold">Если ваша акция доступна только в определенные дни и часы.</h3>
                <p class="text-black/50 all_text">Общий отсчет времени до конца акции не прекратится, она так же будет находится на сайте, но пользователи смогут перейти в нее только в указанные вами дни и часы.</p>
            </div>
            <ToggleSwitch v-model="isEnabled" class="ml-10 max-md:ml-0" />
        </div>
        <div v-show="isEnabled" class="mt-5">
            <div class="h-[1px] w-full bg-black/20"></div>
            <div class="mt-5 flex flex-row max-md:flex-col items-center max-md:items-start gap-3">
                <div class="flex items-center gap-2">
                    <input v-model="showDays" type="checkbox" class="rounded-md">
                    <label class="font-bold">Акция доступна в</label>
                </div>
                <ul class="flex flex-wrap items-center gap-2">
                    <li 
                        v-for="day in days" 
                        :key="day.id" 
                        class="px-3 py-2 cursor-pointer bg-[#e9eef1] rounded-md hover:bg-blue-200"
                    >
                        {{ day.label }}
                    </li>
                </ul>
            </div>
            <div class="mt-5 flex flex-row max-md:flex-col items-center max-md:items-start gap-3">
                <div class="flex items-center gap-2">
                    <input v-model="showTime" type="checkbox" class="rounded-md">
                    <label class="font-bold">Акция доступна с</label>
                </div>
                <div class="flex items-center gap-3">
                    <div class="flex items-center gap-2">
                        <input type="text" placeholder="00" maxlength="2" class="w-[45px] rounded-lg border border-gray-300">
                        <span>:</span>
                        <input type="text" placeholder="00" maxlength="2" class="w-[45px] rounded-lg border border-gray-300">
                    </div>
                    <span>- до</span>
                    <div class="flex items-center gap-2">
                        <input type="text" placeholder="00" maxlength="2" class="w-[45px] rounded-lg border border-gray-300">
                        <span>:</span>
                        <input type="text" placeholder="00" maxlength="2" class="w-[45px] rounded-lg border border-gray-300">
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

