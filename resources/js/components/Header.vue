<script setup lang="ts">
import CloseIcon from '@/components/primitives/icons/CloseIcon.vue';
import FacebookIcon from '@/components/primitives/icons/FacebookIcon.vue';
import GoogleIcon from '@/components/primitives/icons/GoogleIcon.vue';
import MenuIcon from '@/components/primitives/icons/MenuIcon.vue';
import OkIcon from '@/components/primitives/icons/OkIcon.vue';
import TriangleUpIcon from '@/components/primitives/icons/TriangleUpIcon.vue';
import TwitterIcon from '@/components/primitives/icons/TwitterIcon.vue';
import UserIcon from '@/components/primitives/icons/UserIcon.vue';
import VkIcon from '@/components/primitives/icons/VkIcon.vue';
import type { UserDataModel } from '@/types';
import { LoginButtonType } from '@/types/LoginButtonType';
import { Link } from '@inertiajs/vue3';
import { ref } from 'vue';

const props = defineProps<{
    userData?: UserDataModel | null;
}>();

const loginModalOpen = ref(false);
const clickedButton = ref<LoginButtonType | null>(null);
const servicesDropdownOpen = ref(false);
const mobileMenuOpen = ref(false);

function openLoginModal(buttonType: LoginButtonType) {
    loginModalOpen.value = true;
    clickedButton.value = buttonType;
    servicesDropdownOpen.value = false;
    mobileMenuOpen.value = false;
}

function closeLoginModal() {
    loginModalOpen.value = false;
    clickedButton.value = null;
}

function toggleServicesDropdown() {
    servicesDropdownOpen.value = !servicesDropdownOpen.value;
}

function closeServicesDropdown() {
    servicesDropdownOpen.value = false;
}

function toggleMobileMenu() {
    mobileMenuOpen.value = !mobileMenuOpen.value;
    loginModalOpen.value = false;
}
</script>

