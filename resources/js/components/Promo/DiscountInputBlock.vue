<script setup lang="ts">
import { MoneyValueObject } from '@/types/MoneyValueObject';
import { computed } from 'vue';
import CurrencyDropdown from './CurrencyDropdown.vue';

interface Props {
    label: string;
    modelValue?: MoneyValueObject | null;
    show?: boolean;
    error?: string;
}

const props = withDefaults(defineProps<Props>(), {
    modelValue: null,
    show: true,
    error: '',
});

const emit = defineEmits<{
    'update:modelValue': [value: MoneyValueObject];
}>();

const currentMoney = computed(() => props.modelValue ?? MoneyValueObject.create());

function updateAmount(event: Event) {
    const amount = (event.target as HTMLInputElement).value;
    emit('update:modelValue', currentMoney.value.withAmount(amount === '' ? null : Number(amount)));
}

function updateCurrency(currency: string) {
    emit('update:modelValue', currentMoney.value.withCurrency(currency));
}
</script>

<template>
    <div v-show="show" class="m-8 mt-8 flex flex-col rounded-2xl bg-white p-8 max-md:p-4">
        <div class="flex flex-row items-center justify-between max-md:flex-col">
            <h3 class="text-base font-bold max-md:w-full">{{ label }}</h3>
            <div class="ml-12 flex items-center gap-3 max-md:mt-4 max-md:ml-0 max-md:w-full">
                <input
                    type="number"
                    :value="currentMoney.amount ?? ''"
                    @input="updateAmount"
                    placeholder="50"
                    min="0"
                    step="1"
                    class="h-10 w-35 rounded-lg border border-gray-300 px-3 md:w-25"
                    :class="{ 'border-red-500': error }"
                />
                <CurrencyDropdown :modelValue="currentMoney.currency" @update:modelValue="updateCurrency" />
            </div>
        </div>
        <p v-if="error" class="mt-2 text-sm text-red-600">{{ error }}</p>
    </div>
</template>
