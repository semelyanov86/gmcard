<script setup lang="ts">
defineProps<{
    show?: boolean;
}>();
</script>

<template>
    <div v-show="show !== false" class="mt-8 flex flex-row items-center justify-between rounded-2xl bg-white p-8 max-md:flex-col max-md:p-4">
        <div class="flex max-w-md flex-col max-md:w-full">
            <slot name="description" />
        </div>
        <div class="ml-12 flex h-20 w-52 flex-col max-md:mt-4 max-md:ml-0 max-md:h-auto max-md:w-full">
            <slot name="input" />
        </div>
    </div>
</template>
