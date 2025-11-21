<script setup lang="ts">
import Tooltip from '@/components/Profile/Tooltip.vue';
import ApproveIcon from '@/components/Promo/icons/ApproveIcon.vue';
import DeleteIcon from '@/components/Promo/icons/DeleteIcon.vue';
import EditIcon from '@/components/Promo/icons/EditIcon.vue';
import { Link } from '@inertiajs/vue3';

interface Props {
    promoId: number;
    onReject?: () => void;
    onApprove?: () => void;
}

const props = defineProps<Props>();

const handleReject = (event: MouseEvent) => {
    event.preventDefault();
    event.stopPropagation();
    props.onReject?.();
};
</script>

<template>
    <div class="mt-7 flex flex-col items-center gap-4">
        <button
            type="button"
            data-tooltip-target="tooltip-reject"
            data-tooltip-placement="top"
            class="relative"
            @click.stop.prevent="handleReject"
        >
            <DeleteIcon />
        </button>
        <Tooltip id="tooltip-reject" text="Отклонить" :show="true" />

        <button
            type="button"
            data-tooltip-target="tooltip-approve"
            data-tooltip-placement="top"
            class="relative"
            @click="props.onApprove?.()"
        >
            <ApproveIcon />
        </button>
        <Tooltip id="tooltip-approve" text="Одобрить" :show="true" />

        <Link
            :href="route('promos.edit', props.promoId)"
            data-tooltip-target="tooltip-edit"
            data-tooltip-placement="top"
            class="relative"
        >
            <EditIcon />
        </Link>
        <Tooltip id="tooltip-edit" text="Редактировать" :show="true" />
    </div>
</template>

