<script setup lang="ts">
import AdaptiveImage from '@/components/ui/AdaptiveImage.vue';

defineProps<{
    title: string;
}>();
</script>

<template>
    <section class="flex h-full w-full items-center justify-center pt-10 pb-14">
        <div class="bestForm flex w-[500px] flex-col items-center justify-center px-4">
            <AdaptiveImage image-path="logo" alt="logo" class="h-14 w-14" :critical="true"></AdaptiveImage>
            <h1 class="lett bestForm mt-10 w-full max-w-[550px] text-center text-[32px] leading-tight tracking-tighter text-foreground">
                {{ title }}
            </h1>
            <slot />
        </div>
    </section>
</template>
