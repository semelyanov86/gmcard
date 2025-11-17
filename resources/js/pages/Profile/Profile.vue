<script setup lang="ts">
import CategoriesMenu from '@/components/CategoriesMenu.vue';
import Footer from '@/components/Footer.vue';
import Header from '@/components/Header.vue';
import MobileMenu from '@/components/MobileMenu.vue';
import NavBar from '@/components/NavBar.vue';
import ActivePromos from '@/components/Profile/ActivePromos.vue';
import CompletedPromos from '@/components/Profile/CompletedPromos.vue';
import ModerationPromos from '@/components/Profile/ModerationPromos.vue';
import ProfileSidebar from '@/components/Profile/ProfileSidebar.vue';
import RejectedPromos from '@/components/Profile/RejectedPromos.vue';
import FlashToaster from '@/components/system/FlashToaster.vue';
import type { AppPageProps, ContactModel, MenuData, User } from '@/types';
import { ProfileTab } from '@/types/enums/profile';
import { Link, usePage } from '@inertiajs/vue3';
import { ref } from 'vue';
import '../../../css/internal/output.css';

const page = usePage<AppPageProps>();

const props = defineProps<{
    contact: ContactModel;
    navbarMenu: MenuData[];
    user: User | null;
    activePromos: any[];
    completedPromos: any[];
}>();

const activeTab = ref(ProfileTab.Profile);
const isAdminModalOpen = ref(false);

const openAdminModal = () => {
    isAdminModalOpen.value = true;
};

const closeAdminModal = () => {
    isAdminModalOpen.value = false;
};
</script>

