<script setup lang="ts">
import Tooltip from '@/components/Profile/Tooltip.vue';
import DeleteIcon from '@/components/Promo/icons/DeleteIcon.vue';
import EditIcon from '@/components/Promo/icons/EditIcon.vue';
import AdminMessageIcon from '@/components/Promo/icons/AdminMessageIcon.vue';
import LikeIcon from '@/components/Promo/icons/LikeIcon.vue';

const emit = defineEmits<{
    (e: 'show-admin-message'): void;
}>();

function handleAdminMessageClick(): void {
    emit('show-admin-message');
}
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
                            <LikeIcon />
                            <span class="text-sm" style="color: #648099">2000</span>
                        </div>
                    </div>
                </div>
                <div class="mt-7 flex flex-col items-center gap-4">
                    <button data-tooltip-target="tooltip-delete-rejected" data-tooltip-placement="top" class="hovBg relative">
                        <DeleteIcon />
                    </button>
                    <Tooltip id="tooltip-delete-rejected" text="Удалить" />

                    <button data-tooltip-target="tooltip-write-rejected" data-tooltip-placement="top" class="hovBg relative">
                        <EditIcon />
                    </button>
                    <Tooltip id="tooltip-write-rejected" text="Редактировать" />

                    <button
                        data-tooltip-target="tooltip-defaulter"
                        data-tooltip-placement="top"
                        class="hovBg relative"
                        type="button"
                        @click="handleAdminMessageClick"
                    >
                        <AdminMessageIcon />
                    </button>
                    <Tooltip id="tooltip-defaulter" text="Сообщение от администрации" />
                </div>
            </div>
        </div>
    </div>
</template>
