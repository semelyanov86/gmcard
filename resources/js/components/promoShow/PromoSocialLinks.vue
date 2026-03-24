<script setup lang="ts">
defineProps<{
    links?: Record<string, string[] | null> | null;
}>();
</script>

<template>
    <div>
        <ul class="masrginsBlock m-10 mb-5 flex items-center gap-2">
            <li v-if="links?.ins?.[0]" class="rounded-full shadow-2xl">
                <a :href="links.ins[0]" target="_blank" rel="noopener noreferrer"><img src="/images/png/sale/sale_ins.png" class="w-7" alt="Instagram" /></a>
            </li>
            <li v-if="links?.ok?.[0]" class="rounded-full shadow-2xl">
                <a :href="links.ok[0]" target="_blank" rel="noopener noreferrer"><img src="/images/png/sale/sale_ok.png" class="w-7" alt="Одноклассники" /></a>
            </li>
            <li v-if="links?.web?.[0]" class="rounded-full shadow-2xl">
                <a :href="links.web[0]" target="_blank" rel="noopener noreferrer"><img src="/images/png/sale/sale_sky.png" class="w-7" alt="Веб-сайт" /></a>
            </li>
            <li v-if="links?.vk?.[0]" class="rounded-full shadow-2xl">
                <a :href="links.vk[0]" target="_blank" rel="noopener noreferrer"><img src="/images/png/sale/sale_twit.png" class="w-7" alt="Вконтакте" /></a>
            </li>
            <li v-if="links?.lin?.[0]" class="rounded-full shadow-2xl">
                <a :href="links.lin[0]" target="_blank" rel="noopener noreferrer"><img src="/images/png/sale/sale_lin.png" class="w-7" alt="LinkedIn" /></a>
            </li>
            <li v-if="links?.you?.[0]" class="rounded-full shadow-2xl">
                <a :href="links.you[0]" target="_blank" rel="noopener noreferrer"><img src="/images/png/sale/sale_you.png" class="w-7" alt="YouTube" /></a>
            </li>
            <li v-if="links?.web?.[0]" class="rounded-full shadow-2xl">
                <a :href="links.web[0]" target="_blank" rel="noopener noreferrer"><img src="/images/png/constructor/socialWeb.png" class="w-7" alt="Веб-сайт" /></a>
            </li>
            <li v-if="links?.email?.[0]" class="rounded-full shadow-2xl">
                <a :href="links.email[0]" target="_blank" rel="noopener noreferrer"><img src="/images/png/constructor/socialemail.png" class="w-7" alt="Электронная почта" /></a>
            </li>
            <li v-if="links?.vk?.[0]" class="rounded-full shadow-2xl">
                <a :href="links.vk[0]" target="_blank" rel="noopener noreferrer"><img src="/images/png/constructor/socialVk.png" class="w-7" alt="Вконтакте" /></a>
            </li>
            <li v-if="links?.tel?.[0]" class="rounded-full shadow-2xl">
                <a :href="links.tel[0]" target="_blank" rel="noopener noreferrer"><img src="/images/png/constructor/socialTelegram.png" class="w-7" alt="Telegram" /></a>
            </li>
            <li v-if="links?.wha?.[0]" class="rounded-full shadow-2xl">
                <a :href="links.wha[0]" target="_blank" rel="noopener noreferrer"><img src="/images/png/constructor/socialWha.png" class="w-7" alt="WhatsApp" /></a>
            </li>
            <li v-if="links?.vib?.[0]" class="rounded-full shadow-2xl">
                <a :href="links.vib[0]" target="_blank" rel="noopener noreferrer"><img src="/images/png/constructor/socialViber.png" class="w-7" alt="Viber" /></a>
            </li>
        </ul>
        <div v-if="links?.web?.[0]" class="masrginsBlock m-10 mb-5 flex items-center gap-2">
            <span>Наш сайт:</span>
            <a :href="links.web[0]" target="_blank" rel="noopener noreferrer" class="promo-main-link hover:underline">
                {{ links.web[0] }}
            </a>
        </div>
    </div>
</template>

<style scoped>
.promo-main-link {
    color: #1463b9;
}
</style>
