<script setup lang="ts">
import InputError from '@/components/InputError.vue';
import PasswordToggleIcon from '@/components/PasswordToggleIcon.vue';
import PrimaryButton from '@/components/primitives/PrimaryButton.vue';
import TextLink from '@/components/TextLink.vue';
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

defineProps<{
    status?: string;
    canResetPassword?: boolean;
}>();

const loginForm = useForm({
    email: '',
    password: '',
});

const showLoginPassword = ref(false);

const submitLogin = () => {
    loginForm.post(route('login'), {
        onFinish: () => loginForm.reset('password'),
    });
};
</script>

<template>
    <div class="w-full">
        <div v-if="status" class="mt-6 mb-4 text-center text-sm font-medium text-green-600">
            {{ status }}
        </div>

        <p class="mt-5 w-full text-lg">Введите email и пароль для входа</p>
        <form @submit.prevent="submitLogin" class="flex w-full flex-col">
            <div class="relative mt-5 flex w-full flex-col">
                <label for="login-email" class="mb-2 text-sm font-semibold">Ваш адрес электронной почты</label>
                <input
                    id="login-email"
                    type="email"
                    placeholder="Ваш адрес электронной почты"
                    required
                    autofocus
                    autocomplete="username"
                    v-model="loginForm.email"
                    class="w-full rounded-md border border-black/40 p-3"
                />
                <i class="absolute top-0 right-1 text-[12px] opacity-50">* обязательное поле</i>
                <InputError :message="loginForm.errors.email" />
            </div>

            <div class="relative mt-5 flex w-full flex-col">
                <label for="login-password" class="mb-2 text-sm font-semibold">Ваш пароль</label>
                <input
                    id="login-password"
                    :type="showLoginPassword ? 'text' : 'password'"
                    minlength="8"
                    placeholder="Введите пароль"
                    required
                    autocomplete="current-password"
                    v-model="loginForm.password"
                    class="w-full rounded-md border border-black/40 p-3 pr-10"
                />
                <PasswordToggleIcon :show="showLoginPassword" @toggle="showLoginPassword = !showLoginPassword" />
                <i class="absolute top-0 right-1 text-[12px] opacity-50">* обязательное поле</i>
                <InputError :message="loginForm.errors.password" />
            </div>

            <PrimaryButton type="submit" :disabled="loginForm.processing" :loading="loginForm.processing" class="mt-10"> Войти </PrimaryButton>

            <TextLink v-if="canResetPassword" :href="route('password.request')" class="mt-5 text-center">Забыли пароль?</TextLink>
        </form>
    </div>
</template>

