<script setup lang="ts">
</script>

<template>
    <div class="w-3/4 p-10 rounded-2xl" style="background-color:#063965" id="namoderasii">
        <h2 class="text-4xl text-white mb-5">Заявки на модерацию</h2>
        <div class="flex flex-wrap justify-between gap-4">
            <div class="bg-none border border-white/10 px-5 pb-5 min-w-[300px] rounded-xl flex gap-5">
                <div>
                    <div class="rounded-xl lg:w-[232px] w-[262px] mt-7 relative main_card">
                        <img src="/images/png/profile/product6.png" class="w-full" alt="Товар">
                        <div class="absolute -top-6 left-4 z-40" data-tooltip-target="tooltip-default" type="button">
                            <img class="w-[77px] h-[52px]" src="/images/png/profile/sale4.png" alt="Скидка на товар">
                            <div
                                id="tooltip-default"
                                role="tooltip"
                                class="absolute z-10 w-[250px] invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700"
                            >
                                Скидки по промокодам и кэшбэк от онлайн-магазинов и сервисов - на одежду. Каждый день что-то новое.
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        </div>
                        <div class="bg-white rounded-b-3xl lg:h-[150px] h-[136px] down_block text-[15px] text-[#000000]">
                            <h3 class="px-6 py-4">При покупке двух часов третьи в подарок от производителя</h3>
                            <div class="w-full h-[1px] bg-black opacity-10"></div>
                            <div class="flex items-center justify-between px-6 py-4">
                                <span class="text-[17px] font-bold">Акция 2+1</span>
                                <img src="/images/png/profile/sale4.png" class="w-[26px] h-[26px]" alt="скидка на товар">
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-between mt-5 items-center">
                        <span class="text-sm" style="color: #648099;">18 сентября 2014 23:10</span>
                        <div class="flex items-center gap-1">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="#648099"
                                class="w-6 cursor-pointer"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z"
                                />
                            </svg>
                            <span class="text-sm" style="color: #648099;">2000</span>
                        </div>
                    </div>
                </div>
                <div class="mt-7 flex flex-col items-center gap-4">
                    <button data-tooltip-target="tooltip-delete-moderation" data-tooltip-placement="top" class="hovBg relative">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="2"
                            stroke="currentColor"
                            class="w-9 p-1 cursor-pointer text-[#648099] hover:bg-[#648099] hover:text-white rounded-md"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>
                    </button>
                    <div
                        id="tooltip-delete-moderation"
                        role="tooltip"
                        class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-[#041f35] rounded-lg shadow-sm opacity-0 tooltip"
                    >
                        Удалить
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

