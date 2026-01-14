<script setup lang="ts">
import Footer from '@/components/Footer.vue';
import HelpHeader from '@/components/help/HelpHeader.vue';
import type { ContactModel } from '@/types';
import { Link } from '@inertiajs/vue3';

const { contact, posts } = defineProps<{
    contact: ContactModel;
    posts: Array<{
        id: number;
        title: string;
        slug: string;
    }>;
}>();
</script>

<template>
    <section class="flex min-h-screen w-full items-center justify-center px-4 py-10 md:px-0 md:text-center">
        <div class="flex flex-col items-center justify-center md:w-full">
            <HelpHeader />
            <div class="help_content 4xl:w-full mt-8 flex flex-col items-center justify-center">
                <ul class="help_list mt-10 grid grid-cols-4 gap-4">
                    <li v-for="post in posts" :key="post.id" class="box-border h-32">
                        <Link
                            :href="route('help.post', { slug: post.slug })"
                            class="help_card_bg help_card_text help_card_link flex h-full w-full cursor-pointer items-center justify-center border-4 border-transparent px-6 text-center text-xl font-bold hover:bg-white hover:px-4"
                        >
                            {{ post.title }}
                        </Link>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <Footer :contact="contact"></Footer>
</template>

<style scoped>
.help_content {
    width: 1100px;
}

.help_list li {
    min-width: 0 !important;
}

.help_card_bg {
    background-color: #ebf0f5;
}

.help_card_text {
    color: #093a9c;
}

.help_card_link:hover {
    border-color: #fae115 !important;
}

@media (max-width: 768px) {
    .help_list {
        grid-template-columns: 1fr;
    }

    .help_footer_top {
        flex-direction: column;
        gap: 0.5rem;
    }

    .help_footer_top_list {
        flex-direction: column;
        gap: 1rem;
    }

    .help_footer_bottom {
        flex-direction: column;
        margin-left: 1rem;
        gap: 0.5rem;
    }
}
</style>
