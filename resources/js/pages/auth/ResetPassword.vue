<script setup lang="ts">
import InputError from '@/components/InputError.vue';
import PasswordToggleIcon from '@/components/PasswordToggleIcon.vue';
import PrimaryButton from '@/components/primitives/PrimaryButton.vue';
import AuthCustomLayout from '@/layouts/auth/AuthCustomLayout.vue';
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

const props = defineProps<{
    email: string;
    token: string;
}>();

const form = useForm({
    token: props.token,
    email: props.email,
    password: '',
    password_confirmation: '',
});

const showPassword = ref(false);
const showPasswordConfirmation = ref(false);

const submit = () => {
    form.post(route('password.store'), {
        onFinish: () => {
            form.reset('password', 'password_confirmation');
        },
    });
};
</script>

<template>
    <AuthCustomLayout>
        <h2 class="mt-10 text-2xl font-bold">Создание нового пароля</h2>
        <p class="mt-2 text-gray-600">Введите новый пароль для вашей учетной записи</p>

        <form @submit.prevent="submit" class="mt-6 flex w-full flex-col">
            <div class="relative mt-5 flex w-full flex-col">
                <label for="email" class="mb-2 text-sm font-semibold">Ваш адрес электронной почты</label>
                <input
                    id="email"
                    type="email"
                    v-model="form.email"
                    disabled
                    class="w-full rounded-md border border-black/40 bg-gray-100 p-3"
                />
                <InputError :message="form.errors.email" />
            </div>

            <div class="relative mt-5 flex w-full flex-col">
                <label for="password" class="mb-2 text-sm font-semibold">Новый пароль</label>
                <input
                    id="password"
                    :type="showPassword ? 'text' : 'password'"
                    minlength="8"
                    placeholder="Новый пароль"
                    required
                    autofocus
                    autocomplete="new-password"
                    v-model="form.password"
                    class="w-full rounded-md border border-black/40 p-3 pr-10"
                />
                <PasswordToggleIcon :show="showPassword" @toggle="showPassword = !showPassword" />
                <i class="absolute top-0 right-1 text-[12px] opacity-50">* обязательное поле</i>
                <InputError :message="form.errors.password" />
            </div>

            <div class="relative mt-5 flex w-full flex-col">
                <label for="password_confirmation" class="mb-2 text-sm font-semibold">Подтвердите новый пароль</label>
                <input
                    id="password_confirmation"
                    :type="showPasswordConfirmation ? 'text' : 'password'"
                    minlength="8"
                    placeholder="Подтвердите пароль"
                    required
                    autocomplete="new-password"
                    v-model="form.password_confirmation"
                    class="w-full rounded-md border border-black/40 p-3 pr-10"
                />
                <PasswordToggleIcon :show="showPasswordConfirmation" @toggle="showPasswordConfirmation = !showPasswordConfirmation" />
                <i class="absolute top-0 right-1 text-[12px] opacity-50">* обязательное поле</i>
                <InputError :message="form.errors.password_confirmation" />
            </div>

            <PrimaryButton type="submit" :disabled="form.processing" :loading="form.processing" class="mt-10">
                Сбросить пароль
            </PrimaryButton>
        </form>
    </AuthCustomLayout>
</template>

