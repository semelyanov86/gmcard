<template>
    <picture>
        <source
            type="image/avif"
            :srcset="`/images/avif/${imagePath}.avif`">

        <source
            type="image/webp"
            :srcset="`/images/webp/${imagePath}.webp`">

        <img
            :src="`/images/png/${imagePath}.png`"
            :alt="alt"
            :class="imageClass"
            :loading="critical ? 'eager' : 'lazy'"
            :fetchpriority="critical ? 'high' : 'auto'"
            v-bind="$attrs">
    </picture>
</template>

<script setup lang="ts">
interface Props {
    imagePath: string;
    alt: string;
    imageClass?: string;
    critical?: boolean;
}

const props = withDefaults(defineProps<Props>(), {
    imageClass: '',
    critical: false
});
</script>

<style scoped>
picture {
    display: inline-block;
}

img {
    max-width: 100%;
    height: auto;
}
</style>
