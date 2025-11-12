<script setup lang="ts">
import { Head, router } from '@inertiajs/vue3';
import { computed, ref } from 'vue';
import axios from 'axios';

import HeadingSmall from '@/components/HeadingSmall.vue';
import ConfirmTwoFactorSection from '@/components/two-factor/ConfirmTwoFactorSection.vue';
import EnableTwoFactorSection from '@/components/two-factor/EnableTwoFactorSection.vue';
import TwoFactorEnabledSection from '@/components/two-factor/TwoFactorEnabledSection.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import SettingsLayout from '@/layouts/settings/Layout.vue';
import { type BreadcrumbItem } from '@/types';

interface Props {
    twoFactorEnabled: boolean;
    twoFactorConfirmed: boolean;
}

const props = defineProps<Props>();

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Two-Factor Authentication',
        href: '/settings/two-factor',
    },
];

const enabling = ref(false);
const confirming = ref(false);
const disabling = ref(false);
const qrCode = ref('');
const setupKey = ref('');
const recoveryCodes = ref<string[]>([]);
const confirmationCode = ref('');
const confirmationError = ref('');
const showRecoveryCodes = ref(false);

const twoFactorEnabled = ref(props.twoFactorEnabled);

const enableTwoFactorAuthentication = () => {
    enabling.value = true;

    axios.post(route('two-factor.enable'))
        .then(() => {
            return Promise.all([
                showQrCode(),
                showSetupKey()
            ]);
        })
        .then(() => {
            enabling.value = false;
            confirming.value = true;
        })
        .catch((error) => {
            enabling.value = false;
            console.error('Error enabling 2FA:', error);
        });
};

const showQrCode = () => {
    return axios.get(route('two-factor.qr-code'))
        .then(response => {
            qrCode.value = response.data.svg;
        });
};

const showSetupKey = () => {
    return axios.get(route('two-factor.secret-key'))
        .then(response => {
            setupKey.value = response.data.secretKey;
        });
};

const showRecoveryCodesFunc = () => {
    return axios.get(route('two-factor.recovery-codes'))
        .then(response => {
            recoveryCodes.value = response.data;
            showRecoveryCodes.value = true;
        });
};

const confirmTwoFactorAuthentication = () => {
    confirmationError.value = '';

    axios.post(route('two-factor.confirm'), {
        code: confirmationCode.value
    })
    .then(() => {
        confirming.value = false;
        updateTwoFactorStatus(true);
        confirmationCode.value = '';
        return showRecoveryCodesFunc();
    })
    .catch((error) => {
        confirmationError.value = error.response?.data?.errors?.code?.[0] || 'Введённый код неверный.';
    });
};

const regenerateRecoveryCodes = () => {
    axios.post(route('two-factor.regenerate-recovery-codes'))
        .then(() => {
            return showRecoveryCodesFunc();
        });
};

const disableTwoFactorAuthentication = () => {
    if (!confirm('Вы уверены что хотите отключить двухфакторную аутентификацию?')) {
        return;
    }

    disabling.value = true;

    axios.delete(route('two-factor.disable'))
        .then(() => {
            disabling.value = false;
            updateTwoFactorStatus(false);
            confirming.value = false;
            showRecoveryCodes.value = false;
            qrCode.value = '';
            recoveryCodes.value = [];
        })
        .catch((error) => {
            disabling.value = false;
            console.error('Error disabling 2FA:', error);
        });
};

const updateTwoFactorStatus = (enabled: boolean) => {
    twoFactorEnabled.value = enabled;
};
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">
        <Head title="Two-Factor Authentication" />

        <SettingsLayout>
            <div class="space-y-6">
                <HeadingSmall
                    title="Двухфакторная аутентификация"
                    description="Добавьте дополнительную защиту вашему аккаунту с помощью двухфакторной аутентификации"
                />

                <EnableTwoFactorSection
                    v-if="!twoFactorEnabled && !confirming"
                    :enabling="enabling"
                    @enable="enableTwoFactorAuthentication"
                />

                <ConfirmTwoFactorSection
                    v-if="confirming"
                    :qr-code="qrCode"
                    :setup-key="setupKey"
                    v-model:confirmation-code="confirmationCode"
                    :confirmation-error="confirmationError"
                    @confirm="confirmTwoFactorAuthentication"
                    @cancel="confirming = false; qrCode = ''"
                />

                <TwoFactorEnabledSection
                    v-if="twoFactorEnabled && !confirming"
                    :recovery-codes="recoveryCodes"
                    :show-recovery-codes="showRecoveryCodes"
                    :disabling="disabling"
                    @show-recovery-codes="showRecoveryCodesFunc"
                    @regenerate-recovery-codes="regenerateRecoveryCodes"
                    @disable="disableTwoFactorAuthentication"
                />
            </div>
        </SettingsLayout>
    </AppLayout>
</template>

