<script setup lang="ts">
import ModerationPromosList from '@/components/Moderation/ModerationPromosList.vue';
import RejectPromoModal from '@/components/Moderation/RejectPromoModal.vue';
import { MODERATOR_ROLES } from '@/composables/useUserRoles';
import type { UserDataModel } from '@/types';
import { ProfilePromo } from '@/types/promo/ProfilePromo';
import { router, usePage } from '@inertiajs/vue3';
import { computed, ref } from 'vue';

const page = usePage();
const userData = page.props.userData as UserDataModel | null;

const props = defineProps<{
    promos: ProfilePromo[];
}>();

const isModerator = computed(() => {
    return userData?.role && MODERATOR_ROLES.includes(userData.role);
});

const selectedPromoId = ref<number | null>(null);
const isModalOpen = ref(false);

const openRejectModal = (promoId: number) => {
    selectedPromoId.value = promoId;
    isModalOpen.value = true;
};

const closeModal = () => {
    isModalOpen.value = false;
    selectedPromoId.value = null;
};

const approvePromo = (promoId: number) => {
    router.post(
        route('moderation.promos.approve', promoId),
        {},
        {
            preserveScroll: true,
        },
    );
};
</script>

<template>
    <ModerationPromosList
        v-if="isModerator"
        title="Заявки на модерацию"
        empty-message="Нет заявок на модерацию"
        empty-sub-message=""
        :promos="props.promos"
        container-id="namoderasii"
        :on-reject="openRejectModal"
        :on-approve="approvePromo"
    />
    <RejectPromoModal v-if="isModerator && selectedPromoId !== null" :promo-id="selectedPromoId" :is-open="isModalOpen" @close="closeModal" />
</template>
