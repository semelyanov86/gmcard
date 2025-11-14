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
            'px-6 py-2 h-[41px] text-[16px] rounded-lg font-bold ml-2 focus:ring-2',
            isActive ? 'bg-[#063966] text-white' : 'bg-[#f4d710] hover:text-[#983301] focus:ring-[#f4d710]',
        ]"
    >
        Заявки на модерацию
    </button>
</template>

