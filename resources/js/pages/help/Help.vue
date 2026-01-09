<script setup lang="ts">

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
            <div class="flex flex-col justify-center items-center mt-8 2xl:w-full">
                <h4 class="uppercase text-lg font-bold">GM справка</h4>
                <ul class="grid grid-cols-4 gap-4 mt-10 help_list">
                    <li
                        class="h-[128px] px-6 flex items-center justify-center bg-[#EBF0F5] hover:bg-white hover:border-[6px] hover:border-[#FAE115] hover:px-4 hover:cursor-pointer"
                    >
                        <a href="/rules.html" class="text-[#093A9C] font-bold text-[21px] text-center">О GM1LP</a>
                    </li>
                    <li
                        class="h-[128px] px-6 flex items-center justify-center bg-[#EBF0F5] hover:bg-white hover:border-[6px] hover:border-[#FAE115] hover:px-4 hover:cursor-pointer"
                    >
                        <a href="/rules.html" class="text-[#093A9C] font-bold text-[21px] text-center">Пользовательское соглашение</a>
                    </li>
                    <li
                        class="h-[128px] px-6 flex items-center justify-center bg-[#EBF0F5] hover:bg-white hover:border-[6px] hover:border-[#FAE115] hover:px-4 hover:cursor-pointer"
                    >
                        <a href="/rules.html" class="text-[#093A9C] font-bold text-[21px] text-center">Правила сообщества</a>
                    </li>
                    <li
                        class="h-[128px] px-6 flex items-center justify-center bg-[#EBF0F5] hover:bg-white hover:border-[6px] hover:border-[#FAE115] hover:px-4 hover:cursor-pointer"
                    >
                        <a href="/rules.html" class="text-[#093A9C] font-bold text-[21px] text-center">Возможности</a>
                    </li>
                    <li
                        class="h-[128px] px-6 flex items-center justify-center bg-[#EBF0F5] hover:bg-white hover:border-[6px] hover:border-[#FAE115] hover:px-4 hover:cursor-pointer"
                    >
                        <a href="/rules.html" class="text-[#093A9C] font-bold text-[21px] text-center">О сервисе скидок</a>
                    </li>
                    <li
                        class="h-[128px] px-6 flex items-center justify-center bg-[#EBF0F5] hover:bg-white hover:border-[6px] hover:border-[#FAE115] hover:px-4 hover:cursor-pointer"
                    >
                        <a href="/rules.html" class="text-[#093A9C] font-bold text-[21px] text-center">О сервисе конкурсов</a>
                    </li>
                    <li
                        class="h-[128px] px-6 flex items-center justify-center bg-[#EBF0F5] hover:bg-white hover:border-[6px] hover:border-[#FAE115] hover:px-4 hover:cursor-pointer"
                    >
                        <a href="/rules.html" class="text-[#093A9C] font-bold text-[21px] text-center">О сервисе заданий</a>
                    </li>
                    <li
                        class="h-[128px] px-6 flex items-center justify-center bg-[#EBF0F5] hover:bg-white hover:border-[6px] hover:border-[#FAE115] hover:px-4 hover:cursor-pointer"
                    >
                        <a href="/rules.html" class="text-[#093A9C] font-bold text-[21px] text-center">О сервисе кредитования, P2P</a>
                    </li>
                    <li
                        class="h-[128px] px-6 flex items-center justify-center bg-[#EBF0F5] hover:bg-white hover:border-[6px] hover:border-[#FAE115] hover:px-4 hover:cursor-pointer"
                    >
                        <a href="/rules.html" class="text-[#093A9C] font-bold text-[21px] text-center">Черный список</a>
                    </li>
                    <li
                        class="h-[128px] px-6 flex items-center justify-center bg-[#EBF0F5] hover:bg-white hover:border-[6px] hover:border-[#FAE115] hover:px-4 hover:cursor-pointer"
                    >
                        <a href="/rules.html" class="text-[#093A9C] font-bold text-[21px] text-center">О бартере</a>
                    </li>
                    <li
                        class="h-[128px] px-6 flex items-center justify-center bg-[#EBF0F5] hover:bg-white hover:border-[6px] hover:border-[#FAE115] hover:px-4 hover:cursor-pointer"
                    >
                        <a href="/rules.html" class="text-[#093A9C] font-bold text-[21px] text-center">О сервисе поиска вещей</a>
                    </li>
                    <li
                        class="h-[128px] px-6 flex items-center justify-center bg-[#EBF0F5] hover:bg-white hover:border-[6px] hover:border-[#FAE115] hover:px-4 hover:cursor-pointer"
                    >
                        <a href="/rules.html" class="text-[#093A9C] font-bold text-[21px] text-center">О сервисе для краудфандинга</a>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <footer class="flex justify-center bg-[#1f2339] py-10">
        <div class="w-[1200px] 2xl:w-full">
            <div class="flex items-start gap-10 md:ml-4 md:gap-2 2xl:gap-5 foot_main help_footer_top">
                <img src="/assets/png/logo.png" alt="Логотип" class="w-8 h-8" />
                <ul class="flex justify-between w-full foot_block help_footer_top_list">
                    <li>
                        <h2 class="text-lg font-bold text-white opacity-70 md:mt-4">Общие сведения</h2>
                        <ul class="text-white text-base mt-5">
                            <li>
                                <a href="/register.html" class="hover:border-b-[1px] hover:border-white">Зарегистрироваться</a>
                            </li>
                            <li>
                                <a href="#" class="hover:border-b-[1px] hover:border-white">Справка</a>
                            </li>
                            <li>
                                <a href="#" class="hover:border-b-[1px] hover:border-white">О компании</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <h2 class="text-lg font-bold text-white opacity-70 md:mt-4">Просмотр информации</h2>
                        <ul class="text-white text-base mt-5">
                            <li>
                                <a href="#" class="hover:border-b-[1px] hover:border-white">Вакансии</a>
                            </li>
                            <li>
                                <a href="#" class="hover:border-b-[1px] hover:border-white">Заработная плата</a>
                            </li>
                            <li>
                                <a href="#" class="hover:border-b-[1px] hover:border-white">Реферальная программа</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <h2 class="text-lg font-bold text-white opacity-70 md:mt-4">Решение для бизнеса</h2>
                        <ul class="text-white text-base mt-5">
                            <li>
                                <a href="#" class="hover:border-b-[1px] hover:border-white">Решение для найма</a>
                            </li>
                            <li>
                                <a href="#" class="hover:border-b-[1px] hover:border-white">Маркетинг</a>
                            </li>
                            <li>
                                <a href="#" class="hover:border-b-[1px] hover:border-white">Продажи</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <h2 class="text-lg font-bold text-white opacity-70 md:mt-4">Каталоги</h2>
                        <ul class="text-white text-base mt-5">
                            <li>
                                <a href="#" class="hover:border-b-[1px] hover:border-white">Участники</a>
                            </li>
                            <li>
                                <a href="#" class="hover:border-b-[1px] hover:border-white">Компании</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="w-full h-[1px] bg-white opacity-20 mt-12 mb-5"></div>
            <ul class="flex gap-10 ml-[70px] md:ml-4 md:gap-2 help_footer_bottom">
                <li>
                    <a href="#" class="text-white opacity-70 hover:opacity-100">О компании</a>
                </li>
                <li>
                    <a href="#" class="text-white opacity-70 hover:opacity-100">Пользовательское соглашение</a>
                </li>
                <li>
                    <a href="#" class="text-white opacity-70 hover:opacity-100">Политика конфиденциальности</a>
                </li>
                <li>
                    <a href="#" class="text-white opacity-70 hover:opacity-100">Контакты</a>
                </li>
            </ul>
        </div>
    </footer>
</template>

<style scoped>
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


