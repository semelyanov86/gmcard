<script setup lang="ts">
import { ref } from 'vue';

const showAddress1 = ref(false);
const showAddress2 = ref(false);
const showAddress3 = ref(false);
const showAddress4 = ref(false);
</script>

<template>
    <div class="bg-white py-4 rounded-3xl shadow-2xl border mt-8">
        <div class="relative overflow-hidden p-4">
            <a href="https://yandex.ru/maps/213/moscow/?utm_medium=mapframe&utm_source=maps" style="color:#eee;font-size:12px;position:absolute;top:0px;">Москва</a>
            <a href="https://yandex.ru/maps/213/moscow/?ll=37.643243%2C55.745426&rl=37.232355%2C55.867221&utm_medium=mapframe&utm_source=maps&z=12" style="color:#eee;font-size:12px;position:absolute;top:14px;">Москва — Яндекс Карты</a>
            <iframe src="https://yandex.ru/map-widget/v1/?ll=37.643243%2C55.745426&rl=37.232355%2C55.867221&z=12" class="w-full h-[200px] border rounded-md" frameborder="1" allowfullscreen="true" style="position:relative;"></iframe>
        </div>
        <div class="w-full h-[1px] bg-black/20"></div>
        <div class="p-4">
            <h3 class="text-2xl font-bold text-black/90">Контакты</h3>
            <div @click="showAddress1 = !showAddress1" class="bg-[#F2F2F2] p-4 flex items-center rounded-lg opacity-90 mt-5 cursor-pointer justify-between">
                <div>
                    <h3 class="font-bold text-lg">Адрес 1</h3>
                    <p>Россия, Москва, Калужско-Рижская линия, метро Ленинский проспект</p>
                </div>
                <svg :class="['w-6 h-6 ml-4 stroke-4 icon transition-transform', showAddress1 ? 'rotate-180' : '']" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg">
                    <path d="M903.232 256l56.768 50.432L512 768 64 306.432 120.768 256 512 659.072z" fill="currentColor" />
                </svg>
            </div>
            <div v-show="showAddress1" class="opacity-90 my-5">
                <div class="flex gap-2 mb-2">
                    <img src="/images/png/sale/time-icon.png" class="w-5 h-5 mt-2" alt="time" />
                    <div>
                        <h3 class="text-lg font-bold">График работы</h3>
                        <p>
                            Вс. -Чт. с 10:00 до 22:00,<br />
                            Пт. - Сб. с 10:00 до 23:00
                        </p>
                    </div>
                </div>
                <div class="flex gap-2 mb-2">
                    <img src="/images/png/sale/phone-icon.png" class="w-5 h-5 mt-2" alt="time" />
                    <div>
                        <h3 class="text-lg font-bold">Телефоны</h3>
                        <p>800-2000-600-700</p>
                    </div>
                </div>
                <div class="flex gap-2 mb-2">
                    <img src="/images/png/sale/link-icon.png" class="w-5 h-5 mt-2" alt="time" />
                    <div>
                        <h3 class="text-lg font-bold">Сайт</h3>
                        <a href="#" class="text-[#1463B9] hover:underline">goo.gl/2cSMwl</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full h-[1px] bg-black/20"></div>
        <div class="px-4">
            <div @click="showAddress2 = !showAddress2" class="bg-[#F2F2F2] p-4 flex items-center rounded-lg opacity-90 my-5 cursor-pointer justify-between">
                <div>
                    <h3 class="font-bold text-lg">Адрес 2</h3>
                    <p>Россия, Москва, Калужско-Рижская линия, метро Ленинский проспект</p>
                </div>
                <svg :class="['w-6 h-6 ml-4 stroke-4 icon transition-transform', showAddress2 ? 'rotate-180' : '']" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg">
                    <path d="M903.232 256l56.768 50.432L512 768 64 306.432 120.768 256 512 659.072z" fill="currentColor" />
                </svg>
            </div>
            <div v-show="showAddress2" class="opacity-90 my-5">
                <div class="flex gap-2 mb-2">
                    <img src="/images/png/sale/time-icon.png" class="w-5 h-5 mt-2" alt="time" />
                    <div>
                        <h3 class="text-lg font-bold">График работы</h3>
                        <p>
                            Вс. -Чт. с 10:00 до 22:00,<br />
                            Пт. - Сб. с 10:00 до 23:00
                        </p>
                    </div>
                </div>
                <div class="flex gap-2 mb-2">
                    <img src="/images/png/sale/phone-icon.png" class="w-5 h-5 mt-2" alt="time" />
                    <div>
                        <h3 class="text-lg font-bold">Телефоны</h3>
                        <p>800-2000-600-700</p>
                    </div>
                </div>
                <div class="flex gap-2 mb-2">
                    <img src="/images/png/sale/link-icon.png" class="w-5 h-5 mt-2" alt="time" />
                    <div>
                        <h3 class="text-lg font-bold">Сайт</h3>
                        <a href="#" class="text-[#1463B9] hover:underline">goo.gl/2cSMwl</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full h-[1px] bg-black/20"></div>
        <div class="px-4">
            <div @click="showAddress3 = !showAddress3" class="bg-[#F2F2F2] p-4 flex items-center rounded-lg opacity-90 my-5 cursor-pointer justify-between">
                <div>
                    <h3 class="font-bold text-lg">Адрес 3</h3>
                    <p>Россия, Москва, Калужско-Рижская линия, метро Ленинский проспект</p>
                </div>
                <svg :class="['w-6 h-6 ml-4 stroke-4 icon transition-transform', showAddress3 ? 'rotate-180' : '']" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg">
                    <path d="M903.232 256l56.768 50.432L512 768 64 306.432 120.768 256 512 659.072z" fill="currentColor" />
                </svg>
            </div>
            <div v-show="showAddress3" class="opacity-90 my-5">
                <div class="flex gap-2 mb-2">
                    <img src="/images/png/sale/time-icon.png" class="w-5 h-5 mt-2" alt="time" />
                    <div>
                        <h3 class="text-lg font-bold">График работы</h3>
                        <p>
                            Вс. -Чт. с 10:00 до 22:00,<br />
                            Пт. - Сб. с 10:00 до 23:00
                        </p>
                    </div>
                </div>
                <div class="flex gap-2 mb-2">
                    <img src="/images/png/sale/phone-icon.png" class="w-5 h-5 mt-2" alt="time" />
                    <div>
                        <h3 class="text-lg font-bold">Телефоны</h3>
                        <p>800-2000-600-700</p>
                    </div>
                </div>
                <div class="flex gap-2 mb-2">
                    <img src="/images/png/sale/link-icon.png" class="w-5 h-5 mt-2" alt="time" />
                    <div>
                        <h3 class="text-lg font-bold">Сайт</h3>
                        <a href="#" class="text-[#1463B9] hover:underline">goo.gl/2cSMwl</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full h-[1px] bg-black/20"></div>
        <div class="px-4">
            <div @click="showAddress4 = !showAddress4" class="bg-[#F2F2F2] p-4 flex items-center rounded-lg opacity-90 my-5 cursor-pointer justify-between">
                <div>
                    <h3 class="font-bold text-lg">Адрес 4</h3>
                    <p>Россия, Москва, Калужско-Рижская линия, метро Ленинский проспект</p>
                </div>
                <svg :class="['w-6 h-6 ml-4 stroke-4 icon transition-transform', showAddress4 ? 'rotate-180' : '']" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg">
                    <path d="M903.232 256l56.768 50.432L512 768 64 306.432 120.768 256 512 659.072z" fill="currentColor" />
                </svg>
            </div>
            <div v-show="showAddress4" class="opacity-90 my-5">
                <div class="flex gap-2 mb-2">
                    <img src="/images/png/sale/time-icon.png" class="w-5 h-5 mt-2" alt="time" />
                    <div>
                        <h3 class="text-lg font-bold">График работы</h3>
                        <p>
                            Вс. -Чт. с 10:00 до 22:00,<br />
                            Пт. - Сб. с 10:00 до 23:00
                        </p>
                    </div>
                </div>
                <div class="flex gap-2 mb-2">
                    <img src="/images/png/sale/phone-icon.png" class="w-5 h-5 mt-2" alt="time" />
                    <div>
                        <h3 class="text-lg font-bold">Телефоны</h3>
                        <p>800-2000-600-700</p>
                    </div>
                </div>
                <div class="flex gap-2 mb-2">
                    <img src="/images/png/sale/link-icon.png" class="w-5 h-5 mt-2" alt="time" />
                    <div>
                        <h3 class="text-lg font-bold">Сайт</h3>
                        <a href="#" class="text-[#1463B9] hover:underline">goo.gl/2cSMwl</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

