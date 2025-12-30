<script setup lang="ts">
import AuthCustomLayout from '@/layouts/auth/AuthCustomLayout.vue';
import { AuthTab } from '@/types/enums/auth/AuthTab';
import { ref } from 'vue';
import AuthTabButton from './components/AuthTabButton.vue';
import LoginTab from './components/LoginTab.vue';
import RegisterTab from './components/RegisterTab.vue';
import ResetTab from './components/ResetTab.vue';

const props = defineProps<{
    status?: string;
    canResetPassword?: boolean;
    initialTab?: 'register' | 'login' | 'reset';
}>();

const activeTab = ref<AuthTab>(props.initialTab === 'login' ? AuthTab.Login : props.initialTab === 'reset' ? AuthTab.Reset : AuthTab.Register);

const tabs = [
    { value: AuthTab.Register, label: 'Регистрация' },
    { value: AuthTab.Login, label: 'Войти' },
    { value: AuthTab.Reset, label: 'Сброс' },
];
</script>

<template>
    <AuthCustomLayout>
        <div class="mt-5 flex w-full gap-2 rounded-lg bg-gray-100 p-1">
            <AuthTabButton v-for="tab in tabs" :key="tab.value" :tab="tab" :is-active="activeTab === tab.value" @click="activeTab = tab.value" />
        </div>

        <RegisterTab v-if="activeTab === AuthTab.Register" :status="status" />
        <LoginTab v-if="activeTab === AuthTab.Login" :status="status" :can-reset-password="canResetPassword" />
        <ResetTab v-if="activeTab === AuthTab.Reset" :status="status" />
    </AuthCustomLayout>
</template>
