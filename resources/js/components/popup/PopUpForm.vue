<template>
    <transition name="fade">
        <div
            class="fixed inset-0 backdrop-blur-sm bg-black/10 flex justify-center items-center z-50"
            @click.self="$emit('close')"
        >
            <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md">
                <h3 class="text-2xl font-bold mb-2">Предварительная регистрация</h3>
                <p class="text-gray-600 mb-4">
                    Заполните форму, и мы свяжемся с вами, чтобы предоставить доступ и помочь начать работу.
                </p>

                <form @submit.prevent="submitForm" class="space-y-4">
                    <div>
                        <label for="name" class="block mb-1 font-medium">Ваше имя или название компании *</label>
                        <input
                            id="name"
                            v-model="form.name"
                            type="text"
                            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        />
                        <p v-if="form.errors.name" class="text-red-600 text-sm mt-1">{{ form.errors.name }}</p>
                    </div>

                    <div>
                        <label for="email" class="block mb-1 font-medium">Email *</label>
                        <input
                            id="email"
                            v-model="form.email"
                            type="email"
                            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        />
                        <p v-if="form.errors.email" class="text-red-600 text-sm mt-1">{{ form.errors.email }}</p>
                    </div>

                    <div>
                        <label for="phone" class="block mb-1 font-medium">Номер телефона (с кодом страны)</label>
                        <input
                            id="phone"
                            v-model="form.phone"
                            type="tel"
                            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        />
                        <p v-if="form.errors.phone" class="text-red-600 text-sm mt-1">{{ form.errors.phone }}</p>
                    </div>

                    <div>
                        <label for="region" class="block mb-1 font-medium">Город / Регион</label>
                        <input
                            id="region"
                            v-model="form.region"
                            type="text"
                            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        />
                        <p v-if="form.errors.region" class="text-red-600 text-sm mt-1">{{ form.errors.region }}</p>
                    </div>

                    <div class="flex items-start">
                        <input
                            id="agree"
                            v-model="form.agree"
                            type="checkbox"
                            class="mt-1 mr-2"
                        />
                        <label for="agree" class="text-sm">
                            Я соглашаюсь на обработку персональных данных в соответствии с ФЗ-152 *
                        </label>
                    </div>
                    <p v-if="form.errors.agree" class="text-red-600 text-sm mt-1">{{ form.errors.agree }}</p>

                    <div class="flex justify-between items-center gap-4 pt-2">
                        <button
                            type="button"
                            @click="$emit('close')"
                            class="w-1/2 px-4 py-2 rounded border border-gray-300 hover:bg-gray-100 transition"
                        >
                            Отмена
                        </button>
                        <button
                            type="submit"
                            :disabled="form.processing"
                            class="w-1/2 px-4 py-2 rounded bg-blue-600 text-white hover:bg-blue-700 transition disabled:opacity-50"
                        >
                            Получить доступ
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </transition>
</template>

<script setup lang="ts">
import { useForm } from '@inertiajs/inertia-vue3'

const emit = defineEmits(['close'])

const form = useForm({
    name: '',
    email: '',
    phone: '',
    region: '',
    agree: false,
})

function submitForm() {
    form.post('/submit-form', {
        onSuccess: () => {
            form.reset()
            emit('close')
        },
    })
}
</script>
