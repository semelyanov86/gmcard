<script setup lang="ts">
import Footer from '@/components/Footer.vue';
import type { ContactModel } from '@/types';
import { Link } from '@inertiajs/vue3';

const { contact } = defineProps<{
    contact: ContactModel;
}>();
</script>

<template>
    <section class="flex h-full w-full items-center justify-center px-4 py-10 md:px-0 md:text-center">
        <div class="flex flex-col items-center justify-center md:w-full">
            <div class="flex flex-col items-center justify-center">
                <Link href="/index.html">
                    <img src="/assets/png/logo.png" alt="Логотип" class="h-14 w-14" />
                </Link>
                <h1 class="mt-3 text-4xl font-bold md:text-3xl">Один аккаунт. <span class="text-[#3399ff]">Весь мир GM!</span></h1>
                <p class="mt-3 text-lg text-[#333333]">Один аккаунт для всех сервисов GM</p>
            </div>
            <div class="help_content 4xl:w-full mt-8 flex flex-col items-center justify-center">
                <h4 class="text-lg font-bold uppercase">GM справка</h4>
                <ul class="help_list mt-10 grid grid-cols-4 gap-4">
                    <li class="box-border h-32">
                        <Link
                            href="/rules.html"
                            class="flex h-full w-full cursor-pointer items-center justify-center border-4 border-transparent bg-[#EBF0F5] px-6 text-center text-[21px] font-bold text-[#093A9C] hover:border-[#FAE115] hover:bg-white hover:px-4"
                        >
                            О GM1LP
                        </Link>
                    </li>
                    <li class="box-border h-32">
                        <Link
                            :href="route('help.user-agreement')"
                            class="flex h-full w-full cursor-pointer items-center justify-center border-4 border-transparent bg-[#EBF0F5] px-6 text-center text-[20px] font-bold text-[#093A9C] hover:border-[#FAE115] hover:bg-white hover:px-4"
                        >
                            Пользовательское соглашение
                        </Link>
                    </li>
                    <li class="box-border h-32">
                        <Link
                            href="/rules.html"
                            class="flex h-full w-full cursor-pointer items-center justify-center border-4 border-transparent bg-[#EBF0F5] px-6 text-center text-[21px] font-bold text-[#093A9C] hover:border-[#FAE115] hover:bg-white hover:px-4"
                        >
                            Правила сообщества
                        </Link>
                    </li>
                    <li class="box-border h-32">
                        <Link
                            href="/rules.html"
                            class="flex h-full w-full cursor-pointer items-center justify-center border-4 border-transparent bg-[#EBF0F5] px-6 text-center text-[21px] font-bold text-[#093A9C] hover:border-[#FAE115] hover:bg-white hover:px-4"
                        >
                            Возможности
                        </Link>
                    </li>
                    <li class="box-border h-32">
                        <Link
                            href="/rules.html"
                            class="flex h-full w-full cursor-pointer items-center justify-center border-4 border-transparent bg-[#EBF0F5] px-6 text-center text-[21px] font-bold text-[#093A9C] hover:border-[#FAE115] hover:bg-white hover:px-4"
                        >
                            О сервисе скидок
                        </Link>
                    </li>
                    <li class="box-border h-32">
                        <Link
                            href="/rules.html"
                            class="flex h-full w-full cursor-pointer items-center justify-center border-4 border-transparent bg-[#EBF0F5] px-6 text-center text-[21px] font-bold text-[#093A9C] hover:border-[#FAE115] hover:bg-white hover:px-4"
                        >
                            О сервисе конкурсов
                        </Link>
                    </li>
                    <li class="box-border h-32">
                        <Link
                            href="/rules.html"
                            class="flex h-full w-full cursor-pointer items-center justify-center border-4 border-transparent bg-[#EBF0F5] px-6 text-center text-[21px] font-bold text-[#093A9C] hover:border-[#FAE115] hover:bg-white hover:px-4"
                        >
                            О сервисе заданий
                        </Link>
                    </li>
                    <li class="box-border h-32">
                        <Link
                            href="/rules.html"
                            class="flex h-full w-full cursor-pointer items-center justify-center border-4 border-transparent bg-[#EBF0F5] px-6 text-center text-[20px] font-bold text-[#093A9C] hover:border-[#FAE115] hover:bg-white hover:px-4"
                        >
                            О сервисе кредитования, P2P
                        </Link>
                    </li>
                    <li class="box-border h-32">
                        <Link
                            href="/rules.html"
                            class="flex h-full w-full cursor-pointer items-center justify-center border-4 border-transparent bg-[#EBF0F5] px-6 text-center text-[21px] font-bold text-[#093A9C] hover:border-[#FAE115] hover:bg-white hover:px-4"
                        >
                            Черный список
                        </Link>
                    </li>
                    <li class="box-border h-32">
                        <Link
                            href="/rules.html"
                            class="flex h-full w-full cursor-pointer items-center justify-center border-4 border-transparent bg-[#EBF0F5] px-6 text-center text-[21px] font-bold text-[#093A9C] hover:border-[#FAE115] hover:bg-white hover:px-4"
                        >
                            О бартере
                        </Link>
                    </li>
                    <li class="box-border h-32">
                        <Link
                            href="/rules.html"
                            class="flex h-full w-full cursor-pointer items-center justify-center border-4 border-transparent bg-[#EBF0F5] px-6 text-center text-[21px] font-bold text-[#093A9C] hover:border-[#FAE115] hover:bg-white hover:px-4"
                        >
                            О сервисе поиска вещей
                        </Link>
                    </li>
                    <li class="box-border h-32">
                        <Link
                            href="/rules.html"
                            class="flex h-full w-full cursor-pointer items-center justify-center border-4 border-transparent bg-[#EBF0F5] px-6 text-center text-[20px] font-bold text-[#093A9C] hover:border-[#FAE115] hover:bg-white hover:px-4"
                        >
                            О сервисе для краудфандинга
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
