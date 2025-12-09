<script setup lang="ts">
import type { ServiceStatusBlock } from '@/types/tariff/ServiceStatusBlock';

const props = defineProps<{
    services: ServiceStatusBlock[];
}>();
</script>

<template>
    <section class="flex flex-col items-center">
        <div class="hide-scrollbar container flex w-full overflow-x-auto">
            <div v-for="service in props.services" :key="service.key" class="adaptive-block flex w-auto min-w-80 flex-col items-center">
                <img :src="service.img" :alt="service.alt" class="mb-1 h-6 w-6" />
                <h3 class="text-center text-base font-bold" :class="{ 'text-yellow-300': service.highlight }">
                    {{ service.title }}
                </h3>
                <p class="text-center text-sm" :class="{ 'text-yellow-300': service.highlight }">
                    {{ service.status }}
                </p>
            </div>
        </div>
        <div class="descSection mt-6 flex flex-col items-center text-center text-slate-500">
            <p class="mb-6 text-sm">Действие платных тарифов распространяется на все наши сервисы платформы</p>
            <p class="text-sm text-slate-500">
                В данный момент мы предоставляем только один сервис. <br />
                Остальные наши сервисы сейчас в разработке
            </p>
        </div>
    </section>
</template>

<style scoped>
.adaptive-block {
    flex-shrink: 0;
    width: 20%;
    min-width: 80px;
    margin-bottom: 16px;
    align-items: center;
}

.adaptive-block:not(:last-child) {
    border-right: 1px solid var(--color-service-border);
}

@media (max-width: 440px) {
    .descSection {
        display: none;
    }
}

@media (min-width: 641px) and (max-width: 1024px) {
    .adaptive-block {
        width: 48%;
        margin-bottom: 16px;
    }
}
@media (min-width: 1025px) {
    .adaptive-block {
        width: 19%;
        margin-bottom: 16px;
    }
}
</style>
