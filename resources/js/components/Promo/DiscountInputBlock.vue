<script setup lang="ts">
import CurrencyDropdown from './CurrencyDropdown.vue';

interface Props {
    label: string;
    amount?: string;
    currency?: string;
    show?: boolean;
}

withDefaults(defineProps<Props>(), {
    amount: '',
    currency: '%',
    show: true,
});

const emit = defineEmits<{
    'update:amount': [value: string];
    'update:currency': [value: string];
}>();

function updateAmount(event: Event) {
    const target = event.target as HTMLInputElement;
    emit('update:amount', target.value);
}

function updateCurrency(value: string) {
    emit('update:currency', value);
}
</script>

<template>
    <div 
        v-show="show" 
        class="flex bg-white p-8 max-md:p-4 mt-8 m-8 rounded-2xl flex-row max-md:flex-col justify-between items-center"
    >
        <h3 class="text-base font-bold max-md:w-full">{{ label }}</h3>
        <div class="flex gap-3 items-center ml-12 max-md:w-full max-md:mt-4 max-md:ml-0">
            <input 
                type="text" 
                :value="amount"
                @input="updateAmount"
                placeholder="50" 
                maxlength="4" 
                class="border border-gray-300 rounded-lg w-[100px] h-[42px] px-3"
            >
            <CurrencyDropdown 
                :modelValue="currency" 
                @update:modelValue="updateCurrency" 
            />
        </div>
    </div>
</template>

