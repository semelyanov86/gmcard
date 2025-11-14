<script setup lang="ts">
import { ProfilePromo } from '@/types/promo/ProfilePromo';

const props = defineProps<{
    promos: ProfilePromo[];
}>();
</script>

<template>
    <div class="w-3/4 p-10 rounded-2xl" style="background-color:#063965" id="activePromo">
        <h2 class="text-4xl text-white mb-5">Мои активные акции</h2>

        <!-- Если нет активных промо -->
        <div v-if="!props.promos || props.promos.length === 0" class="text-white text-center py-10">
            <p class="text-xl">У вас пока нет активных акций</p>
            <p class="text-gray-400 mt-2">Создайте свою первую акцию!</p>
        </div>

        <!-- Список активных промо -->
        <div v-else class="flex flex-wrap justify-between gap-4">
            <div v-for="promo in props.promos" :key="promo.id" class="bg-none border border-white/10 px-5 pb-5 min-w-[300px] rounded-xl flex gap-5">
                <div>
                    <div class="rounded-3xl lg:w-[232px] w-[262px] mt-7 relative main_card border border-white/10">
                        <img
                            :src="promo.img ? (promo.img.startsWith('http') ? promo.img : `/storage/${promo.img}`) : '/images/png/profile/product6.png'"
                            class="w-full object-cover h-[180px] rounded-t-3xl"
                            alt="Товар"
                        />
                        <div class="absolute -top-6 left-4 z-50" data-tooltip-target="tooltip-default" type="button">
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
                            <h3 class="px-6 py-4 line-clamp-2 overflow-hidden">{{ promo.description || 'Без описания' }}</h3>
                            <div class="w-full h-[1px] bg-black opacity-10"></div>
                            <div class="flex items-center justify-between px-6 py-4">
                                <span class="text-[17px] font-bold">{{ promo.type }}</span>
                                <img src="/images/png/profile/sale4.png" class="w-[26px] h-[26px]" alt="скидка на товар">
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-between mt-5 items-center">
                        <span class="text-sm" style="color: #648099;">{{ promo.created_at }}</span>
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
                            <span class="text-sm" style="color: #648099;">{{ promo.likes_count || 0 }}</span>
                        </div>
                    </div>
                </div>
                <div class="mt-7 flex flex-col items-center gap-4">
                    <button data-tooltip-target="tooltip-delete-active" data-tooltip-placement="top" class="relative">
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
                    <button data-tooltip-target="tooltip-up" data-tooltip-placement="top" class="relative">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="2"
                            stroke="currentColor"
                            class="w-8 p-1 cursor-pointer text-[#648099] hover:bg-[#648099] hover:text-white rounded-md"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 10.5 12 3m0 0 7.5 7.5M12 3v18" />
                        </svg>
                    </button>
                    <button data-tooltip-target="tooltip-write-active" data-tooltip-placement="top" class="relative">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="2"
                            stroke="currentColor"
                            class="w-8 p-1 cursor-pointer text-[#648099] hover:bg-[#648099] hover:text-white rounded-md"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125"
                            />
                        </svg>
                    </button>

                    <button data-tooltip-target="tooltip-end" data-tooltip-placement="top" class="relative">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="2"
                            stroke="currentColor"
                            class="w-9 p-1 cursor-pointer text-[#648099] hover:bg-[#648099] hover:text-white rounded-md"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88"
                            />
                        </svg>
                    </button>
                    <div
                        id="tooltip-end"
                        role="tooltip"
                        class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-[#041f35] rounded-lg shadow-sm opacity-0 tooltip"
                    >
                        Завершить акцию
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                    <div
                        id="tooltip-up"
                        role="tooltip"
                        class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-[#041f35] rounded-lg shadow-sm opacity-0 tooltip"
                    >
                        Поднять акцию
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                    <div
                        id="tooltip-write-active"
                        role="tooltip"
                        class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-[#041f35] rounded-lg shadow-sm opacity-0 tooltip"
                    >
                        Редактировать
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                    <div
                        id="tooltip-delete-active"
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

