<script setup lang="ts">
import '../../../css/internal/output.css';
import ActivePromos from '@/components/Profile/ActivePromos.vue';
import CategoriesMenu from '@/components/CategoriesMenu.vue';
import CompletedPromos from '@/components/Profile/CompletedPromos.vue';
import Footer from '@/components/Footer.vue';
import Header from '@/components/Header.vue';
import MobileMenu from '@/components/MobileMenu.vue';
import ModerationPromos from '@/components/Profile/ModerationPromos.vue';
import NavBar from '@/components/NavBar.vue';
import ProfileSidebar from '@/components/Profile/ProfileSidebar.vue';
import RejectedPromos from '@/components/Profile/RejectedPromos.vue';
import { ProfileTab } from '@/types/enums/profile';
import type { AppPageProps, ContactModel, MenuData, User } from '@/types';
import { Link, usePage } from '@inertiajs/vue3';

import {ref} from 'vue';

const page = usePage<AppPageProps>();

const props = defineProps<{
    contact: ContactModel;
    navbarMenu: MenuData[];
    user: User | null;
    activePromos: any[];  // TODO: добавить тип Promo[]
}>();

const activeTab = ref(ProfileTab.Profile);

</script>

<template>
    <Header :user-data="page.props.userData"></Header>
    <section id="section-1" class="body max-w-full h-full pb-9 overflow-visible">
        <MobileMenu />
        <div class="2xl:w-full 2xl:px-4 w-[1140px] mx-auto">
            <NavBar :menu-items="navbarMenu" />
            <CategoriesMenu />
            <div class="w-full h-[1px] bg-white opacity-10"></div>
            <div class="flex justify-between my-12">
                <div v-show="activeTab === ProfileTab.Profile" class="w-3/4" id="block1DATA">
                    <div class="p-8 md:p-2 rounded-2xl min-h-[500px] bg-white flex flex-col gap-5">
                        <h2 class="text-start text-5xl font-medium">Личный кабинет</h2>
                        <div class="flex border-2 p-8 justify-between">
                            <div class="profMenu flex gap-10">
                                <div>
                                    <div id="cropModal2" class="modal z-50 w-full h-auto">
                                        <div class="modal-content w-[600px] p-4 bg-white">
                                            <h2 class="text-xl mb-4">Фотография на вашей странице</h2>
                                            <div class="cropper-container ">
                                                <img id="cropperImage2" alt="Crop Image" class="w-full ">
                                            </div>
                                            <div class="flex flex-col gap-2 sm:gap-0 sm:flex-row items-center p-4 justify-between">
                                                <h2 class="text-base">Выберите длинное изображение</h2>
                                                <div class="flex gap-4">
                                                    <button id="cancelButton2" class="px-10 py-2 bg-black/10 text-black rounded-md hover:bg-black/20">Отмена</button>
                                                    <button id="cropButton2" class="px-10 py-2 bg-[#0066cb] text-white rounded-md hover:bg-opacity-80">Сохранить</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-[200px] h-[200px] rounded-full overflow-hidden relative flex items-center justify-center" id="photoBlock">
                                        <img src="/images/png/profile/product8.png" id="cropperResult2" class="object-cover w-full h-full" alt="Account">
                                        <div class="w-full h-full flex items-center justify-center absolute bottom-0 bg-black/50 hidden" id="photoChangeBtn">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-14 text-white cursor-pointer">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 0 1 5.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 0 0-1.134-.175 2.31 2.31 0 0 1-1.64-1.055l-.822-1.316a2.192 2.192 0 0 0-1.736-1.039 48.774 48.774 0 0 0-5.232 0 2.192 2.192 0 0 0-1.736 1.039l-.821 1.316Z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0ZM18.75 10.5h.008v.008h-.008V10.5Z" />
                                            </svg>
                                            <input type="file" class="hidden" id="uploadImage2">
                                        </div>
                                    </div>
                                </div>
                                <div class="flex flex-col items-start gap-3">
                                    <h2 class="text-3xl w-full">{{ props.user?.name || 'Гость' }}</h2>
                                    <p class="text-[#1d89f2] w-full">{{ page.props.userData?.age || 'Возраст не указан' }} лет</p>
                                    <ul>
                                        <li><span>Место работы:</span> <span class="text-[#1d89f2]">{{ page.props.userData?.job || 'Не указано' }}</span></li>
                                        <li><span>Место проживания:</span> <span class="text-[#1d89f2]">{{ page.props.userData?.city || 'Не указано' }}</span></li>
                                        <li><span>Страна:</span> <span class="text-[#1d89f2]">{{ page.props.userData?.country || 'Не указано' }}</span></li>
                                    </ul>
                                    <p class="text-[#1d89f2] w-full">{{ props.user?.email }}</p>
                                    <div class="py-2 border-t border-b w-full">
                                        <p class="font-semibold">Баланс</p>
                                        <div class="flex items-center gap-4">
                                            <span class="text-[#152041] text-3xl">{{ page.props.userData?.balance || 0 }} руб.</span>
                                            <p class="text-[#1d89f2] hover:underline text-sm cursor-pointer">Пополнить</p>
                                            <p data-tooltip-target="tooltip-not-money" data-tooltip-placement="top" class="text-[#1d89f2] hover:underline text-sm cursor-pointer relative">Вывести</p>
                                            <div id="tooltip-not-money" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-[#041f35] rounded-lg shadow-sm opacity-0 tooltip">
                                                Вывод средств недоступно
                                                <div class="tooltip-arrow" data-popper-arrow></div>
                                            </div>
                                        </div>
                                    </div>
                                    <Link :href="route('promos.create')" class="py-2 px-4 bg-[#1d89f2] hover:opacity-90 text-white rounded-lg">Запустить акцию</Link>
                                </div>
                            </div>
                            <Link :href="route('profile.edit')" class="text-[#1d89f2] cursor-pointer hover:underline">Редактировать</Link>
                        </div>
                    </div>
                    <div></div>
                </div>
                <ModerationPromos v-show="activeTab === ProfileTab.Moderation" />
                <ActivePromos v-show="activeTab === ProfileTab.Active" :promos="props.activePromos" />
                <CompletedPromos v-show="activeTab === ProfileTab.Completed" />
                <RejectedPromos v-show="activeTab === ProfileTab.Rejected" />
                <div class="fixed top-0 left-0 w-full h-full bg-black/10 flex items-center justify-center z-50 hidden" id="modalFromService">
                    <div class="flex flex-col w-[600px] shadow-2xl relative z-50 rounded-xl overflow-hidden">
                        <div class="bg-[#0066CC] h-14 flex items-center px-4 justify-between">
                            <span class="text-2xl text-white font-medium">Сообщение от администрации</span>
                            <button id="closeModal">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 text-white hover:bg-black/20 rounded-md">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                        <div class="p-5 bg-white">
                            <textarea name="" id="" placeholder="Напишите что-нибудь" class="w-full h-[200px] rounded-lg border border-black/20 placeholder:font-semibold"></textarea>
                            <p class="text-sm text-black/70">Вы получили сообщение от администрации сервиса. В сообщении указываются причины, почему ваше объявление на данный момент не может быть опубликовано. Устраните данные нарушения и отправьте заявку на публикацию заново. После проверки, если все недочеты устранены - ваша акция будет опубликована. Подробнее в разделе <a href="/rules.html" class="text-blue-500">"GM Справка"</a></p>
                        </div>
                    </div>
                </div>
                <ProfileSidebar v-model="activeTab" />
            </div>
        </div>
    </section>
    <Footer :contact="contact"></Footer>
</template>
