<script setup lang="ts">
import ItemSlider from '@/components/sliders/ItemSlider.vue';
import ReviewsSlider from '@/components/sliders/ReviewsSlider.vue';
import { useMetaBusinessPage } from '@/meta/useMetaBusiness';

import { SlideModel } from '@/models/SlideModel';
import { ReviewModel } from '@/models/ReviewModel';

const { slides, reviews, contact } = defineProps<{
    slides: SlideModel[],
    reviews: ReviewModel[],
    contact: {
        email: string,
        phone: string
    }
}>();

useMetaBusinessPage();
</script>

<template>
    <section class="section-1">
        <div class="container">
            <div class="header-block">
                <div class="logo-icon"></div>
                <h1>
                    Подключитесь к GM и получите новых клиентов уже сейчас!
                </h1>
                <p class="text-1">
                    Создайте всего 1 аккаунт чтобы получить доступ ко всем нашим сервисам. Просто попробуйте
                </p>
                <p class="text-2 underline-1">
                    – это бесплатно!
                </p>
                <div class="header-flex">
                    <button class="btn btn-primary">
                        Подключится
                    </button>
                    <div class="button-hint">
                        Увеличьте ваши продажи уже через 2 недели
                    </div>
                </div>
            </div>
            <div class="header-card">
                <div class="row">
                    <div class="col-md-4 col-sm-6">
                        <div class="card-image card-icon-1"></div>
                        <h4 class="card-title">
                            Реклама ваших товаров и услуг <br>проще чем кажется
                        </h4>
                        <div class="card-content">
                            Бесплатно! Создайте акцию на ваш товар или услугу, разместив тем самым его в каталоге GM
                            CARD и зарабатывайте! Вашу акцию увидят потенциальные покупатели или заказчики, которые ищут
                            интересные предложения, а мы позаботимся обо всем остальном
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="card-image card-icon-2"></div>
                        <h4 class="card-title">
                            Продвижение с нами – <br>это легко и просто
                        </h4>
                        <div class="card-content">
                            Вы сами устанавливаете условия, это может быть скидка, конкурс, бонус при покупке, кэшбэк и
                            прочее - как вы сами пожелаете. Вы сами устанавливаете периоды запуска и организовываете
                            процесс так, чтобы ваша реклама была максимально эффективной.
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="card-image card-icon-3"></div>
                        <h4 class="card-title">
                            Отличный результат с рекламой<br>от нашего сервиса
                        </h4>
                        <div class="card-content">
                            Поделимся интересными кейсами, предоставим аналитику для вашего бизнеса и сделаем все, чтобы
                            вам было комфортно! Реклама и продвижение вашего бизнеса и услуг с GM CARD - залог успеха.
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-slider" v-if="slides && slides.length">
                <ItemSlider :slides="slides" />
            </div>
            <div class="block-1">
                <button class="btn btn-primary">
                    Стать нашим партнером!
                </button>
                <div class="text-3">
                    Убедитесь сами
                </div>
            </div>
        </div>
    </section>
    <section class="section-2">
        <div class="container">
            <div class="block-2">
                <h4 class="title-1">
                    Как это работает
                </h4>
                <ul class="list-1">
                    <li class="list-item">
                        <div class="item-number">1</div>
                        <div class="item-text">
                            Создайте аккаунт или войдите на сайт
                        </div>
                    </li>
                    <li class="list-item">
                        <div class="item-number">2</div>
                        <div class="item-text">
                            Создайте акцию и запустите ее
                        </div>
                    </li>
                    <li class="list-item">
                        <div class="item-number">3</div>
                        <div class="item-text">
                            Получайте новых клиентов прямо сейчас!
                        </div>
                    </li>
                </ul>
                <button class="btn btn-primary">
                    Стать нашим партнером!
                </button>
                <div class="text-4">
                    Просто попробуйте! Это бесплатно!
                </div>
            </div>
        </div>
    </section>
    <section class="section-3">
        <div class="container">
            <h2>
                С нами уже работает <br>более 500+ магазинов!
            </h2>
            <div class="text-5">
                Ваши клиенты ищут вас<br>на GM CARD
            </div>
            <div class="section-slider" v-if="reviews && reviews.length">
                <ReviewsSlider :reviews="reviews" />
            </div>
            <h3 class="title-2">
                Что получает магазин партнер?
            </h3>
            <ul class="list-2 row">
                <li class="list-item col-sm-6">Новых <br>покупателей</li>
                <li class="list-item col-sm-6">Рост заказов от старых клиентов</li>
                <li class="list-item col-sm-6">Увеличение количества постоянных клиентов</li>
                <li class="list-item col-sm-6">Повышение узнаваемости и лояльности к нему</li>
                <li class="list-item col-sm-6">Стабильный источник чистого и качественного трафика</li>
                <li class="list-item col-sm-6">Промокомпании с его участием</li>
            </ul>
            <div class="clearfix"></div>
        </div>
    </section>
    <section class="section-4">
        <div class="container">
            <div class="block-3">
                <h3 class="title-3">
                    Это не все! <br>У нас есть подарок!
                </h3>
                <div class="cost-card">
                    <div class="card-content">
                        <div class="card-title-1">
                            <div class="title-cost">
                                6.000 ₽ / год
                            </div>
                            <div class="title-red">
                                Время ограничено
                            </div>
                        </div>
                        <div class="card-title-2">
                            600 ₽ / год *
                        </div>
                        <div class="text-6">
                            <!-- * —  -->
                            Скидка 90% предоставлена в связи с редизайном сервисов GM и добавлением нового функционала.
                            После того, как будет запущен goodmoneys.ru и доработаны мобильные приложение - предложение
                            будет не действительно.
                        </div>
                    </div>
                </div>
                <div class="expansions">
                    <p>
                        В разработке мобильные приложения и расширения для браузеров
                    </p>
                    <img src="/images/browsers/1.png" alt="">
                    <img src="/images/browsers/2.png" alt="">
                    <img src="/images/browsers/3.png" alt="">
                    <img src="/images/browsers/4.png" alt="">
                    <img src="/images/browsers/5.png" alt="">
                </div>
            </div>
            <hr>
            <div class="block-4">
                <div class="block-content">
                    <h3>
                        А еще реферальная программа
                    </h3>
                    <p>
                        Делитесь с другими своей реферальной ссылкой и получайте до 500 руб., за каждого, кто
                        зарегистрировался в GM.<br><br>Подробнее, как это работает,<br>можно <a href="#">узнать
                        здесь</a>
                    </p>
                </div>
            </div>
            <hr>
        </div>
    </section>
    <section class="section-5">
        <div class="container">
            <div class="block-5">
                <h3 class="title-4">
                    Сделайте первый<br>шаг к своим новым<br>продажам
                </h3>
                <p class="text-7">
                    Создайте всего 1 аккаунт чтобы получить доступ ко всем нашим сервисам. Просто попробуйте
                </p>
                <p class="text-8 underline-1">
                    – это бесплатно!
                </p>
                <button class="btn btn-primary">
                    Стать нашим партнером!
                </button>
            </div>
        </div>
    </section>
    <section class="footer">
        <div class="container">
            <div>


            </div>
            <div class="links">
                <a href="#">Все магазины</a>
                <a href="#">Все промокоды</a>
                <a href="#">Все скидки</a>
                <a href="#">Все конкурсы</a>
                <a href="#">Помощь</a>
                <a href="#">О нас</a>
                <a href="#">Контакты</a>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-4">
                    <div class="title-8 mb-3">Больше скидок</div>
                    <p class="text-9">
                        В нашем мобильном<br>приложении<br>
                        <a href="#" class="mt-3">
                            <img src="/images/app-store.png" alt="">
                        </a><br>
                        <a href="#">
                            <img src="/images/google-play.png" alt="">
                        </a>
                    </p>
                </div>
                <div class="col-md-4">
                    <div class="title-8 pb-2">Следите за новостями и акциями</div>
                    <button class="btn btn-outline btn-vk mr-4">
                        <i class="fa fa-vk te" style="color:white" aria-hidden="true"></i> Вконтакте
                    </button>
                    <button class="btn btn-outline btn-fb">
                        <i class="fa " aria-hidden="true"><img class="w-3 h-3" src="/images/tg.svg"></i> Telegram
                    </button>
                    <p class="text-sm max-w-xs mt-2 text-white opacity-30 hover:opacity-100">Instagram - соцсеть
                        принадлежит компании Meta, признанной экстремистской и запрещенной на территории России</p>
                    <div class="text-lg font-bold text-white opacity-30 mt-12">Служба поддержки GM</div>
                    <div class="flex mt-[15px] flex-wrap">
                        <a class="footer-link-1" href="#"><i class="fa fa-envelope"
                                                             aria-hidden="true"></i>{{ contact.email }}</a>
                        <a class="footer-link-1" href="#"><i class="fa" aria-hidden="true"></i>Где мой кэшбэк?</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="title-8 text-center">Мы работаем с</div>
                    <div class="row partners text-center">
                        <div class="col-4 col-md-4">
                            <img class="partner" src="/images/icons/visa.png" alt="">
                        </div>
                        <div class="col-4 col-md-4">
                            <img class="partner" src="/images/icons/master.png" alt="">
                        </div>
                        <div class="col-4 col-md-4">
                            <img class="partner" src="/images/icons/maestro.png" alt="">
                        </div>
                        <div class="col-4 col-md-4">
                            <img class="partner" src="/images/icons/sberbank.png" alt="">
                        </div>
                        <div class="col-4 col-md-4">
                            <img class="partner" src="/images/icons/robbo.png" alt="">
                        </div>
                        <div class="col-4 col-md-4">
                            <img class="partner" src="/images/icons/webmoney.png" alt="">
                        </div>
                        <div class="col-4 col-md-4">
                            <img class="partner" src="/images/icons/alfa.png" alt="">
                        </div>
                        <div class="col-4 col-md-4">
                            <img class="partner" src="/images/icons/yandex.png" alt="">
                        </div>
                        <div class="col-4 col-md-4">
                            <img class="partner" src="/images/icons/qiwi.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row under-links">
                <div class="mt-11 flex gap-6">
                    <div class="inline-block">
                        <a href="#" class="text-white opacity-30">
                            Политика защиты персональной информации
                        </a>
                    </div>
                    <div class="inline-block">
                        <a href="#" class="text-sm text-white opacity-30">
                            Пользовательское соглашение
                        </a>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row block-6">
                <div class="col-md-4">
                    <div class="footer-logo">
                        <img src="/images/gm-logo-2.png" alt="">
                        <span>
							GM 2014 — 2021
						</span>
                    </div>
                </div>
                <div class="col-md-6 yellow-links">
                    <a href="#">+ ПАРТНЕРСКАЯ ПРОГРАММА</a>
                    <a href="#">+ ДОБАВИТЬ МАГАЗИН</a>
                </div>
                <div class="col-md-2 text-right">
                    <button class="btn btn-outline btn-flag btn-select">Россия</button>
                </div>
            </div>
        </div>
    </section>
</template>
