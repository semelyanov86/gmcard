<script setup lang="ts">
import Tooltip from '@/components/Profile/Tooltip.vue';

const emit = defineEmits<{
    (e: 'show-admin-message'): void;
}>();

function handleAdminMessageClick(): void {
    emit('show-admin-message');
}

const iconClass = 'cursor-pointer rounded-md p-1 text-[#648099] hover:bg-[#648099] hover:text-white';
</script>

<template>
    <div class="w-3/4 rounded-2xl p-10" style="background-color: #063965" id="rejectPromo">
        <h2 class="mb-5 text-4xl text-white">Мои отклоненные акции</h2>
        <div class="flex flex-wrap justify-between gap-4">
            <div class="flex min-w-[300px] gap-5 rounded-xl border border-white/10 bg-none px-5 pb-5">
                <div>
                    <div class="main_card relative mt-7 w-[262px] rounded-xl lg:w-[232px]">
                        <img src="/images/png/profile/product6.png" class="w-full" alt="Товар" />
                        <div class="absolute -top-6 left-4 z-40" data-tooltip-target="tooltip-default" type="button">
                            <img class="h-[52px] w-[77px]" src="/images/png/profile/sale4.png" alt="Скидка на товар" />
                            <div
                                id="tooltip-default"
                                role="tooltip"
                                class="tooltip invisible absolute z-10 inline-block w-250 rounded-lg bg-[#041f35] px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300"
                            >
                                Скидки по промокодам и кэшбэк от онлайн-магазинов и сервисов - на одежду. Каждый день что-то новое.
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        </div>
                        <div class="down_block h-[136px] rounded-b-3xl bg-white text-[15px] text-[#000000] lg:h-[150px]">
                            <h3 class="px-6 py-4">При покупке двух часов третьи в подарок от производителя</h3>
                            <div class="h-[1px] w-full bg-black opacity-10"></div>
                            <div class="flex items-center justify-between px-6 py-4">
                                <span class="text-[17px] font-bold">Акция 2+1</span>
                                <img src="/images/png/profile/sale4.png" class="h-[26px] w-[26px]" alt="скидка на товар" />
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 flex items-center justify-between">
                        <span class="text-sm" style="color: #648099">18 сентября 2014 23:10</span>
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
                            <span class="text-sm" style="color: #648099">2000</span>
                        </div>
                    </div>
                </div>
                <div class="mt-7 flex flex-col items-center gap-4">
                    <button data-tooltip-target="tooltip-delete-rejected" data-tooltip-placement="top" class="hovBg relative">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="2"
                            stroke="currentColor"
                            :class="['w-9', iconClass]"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>
                    </button>
                    <Tooltip id="tooltip-delete-rejected" text="Удалить" />

                    <button data-tooltip-target="tooltip-write-rejected" data-tooltip-placement="top" class="hovBg relative">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="2"
                            stroke="currentColor"
                            :class="['w-8', iconClass]"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125"
                            />
                        </svg>
                    </button>
                    <Tooltip id="tooltip-write-rejected" text="Редактировать" />

                    <button
                        data-tooltip-target="tooltip-defaulter"
                        data-tooltip-placement="top"
                        class="hovBg relative"
                        type="button"
                        @click="handleAdminMessageClick"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="2"
                            stroke="currentColor"
                            :class="['w-8', iconClass]"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75"
                            />
                        </svg>
                    </button>
                    <Tooltip id="tooltip-defaulter" text="Сообщение от администрации" />
                </div>
            </div>
        </div>
    </div>
</template>
