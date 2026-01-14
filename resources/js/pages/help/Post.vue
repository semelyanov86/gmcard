<script setup lang="ts">
import Footer from '@/components/Footer.vue';
import HelpHeader from '@/components/help/HelpHeader.vue';
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
            <HelpHeader />
            <div class="mt-8 flex max-w-6xl flex-col items-center justify-center 2xl:w-full">
                <div class="help_post_container mt-10 flex w-full gap-8 md:items-center">
                    <div class="help_post_content min-w-0 flex-1">
                        <h2 class="help_post_text_primary text-center text-4xl">{{ post.title }}</h2>
                        <div class="mt-6 text-start whitespace-pre-line">{{ post.content }}</div>
                    </div>
                    <ul class="help_post_list h-full flex-shrink-0 scroll-m-0 overflow-y-scroll">
                        <li
                            v-for="postItem in posts"
                            :key="postItem.id"
                            class="help_post_text_primary help_post_card mt-2 flex items-center justify-center px-6 text-center text-[21px] font-bold hover:cursor-pointer hover:border-[6px] hover:bg-white hover:px-4 md:w-full"
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

.help_post_text_primary {
    color: #093a9c;
}

.help_post_card {
    background-color: #ebf0f5;
    min-height: 128px;
    width: 280px;
}

.help_post_card:hover {
    border-color: #fae115;
}

.help_post_list {
    max-height: 650px;
    width: 300px;
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
        width: 100%;
    }
}
</style>
