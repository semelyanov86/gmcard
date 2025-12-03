<script setup lang="ts">
import { useForm } from '@inertiajs/vue3';
import { Modal } from '@inertiaui/modal-vue';

interface Props {
    promoId: number;
}

const props = defineProps<Props>();

const form = useForm({
    rejection_reason: '',
    message: '',
});

const submitReject = (close: () => void) => {
    form.post(route('moderation.promos.reject', props.promoId), {
        preserveScroll: true,
        preserveState: true,
        onSuccess: () => {
            close();
        },
    });
};
</script>

<template>
    <Modal title="Сообщение владельцу акции" v-slot="{ close }">
        <form @submit.prevent="submitReject(close)">
            <div class="mb-4">
                <label for="rejection_reason" class="mb-2 block text-sm font-medium text-gray-700">
                    Причина отклонения <span class="text-red-500">*</span>
                </label>
                <textarea
                    id="rejection_reason"
                    v-model="form.rejection_reason"
                    required
                    minlength="10"
                    maxlength="1000"
                    rows="4"
                    class="focus:border-button w-full rounded-lg border border-black/20 p-2 placeholder:font-semibold focus:outline-none"
                    placeholder="Укажите причину отклонения акции"
                ></textarea>
                <p v-if="form.errors.rejection_reason" class="mt-1 text-sm text-red-500">
                    {{ form.errors.rejection_reason }}
                </p>
            </div>
            <div class="mb-4">
                <label for="message" class="mb-2 block text-sm font-medium text-gray-700">Сообщение (необязательно)</label>
                <textarea
                    id="message"
                    v-model="form.message"
                    maxlength="500"
                    rows="3"
                    class="focus:border-button w-full rounded-lg border border-black/20 p-2 placeholder:font-semibold focus:outline-none"
                    placeholder="Дополнительное сообщение для владельца акции"
                ></textarea>
                <p v-if="form.errors.message" class="текст-sm mt-1 text-red-500">{{ form.errors.message }}</p>
            </div>
            <div class="flex items-center justify-center gap-4">
                <button
                    type="button"
                    @click="close"
                    class="rounded-lg bg-gray-200 px-5 py-2.5 text-base font-medium text-gray-700 hover:bg-gray-300 focus:ring-4 focus:ring-gray-300 focus:outline-none"
                >
                    Отмена
                </button>
                <button
                    type="submit"
                    :disabled="form.processing"
                    class="rounded-lg bg-blue-700 px-5 py-2.5 text-center text-base font-medium text-white hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 focus:outline-none disabled:opacity-50 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                >
                    Отправить
                </button>
            </div>
        </form>
    </Modal>
</template>
