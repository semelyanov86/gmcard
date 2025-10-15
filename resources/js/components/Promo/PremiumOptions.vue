<script setup lang="ts">
import { ref } from 'vue';
import ToggleSwitch from './ToggleSwitch.vue';

const autoRaiseHours = ref('0');
const autoRaiseEnabled = ref(false);

const autoRestartDays = ref('0');
const autoRestartEnabled = ref(false);
</script>

<template>
    <div class="flex bg-white p-8 max-md:p-4 mt-8 rounded-2xl flex-col">
        <div class="flex items-center justify-between w-full flex-row max-md:flex-col max-md:items-start">
            <h3 class="font-bold w-auto max-md:w-full max-md:mb-2">Дополнительные опции (нужен премиум)</h3>
            <a href="#" class="text-[#0066CB] hover:underline w-auto max-md:w-full">Смотреть тарифы</a>
        </div>
        <div class="w-full h-[1px] bg-black/20 my-5"></div>
        <div class="flex justify-between items-center flex-row max-md:flex-col max-md:items-start">
            <div class="flex items-center gap-1 max-md:mb-4">
                <p class="text-base all_text">Поднимать акцию на первое<br>место каждые</p>
                <input 
                    v-model="autoRaiseHours" 
                    type="text" 
                    class="w-[45px] bg_inp rounded-md border-gray-300" 
                    placeholder="0"
                >
                <label class="text-base max-sm:text-sm">часа</label>
            </div>
            <ToggleSwitch v-model="autoRaiseEnabled" />
        </div>
        <div class="w-full h-[1px] bg-black/20 my-5"></div>
        <div class="flex justify-between items-center flex-row max-md:flex-col max-md:items-start">
            <div class="flex items-center gap-1 max-md:mb-4">
                <p class="text-base all_text">Автоматически перезапускать акцию после завершения на</p>
                <input 
                    v-model="autoRestartDays" 
                    type="text" 
                    class="w-[45px] bg_inp rounded-md border-gray-300" 
                    placeholder="0"
                >
                <label>дней</label>
            </div>
            <ToggleSwitch v-model="autoRestartEnabled" />
        </div>
    </div>
</template>

