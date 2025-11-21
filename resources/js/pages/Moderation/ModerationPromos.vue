<script setup lang="ts">
import PromosList from '@/components/Profile/PromosList.vue';
import { usePromoActions } from '@/composables/usePromoActions';
import { ProfilePromo } from '@/types/promo/ProfilePromo';

const props = defineProps<{
    pendingPromos: ProfilePromo[];
}>();

const { deletePromo } = usePromoActions();
</script>

<template>
    <PromosList
        title="Заявки на модерацию"
        empty-message="У вас пока нет заявок на модерацию"
        empty-sub-message="Создайте свою первую акцию!"
        :promos="props.pendingPromos"
        container-id="namoderasii"
        :actions-config="{
            showDelete: true,
            showEdit: true,
            onDelete: deletePromo,
        }"
    />
</template>
