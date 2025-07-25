<script setup lang="ts"></script>

<template>
    <section class="footer bg-[#0f1120]">
        <div class="container">
            <footer class="relative overflow-hidden bg-[#101121]">
                <div class="relative mx-auto w-[1140px] py-9 2xl:w-full 2xl:px-4">
                    <img src="/images/hand-footer.png" class="hand absolute -bottom-2 -left-20 z-10" alt="Телефон" />
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
                            <li><a href="#" class="text-lg font-bold text-white opacity-30">Больше скидок</a></li>
                            <li><a href="#" class="text-[15px] text-white">В нашем мобильном приложении</a></li>
                            <div class="upBlock_phones flex flex-col gap-3">
                                <li>
                                    <a href="#" class=""
                                        ><img
                                            src="/images/app-store.png"
                                            class="h-[54px] w-[143px] hover:opacity-80"
                                            alt="Скачать на Android"
                                            data-tooltip-target="tooltip-app"
                                            type="button"
                                    /></a>
                                </li>
                                <li>
                                    <a href="#" class=""
                                        ><img
                                            src="/images/google-play.png"
                                            class="h-[54px] w-[143px] hover:opacity-80"
                                            alt="Скачать на Android"
                                            data-tooltip-target="tooltip-app"
                                            type="button"
                                    /></a>
                                </li>
                            </div>
                            <div
                                id="tooltip-app"
                                role="tooltip"
                                class="tooltip invisible absolute z-10 inline-block w-[150px] rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-700"
                            >
                                В разработке!
                            </div>
                        </ul>
                        <ul class="list_footer footer_downBlock ml-[250px] list-none">
                            <li class="text-lg font-bold text-white opacity-30">Следите за новостями и акциями</li>
                            <div class="mt-[15px] flex flex-wrap items-center gap-3">
                                <li>
                                    <a
                                        href=""
                                        class="flex h-[48px] w-[147px] items-center justify-center rounded-lg text-[16px] text-white ring-[1px] ring-white/50 hover:ring-white"
                                        data-tooltip-target="tooltip-social"
                                        type="button"
                                        ><i class="fa fa-vk mr-[14px] opacity-50" aria-hidden="true"></i>Вконтакте</a
                                    >
                                </li>
                                <li>
                                    <a
                                        href=""
                                        class="flex h-[48px] w-[147px] items-center justify-center rounded-lg text-[16px] text-white ring-[1px] ring-white/50 hover:ring-white"
                                        data-tooltip-target="tooltip-social"
                                        type="button"
                                        ><img class="mr-[14px] h-5 w-5 text-white opacity-50" src="/images/tg.svg" />Telegramm</a
                                    >
                                </li>
                            </div>
                            <p class="mt-5 max-w-xs text-sm text-white opacity-30 hover:opacity-100">
                                Instagram - соцсеть принадлежит компании Meta, признанной экстремистской и запрещенной на территории России
                            </p>

                            <li class="mt-12 text-lg font-bold text-white opacity-30">Служба поддержки GM</li>
                            <div class="mt-[15px] flex flex-wrap gap-7">
                                <li>
                                    <a href="mailto:admin@gmcard.ru" class="flex items-center border-b-2 border-b-white/30 text-[16px] text-white"
                                        ><img src="/images/icons/email.png" class="mr-[14px] opacity-50" alt="" />admin@gmcard.ru</a
                                    >
                                </li>
                                <li>
                                    <button id="modal-cash" class="flex items-center border-b-2 border-b-white/30 text-[16px] text-white">
                                        Где мой кэшбэк?
                                    </button>
                                    <div id="staticModals" class="bg-opacity-30 fixed top-0 left-0 z-50 hidden h-full w-full overflow-auto bg-black">
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
                                                            <svg
                                                                class="h-5 w-5"
                                                                fill="currentColor"
                                                                viewBox="0 0 20 20"
                                                                xmlns="http://www.w3.org/2000/svg"
                                                            >
                                                                <path
                                                                    fill-rule="evenodd"
                                                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                                    clip-rule="evenodd"
                                                                ></path>
                                                            </svg>
                                                        </button>
                                                    </div>
                                                    <div class="space-y-1 p-6">
                                                        <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                                            Пожалуйста заполните эту форму и мы поможем Вам найти кэшбек Поиск кэшбека возможен, если
                                                            с момента соверщения покупки прошло не более 6 месяцев, т.е. если Вы потеряли бонус за
                                                            покупку, которую сделали более полугода назад, то найти нам его, скорее всего, не удастся.
                                                        </p>
                                                        <form action="">
                                                            <div class="mt-2">
                                                                <label
                                                                    for="email-address-icon"
                                                                    class="mb-2 block text-base font-medium text-gray-900 dark:text-white"
                                                                    >Email, указанный при регистрации</label
                                                                >
                                                                <div class="relative">
                                                                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                                                        <svg
                                                                            aria-hidden="true"
                                                                            class="h-5 w-5 text-gray-500 dark:text-gray-400"
                                                                            fill="currentColor"
                                                                            viewBox="0 0 20 20"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                        >
                                                                            <path
                                                                                d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"
                                                                            ></path>
                                                                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                                                                        </svg>
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
                                                                    интернет-магазинах отслеживание Вашей покупки и зачисление бонуса может занять до
                                                                    5 дней.
                                                                </p>
                                                                <div class="relative max-w-full">
                                                                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                                                        <svg
                                                                            aria-hidden="true"
                                                                            class="h-5 w-5 text-gray-500 dark:text-gray-400"
                                                                            fill="currentColor"
                                                                            viewBox="0 0 20 20"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                        >
                                                                            <path
                                                                                fill-rule="evenodd"
                                                                                d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                                                                clip-rule="evenodd"
                                                                            ></path>
                                                                        </svg>
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
                                                                            for="inline-radio"
                                                                            class="text-sm font-medium text-gray-900 dark:text-gray-300"
                                                                            >Да</label
                                                                        >
                                                                        <input
                                                                            id="inline-radio"
                                                                            type="radio"
                                                                            value=""
                                                                            name="inline-radio-group"
                                                                            class="ml-2 h-4 w-4 border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600"
                                                                        />
                                                                    </div>
                                                                    <div class="mr-4 flex items-center">
                                                                        <label
                                                                            for="inline-2-radio"
                                                                            class="text-sm font-medium text-gray-900 dark:text-gray-300"
                                                                            >Нет</label
                                                                        >
                                                                        <input
                                                                            id="inline-2-radio"
                                                                            type="radio"
                                                                            value=""
                                                                            name="inline-radio-group"
                                                                            class="ml-2 h-4 w-4 border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600"
                                                                        />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="mt-3">
                                                                <p class="text-base text-gray-900 dark:text-gray-300">Вы использовали промокоды?</p>
                                                                <div class="mt-1 flex items-center">
                                                                    <div class="mr-4 flex items-center">
                                                                        <label
                                                                            for="inline-radio"
                                                                            class="text-sm font-medium text-gray-900 dark:text-gray-300"
                                                                            >Да</label
                                                                        >
                                                                        <input
                                                                            id="inline-radio"
                                                                            type="radio"
                                                                            value=""
                                                                            name="inline-radio-group"
                                                                            class="ml-2 h-4 w-4 border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600"
                                                                        />
                                                                    </div>
                                                                    <div class="mr-4 flex items-center">
                                                                        <label
                                                                            for="inline-2-radio"
                                                                            class="text-sm font-medium text-gray-900 dark:text-gray-300"
                                                                            >Нет</label
                                                                        >
                                                                        <input
                                                                            id="inline-2-radio"
                                                                            type="radio"
                                                                            value=""
                                                                            name="inline-radio-group"
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
                                                                            for="inline-radio"
                                                                            class="text-sm font-medium text-gray-900 dark:text-gray-300"
                                                                            >Да</label
                                                                        >
                                                                        <input
                                                                            id="inline-radio"
                                                                            type="radio"
                                                                            value=""
                                                                            name="inline-radio-group"
                                                                            class="ml-2 h-4 w-4 border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600"
                                                                        />
                                                                    </div>
                                                                    <div class="mr-4 flex items-center">
                                                                        <label
                                                                            for="inline-2-radio"
                                                                            class="text-sm font-medium text-gray-900 dark:text-gray-300"
                                                                            >Нет</label
                                                                        >
                                                                        <input
                                                                            id="inline-2-radio"
                                                                            type="radio"
                                                                            value=""
                                                                            name="inline-radio-group"
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
                            </div>
                            <div class="politic relative z-30 mt-11 flex gap-4">
                                <li>
                                    <a href="#" class="text-sm text-white opacity-30 hover:opacity-100">Политика защиты персональный информации</a>
                                </li>
                                <li><a href="#" class="text-sm text-white opacity-30 hover:opacity-100">Пользовательское соглашение</a></li>
                            </div>
                        </ul>
                        <ul class="pay_block block list-none">
                            <li class="mb-6 text-lg font-bold text-white opacity-30">Мы работаем с</li>
                            <ul class="flex gap-5">
                                <li>
                                    <ul class="flex flex-col">
                                        <li><img src="/images/icons/visa.png" class="mt-1 mb-11 h-[14px] w-[47px]" alt="Visa" /></li>
                                        <li><img src="/images/icons/sberbank.png" class="mb-11" alt="Сбер Банк" /></li>
                                        <li><img src="/images/icons/alfa.png" alt="Альфа Банк" /></li>
                                    </ul>
                                </li>
                                <div class="h-full w-[1px] bg-white"></div>
                                <li>
                                    <ul class="flex flex-col">
                                        <li><img src="/images/icons/master.png" class="mb-8" alt="MasterCard" /></li>
                                        <li><img src="/images/icons/robbo.png" class="mb-9" alt="Robbo" /></li>
                                        <li><img src="/images/icons/yandex.png" alt="Яндекс" /></li>
                                    </ul>
                                </li>
                                <div></div>
                                <li>
                                    <ul class="flex flex-col">
                                        <li><img src="/images/icons/maestro.png" class="mb-10" alt="Maestro" /></li>
                                        <li><img src="/images/icons/webmoney.png" class="mb-9" alt="Webmoney" /></li>
                                        <li><img src="/images/icons/qiwi.png" alt="Qiwi" /></li>
                                    </ul>
                                </li>
                            </ul>
                            <li class="mt-11 text-end text-sm text-white opacity-30">И другие</li>
                        </ul>
                    </div>
                    <div class="my-8 h-[1px] w-full bg-white opacity-10"></div>
                    <div class="flex items-center justify-between px-1">
                        <div class="flex items-center gap-[16px]">
                            <img src="/images/gm-logo-2.png" class="h-[26px] w-[26px]" alt="GM" />
                            <span class="text-sm text-white opacity-30">GM 2014 - 2025</span>
                        </div>
                        <ul class="partner_link flex items-center">
                            <li class="relative z-10 font-bold text-[#eacc14] hover:opacity-80">
                                <a class="text-[#eacc14]" href="#">+ Партнерская программа</a>
                            </li>
                            <div class="mx-5 h-[30px] w-[1px] bg-white opacity-10"></div>
                            <li class="font-bold text-[#eacc14] hover:opacity-80"><a class="text-[#eacc14]" href="#">+ Добавить магазин</a></li>
                        </ul>
                        <div
                            class="flex h-[39px] w-[141px] items-center justify-center gap-2 rounded-lg ring-1 ring-white/30 hover:ring-white"
                            data-tooltip-target="tooltip-country"
                            type="button"
                        >
                            <img src="/images/icons/russia.png" class="h-[9px] w-[13px]" alt="Россия" />
                            <span class="text-[12px] font-bold text-white">Россия</span>
                            <img src="/images/icons/up.png" alt="Вверх" />
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </section>
</template>

<style scoped></style>
