<script setup lang="ts">
import { usePage } from '@inertiajs/vue3';
import { watch } from 'vue';
import { notify } from '@/services/notifications';

type Flash = {
    success?: string;
    error?: string;
};

const props = defineProps<{
    success?: string;
    error?: string;
    immediate?: boolean;
}>();

const page = usePage();

watch(
    () => {
        const flash = (page.props.flash as Flash) ?? {};
        return {
            success: props.success ?? flash.success,
            error: props.error ?? flash.error,
        };
    },
    (current, previous) => {
        if (current.success && current.success !== previous?.success) {
            notify.success(current.success);
        }
        if (current.error && current.error !== previous?.error) {
            notify.error(current.error);
        }
    },
    { immediate: props.immediate ?? true },
);
</script>

<template>
</template>


