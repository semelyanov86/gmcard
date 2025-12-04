<script setup lang="ts">
const emit = defineEmits<{
    (e: 'trigger'): void;
}>();

const handleTrigger = () => {
    emit('trigger');
};
</script>

<template>
    <div class="info relative flex w-112 flex-wrap items-center rounded-2xl border-none bg-slate-600 px-5 py-4 text-sm text-slate-400">
        Чтобы увидеть подробности, нажмите знак
        <div
            id="popUpSecTrigger"
            role="button"
            tabindex="0"
            class="inline-flex items-center"
            @click="handleTrigger"
            @keyup.enter.prevent="handleTrigger"
            @keyup.space.prevent="handleTrigger"
        >
            <img src="/images/svg/tarif/question.svg" alt="Подробнее" class="tariff-info-image mr-2 ml-2" />
            <img src="/images/svg/tarif/questionHover.svg" alt="Подробнее" class="tariff-info-image-hover mr-2 ml-2" />
        </div>
        <br />
        <span class="text-continue">рядом с опцией</span>
    </div>
</template>


