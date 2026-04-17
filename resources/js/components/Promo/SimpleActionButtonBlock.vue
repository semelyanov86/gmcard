<script setup lang="ts">
import type { PromoActionButtonModel } from '@/types/PromoActionButtonModel';

interface Props {
    buttons: PromoActionButtonModel[];
    error?: string;
}

const props = defineProps<Props>();

const model = defineModel<number | null>({ required: true });
</script>

<template>
    <div class="mt-8 flex flex-row items-center justify-between rounded-2xl bg-white p-8 max-md:flex-col max-md:p-4">
        <div class="flex max-w-md flex-col max-md:w-full">
            <h3 class="text-base font-bold">Выберите обязательный текст кнопки для акции</h3>
            <p class="all_text text-black/50">Выберите вариант текста, который будет показан на кнопке акции.</p>
        </div>
        <div class="ml-12 flex h-20 w-52 flex-col max-md:mt-4 max-md:ml-0 max-md:h-auto max-md:w-full">
            <label for="simple_action_button_id" class="text-sm font-bold">Текст кнопки</label>
            <select
                id="simple_action_button_id"
                v-model="model"
                class="mt-3 w-full rounded-lg border border-gray-300 px-3 py-2 text-black"
                :class="{ 'border-red-600': !!props.error }"
            >
                <option :value="null" disabled>Выберите вариант</option>
                <option v-for="item in props.buttons" :key="item.id" :value="item.id">
                    {{ item.title }}
                </option>
            </select>
        </div>
        <p v-if="props.error" class="mt-2 text-sm text-red-600">
            {{ props.error }}
        </p>
    </div>
</template>
