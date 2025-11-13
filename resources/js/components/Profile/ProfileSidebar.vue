<script setup lang="ts">
import { ProfileTab } from '@/types/enums/profile/ProfileTab';
import { Link } from '@inertiajs/vue3';

const activeTab = defineModel<ProfileTab>({
    required: true,
});
</script>

<template>
    <div class="flex flex-col gap-5">
        <div class="w-[250px] route_block bg-white rounded-2xl py-2">
            <ul class="w-full flex flex-col">
                <p
                    @click="activeTab = ProfileTab.Profile"
                    :class="[
                        'px-4 mx-4 py-2 my-2 cursor-pointer hover:no-underline',
                        activeTab === ProfileTab.Profile
                            ? 'bg-[#063966] text-white rounded-lg'
                            : 'underline text-[#1d89f2] hover:bg-[#063966] hover:text-white hover:rounded-lg hover:no-underline',
                    ]"
                >
                    Личный кабинет
                </p>
                <div class="w-full h-[1px] bg-black/20"></div>
                <Link
                    :href="route('promos.create')"
                    class="px-4 mx-4 py-2 my-2 underline text-[#1d89f2] hover:bg-[#063966] hover:text-white hover:rounded-lg hover:no-underline"
                    >Запустить акцию</Link
                >
                <div class="w-full h-[1px] bg-black/20"></div>
                <p
                    @click="activeTab = ProfileTab.Active"
                    :class="[
                        'px-4 mx-4 py-2 my-2 cursor-pointer',
                        activeTab === ProfileTab.Active
                            ? 'bg-[#063966] text-white rounded-lg hover:no-underline'
                            : 'underline text-[#1d89f2] hover:bg-[#063966] hover:text-white hover:rounded-lg hover:no-underline',
                    ]"
                >
                    Мои активные акции
                </p>
                <div class="w-full h-[1px] bg-black/20"></div>
                <p
                    @click="activeTab = ProfileTab.Completed"
                    :class="[
                        'px-4 mx-4 py-2 my-2 cursor-pointer',
                        activeTab === ProfileTab.Completed
                            ? 'bg-[#063966] text-white rounded-lg hover:no-underline'
                            : 'underline text-[#1d89f2] hover:bg-[#063966] hover:text-white hover:rounded-lg hover:no-underline',
                    ]"
                >
                    Мои завершенные акции
                </p>
                <div class="w-full h-[1px] bg-black/20"></div>
                <p
                    @click="activeTab = ProfileTab.Rejected"
                    :class="[
                        'px-4 mx-4 py-2 my-2 cursor-pointer',
                        activeTab === ProfileTab.Rejected
                            ? 'bg-[#063966] text-white rounded-lg hover:no-underline'
                            : 'underline text-[#1d89f2] hover:bg-[#063966] hover:text-white hover:rounded-lg hover:no-underline',
                    ]"
                >
                    Мои отклоненные акции
                </p>
                <div class="w-full h-[1px] bg-black/20"></div>
                <p
                    class="px-4 mx-4 py-2 my-2 underline text-[#1d89f2] cursor-pointer hover:bg-[#063966] hover:text-white hover:rounded-lg hover:no-underline"
                >
                    Черновики
                </p>
                <div class="w-full h-[1px] bg-black/20"></div>
                <p
                    class="px-4 mx-4 py-2 my-2 underline text-[#1d89f2] cursor-pointer hover:bg-[#063966] hover:text-white hover:rounded-lg hover:no-underline"
                >
                    Избранное
                </p>
            </ul>
        </div>
        <button
            @click="activeTab = ProfileTab.Moderation"
            :class="[
                'px-6 py-2 h-[41px] text-[16px] rounded-lg font-bold ml-2 focus:ring-2',
                activeTab === ProfileTab.Moderation ? 'bg-[#063966] text-white' : 'bg-[#f4d710] hover:text-[#983301] focus:ring-[#f4d710]',
            ]"
        >
            Заявки на модерацию
        </button>
    </div>
</template>

