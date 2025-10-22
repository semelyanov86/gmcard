<script setup lang="ts">
import InputError from '@/components/InputError.vue';
import PrimaryButton from '@/components/primitives/PrimaryButton.vue';
import AuthCustomLayout from '@/layouts/auth/AuthCustomLayout.vue';
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
    code: '',
});

const showPassword = ref(false);
const showPasswordConfirmation = ref(false);

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <AuthCustomLayout>
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
        <div class="my-6 flex items-center">
            <div class="h-[1px] w-[100px] bg-black/40 opacity-80"></div>
            <span class="mx-4 mb-1">или</span>
            <div class="h-[1px] w-[100px] bg-black/40 opacity-80"></div>
        </div>
        <form @submit.prevent="submit" class="form-reset bestForm flex w-[500px] flex-col items-center px-4">
            <h2 class="text-lg font-bold">Укажите электронную почту и пароль</h2>
            <div class="relative mt-5 flex w-full flex-col">
                <label for="name" class="mb-2 text-sm font-semibold">Ваше имя</label>
                <input
                    id="name"
                    type="text"
                    required
                    autofocus
                    :tabindex="1"
                    autocomplete="name"
                    v-model="form.name"
                    placeholder="Ваше имя"
                    name="name"
                    class="w-full rounded-md border border-black/40 p-3"
                />
                <i class="absolute top-0 right-1 text-[12px] opacity-50">* обязательное поле</i>
                <InputError :message="form.errors.name" />
            </div>

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
                <label for="password" class="mb-2 text-sm font-semibold">Придумайте пароль</label>
                <input
                    id="password"
                    :type="showPassword ? 'text' : 'password'"
                    minlength="8"
                    placeholder="Придумай пароль"
                    name="password"
                    required
                    :tabindex="3"
                    autocomplete="new-password"
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

            <div class="relative mt-5 flex w-full flex-col">
                <label for="password_confirmation" class="mb-2 text-sm font-semibold">Подтвердите пароль</label>
                <input
                    id="password_confirmation"
                    :type="showPasswordConfirmation ? 'text' : 'password'"
                    required
                    :tabindex="4"
                    autocomplete="new-password"
                    v-model="form.password_confirmation"
                    minlength="8"
                    placeholder="Подтвердите пароль"
                    class="w-full rounded-md border border-black/40 p-3 pr-10"
                />
                <img
                    src="/images/svg/passSee.svg"
                    alt="Показать пароль"
                    @click="showPasswordConfirmation = !showPasswordConfirmation"
                    class="absolute top-10 right-4 h-5 w-5 cursor-pointer opacity-70 hover:opacity-100"
                />
                <i class="absolute top-0 right-1 text-[12px] opacity-50">* обязательное поле</i>
                <p v-if="form.errors.password_confirmation" class="mt-1 flex items-center gap-1 text-xs text-red-500">
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
                    {{ form.errors.password_confirmation }}
                </p>
            </div>
            <div class="relative mt-5 flex w-full flex-col">
                <label for="code" class="mb-2 text-sm font-semibold">Введите промокод, если есть</label>
                <input
                    id="code"
                    type="text"
                    v-model="form.code"
                    placeholder="Код (можно буквенный) пригласившего вас человека"
                    class="w-full rounded-md border border-black/40 p-3"
                />
                <p v-if="form.errors.code" class="mt-1 flex items-center gap-1 text-xs text-red-500">
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
                    {{ form.errors.code }}
                </p>
            </div>
            <PrimaryButton type="submit" :disabled="form.processing" :loading="form.processing" class="mt-10" tabindex="5">
                Зарегистрироваться
            </PrimaryButton>
            <p class="mt-5 text-base">Уже есть аккаунт?<a href="#" class="text_dec hover:text-[#F9D914]] ml-1 font-bold text-black">Войти</a></p>
        </form>
        <p class="mt-2 text-center text-[14px]">
            Нажимая "Зарегистрироваться", вы соглашаетесь с <a href="" class="text_dec">Пользовательским соглашением</a>,
            <a href="" class="text_dec">Политикой конфеденциальности</a> и <a href="" class="text_dec">Правилами сообщества GM1LP</a>.
        </p>
    </AuthCustomLayout>
</template>