<template>
    <header id="header" class="bg-brand-dark flex h-[60px] w-full items-center">
        <div class="relative mx-auto flex w-[1140px] items-center justify-between 2xl:w-full 2xl:px-4">
            <div id="header" class="relative flex items-center">
                <Link href="/">
                    <img src="/images/png/gm-logo-2.png" alt="Логотип" />
                </Link>
                <a href="#"><h3 class="ml-3 text-xl font-bold text-white hover:border-b-2 hover:border-white">Скидки</h3></a>
                <div class="bg-brand-dark-blue ml-4 h-[60px] w-[1px]"></div>
                <div class="relative ml-3 flex items-center">
                    <button @click="toggleServicesDropdown" class="block text-[15px] text-white hover:opacity-80" type="button">Все сервисы</button>
                    <img @click="toggleServicesDropdown" src="/images/png/icons/down.png" class="mr-1 ml-[10px] h-[5px] w-[8px] cursor-pointer" />
                    <div v-show="servicesDropdownOpen" @click="closeServicesDropdown" class="fixed inset-0 z-40"></div>
                    <div
                        v-show="servicesDropdownOpen"
                        class="border-brand-blue-light absolute top-[35px] -left-12 z-50 w-44 divide-y divide-gray-100 border-4 bg-white shadow"
                    >
                        <ul class="py-2 text-sm text-gray-700">
                            <li>
                                <a href="https://mainface.ru/" class="linkHeader block text-[13px] font-bold hover:bg-gray-100"
                                    >Перейти на mainface</a
                                >
                            </li>
                            <li>
                                <a href="https://gmcard.ru/" class="linkHeader block text-[13px] font-bold hover:bg-gray-100">Перейти на gmcard</a>
                            </li>
                            <li>
                                <a href="#" class="linkHeader block text-[13px] font-bold hover:bg-gray-100">Перейти на gmwork</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="auth_block relative ml-3 hidden items-center">
                <UserIcon
                    id="userAuth3"
                    @click="openLoginModal(LoginButtonType.Mobile)"
                    custom-class="h-5 w-5 rounded-lg text-gray-500 focus:ring-2 focus:ring-gray-200 focus:outline-none dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                />
                <TriangleUpIcon
                    id="mobileBTN"
                    :class="loginModalOpen && clickedButton === LoginButtonType.Mobile ? '' : 'hidden'"
                    custom-class="absolute right-12 -bottom-4 h-4 w-4 text-white"
                />
                <button
                    id="open_menu"
                    @click="toggleMobileMenu"
                    type="button"
                    class="ml-1 inline-flex items-center rounded-lg p-2 text-sm text-gray-500 focus:ring-2 focus:ring-gray-200 focus:outline-none dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                    aria-controls="navbar-default"
                    aria-expanded="false"
                >
                    <span class="sr-only">Open main menu</span>
                    <MenuIcon custom-class="h-6 w-6" />
                </button>
            </div>
            <ul id="header" class="relative flex list-none items-center md:hidden">
                <li class="bg-brand-yellow-dark focus:ring-brand-yellow-dark relative rounded-md px-3 py-2 hover:opacity-100 focus:ring-2">
                    <a @click.prevent="openLoginModal(LoginButtonType.Start)" href="#" class="hover:text-brand-orange cursor-pointer text-black" id="userAuth1"
                        >Запустить акцию</a
                    >
                    <TriangleUpIcon
                        v-show="loginModalOpen && clickedButton === LoginButtonType.Start"
                        id="startBTN"
                        custom-class="absolute right-14 -bottom-8 h-7 w-6 text-white"
                    />
                </li>
                <div class="bg-brand-dark-blue ml-4 h-[60px] w-[1px]"></div>
                <li class="relative">
                    <a
                        @click.prevent="openLoginModal(LoginButtonType.Login)"
                        href="#"
                        class="ml-4 text-[15px] text-white hover:border-b-2 hover:border-white"
                        id="userAuth2"
                        >Вход</a
                    >
                    <TriangleUpIcon
                        v-show="loginModalOpen && clickedButton === LoginButtonType.Login"
                        id="loginBTN"
                        custom-class="absolute right-0 -bottom-10 h-7 w-6 text-white"
                    />
                </li>
                <li>
                    <Link
                        :href="route('register')"
                        class="hover: bg-brand-blue-dark focus:ring-brand-blue-dark ml-3 rounded-md px-3 py-2 text-[15px] text-white focus:ring-1"
                        >Регистрация</Link
                    >
                </li>
                <div class="bg-brand-dark-blue ml-2 h-[60px] w-[1px]"></div>
                <li class="bg-brand-dark-navy ml-3 rounded-md px-2 py-2">
                    <a href="#"><img src="/images/png/icons/reg.png" alt="Войти" /></a>
                </li>
            </ul>
            <div v-show="loginModalOpen" @click="closeLoginModal" class="fixed inset-0 z-40"></div>
            <div
                v-show="loginModalOpen"
                id="userDropdown"
                class="absolute top-[64px] right-4 z-50 w-[350px] rounded-lg bg-white shadow-md md:top-[70px] md:right-10"
            >
                <div class="relative p-5">
                    <CloseIcon
                        @click="closeLoginModal"
                        id="closeDrop"
                        custom-class="absolute top-6 right-6 h-8 w-8 cursor-pointer text-gray-400 opacity-50 hover:opacity-100"
                    />
                    <div class="relative w-[220px] text-gray-900">
                        <h2 class="text-3xl font-bold text-black">Войти в GM</h2>
                        <p class="text-base font-medium">Выполните вход для доступа ко всей системе сайтов GM</p>
                    </div>
                    <form action="" class="mt-3 w-full">
                        <div class="flex flex-col">
                            <label for="email" class="mb-1 text-sm text-gray-900">Email</label>
                            <input
                                name="email"
                                class="focus:ring-brand-blue rounded-sm border-gray-300 outline-none focus:ring-1"
                                type="email"
                                placeholder="Адрес эл. почты или телефон"
                            />
                        </div>
                        <div class="relative mt-2 flex flex-col">
                            <label for="password" class="mb-1 text-sm text-gray-900">Пароль</label>
                            <input
                                name="password"
                                maxlength="16"
                                minlength="8"
                                class="focus:ring-brand-blue rounded-sm border-gray-300 pr-[200px] outline-none focus:ring-1"
                                type="password"
                                placeholder="Пароль"
                            />
                            <span class="absolute right-3 bottom-2 cursor-pointer font-medium text-black hover:border-b-2 hover:border-black"
                                >Показать</span
                            >
                        </div>
                        <div class="mt-3 flex items-center justify-between">
                            <button
                                class="bg-brand-blue-darker focus:bg-brand-gray focus:ring-brand-gray rounded-md px-16 py-3 text-base font-bold text-white focus:ring-2"
                            >
                                Войти
                            </button>
                            <a href="/forgot_password.html" class="text-brand-gray hover:border-b-brand-gray hover:border-b-2">Забыли пароль?</a>
                        </div>
                    </form>
                    <div class="my-3">
                        <div class="ml-3 flex items-center">
                            <span class="text-brand-gray w-full text-base">Войти через соц. сети</span>
                            <div class="bg-brand-gray h-[1px] w-[200px] opacity-50"></div>
                        </div>
                        <div class="mt-2 flex items-center gap-2">
                            <a href="#"><TwitterIcon /></a>
                            <a href="#"><FacebookIcon /></a>
                            <a href="#"><VkIcon /></a>
                            <a href="#"><OkIcon /></a>
                            <a href="#"><GoogleIcon /></a>
                        </div>
                    </div>
                </div>
                <div class="bg-brand-light-bg flex w-full items-center justify-between px-4 py-4">
                    <span class="text-lg font-bold">Еще не в GM?</span>
                    <Link :href="route('register')" class="rounded-md bg-white px-12 py-3 text-base font-bold text-black shadow-lg hover:shadow-sm"
                        >Регистрация</Link
                    >
                </div>
            </div>
            <div class="modal_acc">
                <div id="dropdownAvatar" class="border-brand-blue-light z-50 hidden w-[350px] border-4 bg-white">
                    <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
                        <div class="flex items-center text-lg font-bold">
                            <img src="/images/png/icons/he.png" class="mr-3 h-7 w-7" alt="" />
                            {{ props.userData?.name }} {{ props.userData?.last_name || '' }}
                        </div>
                    </div>
                    <ul class="px-2 py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownUserAvatarButton">
                        <li class="flex items-center justify-between border-b-2 border-b-black/5">
                            <span class="text-[15px] font-bold">Профиль</span
                            ><a href="#" class="block px-1 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Редактировать</a>
                        </li>
                        <li class="flex items-center justify-between border-b-2 border-b-black/5">
                            <span class="text-[15px] font-bold">Баланс: {{ props.userData?.balance ?? 0 }} руб.</span
                            ><a href="#" class="block px-1 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Оперировать</a>
                        </li>
                        <li class="flex items-center justify-between border-b-2 border-b-black/5">
                            <span class="text-[15px] font-bold">Учетная запись<span class="ml-2 text-[15px] text-red-500">Стандарт</span> </span
                            ><a href="#" class="block px-1 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Повысить</a>
                        </li>
                        <li class="flex items-center justify-between border-b-2 border-b-black/5">
                            <span class="text-[15px] font-bold">Настройки и конфиденциальность</span
                            ><a href="#" class="block px-1 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Проверить</a>
                        </li>
                        <li class="flex items-center justify-between border-b-2 border-b-black/5">
                            <span class="text-[15px] font-bold">Справка</span
                            ><a href="#" class="block px-1 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Получить помощь</a>
                        </li>
                    </ul>
                    <div class="py-2">
                        <a
                            href="#"
                            class="block text-center text-[15px] font-bold text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-600 dark:hover:text-white"
                            >Выйти</a
                        >
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div v-show="mobileMenuOpen" class="bg-brand-darker max-w-full overflow-hidden">
        <div class="animated-block bg-brand-dark-slate w-full rounded-b-md px-12 py-4 font-semibold shadow-lg">
            <ul class="flex flex-col">
                <li class="py-3 opacity-85 hover:opacity-100"><a href="#" class="text-base text-white">Главная</a></li>
                <li class="py-3 opacity-85 hover:opacity-100"><a href="#" class="text-base text-white">Пользователям</a></li>
                <li class="py-3 opacity-85 hover:opacity-100"><a href="#" class="text-base text-white">Кэшбек</a></li>
                <li class="py-3 opacity-85 hover:opacity-100"><a href="#" class="text-base text-white">Для бизнеса</a></li>
                <li class="py-3 opacity-85 hover:opacity-100"><a href="#" class="text-base text-white">Правила</a></li>
                <li class="py-3 opacity-85 hover:opacity-100"><a href="#" class="text-base text-white">Контакты</a></li>
            </ul>
        </div>
    </div>
</template>

<style scoped></style>
