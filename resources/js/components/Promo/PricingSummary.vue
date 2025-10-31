<script setup lang="ts">
import { computed } from 'vue';

const props = defineProps<{
    balance?: number;
    bonusBalance?: number;
    useBonusBalance?: boolean;
    durationDays?: number;
    showInBanner?: boolean;
    activePromosCount?: number;
    userTariff?: {
        id: number;
        slug: string;
        name: string;
        ads_count: number;
        extra_ad_price: number;
        banner_price: number;
    } | null;
}>();

const emit = defineEmits(['update:useBonusBalance']);

const cost = computed(() => {
    if (!props.userTariff || (props.activePromosCount || 0) < props.userTariff.ads_count) {
        return 'БЕСПЛАТНО';
    }

    const days = props.durationDays || 1;
    const price = props.showInBanner ? props.userTariff.banner_price : props.userTariff.extra_ad_price;

    return `${price * days} ₽`;
});

const useBonus = computed({
    get: () => Boolean(props.useBonusBalance),
    set: (val: boolean) => emit('update:useBonusBalance', val),
});
</script>

<template>
    <div class="flex flex-row justify-between pt-8 max-md:flex-col">
        <div class="flex max-w-md flex-col max-md:w-full">
            <div class="pricer_blocks flex justify-between">
                <div>
                    <span class="text-base text-blue-500">Ваш баланс</span>
                    <h3 class="price_text text-3xl text-white">{{ balance }} руб.</h3>
                    <div class="mt-1 text-sm text-white/70">Ваш бонусный баланс {{ bonusBalance ?? 0 }} руб.</div>
                    <label class="mt-2 flex items-center gap-2 text-sm text-white/80">
                        <input type="checkbox" v-model="useBonus" />
                        <span>Использовать бонусный баланс</span>
                    </label>
                </div>
                <div>
                    <span class="text-base text-blue-500">Стоимость акции составит</span>
                    <h3 class="price_text text-3xl text-white">{{ cost }}</h3>
                </div>
            </div>
        </div>
    </div>
</template>
