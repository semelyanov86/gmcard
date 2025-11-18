<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import Tooltip from '@/components/Profile/Tooltip.vue';

interface Props {
    promoId: number;
    showDelete?: boolean;
    showEdit?: boolean;
    showComplete?: boolean;
    showRaise?: boolean;
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
    showAdminMessage: false,
});

const iconClass = 'cursor-pointer rounded-md p-1 text-[#648099] hover:bg-[#648099] hover:text-white';
</script>

<template>
    <div class="mt-7 flex flex-col items-center gap-4">
        <!-- Кнопка удаления -->
        <button
            v-if="props.showDelete"
            type="button"
            data-tooltip-target="tooltip-delete"
            data-tooltip-placement="top"
            class="relative"
            @click="props.onDelete?.()"
        >
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" :class="['w-9', iconClass]">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
            </svg>
        </button>
        <Tooltip id="tooltip-delete" text="Удалить" :show="props.showDelete" />

        <!-- Кнопка поднять -->
        <button v-if="props.showRaise" data-tooltip-target="tooltip-up" data-tooltip-placement="top" class="relative">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" :class="['w-8', iconClass]">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 10.5 12 3m0 0 7.5 7.5M12 3v18" />
            </svg>
        </button>
        <Tooltip id="tooltip-up" text="Поднять акцию" :show="props.showRaise" />

        <!-- Кнопка редактирования -->
        <Link
            v-if="props.showEdit"
            :href="route('promos.edit', props.promoId)"
            data-tooltip-target="tooltip-edit"
            data-tooltip-placement="top"
            class="relative"
        >
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" :class="['w-8', iconClass]">
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125"
                />
            </svg>
        </Link>
        <Tooltip id="tooltip-edit" text="Редактировать" :show="props.showEdit" />

        <!-- Кнопка завершения -->
        <button
            v-if="props.showComplete"
            type="button"
            data-tooltip-target="tooltip-complete"
            data-tooltip-placement="top"
            class="relative"
            @click="props.onComplete?.()"
        >
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" :class="['w-9', iconClass]">
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88"
                />
            </svg>
        </button>
        <Tooltip id="tooltip-complete" text="Завершить акцию" :show="props.showComplete" />

        <!-- Кнопка сообщения от админа -->
        <button
            v-if="props.showAdminMessage"
            type="button"
            data-tooltip-target="tooltip-admin-message"
            data-tooltip-placement="top"
            class="relative"
            @click="props.onAdminMessage?.()"
        >
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" :class="['w-8', iconClass]">
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75"
                />
            </svg>
        </button>
        <Tooltip id="tooltip-admin-message" text="Сообщение от администрации" :show="props.showAdminMessage" />
    </div>
</template>
