<script setup lang="ts">
import HeadingSmall from '@/components/HeadingSmall.vue';
import SettingsLayout from '@/layouts/settings/Layout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <div class="min-h-screen bg-background">
        <Head title="Оформление" />

        <SettingsLayout>
            <div class="space-y-6">
                <HeadingSmall
                    title="Оформление"
                    description="Настройки внешнего вида интерфейса в личном кабинете"
                />
                <p class="text-sm text-muted-foreground">
                    Сейчас используется светлая тема. Дополнительные варианты оформления можно будет добавить позже.
                </p>
            </div>
        </SettingsLayout>
    </div>
</template>
