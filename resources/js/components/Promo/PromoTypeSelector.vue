<script setup lang="ts">
import { ref } from 'vue';

interface Props {
    selectedPromo: number;
}

interface Emits {
    (e: 'update:selectedPromo', value: number): void;
}

const props = defineProps<Props>();
const emit = defineEmits<Emits>();

const hoveredPromo = ref<number | null>(null);
const activeTooltip = ref<number | null>(null);

const promoTypes = [
    {
        id: 1,
        title: 'Просто скидка',
        description:
            'Просто скидка - вы предлагаете пользователям скидку на ваш товар или услугу, при этом она может быть применена при наборе определенной суммы или без таковой. Для скидки не требуется купон. Если у вас интернет магазин - вы можете указать промокод для скидки в конструкторе акций ниже.',
        size: 'large',
    },
    {
        id: 2,
        title: 'Купон на скидку',
        description:
            'Купон на скидку - почти тоже, что и просто скидка, но в этом случае пользователю необходимо предоставить купон на скидку. Может быть применено правило что акция действует при наборе определенной суммы.',
        size: 'large',
    },
    {
        id: 3,
        title: 'Подарок при покупке',
        description:
            'Подарок при покупке - вы предлагаете пользователям подарок при покупке вашего товара или услуги, при этом подарок может быть применен при наборе определенной суммы или без таковой.',
        size: 'large',
    },
    {
        id: 4,
        title: '2 по цене 1',
        description:
            '2 по цене 1 - вы предлагаете пользователям воспользоваться приобретением вашего товара или услуги и получить второй аналогичный товар или услугу бесплатно. Может быть применено правило что акция действует при наборе определенной суммы.',
        size: 'small',
    },
    {
        id: 5,
        title: '3 по цене 2',
        description:
            '3 по цене 2 - вы предлагаете пользователям воспользоваться приобретением 2х ваших товаров или услуг и получить третий аналогичный товар или услугу бесплатно. Может быть применено правило что акция действует при наборе определенной суммы.',
        size: 'small',
    },
    {
        id: 6,
        title: 'Кэшбек',
        description:
            'Совместная покупка - вы предлагаете пользователям приобрести у вас товар или услугу с большим дисконтом, смысл ее в том что вы сразу получается поток заказов, а пользователи получают хороший дисконт.',
        size: 'small',
    },
    {
        id: 7,
        title: 'Конкурс',
        description:
            'Конкурс - вы предлагаете пользователям принять участие в конкурсе, где предлагаете им сделать определённое действие и по итогам конкурса вами будет разыгран какой-то ценный предмет или услуга, которых в свою очередь может быть несколько.',
        size: 'small',
    },
];

function selectPromo(id: number) {
    emit('update:selectedPromo', id);
}

function getPromoClasses(id: number) {
    const isSelected = props.selectedPromo === id;
    const isHovered = hoveredPromo.value === id;

    const sizeClasses = promoTypes.find((p) => p.id === id)?.size === 'large' ? 'w-[230px] h-[230px]' : 'w-[160px] h-[160px]';

    let colorClasses = '';

    if (isSelected) {
        colorClasses = `bgColor${id}`;
    } else if (isHovered) {
        colorClasses = id === 1 ? 'bgColor1' : `promo_hover${id}`;
    } else {
        colorClasses = `promo_image${id}`;
    }

    const blockType = promoTypes.find((p) => p.id === id)?.size === 'large' ? 'promo_blocks' : 'promo_blocks2';

    return `${blockType} ${sizeClasses} bg-[#e4ecef] rounded-2xl relative flex justify-center cursor-pointer ${colorClasses}`;
}

function showTooltip(id: number) {
    activeTooltip.value = id;
}

function hideTooltip() {
    activeTooltip.value = null;
}
</script>

<template>
    <div class="mt-4 flex flex-wrap justify-between gap-4 rounded-2xl bg-white p-8 md:mt-8 md:gap-2 md:p-4">
        <div
            v-for="promo in promoTypes"
            :key="promo.id"
            :id="`promo${promo.id}`"
            :class="getPromoClasses(promo.id)"
            @mouseenter="hoveredPromo = promo.id"
            @mouseleave="hoveredPromo = null"
            @click="selectPromo(promo.id)"
        >
            <span class="text-bottom absolute bottom-4 text-base font-bold">{{ promo.title }}</span>
            <span
                @mouseenter="showTooltip(promo.id)"
                @mouseleave="hideTooltip"
                class="absolute top-2 right-4 cursor-pointer rounded-full bg-white px-[8px] py-[2px] text-xs hover:bg-gray-100"
            >
                ?
            </span>
            <div
                v-show="activeTooltip === promo.id"
                role="tooltip"
                class="absolute top-8 right-0 z-10 inline-block w-[320px] rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white shadow-sm"
            >
                {{ promo.description }}
            </div>
        </div>
    </div>
</template>
