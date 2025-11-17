<script setup lang="ts">
import { ProfilePromo } from '@/types/promo/ProfilePromo';
import { Link, router } from '@inertiajs/vue3';

const props = defineProps<{
    promos: ProfilePromo[];
}>();

function deletePromo(promoId: number): void {
    if (!confirm('Удалить акцию?')) {
        return;
    }

    router.delete(route('promos.destroy', promoId), {
        preserveScroll: true,
    });
}
</script>

<template>
    <div class="w-3/4 rounded-2xl p-10" style="background-color: #063965" id="activePromo">
        <h2 class="mb-5 text-4xl text-white">Мои активные акции</h2>

        <!-- Если нет активных промо -->
        <div v-if="!props.promos || props.promos.length === 0" class="py-10 text-center text-white">
            <p class="text-xl">У вас пока нет активных акций</p>
            <p class="mt-2 text-gray-400">Создайте свою первую акцию!</p>
        </div>

        <!-- Список активных промо -->
        <div v-else class="flex flex-wrap justify-between gap-4">
            <div v-for="promo in props.promos" :key="promo.id" class="flex min-w-[300px] gap-5 rounded-xl border border-white/10 bg-none px-5 pb-5">
                <div>
                    <div class="main_card relative mt-7 w-[262px] rounded-3xl border border-white/10 lg:w-[232px]">
                        <img
                            :src="
                                promo.img ? (promo.img.startsWith('http') ? promo.img : `/storage/${promo.img}`) : '/images/png/profile/product6.png'
                            "
                            class="h-[180px] w-full rounded-t-3xl object-cover"
                            alt="Товар"
                        />
                        <div class="pointer-events-none absolute -top-6 left-4 z-10">
                            <img class="h-[52px] w-[77px]" src="/images/png/profile/sale4.png" alt="Скидка на товар" />
                        </div>
                        <div class="down_block h-[136px] rounded-b-3xl bg-white text-[15px] text-[#000000] lg:h-[150px]">
                            <h3 class="line-clamp-2 overflow-hidden px-6 py-4">{{ promo.description || 'Без описания' }}</h3>
                            <div class="h-[1px] w-full bg-black opacity-10"></div>
                            <div class="flex items-center justify-between px-6 py-4">
                                <span class="text-[17px] font-bold">{{ promo.type }}</span>
                                <img src="/images/png/profile/sale4.png" class="h-[26px] w-[26px]" alt="скидка на товар" />
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 flex items-center justify-between">
                        <span class="text-sm" style="color: #648099">{{ promo.created_at }}</span>
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
                            <span class="text-sm" style="color: #648099">{{ promo.likes_count || 0 }}</span>
                        </div>
                    </div>
                </div>
                <div class="mt-7 flex flex-col items-center gap-4">
                    <button
                        type="button"
                        data-tooltip-target="tooltip-delete-active"
                        data-tooltip-placement="top"
                        class="relative"
                        @click="deletePromo(promo.id)"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="2"
                            stroke="currentColor"
                            class="w-9 cursor-pointer rounded-md p-1 text-[#648099] hover:bg-[#648099] hover:text-white"
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
                            class="w-8 cursor-pointer rounded-md p-1 text-[#648099] hover:bg-[#648099] hover:text-white"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 10.5 12 3m0 0 7.5 7.5M12 3v18" />
                        </svg>
                    </button>
                    <Link
                        :href="route('promos.edit', promo.id)"
                        data-tooltip-target="tooltip-write-active"
                        data-tooltip-placement="top"
                        class="relative"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="2"
                            stroke="currentColor"
                            class="w-8 cursor-pointer rounded-md p-1 text-[#648099] hover:bg-[#648099] hover:text-white"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125"
                            />
                        </svg>
                    </Link>

                    <button data-tooltip-target="tooltip-end" data-tooltip-placement="top" class="relative">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="2"
                            stroke="currentColor"
                            class="w-9 cursor-pointer rounded-md p-1 text-[#648099] hover:bg-[#648099] hover:text-white"
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
                        class="tooltip invisible absolute z-10 inline-block rounded-lg bg-[#041f35] px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300"
                    >
                        Завершить акцию
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                    <div
                        id="tooltip-up"
                        role="tooltip"
                        class="tooltip invisible absolute z-10 inline-block rounded-lg bg-[#041f35] px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300"
                    >
                        Поднять акцию
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                    <div
                        id="tooltip-write-active"
                        role="tooltip"
                        class="tooltip invisible absolute z-10 inline-block rounded-lg bg-[#041f35] px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300"
                    >
                        Редактировать
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                    <div
                        id="tooltip-delete-active"
                        role="tooltip"
                        class="tooltip invisible absolute z-10 inline-block rounded-lg bg-[#041f35] px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300"
                    >
                        Удалить
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
