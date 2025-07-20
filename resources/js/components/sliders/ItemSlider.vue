<template>
    <div class="header-slider-wrapper">
        <Splide
            class="carousel header-slider"
            ref="splideRef"
            :options="{
                type: 'loop',
                autoplay: true,
                perMove: 1,
                interval: 4000,
                arrows: false,
                perPage: 3,
                drag: true,
                pagination: false,
                pauseOnHover: true,
                breakpoints: {
                    1024: {
                        perPage: 2,
                    },
                    768: {
                        perPage: 1,
                    },
                },
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

        <div class="custom-pagination header-slider">
            <span v-for="(slide, i) in slides" :key="i" class="splide-dot" :class="{ active: currentSlide === i }" @click="goToSlide(i)"></span>
        </div>
    </div>
</template>

<script setup lang="ts">
import { Splide, SplideSlide } from '@splidejs/vue-splide';
import { onMounted, ref } from 'vue';

const props = defineProps<{
    slides: Array<any>;
}>();

const { slides } = props;

const splideRef = ref<any>(null);
const currentSlide = ref<number>(0);

function goPrev(): void {
    splideRef.value?.splide.go('<');
}

function goNext(): void {
    splideRef.value?.splide.go('>');
}

function goToSlide(index: number): void {
    splideRef.value?.splide.go(index);
    currentSlide.value = index;
}

onMounted(() => {
    const splide = splideRef.value?.splide;
    splide?.on('move', (newIndex: number) => {
        currentSlide.value = newIndex;
    });
});
</script>

<style scoped>
.header-slider-wrapper {
    position: relative;
    margin: 0 auto;
}

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

.left-arrow,
.right-arrow {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    z-index: 10;
    background: none;
    border: none;
    cursor: pointer;
}

.left-arrow {
    left: -80px;
}

.right-arrow {
    right: -80px;
}

.header-slider .splide-dot {
    background: #1b3568;
    width: 21px;
    height: 9px;
    margin: 0 5px;
    border-radius: 20px;
    transition: width 0.5s;
    cursor: pointer;
}

.header-slider .custom-pagination {
    display: flex;
    justify-content: center;
    max-width: 300px;
    margin: 50px auto;
    min-height: 24px;
}

.header-slider .splide-dot.active {
    background-color: #013ca4;
    width: 92px;
}

@media (max-width: 1024px) {
    .left-arrow {
        left: -40px;
    }

    .right-arrow {
        right: -40px;
    }
}

@media (max-width: 768px) {
    .left-arrow,
    .right-arrow {
        display: none;
    }

    .item-content {
        max-width: 90%;
        font-size: 0.95rem;
        line-height: 1.4rem;
    }

    .item h4 {
        font-size: 1.2rem;
    }

    .header-slider .custom-pagination {
        max-width: 100%;
        flex-wrap: wrap;
        margin: 30px auto;
    }

    .header-slider .splide-dot {
        width: 12px;
        height: 8px;
    }

    .header-slider .splide-dot.active {
        width: 30px;
    }
}
</style>
