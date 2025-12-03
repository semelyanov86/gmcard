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
        title="Мои завершенные акции"
        empty-message="У вас пока нет завершенных акций"
        :promos="props.promos"
        container-id="endPromo"
        :actions-config="{
            showDelete: true,
            showEdit: true,
            onDelete: deletePromo,
        }"
    />
</template>
