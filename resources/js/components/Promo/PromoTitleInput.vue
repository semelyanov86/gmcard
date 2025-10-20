<script setup lang="ts">
const modelValue = defineModel<string>({ required: true });
</script>

<template>
    <div class="mt-8 flex w-full flex-col rounded-2xl bg-white p-8 max-md:p-4" id="pyatyi">
        <h3 class="text-base font-bold">Введите заголовок (названии акции), максимум 64 символа.</h3>
        <p class="all_text text-black/50">
            Вы можете указать в заголовке имя своего бренда (пример в строке), что поможет пользователям отслеживать все ваши акции и возможно сделает
            вас более узнаваемым.
        </p>
        <div class="relative">
            <input
                v-model="modelValue"
                type="text"
                oninput="countDown(event)"
                class="mt-3 w-full rounded-lg border-gray-300"
                placeholder="Скидки до 30% в Desigual! Зарядись энергией Desigual!"
                id="textSymbol"
                maxlength="64"
            />
            <span id="count" class="absolute right-3 bottom-2.5 font-bold text-blue-600">64</span>
        </div>
    </div>
</template>

