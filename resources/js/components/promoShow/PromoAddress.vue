<script setup lang="ts">
import { ref } from 'vue';

const showAddress1 = ref(false);
const showAddress2 = ref(false);
const showAddress3 = ref(false);
const showAddress4 = ref(false);
</script>

<template>
    <div class="mt-8 rounded-3xl border bg-white py-4 shadow-2xl">
        <div class="relative overflow-hidden p-4">
            <a
                href="https://yandex.ru/maps/213/moscow/?utm_medium=mapframe&utm_source=maps"
                style="color: #eee; font-size: 12px; position: absolute; top: 0px"
                >Москва</a
            >
            <a
                href="https://yandex.ru/maps/213/moscow/?ll=37.643243%2C55.745426&rl=37.232355%2C55.867221&utm_medium=mapframe&utm_source=maps&z=12"
                style="color: #eee; font-size: 12px; position: absolute; top: 14px"
                >Москва — Яндекс Карты</a
            >
            <iframe
                src="https://yandex.ru/map-widget/v1/?ll=37.643243%2C55.745426&rl=37.232355%2C55.867221&z=12"
                class="promo-map-frame w-full rounded-md border"
                frameborder="1"
                allowfullscreen="true"
                style="position: relative"
            ></iframe>
        </div>
        <div class="h-px w-full bg-black/20"></div>
        <div class="p-4">
            <h3 class="text-2xl font-bold text-black/90">Контакты</h3>
            <div
                @click="showAddress1 = !showAddress1"
                class="promo-address-card mt-5 flex cursor-pointer items-center justify-between rounded-lg p-4 opacity-90"
            >
                <div>
                    <h3 class="text-lg font-bold">Адрес 1</h3>
                    <p>Россия, Москва, Калужско-Рижская линия, метро Ленинский проспект</p>
                </div>
                <svg
                    :class="['icon ml-4 h-6 w-6 stroke-4 transition-transform', showAddress1 ? 'rotate-180' : '']"
                    viewBox="0 0 1024 1024"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <path d="M903.232 256l56.768 50.432L512 768 64 306.432 120.768 256 512 659.072z" fill="currentColor" />
                </svg>
            </div>
            <div v-show="showAddress1" class="my-5 opacity-90">
                <div class="mb-2 flex gap-2">
                    <img src="/images/png/sale/time-icon.png" class="mt-2 h-5 w-5" alt="time" />
                    <div>
                        <h3 class="text-lg font-bold">График работы</h3>
                        <p>
                            Вс. -Чт. с 10:00 до 22:00,<br />
                            Пт. - Сб. с 10:00 до 23:00
                        </p>
                    </div>
                </div>
                <div class="mb-2 flex gap-2">
                    <img src="/images/png/sale/phone-icon.png" class="mt-2 h-5 w-5" alt="time" />
                    <div>
                        <h3 class="text-lg font-bold">Телефоны</h3>
                        <p>800-2000-600-700</p>
                    </div>
                </div>
                <div class="mb-2 flex gap-2">
                    <img src="/images/png/sale/link-icon.png" class="mt-2 h-5 w-5" alt="time" />
                    <div>
                        <h3 class="text-lg font-bold">Сайт</h3>
                        <a href="#" class="promo-address-link hover:underline">goo.gl/2cSMwl</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="h-px w-full bg-black/20"></div>
        <div class="px-4">
            <div
                @click="showAddress2 = !showAddress2"
                class="promo-address-card my-5 flex cursor-pointer items-center justify-between rounded-lg p-4 opacity-90"
            >
                <div>
                    <h3 class="text-lg font-bold">Адрес 2</h3>
                    <p>Россия, Москва, Калужско-Рижская линия, метро Ленинский проспект</p>
                </div>
                <svg
                    :class="['icon ml-4 h-6 w-6 stroke-4 transition-transform', showAddress2 ? 'rotate-180' : '']"
                    viewBox="0 0 1024 1024"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <path d="M903.232 256l56.768 50.432L512 768 64 306.432 120.768 256 512 659.072z" fill="currentColor" />
                </svg>
            </div>
            <div v-show="showAddress2" class="my-5 opacity-90">
                <div class="mb-2 flex gap-2">
                    <img src="/images/png/sale/time-icon.png" class="mt-2 h-5 w-5" alt="time" />
                    <div>
                        <h3 class="text-lg font-bold">График работы</h3>
                        <p>
                            Вс. -Чт. с 10:00 до 22:00,<br />
                            Пт. - Сб. с 10:00 до 23:00
                        </p>
                    </div>
                </div>
                <div class="mb-2 flex gap-2">
                    <img src="/images/png/sale/phone-icon.png" class="mt-2 h-5 w-5" alt="time" />
                    <div>
                        <h3 class="text-lg font-bold">Телефоны</h3>
                        <p>800-2000-600-700</p>
                    </div>
                </div>
                <div class="mb-2 flex gap-2">
                    <img src="/images/png/sale/link-icon.png" class="mt-2 h-5 w-5" alt="time" />
                    <div>
                        <h3 class="text-lg font-bold">Сайт</h3>
                        <a href="#" class="promo-address-link hover:underline">goo.gl/2cSMwl</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="h-px w-full bg-black/20"></div>
        <div class="px-4">
            <div
                @click="showAddress3 = !showAddress3"
                class="promo-address-card my-5 flex cursor-pointer items-center justify-between rounded-lg p-4 opacity-90"
            >
                <div>
                    <h3 class="text-lg font-bold">Адрес 3</h3>
                    <p>Россия, Москва, Калужско-Рижская линия, метро Ленинский проспект</p>
                </div>
                <svg
                    :class="['icon ml-4 h-6 w-6 stroke-4 transition-transform', showAddress3 ? 'rotate-180' : '']"
                    viewBox="0 0 1024 1024"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <path d="M903.232 256l56.768 50.432L512 768 64 306.432 120.768 256 512 659.072z" fill="currentColor" />
                </svg>
            </div>
            <div v-show="showAddress3" class="my-5 opacity-90">
                <div class="mb-2 flex gap-2">
                    <img src="/images/png/sale/time-icon.png" class="mt-2 h-5 w-5" alt="time" />
                    <div>
                        <h3 class="text-lg font-bold">График работы</h3>
                        <p>
                            Вс. -Чт. с 10:00 до 22:00,<br />
                            Пт. - Сб. с 10:00 до 23:00
                        </p>
                    </div>
                </div>
                <div class="mb-2 flex gap-2">
                    <img src="/images/png/sale/phone-icon.png" class="mt-2 h-5 w-5" alt="time" />
                    <div>
                        <h3 class="text-lg font-bold">Телефоны</h3>
                        <p>800-2000-600-700</p>
                    </div>
                </div>
                <div class="mb-2 flex gap-2">
                    <img src="/images/png/sale/link-icon.png" class="mt-2 h-5 w-5" alt="time" />
                    <div>
                        <h3 class="text-lg font-bold">Сайт</h3>
                        <a href="#" class="promo-address-link hover:underline">goo.gl/2cSMwl</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="h-px w-full bg-black/20"></div>
        <div class="px-4">
            <div
                @click="showAddress4 = !showAddress4"
                class="promo-address-card my-5 flex cursor-pointer items-center justify-between rounded-lg p-4 opacity-90"
            >
                <div>
                    <h3 class="text-lg font-bold">Адрес 4</h3>
                    <p>Россия, Москва, Калужско-Рижская линия, метро Ленинский проспект</p>
                </div>
                <svg
                    :class="['icon ml-4 h-6 w-6 stroke-4 transition-transform', showAddress4 ? 'rotate-180' : '']"
                    viewBox="0 0 1024 1024"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <path d="M903.232 256l56.768 50.432L512 768 64 306.432 120.768 256 512 659.072z" fill="currentColor" />
                </svg>
            </div>
            <div v-show="showAddress4" class="my-5 opacity-90">
                <div class="mb-2 flex gap-2">
                    <img src="/images/png/sale/time-icon.png" class="mt-2 h-5 w-5" alt="time" />
                    <div>
                        <h3 class="text-lg font-bold">График работы</h3>
                        <p>
                            Вс. -Чт. с 10:00 до 22:00,<br />
                            Пт. - Сб. с 10:00 до 23:00
                        </p>
                    </div>
                </div>
                <div class="mb-2 flex gap-2">
                    <img src="/images/png/sale/phone-icon.png" class="mt-2 h-5 w-5" alt="time" />
                    <div>
                        <h3 class="text-lg font-bold">Телефоны</h3>
                        <p>800-2000-600-700</p>
                    </div>
                </div>
                <div class="mb-2 flex gap-2">
                    <img src="/images/png/sale/link-icon.png" class="mt-2 h-5 w-5" alt="time" />
                    <div>
                        <h3 class="text-lg font-bold">Сайт</h3>
                        <a href="#" class="promo-address-link hover:underline">goo.gl/2cSMwl</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
.promo-map-frame {
    height: 200px;
}

.promo-address-card {
    background-color: #f2f2f2;
}

.promo-address-link {
    color: #1463b9;
}
</style>
