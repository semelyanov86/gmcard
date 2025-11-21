<script setup lang="ts">
import PromosList from '@/components/Profile/PromosList.vue';
import { usePromoActions } from '@/composables/usePromoActions';
import { ProfilePromo } from '@/types/promo/ProfilePromo';

const props = defineProps<{
    promos: ProfilePromo[];
}>();

const emit = defineEmits<{
    (e: 'show-admin-message', promo: ProfilePromo): void;
}>();

const { deletePromo } = usePromoActions();

function handleAdminMessageClick(promo: ProfilePromo): void {
    emit('show-admin-message', promo);
}
</script>

<template>
    <PromosList
        title="Мои отклоненные акции"
        empty-message="У вас пока нет отклоненных акций"
        empty-sub-message=""
        :promos="props.promos"
        container-id="rejectPromo"
        :actions-config="{
            showDelete: true,
            showEdit: true,
            showAdminMessage: true,
            onDelete: deletePromo,
            onAdminMessage: handleAdminMessageClick,
        }"
    />
</template>
