<script setup lang="ts">
import { ref } from 'vue';
import type { WeekdayModel } from '@/types';
import ToggleSwitch from './ToggleSwitch.vue';

defineProps<{
    weekdays: WeekdayModel[];
}>();

const isEnabled = ref(false);
const showDays = ref(false);
const showTime = ref(false);
</script>

<template>
    <div class="mt-8 flex flex-col rounded-2xl bg-white p-8 max-md:p-4">
        <div class="flex flex-row items-start max-md:flex-col max-md:items-start">
            <div class="max-md:mb-4">
                <h3 class="font-bold">Если ваша акция доступна только в определенные дни и часы.</h3>
                <p class="all_text text-black/50">
                    Общий отсчет времени до конца акции не прекратится, она так же будет находится на сайте, но пользователи смогут перейти в нее
                    только в указанные вами дни и часы.
                </p>
            </div>
            <ToggleSwitch v-model="isEnabled" class="ml-10 max-md:ml-0" />
        </div>
        <div v-show="isEnabled" class="mt-5">
            <div class="h-[1px] w-full bg-black/20"></div>
            <div class="mt-5 flex flex-row items-center gap-3 max-md:flex-col max-md:items-start">
                <div class="flex items-center gap-2">
                    <input v-model="showDays" type="checkbox" class="rounded-md" />
                    <label class="font-bold">Акция доступна в</label>
                </div>
                <ul class="flex flex-wrap items-center gap-2">
                    <li v-for="day in weekdays" :key="day.id" class="cursor-pointer rounded-md bg-[#e9eef1] px-3 py-2 hover:bg-blue-200">
                        {{ day.label }}
                    </li>
                </ul>
            </div>
            <div class="mt-5 flex flex-row items-center gap-3 max-md:flex-col max-md:items-start">
                <div class="flex items-center gap-2">
                    <input v-model="showTime" type="checkbox" class="rounded-md" />
                    <label class="font-bold">Акция доступна с</label>
                </div>
                <div class="flex items-center gap-3">
                    <div class="flex items-center gap-2">
                        <input type="text" placeholder="00" maxlength="2" class="w-[45px] rounded-lg border border-gray-300" />
                        <span>:</span>
                        <input type="text" placeholder="00" maxlength="2" class="w-[45px] rounded-lg border border-gray-300" />
                    </div>
                    <span>- до</span>
                    <div class="flex items-center gap-2">
                        <input type="text" placeholder="00" maxlength="2" class="w-[45px] rounded-lg border border-gray-300" />
                        <span>:</span>
                        <input type="text" placeholder="00" maxlength="2" class="w-[45px] rounded-lg border border-gray-300" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
