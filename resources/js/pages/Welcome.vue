<script setup lang="ts">
import PopUpForm from '@/components/popup/PopUpForm.vue';
import ItemSlider from '@/components/sliders/ItemSlider.vue';
import ReviewsSlider from '@/components/sliders/ReviewsSlider.vue';

import { useHead } from '@vueuse/head';
import '../../css/internal/landing.css';

import Footer from '@/components/Footer.vue';
import AdaptiveImage from '@/components/ui/AdaptiveImage.vue';
import { ReviewModel } from '@/models/ReviewModel';
import { SlideModel } from '@/models/SlideModel';

import { usePage } from '@inertiajs/vue3';
import { ref, watch } from 'vue';
import { useToast } from 'vue-toastification';

const props = defineProps<{
    slides: SlideModel[];
    reviews: ReviewModel[];
    contact: {
        email: string;
        phone: string;
    };
    meta: {
        title: string;
        description: string;
        canonical: string;
        og: {
            title: string;
            description: string;
            image: string;
            type: string;
        };
    };
}>();

const isPopUpVisible = ref(false);

function openPopUp() {
    isPopUpVisible.value = true;
}

const page = usePage();
const toast = useToast();

type FlashProps = {
    success?: string;
    error?: string;
};

watch(
    () => page.props.flash as FlashProps,
    (flash) => {
        if (flash?.success) {
            toast.success(flash.success);
        }
        if (flash?.error) {
            toast.error(flash.error);
        }
    },
    { immediate: true }
);

useHead({
    title: props.meta.title,
    meta: [
        { name: 'description', content: props.meta.description },
        { property: 'og:title', content: props.meta.og.title },
        { property: 'og:description', content: props.meta.og.description },
        { property: 'og:image', content: props.meta.og.image },
        { property: 'og:type', content: props.meta.og.type },
    ]
});
</script>

