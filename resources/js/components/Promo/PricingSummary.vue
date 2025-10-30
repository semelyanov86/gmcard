<script setup lang="ts">
import { computed } from 'vue'

const props = defineProps<{
    balance?: number
    durationDays?: number
    showInBanner?: boolean
    activePromosCount?: number
}>()

const cost = computed(() => {
    const days = props.durationDays || 1

    if ((props.activePromosCount || 0) === 0) {
        return 'БЕСПЛАТНО'
    }

    const dailyRate = props.showInBanner ? 30 : 3
    const totalCost = dailyRate * days

    return `${totalCost} ₽`
})
</script>

<template>
    <div class="flex flex-row justify-between pt-8 max-md:flex-col">
        <div class="flex max-w-md flex-col max-md:w-full">
            <div class="pricer_blocks flex justify-between">
                <div>
                    <span class="text-base text-blue-500">Ваш баланс</span>
                    <h3 class="price_text text-3xl text-white">{{ balance }} руб.</h3>
                </div>
                <div>
                    <span class="text-base text-blue-500">Стоимость акции составит</span>
                    <h3 class="price_text text-3xl text-white">{{ cost }}</h3>
                </div>
            </div>
        </div>
    </div>
</template>
