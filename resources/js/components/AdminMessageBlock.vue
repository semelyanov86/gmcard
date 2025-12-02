<script setup lang="ts">
interface Props {
    label: string;
    content: string | null;
}

defineProps<Props>();
</script>

<template>
    <div v-if="content">
        <label class="mb-2 block text-sm font-medium text-gray-700">{{ label }}</label>
        <div class="min-h-100 w-full rounded-lg border border-black/20 bg-gray-50 p-4 text-sm whitespace-pre-wrap">
            {{ content }}
        </div>
    </div>
</template>
