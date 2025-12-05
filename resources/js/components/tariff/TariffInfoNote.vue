<script setup lang="ts">
import { ModalLink } from '@inertiaui/modal-vue';
</script>

<template>
    <div class="info relative flex w-112 flex-wrap items-center rounded-2xl border-none bg-slate-600 px-5 py-4 text-sm text-slate-400">
        Чтобы увидеть подробности, нажмите знак
        <ModalLink
            :href="route('tarif.plans.info-modal')"
            id="popUpSecTrigger"
            class="inline-flex items-center"
        >
            <img src="/images/svg/tarif/question.svg" alt="Подробнее" class="tariff-info-image mr-2 ml-2" />
            <img src="/images/svg/tarif/questionHover.svg" alt="Подробнее" class="tariff-info-image-hover mr-2 ml-2" />
        </ModalLink>
        <br />
        <span class="text-continue">рядом с опцией</span>
    </div>
</template>
