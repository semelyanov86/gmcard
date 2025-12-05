<script setup lang="ts">
import { ModalLink } from '@inertiaui/modal-vue';

interface Props {
    href: string;
}

defineProps<Props>();
</script>

<template>
    <ModalLink :href="href" class="group absolute top-[47%] left-[100%] inline-flex">
        <img src="/images/svg/tarif/question.svg" alt="Подробнее" class="tariff-info-image mr-2 ml-2 group-hover:hidden" />
        <img
            src="/images/svg/tarif/questionHover.svg"
            alt="Подробнее"
            class="tariff-info-image-hover mr-2 ml-2 hidden group-hover:inline-block"
        />
    </ModalLink>
</template>

