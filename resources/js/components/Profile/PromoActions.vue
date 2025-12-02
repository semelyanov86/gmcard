<script setup lang="ts">
import Tooltip from '@/components/Profile/Tooltip.vue';
import AdminMessageIcon from '@/components/Promo/icons/AdminMessageIcon.vue';
import ApproveIcon from '@/components/Promo/icons/ApproveIcon.vue';
import CompleteIcon from '@/components/Promo/icons/CompleteIcon.vue';
import DeleteIcon from '@/components/Promo/icons/DeleteIcon.vue';
import EditIcon from '@/components/Promo/icons/EditIcon.vue';
import RaiseIcon from '@/components/Promo/icons/RaiseIcon.vue';
import { Link } from '@inertiajs/vue3';

interface Props {
    promoId: number;
    showDelete?: boolean;
    showEdit?: boolean;
    showComplete?: boolean;
    showRaise?: boolean;
    showApprove?: boolean;
    showAdminMessage?: boolean;
    onDelete?: () => void;
    onComplete?: () => void;
    onAdminMessage?: () => void;
}

const props = withDefaults(defineProps<Props>(), {
    showDelete: true,
    showEdit: false,
    showComplete: false,
    showRaise: false,
    showApprove: false,
    showAdminMessage: false,
});
</script>

<template>
    <div class="mt-7 flex flex-col items-center gap-4">
        <button
            v-if="props.showDelete"
            type="button"
            data-tooltip-target="tooltip-delete"
            data-tooltip-placement="top"
            class="relative"
            @click="props.onDelete?.()"
        >
            <DeleteIcon />
        </button>
        <Tooltip id="tooltip-delete" text="Удалить" :show="props.showDelete" />

        <button v-if="props.showApprove" type="button" data-tooltip-target="tooltip-approve" data-tooltip-placement="top" class="relative">
            <ApproveIcon />
        </button>
        <Tooltip id="tooltip-approve" text="Одобрить" :show="props.showApprove" />

        <button v-if="props.showRaise" data-tooltip-target="tooltip-up" data-tooltip-placement="top" class="relative">
            <RaiseIcon />
        </button>
        <Tooltip id="tooltip-up" text="Поднять акцию" :show="props.showRaise" />

        <Link
            v-if="props.showEdit"
            :href="route('promos.edit', props.promoId)"
            data-tooltip-target="tooltip-edit"
            data-tooltip-placement="top"
            class="relative"
        >
            <EditIcon />
        </Link>
        <Tooltip id="tooltip-edit" text="Редактировать" :show="props.showEdit" />

        <button
            v-if="props.showComplete"
            type="button"
            data-tooltip-target="tooltip-complete"
            data-tooltip-placement="top"
            class="relative"
            @click="props.onComplete?.()"
        >
            <CompleteIcon />
        </button>
        <Tooltip id="tooltip-complete" text="Завершить акцию" :show="props.showComplete" />

        <button
            v-if="props.showAdminMessage"
            type="button"
            data-tooltip-target="tooltip-admin-message"
            data-tooltip-placement="top"
            class="relative"
            @click="props.onAdminMessage?.()"
        >
            <AdminMessageIcon />
        </button>
        <Tooltip id="tooltip-admin-message" text="Сообщение от администрации" :show="props.showAdminMessage" />
    </div>
</template>
