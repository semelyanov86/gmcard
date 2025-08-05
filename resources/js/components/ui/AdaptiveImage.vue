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
            :style="imageStyle"
            loading="lazy"
            v-bind="$attrs">
    </picture>
</template>

<script setup lang="ts">
interface Props {
    imagePath: string;
    alt: string;
    imageClass?: string;
    imageStyle?: string;
}

const props = withDefaults(defineProps<Props>(), {
    imageClass: '',
    imageStyle: ''
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
