<script setup lang="ts">
import { computed } from 'vue';

const props = defineProps<{
    icon?: string | null;
    alt?: string | null;
    sizeClass?: string | null;
}>();

const src = computed(() => {
    const icon = props.icon?.trim();
    if (!icon) return '';

    if (icon.startsWith('http')) return icon;
    if (icon.startsWith('/storage/')) return icon;
    if (icon.startsWith('storage/')) return `/storage/${icon.slice('storage/'.length)}`;

    return `/storage/${icon}`;
});
const cssClass = computed(() => props.sizeClass || 'h-16 w-16');
</script>

<template>
    <img v-if="src" :src="src" :class="cssClass" :alt="alt || 'Тип промо'" />
</template>
