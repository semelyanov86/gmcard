<script setup lang="ts">
const { balance, cost } = withDefaults(defineProps<{ balance?: number; cost?: number }>(), { balance: 0, cost: 594 });
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
                    <h3 class="price_text text-3xl text-white">{{ cost }} руб.</h3>
                </div>
            </div>
        </div>
    </div>
</template>
