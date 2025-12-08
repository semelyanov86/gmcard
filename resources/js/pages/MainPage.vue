<script setup lang="ts">
import '../../css/internal/output.css';
import Header from '@/components/Header.vue';
import FlashToaster from '@/components/system/FlashToaster.vue';
import CategoriesMenu from '@/components/CategoriesMenu.vue';
import NavBar from '@/components/NavBar.vue';
import { usePage } from '@inertiajs/vue3';
import type { CategoryModel, MenuData } from '@/types';
import MobileMenu from '@/components/MobileMenu.vue';

const page = usePage<AppPageProps>();
const props = defineProps<{
    categories: CategoryModel[];
    navbarMenu: MenuData[];
}>();
</script>

<template>
    <div class="main-page">
        <Header :user-data="page.props.userData" />
        <FlashToaster />

        <section id="section-1" class="body h-full max-w-full overflow-hidden pb-9">
            <MobileMenu />
            <div class="mx-auto w-[1140px] 2xl:w-full 2xl:px-4">
                <NavBar :menu-items="props.navbarMenu" />
                <CategoriesMenu :categories="props.categories" />



            </div>
        </section>
    </div>
</template>
