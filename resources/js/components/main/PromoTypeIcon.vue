<script setup lang="ts">
import { computed } from 'vue';

const props = defineProps<{
    icon?: string | null;
    alt?: string | null;
    sizeClass?: string | null;
}>();

const src = computed(() => (props.icon && props.icon.trim() !== '' ? props.icon : ''));
const cssClass = computed(() => props.sizeClass || 'h-[77px] w-[77px]');
</script>

<template>
    <img v-if="src" :src="src" :class="cssClass" :alt="alt || 'Тип промо'" />
</template>
