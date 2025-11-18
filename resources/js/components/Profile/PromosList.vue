<script setup lang="ts">
import PromoActions from '@/components/Profile/PromoActions.vue';
import PromoCard from '@/components/Profile/PromoCard.vue';
import { ProfilePromo } from '@/types/promo/ProfilePromo';

interface ActionsConfig {
    showDelete?: boolean;
    showEdit?: boolean;
    showComplete?: boolean;
    showRaise?: boolean;
    onDelete?: (promoId: number) => void;
    onComplete?: (promoId: number) => void;
}

interface Props {
    title: string;
    emptyMessage: string;
    emptySubMessage?: string;
    promos: ProfilePromo[];
    containerId: string;
    actionsConfig?: ActionsConfig;
}

const props = withDefaults(defineProps<Props>(), {
    actionsConfig: () => ({
        showDelete: true,
        showEdit: true,
        showComplete: false,
        showRaise: false,
    }),
});
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
                class="flex min-w-80 gap-5 rounded-xl border border-white/10 bg-none px-5 pb-5"
            >
                <PromoCard :promo="promo" />
                <PromoActions
                    :promo-id="promo.id"
                    :show-delete="props.actionsConfig?.showDelete ?? true"
                    :show-edit="props.actionsConfig?.showEdit ?? true"
                    :show-complete="props.actionsConfig?.showComplete ?? false"
                    :show-raise="props.actionsConfig?.showRaise ?? false"
                    :on-delete="props.actionsConfig?.onDelete ? () => props.actionsConfig?.onDelete?.(promo.id) : undefined"
                    :on-complete="props.actionsConfig?.onComplete ? () => props.actionsConfig?.onComplete?.(promo.id) : undefined"
                />
            </div>
        </div>
    </div>
</template>

