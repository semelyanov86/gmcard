<script setup lang="ts">
import '../../../css/internal/output.css';
import Footer from '@/components/Footer.vue';
import type { ContactModel } from '@/types';

const { contact, post } = defineProps<{
    contact: ContactModel;
    post: {
        id: number;
        title: string;
        content: string;
    };
}>();
</script>

<template>
    <section class="w-full h-full flex items-center justify-center py-10 px-4 md:px-0 md:text-center">
        <div class="flex flex-col items-center justify-center md:w-full">
            <div class="flex flex-col justify-center items-center">
                <a href="/index.html">
                    <img src="/assets/png/logo.png" alt="Логотип" class="w-14 h-14" />
                </a>
                <h1 class="text-4xl font-bold mt-3 md:text-3xl">
                    Один аккаунт. <span class="text-[#3399ff]">Весь мир GM!</span>
                </h1>
                <p class="text-lg mt-3 text-[#333333]">Один аккаунт для всех сервисов GM</p>
            </div>
            <div class="flex flex-col justify-center items-center mt-8 w-[1200px] 2xl:w-full">
                <h4 class="uppercase text-lg font-bold">GM справка</h4>
                <div class="flex w-full mt-10 gap-8 md:flex-col md:items-center px-4">
                    <div class="w-full">
                        <h2 class="text-4xl text-[#093A9C] text-center">{{ post.title }}</h2>
                        <div class="mt-6 text-start" v-html="post.content"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <Footer :contact="contact" />
</template>

