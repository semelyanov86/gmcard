<script setup lang="ts">
interface Props {
    label: string;
    isActive: boolean;
}

defineProps<Props>();

const emit = defineEmits<{
    (e: 'click'): void;
}>();
</script>

<template>
    <div class="h-[1px] w-full bg-black/20"></div>
    <p
        @click="emit('click')"
        :class="[
            'mx-4 my-2 cursor-pointer px-4 py-2',
            isActive
                ? 'rounded-lg bg-[#063966] text-white hover:no-underline'
                : 'text-[#1d89f2] underline hover:rounded-lg hover:bg-[#063966] hover:text-white hover:no-underline',
        ]"
    >
        {{ label }}
    </p>
</template>
