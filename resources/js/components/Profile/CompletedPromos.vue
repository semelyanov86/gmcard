<script setup lang="ts">
import PromoActions from '@/components/Profile/PromoActions.vue';
import PromoCard from '@/components/Profile/PromoCard.vue';
import { usePromoActions } from '@/composables/usePromoActions';
import { ProfilePromo } from '@/types/promo/ProfilePromo';

const props = defineProps<{
    promos: ProfilePromo[];
}>();

const { deletePromo } = usePromoActions();
</script>

<template>
    <div class="w-3/4 rounded-2xl p-10" style="background-color: #063965" id="endPromo">
        <h2 class="mb-5 text-4xl text-white">Мои завершенные акции</h2>

        <!-- Если нет завершенных промо -->
        <div v-if="!props.promos || props.promos.length === 0" class="py-10 text-center text-white">
            <p class="text-xl">У вас пока нет завершенных акций</p>
        </div>

        <!-- Список завершенных промо -->
        <div v-else class="flex flex-wrap justify-between gap-4">
            <div v-for="promo in props.promos" :key="promo.id" class="flex min-w-[300px] gap-5 rounded-xl border border-white/10 bg-none px-5 pb-5">
                <PromoCard :promo="promo" />
                <PromoActions :promo-id="promo.id" :show-delete="true" :show-edit="true" :on-delete="() => deletePromo(promo.id)" />
            </div>
        </div>
    </div>
</template>
