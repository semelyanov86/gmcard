<script setup lang="ts">
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import InputError from '@/components/InputError.vue';

interface Props {
    qrCode: string;
    setupKey: string;
    confirmationCode: string;
    confirmationError: string;
}

defineProps<Props>();

const emit = defineEmits<{
    (event: 'update:confirmationCode', value: string): void;
    (event: 'confirm'): void;
    (event: 'cancel'): void;
}>();
</script>

<template>
    <div class="space-y-6">
        <div class="rounded-lg border p-6 space-y-4">
            <h3 class="text-lg font-medium">Завершите настройку двухфакторной аутентификации</h3>

            <p class="text-sm text-muted-foreground">
                Для завершения настройки отсканируйте QR код с помощью приложения-аутентификатора на вашем телефоне 
                или введите ключ настройки вручную, а затем укажите сгенерированный код.
            </p>

            <div v-if="qrCode" class="p-4 bg-white rounded-lg inline-block" v-html="qrCode"></div>

            <div v-if="setupKey" class="p-4 bg-muted rounded-lg">
                <p class="text-sm font-medium mb-2">Ключ настройки:</p>
                <p class="font-mono text-sm">{{ setupKey }}</p>
            </div>

            <div class="space-y-4">
                <div class="grid gap-2">
                    <Label for="code">Код аутентификации</Label>
                    <Input
                        id="code"
                        :model-value="confirmationCode"
                        @update:model-value="emit('update:confirmationCode', $event)"
                        type="text"
                        inputmode="numeric"
                        class="mt-1 block w-full"
                        autofocus
                        autocomplete="one-time-code"
                        placeholder="274531"
                        @keyup.enter="emit('confirm')"
                    />
                    <InputError v-if="confirmationError" :message="confirmationError" />
                </div>

                <div class="flex gap-2">
                    <Button @click="emit('confirm')">Подтвердить</Button>
                    <Button variant="outline" @click="emit('cancel')">Отмена</Button>
                </div>
            </div>
        </div>
    </div>
</template>

