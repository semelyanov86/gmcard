<script setup lang="ts">
import { AuthTab } from '@/types/enums/auth/AuthTab';

defineProps<{
    tab: {
        value: AuthTab;
        label: string;
    };
    isActive: boolean;
}>();

defineEmits<{
    click: [];
}>();
</script>

<template>
    <button
        type="button"
        @click="$emit('click')"
        :class="[
            'flex-1 rounded-md px-4 py-3 text-center text-sm font-semibold transition-all',
            isActive ? 'bg-white text-black shadow-sm' : 'text-gray-600 hover:text-black',
        ]"
    >
        {{ tab.label }}
    </button>
</template>

