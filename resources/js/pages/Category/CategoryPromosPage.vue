<script setup lang="ts">
import CategoriesMenu from '@/components/CategoriesMenu.vue';
import Footer from '@/components/Footer.vue';
import Header from '@/components/Header.vue';
import MobileMenu from '@/components/MobileMenu.vue';
import NavBar from '@/components/NavBar.vue';
import FilterBlock from '@/components/main/FilterBlock.vue';
import PopularPromotions from '@/components/main/PopularPromotions.vue';
import FlashToaster from '@/components/system/FlashToaster.vue';
import type { AppPageProps, CategoryModel, CityModel, ContactModel, DiscountFilterOptionModel, MenuData } from '@/types';
import type { ProfilePromo } from '@/types/promo/ProfilePromo';
import { Link, usePage } from '@inertiajs/vue3';
import { computed } from 'vue';
import '../../../css/internal/output.css';

const page = usePage<AppPageProps>();

const props = defineProps<{
    contact: ContactModel;
    navbarMenu: MenuData[];
    categories: CategoryModel[];
    category: { id: number; name: string };
    promos?: ProfilePromo[] | null;
    cities: CityModel[];
    discountFilterOptions: DiscountFilterOptionModel[];
}>();

const hasPromos = computed(() => (props.promos?.length ?? 0) > 0);
</script>
<template>
    <div class="category-promos-page">
        <Header :user-data="page.props.userData" />
        <FlashToaster />
        <section id="section-1" class="body h-full max-w-full overflow-hidden pb-9">
            <MobileMenu />
            <div class="mx-auto w-[1140px] 2xl:w-full 2xl:px-4">
                <NavBar :menu-items="props.navbarMenu" />
                <CategoriesMenu :categories="props.categories" />
                <FilterBlock :cities="props.cities" :discount-filter-options="props.discountFilterOptions" />
                <h1 class="mt-4 text-3xl font-bold text-white">{{ props.category.name }}</h1>

                <PopularPromotions v-if="hasPromos" :promos="props.promos ?? []" />

                <div
                    v-else
                    class="category-promos-empty mt-10 flex flex-col items-center justify-center rounded-2xl border border-white/10 bg-white/5 px-6 text-center md:px-12"
                >
                    <p class="max-w-2xl text-2xl font-semibold text-white/90 md:text-3xl">Акций для данной категории пока нет</p>
                    <p class="mt-5 max-w-2xl text-lg text-white/65 md:text-xl">Они скоро появятся — загляните позже.</p>
                    <Link
                        :href="route('main')"
                        class="bg-brand-blue mt-10 inline-flex items-center justify-center rounded-md px-10 py-4 text-lg font-semibold text-white no-underline shadow-lg hover:opacity-90"
                    >
                        Перейти к акциям
                    </Link>
                </div>
            </div>
        </section>
        <Footer :contact="props.contact" />
    </div>
</template>

<style scoped>
.category-promos-empty {
    height: 500px;
    min-height: 500px;
}
</style>
