<script setup lang="ts">
import { ProfilePromo } from '@/types/promo/ProfilePromo';
import { computed } from 'vue';

interface Props {
    promo: ProfilePromo | null;
}

const props = defineProps<Props>();

const rejectionReason = computed(() => {
    return props.promo?.rejectionReason ?? null;
});

const rejectionMessage = computed(() => {
    return props.promo?.rejectionMessage ?? null;
});

const hasMessage = computed(() => {
    return Boolean(rejectionReason.value || rejectionMessage.value);
});
</script>

<template>
    <div class="space-y-4">
        <div v-if="rejectionReason">
            <label class="mb-2 block text-sm font-medium text-gray-700">Причина отклонения:</label>
            <div class="min-h-[100px] w-full rounded-lg border border-black/20 bg-gray-50 p-4 text-sm whitespace-pre-wrap">
                {{ rejectionReason }}
            </div>
        </div>
        <div v-if="rejectionMessage">
            <label class="mb-2 block text-sm font-medium text-gray-700">Сообщение:</label>
            <div class="min-h-[80px] w-full rounded-lg border border-black/20 bg-gray-50 p-4 text-sm whitespace-pre-wrap">
                {{ rejectionMessage }}
            </div>
        </div>
        <div v-if="!hasMessage">
            <p class="text-sm text-gray-500 italic">Сообщение от администрации отсутствует</p>
        </div>
        <p class="text-sm text-black/70">
            Вы получили сообщение от администрации сервиса. В сообщении указываются причины, почему ваше объявление на данный момент не может быть
            опубликовано. Устраните данные нарушения и отправьте заявку на публикацию заново. После проверки, если все недочеты устранены - ваша акция
            будет опубликована. Подробнее в разделе
            <a href="/rules.html" class="text-blue-500">"GM Справка"</a>
        </p>
    </div>
</template>
