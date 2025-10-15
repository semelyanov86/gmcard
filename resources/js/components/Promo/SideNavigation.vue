<script setup lang="ts">
import { ref } from 'vue';

interface Props {
    mode?: 'mobile' | 'desktop';
}

withDefaults(defineProps<Props>(), {
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
    <div v-if="mode === 'mobile'" class="hidden flex-col relative" id="mainBlock">
        <button 
            @click="isOpen = !isOpen" 
            class="w-full bg-[#FAE115] z-50 h-[50px] shadow-2xl rounded-md"
        >
            Мои разделы
        </button>
        <div v-show="isOpen" class="bg-white rounded-b-2xl z-10 -mt-1">
            <ul class="w-full flex flex-col">
                <template v-for="(item, index) in menuItems" :key="index">
                    <a 
                        :href="item.href" 
                        class="px-4 mx-4 py-2 my-2 underline text-[#1d89f2] hover:bg-[#063966] hover:text-white hover:rounded-lg hover:no-underline"
                    >
                        {{ item.label }}
                    </a>
                    <div v-if="index < menuItems.length - 1" class="w-full h-[1px] bg-black/20"></div>
                </template>
            </ul>
        </div>
    </div>

    <div v-else class="w-[250px] route_block bg-white rounded-2xl py-2 h-full">
        <ul class="w-full flex flex-col">
            <template v-for="(item, index) in menuItems" :key="index">
                <a 
                    :href="item.href" 
                    class="px-4 mx-4 py-2 my-2 underline text-[#1d89f2] hover:bg-[#063966] hover:text-white hover:rounded-lg hover:no-underline"
                >
                    {{ item.label }}
                </a>
                <div v-if="index < menuItems.length - 1" class="w-full h-[1px] bg-black/20"></div>
            </template>
        </ul>
    </div>
</template>

