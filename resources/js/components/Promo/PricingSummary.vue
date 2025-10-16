<script setup lang="ts">
import { ref } from 'vue';

interface Props {
    balance?: number;
    cost?: number;
}

const { balance = 0, cost = 594 } = defineProps<Props>();

const agreeToTerms = ref(false);

const emit = defineEmits<{
    preview: [];
    saveDraft: [];
    launch: [];
}>();
</script>

<template>
    <div class="flex flex-row justify-between pt-8 max-md:flex-col">
        <div class="flex w-[450px] flex-col max-md:w-full">
            <div class="pricer_blocks flex justify-between">
                <div>
                    <span class="text-base text-[#159FF5]">Ваш баланс</span>
                    <h3 class="price_text text-3xl text-white">{{ balance }} руб.</h3>
                </div>
                <div>
                    <span class="text-base text-[#159FF5]">Стоимость акции составит</span>
                    <h3 class="price_text text-3xl text-white">{{ cost }} руб.</h3>
                </div>
            </div>
            <div class="mt-5 flex items-center gap-2">
                <input v-model="agreeToTerms" type="checkbox" id="rules" />
                <label for="rules" class="all_text text-[#607990]">
                    С условиями пользования сервисом и стоимостью ознакомлен и полностью согласен
                </label>
            </div>
        </div>
        <div class="flex flex-col gap-3 max-md:mt-4">
            <div
                @click="emit('preview')"
                class="flex h-[56px] w-[238px] cursor-pointer items-center justify-center gap-3 rounded-md bg-[#1d89f2] shadow-lg hover:opacity-90 max-md:w-full"
            >
                <img class="h-6 w-6" src="/images/png/constructor/eye.svg" alt="eye" />
                <span class="all_text text-white">Предпросмотр акции</span>
            </div>
            <div
                @click="emit('saveDraft')"
                class="flex h-[56px] w-[238px] cursor-pointer items-center justify-center gap-3 rounded-md bg-[#1d89f2] shadow-lg hover:opacity-90 max-md:w-full"
            >
                <img class="h-6 w-6" src="/images/png/constructor/file.svg" alt="eye" />
                <span class="all_text text-white">Сохранить как черновик</span>
            </div>
        </div>
    </div>
    <button @click="emit('launch')" class="mt-5 w-full rounded-md bg-[#1d89f2] py-8 text-3xl font-bold text-white shadow-lg hover:opacity-90">
        Запустить акцию
    </button>
</template>
