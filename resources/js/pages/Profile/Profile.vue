<script setup lang="ts">
import AdminMessageContent from '@/components/AdminMessageContent.vue';
import CategoriesMenu from '@/components/CategoriesMenu.vue';
import Footer from '@/components/Footer.vue';
import Header from '@/components/Header.vue';
import MobileMenu from '@/components/MobileMenu.vue';
import ModalWindow from '@/components/ModalWindow.vue';
import NavBar from '@/components/NavBar.vue';
import CameraIcon from '@/components/primitives/icons/CameraIcon.vue';
import ActivePromos from '@/components/Profile/ActivePromos.vue';
import CompletedPromos from '@/components/Profile/CompletedPromos.vue';
import DraftPromos from '@/components/Profile/DraftPromos.vue';
import ModerationPromos from '@/components/Profile/ModerationPromos.vue';
import ProfileSidebar from '@/components/Profile/ProfileSidebar.vue';
import RejectedPromos from '@/components/Profile/RejectedPromos.vue';
import FlashToaster from '@/components/system/FlashToaster.vue';
import { MODERATOR_ROLES } from '@/composables/useUserRoles';
import type { AppPageProps, CategoryModel, ContactModel, MenuData, User } from '@/types';
import { ProfileTab } from '@/types/enums/profile';
import { Link, usePage } from '@inertiajs/vue3';
import { computed, ref } from 'vue';
import '../../../css/internal/output.css';

const page = usePage<AppPageProps>();

const props = defineProps<{
    contact: ContactModel;
    categories?: CategoryModel[];
    navbarMenu: MenuData[];
    user: User | null;
    activePromos: any[];
    completedPromos: any[];
    draftPromos: any[];
    rejectedPromos: any[];
    moderationPromos: any[];
}>();

const activeTab = ref(ProfileTab.Profile);
const isAdminModalOpen = ref(false);
const selectedRejectedPromo = ref<any>(null);

const isModerator = computed(() => {
    return page.props.userData?.role && MODERATOR_ROLES.includes(page.props.userData.role);
});

const openAdminModal = (promo: any) => {
    selectedRejectedPromo.value = promo;
    isAdminModalOpen.value = true;
};

const closeAdminModal = () => {
    isAdminModalOpen.value = false;
    selectedRejectedPromo.value = null;
};

const selectedRejectionReason = computed(() => selectedRejectedPromo.value?.rejectionReason ?? null);
const selectedRejectionMessage = computed(() => selectedRejectedPromo.value?.rejectionMessage ?? null);
</script>

