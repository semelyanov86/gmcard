<script setup lang="ts">
import { ref } from 'vue';

interface Props {
    balance?: number;
    cost?: number;
}

const { balance = 0, cost = 594 } = defineProps<Props>();

const agreeToTerms = ref(false);

const emit = defineEmits<{
    'preview': [];
    'saveDraft': [];
    'launch': [];
}>();
</script>

<template>
    <div class="pt-8 flex justify-between flex-row max-md:flex-col">
        <div class="flex flex-col w-[450px] max-md:w-full">
            <div class="flex pricer_blocks justify-between">
                <div>
                    <span class="text-[#159FF5] text-base">Ваш баланс</span>
                    <h3 class="text-white text-3xl price_text">{{ balance }} руб.</h3>
                </div>
                <div>
                    <span class="text-[#159FF5] text-base">Стоимость акции составит</span>
                    <h3 class="text-white text-3xl price_text">{{ cost }} руб.</h3>
                </div>
            </div>
            <div class="flex gap-2 items-center mt-5">
                <input v-model="agreeToTerms" type="checkbox" id="rules">
                <label for="rules" class="text-[#607990] all_text">
                    С условиями пользования сервисом и стоимостью ознакомлен и полностью согласен
                </label>
            </div>
        </div>
        <div class="flex flex-col gap-3 max-md:mt-4">
            <div 
                @click="emit('preview')"
                class="w-[238px] h-[56px] max-md:w-full bg-[#1d89f2] flex items-center justify-center shadow-lg gap-3 rounded-md hover:opacity-90 cursor-pointer"
            >
                <img class="w-6 h-6" src="/images/png/constructor/eye.svg" alt="eye">
                <span class="text-white all_text">Предпросмотр акции</span>
            </div>
            <div 
                @click="emit('saveDraft')"
                class="w-[238px] h-[56px] max-md:w-full bg-[#1d89f2] flex items-center justify-center shadow-lg gap-3 rounded-md hover:opacity-90 cursor-pointer"
            >
                <img class="w-6 h-6" src="/images/png/constructor/file.svg" alt="eye">
                <span class="text-white all_text">Сохранить как черновик</span>
            </div>
        </div>
    </div>
    <button 
        @click="emit('launch')"
        class="w-full text-3xl text-white font-bold py-8 mt-5 bg-[#1d89f2] rounded-md shadow-lg hover:opacity-90"
    >
        Запустить акцию
    </button>
</template>

