<script setup lang="ts">
import PrimaryButton from '@/components/primitives/PrimaryButton.vue';
import AuthCustomLayout from '@/layouts/auth/AuthCustomLayout.vue';
import { useForm } from '@inertiajs/vue3';

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
    <AuthCustomLayout>
        <div v-if="status" class="mt-6 mb-4 text-center text-sm font-medium text-green-600">
            {{ status }}
        </div>
        <p class="mt-10 w-full text-lg">Введите email, который указывали при регистрации</p>
        <form @submit.prevent="submit" class="flex w-full flex-col">
            <div class="relative mt-5 flex w-full flex-col">
                <label for="email" class="mb-2 text-sm font-semibold">Ваш адрес электронной почты</label>
                <input
                    id="email"
                    type="email"
                    name="email"
                    autocomplete="off"
                    v-model="form.email"
                    autofocus
                    required
                    placeholder="Ваш адрес электронной почты"
                    class="w-full rounded-md border border-black/40 p-3"
                />
                <i class="absolute top-0 right-1 text-[12px] opacity-50">* обязательное поле</i>
                <p v-if="form.errors.email" class="mt-1 flex items-center gap-1 text-xs text-red-500">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        class="h-5 w-5 text-red-500"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z"
                        />
                    </svg>
                </p>
            </div>
            <PrimaryButton type="submit" :loading="form.processing" :disabled="form.processing" class="mt-10"> Восстановить </PrimaryButton>
        </form>
        <p class="mt-10 text-center text-base">
            Вспомнили пароль?
            <TextLink :href="route('login')" class="ml-1 font-bold underline hover:text-[#F9D914]">Войти</TextLink>
        </p>
    </AuthCustomLayout>
</template>
