<script setup lang="ts">
import InputError from '@/components/InputError.vue';
import PasswordToggleIcon from '@/components/PasswordToggleIcon.vue';
import PrimaryButton from '@/components/primitives/PrimaryButton.vue';
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

const registerForm = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
    code: '',
});

const showPassword = ref(false);
const showPasswordConfirmation = ref(false);

const submitRegister = () => {
    registerForm.post(route('register'), {
        onFinish: () => registerForm.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <div class="w-full">
        <div class="mt-5 flex flex-col items-center">
            <h4 class="text-lg font-bold">Зарегистрироваться через</h4>
            <ul class="mt-5 flex items-center gap-8">
                <li>
                    <a href="" class="group"
                        ><img
                            src="/images/svg/social/google_c.svg"
                            alt="Через google"
                            class="h-10 w-10 grayscale transition-all duration-300 hover:grayscale-0"
                    /></a>
                </li>
                <li>
                    <a href="" class="group"
                        ><img
                            src="/images/svg/social/tg_c.svg"
                            alt="Через telegram"
                            class="h-10 w-10 grayscale transition-all duration-300 hover:grayscale-0"
                    /></a>
                </li>
                <li>
                    <a href="" class="group"
                        ><img
                            src="/images/svg/social/vk_c.svg"
                            alt="Через vk"
                            class="h-10 w-10 grayscale transition-all duration-300 hover:grayscale-0"
                    /></a>
                </li>
                <li>
                    <a href="" class="group"
                        ><img
                            src="/images/svg/social/ms_c.svg"
                            alt="Через microsoft"
                            class="h-10 w-10 grayscale transition-all duration-300 hover:grayscale-0"
                    /></a>
                </li>
            </ul>
        </div>
        <div class="my-6 flex items-center justify-center">
            <div class="h-[1px] w-[100px] bg-black/40 opacity-80"></div>
            <span class="mx-4 mb-1">или</span>
            <div class="h-[1px] w-[100px] bg-black/40 opacity-80"></div>
        </div>

        <form @submit.prevent="submitRegister" class="form-reset bestForm flex w-[500px] flex-col items-center px-4">
            <h2 class="text-lg font-bold">Укажите электронную почту и пароль</h2>
            <div class="relative mt-5 flex w-full flex-col">
                <label for="name" class="mb-2 text-sm font-semibold">Ваше имя</label>
                <input
                    id="name"
                    type="text"
                    required
                    autofocus
                    autocomplete="name"
                    v-model="registerForm.name"
                    placeholder="Ваше имя"
                    class="w-full rounded-md border border-black/40 p-3"
                />
                <i class="absolute top-0 right-1 text-[12px] opacity-50">* обязательное поле</i>
                <InputError :message="registerForm.errors.name" />
            </div>

            <div class="relative mt-5 flex w-full flex-col">
                <label for="register-email" class="mb-2 text-sm font-semibold">Ваш адрес электронной почты</label>
                <input
                    id="register-email"
                    type="email"
                    placeholder="Ваш адрес электронной почты"
                    required
                    autocomplete="email"
                    v-model="registerForm.email"
                    class="w-full rounded-md border border-black/40 p-3"
                />
                <i class="absolute top-0 right-1 text-[12px] opacity-50">* обязательное поле</i>
                <InputError :message="registerForm.errors.email" />
            </div>

            <div class="relative mt-5 flex w-full flex-col">
                <label for="register-password" class="mb-2 text-sm font-semibold">Придумайте пароль</label>
                <input
                    id="register-password"
                    :type="showPassword ? 'text' : 'password'"
                    minlength="8"
                    placeholder="Придумай пароль"
                    required
                    autocomplete="new-password"
                    v-model="registerForm.password"
                    class="w-full rounded-md border border-black/40 p-3 pr-10"
                />
                <PasswordToggleIcon :show="showPassword" @toggle="showPassword = !showPassword" />
                <i class="absolute top-0 right-1 text-[12px] opacity-50">* обязательное поле</i>
                <InputError :message="registerForm.errors.password" />
            </div>

            <div class="relative mt-5 flex w-full flex-col">
                <label for="password_confirmation" class="mb-2 text-sm font-semibold">Подтвердите пароль</label>
                <input
                    id="password_confirmation"
                    :type="showPasswordConfirmation ? 'text' : 'password'"
                    required
                    autocomplete="new-password"
                    v-model="registerForm.password_confirmation"
                    minlength="8"
                    placeholder="Подтвердите пароль"
                    class="w-full rounded-md border border-black/40 p-3 pr-10"
                />
                <PasswordToggleIcon :show="showPasswordConfirmation" @toggle="showPasswordConfirmation = !showPasswordConfirmation" />
                <i class="absolute top-0 right-1 text-[12px] opacity-50">* обязательное поле</i>
                <InputError :message="registerForm.errors.password_confirmation" />
            </div>

            <div class="relative mt-5 flex w-full flex-col">
                <label for="code" class="mb-2 text-sm font-semibold">Введите промокод, если есть</label>
                <input
                    id="code"
                    type="text"
                    v-model="registerForm.code"
                    placeholder="Код (можно буквенный) пригласившего вас человека"
                    class="w-full rounded-md border border-black/40 p-3"
                />
                <InputError :message="registerForm.errors.code" />
            </div>

            <PrimaryButton type="submit" :disabled="registerForm.processing" :loading="registerForm.processing" class="mt-10">
                Зарегистрироваться
            </PrimaryButton>
        </form>
        <p class="mt-2 text-center text-[14px]">
            Нажимая "Зарегистрироваться", вы соглашаетесь с <a href="" class="text_dec">Пользовательским соглашением</a>,
            <a href="" class="text_dec">Политикой конфеденциальности</a> и <a href="" class="text_dec">Правилами сообщества GM1LP</a>.
        </p>
    </div>
</template>

