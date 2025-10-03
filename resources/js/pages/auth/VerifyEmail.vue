<script setup lang="ts">
import TextLink from '@/components/TextLink.vue';
import { useForm } from '@inertiajs/vue3';
import AuthCustomLayout from '@/layouts/auth/AuthCustomLayout.vue';
import PrimaryButton from '@/components/primitives/PrimaryButton.vue';

defineProps<{
    status?: string;
}>();

const form = useForm({});

const submit = () => {
    form.post(route('verification.send'));
};
</script>

<template>
    <AuthCustomLayout title="Подтвердите email">
        <div v-if="status === 'verification-link-sent'" class="mb-4 mt-6 text-center text-sm font-medium text-green-600">
            Новое письмо с подтверждением отправлено на указанный при регистрации email адрес.
        </div>
        
        <p class="w-full text-lg mt-10">Пожалуйста, подтвердите свой email адрес, перейдя по ссылке в письме, которое мы только что отправили вам.</p>
        
        <form @submit.prevent="submit" class="flex flex-col w-full">
            <PrimaryButton type="submit" :disabled="form.processing" :loading="form.processing" class="mt-10">
                Отправить письмо подтверждения
            </PrimaryButton>
        </form>
        
        <p class="mt-10 text-base text-center">
            <TextLink :href="route('logout')" method="post" as="button" class="font-bold hover:text-[#F9D914] underline">Выйти</TextLink>
        </p>
    </AuthCustomLayout>
</template>
