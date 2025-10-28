<script setup lang="ts">
defineProps<{
    show: boolean;
}>();

defineEmits<{
    toggle: [];
}>();
</script>

<template>
    <img
        src="/images/svg/passSee.svg"
        alt="Показать пароль"
        @click="$emit('toggle')"
        class="absolute top-10 right-4 h-5 w-5 cursor-pointer opacity-70 hover:opacity-100"
    />
</template>
