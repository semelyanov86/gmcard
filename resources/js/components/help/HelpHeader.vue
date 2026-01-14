<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div class="flex flex-col items-center justify-center">
        <Link :href="route('business.landing')">
            <img src="/assets/png/logo.png" alt="Логотип" class="h-14 w-14" />
        </Link>
        <h1 class="mt-3 text-4xl font-bold md:text-3xl">
            Один аккаунт.
            <span class="text-blue-500">Весь мир GM!</span>
        </h1>
        <p class="mt-3 text-lg text-black">Один аккаунт для всех сервисов GM</p>
        <h4 class="mt-3 text-lg font-bold uppercase">GM справка</h4>
    </div>
</template>


