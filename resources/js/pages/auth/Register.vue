<script setup lang="ts">
import InputError from '@/components/InputError.vue';
import TextLink from '@/components/TextLink.vue';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import AuthBase from '@/layouts/AuthLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import { LoaderCircle } from 'lucide-vue-next';
import AdaptiveImage from '@/components/ui/AdaptiveImage.vue';

const form = useForm({
    name: '',
    last_name: '',
    birth_date: '',
    gender: '',
    email: '',
    password: '',
    password_confirmation: '',
    code: '',
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>

    <section class="w-full h-full flex items-center justify-center pt-10 pb-14">
        <div class="w-[500px] flex items-center flex-col justify-center bestForm">
            <AdaptiveImage image-path="gm-logo" alt="logo" class="w-14 h-14" :critical="true"></AdaptiveImage>
            <h1 class="text-[32px] font-bold w-[550px] text-center lett mt-5 tracking-tighter leading-tight text-black bestForm">Зарегистрируйтесь и подключитесь к системе</h1>
            <div class="flex flex-col items-center mt-5">
                <h4 class="text-lg font-bold">Зарегистрироваться через</h4>
                <ul class="flex items-center mt-5 gap-8">
                    <li><a href=""><img src="/assets/cosial/google.svg" alt="Через google" class="w-10 h-10 hover:opacity-70"></a></li>
                    <li><a href=""><img src="/assets/cosial/facebook.svg" alt="Через facebook" class="w-10 h-10 hover:opacity-70"></a></li>
                    <li><a href=""><img src="/assets/cosial/ok.svg" alt="Через ok" class="w-10 h-10 hover:opacity-70"></a></li>
                    <li><a href=""><img src="/assets/cosial/vk.svg" alt="Через vk" class="w-10 h-10 hover:opacity-70"></a></li>
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
                    <input id="name" type="text" equired autofocus :tabindex="1" autocomplete="name" v-model="form.name" placeholder="Ваше имя" name="name" class="border border-black/40 p-3 w-full rounded-md">
                    <i class="text-[12px] opacity-50 absolute right-1 top-0">* обязательное поле</i>
                    <InputError :message="form.errors.name" />
                </div>
                <div class="flex flex-col w-full mt-5 relative">
                    <label for="last_name" class="text-sm font-semibold mb-2">Ваша фамилия</label>
                    <input id="last_name" type="text" placeholder="Ваша фамилия" name="LastName" v-model="form.last_name" class="border border-black/40 py-3 px-4 w-full rounded-md">
                </div>
                <div class="flex flex-col w-full mt-5 relative">
                    <label for="birth_date" class="text-sm font-semibold mb-2">Ваша дата рождения</label>
                    <input
                        id="birth_date"
                        type="date"
                        v-model="form.birth_date"
                        class="border border-black/40 p-3 w-full rounded-md"
                    >
                </div>
                <div class="w-full mt-5 relative">
                    <p class="text-sm font-semibold mb-2">Укажите свой пол</p>
                    <div class="flex items-center gap-4 w-full">
                        <div class="flex items-center gap-2 cursor-pointer">
                            <input
                                type="radio"
                                id="gender1"
                                v-model="form.gender"
                                value="Мужской"
                                class="cursor-pointer"
                            >
                            <label for="gender1" class="text-base font-medium cursor-pointer">Мужчина</label>
                        </div>
                        <div class="flex items-center gap-2 cursor-pointer">
                            <input
                                type="radio"
                                id="gender2"
                                v-model="form.gender"
                                value="Женский"
                                class="cursor-pointer"
                            >
                            <label for="gender2" class="text-base font-medium cursor-pointer">Женщина</label>
                        </div>
                        <div class="flex items-center gap-2 cursor-pointer">
                            <input
                                type="radio"
                                id="gender3"
                                v-model="form.gender"
                                value="Другой"
                                class="cursor-pointer"
                            >
                            <label for="gender3" class="text-base font-medium cursor-pointer">Другой вариант</label>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col w-full mt-5 relative">
                    <label for="email" class="text-sm font-semibold mb-2">Ваш адрес электронной почты</label>
                    <input id="email" type="email" placeholder="Ваш адрес электронной почты" name="email" required :tabindex="2" autocomplete="email" v-model="form.email" class="border border-black/40 p-3 w-full rounded-md">
                    <i class="text-[12px] opacity-50 absolute right-1 top-0">* обязательное поле</i>
                    <p class="flex items-center gap-1 text-xs text-red-500">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-red-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                        </svg>
                        Данный email уже зарегистрирован в системе, нажмите на кнопку "Войти"</p>
                    <p class="flex items-center gap-1 text-xs text-red-500">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-red-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                        </svg>
                        Введите данные корректно. Пример: "example@gmail.com"</p>
                </div>
                <div class="flex flex-col w-full mt-5 relative">
                    <label for="password" class="text-sm font-semibold mb-2">Придумайте пароль</label>
                    <input id="password" type="password" minlength="8" placeholder="Придумай пароль" name="password" required :tabindex="3" autocomplete="new-password" v-model="form.password" class="border border-black/40 p-3 pr-10 w-full rounded-md">
                    <img src="/assets/cosial/passSee.svg" alt="Показать пароль" id="show_password" class="w-5 h-5 absolute right-4 top-10 opacity-70 hover:opacity-100 cursor-pointer">
                    <i class="text-[12px] opacity-50 absolute right-1 top-0">* обязательное поле</i>
                    <div class="w-full bg-green-400 h-2 my-2 hidden" id="success"></div>
                    <div class="w-[300px] bg-yellow-400 h-2 my-2 hidden" id="med_success"></div>
                    <div class="w-[150px] bg-red-400 h-2 my-2 hidden" id="failed"></div>
                    <p class="flex items-center gap-1 text-xs text-red-500">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-red-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                        </svg>
                        Пароль должен содержать латинские символы, цифры, @, _, %, - и заглавную букву</p>
                    <p class="flex items-center gap-1 text-xs text-red-500">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-red-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                        </svg>
                        Длинна пароля должна быть не меньше 8 и не больше 16 символов
                    </p>
                </div>

                <div class="flex flex-col w-full mt-5 relative">
                    <label for="password_confirmation" class="text-sm font-semibold mb-2">Подтвердите пароль</label>
                    <input
                        id="password_confirmation" type="password" required :tabindex="4" autocomplete="new-password" v-model="form.password_confirmation" minlength="8" placeholder="Подтвердите  пароль" name="password" class="border border-black/40 p-3 pr-10 w-full rounded-md">
                    <img src="/assets/cosial/passSee.svg" alt="Показать пароль" id="show_password" class="w-5 h-5 absolute right-4 top-10 opacity-70 hover:opacity-100 cursor-pointer">
                    <i class="text-[12px] opacity-50 absolute right-1 top-0">* обязательное поле</i>
                    <div class="w-full bg-green-400 h-2 my-2 hidden" id="success"></div>
                    <div class="w-[300px] bg-yellow-400 h-2 my-2 hidden" id="med_success"></div>
                    <div class="w-[150px] bg-red-400 h-2 my-2 hidden" id="failed"></div>
                    <p class="flex items-center gap-1 text-xs text-red-500">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-red-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                        </svg>
                        Пароль должен содержать латинские символы, цифры, @, _, %, - и заглавную букву</p>
                    <p class="flex items-center gap-1 text-xs text-red-500">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-red-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                        </svg>
                        Длинна пароля должна быть не меньше 8 и не больше 16 символов
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
                </div>
                <button type="submit" tabindex="5" :disabled="form.processing" class="bg-[#F4D710] py-4 w-full text-lg font-bold rounded-2xl mt-10 btn_register cursor-pointer">
                    <LoaderCircle v-if="form.processing" class="h-4 w-4 animate-spin" />
                    Зарегистрироваться
                </button>
                <p class="mt-5 text-base">Уже есть аккаунт?<a href="#" class="text-black font-bold ml-1 text_dec hover:text-[#F9D914]]">Войти</a></p>
            </form>
            <p class="text-[14px] mt-2 text-center">Нажимая "Зарегистрироваться", вы соглашаетесь с <a href="" class="text_dec">Пользовательским соглашением</a>, <a href="" class="text_dec">Политикой конфеденциальности</a> и <a href="" class="text_dec">Правилами сообщества GM1LP</a>.</p>
        </div>
    </section>
</template>
