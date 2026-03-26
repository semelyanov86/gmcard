<script setup lang="ts">
import { computed } from 'vue';

const props = defineProps<{
    promoTypeIcon?: string | null;
    class?: string;
}>();

const bgClass = computed(() => {
    const icon = (props.promoTypeIcon ?? '').toLowerCase();

    if (icon.includes('konkurs')) return 'konkurs_color';
    if (icon.includes('coupon')) return 'coupon_color';
    if (icon.includes('gift')) return 'gift_color';
    if (icon.includes('cashback')) return 'cashback_color';
    if (icon.includes('one_plus_one')) return 'plus_color';
    if (icon.includes('two_plus_one')) return 'plus_color';

    return 'simple_color';
});
</script>

<template>
    <div :class="['promo-type-accent-line', bgClass, props.class || '']"></div>
</template>

<style scoped>
.promo-type-accent-line {
    width: 3px;
    opacity: 0.8;
}

.konkurs_color {
    background-color: #001c86;
}

.coupon_color {
    background-color: #f4d710;
}

.gift_color {
    background-color: #bbe4ff;
}

.cashback_color {
    background-color: #e55a5a;
}

.plus_color {
    background-color: rgba(0, 0, 0, 0.9);
}

.simple_color {
    background-color: #0ca563;
}
</style>

