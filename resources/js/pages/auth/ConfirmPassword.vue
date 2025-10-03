<script setup lang="ts">
import { useForm } from '@inertiajs/vue3';
import AuthCustomLayout from '@/layouts/auth/AuthCustomLayout.vue';
import { ref } from 'vue';
import PrimaryButton from '@/components/primitives/PrimaryButton.vue';

const form = useForm({
    password: '',
});

const showPassword = ref(false);

const submit = () => {
    form.post(route('password.confirm'), {
        onFinish: () => {
            form.reset();
        },
    });
};
</script>

<template>
    <AuthCustomLayout title="Подтвердите пароль">
        <p class="w-full text-lg mt-10">Это безопасная область приложения. Пожалуйста, подтвердите свой пароль, чтобы продолжить.</p>
        <form @submit.prevent="submit" class="flex flex-col w-full">
            <div class="flex flex-col w-full mt-5 relative">
                <label for="password" class="text-sm font-semibold mb-2">Ваш пароль</label>
                <input
                    id="password"
                    :type="showPassword ? 'text' : 'password'"
                    minlength="8"
                    placeholder="Ваш пароль"
                    name="password"
                    required
                    autofocus
                    autocomplete="current-password"
                    v-model="form.password"
                    class="border border-black/40 p-3 pr-10 w-full rounded-md"
                >
                <img
                    src="/images/svg/passSee.svg"
                    alt="Показать пароль"
                    @click="showPassword = !showPassword"
                    class="w-5 h-5 absolute right-4 top-10 opacity-70 hover:opacity-100 cursor-pointer"
                >
                <i class="text-[12px] opacity-50 absolute right-1 top-0">* обязательное поле</i>
                <p v-if="form.errors.password" class="flex items-center gap-1 text-xs text-red-500 mt-1">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-red-500">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                    </svg>
                    {{ form.errors.password }}
                </p>
            </div>
            <PrimaryButton
                type="submit"
                :loading="form.processing"
                :disabled="form.processing"
                class="mt-10"
            >
                Подтвердить пароль
            </PrimaryButton>
        </form>
    </AuthCustomLayout>
</template>
