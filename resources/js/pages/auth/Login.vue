<script setup lang="ts">
import TextLink from '@/components/TextLink.vue';
import { useForm } from '@inertiajs/vue3';
import { LoaderCircle } from 'lucide-vue-next';
import AdaptiveImage from '@/components/ui/AdaptiveImage.vue';
import { ref } from 'vue';

defineProps<{
    status?: string;
    canResetPassword: boolean;
}>();

const form = useForm({
    email: '',
    password: '',
});

const showPassword = ref(false);

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <section class="w-full h-full flex items-center justify-center pt-10 pb-14">
        <div class="w-[500px] flex items-center flex-col justify-center bestForm px-4">
            <AdaptiveImage image-path="logo" alt="logo" class="w-14 h-14" :critical="true"></AdaptiveImage>
            <h1 class="text-[32px] font-bold w-full max-w-[550px] text-center lett mt-10 tracking-tighter leading-tight text-foreground bestForm">Войдите в свой аккаунт</h1>
            <div v-if="status" class="mb-4 mt-6 text-center text-sm font-medium text-green-600">
                {{ status }}
            </div>
            <p class="w-full text-lg mt-10">Введите email и пароль для входа</p>
            <form @submit.prevent="submit" class="flex flex-col w-full">
                <div class="flex flex-col w-full mt-5 relative">
                    <label for="email" class="text-sm font-semibold mb-2">Ваш адрес электронной почты</label>
                    <input id="email" type="email" placeholder="Ваш адрес электронной почты" name="email" required :tabindex="2" autocomplete="email" v-model="form.email" class="border border-black/40 p-3 w-full rounded-md">
                    <i class="text-[12px] opacity-50 absolute right-1 top-0">* обязательное поле</i>
                    <p v-if="form.errors.email" class="flex items-center gap-1 text-xs text-red-500 mt-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-red-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                        </svg>
                        {{ form.errors.email }}
                    </p>
                </div>

                <div class="flex flex-col w-full mt-5 relative">
                    <label for="password" class="text-sm font-semibold mb-2">Ваш пароль</label>
                    <input
                        id="password"
                        :type="showPassword ? 'text' : 'password'"
                        minlength="8"
                        placeholder="Ваш пароль"
                        name="password"
                        required
                        :tabindex="3"
                        autocomplete="current-password"
                        v-model="form.password"
                        class="border border-black/40 p-3 pr-10 w-full rounded-md"
                    >
                    <img
                        src="/images/svg/passSee.svg"
                        alt="Показать пароль"
                        @click="showPassword = !showPassword"
                        class="w-5 h-5 absolute right-4 top-10 opacity-70 hover:opacity-100 cursor-pointer"
                    >
                    <i class="text-[12px] opacity-50 absolute right-1 top-0">* обязательное поле</i>
                    <p v-if="form.errors.password" class="flex items-center gap-1 text-xs text-red-500 mt-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-red-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                        </svg>
                        {{ form.errors.password }}
                    </p>
                </div>
                <button
                    type="submit"
                    :disabled="form.processing"
                    class="bg-[#F4D710] hover:bg-[#F9D914] disabled:opacity-50 disabled:cursor-not-allowed py-4 w-full text-lg font-bold rounded-2xl mt-10 btn_register cursor-pointer flex items-center justify-center gap-2"
                >
                    <LoaderCircle v-if="form.processing" class="h-5 w-5 animate-spin" />
                    Войти
                </button>
            </form>
            <p class="mt-10 text-base text-center">
                Забыл пароль?
                <TextLink :href="route('password.request')" class="font-bold ml-1 hover:text-[#F9D914] underline">Восстановить</TextLink>
            </p>
        </div>
    </section>
</template>
