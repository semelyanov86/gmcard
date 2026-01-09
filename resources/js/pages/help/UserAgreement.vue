<script setup lang="ts">
import '../../../css/internal/output.css';
import Footer from '@/components/Footer.vue';
import type { ContactModel } from '@/types';

const { contact } = defineProps<{
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
            <div class="flex flex-col justify-center items-center mt-8 w-[1200px] 2xl:w-full">
                <h4 class="uppercase text-lg font-bold">GM справка</h4>
                <div class="flex w-full mt-10 gap-8 md:flex-col md:items-center px-4">
                    <div class="w-full">
                        <h2 class="text-4xl text-[#093A9C] text-center">Условия пользования</h2>
                        <p class="mt-6 text-start">
                            Задача организации, в особенности же постоянное информационно-пропагандистское обеспечение нашей деятельности позволяет
                            выполнять важные задания по разработке существенных финансовых и административных условий. С другой стороны рамки и место
                            обучения кадров требуют от нас анализа систем массового участия.
                        </p>
                        <p class="mt-6 text-start">
                            Повседневная практика показывает, что дальнейшее развитие различных форм деятельности играет важную роль в формировании
                            существенных финансовых и административных условий. Значимость этих проблем настолько очевидна, что сложившаяся структура
                            организации требуют определения и уточнения модели развития. Идейные соображения высшего порядка, а также консультация с
                            широким активом способствует подготовки и реализации дальнейших направлений развития. Идейные соображения высшего порядка, а
                            также дальнейшее развитие различных форм деятельности обеспечивает широкому кругу (специалистов) участие в формировании
                            систем массового участия. С другой стороны укрепление и развитие структуры обеспечивает широкому кругу (специалистов) участие
                            в формировании систем массового участия.
                        </p>
                        <p class="mt-6 text-start">
                            Значимость этих проблем настолько очевидна, что укрепление и развитие структуры обеспечивает широкому кругу (специалистов)
                            участие в формировании системы обучения кадров, соответствует насущным потребностям. Не следует, однако забывать, что
                            сложившаяся структура организации обеспечивает широкому кругу (специалистов) участие в формировании позиций, занимаемых
                            участниками в отношении поставленных задач. Равным образом новая модель организационной деятельности способствует подготовки и
                            реализации модели развития. Идейные соображения высшего порядка, а также реализация намеченных плановых заданий обеспечивает
                            широкому кругу (специалистов) участие в формировании модели развития. Товарищи! постоянный количественный рост и сфера нашей
                            активности влечет за собой процесс внедрения и модернизации дальнейших направлений развития.
                        </p>
                    </div>
                    <ul class="overflow-y-scroll scroll-m-0 max-h-[650px] h-full w-[400px] md:w-full">
                        <li
                            class="w-[280px] md:w-full min-h-[128px] mt-2 px-6 flex items-center justify-center text-[#093A9C] font-bold text-[21px] text-center bg-[#EBF0F5] hover:bg-white hover:border-[6px] hover:border-[#FAE115] hover:px-4 hover:cursor-pointer"
                        >
                            О GM1LP
                        </li>
                        <li
                            class="w-[280px] md:w-full min-h-[128px] mt-2 px-6 flex items-center justify-center text-[#093A9C] font-bold text-[21px] text-center bg-[#EBF0F5] hover:bg-white hover:border-[6px] hover:border-[#FAE115] hover:px-4 hover:cursor-pointer activate"
                        >
                            Пользовательское соглашение
                        </li>
                        <li
                            class="w-[280px] md:w-full min-h-[128px] mt-2 px-6 flex items-center justify-center text-[#093A9C] font-bold text-[21px] text-center bg-[#EBF0F5] hover:bg-white hover:border-[6px] hover:border-[#FAE115] hover:px-4 hover:cursor-pointer"
                        >
                            Правила сообщества
                        </li>
                        <li
                            class="w-[280px] md:w-full min-h-[128px] mt-2 px-6 flex items-center justify-center text-[#093A9C] font-bold text-[21px] text-center bg-[#EBF0F5] hover:bg-white hover:border-[6px] hover:border-[#FAE115] hover:px-4 hover:cursor-pointer"
                        >
                            Возможности
                        </li>
                        <li
                            class="w-[280px] md:w-full min-h-[128px] mt-2 px-6 flex items-center justify-center text-[#093A9C] font-bold text-[21px] text-center bg-[#EBF0F5] hover:bg-white hover:border-[6px] hover:border-[#FAE115] hover:px-4 hover:cursor-pointer"
                        >
                            О сервисе скидок
                        </li>
                        <li
                            class="w-[280px] md:w-full min-h-[128px] mt-2 px-6 flex items-center justify-center text-[#093A9C] font-bold text-[21px] text-center bg-[#EBF0F5] hover:bg-white hover:border-[6px] hover:border-[#FAE115] hover:px-4 hover:cursor-pointer"
                        >
                            О сервисе конкурсов
                        </li>
                        <li
                            class="w-[280px] md:w-full min-h-[128px] mt-2 px-6 flex items-center justify-center text-[#093A9C] font-bold text-[21px] text-center bg-[#EBF0F5] hover:bg-white hover:border-[6px] hover:border-[#FAE115] hover:px-4 hover:cursor-pointer"
                        >
                            О сервисе заданий
                        </li>
                        <li
                            class="w-[280px] md:w-full min-h-[128px] mt-2 px-6 flex items-center justify-center text-[#093A9C] font-bold text-[21px] text-center bg-[#EBF0F5] hover:bg-white hover:border-[6px] hover:border-[#FAE115] hover:px-4 hover:cursor-pointer"
                        >
                            О сервисе кредитования, P2P
                        </li>
                        <li
                            class="w-[280px] md:w-full min-h-[128px] mt-2 px-6 flex items-center justify-center text-[#093A9C] font-bold text-[21px] text-center bg-[#EBF0F5] hover:bg-white hover:border-[6px] hover:border-[#FAE115] hover:px-4 hover:cursor-pointer"
                        >
                            Черный список
                        </li>
                        <li
                            class="w-[280px] md:w-full min-h-[128px] mt-2 px-6 flex items-center justify-center text-[#093A9C] font-bold text-[21px] text-center bg-[#EBF0F5] hover:bg-white hover:border-[6px] hover:border-[#FAE115] hover:px-4 hover:cursor-pointer"
                        >
                            О бартере
                        </li>
                        <li
                            class="w-[280px] md:w-full min-h-[128px] mt-2 px-6 flex items-center justify-center text-[#093A9C] font-bold text-[21px] text-center bg-[#EBF0F5] hover:bg-white hover:border-[6px] hover:border-[#FAE115] hover:px-4 hover:cursor-pointer"
                        >
                            О сервисе поиска вещей
                        </li>
                        <li
                            class="w-[280px] md:w-full min-h-[128px] mt-2 px-6 flex items-center justify-center text-[#093A9C] font-bold text-[21px] text-center bg-[#EBF0F5] hover:bg-white hover:border-[6px] hover:border-[#FAE115] hover:px-4 hover:cursor-pointer"
                        >
                            О сервисе для краудфандинга
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <Footer :contact="contact" />
</template>


