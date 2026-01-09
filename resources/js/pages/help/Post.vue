<script setup lang="ts">
import '../../../css/internal/output.css';
import Footer from '@/components/Footer.vue';
import type { ContactModel } from '@/types';
import { Link } from '@inertiajs/vue3';

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
                <div class="help_post_container flex w-full mt-10 gap-8 md:items-center">
                    <div class="flex-1 min-w-0 help_post_content">
                        <h2 class="text-4xl text-[#093A9C] text-center">{{ post.title }}</h2>
                        <div class="mt-6 text-start whitespace-pre-line">{{ post.content }}</div>
                    </div>
                    <ul class="overflow-y-scroll scroll-m-0 max-h-[650px] h-full w-[400px] md:w-full flex-shrink-0">
                        <li
                            v-for="postItem in posts"
                            :key="postItem.id"
                            class="w-[280px] md:w-full min-h-[128px] mt-2 px-6 flex items-center justify-center text-[#093A9C] font-bold text-[21px] text-center bg-[#EBF0F5] hover:bg-white hover:border-[6px] hover:border-[#FAE115] hover:px-4 hover:cursor-pointer"
                        >
                            <Link
                                :href="route('help.post', { slug: postItem.slug })"
                                class="w-full h-full flex items-center justify-center"
                            >
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
}
</style>

