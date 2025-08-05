<template>
    <Splide
        ref="splideRef"
        class="slider-2"
        :options="{
            type: 'loop',
            perPage: 5,
            perMove: 1,
            gap: '20px',
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
        <img src="/images/webp/slide-btn-left.webp" alt="Previous" />
    </button>
    <button class="custom-arrow right-arrow" @click="goNext" aria-label="Next slide">
        <img src="/images/webp/slide-btn-right.webp" alt="Next" />
    </button>
</template>

<script setup lang="ts">
import { Splide, SplideSlide } from '@splidejs/vue-splide';
import { ref } from 'vue';

type Review = {
    text: string;
    name: string;
    position: string;
    avatar: string;
};

const { reviews } = defineProps<{
    reviews: Review[];
}>();

const splideRef = ref<{
    splide: {
        go: (target: string | number) => void;
    };
} | null>(null);

function goPrev(): void {
    splideRef.value?.splide.go('<');
}

function goNext(): void {
    splideRef.value?.splide.go('>');
}
</script>

<style>
.slider-2 {
    width: 100vw;
    max-width: 100vw;
    margin-left: calc(-50vw + 50%);
    margin-top: 40px;
    overflow: visible;
    cursor: grab;
}

.slider-2 .item {
    text-align: center;
    padding-bottom: 80px;
}

.slider-card {
    margin: 0 auto;
    position: relative;
    background-color: #fff;
    max-width: 340px;
    color: #000;
    padding: 60px 20px;
    border-radius: 25px;
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
    margin-top: 32px;
}

.card-position {
    font-size: 0.9rem;
    color: #777;
    margin-bottom: 10px;
}

.slider-2 img.card-avatar {
    width: auto;
    position: absolute;
    bottom: -65px;
    left: calc(50% - 54px);
}

.custom-arrow {
    position: absolute;
    top: 40%;
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
    left: -10px;
}

.right-arrow {
    right: -10px;
}

@media (max-width: 768px) {
    .custom-arrow {
        width: 50px;
        height: 600px;
    }
}
</style>
