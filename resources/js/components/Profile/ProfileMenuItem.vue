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
    <div class="bg-divider h-[1px] w-full"></div>
    <p
        @click="emit('click')"
        :class="[
            'mx-4 my-2 cursor-pointer px-4 py-2',
            isActive
                ? 'rounded-lg bg-secondary text-white hover:no-underline'
                : 'text-primary underline hover:rounded-lg hover:bg-secondary hover:text-white hover:no-underline',
        ]"
    >
        {{ label }}
    </p>
</template>
