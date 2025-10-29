<script setup lang="ts">
import Input from '@/components/primitives/Input.vue';
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

function updateCurrency(currency: string) {
    emit('update:modelValue', currentMoney.value.withCurrency(currency));
}
</script>

<template>
    <div v-show="show" class="m-8 mt-8 flex flex-col rounded-2xl bg-white p-8 max-md:p-4">
        <div class="flex flex-row items-center justify-between max-md:flex-col">
            <h3 class="text-base font-bold max-md:w-full">{{ label }}</h3>
            <div class="ml-12 flex items-center gap-3 max-md:mt-4 max-md:ml-0 max-md:w-full">
                <Input
                    type="number"
                    :model-value="currentMoney.amount"
                    @update:model-value="(val) => emit('update:modelValue', currentMoney.withAmount(val as number | null))"
                    placeholder="50"
                    min="0"
                    step="1"
                    class="h-10 w-35 md:w-25"
                    :error="!!error"
                />
                <CurrencyDropdown :modelValue="currentMoney.currency" @update:modelValue="updateCurrency" />
            </div>
        </div>
        <p v-if="error" class="mt-2 text-sm text-red-600">{{ error }}</p>
    </div>
</template>
