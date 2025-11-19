<script setup lang="ts">
import CalendarIcon from '@/components/primitives/icons/CalendarIcon.vue';
import CloseIcon from '@/components/primitives/icons/CloseIcon.vue';
import EmailIcon from '@/components/primitives/icons/EmailIcon.vue';
import InstagramIcon from '@/components/primitives/icons/InstagramIcon.vue';
import TelegramIcon from '@/components/primitives/icons/TelegramIcon.vue';
import VkFooterIcon from '@/components/primitives/icons/VkFooterIcon.vue';
import AdaptiveImage from '@/components/ui/AdaptiveImage.vue';
import '../../css/internal/landingBusiness.css';

const props = defineProps<{
    contact: { email: string };
}>();
</script>

<template>
    <section class="footer bg-brand-footer">
        <div class="container">
            <footer class="bg-brand-footer-bg relative overflow-hidden">
                <div class="relative mx-auto w-1140 py-9 2xl:w-full 2xl:px-4">
                    <AdaptiveImage image-path="hand-footer" image-class="hand absolute -bottom-2 -left-20 z-10" alt="Телефон" />
                    <ul class="footer_navBlock relative z-20 flex flex-wrap items-center justify-between">
                        <li>
                            <a href="#" class="footer_nav text-sm font-bold text-white uppercase hover:border-b-2 hover:border-b-white"
                                >Все магазины</a
                            >
                        </li>
                        <li>
                            <a href="#" class="footer_nav text-sm font-bold text-white uppercase hover:border-b-2 hover:border-b-white"
                                >Все промокоды</a
                            >
                        </li>
                        <li>
                            <a href="#" class="footer_nav text-sm font-bold text-white uppercase hover:border-b-2 hover:border-b-white">Все скидки</a>
                        </li>
                        <li>
                            <a href="#" class="footer_nav text-sm font-bold text-white uppercase hover:border-b-2 hover:border-b-white"
                                >Все конкурсы</a
                            >
                        </li>
                        <li><a href="#" class="footer_nav text-sm font-bold text-white uppercase hover:border-b-2 hover:border-b-white">О нас</a></li>
                        <li>
                            <a href="#" class="footer_nav text-sm font-bold text-white uppercase hover:border-b-2 hover:border-b-white">Помощь</a>
                        </li>
                        <li>
                            <a href="#" class="footer_nav text-sm font-bold text-white uppercase hover:border-b-2 hover:border-b-white">Контакты</a>
                        </li>
                    </ul>
                    <div class="my-10 h-[1px] w-full bg-white opacity-10"></div>
                    <div class="footer_block relative z-20 flex justify-between">
                        <ul class="footer_upBlock flex w-[143px] list-none flex-col gap-3">
                            <li><a href="#" class="text-lg font-bold text-white opacity-60">Больше скидок</a></li>
                            <li><a href="#" class="text-[15px] text-white">В нашем мобильном приложении</a></li>
                            <li class="upBlock_phones flex flex-col gap-3">
                                <ul class="flex flex-col gap-3">
                                    <li>
                                        <a href="#" class=""
                                            ><AdaptiveImage
                                                image-path="app-store"
                                                image-class="h-[54px] w-[143px] hover:opacity-80"
                                                alt="Скачать на Android"
                                                data-tooltip-target="tooltip-app"
                                                type="button"
                                        /></a>
                                    </li>
                                    <li>
                                        <a href="#" class=""
                                            ><AdaptiveImage
                                                image-path="google-play"
                                                image-class="h-[54px] w-[143px] hover:opacity-80"
                                                alt="Скачать на Android"
                                                data-tooltip-target="tooltip-app"
                                                type="button"
                                        /></a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <div
                            id="tooltip-app"
                            role="tooltip"
                            class="tooltip invisible absolute z-10 inline-block w-[150px] rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-700"
                        >
                            В разработке!
                        </div>
                        <ul class="list_footer footer_downBlock ml-[250px] list-none">
                            <li class="text-lg font-bold text-white opacity-60">Следите за новостями и акциями</li>
                            <li class="mt-[15px] flex flex-wrap items-center gap-3">
                                <ul class="flex flex-wrap items-center gap-3">
                                    <li>
                                        <a
                                            href=""
                                            class="flex h-[48px] w-[147px] items-center justify-center rounded-lg text-[16px] text-white ring-[1px] ring-white/50 hover:ring-white"
                                            type="button"
                                        >
                                            <VkFooterIcon custom-class="vk-icon-bright mr-[14px] opacity-50" />
                                            Вконтакте
                                        </a>
                                    </li>
                                    <li>
                                        <a
                                            href=""
                                            class="flex h-[48px] w-[147px] items-center justify-center rounded-lg text-[16px] text-white ring-[1px] ring-white/50 hover:ring-white"
                                            type="button"
                                        >
                                            <TelegramIcon custom-class="mr-[14px] text-white opacity-50" />
                                            Telegramm
                                        </a>
                                    </li>
                                    <li>
                                        <a
                                            href=""
                                            class="flex h-[48px] w-[48px] items-center justify-center rounded-lg text-[16px] text-white ring-[1px] ring-white/50 hover:ring-white"
                                            type="button"
                                        >
                                            <InstagramIcon custom-class="text-white opacity-50" />
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="mt-5 max-w-xs cursor-pointer text-sm text-white opacity-60 hover:opacity-100">
                                Instagram - соцсеть принадлежит компании Meta, признанной экстремистской и запрещенной на территории России
                            </li>

                            <li class="mt-12 text-lg font-bold text-white opacity-60">Служба поддержки GM</li>
                            <li class="mt-[15px] flex flex-wrap gap-7">
                                <ul class="flex flex-wrap gap-7">
                                    <li>
                                        <a
                                            :href="`mailto:${props.contact.email}`"
                                            class="flex items-center border-b-2 border-b-white/30 text-[16px] text-white"
                                            ><AdaptiveImage image-path="icons/email" image-class="mr-[14px] opacity-50" alt="" />{{
                                                props.contact.email
                                            }}</a
                                        >
                                    </li>
                                    <li>
                                        <button id="modal-cash" class="flex items-center border-b-2 border-b-white/30 text-[16px] text-white">
                                            Где мой кэшбэк?
                                        </button>
                                        <div
                                            id="staticModals"
                                            class="bg-opacity-30 fixed top-0 left-0 z-50 hidden h-full w-full overflow-auto bg-black"
                                        >
                                            <div class="flex w-full justify-center px-4 py-10">
                                                <div class="relative z-50 max-h-full w-full max-w-[500px]">
                                                    <div class="relative rounded-lg bg-white dark:bg-gray-700">
                                                        <div class="flex items-start justify-between rounded-t border-b p-4 dark:border-gray-600">
                                                            <h3 class="text-2xl font-semibold text-gray-900 dark:text-white">Где мой кэшбек?</h3>
                                                            <button
                                                                type="button"
                                                                class="ml-auto inline-flex items-center rounded-lg bg-transparent p-1.5 text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white"
                                                                id="close_Modal"
                                                            >
                                                                <CloseIcon custom-class="h-5 w-5" />
                                                            </button>
                                                        </div>
                                                        <div class="space-y-1 p-6">
                                                            <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                                                Пожалуйста заполните эту форму и мы поможем Вам найти кэшбек Поиск кэшбека возможен,
                                                                если с момента совершения покупки прошло не более 6 месяцев, т.е. если Вы потеряли
                                                                бонус за покупку, которую сделали более полугода назад, то найти нам его, скорее
                                                                всего, не удастся.
                                                            </p>
                                                            <form action="">
                                                                <div class="mt-2">
                                                                    <label
                                                                        for="email-address-icon"
                                                                        class="mb-2 block text-base font-medium text-gray-900 dark:text-white"
                                                                        >Email, указанный при регистрации</label
                                                                    >
                                                                    <div class="relative">
                                                                        <div
                                                                            class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3"
                                                                        >
                                                                            <EmailIcon custom-class="text-gray-500 dark:text-gray-400" />
                                                                        </div>
                                                                        <input
                                                                            type="text"
                                                                            id="email-address-icon"
                                                                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 pl-10 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                                                            placeholder="ivanov@gmail.com"
                                                                        />
                                                                    </div>
                                                                </div>
                                                                <div class="mt-2">
                                                                    <label
                                                                        for="email-address-icon"
                                                                        class="block text-base font-medium text-gray-900 dark:text-white"
                                                                        >Дата покупки</label
                                                                    >
                                                                    <p class="mb-2 block text-sm font-medium text-gray-500 dark:text-gray-400">
                                                                        Дата покупки должна быть не менее 5 дней назад, т.к. в некоторых
                                                                        интернет-магазинах отслеживание Вашей покупки и зачисление бонуса может занять
                                                                        до 5 дней.
                                                                    </p>
                                                                    <div class="relative max-w-full">
                                                                        <div
                                                                            class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3"
                                                                        >
                                                                            <CalendarIcon custom-class="text-gray-500 dark:text-gray-400" />
                                                                        </div>
                                                                        <input
                                                                            datepicker
                                                                            datepicker-autohide
                                                                            type="text"
                                                                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 pl-10 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                                                            placeholder="Выберите дату"
                                                                        />
                                                                    </div>
                                                                </div>
                                                                <div class="mt-2">
                                                                    <label
                                                                        for="email-address-icon"
                                                                        class="block text-base font-medium text-gray-900 dark:text-white"
                                                                        >Магазин</label
                                                                    >
                                                                    <p class="mb-2 block text-sm font-medium text-gray-500 dark:text-gray-400">
                                                                        Здесь отображаются магазины, которые Вы посещали в течение 7 дней.
                                                                    </p>
                                                                    <div class="relative max-w-full">
                                                                        <input
                                                                            type="text"
                                                                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 pl-10 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                                                            placeholder=""
                                                                        />
                                                                    </div>
                                                                </div>
                                                                <div class="mt-2">
                                                                    <label
                                                                        for="email-address-icon"
                                                                        class="block text-base font-medium text-gray-900 dark:text-white"
                                                                        >Номер заказа</label
                                                                    >
                                                                    <div class="relative max-w-full">
                                                                        <input
                                                                            type="text"
                                                                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 pl-10 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                                                            placeholder=""
                                                                        />
                                                                    </div>
                                                                </div>
                                                                <div class="mt-2">
                                                                    <label
                                                                        for="countries"
                                                                        class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
                                                                        >Валюта</label
                                                                    >
                                                                    <select
                                                                        id="countries"
                                                                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                                                    >
                                                                        <option selected>RUB</option>
                                                                        <option value="US">USD</option>
                                                                    </select>
                                                                </div>
                                                                <div class="mt-3">
                                                                    <p class="text-base text-gray-900 dark:text-gray-300">
                                                                        Покупка совершена через мобильное приложение?
                                                                    </p>
                                                                    <div class="mt-1 flex items-center">
                                                                        <div class="mr-4 flex items-center">
                                                                            <label
                                                                                for="mobile-app-yes"
                                                                                class="text-sm font-medium text-gray-900 dark:text-gray-300"
                                                                                >Да</label
                                                                            >
                                                                            <input
                                                                                id="mobile-app-yes"
                                                                                type="radio"
                                                                                value=""
                                                                                name="mobile-app-group"
                                                                                class="ml-2 h-4 w-4 border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600"
                                                                            />
                                                                        </div>
                                                                        <div class="mr-4 flex items-center">
                                                                            <label
                                                                                for="mobile-app-no"
                                                                                class="text-sm font-medium text-gray-900 dark:text-gray-300"
                                                                                >Нет</label
                                                                            >
                                                                            <input
                                                                                id="mobile-app-no"
                                                                                type="radio"
                                                                                value=""
                                                                                name="mobile-app-group"
                                                                                class="ml-2 h-4 w-4 border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600"
                                                                            />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="mt-3">
                                                                    <p class="text-base text-gray-900 dark:text-gray-300">
                                                                        Вы использовали промокоды?
                                                                    </p>
                                                                    <div class="mt-1 flex items-center">
                                                                        <div class="mr-4 flex items-center">
                                                                            <label
                                                                                for="promo-codes-yes"
                                                                                class="text-sm font-medium text-gray-900 dark:text-gray-300"
                                                                                >Да</label
                                                                            >
                                                                            <input
                                                                                id="promo-codes-yes"
                                                                                type="radio"
                                                                                value=""
                                                                                name="promo-codes-group"
                                                                                class="ml-2 h-4 w-4 border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600"
                                                                            />
                                                                        </div>
                                                                        <div class="mr-4 flex items-center">
                                                                            <label
                                                                                for="promo-codes-no"
                                                                                class="text-sm font-medium text-gray-900 dark:text-gray-300"
                                                                                >Нет</label
                                                                            >
                                                                            <input
                                                                                id="promo-codes-no"
                                                                                type="radio"
                                                                                value=""
                                                                                name="promo-codes-group"
                                                                                class="ml-2 h-4 w-4 border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600"
                                                                            />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="mt-3">
                                                                    <p class="text-base text-gray-900 dark:text-gray-300">
                                                                        Находились ли товары в корзине до перехода через GmCash?
                                                                    </p>
                                                                    <div class="mt-1 flex items-center">
                                                                        <div class="mr-4 flex items-center">
                                                                            <label
                                                                                for="cart-yes"
                                                                                class="text-sm font-medium text-gray-900 dark:text-gray-300"
                                                                                >Да</label
                                                                            >
                                                                            <input
                                                                                id="cart-yes"
                                                                                type="radio"
                                                                                value=""
                                                                                name="cart-group"
                                                                                class="ml-2 h-4 w-4 border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600"
                                                                            />
                                                                        </div>
                                                                        <div class="mr-4 flex items-center">
                                                                            <label
                                                                                for="cart-no"
                                                                                class="text-sm font-medium text-gray-900 dark:text-gray-300"
                                                                                >Нет</label
                                                                            >
                                                                            <input
                                                                                id="cart-no"
                                                                                type="radio"
                                                                                value=""
                                                                                name="cart-group"
                                                                                class="ml-2 h-4 w-4 border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600"
                                                                            />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="mt-3">
                                                                    <label
                                                                        class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
                                                                        for="file_input"
                                                                        >Пожалуйста, прикрепите скриншот заказа, где видно номер заказа, дату заказа и
                                                                        полную сумму покупки</label
                                                                    >
                                                                    <input
                                                                        class="block w-full cursor-pointer rounded-lg border border-gray-300 bg-gray-50 text-sm text-gray-900 focus:outline-none dark:border-gray-600 dark:bg-gray-700 dark:text-gray-400 dark:placeholder-gray-400"
                                                                        aria-describedby="file_input_help"
                                                                        id="file_input"
                                                                        type="file"
                                                                    />
                                                                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400" id="file_input_help">
                                                                        Прикрепите файл (рамер до 1МБ): (*.pdf, *.png, *.jpg, *.gif, *.jpeg)
                                                                    </p>
                                                                </div>
                                                                <div class="mt-3">
                                                                    <label
                                                                        for="message"
                                                                        class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
                                                                        >Комментарий</label
                                                                    >
                                                                    <textarea
                                                                        id="message"
                                                                        rows="4"
                                                                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                                                        placeholder=""
                                                                    ></textarea>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div
                                                            class="flex items-center space-x-2 rounded-b border-t border-gray-200 p-6 dark:border-gray-600"
                                                        >
                                                            <button
                                                                id="close_Submit"
                                                                type="button"
                                                                class="rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 focus:outline-none dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                                            >
                                                                Отправить
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li class="politic relative z-30 mt-11 flex gap-4">
                                <ul class="flex gap-4">
                                    <li>
                                        <a href="#" class="text-sm text-white opacity-60 hover:opacity-100"
                                            >Политика защиты персональный информации</a
                                        >
                                    </li>
                                    <li><a href="#" class="text-sm text-white opacity-60 hover:opacity-100">Пользовательское соглашение</a></li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="pay_block block list-none">
                            <li class="mb-6 text-lg font-bold text-white opacity-60">Мы работаем с</li>
                            <li class="flex gap-5">
                                <ul class="flex gap-5">
                                    <li>
                                        <ul class="flex flex-col">
                                            <li><AdaptiveImage image-path="icons/visa" image-class="mt-1 mb-11 h-[14px] w-[47px]" alt="Visa" /></li>
                                            <li><AdaptiveImage image-path="icons/sberbank" image-class="mb-11" alt="Сбер Банк" /></li>
                                            <li><AdaptiveImage image-path="icons/alfa" alt="Альфа Банк" /></li>
                                        </ul>
                                    </li>
                                    <li class="h-full"></li>
                                    <li>
                                        <ul class="flex flex-col">
                                            <li><AdaptiveImage image-path="icons/master" image-class="mb-8" alt="MasterCard" /></li>
                                            <li><AdaptiveImage image-path="icons/robbo" image-class="mb-9" alt="Robbo" /></li>
                                            <li><AdaptiveImage image-path="icons/yandex" alt="Яндекс" /></li>
                                        </ul>
                                    </li>
                                    <li></li>
                                    <li>
                                        <ul class="flex flex-col">
                                            <li><AdaptiveImage image-path="icons/maestro" image-class="mb-10" alt="Maestro" /></li>
                                            <li><AdaptiveImage image-path="icons/webmoney" image-class="mb-9" alt="Webmoney" /></li>
                                            <li><AdaptiveImage image-path="icons/qiwi" alt="Qiwi" /></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="mt-11 text-end text-sm text-white opacity-60">И другие</li>
                        </ul>
                    </div>
                    <div class="my-8 h-[1px] w-full bg-white opacity-10"></div>
                    <div class="flex items-center justify-between px-1">
                        <div class="flex items-center gap-[16px]">
                            <AdaptiveImage image-path="gm-logo-2" alt="GM" image-class="h-[26px] w-[26px]" />
                            <span class="text-sm text-white opacity-60">GM 2014 - 2025</span>
                        </div>
                        <ul class="partner_link flex items-center">
                            <li class="text-brand-yellow-darker relative z-10 font-bold hover:opacity-80">
                                <a class="text-brand-yellow-darker" href="#">+ Партнерская программа</a>
                            </li>
                            <li class="mx-5 h-[30px] w-[1px] bg-white opacity-10"></li>
                            <li class="text-brand-yellow-darker font-bold hover:opacity-80">
                                <a class="text-brand-yellow-darker" href="#">+ Добавить магазин</a>
                            </li>
                        </ul>
                        <div
                            class="flex h-[39px] w-[141px] items-center justify-center gap-2 rounded-lg ring-1 ring-white/30 hover:ring-white"
                            type="button"
                        >
                            <AdaptiveImage image-path="icons/russia" image-class="h-[9px] w-[13px]" alt="Россия" />
                            <span class="text-[12px] font-bold text-white">Россия</span>
                            <AdaptiveImage image-path="icons/up" alt="Вверх" />
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </section>
</template>

<style scoped>
.vk-icon-bright {
    filter: brightness(1.5);
}
</style>
