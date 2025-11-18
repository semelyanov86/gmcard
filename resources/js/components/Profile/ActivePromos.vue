<script setup lang="ts">
import PromosList from '@/components/Profile/PromosList.vue';
import { usePromoActions } from '@/composables/usePromoActions';
import { ProfilePromo } from '@/types/promo/ProfilePromo';

const props = defineProps<{
    promos: ProfilePromo[];
}>();

const { deletePromo, completePromo } = usePromoActions();
</script>

<template>
    <PromosList
        title="Мои активные акции"
        empty-message="У вас пока нет активных акций"
        empty-sub-message="Создайте свою первую акцию!"
        :promos="props.promos"
        container-id="activePromo"
        :actions-config="{
            showDelete: true,
            showEdit: true,
            showComplete: true,
            showRaise: true,
            onDelete: deletePromo,
            onComplete: completePromo,
        }"
    />
</template>
