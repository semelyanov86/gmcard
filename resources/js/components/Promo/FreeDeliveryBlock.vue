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
    <div v-show="show" class="flex bg-white p-8 max-md:p-4 mt-8 rounded-2xl flex-col">
        <div class="flex flex-row max-md:flex-col justify-between items-center">
            <div class="w-[450px] price_block">
                <h3 class="text-base font-bold">Если у вас есть бесплатная доставка, то вы можете отметить этот пункт.</h3>
                <p class="text-black/50 all_text">Если бесплатной доставки нет, то ничего отмечать не нужно.</p>
            </div>
            <ToggleSwitch v-model="deliveryOpen" class="max-md:mt-4" />
        </div>
        <div v-show="deliveryOpen" class="my-4">
            <div class="h-[1px] w-full bg-black/30"></div>
            <div class="mt-4 flex flex-row max-sm:flex-col justify-between items-center">
                <div>
                    <p class="text-black/50 all_text">
                        <strong class="text-black text-base">Есть бесплатная доставка.</strong>
                        Если бесплатная доставка действует при заказе от определенной суммы, то необходимо указать это здесь.
                    </p>
                </div>
                <div class="flex flex-col w-[200px] ml-12 max-sm:w-full max-sm:mt-4 max-sm:ml-0 relative">
                    <label class="text-sm font-bold">Действует при заказе от</label>
                    <input
                        v-model="minAmount"
                        type="number"
                        placeholder="1000"
                        class="border-gray-300 rounded-lg w-full mt-3 pl-3 pr-8"
                    >
                    <span class="absolute bottom-12 right-3 text-black/50">₽</span>
                    <button class="mt-2 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                        Сохранить
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>
