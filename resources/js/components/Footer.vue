<script setup lang="ts">

</script>

<template>
    <section class="footer bg-[#0f1120]">
        <div class="container">
            <footer class="bg-[#101121] relative overflow-hidden">
                <div class="2xl:w-full 2xl:px-4 w-[1140px] mx-auto py-9 relative">
                    <img src="/images/hand-footer.png" class="absolute -bottom-2 -left-20 z-10 hand" alt="Телефон">
                    <ul class="flex items-center justify-between flex-wrap z-20 relative footer_navBlock">
                        <li><a href="#"
                               class="text-sm text-white font-bold uppercase hover:border-b-2 footer_nav hover:border-b-white">Все
                            магазины</a></li>
                        <li><a href="#"
                               class="text-sm text-white font-bold uppercase hover:border-b-2 footer_nav hover:border-b-white">Все
                            промокоды</a></li>
                        <li><a href="#"
                               class="text-sm text-white font-bold uppercase hover:border-b-2 footer_nav hover:border-b-white">Все
                            скидки</a></li>
                        <li><a href="#"
                               class="text-sm text-white font-bold uppercase hover:border-b-2 footer_nav hover:border-b-white">Все
                            конкурсы</a></li>
                        <li><a href="#"
                               class="text-sm text-white font-bold uppercase hover:border-b-2 footer_nav hover:border-b-white">О
                            нас</a></li>
                        <li><a href="#"
                               class="text-sm text-white font-bold uppercase hover:border-b-2 footer_nav hover:border-b-white">Помощь</a>
                        </li>
                        <li><a href="#"
                               class="text-sm text-white font-bold uppercase hover:border-b-2 footer_nav hover:border-b-white">Контакты</a>
                        </li>
                    </ul>
                    <div class="w-full bg-white opacity-10 my-10 h-[1px]"></div>
                    <div class="flex justify-between z-20 relative footer_block">
                        <ul class="w-[143px] footer_upBlock flex flex-col gap-3 list-none">
                            <li><a href="#" class="text-lg font-bold text-white opacity-30">Больше скидок</a></li>
                            <li><a href="#" class="text-[15px] text-white">В нашем мобильном приложении</a></li>
                            <div class="flex flex-col gap-3 upBlock_phones">
                                <li>
                                    <a href="#" class=""><img src="/images/app-store.png"
                                                              class="w-[143px] h-[54px] hover:opacity-80"
                                                              alt="Скачать на Android" data-tooltip-target="tooltip-app"
                                                              type="button"></a>
                                </li>
                                <li>
                                    <a href="#" class=""><img src="/images/google-play.png"
                                                              class="w-[143px] h-[54px] hover:opacity-80"
                                                              alt="Скачать на Android" data-tooltip-target="tooltip-app"
                                                              type="button"></a>
                                </li>
                            </div>
                            <div id="tooltip-app" role="tooltip"
                                 class="absolute z-10 w-[150px] invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                В разработке!

                            </div>
                        </ul>
                        <ul class="list-none list_footer ml-[250px] footer_downBlock">
                            <li class="text-lg font-bold text-white opacity-30">Следите за новостями и акциями</li>
                            <div class="flex items-center flex-wrap gap-3 mt-[15px]">
                                <li><a href=""
                                       class="flex items-center justify-center text-[16px] text-white w-[147px] h-[48px] ring-[1px] ring-white/50 hover:ring-white rounded-lg"
                                       data-tooltip-target="tooltip-social" type="button"><i
                                    class="fa fa-vk opacity-50 mr-[14px]" aria-hidden="true"></i>Вконтакте</a></li>
                                <li><a href=""
                                       class="flex items-center justify-center text-[16px] text-white w-[147px] h-[48px] ring-[1px] ring-white/50 hover:ring-white rounded-lg"
                                       data-tooltip-target="tooltip-social" type="button"><img
                                    class="w-5 h-5 mr-[14px] text-white opacity-50" src="/images/tg.svg">Telegramm</a>
                                </li>
                            </div>
                            <p class="text-sm max-w-xs mt-5 text-white opacity-30 hover:opacity-100">Instagram - соцсеть
                                принадлежит компании Meta, признанной экстремистской и запрещенной на территории
                                России</p>

                            <li class="text-lg font-bold text-white opacity-30 mt-12">Служба поддержки GM</li>
                            <div class="flex gap-7 mt-[15px] flex-wrap">
                                <li><a href="mailto:admin@gmcard.ru"
                                       class="text-white text-[16px] flex items-center border-b-2 border-b-white/30"><img
                                    src="/images/icons/email.png" class="opacity-50 mr-[14px]"
                                    alt="">admin@gmcard.ru</a></li>
                                <li>
                                    <button id="modal-cash"
                                            class="text-white text-[16px] flex items-center border-b-2 border-b-white/30">
                                        Где мой кэшбэк?
                                    </button>
                                    <div id="staticModals"
                                         class="fixed top-0 left-0  w-full h-full z-50 bg-black bg-opacity-30 overflow-auto hidden">
                                        <div class="flex justify-center py-10 w-full px-4">
                                            <div class="relative  w-full max-w-[500px] max-h-full z-50">
                                                <div class="relative bg-white rounded-lg dark:bg-gray-700">
                                                    <div
                                                        class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                                        <h3 class="text-2xl font-semibold text-gray-900 dark:text-white">
                                                            Где мой кэшбек?
                                                        </h3>
                                                        <button type="button"
                                                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                                id="close_Modal">
                                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                <path fill-rule="evenodd"
                                                                      d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                                      clip-rule="evenodd"></path>
                                                            </svg>
                                                        </button>
                                                    </div>
                                                    <div class="p-6 space-y-1">
                                                        <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                                            Пожалуйста заполните эту форму и мы поможем Вам найти кэшбек
                                                            Поиск кэшбека возможен, если с момента соверщения покупки
                                                            прошло не более 6 месяцев, т.е. если Вы потеряли бонус за
                                                            покупку, которую сделали более полугода назад, то найти нам
                                                            его, скорее всего, не удастся.
                                                        </p>
                                                        <form action="">
                                                            <div class="mt-2">
                                                                <label for="email-address-icon"
                                                                       class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Email,
                                                                    указанный при регистрации</label>
                                                                <div class="relative">
                                                                    <div
                                                                        class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                                        <svg aria-hidden="true"
                                                                             class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                                                             fill="currentColor" viewBox="0 0 20 20"
                                                                             xmlns="http://www.w3.org/2000/svg">
                                                                            <path
                                                                                d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                                                                            <path
                                                                                d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                                                                        </svg>
                                                                    </div>
                                                                    <input type="text" id="email-address-icon"
                                                                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                           placeholder="ivanov@gmail.com">
                                                                </div>
                                                            </div>
                                                            <div class="mt-2">
                                                                <label for="email-address-icon"
                                                                       class="block text-base font-medium text-gray-900 dark:text-white">Дата
                                                                    покупки</label>
                                                                <p class="block mb-2 text-sm font-medium text-gray-500 dark:text-gray-400">
                                                                    Дата покупки должна быть не менее 5 дней назад, т.к.
                                                                    в некоторых интернет-магазинах отслеживание Вашей
                                                                    покупки и зачисление бонуса может занять до 5
                                                                    дней.</p>
                                                                <div class="relative max-w-full">
                                                                    <div
                                                                        class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                                        <svg aria-hidden="true"
                                                                             class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                                                             fill="currentColor" viewBox="0 0 20 20"
                                                                             xmlns="http://www.w3.org/2000/svg">
                                                                            <path fill-rule="evenodd"
                                                                                  d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                                                                  clip-rule="evenodd"></path>
                                                                        </svg>
                                                                    </div>
                                                                    <input datepicker datepicker-autohide type="text"
                                                                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                           placeholder="Выберите дату">
                                                                </div>
                                                            </div>
                                                            <div class="mt-2">
                                                                <label for="email-address-icon"
                                                                       class="block text-base font-medium text-gray-900 dark:text-white">Магазин</label>
                                                                <p class="block mb-2 text-sm font-medium text-gray-500 dark:text-gray-400">
                                                                    Здесь отображаются магазины, которые Вы посещали в
                                                                    течение 7 дней.</p>
                                                                <div class="relative max-w-full">
                                                                    <input type="text"
                                                                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                           placeholder="">
                                                                </div>
                                                            </div>
                                                            <div class="mt-2">
                                                                <label for="email-address-icon"
                                                                       class="block text-base font-medium text-gray-900 dark:text-white">Номер
                                                                    заказа</label>
                                                                <div class="relative max-w-full">
                                                                    <input type="text"
                                                                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                           placeholder="">
                                                                </div>
                                                            </div>
                                                            <div class="mt-2">
                                                                <label for="countries"
                                                                       class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Валюта</label>
                                                                <select id="countries"
                                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                    <option selected>RUB</option>
                                                                    <option value="US">USD</option>
                                                                </select>
                                                            </div>
                                                            <div class="mt-3">
                                                                <p class="text-gray-900 dark:text-gray-300 text-base">
                                                                    Покупка совершена через мобильное приложение?</p>
                                                                <div class="flex items-center mt-1">
                                                                    <div class="flex items-center mr-4">
                                                                        <label for="inline-radio"
                                                                               class="text-sm font-medium text-gray-900 dark:text-gray-300">Да</label>
                                                                        <input id="inline-radio" type="radio" value=""
                                                                               name="inline-radio-group"
                                                                               class="ml-2 w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                                    </div>
                                                                    <div class="flex items-center mr-4">
                                                                        <label for="inline-2-radio"
                                                                               class=" text-sm font-medium text-gray-900 dark:text-gray-300">Нет</label>
                                                                        <input id="inline-2-radio" type="radio" value=""
                                                                               name="inline-radio-group"
                                                                               class="ml-2 w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="mt-3">
                                                                <p class="text-gray-900 dark:text-gray-300 text-base">Вы
                                                                    использовали промокоды?</p>
                                                                <div class="flex items-center mt-1">
                                                                    <div class="flex items-center mr-4">
                                                                        <label for="inline-radio"
                                                                               class="text-sm font-medium text-gray-900 dark:text-gray-300">Да</label>
                                                                        <input id="inline-radio" type="radio" value=""
                                                                               name="inline-radio-group"
                                                                               class="ml-2 w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                                    </div>
                                                                    <div class="flex items-center mr-4">
                                                                        <label for="inline-2-radio"
                                                                               class=" text-sm font-medium text-gray-900 dark:text-gray-300">Нет</label>
                                                                        <input id="inline-2-radio" type="radio" value=""
                                                                               name="inline-radio-group"
                                                                               class="ml-2 w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="mt-3">
                                                                <p class="text-gray-900 dark:text-gray-300 text-base">
                                                                    Находились ли товары в корзине до перехода через
                                                                    GmCash?</p>
                                                                <div class="flex items-center mt-1">
                                                                    <div class="flex items-center mr-4">
                                                                        <label for="inline-radio"
                                                                               class="text-sm font-medium text-gray-900 dark:text-gray-300">Да</label>
                                                                        <input id="inline-radio" type="radio" value=""
                                                                               name="inline-radio-group"
                                                                               class="ml-2 w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                                    </div>
                                                                    <div class="flex items-center mr-4">
                                                                        <label for="inline-2-radio"
                                                                               class=" text-sm font-medium text-gray-900 dark:text-gray-300">Нет</label>
                                                                        <input id="inline-2-radio" type="radio" value=""
                                                                               name="inline-radio-group"
                                                                               class="ml-2 w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="mt-3">
                                                                <label
                                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                                                    for="file_input">Пожалуйста, прикрепите скриншот
                                                                    заказа, где видно номер заказа, дату заказа и полную
                                                                    сумму покупки</label>
                                                                <input
                                                                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                                                    aria-describedby="file_input_help" id="file_input"
                                                                    type="file">
                                                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400"
                                                                   id="file_input_help">Прикрепите файл (рамер до 1МБ):
                                                                    (*.pdf, *.png, *.jpg, *.gif, *.jpeg)</p>
                                                            </div>
                                                            <div class="mt-3">
                                                                <label for="message"
                                                                       class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Комментарий</label>
                                                                <textarea id="message" rows="4"
                                                                          class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                          placeholder=""></textarea>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div
                                                        class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                                                        <button id="close_Submit" type="button"
                                                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                            Отправить
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </div>
                            <div class="flex gap-4 mt-11 relative z-30 politic">
                                <li><a href="#" class="text-sm text-white opacity-30 hover:opacity-100">Политика защиты
                                    персональный информации</a></li>
                                <li><a href="#" class="text-sm text-white opacity-30 hover:opacity-100">Пользовательское
                                    соглашение</a></li>
                            </div>
                        </ul>
                        <ul class="list-none block pay_block">
                            <li class="text-lg font-bold text-white opacity-30 mb-6">Мы работаем с</li>
                            <ul class="flex gap-5">
                                <li>
                                    <ul class="flex flex-col">
                                        <li><img src="/images/icons/visa.png" class="mb-11 mt-1 w-[47px] h-[14px]"
                                                 alt="Visa"></li>
                                        <li><img src="/images/icons/sberbank.png" class="mb-11" alt="Сбер Банк"></li>
                                        <li><img src="/images/icons/alfa.png" alt="Альфа Банк"></li>
                                    </ul>
                                </li>
                                <div class="w-[1px] h-full bg-white "></div>
                                <li>
                                    <ul class="flex flex-col">
                                        <li><img src="/images/icons/master.png" class="mb-8" alt="MasterCard"></li>
                                        <li><img src="/images/icons/robbo.png" class="mb-9" alt="Robbo"></li>
                                        <li><img src="/images/icons/yandex.png" alt="Яндекс"></li>
                                    </ul>
                                </li>
                                <div></div>
                                <li>
                                    <ul class="flex flex-col">
                                        <li><img src="/images/icons/maestro.png" class="mb-10" alt="Maestro"></li>
                                        <li><img src="/images/icons/webmoney.png" class="mb-9" alt="Webmoney"></li>
                                        <li><img src="/images/icons/qiwi.png" alt="Qiwi"></li>
                                    </ul>
                                </li>
                            </ul>
                            <li class="text-sm text-white opacity-30 mt-11 text-end">И другие</li>
                        </ul>
                    </div>
                    <div class="w-full bg-white opacity-10 my-8 h-[1px]"></div>
                    <div class="flex px-1 items-center justify-between">
                        <div class="flex items-center gap-[16px]">
                            <img src="/images/gm-logo-2.png" class="w-[26px] h-[26px]" alt="GM">
                            <span class="text-sm text-white opacity-30">GM 2014 - 2025</span>
                        </div>
                        <ul class="flex items-center partner_link">
                            <li class="text-[#eacc14] font-bold hover:opacity-80 relative z-10"><a
                                class="text-[#eacc14]" href="#">+ Партнерская программа</a></li>
                            <div class="h-[30px] w-[1px] bg-white opacity-10 mx-5"></div>
                            <li class="text-[#eacc14] font-bold hover:opacity-80"><a class="text-[#eacc14]" href="#">+
                                Добавить магазин</a></li>
                        </ul>
                        <div
                            class="flex items-center justify-center ring-1 ring-white/30 hover:ring-white rounded-lg gap-2 w-[141px] h-[39px]"
                            data-tooltip-target="tooltip-country" type="button">
                            <img src="/images/icons/russia.png" class="w-[13px] h-[9px]" alt="Россия">
                            <span class="text-[12px] font-bold text-white">Россия</span>
                            <img src="/images/icons/up.png" alt="Вверх">
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </section>
</template>

<style scoped>

</style>
