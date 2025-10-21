<script setup lang="ts">
import type { UIMode } from '@/types';
import { ref } from 'vue';

withDefaults(defineProps<{ mode?: UIMode }>(), {
    mode: 'desktop',
});

const isOpen = ref(false);

const menuItems = [
    { label: 'Личный кабинет', href: '' },
    { label: 'Запустить акцию', href: '' },
    { label: 'Мои акции', href: '' },
    { label: 'Мои акции с купонами', href: '' },
    { label: 'Мои купоны', href: '' },
    { label: 'Мои черновики', href: '' },
];
</script>

<template>
    <div v-if="mode === 'mobile'" class="relative hidden flex-col" id="mainBlock">
        <button @click="isOpen = !isOpen" class="promo_sections_btn z-50 h-12 w-full rounded-md bg-yellow-300 shadow-2xl">Мои разделы</button>
        <div v-show="isOpen" class="z-10 -mt-1 rounded-b-2xl bg-white">
            <ul class="flex w-full flex-col">
                <template v-for="(item, index) in menuItems" :key="index">
                    <a
                        :href="item.href"
                        class="mx-4 my-2 px-4 py-2 text-blue-500 underline hover:rounded-lg hover:bg-blue-950 hover:text-white hover:no-underline"
                    >
                        {{ item.label }}
                    </a>
                    <div v-if="index < menuItems.length - 1" class="h-px w-full bg-black/20"></div>
                </template>
            </ul>
        </div>
    </div>

    <div v-else class="route_block h-full w-62 rounded-2xl bg-white py-2">
        <ul class="flex w-full flex-col">
            <template v-for="(item, index) in menuItems" :key="index">
                <a
                    :href="item.href"
                    class="mx-4 my-2 px-4 py-2 text-blue-500 underline hover:rounded-lg hover:bg-blue-950 hover:text-white hover:no-underline"
                >
                    {{ item.label }}
                </a>
                <div v-if="index < menuItems.length - 1" class="h-px w-full bg-black/20"></div>
            </template>
        </ul>
    </div>
</template>
