<script setup lang="ts">
import PrimaryButton from '@/components/primitives/PrimaryButton.vue';
import TextLink from '@/components/TextLink.vue';
import AuthCustomLayout from '@/layouts/auth/AuthCustomLayout.vue';
import { useForm } from '@inertiajs/vue3';

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
        <div v-if="status === 'verification-link-sent'" class="mt-6 mb-4 text-center text-sm font-medium text-green-600">
            Новое письмо с подтверждением отправлено на указанный при регистрации email адрес.
        </div>

        <p class="mt-10 w-full text-lg">Пожалуйста, подтвердите свой email адрес, перейдя по ссылке в письме, которое мы только что отправили вам.</p>

        <form @submit.prevent="submit" class="flex w-full flex-col">
            <PrimaryButton type="submit" :disabled="form.processing" :loading="form.processing" class="mt-10">
                Отправить письмо подтверждения
            </PrimaryButton>
        </form>

        <p class="mt-10 text-center text-base">
            <TextLink :href="route('logout')" method="post" as="button" class="font-bold underline hover:text-[#F9D914]">Выйти</TextLink>
        </p>
    </AuthCustomLayout>
</template>
