<script setup lang="ts">
import PromosList from '@/components/Profile/PromosList.vue';
import { usePromoActions } from '@/composables/usePromoActions';
import { ProfilePromo } from '@/types/promo/ProfilePromo';

const props = defineProps<{
    promos: ProfilePromo[];
}>();

const { deletePromo } = usePromoActions();
</script>

<template>
    <PromosList
        title="Мои черновики"
        empty-message="У вас пока нет черновиков"
        empty-sub-message="Создайте свою первую акцию!"
        :promos="props.promos"
        container-id="draftPromo"
        :actions-config="{
            showDelete: true,
            showEdit: true,
            onDelete: deletePromo,
        }"
    />
</template>
