<script setup lang="ts">
import SearchIcon from '@/components/primitives/icons/SearchIcon.vue';
import type { MenuData } from '@/types';

defineProps<{
    menuItems: MenuData[];
}>();
</script>

<template>
    <div class="flex h-full w-full items-center pt-10 md:hidden" id="topBar">
        <div class="bg-brand-blue mb-4 flex h-[55px] w-full items-center rounded-md px-5 shadow-2xl xl:pr-5 xl:pl-7">
            <ul class="flex w-full items-center justify-between">
                <li v-for="item in menuItems" :key="item.id" class="cursor-pointer text-[16px] text-white">
                    <a target="_blank" rel="noopener noreferrer" :href="item.url" class="hover:border-b-2 hover:border-white">{{ item.label }}</a>
                </li>
            </ul>
            <div class="flex items-center lg:hidden">
                <div class="bg-brand-blue-navy ml-[52px] block h-[55px] w-[1px]"></div>
                <form name="search" class="s ml-4 flex items-center">
                    <input
                        type="text"
                        class="h-[41px] w-[280px] rounded-l-md border-none pr-4 pl-4 outline-none 2xl:w-[200px]"
                        placeholder="Что вы хотите найти?"
                    />
                    <div class="bg-brand-blue-medium h-[41px] w-[1px]"></div>
                    <select name="location" id="location" class="focus:ring-brand-blue h-[41px] rounded-r-md border-none outline-none focus:ring-1">
                        <option value="" class="text-lg">Везде</option>
                    </select>
                </form>
                <button
                    class="bg-brand-yellow-dark hover:text-brand-orange focus:ring-brand-yellow-dark ml-2 flex h-[41px] items-center justify-center rounded-md px-6 text-[16px] font-bold focus:ring-2"
                >
                    <SearchIcon custom-class="mr-1 group-hover:stroke-brand-orange" />
                    Найти
                </button>
            </div>
        </div>
    </div>
</template>

<style scoped></style>
