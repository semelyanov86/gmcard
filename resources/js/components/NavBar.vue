<template>
    <div class="flex h-full w-full items-center pt-10 md:hidden" id="topBar">
        <div class="mb-4 flex h-[55px] w-full items-center rounded-md bg-[#2AACF0] px-5 shadow-2xl xl:pr-5 xl:pl-7">
            <ul class="flex w-full items-center justify-between">
                <li class="cursor-pointer text-[16px] text-white">
                    <a target="_blank" rel="noopener noreferrer" href="" class="hover:border-b-2 hover:border-white">Главная</a>
                </li>
                <li class="cursor-pointer text-[16px] text-white">
                    <a target="_blank" rel="noopener noreferrer" href="discount.html" class="hover:border-b-2 hover:border-white">Пользователям</a>
                </li>
                <li class="cursor-pointer text-[16px] text-white">
                    <a target="_blank" rel="noopener noreferrer" href="/#popular" class="hover:border-b-2 hover:border-white">Кэшбэк</a>
                </li>
                <li class="cursor-pointer text-[16px] text-white">
                    <a target="_blank" rel="noopener noreferrer" href="buis_new.html" class="hover:border-b-2 hover:border-white">Для бизнеса</a>
                </li>
                <li class="cursor-pointer text-[16px] text-white">
                    <a target="_blank" rel="noopener noreferrer" href="help.html" class="hover:border-b-2 hover:border-white">Правила</a>
                </li>
                <li class="cursor-pointer text-[16px] text-white">
                    <a target="_blank" rel="noopener noreferrer" href="help.html" class="hover:border-b-2 hover:border-white">Контакты</a>
                </li>
                <li class="cursor-pointer text-[16px] text-white">
                    <a target="_blank" rel="noopener noreferrer" href="buis.html" class="hover:border-b-2 hover:border-white">GM</a>
                </li>
                <li class="cursor-pointer text-[16px] text-white">
                    <a target="_blank" rel="noopener noreferrer" href="coupon.html" class="hover:border-b-2 hover:border-white">₽</a>
                </li>
            </ul>
            <div class="flex items-center lg:hidden">
                <div class="ml-[52px] block h-[55px] w-[1px] bg-[#065d8b]"></div>
                <form name="search" class="s ml-4 flex items-center">
                    <input
                        type="text"
                        class="h-[41px] w-[280px] rounded-l-md border-none pr-4 pl-4 outline-none 2xl:w-[200px]"
                        placeholder="Что вы хотите найти?"
                    />
                    <div class="h-[41px] w-[1px] bg-[#4890b8]"></div>
                    <select name="location" id="location" class="h-[41px] rounded-r-md border-none outline-none focus:ring-1 focus:ring-[#2AACF0]">
                        <option value="" class="text-lg">Везде</option>
                    </select>
                </form>
                <button
                    class="ml-2 flex h-[41px] items-center justify-center rounded-md bg-[#f4d710] px-6 text-[16px] font-bold hover:text-[#983301] focus:ring-2 focus:ring-[#f4d710]"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        class="mr-1 h-4 w-4 group-hover:stroke-[#983301]"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"
                        />
                    </svg>
                    Найти
                </button>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts"></script>

<style scoped></style>
