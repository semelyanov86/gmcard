<script setup lang="ts">
import ModerationPromoActions from '@/components/Moderation/ModerationPromoActions.vue';
import PromoCard from '@/components/Profile/PromoCard.vue';
import { ProfilePromo } from '@/types/promo/ProfilePromo';

interface Props {
    title: string;
    emptyMessage: string;
    emptySubMessage?: string;
    promos: ProfilePromo[];
    containerId: string;
    onReject?: (promoId: number) => void;
    onApprove?: (promoId: number) => void;
}

const props = defineProps<Props>();

function handleReject(promoId: number): void {
    props.onReject?.(promoId);
}

function handleApprove(promoId: number): void {
    props.onApprove?.(promoId);
}
</script>

<template>
    <div class="w-3/4 rounded-2xl p-10" style="background-color: #063965" :id="props.containerId">
        <h2 class="mb-5 text-4xl text-white">{{ props.title }}</h2>

        <div v-if="!props.promos || props.promos.length === 0" class="py-10 text-center text-white">
            <p class="text-xl">{{ props.emptyMessage }}</p>
            <p v-if="props.emptySubMessage" class="mt-2 text-gray-400">{{ props.emptySubMessage }}</p>
        </div>

        <div v-else class="flex flex-wrap justify-between gap-4">
            <div
                v-for="promo in props.promos"
                :key="promo.id"
                class="flex min-w-[300px] gap-5 rounded-xl border border-white/10 bg-none px-5 pb-5"
            >
                <PromoCard :promo="promo" />
                <ModerationPromoActions
                    :promo-id="promo.id"
                    :on-reject="() => handleReject(promo.id)"
                    :on-approve="() => handleApprove(promo.id)"
                />
            </div>
        </div>
    </div>
</template>

