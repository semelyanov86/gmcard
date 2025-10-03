<script setup lang="ts">
import TextLink from '@/components/TextLink.vue';
import { useForm } from '@inertiajs/vue3';
import AuthCustomLayout from '@/layouts/auth/AuthCustomLayout.vue';
import PrimaryButton from '@/components/primitives/PrimaryButton.vue';

defineProps<{
    status?: string;
}>();

const form = useForm({
    email: '',
});

const submit = () => {
    form.post(route('password.email'));
};
</script>

<template>
    <AuthCustomLayout title="Восстановление пароля">
            <div v-if="status" class="mb-4 mt-6 text-center text-sm font-medium text-green-600">
                {{ status }}
            </div>
            <p class="w-full text-lg mt-10">Введите email, который указывали при регистрации</p>
            <form @submit.prevent="submit" class="flex flex-col w-full">
                <div class="flex flex-col w-full mt-5 relative">
                    <label for="email" class="text-sm font-semibold mb-2">Ваш адрес электронной почты</label>
                    <input
                        id="email"
                        type="email"
                        name="email"
                        autocomplete="off"
                        v-model="form.email"
                        autofocus
                        required
                        placeholder="Ваш адрес электронной почты"
                        class="border border-black/40 p-3 w-full rounded-md"
                    >
                    <i class="text-[12px] opacity-50 absolute right-1 top-0">* обязательное поле</i>
                    <p v-if="form.errors.email" class="flex items-center gap-1 text-xs text-red-500 mt-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-red-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                        </svg>
                    </p>
                </div>
                <PrimaryButton
                    type="submit"
                    :loading="form.processing"
                    :disabled="form.processing"
                    class="mt-10"
                >
                    Восстановить
                </PrimaryButton>
            </form>
            <p class="mt-10 text-base text-center">
                Вспомнили пароль?
                <TextLink :href="route('login')" class="font-bold ml-1 hover:text-[#F9D914] underline">Войти</TextLink>
            </p>
    </AuthCustomLayout>
</template>
