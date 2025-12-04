<script setup lang="ts">
const props = defineProps<{
    title: string;
}>();
</script>

<template>
    <div class="features-section grid-cols-30-70 container grid items-center justify-around gap-5 rounded-3xl text-white">
        <div class="features-description col-span-1">
            <h2 class="features-title text-16">
                {{ props.title }}
            </h2>
        </div>

        <slot />
    </div>
</template>


