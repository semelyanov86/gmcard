<script setup lang="ts">
import { Button } from '@/components/ui/button';

interface Props {
    enabling: boolean;
}

defineProps<Props>();

const emit = defineEmits<{
    (event: 'enable'): void;
}>();
</script>

<template>
    <div class="space-y-4">
        <p class="text-sm text-muted-foreground">
            Когда двухфакторная аутентификация включена, вам потребуется вводить защищённый код при входе. 
            Вы можете получить этот код из приложения Google Authenticator на вашем телефоне.
        </p>

        <Button @click="emit('enable')" :disabled="enabling">
            {{ enabling ? 'Включение...' : 'Включить двухфакторную аутентификацию' }}
        </Button>
    </div>
</template>

