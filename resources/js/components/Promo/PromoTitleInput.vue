<script setup lang="ts">
import { computed } from 'vue';
import Input from '@/components/primitives/Input.vue';

const modelValue = defineModel<string>({ required: true });

defineProps<{
    error?: string;
}>();

const remainingChars = computed(() => 64 - (modelValue.value?.length || 0));
</script>

<template>
    <div class="mt-8 flex w-full flex-col rounded-2xl bg-white p-8 max-md:p-4" id="pyatyi">
        <h3 class="text-base font-bold">Введите заголовок (названии акции), максимум 64 символа.</h3>
        <p class="all_text text-black/50">
            Вы можете указать в заголовке имя своего бренда (пример в строке), что поможет пользователям отслеживать все ваши акции и возможно сделает
            вас более узнаваемым.
        </p>
        <div class="relative">
            <Input
                v-model="modelValue"
                type="text"
                class="mt-3 w-full pr-12"
                :error="!!error"
                placeholder="Скидки до 30% в Desigual! Зарядись энергией Desigual!"
                maxlength="64"
            />
            <span class="absolute right-3 bottom-2.5 font-bold text-blue-600">{{ remainingChars }}</span>
        </div>
        <p v-if="error" class="mt-2 text-sm text-red-600">{{ error }}</p>
    </div>
</template>
