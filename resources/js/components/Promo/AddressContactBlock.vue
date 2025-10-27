<script setup lang="ts">
import DeleteIcon from '@/components/primitives/icons/DeleteIcon.vue';
import LocationPinIcon from '@/components/primitives/icons/LocationPinIcon.vue';
import VerticalDivider from '@/components/primitives/VerticalDivider.vue';
import { IMaskDirective } from 'vue-imask';

const vImask = IMaskDirective;

const phoneMask = {
    mask: '+{7} (000) 000-00-00',
    lazy: false,
    placeholderChar: '_',
};
</script>

<template>
    <div class="mt-8 flex flex-col rounded-2xl bg-white p-8 max-md:p-4" id="desyatyi">
        <h3 class="text-base font-bold">Укажите в блоке: график работы, адрес и телефоны</h3>
        <p class="all_text text-black/50">для одной акции можно заполнить не более 4-х блоков</p>
        <div class="mt-5 h-full w-full rounded-lg bg-slate-100">
            <div class="flex justify-between p-6">
                <div class="flex items-center gap-1">
                    <LocationPinIcon />
                    <span class="text-base font-bold">Адрес 1</span>
                </div>
            </div>
            <div class="h-px w-full bg-black/10"></div>
            <div class="flex w-full flex-row flex-wrap items-center p-6 max-md:flex-col">
                <div class="flex w-full flex-col p-3 max-md:w-full md:w-1/2">
                    <label for="address" class="mb-2 text-sm font-bold">Адрес</label>
                    <input type="text" name="address" class="rounded-md border-none" placeholder="Москва, проспект Мира 82 корпус 1" />
                </div>
                <div class="flex w-full flex-col p-3 max-md:w-full md:w-1/2">
                    <label for="time" class="mb-2 text-sm font-bold">Гафик работы:</label>
                    <input type="text" name="time" class="rounded-md border-none" placeholder="пн-сб:с 10.00 до 20.00 вс с 10.00 до 16.00" />
                </div>
                <div class="flex w-full flex-col p-3 max-md:w-full md:w-1/2">
                    <label for="phone" class="mb-2 text-sm font-bold">Телефон</label>
                    <input v-imask="phoneMask" type="tel" name="phone" class="rounded-md border-none" placeholder="+7 (000) 000-00-00" />
                </div>
                <span
                    id="showTel1"
                    class="mt-6 ml-6 cursor-pointer text-sm font-bold text-blue-400 hover:border-b-2 hover:border-dashed hover:border-blue-400"
                    >+ еще телефон</span
                >
                <div class="relative hidden w-full flex-col p-3 max-md:w-full md:w-1/2" id="phone1">
                    <label for="phone" class="mb-2 text-sm font-bold">Телефон</label>
                    <input v-imask="phoneMask" type="tel" name="phone" class="rounded-md border-none pr-10" placeholder="+7 (000) 000-00-00" />
                    <VerticalDivider custom-class="right-12 bottom-4" />
                    <DeleteIcon id="delPhon1" custom-class="absolute bottom-5 right-5" />
                </div>
            </div>
        </div>
        <div class="mt-5 hidden h-full w-full rounded-lg bg-slate-100" id="organization2">
            <div class="flex justify-between p-6">
                <div class="flex items-center gap-1">
                    <LocationPinIcon />
                    <span class="text-base font-bold">Адрес 2</span>
                </div>
                <DeleteIcon id="delOrg2" />
            </div>
            <div class="h-px w-full bg-black/10"></div>
            <div class="flex w-full flex-col flex-wrap items-center p-6 sm:flex-row">
                <div class="flex w-full flex-col p-3 sm:w-1/2">
                    <label for="address" class="mb-2 text-sm font-bold">Адрес</label>
                    <input type="text" name="address" class="rounded-md border-none" placeholder="Москва, проспект Мира 82 корпус 1" />
                </div>
                <div class="flex w-full flex-col p-3 sm:w-1/2">
                    <label for="time" class="mb-2 text-sm font-bold">Гафик работы:</label>
                    <input type="text" name="time" class="rounded-md border-none" placeholder="пн-сб:с 10.00 до 20.00 вс с 10.00 до 16.00" />
                </div>
                <div class="flex w-full flex-col p-3 sm:w-1/2">
                    <label for="phone" class="mb-2 text-sm font-bold">Телефон</label>
                    <input v-imask="phoneMask" type="tel" name="phone" class="rounded-md border-none" placeholder="+7 (000) 000-00-00" />
                </div>
                <span
                    id="showTel2"
                    class="mt-6 ml-6 cursor-pointer text-sm font-bold text-blue-400 hover:border-b-2 hover:border-dashed hover:border-blue-400"
                    >+ еще телефон</span
                >
                <div class="relative hidden w-full flex-col p-3 sm:w-1/2" id="phone2">
                    <label for="phone" class="mb-2 text-sm font-bold">Телефон</label>
                    <input v-imask="phoneMask" type="tel" name="phone" class="rounded-md border-none" placeholder="+7 (000) 000-00-00" />
                    <VerticalDivider custom-class="right-12 bottom-4" />
                    <DeleteIcon id="delPhon2" custom-class="absolute bottom-5 right-5" />
                </div>
            </div>
        </div>
        <div class="mt-5 hidden h-full w-full rounded-lg bg-slate-100" id="organization3">
            <div class="flex justify-between p-6">
                <div class="flex items-center gap-1">
                    <LocationPinIcon />
                    <span class="text-base font-bold">Адрес 3</span>
                </div>
                <DeleteIcon id="delOrg3" />
            </div>
            <div class="h-px w-full bg-black/10"></div>
            <div class="flex w-full flex-col flex-wrap items-center p-6 sm:flex-row">
                <div class="flex w-full flex-col p-3 sm:w-1/2">
                    <label for="address" class="mb-2 text-sm font-bold">Адрес</label>
                    <input type="text" name="address" class="rounded-md border-none" placeholder="Москва, проспект Мира 82 корпус 1" />
                </div>
                <div class="flex w-full flex-col p-3 sm:w-1/2">
                    <label for="time" class="mb-2 text-sm font-bold">Гафик работы:</label>
                    <input type="text" name="time" class="rounded-md border-none" placeholder="пн-сб:с 10.00 до 20.00 вс с 10.00 до 16.00" />
                </div>
                <div class="flex w-full flex-col p-3 sm:w-1/2">
                    <label for="phone" class="mb-2 text-sm font-bold">Телефон</label>
                    <input v-imask="phoneMask" type="tel" name="phone" class="rounded-md border-none" placeholder="+7 (000) 000-00-00" />
                </div>
                <span
                    id="showTel3"
                    class="mt-6 ml-6 cursor-pointer text-sm font-bold text-blue-400 hover:border-b-2 hover:border-dashed hover:border-blue-400"
                    >+ еще телефон</span
                >
                <div class="relative hidden w-full flex-col p-3 sm:w-1/2" id="phone3">
                    <label for="phone" class="mb-2 text-sm font-bold">Телефон</label>
                    <input v-imask="phoneMask" type="tel" name="phone" class="rounded-md border-none" placeholder="+7 (000) 000-00-00" />
                    <VerticalDivider custom-class="right-12 bottom-4" />
                    <DeleteIcon id="delPhon3" custom-class="absolute bottom-5 right-5" />
                </div>
            </div>
        </div>
        <div class="mt-5 hidden h-full w-full rounded-lg bg-slate-100" id="organization4">
            <div class="flex justify-between p-6">
                <div class="flex items-center gap-1">
                    <LocationPinIcon />
                    <span class="text-base font-bold">Адрес 4</span>
                </div>
                <DeleteIcon id="delOrg4" />
            </div>
            <div class="h-px w-full bg-black/10"></div>
            <div class="flex w-full flex-col flex-wrap items-center p-6 sm:flex-row">
                <div class="flex w-full flex-col p-3 sm:w-1/2">
                    <label for="address" class="mb-2 text-sm font-bold">Адрес</label>
                    <input type="text" name="address" class="rounded-md border-none" placeholder="Москва, проспект Мира 82 корпус 1" />
                </div>
                <div class="flex w-full flex-col p-3 sm:w-1/2">
                    <label for="time" class="mb-2 text-sm font-bold">Гафик работы:</label>
                    <input type="text" name="time" class="rounded-md border-none" placeholder="пн-сб:с 10.00 до 20.00 вс с 10.00 до 16.00" />
                </div>
                <div class="flex w-full flex-col p-3 sm:w-1/2">
                    <label for="phone" class="mb-2 text-sm font-bold">Телефон</label>
                    <input v-imask="phoneMask" type="tel" name="phone" class="rounded-md border-none" placeholder="+7 (000) 000-00-00" />
                </div>
                <span
                    id="showTel4"
                    class="mt-6 ml-6 cursor-pointer text-sm font-bold text-blue-400 hover:border-b-2 hover:border-dashed hover:border-blue-400"
                    >+ еще телефон</span
                >
                <div class="relative hidden w-full flex-col p-3 sm:w-1/2" id="phone4">
                    <label for="phone" class="mb-2 text-sm font-bold">Телефон</label>
                    <input v-imask="phoneMask" type="tel" name="phone" class="rounded-md border-none" placeholder="+7 (000) 000-00-00" />
                    <VerticalDivider custom-class="right-12 bottom-4" />
                    <DeleteIcon id="delPhon4" custom-class="absolute bottom-5 right-5" />
                </div>
            </div>
        </div>
        <div class="items_center flex justify-center">
            <p
                id="show_org2"
                class="mt-5 cursor-pointer text-center text-sm font-bold text-blue-400 hover:border-b-2 hover:border-dashed hover:border-blue-400"
            >
                Добавить еще организацию
            </p>
            <p
                id="show_org3"
                class="mt-5 hidden cursor-pointer text-center text-sm font-bold text-blue-400 hover:border-b-2 hover:border-dashed hover:border-blue-400"
            >
                Добавить еще организацию
            </p>
            <p
                id="show_org4"
                class="mt-5 hidden cursor-pointer text-center text-sm font-bold text-blue-400 hover:border-b-2 hover:border-dashed hover:border-blue-400"
            >
                Добавить еще организацию
            </p>
        </div>
    </div>
</template>
