<script setup lang="ts">
import { Head, useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

import PrimaryButton from '@/components/primitives/PrimaryButton.vue';
import RecoveryCodeInput from '@/components/two-factor/RecoveryCodeInput.vue';
import TwoFactorCodeInput from '@/components/two-factor/TwoFactorCodeInput.vue';
import AuthCustomLayout from '@/layouts/auth/AuthCustomLayout.vue';

const recovery = ref(false);

const form = useForm({
    code: '',
    recovery_code: '',
});

const toggleRecovery = () => {
    recovery.value = !recovery.value;

    form.code = '';
    form.recovery_code = '';
    form.clearErrors();
};

const submit = () => {
    form.post(route('two-factor.login.store'));
};
</script>

<template>
    <AuthCustomLayout>
        <Head title="Two-Factor Authentication" />

        <div class="w-full">
            <p class="mt-5 w-full text-center text-lg">
                <template v-if="!recovery"> Введите 6-значный код из приложения </template>

                <template v-else> Введите один из кодов восстановления </template>
            </p>

            <form @submit.prevent="submit" class="flex w-full flex-col">
                <TwoFactorCodeInput v-if="!recovery" v-model="form.code" :error="form.errors.code" />

                <RecoveryCodeInput v-else v-model="form.recovery_code" :error="form.errors.recovery_code" />

                <PrimaryButton type="submit" :disabled="form.processing" :loading="form.processing" class="mt-10"> Войти </PrimaryButton>

                <div class="mt-5 flex items-center justify-center">
                    <button
                        type="button"
                        @click.prevent="toggleRecovery"
                        class="text-sm text-gray-600 underline transition-colors hover:text-gray-900"
                    >
                        <template v-if="!recovery"> Использовать код восстановления </template>

                        <template v-else> Использовать код из приложения </template>
                    </button>
                </div>
            </form>
        </div>
    </AuthCustomLayout>
</template>
