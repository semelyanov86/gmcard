<script setup lang="ts">
import InputError from '@/components/InputError.vue';
import PrimaryButton from '@/components/primitives/PrimaryButton.vue';
import { useForm } from '@inertiajs/vue3';

defineProps<{
    status?: string;
}>();

const resetForm = useForm({
    email: '',
});

const submitReset = () => {
    resetForm.post(route('password.email'));
};
</script>

<template>
    <div class="w-full">
        <div v-if="status" class="mt-6 mb-4 text-center text-sm font-medium text-green-600">
            {{ status }}
        </div>

        <p class="mt-5 w-full text-lg">Введите email, который указывали при регистрации</p>
        <form @submit.prevent="submitReset" class="flex w-full flex-col">
            <div class="relative mt-5 flex w-full flex-col">
                <label for="reset-email" class="mb-2 text-sm font-semibold">Ваш адрес электронной почты</label>
                <input
                    id="reset-email"
                    type="email"
                    placeholder="Ваш адрес электронной почты"
                    required
                    autofocus
                    autocomplete="username"
                    v-model="resetForm.email"
                    class="w-full rounded-md border border-black/40 p-3"
                />
                <i class="absolute top-0 right-1 text-[12px] opacity-50">* обязательное поле</i>
                <InputError :message="resetForm.errors.email" />
            </div>

            <PrimaryButton type="submit" :disabled="resetForm.processing" :loading="resetForm.processing" class="mt-10">
                Отправить ссылку для сброса
            </PrimaryButton>
        </form>
    </div>
</template>

