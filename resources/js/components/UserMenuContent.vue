<script setup lang="ts">
import UserInfo from '@/components/UserInfo.vue';
import { DropdownMenuGroup, DropdownMenuItem, DropdownMenuLabel, DropdownMenuSeparator } from '@/components/ui/dropdown-menu';
import { useAppearance } from '@/composables/useAppearance';
import type { User } from '@/types';
import { Link, router } from '@inertiajs/vue3';
import { LogOut, Monitor, Moon, Settings, Sun } from 'lucide-vue-next';

interface Props {
    user: User;
}

const handleLogout = () => {
    router.flushAll();
};

const { appearance, updateAppearance } = useAppearance();

defineProps<Props>();
</script>

<template>
    <DropdownMenuLabel class="p-0 font-normal">
        <div class="flex items-center gap-2 px-1 py-1.5 text-left text-sm">
            <UserInfo :user="user" :show-email="true" />
        </div>
    </DropdownMenuLabel>
    <DropdownMenuSeparator />

    <DropdownMenuGroup>
        <DropdownMenuItem @click="updateAppearance('light')">
            <Sun class="mr-2 h-4 w-4" />
            <span class="flex-1">Light</span>
            <span v-if="appearance === 'light'" class="text-xs text-neutral-500">Current</span>
        </DropdownMenuItem>
        <DropdownMenuItem @click="updateAppearance('dark')">
            <Moon class="mr-2 h-4 w-4" />
            <span class="flex-1">Dark</span>
            <span v-if="appearance === 'dark'" class="text-xs text-neutral-500">Current</span>
        </DropdownMenuItem>
        <DropdownMenuItem @click="updateAppearance('system')">
            <Monitor class="mr-2 h-4 w-4" />
            <span class="flex-1">System</span>
            <span v-if="appearance === 'system'" class="text-xs text-neutral-500">Current</span>
        </DropdownMenuItem>
    </DropdownMenuGroup>

    <DropdownMenuSeparator />
    <DropdownMenuGroup>
        <DropdownMenuItem :as-child="true">
            <Link class="block w-full" :href="route('profile.edit')" prefetch as="button">
                <Settings class="mr-2 h-4 w-4" />
                Settings
            </Link>
        </DropdownMenuItem>
    </DropdownMenuGroup>
    <DropdownMenuSeparator />
    <DropdownMenuItem :as-child="true">
        <Link class="block w-full" method="post" :href="route('logout')" @click="handleLogout" as="button">
            <LogOut class="mr-2 h-4 w-4" />
            Log out
        </Link>
    </DropdownMenuItem>
</template>
