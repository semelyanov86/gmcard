<script setup lang="ts">
import InputError from '@/components/InputError.vue';
import PasswordToggleIcon from '@/components/PasswordToggleIcon.vue';
import RequiredFieldHint from '@/components/RequiredFieldHint.vue';
import PrimaryButton from '@/components/primitives/PrimaryButton.vue';
import AuthCustomLayout from '@/layouts/auth/AuthCustomLayout.vue';
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

const form = useForm({
    password: '',
});

const showPassword = ref(false);

const submit = () => {
    form.post(route('password.confirm'), {
        onFinish: () => {
            form.reset();
        },
    });
};
</script>

<template>
    <AuthCustomLayout>
        <p class="mt-10 w-full text-lg">Это безопасная область приложения. Пожалуйста, подтвердите свой пароль, чтобы продолжить.</p>
        <form @submit.prevent="submit" class="flex w-full flex-col">
            <div class="relative mt-5 flex w-full flex-col">
                <label for="password" class="mb-2 text-sm font-semibold">Ваш пароль</label>
                <input
                    id="password"
                    :type="showPassword ? 'text' : 'password'"
                    minlength="8"
                    placeholder="Ваш пароль"
                    name="password"
                    required
                    autofocus
                    autocomplete="current-password"
                    v-model="form.password"
                    class="w-full rounded-md border border-black/40 p-3 pr-10"
                />
                <PasswordToggleIcon :show="showPassword" @toggle="showPassword = !showPassword" />
                <RequiredFieldHint />
                <InputError :message="form.errors.password" />
            </div>
            <PrimaryButton type="submit" :loading="form.processing" :disabled="form.processing" class="mt-10"> Подтвердить пароль </PrimaryButton>
        </form>
    </AuthCustomLayout>
</template>
