<template>
    <transition name="fade">
        <div
            class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50"
            @click.self="$emit('close')"
        >
            <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md">
                <h3 class="text-xl font-semibold mb-4">Форма</h3>
                <form @submit.prevent="submitForm" class="space-y-4">
                    <div>
                        <label for="name" class="block mb-1 font-medium">Имя:</label>
                        <input
                            id="name"
                            v-model="form.name"
                            type="text"
                            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        />
                        <p v-if="form.errors.name" class="text-red-600 text-sm mt-1">{{ form.errors.name }}</p>
                    </div>

                    <div>
                        <label for="email" class="block mb-1 font-medium">Email:</label>
                        <input
                            id="email"
                            v-model="form.email"
                            type="email"
                            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        />
                        <p v-if="form.errors.email" class="text-red-600 text-sm mt-1">{{ form.errors.email }}</p>
                    </div>

                    <div class="flex justify-end space-x-2">
                        <button
                            type="button"
                            @click="$emit('close')"
                            class="px-4 py-2 rounded border border-gray-300 hover:bg-gray-100 transition"
                        >
                            Отмена
                        </button>
                        <button
                            type="submit"
                            :disabled="form.processing"
                            class="px-4 py-2 rounded bg-blue-600 text-white hover:bg-blue-700 transition disabled:opacity-50"
                        >
                            Отправить
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </transition>
</template>

<script setup lang="ts">
import { useForm } from '@inertiajs/inertia-vue3'

const form = useForm({
    name: '',
    email: '',
})

function submitForm() {
    form.post('/submit-form', {
        onSuccess: () => {
            form.reset()

            emit('close')
        },
    })
}

const emit = defineEmits(['close'])
</script>
