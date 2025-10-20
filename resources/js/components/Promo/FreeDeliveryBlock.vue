<script setup lang="ts">
import { ref } from 'vue';
import ToggleSwitch from './ToggleSwitch.vue';

interface Props {
    show?: boolean;
}

withDefaults(defineProps<Props>(), {
    show: true,
});

const deliveryOpen = ref(false);
const minAmount = ref('');
</script>

<template>
    <div v-show="show" class="mt-8 flex flex-col rounded-2xl bg-white p-8 max-md:p-4">
        <div class="flex flex-row items-center justify-between max-md:flex-col">
            <div class="price_block max-w-md">
                <h3 class="text-base font-bold">Если у вас есть бесплатная доставка, то вы можете отметить этот пункт.</h3>
                <p class="all_text text-black/50">Если бесплатной доставки нет, то ничего отмечать не нужно.</p>
            </div>
            <ToggleSwitch v-model="deliveryOpen" class="max-md:mt-4" />
        </div>
        <div v-show="deliveryOpen" class="my-4">
            <div class="h-px w-full bg-black/30"></div>
            <div class="mt-4 flex flex-row items-center justify-between max-sm:flex-col">
                <div>
                    <p class="all_text text-black/50">
                        <strong class="text-base text-black">Есть бесплатная доставка.</strong>
                        Если бесплатная доставка действует при заказе от определенной суммы, то необходимо указать это здесь.
                    </p>
                </div>
                <div class="relative ml-12 flex w-50 flex-col max-sm:mt-4 max-sm:ml-0 max-sm:w-full">
                    <label class="text-sm font-bold">Действует при заказе от</label>
                    <input v-model="minAmount" type="number" placeholder="1000" class="mt-3 w-full rounded-lg border-gray-300 pr-8 pl-3" />
                    <span class="absolute right-3 bottom-12 text-black/50">₽</span>
                    <button class="mt-2 rounded bg-blue-500 px-4 py-2 text-white hover:bg-blue-600">Сохранить</button>
                </div>
            </div>
        </div>
    </div>
</template>
