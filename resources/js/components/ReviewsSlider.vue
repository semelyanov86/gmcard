<template>
    <Splide
        ref="splideRef"
        class="slider-2"
        :options="{
        type: 'loop',
        perPage: 6,
        perMove: 1,
        gap: '10px',
        autoplay: true,
        pauseOnHover: true,
        pagination: false,
        arrows: false,
        breakpoints: {
          768: {
            perPage: 1,
            perMove: 1,
            gap: '10px',
          },
        },
      }"
    >
        <SplideSlide v-for="(review, i) in reviews" :key="i">
            <div class="item">
                <div class="slider-card">
                    <div class="card-content">{{ review.text }}</div>
                    <div class="card-name">{{ review.name }}</div>
                    <div class="card-position">{{ review.position }}</div>
                    <div class="test">
                        <img :src="review.avatar" alt="" class="card-avatar" />
                    </div>
                </div>
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
import { ref } from 'vue';
import { Splide, SplideSlide } from '@splidejs/vue-splide';

const splideRef = ref(null);

function goPrev() {
    splideRef.value?.splide.go('<');
}

function goNext() {
    splideRef.value?.splide.go('>');
}

const reviews = [
    {
        text: 'Давно пользуюсь и все норм. Ни за что не плачу, спокойно продаю что нужно и покупаю что увижу. Замутили неплохую доставку – теперь можно даже при получении оплачивать и не бояться.',
        name: 'Павел Ларионов',
        position: 'Директор сети кофитериев “Лайк”',
        avatar: 'images/card-avatars/1.png'
    },
    {
        text: 'Несколько лет трудимся с ними вместе и очень довольны результатами совместной работы. Хотим отметить ответственность и профессионализм их сотрудников. Сервис, который они разработали, обладает великолепным функционалом и помогает людям находить самое лучшее.',
        name: 'Дмитрий Валентинов',
        position: 'Основатель школы макияжа и стиля, организатор мероприятий в сфере красоты и моды.',
        avatar: 'images/card-avatars/2.png'
    },
    {
        text: 'Из всех торговых площадок, на которых я пробовала продавать, GMсамая массовая и удобная. Тут на объявление реагируют быстро и продажи идут практически сразу после подачи заявки. Все, конечно, от товара зависит. В моем случае – это корейская косметика. Дела пошли сразу, я довольна. На других сайтах ждала клиента неделями, а тут каждый день практически что-то продаю.',
        name: 'Илона Семенова',
        position: 'Основатель школы макияжа и стиля Корейской косметики “КореяШоп”',
        avatar: 'images/card-avatars/3.png'
    },
    {
        text: 'Давно пользуюсь и все норм. Ни за что не плачу, спокойно продаю что нужно и покупаю что увижу. Замутили неплохую доставку – теперь можно даже при получении оплачивать и не бояться.',
        name: 'Павел Ларионов',
        position: 'Директор сети кофитериев “Лайк”',
        avatar: 'images/card-avatars/4.png'
    },
    {
        text: 'Несколько лет трудимся с ними вместе и очень довольны результатами совместной работы. Хотим отметить ответственность и профессионализм их сотрудников. Сервис, который они разработали, обладает великолепным функционалом и помогает людям находить самое лучшее.',
        name: 'Дмитрий Валентинов',
        position: 'Основатель школы макияжа и стиля, организатор мероприятий в сфере красоты и моды.',
        avatar: 'images/card-avatars/5.png'
    }
];
</script>

<style>
.slider-2 {
    width: 100vw;
    max-width: 100vw;
    margin-left: calc(-50vw + 50%);
    overflow: visible;
}

.slider-2 .item {
    text-align: center;
    padding-bottom: 80px;
}

.slider-card {
    position: relative;
    background-color: #fff;
    padding: 30px 20px;
    border-radius: 12px;
    overflow: visible;
    min-height: 300px;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
}

.card-content {
    font-size: 1rem;
    color: #333;
    margin-bottom: 15px;
}

.card-name {
    font-weight: bold;
    font-size: 1.2rem;
}

.card-position {
    font-size: 0.9rem;
    color: #777;
    margin-bottom: 10px;
}

.slider-2 img.card-avatar {
    position: absolute;
    bottom: -65px;
    left: 50%;
    transform: translateX(-50%);
    width: 80px;
    height: 80px;
    border-radius: 50%;
    object-fit: cover;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.custom-arrow {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    cursor: pointer;
    z-index: 20;
    width: 63px;
    height: 83px;
    background-repeat: no-repeat;
    padding: 0;
}

.custom-arrow img {
    width: 100%;
    height: 100%;
    object-fit: contain;
}

.left-arrow {
    left: 10px;
}

.right-arrow {
    right: 10px;
}
</style>
