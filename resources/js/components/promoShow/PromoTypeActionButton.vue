<script setup lang="ts">
import { computed } from 'vue';

type Action = 'get-promo-code' | 'go-to-site';

const props = defineProps<{
    promoTypeIcon?: string | null;
    promoTypeId?: number | null;
    customLabel?: string | null;
    id?: string;
    disabled?: boolean;
}>();

const emit = defineEmits<{
    (e: 'get-promo-code', event: MouseEvent): void;
    (e: 'go-to-site', event: MouseEvent): void;
}>();

const icon = computed(() => (props.promoTypeIcon ?? '').toLowerCase());

const action = computed<Action>(() => {
    if (icon.value.includes('konkurs')) return 'go-to-site';
    if (icon.value.includes('gift')) return 'go-to-site';
    if (icon.value.includes('cashback')) return 'go-to-site';
    if (icon.value.includes('one_plus_one')) return 'go-to-site';
    if (icon.value.includes('two_plus_one')) return 'go-to-site';

    return 'get-promo-code';
});

const bgClass = computed(() => {
    if (icon.value.includes('konkurs')) return 'konkurs_color';
    if (icon.value.includes('coupon')) return 'coupon_color';
    if (icon.value.includes('gift')) return 'gift_color';
    if (icon.value.includes('cashback')) return 'cashback_color';
    if (icon.value.includes('one_plus_one')) return 'plus_color';
    if (icon.value.includes('two_plus_one')) return 'plus_color';

    return 'simple_color';
});

const textClass = computed(() => {
    if (icon.value.includes('coupon')) return 'text-black';
    if (icon.value.includes('gift')) return 'text-black';
    return 'text-white';
});

const label = computed(() => {
    if (props.promoTypeId === 1 && props.customLabel?.trim()) {
        return props.customLabel;
    }

    return action.value === 'get-promo-code' ? 'Получить промокод' : 'Перейти на сайт';
});

function onClick(e: MouseEvent) {
    if (props.disabled) return;

    if (action.value === 'get-promo-code') emit('get-promo-code', e);
    else emit('go-to-site', e);
}
</script>

<template>
    <button
        :id="props.id"
        :disabled="props.disabled"
        :class="['mt-5 inline-block w-full rounded-xl py-4 text-center text-lg opacity-80 hover:opacity-100', bgClass, textClass]"
        @click="onClick"
    >
        {{ label }}
    </button>
</template>

<style scoped>
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
