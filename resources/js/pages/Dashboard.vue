<script setup lang="ts">
import { Avatar, AvatarFallback, AvatarImage } from '@/components/ui/avatar';
import { getInitials } from '@/composables/useInitials';
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head, Link, usePage } from '@inertiajs/vue3';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/dashboard',
    },
];

const page = usePage();
const auth = page.props.auth as { user?: { name?: string; avatar?: string } };
</script>

<template>
    <Head title="Dashboard" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col">
            <div class="flex h-screen w-full gap-x-8">
                <div class="relative h-screen w-[20%] space-y-4 px-2 pt-6 md:pt-8">
                    <div class="rounded-xl border border-sidebar-border/70 bg-background p-4 dark:border-sidebar-border">
                        <div class="flex items-center gap-4">
                            <div class="flex flex-col">
                                <span class="text-base font-medium">Menu</span>
                                <div class="mt-3 grid grid-cols-1 gap-2">
                                    <Link
                                        :href="route('business.landing')"
                                        class="w-full rounded-md border px-3 py-2 text-left text-sm font-medium hover:bg-muted"
                                        >Главная</Link
                                    >
                                    <Link href="/" class="w-full rounded-md border px-3 py-2 text-left text-sm font-medium hover:bg-muted"
                                        >Юзер лендинг</Link
                                    >
                                    <Link
                                        :href="route('password.confirm')"
                                        class="w-full rounded-md border px-3 py-2 text-left text-sm font-medium hover:bg-muted"
                                        >Восстановление пароля/Подтверждение</Link
                                    >
                                    <Link
                                        :href="route('verification.notice')"
                                        class="w-full rounded-md border px-3 py-2 text-left text-sm font-medium hover:bg-muted"
                                        >Подтвердить email</Link
                                    >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="relative h-screen w-[80%] space-y-4 px-2">
                    <div class="flex items-center py-6 md:py-8">
                        <h2 class="text-3xl font-semibold md:text-4xl">Dashboard</h2>
                    </div>

                    <div class="w-250 rounded-xl border border-sidebar-border/70 bg-background p-4 dark:border-sidebar-border">
                        <div class="flex items-center gap-4">
                            <Avatar class="size-10 overflow-hidden rounded-full">
                                <AvatarImage v-if="auth.user?.avatar" :src="auth.user?.avatar" :alt="auth.user?.name || 'User'" />
                                <AvatarFallback class="rounded-full bg-black font-semibold text-white">
                                    {{ getInitials(auth.user?.name) }}
                                </AvatarFallback>
                            </Avatar>
                            <div class="flex flex-col">
                                <span class="text-sm text-neutral-500">{{ auth.user?.name || 'admin' }}</span>
                                <span class="text-base font-medium">Welcome</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
