<script setup lang="ts">
import { Button } from '@/components/ui/button';

interface Props {
    recoveryCodes: string[];
    showRecoveryCodes: boolean;
    disabling: boolean;
}

defineProps<Props>();

const emit = defineEmits<{
    (event: 'show-recovery-codes'): void;
    (event: 'regenerate-recovery-codes'): void;
    (event: 'disable'): void;
}>();
</script>

<template>
    <div class="space-y-6">
        <div class="rounded-lg border border-green-200 bg-green-50 p-4 dark:border-green-800 dark:bg-green-900/20">
            <p class="text-sm text-green-800 dark:text-green-200">✓ Двухфакторная аутентификация включена. Ваш аккаунт защищён!</p>
        </div>

        <div class="space-y-4">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-medium">Коды восстановления</h3>
                <Button variant="outline" size="sm" @click="emit('show-recovery-codes')" v-if="!showRecoveryCodes"> Показать коды </Button>
            </div>

            <p class="text-sm text-muted-foreground">
                Сохраните эти коды восстановления в надёжном месте. Они могут быть использованы для восстановления доступа к вашему аккаунту, если вы
                потеряете устройство с двухфакторной аутентификацией.
            </p>

            <div v-if="showRecoveryCodes && recoveryCodes.length > 0" class="space-y-4">
                <div class="rounded-lg bg-muted p-4">
                    <div class="grid gap-2 font-mono text-sm">
                        <div v-for="code in recoveryCodes" :key="code">{{ code }}</div>
                    </div>
                </div>

                <Button variant="outline" @click="emit('regenerate-recovery-codes')"> Создать новые коды </Button>
            </div>
        </div>

        <div class="space-y-4 border-t pt-6">
            <h3 class="text-lg font-medium">Отключить двухфакторную аутентификацию</h3>
            <p class="text-sm text-muted-foreground">Если вы хотите отключить двухфакторную аутентификацию, нажмите кнопку ниже.</p>

            <Button variant="destructive" @click="emit('disable')" :disabled="disabling">
                {{ disabling ? 'Отключение...' : 'Отключить двухфакторную аутентификацию' }}
            </Button>
        </div>
    </div>
</template>
