<template>
    <div class="flex h-full md:hidden items-center w-full pt-10 " id="topBar">
        <div class="flex items-center shadow-2xl bg-[#2AACF0] h-[55px]  rounded-md  w-full px-5 xl:pl-7 mb-4 xl:pr-5">
            <ul class="flex items-center justify-between w-full">
                <li class="text-[16px] text-white cursor-pointer">
                    <a target="_blank" rel="noopener noreferrer" href="" class="hover:border-b-2 hover:border-white">Главная</a>
                </li>
                <li class="text-[16px] text-white cursor-pointer">
                    <a target="_blank" rel="noopener noreferrer" href="discount.html" class="hover:border-b-2 hover:border-white">Пользователям</a>
                </li>
                <li class="text-[16px] text-white cursor-pointer">
                    <a target="_blank" rel="noopener noreferrer" href="/#popular" class="hover:border-b-2 hover:border-white">Кэшбэк</a>
                </li>
                <li class="text-[16px] text-white cursor-pointer">
                    <a target="_blank" rel="noopener noreferrer" href="buis_new.html" class="hover:border-b-2 hover:border-white">Для бизнеса</a>
                </li>
                <li class="text-[16px] text-white cursor-pointer">
                    <a target="_blank" rel="noopener noreferrer" href="help.html" class="hover:border-b-2 hover:border-white">Правила</a>
                </li>
                <li class="text-[16px] text-white cursor-pointer">
                    <a target="_blank" rel="noopener noreferrer" href="help.html" class="hover:border-b-2 hover:border-white">Контакты</a>
                </li>
                <li class="text-[16px] text-white cursor-pointer">
                    <a target="_blank" rel="noopener noreferrer" href="buis.html" class="hover:border-b-2 hover:border-white">GM</a>
                </li>
                <li class="text-[16px] text-white cursor-pointer">
                    <a target="_blank" rel="noopener noreferrer" href="coupon.html" class="hover:border-b-2 hover:border-white">₽</a>
                </li>
            </ul>
            <div class="flex lg:hidden items-center">
                <div class="block h-[55px] w-[1px] bg-[#065d8b] ml-[52px]"></div>
                <form name="search" class="s flex items-center ml-4">
                    <input
                        type="text"
                        class="h-[41px] 2xl:w-[200px] w-[280px] rounded-l-md outline-none border-none pl-4 pr-4"
                        placeholder="Что вы хотите найти?"
                    />
                    <div class="h-[41px] w-[1px] bg-[#4890b8]"></div>
                    <select name="location" id="location" class="h-[41px] rounded-r-md border-none outline-none focus:ring-1 focus:ring-[#2AACF0] "
                    >
                        <option value="" class="text-lg">Везде</option>
                    </select>
                </form>
                <button class="flex items-center justify-center px-6  bg-[#f4d710] h-[41px] text-[16px] rounded-md  font-bold ml-2 focus:ring-2 hover:text-[#983301] focus:ring-[#f4d710]"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-1  group-hover:stroke-[#983301]">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                    </svg>
                    Найти
                </button>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">

</script>

<style scoped>

</style>
