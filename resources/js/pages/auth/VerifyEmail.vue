<script setup lang="ts">
import TextLink from '@/components/TextLink.vue';
import { useForm } from '@inertiajs/vue3';
import { LoaderCircle } from 'lucide-vue-next';
import AuthCustomLayout from '@/layouts/auth/AuthCustomLayout.vue';

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
            <button
                type="submit"
                :disabled="form.processing"
                class="bg-[#F4D710] hover:bg-[#F9D914] disabled:opacity-50 disabled:cursor-not-allowed py-4 w-full text-lg font-bold rounded-2xl mt-10 btn_register cursor-pointer flex items-center justify-center gap-2"
            >
                <LoaderCircle v-if="form.processing" class="h-5 w-5 animate-spin" />
                Отправить письмо подтверждения
            </button>
        </form>
        
        <p class="mt-10 text-base text-center">
            <TextLink :href="route('logout')" method="post" as="button" class="font-bold hover:text-[#F9D914] underline">Выйти</TextLink>
        </p>
    </AuthCustomLayout>
</template>
