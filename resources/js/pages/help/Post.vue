<script setup lang="ts">
import Footer from '@/components/Footer.vue';
import type { ContactModel } from '@/types';
import { Link } from '@inertiajs/vue3';
import '../../../css/internal/output.css';

const { contact, post, posts } = defineProps<{
    contact: ContactModel;
    post: {
        id: number;
        title: string;
        content: string;
        slug: string;
    };
    posts: Array<{
        id: number;
        title: string;
        slug: string;
    }>;
}>();
</script>

<template>
    <section class="flex h-full w-full items-center justify-center px-4 py-10 md:px-0 md:text-center">
        <div class="flex flex-col items-center justify-center md:w-full">
            <div class="flex flex-col items-center justify-center">
                <a href="/index.html">
                    <img src="/assets/png/logo.png" alt="Логотип" class="h-14 w-14" />
                </a>
                <h1 class="mt-3 text-4xl font-bold md:text-3xl">Один аккаунт. <span class="text-[#3399ff]">Весь мир GM!</span></h1>
                <p class="mt-3 text-lg text-[#333333]">Один аккаунт для всех сервисов GM</p>
            </div>
            <div class="mt-8 flex w-[1200px] flex-col items-center justify-center 2xl:w-full">
                <h4 class="text-lg font-bold uppercase">GM справка</h4>
                <div class="help_post_container mt-10 flex w-full gap-8 md:items-center">
                    <div class="help_post_content min-w-0 flex-1">
                        <h2 class="text-center text-4xl text-[#093A9C]">{{ post.title }}</h2>
                        <div class="mt-6 text-start whitespace-pre-line">{{ post.content }}</div>
                    </div>
                    <ul class="help_post_list h-full max-h-[650px] w-[300px] flex-shrink-0 scroll-m-0 overflow-y-scroll md:w-full">
                        <li
                            v-for="postItem in posts"
                            :key="postItem.id"
                            class="mt-2 flex min-h-[128px] w-[280px] items-center justify-center bg-[#EBF0F5] px-6 text-center text-[21px] font-bold text-[#093A9C] hover:cursor-pointer hover:border-[6px] hover:border-[#FAE115] hover:bg-white hover:px-4 md:w-full"
                        >
                            <Link :href="route('help.post', { slug: postItem.slug })" class="flex h-full w-full items-center justify-center">
                                {{ postItem.title }}
                            </Link>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <Footer :contact="contact" />
</template>

<style scoped>
.help_post_container {
    flex-direction: row;
}

@media (max-width: 768px) {
    .help_post_container {
        flex-direction: column;
    }

    .help_post_content {
        padding-left: 16px;
        padding-right: 16px;
        width: 100%;
        box-sizing: border-box;
        max-width: 100%;
        overflow-wrap: break-word;
        word-wrap: break-word;
        word-break: break-word;
    }

    .help_post_content h2,
    .help_post_content div {
        max-width: 100%;
        overflow-wrap: break-word;
        word-wrap: break-word;
        word-break: break-word;
    }

    .help_post_list {
        padding-left: 16px;
        padding-right: 16px;
        box-sizing: border-box;
    }
}
</style>
