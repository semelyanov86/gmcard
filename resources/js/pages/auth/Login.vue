<script setup lang="ts">
import PrimaryButton from '@/components/primitives/PrimaryButton.vue';
import TextLink from '@/components/TextLink.vue';
import AuthCustomLayout from '@/layouts/auth/AuthCustomLayout.vue';
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

defineProps<{
    status?: string;
    canResetPassword: boolean;
}>();

const form = useForm({
    email: '',
    password: '',
});

const showPassword = ref(false);

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <AuthCustomLayout>
        <div v-if="status" class="mt-6 mb-4 text-center text-sm font-medium text-green-600">
            {{ status }}
        </div>
        <p class="mt-10 w-full text-lg">Введите email и пароль для входа</p>
        <form @submit.prevent="submit" class="flex w-full flex-col">
            <div class="relative mt-5 flex w-full flex-col">
                <label for="email" class="mb-2 text-sm font-semibold">Ваш адрес электронной почты</label>
                <input
                    id="email"
                    type="email"
                    placeholder="Ваш адрес электронной почты"
                    name="email"
                    required
                    :tabindex="2"
                    autocomplete="email"
                    v-model="form.email"
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
                    {{ form.errors.email }}
                </p>
            </div>

            <div class="relative mt-5 flex w-full flex-col">
                <label for="password" class="mb-2 text-sm font-semibold">Ваш пароль</label>
                <input
                    id="password"
                    :type="showPassword ? 'text' : 'password'"
                    minlength="8"
                    placeholder="Ваш пароль"
                    name="password"
                    required
                    :tabindex="3"
                    autocomplete="current-password"
                    v-model="form.password"
                    class="w-full rounded-md border border-black/40 p-3 pr-10"
                />
                <img
                    src="/images/svg/passSee.svg"
                    alt="Показать пароль"
                    @click="showPassword = !showPassword"
                    class="absolute top-10 right-4 h-5 w-5 cursor-pointer opacity-70 hover:opacity-100"
                />
                <i class="absolute top-0 right-1 text-[12px] opacity-50">* обязательное поле</i>
                <p v-if="form.errors.password" class="mt-1 flex items-center gap-1 text-xs text-red-500">
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
                    {{ form.errors.password }}
                </p>
            </div>
            <PrimaryButton type="submit" :loading="form.processing" :disabled="form.processing" class="mt-10"> Войти </PrimaryButton>
        </form>
        <p class="mt-10 text-center text-base">
            Забыл пароль?
            <TextLink :href="route('password.request')" class="ml-1 font-bold underline hover:text-[#F9D914]">Восстановить</TextLink>
        </p>
    </AuthCustomLayout>
</template>