<template>
    <Header :user-data="page.props.userData"></Header>
    <FlashToaster />
    <section id="section-1" class="body h-full max-w-full overflow-visible pb-9">
        <MobileMenu />
        <div class="mx-auto w-1140 2xl:w-full 2xl:px-4">
            <NavBar :menu-items="navbarMenu" />
            <CategoriesMenu :categories="categories" />
            <div class="h-line w-full bg-white opacity-10"></div>
            <div class="my-12 flex justify-between">
                <div v-show="activeTab === ProfileTab.Profile" class="w-3/4" id="block1DATA">
                    <div class="flex min-h-500 flex-col gap-5 rounded-2xl bg-white p-8 md:p-2">
                        <h2 class="text-start text-5xl font-medium">Личный кабинет</h2>
                        <div class="flex justify-between border-2 p-8">
                            <div class="profMenu flex gap-10">
                                <div>
                                    <div id="cropModal2" class="modal z-50 h-auto w-full">
                                        <div class="modal-content w-600 bg-white p-4">
                                            <h2 class="mb-4 text-xl">Фотография на вашей странице</h2>
                                            <div class="cropper-container">
                                                <img id="cropperImage2" alt="Crop Image" class="w-full" />
                                            </div>
                                            <div class="flex flex-col items-center justify-between gap-2 p-4 sm:flex-row sm:gap-0">
                                                <h2 class="text-base">Выберите длинное изображение</h2>
                                                <div class="flex gap-4">
                                                    <button
                                                        id="cancelButton2"
                                                        class="bg-divider-light hover:bg-divider rounded-md px-10 py-2 text-black"
                                                    >
                                                        Отмена
                                                    </button>
                                                    <button id="cropButton2" class="hover:bg-opacity-80 bg-button rounded-md px-10 py-2 text-white">
                                                        Сохранить
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="relative flex h-50 w-50 items-center justify-center overflow-hidden rounded-full" id="photoBlock">
                                        <img
                                            src="/images/png/profile/product8.png"
                                            id="cropperResult2"
                                            class="h-full w-full object-cover"
                                            alt="Account"
                                        />
                                        <div
                                            class="bg-divider-dark absolute bottom-0 flex hidden h-full w-full items-center justify-center"
                                            id="photoChangeBtn"
                                        >
                                            <CameraIcon />
                                            <input type="file" class="hidden" id="uploadImage2" />
                                        </div>
                                    </div>
                                </div>
                                <div class="flex flex-col items-start gap-3">
                                    <h2 class="w-full text-3xl">{{ props.user?.name || 'Гость' }}</h2>
                                    <p class="w-full text-primary">{{ page.props.userData?.age || 'Возраст не указан' }} лет</p>
                                    <ul>
                                        <li>
                                            <span>Место работы:</span>
                                            <span class="text-primary">{{ page.props.userData?.job || 'Не указано' }}</span>
                                        </li>
                                        <li>
                                            <span>Место проживания:</span>
                                            <span class="text-primary">{{ page.props.userData?.city || 'Не указано' }}</span>
                                        </li>
                                        <li>
                                            <span>Страна:</span>
                                            <span class="text-primary">{{ page.props.userData?.country || 'Не указано' }}</span>
                                        </li>
                                    </ul>
                                    <p class="w-full text-primary">{{ props.user?.email }}</p>
                                    <div class="w-full border-t border-b py-2">
                                        <p class="font-semibold">Баланс</p>
                                        <div class="flex items-center gap-4">
                                            <span class="text-header text-3xl">{{ page.props.userData?.balance || 0 }} руб.</span>
                                            <p class="cursor-pointer text-sm text-primary hover:underline">Пополнить</p>
                                            <p
                                                data-tooltip-target="tooltip-not-money"
                                                data-tooltip-placement="top"
                                                class="relative cursor-pointer text-sm text-primary hover:underline"
                                            >
                                                Вывести
                                            </p>
                                            <div
                                                id="tooltip-not-money"
                                                role="tooltip"
                                                class="tooltip bg-tooltip invisible absolute z-10 inline-block rounded-lg px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300"
                                            >
                                                Вывод средств недоступно
                                                <div class="tooltip-arrow" data-popper-arrow></div>
                                            </div>
                                        </div>
                                    </div>
                                    <Link :href="route('promos.create')" class="rounded-lg bg-primary px-4 py-2 text-white hover:opacity-90"
                                        >Запустить акцию</Link
                                    >
                                </div>
                            </div>
                            <p class="cursor-pointer text-primary hover:underline">Редактировать</p>
                        </div>
                    </div>
                    <div></div>
                </div>
                <ModerationPromos v-if="isModerator && activeTab === ProfileTab.Moderation" :promos="props.moderationPromos" />
                <ActivePromos v-show="activeTab === ProfileTab.Active" :promos="props.activePromos" />
                <CompletedPromos v-show="activeTab === ProfileTab.Completed" :promos="props.completedPromos" />
                <DraftPromos v-show="activeTab === ProfileTab.Drafts" :promos="props.draftPromos" />
                <RejectedPromos
                    v-show="activeTab === ProfileTab.Rejected"
                    :promos="props.rejectedPromos"
                    @show-admin-message="(promo) => openAdminModal(promo)"
                />
                <ModalWindow :is-open="isAdminModalOpen" title="Сообщение от администрации" @close="closeAdminModal">
                    <AdminMessageContent :rejection-reason="selectedRejectionReason" :rejection-message="selectedRejectionMessage" />
                    <div class="flex items-center justify-center">
                        <button
                            type="button"
                            @click="closeAdminModal"
                            class="hover:bg-blue/80 rounded-lg px-5 py-2.5 text-center text-base font-semibold text-blue-500 shadow focus:ring-4 focus:ring-black/40 focus:outline-none"
                        >
                            ОК
                        </button>
                    </div>
                </ModalWindow>
                <ProfileSidebar v-model="activeTab" :user-data="page.props.userData" />
            </div>
        </div>
    </section>
    <Footer :contact="contact"></Footer>
</template>
