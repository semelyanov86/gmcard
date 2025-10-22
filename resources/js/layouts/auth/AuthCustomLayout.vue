<script setup lang="ts">
import AdaptiveImage from '@/components/ui/AdaptiveImage.vue';
</script>

<template>
    <section class="flex h-full w-full items-center justify-center pt-10 pb-14">
        <div class="bestForm flex w-[500px] flex-col items-center justify-center px-4">
            <AdaptiveImage image-path="logo" alt="logo" class="h-14 w-14" :critical="true"></AdaptiveImage>
            <slot />
        </div>
    </section>
</template>
