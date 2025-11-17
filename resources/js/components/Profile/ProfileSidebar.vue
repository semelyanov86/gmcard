<script setup lang="ts">
import ModerationButton from '@/components/Profile/ModerationButton.vue';
import ProfileMenuItem from '@/components/Profile/ProfileMenuItem.vue';
import { ProfileTab } from '@/types/enums/profile';
import { Link } from '@inertiajs/vue3';

const activeTab = defineModel<ProfileTab>();
</script>

<template>
    <div class="flex flex-col gap-5">
        <div class="route_block w-[250px] rounded-2xl bg-white py-2">
            <ul class="flex w-full flex-col">
                <p
                    @click="activeTab = ProfileTab.Profile"
                    :class="[
                        'mx-4 my-2 cursor-pointer px-4 py-2 hover:no-underline',
                        activeTab === ProfileTab.Profile
                            ? 'rounded-lg bg-[#063966] text-white'
                            : 'text-[#1d89f2] underline hover:rounded-lg hover:bg-[#063966] hover:text-white hover:no-underline',
                    ]"
                >
                    Личный кабинет
                </p>
                <div class="h-[1px] w-full bg-black/20"></div>
                <Link
                    :href="route('promos.create')"
                    class="mx-4 my-2 px-4 py-2 text-[#1d89f2] underline hover:rounded-lg hover:bg-[#063966] hover:text-white hover:no-underline"
                    >Запустить акцию</Link
                >
                <ProfileMenuItem label="Мои активные акции" :is-active="activeTab === ProfileTab.Active" @click="activeTab = ProfileTab.Active" />
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
                <div class="h-[1px] w-full bg-black/20"></div>
                <p
                    class="mx-4 my-2 cursor-pointer px-4 py-2 text-[#1d89f2] underline hover:rounded-lg hover:bg-[#063966] hover:text-white hover:no-underline"
                >
                    Черновики
                </p>
                <div class="h-[1px] w-full bg-black/20"></div>
                <p
                    class="mx-4 my-2 cursor-pointer px-4 py-2 text-[#1d89f2] underline hover:rounded-lg hover:bg-[#063966] hover:text-white hover:no-underline"
                >
                    Избранное
                </p>
            </ul>
        </div>
        <ModerationButton :is-active="activeTab === ProfileTab.Moderation" @click="activeTab = ProfileTab.Moderation" />
    </div>
</template>
