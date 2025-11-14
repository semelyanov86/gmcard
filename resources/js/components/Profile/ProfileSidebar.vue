<script setup lang="ts">
import ModerationButton from '@/components/Profile/ModerationButton.vue';
import ProfileMenuItem from '@/components/Profile/ProfileMenuItem.vue';
import { ProfileTab } from '@/types/enums/profile';
import { Link } from '@inertiajs/vue3';

const activeTab = defineModel<ProfileTab>();
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
                <ProfileMenuItem
                    label="Мои активные акции"
                    :is-active="activeTab === ProfileTab.Active"
                    @click="activeTab = ProfileTab.Active"
                />
                <ProfileMenuItem
                    label="Мои завершенные акции"
                    :is-active="activeTab === ProfileTab.Completed"
                    @click="activeTab = ProfileTab.Completed"
                />
                <ProfileMenuItem
                    label="Мои отклоненные акции"
                    :is-active="activeTab === ProfileTab.Rejected"
                    @click="activeTab = ProfileTab.Rejected"
                />
                <div class="w-full h-[1px] bg-black/20"></div>
                <p class="px-4 mx-4 py-2 my-2 underline text-[#1d89f2] cursor-pointer hover:bg-[#063966] hover:text-white hover:rounded-lg hover:no-underline">
                    Черновики
                </p>
                <div class="w-full h-[1px] bg-black/20"></div>
                <p class="px-4 mx-4 py-2 my-2 underline text-[#1d89f2] cursor-pointer hover:bg-[#063966] hover:text-white hover:rounded-lg hover:no-underline">
                    Избранное
                </p>
            </ul>
        </div>
        <ModerationButton
            :is-active="activeTab === ProfileTab.Moderation"
            @click="activeTab = ProfileTab.Moderation"
        />
    </div>
</template>

