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
    <div class="w-full h-[1px] bg-black/20"></div>
    <p
        @click="emit('click')"
        :class="[
            'px-4 mx-4 py-2 my-2 cursor-pointer',
            isActive
                ? 'bg-[#063966] text-white rounded-lg hover:no-underline'
                : 'underline text-[#1d89f2] hover:bg-[#063966] hover:text-white hover:rounded-lg hover:no-underline',
        ]"
    >
        {{ label }}
    </p>
</template>