<template>
    <section class="section-1">
        <div class="container">
            <div class="header-block">
                <AdaptiveImage image-path="gm-logo" alt="logo" image-class="logo-icon"></AdaptiveImage>
                <h1>Подключитесь к GM и получите новых клиентов уже сейчас!</h1>
                <p class="text-1">Создайте всего 1 аккаунт чтобы получить доступ ко всем нашим сервисам. Просто попробуйте</p>
                <p class="text-2 underline-1">– это бесплатно!</p>
                <div class="header-flex">
                    <button class="btn btn-primary" @click="openPopUp">Подключится</button>
                    <div class="button-hint">Увеличьте ваши продажи уже через 2 недели</div>
                </div>
                <transition name="fade">
                    <PopUpForm v-if="isPopUpVisible" @close="isPopUpVisible = false" />
                </transition>
            </div>
            <div class="header-card">
                <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
                    <div class="sm:col-span-1 md:col-span-1">
                        <AdaptiveImage
                            image-path="header-card-icon-1"
                            alt="card-icon-1"
                            image-class="header-card card-image card-icon-1"
                        ></AdaptiveImage>
                        <h4 class="card-title">Реклама ваших товаров и услуг <br />проще чем кажется</h4>
                        <div class="card-content">
                            Бесплатно! Создайте акцию на ваш товар или услугу, разместив тем самым его в каталоге GM CARD и зарабатывайте! Вашу акцию
                            увидят потенциальные покупатели или заказчики, которые ищут интересные предложения, а мы позаботимся обо всем остальном
                        </div>
                    </div>
                    <div class="sm:col-span-1 md:col-span-1">
                        <AdaptiveImage
                            image-path="header-card-icon-2"
                            alt="card-icon-2"
                            image-class="header-card card-image card-icon-2"
                        ></AdaptiveImage>
                        <h4 class="card-title">Продвижение с нами – <br />это легко и просто</h4>
                        <div class="card-content">
                            Вы сами устанавливаете условия, это может быть скидка, конкурс, бонус при покупке, кэшбэк и прочее - как вы сами
                            пожелаете. Вы сами устанавливаете периоды запуска и организовываете процесс так, чтобы ваша реклама была максимально
                            эффективной.
                        </div>
                    </div>
                    <div class="sm:col-span-2 md:col-span-1">
                        <AdaptiveImage
                            image-path="header-card-icon-3"
                            alt="card-icon-3"
                            image-class="header-card card-image card-icon-3"
                        ></AdaptiveImage>
                        <h4 class="card-title">Отличный результат с рекламой<br />от нашего сервиса</h4>
                        <div class="card-content">
                            Поделимся интересными кейсами, предоставим аналитику для вашего бизнеса и сделаем все, чтобы вам было комфортно! Реклама и
                            продвижение вашего бизнеса и услуг с GM CARD - залог успеха.
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-slider" v-if="slides && slides.length">
                <ItemSlider :slides="slides" />
            </div>
            <div class="block-1">
                <button class="btn btn-primary" @click="openPopUp">Стать нашим партнером!</button>
                <div class="text-3">Убедитесь сами</div>
            </div>
        </div>
    </section>
    <section class="section-2">
        <div class="container">
            <div class="block-2">
                <h4 class="title-1">Как это работает</h4>
                <ul class="list-1">
                    <li class="list-item">
                        <div class="item-number">1</div>
                        <div class="item-text">Создайте аккаунт или войдите на сайт</div>
                    </li>
                    <li class="list-item">
                        <div class="item-number">2</div>
                        <div class="item-text">Создайте акцию и запустите ее</div>
                    </li>
                    <li class="list-item">
                        <div class="item-number">3</div>
                        <div class="item-text">Получайте новых клиентов прямо сейчас!</div>
                    </li>
                </ul>
                <button class="btn btn-primary" @click="openPopUp">Стать нашим партнером!</button>
                <div class="text-4">Просто попробуйте! Это бесплатно!</div>
            </div>
        </div>
    </section>
    <section class="section-3">
        <div class="container">
            <h2>С нами уже работает <br />более 500+ магазинов!</h2>
            <div class="text-5">Ваши клиенты ищут вас<br />на GM CARD</div>
            <div class="review-slider" v-if="reviews && reviews.length">
                <ReviewsSlider :reviews="reviews" />
            </div>
            <h3 class="title-2">Что получает магазин партнер?</h3>
            <ul class="list-2 grid grid-cols-1 gap-4 sm:grid-cols-2">
                <li class="list-item">Новых <br />покупателей</li>
                <li class="list-item">Рост заказов от старых клиентов</li>
                <li class="list-item">Увеличение количества постоянных клиентов</li>
                <li class="list-item">Повышение узнаваемости и лояльности к нему</li>
                <li class="list-item">Стабильный источник чистого и качественного трафика</li>
                <li class="list-item">Промокомпании с его участием</li>
            </ul>
            <div class="clearfix"></div>
        </div>
    </section>
    <section class="section-4">
        <div class="container">
            <div class="block-3">
                <h3 class="title-3">Это не все! <br />У нас есть подарок!</h3>
                <div class="cost-card">
                    <div class="card-content">
                        <div class="card-title-1">
                            <div class="title-cost">6.000 ₽ / год</div>
                            <div class="title-red">Время ограничено</div>
                        </div>
                        <div class="card-title-2">600 ₽ / год *</div>
                        <div class="text-6">
                            <!-- * —  -->
                            Скидка 90% предоставлена в связи с редизайном сервисов GM и добавлением нового функционала. После того, как будет запущен
                            goodmoneys.ru и доработаны мобильные приложение - предложение будет не действительно.
                        </div>
                    </div>
                </div>
                <div class="expansions">
                    <p>В разработке мобильные приложения и расширения для браузеров</p>
                    <AdaptiveImage image-path="browsers/1" alt="Браузер Chrome" />
                    <AdaptiveImage image-path="browsers/2" alt="Браузер Firefox" image-class="mx-auto" />
                    <AdaptiveImage image-path="browsers/3" alt="Браузер Safari" image-class="mx-auto" />
                    <AdaptiveImage image-path="browsers/4" alt="Браузер Edge" image-class="mx-auto" />
                    <AdaptiveImage image-path="browsers/5" alt="Браузер Opera" image-class="mx-auto" />
                </div>
            </div>
            <hr />
            <div class="block-4">
                <div class="block-content">
                    <h3>А еще реферальная программа</h3>
                    <p>
                        Делитесь с другими своей реферальной ссылкой и получайте до 500 руб., за каждого, кто зарегистрировался в GM.<br /><br />Подробнее,
                        как это работает,<br />можно <a href="#">узнать здесь</a>
                    </p>
                </div>
            </div>
            <hr />
        </div>
    </section>
    <section class="section-5">
        <div class="container">
            <div class="block-5">
                <h3 class="title-4">Сделайте первый<br />шаг к своим новым<br />продажам</h3>
                <p class="text-7">Создайте всего 1 аккаунт чтобы получить доступ ко всем нашим сервисам. Просто попробуйте</p>
                <p class="text-8 underline-1">– это бесплатно!</p>
                <button class="btn btn-primary" @click="openPopUp">Стать нашим партнером!</button>
            </div>
        </div>
    </section>
    <Footer :contact="contact"></Footer>
</template>
