<script setup lang="ts">
interface Props {
    isActive: boolean;
}

defineProps<Props>();

const emit = defineEmits<{
    (e: 'click'): void;
}>();
</script>

<template>
    <button
        @click="emit('click')"
        :class="[
            'ml-2 h-10 rounded-lg px-6 py-2 text-base font-bold focus:ring-2',
            isActive ? 'bg-[#063966] text-white' : 'bg-brand-yellow-dark hover:text-brand-orange focus:ring-brand-yellow-dark',
        ]"
    >
        Заявки на модерацию
    </button>
</template>
