<template>
    <Splide
        class="testing"
        ref="splideRef"
        :options="{
      type: 'loop',
      autoplay: true,
      perMove: 1,
      interval: 4000,
      arrows: false,
      perPage: 3,
      pagination: true,
      pauseOnHover: true,
    }"
    >
        <SplideSlide class="slider-1" v-for="(slide, i) in slides" :key="i">
            <div class="item">
                <img :src="slide.image" alt="" />
                <h4>{{ slide.title }}</h4>
                <div class="item-content">{{ slide.text }}</div>
            </div>
        </SplideSlide>
    </Splide>

    <button class="custom-arrow left-arrow" @click="goPrev" aria-label="Previous slide">
        <img src="/images/slide-btn-left.png" alt="Previous" />
    </button>
    <button class="custom-arrow right-arrow" @click="goNext" aria-label="Next slide">
        <img src="/images/slide-btn-right.png" alt="Next" />
    </button>
</template>

<script setup>
import { Splide, SplideSlide } from '@splidejs/vue-splide'
import { ref } from 'vue'

const splideRef = ref(null)
function goPrev() {
    splideRef.value?.splide.go('<')
}

function goNext() {
    splideRef.value?.splide.go('>')
}

const slides = [
    {
        image: 'images/slider-1/1.png',
        title: 'Бесплатно!',
        text: '1 активная акция всегда бесплатно! Нужно больше и сразу? Наши тарифы вас приятно удивят!',
    },
    {
        image: 'images/slider-1/2.png',
        title: 'Оригинально!',
        text: 'Разработанный нами онлайн конструктор акций, позволит вам без труда создать потрясающую и подробную акцию, индивидуальный шаблон для каждой акции, а также задать множество дополнительных параметров (промокоды, бесплатная доставка, способ расчета скидки и многое другое)! Запустить ее в считанные минуты! Мы постарались продумать там все до мелочей!',
    },
    {
        image: 'images/slider-1/3.png',
        title: 'Удобно!',
        text: 'Все акции, которые вы запускали ранее, после завершения будут автоматически сохранены в личном кабинете, а их перезапуск займет пару кликов. Это очень быстро! Архив запущенных и прошедших акции всегда сохранен в Вашем личном кабинете!'
    },
    {
        image: 'images/slider-1/4.png',
        title: 'Автоматизировано!',
        text: 'Благодаря нашим расширенным/платным возможностям Ваши акции будут подниматься в ТОП сами – нет необходимости в ручном редактировании и продлении. Отдыхайте! Пусть ваши акции работают сам',
    },
    {
        image: 'images/slider-1/5.png',
        title: 'Логично!',
        text: 'Вы сами выбираете, в какие дни и какие часы, ваши акции будут показаны на сайте, что очень удобно - показывать акции когда это необходимо и скрывать их, когда в этом нет нужды.',
    },
    {
        image: 'images/slider-1/6.png',
        title: 'Красиво!',
        text: 'Предварительный просмотр перед стартом акции позволит Вам оценить её внешний вид и визуальное оформление и только потом запустить! Это позволит вам сделать акцию максимально красиво и с первой попытки',
    },
    {
        image: 'images/slider-1/7.png',
        title: 'Глобально!',
        text: 'Абсолютно неважно где территориально расположен Ваш бизнес, каков его размер и организационная форма - c GM может начать зарабатывать любой желающий, от обычного фрилансера до огромной компании!',
    },
    {
        image: 'images/slider-1/8.png',
        title: 'Экономно!',
        text: 'Тарифы распространяются на все сервисы GM...',
    },
    {
        image: 'images/slider-1/9.png',
        title: 'Сгенерировано!',
        text: 'Собственно разработанный генератор, позволит вам генерировать тысячи денежных кодов, которые вы можете разыгрывать среди ваших клиентов, подписчиков и участников. А так же выдавать таким образом кэшбэк, со своего счета на счет вашего клиента!',
    },
]
</script>

<style>
.item {
    text-align: center;
    margin-top: 32px;
    font-weight: 700;
}

.item img {
    display: block;
    margin: 0 auto;
    max-width: 100%;
    height: auto;
}

.item h4 {
    color: rgb(238, 240, 244);
    font-weight: 700;
    font-size: 1.5rem;
    text-align: center;
}

.item-content {
    color: #b4bbcd;
    max-width: 370px;
    margin: 18px auto;
    line-height: 25px;
}

.left-arrow {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    z-index: 10;
}

.right-arrow {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    z-index: 10;
}
.testing {
    max-width: 1000px;
    margin: 0 auto;
}
</style>
