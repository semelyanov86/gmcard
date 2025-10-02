<script setup lang="ts">
import InputError from '@/components/InputError.vue';
import { useForm } from '@inertiajs/vue3';
import AuthCustomLayout from '@/layouts/auth/AuthCustomLayout.vue';
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
    <AuthCustomLayout title="Зарегистрируйтесь и подключитесь к системе">
            <div class="flex flex-col items-center mt-5">
                <h4 class="text-lg font-bold">Зарегистрироваться через</h4>
                <ul class="flex items-center mt-5 gap-8">
                    <li><a href="" class="group"><img src="/images/svg/social/google_c.svg" alt="Через google" class="w-10 h-10 grayscale hover:grayscale-0 transition-all duration-300"></a></li>
                    <li><a href="" class="group"><img src="/images/svg/social/tg_c.svg" alt="Через telegram" class="w-10 h-10 grayscale hover:grayscale-0 transition-all duration-300"></a></li>
                    <li><a href="" class="group"><img src="/images/svg/social/vk_c.svg" alt="Через vk" class="w-10 h-10 grayscale hover:grayscale-0 transition-all duration-300"></a></li>
                    <li><a href="" class="group"><img src="/images/svg/social/ms_c.svg" alt="Через microsoft" class="w-10 h-10 grayscale hover:grayscale-0 transition-all duration-300"></a></li>
                </ul>
            </div>
            <div class="flex items-center my-6">
                <div class="w-[100px] h-[1px] bg-black/40 opacity-80"></div>
                <span class="mx-4 mb-1">или</span>
                <div class="w-[100px] h-[1px] bg-black/40 opacity-80"></div>
            </div>
            <form @submit.prevent="submit" class="flex items-center flex-col w-[500px] px-4 form-reset bestForm">
                <h2 class="text-lg font-bold">Укажите электронную почту и пароль</h2>
                <div class="flex flex-col w-full mt-5 relative">
                    <label for="name" class="text-sm font-semibold mb-2">Ваше имя</label>
                    <input id="name" type="text" required autofocus :tabindex="1" autocomplete="name" v-model="form.name" placeholder="Ваше имя" name="name" class="border border-black/40 p-3 w-full rounded-md">
                    <i class="text-[12px] opacity-50 absolute right-1 top-0">* обязательное поле</i>
                    <InputError :message="form.errors.name" />
                </div>

                <div class="flex flex-col w-full mt-5 relative">
                    <label for="email" class="text-sm font-semibold mb-2">Ваш адрес электронной почты</label>
                    <input id="email" type="email" placeholder="Ваш адрес электронной почты" name="email" required :tabindex="2" autocomplete="email" v-model="form.email" class="border border-black/40 p-3 w-full rounded-md">
                    <i class="text-[12px] opacity-50 absolute right-1 top-0">* обязательное поле</i>
                    <p v-if="form.errors.email" class="flex items-center gap-1 text-xs text-red-500 mt-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-red-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                        </svg>
                        {{ form.errors.email }}
                    </p>
                </div>
                <div class="flex flex-col w-full mt-5 relative">
                    <label for="password" class="text-sm font-semibold mb-2">Придумайте пароль</label>
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

                <div class="flex flex-col w-full mt-5 relative">
                    <label for="password_confirmation" class="text-sm font-semibold mb-2">Подтвердите пароль</label>
                    <input
                        id="password_confirmation"
                        :type="showPasswordConfirmation ? 'text' : 'password'"
                        required
                        :tabindex="4"
                        autocomplete="new-password"
                        v-model="form.password_confirmation"
                        minlength="8"
                        placeholder="Подтвердите пароль"
                        class="border border-black/40 p-3 pr-10 w-full rounded-md"
                    >
                    <img
                        src="/images/svg/passSee.svg"
                        alt="Показать пароль"
                        @click="showPasswordConfirmation = !showPasswordConfirmation"
                        class="w-5 h-5 absolute right-4 top-10 opacity-70 hover:opacity-100 cursor-pointer"
                    >
                    <i class="text-[12px] opacity-50 absolute right-1 top-0">* обязательное поле</i>
                    <p v-if="form.errors.password_confirmation" class="flex items-center gap-1 text-xs text-red-500 mt-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-red-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                        </svg>
                        {{ form.errors.password_confirmation }}
                    </p>
                </div>
                <div class="flex flex-col w-full mt-5 relative">
                    <label for="code" class="text-sm font-semibold mb-2">Введите промокод, если есть</label>
                    <input
                        id="code"
                        type="text"
                        v-model="form.code"
                        placeholder="Код (можно буквенный) пригласившего вас человека"
                        class="border border-black/40 p-3 w-full rounded-md"
                    >
                    <p v-if="form.errors.code" class="flex items-center gap-1 text-xs text-red-500 mt-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-red-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                        </svg>
                        {{ form.errors.code }}
                    </p>
                </div>
                <button type="submit" tabindex="5" :disabled="form.processing" class="bg-[#F4D710] py-4 w-full text-lg font-bold rounded-2xl mt-10 btn_register cursor-pointer">
                    Зарегистрироваться
                </button>
                <p class="mt-5 text-base">Уже есть аккаунт?<a href="#" class="text-black font-bold ml-1 text_dec hover:text-[#F9D914]]">Войти</a></p>
            </form>
            <p class="text-[14px] mt-2 text-center">Нажимая "Зарегистрироваться", вы соглашаетесь с <a href="" class="text_dec">Пользовательским соглашением</a>, <a href="" class="text_dec">Политикой конфеденциальности</a> и <a href="" class="text_dec">Правилами сообщества GM1LP</a>.</p>
    </AuthCustomLayout>
</template>
