<script setup lang="ts">
import Input from '@/components/primitives/Input.vue';
import { computed, watch } from 'vue';
import ToggleSwitch from './ToggleSwitch.vue';

interface Props {
    show?: boolean;
    freeDelivery: boolean;
    freeDeliveryFrom: number | null;
}

const props = withDefaults(defineProps<Props>(), {
    show: true,
    freeDelivery: false,
    freeDeliveryFrom: null,
});

const emit = defineEmits<{
    'update:freeDelivery': [value: boolean];
    'update:freeDeliveryFrom': [value: number | null];
}>();

const deliveryOpen = computed({
    get: () => props.freeDelivery,
    set: (value: boolean) => emit('update:freeDelivery', value),
});

const minAmount = computed({
    get: () => props.freeDeliveryFrom,
    set: (value: number | null) => emit('update:freeDeliveryFrom', value),
});

watch(deliveryOpen, (newValue) => {
    if (!newValue) {
        minAmount.value = null;
    }
});
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
                <div class="ml-12 flex w-50 flex-col max-sm:mt-4 max-sm:ml-0 max-sm:w-full">
                    <label class="text-sm font-bold">Действует при заказе от</label>
                    <div class="relative mt-3">
                        <Input v-model="minAmount" type="number" :disabled="!deliveryOpen" placeholder="1000" min="0" step="1" class="w-full pr-8" />
                        <span class="absolute top-2 right-3 text-black/50">₽</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
