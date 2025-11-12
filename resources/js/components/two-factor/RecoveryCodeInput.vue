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
        <label for="recovery_code" class="mb-2 text-sm font-semibold">Код восстановления</label>
        <input
            id="recovery_code"
            type="text"
            placeholder="U2gnfDUzgI-1GMu1mWqr3"
            required
            autofocus
            autocomplete="off"
            :value="modelValue"
            @input="emit('update:modelValue', ($event.target as HTMLInputElement).value)"
            class="w-full rounded-md border border-black/40 p-3"
        />
        <RequiredFieldHint />
        <InputError :message="error" />
    </div>
</template>
