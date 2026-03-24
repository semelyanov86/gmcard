<script setup lang="ts">
import { ref } from 'vue';
import { PromoAddressItem } from '@/types/promo/PromoAddressItem';

const props = defineProps<{
    addresses?: PromoAddressItem[];
}>();

const openedIds = ref<number[]>([]);

const toggleAddress = (id: number) => {
    if (openedIds.value.includes(id)) {
        openedIds.value = openedIds.value.filter((openedId) => openedId !== id);
        return;
    }

    openedIds.value = [...openedIds.value, id];
};

const isOpened = (id: number) => openedIds.value.includes(id);
</script>

<template>
    <div class="mt-8 rounded-3xl border bg-white py-4 shadow-2xl">
        <div class="relative overflow-hidden p-4">
            <a href="https://yandex.ru/maps/213/moscow/?utm_medium=mapframe&utm_source=maps" style="color: #eee; font-size: 12px; position: absolute; top: 0px">
                Москва
            </a>
            <a
                href="https://yandex.ru/maps/213/moscow/?ll=37.643243%2C55.745426&rl=37.232355%2C55.867221&utm_medium=mapframe&utm_source=maps&z=12"
                style="color: #eee; font-size: 12px; position: absolute; top: 14px"
            >
                Москва — Яндекс Карты
            </a>
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

            <template v-if="props.addresses?.length">
                <div
                    v-for="(address, index) in props.addresses"
                    :key="address.id"
                    class="border-b border-black/20 last:border-b-0"
                >
                    <div
                        @click="toggleAddress(address.id)"
                        class="promo-address-card my-5 flex cursor-pointer items-center justify-between rounded-lg p-4 opacity-90"
                    >
                        <div>
                            <h3 class="text-lg font-bold">Адрес {{ index + 1 }}</h3>
                            <p>{{ address.name }}</p>
                        </div>
                        <svg
                            :class="['icon ml-4 h-6 w-6 stroke-4 transition-transform', isOpened(address.id) ? 'rotate-180' : '']"
                            viewBox="0 0 1024 1024"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path d="M903.232 256l56.768 50.432L512 768 64 306.432 120.768 256 512 659.072z" fill="currentColor" />
                        </svg>
                    </div>

                    <div v-show="isOpened(address.id)" class="my-5 px-4 opacity-90">
                        <div v-if="address.openHours && Object.keys(address.openHours).length" class="mb-2 flex gap-2">
                            <img src="/images/png/sale/time-icon.png" class="mt-2 h-5 w-5" alt="time" />
                            <div>
                                <h3 class="text-lg font-bold">График работы</h3>
                                <p v-for="(hours, day) in address.openHours" :key="day">{{ day }}: {{ hours }}</p>
                            </div>
                        </div>

                        <div v-if="address.phone || address.phoneSecondary" class="mb-2 flex gap-2">
                            <img src="/images/png/sale/phone-icon.png" class="mt-2 h-5 w-5" alt="phone" />
                            <div>
                                <h3 class="text-lg font-bold">Телефоны</h3>
                                <p v-if="address.phone">{{ address.phone }}</p>
                                <p v-if="address.phoneSecondary">{{ address.phoneSecondary }}</p>
                            </div>
                        </div>

                        <div v-if="address.website" class="mb-2 flex gap-2">
                            <img src="/images/png/sale/link-icon.png" class="mt-2 h-5 w-5" alt="link" />
                            <div>
                                <h3 class="text-lg font-bold">Сайт</h3>
                                <a :href="address.website" target="_blank" rel="noopener noreferrer" class="promo-address-link hover:underline">
                                    {{ address.website }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </template>
            <p v-else class="mt-5 opacity-70">Адреса не указаны</p>
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
