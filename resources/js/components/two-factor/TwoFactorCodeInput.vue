<script setup lang="ts">
import InputError from '@/components/InputError.vue';
import RequiredFieldHint from '@/components/RequiredFieldHint.vue';

interface Props {
    modelValue: string;
    error?: string;
}

defineProps<Props>();

const emit = defineEmits<{
    (event: 'update:modelValue', value: string): void;
}>();
</script>

<template>
    <div class="relative mt-5 flex w-full flex-col">
        <label for="code" class="mb-2 text-sm font-semibold">Код аутентификации</label>
        <input
            id="code"
            type="text"
            inputmode="numeric"
            placeholder="274531"
            required
            autofocus
            autocomplete="one-time-code"
            maxlength="6"
            :value="modelValue"
            @input="emit('update:modelValue', ($event.target as HTMLInputElement).value)"
            class="w-full rounded-md border border-black/40 p-3"
        />
        <RequiredFieldHint />
        <InputError :message="error" />
    </div>
</template>
