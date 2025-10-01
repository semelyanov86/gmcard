<script setup lang="ts">
import AdaptiveImage from '@/components/ui/AdaptiveImage.vue';

defineProps<{
    title: string;
}>();
</script>

<template>
    <section class="w-full h-full flex items-center justify-center pt-10 pb-14">
        <div class="w-[500px] flex items-center flex-col justify-center bestForm px-4">
            <AdaptiveImage image-path="logo" alt="logo" class="w-14 h-14" :critical="true"></AdaptiveImage>
            <h1 class="text-[32px] font-bold w-full max-w-[550px] text-center lett mt-10 tracking-tighter leading-tight text-foreground bestForm">{{ title }}</h1>
            <slot />
        </div>
    </section>
</template> 