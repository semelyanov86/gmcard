<script setup lang="ts">
defineProps<{
    isOpen: boolean;
}>();

defineEmits<{
    close: [];
}>();
</script>

<template>
    <!-- Modal -->
    <div 
        v-show="isOpen" 
        id="staticModal" 
        data-modal-backdrop="static" 
        tabindex="-1" 
        class="fixed top-0 left-0 right-0 z-50 w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full justify-center items-center flex" 
        aria-modal="true" 
        role="dialog" 
        style="background-color: rgba(0, 0, 0, 0.5);" 
        @click="$emit('close')"
    >
        <div @click.stop class="relative w-full max-w-2xl max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 bgSh">
                <div class="flex items-start justify-between bg-[#0066cb] p-4 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-white dark:text-white">
                        У меня нет фото, что делать?
                    </h3>
                    <button 
                        type="button" 
                        @click="$emit('close')" 
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    >
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <div class="p-3 sm:p-6">
                    <div class="bg-white p-3 sm:p-6 space-y-6 shadoFi">
                        <p class="text-base font-black text-center leading-relaxed text-gray-500 dark:text-gray-400 all_text">
                            Вы можете воспользоваться сервисом "Google Картинки" и поискать изображения там. Важным параметром является то, что изображение должно быть не менее 800x600 пикселей.
                        </p>
                        <p class="text-center leading-relaxed text-lg font-black dark:text-gray-400">
                            Ниже мы сделали несколко примеров:
                        </p>
                        <div class="flex flex-wrap justify-between mx-8 sm:mx-12">
                            <ul>
                                <li><a class="text-[#0066cb] border-b border-[#0066cb] border-dashed hover:border-solid" target="_blank" href="https://ru.freepik.com/search?format=search&query=%D0%B7%D0%B0%D0%BF%D1%87%D0%B0%D1%81%D1%82%D0%B8">Запчасти</a></li>
                                <li><a class="text-[#0066cb] border-b border-[#0066cb] border-dashed hover:border-solid" target="_blank" href="https://ru.freepik.com/search?format=search&query=%D0%AE%D1%80%D0%B8%D0%B4%D0%B8%D1%87%D0%B5%D1%81%D0%BA%D0%B0%D1%8F%20%D0%BF%D0%BE%D0%BC%D0%BE%D1%89%D1%8C">Юридическая помощь</a></li>
                                <li><a class="text-[#0066cb] border-b border-[#0066cb] border-dashed hover:border-solid" target="_blank" href="https://ru.freepik.com/search?format=search&query=%D0%9C%D0%B5%D0%B1%D0%B5%D0%BB%D1%8C">Мебель</a></li>
                                <li><a class="text-[#0066cb] border-b border-[#0066cb] border-dashed hover:border-solid" target="_blank" href="https://ru.freepik.com/search?format=search&query=%D0%A8%D1%83%D0%B3%D0%B0%D1%80%D0%B8%D0%BD%D0%B3">Шугаринг</a></li>
                            </ul>
                            <ul>
                                <li><a class="text-[#0066cb] border-b border-[#0066cb] border-dashed hover:border-solid" target="_blank" href="https://ru.freepik.com/search?format=search&query=%D0%9E%D0%B4%D0%B5%D0%B6%D0%B4%D0%B0">Одежда</a></li>
                                <li><a class="text-[#0066cb] border-b border-[#0066cb] border-dashed hover:border-solid" target="_blank" href="https://ru.freepik.com/search?format=search&query=SPA%20%D0%BF%D1%80%D0%BE%D1%86%D0%B5%D0%B4%D1%83%D1%80%D1%8B">SPA процедуры</a></li>
                                <li><a class="text-[#0066cb] border-b border-[#0066cb] border-dashed hover:border-solid" target="_blank" href="https://ru.freepik.com/search?format=search&query=%D1%81%D0%B0%D1%83%D0%BD%D1%8B">Сауны</a></li>
                            </ul>
                            <ul>
                                <li><a class="text-[#0066cb] border-b border-[#0066cb] border-dashed hover:border-solid" target="_blank" href="https://ru.freepik.com/search?format=search&query=%D0%A0%D0%B5%D0%BC%D0%BE%D0%BD%D1%82%20%D0%BA%D0%BE%D0%BC%D0%BF%D1%8C%D1%8E%D1%82%D0%B5%D1%80%D0%BE%D0%B2">Ремонт компьютеров</a></li>
                                <li><a class="text-[#0066cb] border-b border-[#0066cb] border-dashed hover:border-solid" target="_blank" href="https://ru.freepik.com/search?format=search&query=%D0%A1%D1%82%D0%BE%D0%BC%D0%B0%D1%82%D0%BE%D0%BB%D0%BE%D0%B3%D0%B8%D1%8F">Стоматология</a></li>
                                <li><a class="text-[#0066cb] border-b border-[#0066cb] border-dashed hover:border-solid" target="_blank" href="https://ru.freepik.com/search?format=search&query=%D0%9C%D0%B0%D0%BD%D0%B8%D0%BA%D1%8E%D1%80">Маникюр</a></li>
                            </ul>
                        </div>
                        <p class="text-sm text-center  leading-relaxed text-gray-700 dark:text-gray-400 mx-1 sm:mx-12">Вашего товара нет в примерах? <br> Ничего страшного, просто откройте любой пример и измените ключевое слово запроса или нажмите на кнопку ниже.</p>
                        <div class="flex items-center justify-center">
                            <button @click="$emit('close')" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-base px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Нет примеров</button>
                        </div>
                        <p class="text-sm text-center leading-relaxed text-black dark:text-gray-400 mx-1 sm:mx-12"><span class="font-black text-black">Остались вопросы?</span> Посетите наш раздел <a class="text-[#0066cb] hover:underline" href="/help.html">'GM Справка'</a> в котором можно найти различную полезную информацию или же увидеть те задачи, над которыми мы работаем в данный момент.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

