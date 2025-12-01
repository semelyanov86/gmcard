<script setup lang="ts">
import AdminMessageBlock from '@/components/AdminMessageBlock.vue';
import { computed } from 'vue';

interface Props {
    rejectionReason?: string | null;
    rejectionMessage?: string | null;
}

const props = defineProps<Props>();

const rejectionReason = computed(() => props.rejectionReason ?? null);
const rejectionMessage = computed(() => props.rejectionMessage ?? null);
const hasMessage = computed(() => Boolean(rejectionReason.value || rejectionMessage.value));
</script>

<template>
    <div class="space-y-4">
        <AdminMessageBlock label="Причина отклонения:" :content="rejectionReason" />
        <AdminMessageBlock label="Сообщение:" :content="rejectionMessage" />
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
