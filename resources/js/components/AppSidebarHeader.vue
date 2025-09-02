<script setup lang="ts">
import { SidebarTrigger } from '@/components/ui/sidebar';
import { Button } from '@/components/ui/button';
import { DropdownMenu, DropdownMenuContent, DropdownMenuTrigger } from '@/components/ui/dropdown-menu';
import UserMenuContent from '@/components/UserMenuContent.vue';
import type { BreadcrumbItemType } from '@/types';
import { Avatar, AvatarFallback, AvatarImage } from '@/components/ui/avatar';
import { getInitials } from '@/composables/useInitials';
import { usePage } from '@inertiajs/vue3';
import { computed } from 'vue';
import { Search } from 'lucide-vue-next';

withDefaults(
    defineProps<{
        breadcrumbs?: BreadcrumbItemType[];
    }>(),
    {
        breadcrumbs: () => [],
    },
);

const page = usePage();
const auth = computed(() => page.props.auth);
</script>

<template>
    <header
        class="flex h-16 shrink-0 items-center gap-2 border-b border-sidebar-border/70 px-6 transition-[width,height] ease-linear group-has-data-[collapsible=icon]/sidebar-wrapper:h-12 md:px-4"
    >
        <div class="flex flex-1 items-center gap-2">
            <SidebarTrigger class="-ml-1" />
        </div>

        <div class="ml-auto flex items-center gap-2">
            <div class="relative mr-1 flex items-center">
                <Search class="pointer-events-none absolute left-3 h-4 w-4 text-neutral-400" />
                <input
                    type="text"
                    placeholder="Search"
                    class="h-9 w-56 rounded-md border border-neutral-200 bg-white pl-9 pr-3 text-sm text-neutral-800 outline-none ring-0 placeholder:text-neutral-400 focus:border-neutral-300 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-100 dark:focus:border-neutral-600"
                />
            </div>

            <DropdownMenu>
                <DropdownMenuTrigger :as-child="true">
                    <Button variant="ghost" size="icon" class="relative size-10 w-auto cursor-pointer rounded-full p-1">
                        <Avatar class="size-8 overflow-hidden rounded-full">
                            <AvatarImage v-if="auth.user.avatar" :src="auth.user.avatar" :alt="auth.user.name" />
                            <AvatarFallback class="rounded-full bg-black font-semibold text-white">
                                {{ getInitials(auth.user?.name) }}
                            </AvatarFallback>
                        </Avatar>
                    </Button>
                </DropdownMenuTrigger>
                <DropdownMenuContent align="end" class="w-56">
                    <UserMenuContent :user="auth.user" />
                </DropdownMenuContent>
            </DropdownMenu>
        </div>
    </header>
</template>
