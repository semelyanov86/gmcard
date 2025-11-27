<script setup lang="ts">
import CloseSmallIcon from '@/components/primitives/icons/CloseSmallIcon.vue';
import { Modal } from '@inertiaui/modal-vue';
</script>

<template>
    <Modal :close-button="false" padding-classes="p-0" panel-classes="bg-transparent shadow-none" max-width="2xl" v-slot="{ close }">
        <div class="bgSh relative rounded-lg bg-white shadow dark:bg-gray-700">
            <div class="flex items-start justify-between rounded-t border-b bg-blue-700 p-4 dark:border-gray-600">
                <h3 class="text-xl font-semibold text-white">У меня нет фото, что делать?</h3>
                <button
                    type="button"
                    class="ml-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-gray-200 hover:bg-gray-200 hover:text-gray-900"
                    @click="close"
                >
                    <CloseSmallIcon />
                    <span class="sr-only">Закрыть модалку</span>
                </button>
            </div>
            <div class="p-3 sm:p-6">
                <div class="shadoFi space-y-6 bg-white p-3 sm:p-6">
                    <p class="all_text text-center text-base leading-relaxed font-black text-gray-500">
                        Вы можете воспользоваться сервисом «Google Картинки» и поискать изображения там. Важным параметром является то, что
                        изображение должно быть не менее 800x600 пикселей.
                    </p>
                    <p class="text-center text-lg font-black text-gray-900">Ниже мы сделали несколько примеров:</p>
                    <div class="mx-4 flex flex-wrap justify-center gap-10 sm:mx-8">
                        <ul class="space-y-2 text-center">
                            <li><a class="border-b border-dashed border-blue-700 text-blue-700 hover:border-solid" href="#">Запчасти</a></li>
                            <li>
                                <a class="border-b border-dashed border-blue-700 text-blue-700 hover:border-solid" href="#">Юридическая помощь</a>
                            </li>
                            <li><a class="border-b border-dashed border-blue-700 text-blue-700 hover:border-solid" href="#">Мебель</a></li>
                            <li><a class="border-b border-dashed border-blue-700 text-blue-700 hover:border-solid" href="#">Шугаринг</a></li>
                        </ul>
                        <ul class="space-y-2 text-center">
                            <li><a class="border-b border-dashed border-blue-700 text-blue-700 hover:border-solid" href="#">Одежда</a></li>
                            <li><a class="border-b border-dashed border-blue-700 text-blue-700 hover:border-solid" href="#">SPA процедуры</a></li>
                            <li><a class="border-b border-dashed border-blue-700 text-blue-700 hover:border-solid" href="#">Сауны</a></li>
                        </ul>
                        <ul class="space-y-2 text-center">
                            <li>
                                <a class="border-b border-dashed border-blue-700 text-blue-700 hover:border-solid" href="#">Ремонт компьютеров</a>
                            </li>
                            <li><a class="border-b border-dashed border-blue-700 text-blue-700 hover:border-solid" href="#">Стоматология</a></li>
                            <li><a class="border-b border-dashed border-blue-700 text-blue-700 hover:border-solid" href="#">Маникюр</a></li>
                        </ul>
                    </div>
                    <p class="mx-4 text-center text-sm text-gray-700 sm:mx-12">
                        Вашего товара нет в примерах?
                        <br />
                        Ничего страшного, просто откройте любой пример и измените ключевое слово запроса или нажмите на кнопку ниже.
                    </p>
                    <div class="flex items-center justify-center">
                        <button
                            type="button"
                            @click="close"
                            class="rounded-lg bg-blue-700 px-5 py-2.5 text-base font-medium text-white hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 focus:outline-none"
                        >
                            Нет примеров
                        </button>
                    </div>
                    <p class="mx-4 text-center text-sm text-gray-900 sm:mx-12">
                        <span class="font-black text-black">Остались вопросы?</span>
                        Посетите наш раздел
                        <a class="text-blue-700 hover:underline" href="/help.html">«GM Справка»</a>
                        в котором можно найти полезную информацию или увидеть задачи, над которыми мы работаем сейчас.
                    </p>
                </div>
            </div>
        </div>
    </Modal>
</template>