<template>
    <Header :user-data="page.props.userData"></Header>
    <FlashToaster />
    <section id="section-1" class="body h-full max-w-full overflow-visible pb-9">
        <MobileMenu />
        <div class="mx-auto w-[1140px] 2xl:w-full 2xl:px-4">
            <NavBar :menu-items="navbarMenu" />
            <CategoriesMenu />
            <div class="h-[1px] w-full bg-white opacity-10"></div>
            <div class="my-12 flex justify-between">
                <div v-show="activeTab === ProfileTab.Profile" class="w-3/4" id="block1DATA">
                    <div class="flex min-h-[500px] flex-col gap-5 rounded-2xl bg-white p-8 md:p-2">
                        <h2 class="text-start text-5xl font-medium">Личный кабинет</h2>
                        <div class="flex justify-between border-2 p-8">
                            <div class="profMenu flex gap-10">
                                <div>
                                    <div id="cropModal2" class="modal z-50 h-auto w-full">
                                        <div class="modal-content w-[600px] bg-white p-4">
                                            <h2 class="mb-4 text-xl">Фотография на вашей странице</h2>
                                            <div class="cropper-container">
                                                <img id="cropperImage2" alt="Crop Image" class="w-full" />
                                            </div>
                                            <div class="flex flex-col items-center justify-between gap-2 p-4 sm:flex-row sm:gap-0">
                                                <h2 class="text-base">Выберите длинное изображение</h2>
                                                <div class="flex gap-4">
                                                    <button id="cancelButton2" class="rounded-md bg-black/10 px-10 py-2 text-black hover:bg-black/20">
                                                        Отмена
                                                    </button>
                                                    <button
                                                        id="cropButton2"
                                                        class="hover:bg-opacity-80 rounded-md bg-[#0066cb] px-10 py-2 text-white"
                                                    >
                                                        Сохранить
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="relative flex h-[200px] w-[200px] items-center justify-center overflow-hidden rounded-full"
                                        id="photoBlock"
                                    >
                                        <img
                                            src="/images/png/profile/product8.png"
                                            id="cropperResult2"
                                            class="h-full w-full object-cover"
                                            alt="Account"
                                        />
                                        <div
                                            class="absolute bottom-0 flex hidden h-full w-full items-center justify-center bg-black/50"
                                            id="photoChangeBtn"
                                        >
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke-width="1.5"
                                                stroke="currentColor"
                                                class="w-14 cursor-pointer text-white"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    d="M6.827 6.175A2.31 2.31 0 0 1 5.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 0 0-1.134-.175 2.31 2.31 0 0 1-1.64-1.055l-.822-1.316a2.192 2.192 0 0 0-1.736-1.039 48.774 48.774 0 0 0-5.232 0 2.192 2.192 0 0 0-1.736 1.039l-.821 1.316Z"
                                                />
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    d="M16.5 12.75a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0ZM18.75 10.5h.008v.008h-.008V10.5Z"
                                                />
                                            </svg>
                                            <input type="file" class="hidden" id="uploadImage2" />
                                        </div>
                                    </div>
                                </div>
                                <div class="flex flex-col items-start gap-3">
                                    <h2 class="w-full text-3xl">{{ props.user?.name || 'Гость' }}</h2>
                                    <p class="w-full text-[#1d89f2]">{{ page.props.userData?.age || 'Возраст не указан' }} лет</p>
                                    <ul>
                                        <li>
                                            <span>Место работы:</span>
                                            <span class="text-[#1d89f2]">{{ page.props.userData?.job || 'Не указано' }}</span>
                                        </li>
                                        <li>
                                            <span>Место проживания:</span>
                                            <span class="text-[#1d89f2]">{{ page.props.userData?.city || 'Не указано' }}</span>
                                        </li>
                                        <li>
                                            <span>Страна:</span>
                                            <span class="text-[#1d89f2]">{{ page.props.userData?.country || 'Не указано' }}</span>
                                        </li>
                                    </ul>
                                    <p class="w-full text-[#1d89f2]">{{ props.user?.email }}</p>
                                    <div class="w-full border-t border-b py-2">
                                        <p class="font-semibold">Баланс</p>
                                        <div class="flex items-center gap-4">
                                            <span class="text-3xl text-[#152041]">{{ page.props.userData?.balance || 0 }} руб.</span>
                                            <p class="cursor-pointer text-sm text-[#1d89f2] hover:underline">Пополнить</p>
                                            <p
                                                data-tooltip-target="tooltip-not-money"
                                                data-tooltip-placement="top"
                                                class="relative cursor-pointer text-sm text-[#1d89f2] hover:underline"
                                            >
                                                Вывести
                                            </p>
                                            <div
                                                id="tooltip-not-money"
                                                role="tooltip"
                                                class="tooltip invisible absolute z-10 inline-block rounded-lg bg-[#041f35] px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300"
                                            >
                                                Вывод средств недоступно
                                                <div class="tooltip-arrow" data-popper-arrow></div>
                                            </div>
                                        </div>
                                    </div>
                                    <Link :href="route('promos.create')" class="rounded-lg bg-[#1d89f2] px-4 py-2 text-white hover:opacity-90"
                                        >Запустить акцию</Link
                                    >
                                </div>
                            </div>
                            <a :href="route('profile.edit')" class="cursor-pointer text-[#1d89f2] hover:underline">Редактировать</a>
                        </div>
                    </div>
                    <div></div>
                </div>
                <ModerationPromos v-show="activeTab === ProfileTab.Moderation" />
                <ActivePromos v-show="activeTab === ProfileTab.Active" :promos="props.activePromos" />
                <CompletedPromos v-show="activeTab === ProfileTab.Completed" :promos="props.completedPromos" />
                <RejectedPromos v-show="activeTab === ProfileTab.Rejected" @show-admin-message="openAdminModal" />
                <div
                    class="fixed top-0 left-0 z-50 flex h-full w-full items-center justify-center bg-black/10"
                    id="modalFromService"
                    v-show="isAdminModalOpen"
                    @click.self="closeAdminModal"
                >
                    <div class="relative z-50 flex w-[600px] flex-col overflow-hidden rounded-xl shadow-2xl">
                        <div class="flex h-14 items-center justify-between bg-[#0066CC] px-4">
                            <span class="text-2xl font-medium text-white">Сообщение от администрации</span>
                            <button id="closeModal" type="button" @click="closeAdminModal">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    class="w-10 rounded-md text-white hover:bg-black/20"
                                >
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                        <div class="bg-white p-5">
                            <textarea
                                name=""
                                id=""
                                placeholder="Напишите что-нибудь"
                                class="h-[200px] w-full rounded-lg border border-black/20 placeholder:font-semibold"
                            ></textarea>
                            <p class="text-sm text-black/70">
                                Вы получили сообщение от администрации сервиса. В сообщении указываются причины, почему ваше объявление на данный
                                момент не может быть опубликовано. Устраните данные нарушения и отправьте заявку на публикацию заново. После проверки,
                                если все недочеты устранены - ваша акция будет опубликована. Подробнее в разделе
                                <a href="/rules.html" class="text-blue-500">"GM Справка"</a>
                            </p>
                        </div>
                    </div>
                </div>
                <ProfileSidebar v-model="activeTab" />
            </div>
        </div>
    </section>
    <Footer :contact="contact"></Footer>
</template>
