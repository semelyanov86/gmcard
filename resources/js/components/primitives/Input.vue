<script setup lang="ts">
interface Props {
    modelValue?: string | number | null;
    type?: 'text' | 'number' | 'email' | 'password' | 'url';
    placeholder?: string;
    disabled?: boolean;
    error?: boolean;
    min?: string | number;
    max?: string | number;
    step?: string | number;
    maxlength?: string | number;
    /** Дополнительные CSS классы */
    class?: string;
}

const props = withDefaults(defineProps<Props>(), {
    modelValue: '',
    type: 'text',
    placeholder: '',
    disabled: false,
    error: false,
});

const emit = defineEmits<{
    'update:modelValue': [value: string | number | null];
}>();

function handleInput(event: Event) {
    const target = event.target as HTMLInputElement;
    let value: string | number | null = target.value;

    if (value === '') {
        value = null;
    } else if (props.type === 'number' && value !== null) {
        value = Number(value);
    }

    emit('update:modelValue', value);
}
</script>

<template>
    <input
        :type="type"
        :value="modelValue ?? ''"
        @input="handleInput"
        :placeholder="placeholder"
        :disabled="disabled"
        :min="min"
        :max="max"
        :step="step"
        :maxlength="maxlength"
        class="rounded-lg border border-gray-300 px-3 py-2"
        :class="[
            {
                'cursor-not-allowed opacity-50': disabled,
                'border-red-500': error,
            },
            props.class,
        ]"
    />
</template>
