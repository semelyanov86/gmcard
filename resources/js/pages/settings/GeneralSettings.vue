<template>
    <div>
        <h1>Общие настройки</h1>

        <form @submit.prevent="submit">
            <div>
                <label>Email поддержки</label>
                <input type="email" v-model="form.email" required />
            </div>

            <div>
                <label>Телефон поддержки</label>
                <input type="text" v-model="form.phone" required />
            </div>

            <button type="submit">Сохранить</button>
        </form>

        <div v-if="successMessage" style="color: green; margin-top: 10px;">
            {{ successMessage }}
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue'
import { useForm } from '@inertiajs/inertia-vue3'

const props = defineProps({
    email: String,
    phone: String,
})

const form = useForm({
    email: props.email || '',
    phone: props.phone || '',
})

const successMessage = ref('')

function submit() {
    form.post('/settings/general', {
        onSuccess: () => {
            successMessage.value = 'Настройки успешно сохранены'
        },
        onError: () => {
            successMessage.value = ''
        },
    })
}
</script>
