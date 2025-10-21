<script setup lang="ts">
interface MenuItem {
    label: string;
    href: string;
}

const menuItems: MenuItem[] = [
    { label: 'Главная', href: '#' },
    { label: 'Пользователям', href: 'discount.html' },
    { label: 'Кэшбек', href: 'kashback.html' },
    { label: 'Для бизнеса', href: 'buis.html' },
    { label: 'Правила', href: 'help.html' },
    { label: 'Контакты', href: 'help.html' },
];
</script>

<template>
    <div class="animated-block hidden w-full rounded-b-md bg-sky-500 px-12 py-4 font-semibold shadow-lg">
        <ul class="flex flex-col">
            <li v-for="item in menuItems" :key="item.label" class="py-3 opacity-85 hover:opacity-100">
                <a :href="item.href" class="text-base text-white">{{ item.label }}</a>
            </li>
        </ul>
    </div>
</template>
