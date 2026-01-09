<script setup lang="ts">
import Footer from '@/components/Footer.vue';
import type { ContactModel } from '@/types';

const {contact} = defineProps<{
    contact: ContactModel;
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
            <div class="flex flex-col justify-center items-center mt-8 w-[1100px] 4xl:w-full">
                <h4 class="uppercase text-lg font-bold">GM справка</h4>
                <ul class="grid grid-cols-4 gap-4 mt-10 help_list">
                    <li
                        class="h-[128px] px-6 flex items-center justify-center bg-[#EBF0F5] border-[6px] border-transparent hover:bg-white hover:border-[#FAE115] hover:px-4 hover:cursor-pointer box-border"
                    >
                        <a href="/rules.html" class="text-[#093A9C] font-bold text-[21px] text-center">О GM1LP</a>
                    </li>
                    <li
                        class="h-[128px] px-6 flex items-center justify-center bg-[#EBF0F5] border-[6px] border-transparent hover:bg-white hover:border-[#FAE115] hover:px-4 hover:cursor-pointer box-border"
                    >
                        <a href="/help/user-agreement" class="text-[#093A9C] font-bold text-[20px] text-center">Пользовательское соглашение</a>
                    </li>
                    <li
                        class="h-[128px] px-6 flex items-center justify-center bg-[#EBF0F5] border-[6px] border-transparent hover:bg-white hover:border-[#FAE115] hover:px-4 hover:cursor-pointer box-border"
                    >
                        <a href="/rules.html" class="text-[#093A9C] font-bold text-[21px] text-center">Правила сообщества</a>
                    </li>
                    <li
                        class="h-[128px] px-6 flex items-center justify-center bg-[#EBF0F5] border-[6px] border-transparent hover:bg-white hover:border-[#FAE115] hover:px-4 hover:cursor-pointer box-border"
                    >
                        <a href="/rules.html" class="text-[#093A9C] font-bold text-[21px] text-center">Возможности</a>
                    </li>
                    <li
                        class="h-[128px] px-6 flex items-center justify-center bg-[#EBF0F5] border-[6px] border-transparent hover:bg-white hover:border-[#FAE115] hover:px-4 hover:cursor-pointer box-border"
                    >
                        <a href="/rules.html" class="text-[#093A9C] font-bold text-[21px] text-center">О сервисе скидок</a>
                    </li>
                    <li
                        class="h-[128px] px-6 flex items-center justify-center bg-[#EBF0F5] border-[6px] border-transparent hover:bg-white hover:border-[#FAE115] hover:px-4 hover:cursor-pointer box-border"
                    >
                        <a href="/rules.html" class="text-[#093A9C] font-bold text-[21px] text-center">О сервисе конкурсов</a>
                    </li>
                    <li
                        class="h-[128px] px-6 flex items-center justify-center bg-[#EBF0F5] border-[6px] border-transparent hover:bg-white hover:border-[#FAE115] hover:px-4 hover:cursor-pointer box-border"
                    >
                        <a href="/rules.html" class="text-[#093A9C] font-bold text-[21px] text-center">О сервисе заданий</a>
                    </li>
                    <li
                        class="h-[128px] px-6 flex items-center justify-center bg-[#EBF0F5] border-[6px] border-transparent hover:bg-white hover:border-[#FAE115] hover:px-4 hover:cursor-pointer box-border"
                    >
                        <a href="/rules.html" class="text-[#093A9C] font-bold text-[20px] text-center">О сервисе кредитования, P2P</a>
                    </li>
                    <li
                        class="h-[128px] px-6 flex items-center justify-center bg-[#EBF0F5] border-[6px] border-transparent hover:bg-white hover:border-[#FAE115] hover:px-4 hover:cursor-pointer box-border"
                    >
                        <a href="/rules.html" class="text-[#093A9C] font-bold text-[21px] text-center">Черный список</a>
                    </li>
                    <li
                        class="h-[128px] px-6 flex items-center justify-center bg-[#EBF0F5] border-[6px] border-transparent hover:bg-white hover:border-[#FAE115] hover:px-4 hover:cursor-pointer box-border"
                    >
                        <a href="/rules.html" class="text-[#093A9C] font-bold text-[21px] text-center">О бартере</a>
                    </li>
                    <li
                        class="h-[128px] px-6 flex items-center justify-center bg-[#EBF0F5] border-[6px] border-transparent hover:bg-white hover:border-[#FAE115] hover:px-4 hover:cursor-pointer box-border"
                    >
                        <a href="/rules.html" class="text-[#093A9C] font-bold text-[21px] text-center">О сервисе поиска вещей</a>
                    </li>
                    <li
                        class="h-[128px] px-6 flex items-center justify-center bg-[#EBF0F5] border-[6px] border-transparent hover:bg-white hover:border-[#FAE115] hover:px-4 hover:cursor-pointer box-border"
                    >
                        <a href="/rules.html" class="text-[#093A9C] font-bold text-[20px] text-center">О сервисе для краудфандинга</a>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <Footer :contact="contact"></Footer>
</template>

<style scoped>
.help_list li {
    min-width: 0 !important;
    flex-wrap: wrap !important;
    align-items: center !important;
    align-content: center !important;
}

.help_list a {
    display: block !important;
    width: 100% !important;
    max-width: 100% !important;
    min-width: 0 !important;
    word-wrap: break-word !important;
    overflow-wrap: break-word !important;
    word-break: break-word !important;
    white-space: normal !important;
    line-height: 1.2 !important;
    hyphens: auto !important;
    flex-shrink: 1 !important;
    text-align: center !important;
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


