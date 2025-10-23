<script setup lang="ts">
import CurrencyDropdown from './CurrencyDropdown.vue';

interface Props {
    label: string;
    amount?: string;
    currency?: string;
    show?: boolean;
    error?: string;
}

withDefaults(defineProps<Props>(), {
    amount: '',
    currency: '%',
    show: true,
    error: '',
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
    <div v-show="show" class="m-8 mt-8 flex flex-col rounded-2xl bg-white p-8 max-md:p-4">
        <div class="flex flex-row items-center justify-between max-md:flex-col">
            <h3 class="text-base font-bold max-md:w-full">{{ label }}</h3>
            <div class="ml-12 flex items-center gap-3 max-md:mt-4 max-md:ml-0 max-md:w-full">
                <input
                    type="text"
                    :value="amount"
                    @input="updateAmount"
                    placeholder="50"
                    maxlength="4"
                    class="h-10 w-25 rounded-lg border border-gray-300 px-3"
                    :class="{ 'border-red-500': error }"
                />
                <CurrencyDropdown :modelValue="currency" @update:modelValue="updateCurrency" />
            </div>
        </div>
        <p v-if="error" class="mt-2 text-sm text-red-600">{{ error }}</p>
    </div>
</template>
