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

const promoTypes = [
    {
        id: 1,
        title: 'Просто скидка',
        description: 'Просто скидка - вы предлагаете пользователям скидку на ваш товар или услугу, при этом она может быть применена при наборе определенной суммы или без таковой. Для скидки не требуется купон. Если у вас интернет магазин - вы можете указать промокод для скидки в конструкторе акций ниже.',
        size: 'large'
    },
    {
        id: 2,
        title: 'Купон на скидку',
        description: 'Купон на скидку - почти тоже, что и просто скидка, но в этом случае пользователю необходимо предоставить купон на скидку. Может быть применено правило что акция действует при наборе определенной суммы.',
        size: 'large'
    },
    {
        id: 3,
        title: 'Подарок при покупке',
        description: 'Подарок при покупке - вы предлагаете пользователям подарок при покупке вашего товара или услуги, при этом подарок может быть применен при наборе определенной суммы или без таковой.',
        size: 'large'
    },
    {
        id: 4,
        title: '2 по цене 1',
        description: '2 по цене 1 - вы предлагаете пользователям воспользоваться приобретением вашего товара или услуги и получить второй аналогичный товар или услугу бесплатно. Может быть применено правило что акция действует при наборе определенной суммы.',
        size: 'small'
    },
    {
        id: 5,
        title: '3 по цене 2',
        description: '3 по цене 2 - вы предлагаете пользователям воспользоваться приобретением 2х ваших товаров или услуг и получить третий аналогичный товар или услугу бесплатно. Может быть применено правило что акция действует при наборе определенной суммы.',
        size: 'small'
    },
    {
        id: 6,
        title: 'Кэшбек',
        description: 'Совместная покупка - вы предлагаете пользователям приобрести у вас товар или услугу с большим дисконтом, смысл ее в том что вы сразу получается поток заказов, а пользователи получают хороший дисконт.',
        size: 'small'
    },
    {
        id: 7,
        title: 'Конкурс',
        description: 'Конкурс - вы предлагаете пользователям принять участие в конкурсе, где предлагаете им сделать определённое действие и по итогам конкурса вами будет разыгран какой-то ценный предмет или услуга, которых в свою очередь может быть несколько.',
        size: 'small'
    }
];

function selectPromo(id: number) {
    emit('update:selectedPromo', id);
}

function getPromoClasses(id: number) {
    const isSelected = props.selectedPromo === id;
    const isHovered = hoveredPromo.value === id;

    const sizeClasses = promoTypes.find(p => p.id === id)?.size === 'large'
        ? 'w-[230px] h-[230px]'
        : 'w-[160px] h-[160px]';

    let colorClasses = '';

    if (isSelected) {
        colorClasses = `bgColor${id}`;
    } else if (isHovered) {
        colorClasses = id === 1 ? 'bgColor1' : `promo_hover${id}`;
    } else {
        colorClasses = `promo_image${id}`;
    }

    const blockType = promoTypes.find(p => p.id === id)?.size === 'large' ? 'promo_blocks' : 'promo_blocks2';

    return `${blockType} ${sizeClasses} bg-[#e4ecef] rounded-2xl relative flex justify-center cursor-pointer ${colorClasses}`;
}
</script>

<template>
    <div class="flex flex-wrap bg-white p-8 md:p-4 mt-4 md:mt-8 rounded-2xl justify-between gap-4 md:gap-2">
        <div
            v-for="promo in promoTypes"
            :key="promo.id"
            :id="`promo${promo.id}`"
            :class="getPromoClasses(promo.id)"
            @mouseenter="hoveredPromo = promo.id"
            @mouseleave="hoveredPromo = null"
            @click="selectPromo(promo.id)"
        >
            <span class="absolute bottom-4 text-bottom text-base font-bold">{{ promo.title }}</span>
            <span
                data-tooltip-target="tooltip"
                data-tooltip-trigger="hover"
                type="button"
                class="absolute right-4 text-xs top-2 bg-white px-[8px] py-[2px] rounded-full"
            >
                ?
            </span>
            <div
                role="tooltip"
                class="absolute w-[320px] z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700"
            >
                {{ promo.description }}
            </div>
        </div>
    </div>
</template>
