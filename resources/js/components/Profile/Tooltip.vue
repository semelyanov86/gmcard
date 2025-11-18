<script setup lang="ts">
interface Props {
    id: string;
    text: string;
    show?: boolean;
}

withDefaults(defineProps<Props>(), {
    show: true,
});
</script>

<template>
    <div
        v-if="show"
        :id="id"
        role="tooltip"
        class="tooltip invisible absolute z-10 inline-block rounded-lg bg-[#041f35] px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300"
    >
        {{ text }}
        <div class="tooltip-arrow" data-popper-arrow></div>
    </div>
</template>

