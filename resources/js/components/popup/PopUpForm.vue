<template>
    <div class="fixed inset-0 z-50 flex items-center justify-center bg-black/10 backdrop-blur-sm" @click.self="$emit('close')">
        <div class="w-full max-w-md rounded-lg bg-white p-6 shadow-lg">
            <h3 class="mb-2 text-2xl font-bold">Предварительная регистрация</h3>
            <p class="mb-4 text-gray-600">Заполните форму, и мы свяжемся с вами, чтобы предоставить доступ и помочь начать работу.</p>

            <form @submit.prevent="submitForm" class="space-y-4">
                <div>
                    <label for="name" class="mb-1 block font-medium">Ваше имя или название компании *</label>
                    <input
                        id="name"
                        v-model="form.name"
                        type="text"
                        class="w-full rounded border border-gray-300 px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    />
                    <p v-if="form.errors.name" class="mt-1 text-sm text-red-600">{{ form.errors.name }}</p>
                </div>

                <div>
                    <label for="email" class="mb-1 block font-medium">Email *</label>
                    <input
                        id="email"
                        v-model="form.email"
                        type="email"
                        class="w-full rounded border border-gray-300 px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    />
                    <p v-if="form.errors.email" class="mt-1 text-sm text-red-600">{{ form.errors.email }}</p>
                </div>

                <div>
                    <label for="phone" class="mb-1 block font-medium">Номер телефона (с кодом страны)</label>
                    <input
                        id="phone"
                        v-model="form.phone"
                        type="tel"
                        class="w-full rounded border border-gray-300 px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    />
                    <p v-if="form.errors.phone" class="mt-1 text-sm text-red-600">{{ form.errors.phone }}</p>
                </div>

                <div>
                    <label for="region" class="mb-1 block font-medium">Город / Регион</label>
                    <input
                        id="region"
                        v-model="form.region"
                        type="text"
                        class="w-full rounded border border-gray-300 px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    />
                    <p v-if="form.errors.region" class="mt-1 text-sm text-red-600">{{ form.errors.region }}</p>
                </div>

                <div class="flex items-start">
                    <input id="agree" v-model="form.agree" type="checkbox" class="mt-1 mr-2" />
                    <label for="agree" class="text-sm"> Я соглашаюсь на обработку персональных данных в соответствии с ФЗ-152 * </label>
                </div>
                <p v-if="form.errors.agree" class="mt-1 text-sm text-red-600">{{ form.errors.agree }}</p>

                <div class="flex items-center justify-between gap-4 pt-2">
                    <button type="button" @click="$emit('close')" class="w-1/2 rounded border border-gray-300 px-4 py-2 transition hover:bg-gray-100">
                        Отмена
                    </button>
                    <button
                        type="submit"
                        :disabled="form.processing"
                        class="w-1/2 rounded bg-blue-600 px-4 py-2 text-white transition hover:bg-blue-700 disabled:opacity-50"
                    >
                        Получить доступ
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>

<script setup lang="ts">
import { useForm } from '@inertiajs/vue3';

const emit = defineEmits<{
    (event: 'close'): void;
}>();

const form = useForm({
    name: '',
    email: '',
    phone: '',
    region: '',
    agree: false,
});

function submitForm() {
    form.post('/submit-form', {
        onSuccess: () => {
            form.reset();
            emit('close');
        },
    });
}
</script>

<style scoped>
.fade-enter-active,
.fade-leave-active {
    transition:
        opacity 0.3s ease,
        transform 0.3s ease;
}
.fade-enter-from,
.fade-leave-to {
    opacity: 0;
    transform: scale(0.95);
}
.fade-enter-to,
.fade-leave-from {
    opacity: 1;
    transform: scale(1);
}
</style>
