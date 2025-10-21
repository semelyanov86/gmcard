<script setup lang="ts">
import InfoIcon from '@/components/primitives/icons/InfoIcon.vue';
import { usePage } from '@inertiajs/vue3';
import { computed } from 'vue';

const page = usePage();

const errors = computed(() => {
    const pageErrors = page.props.errors as Record<string, string>;
    return Object.values(pageErrors);
});

const hasErrors = computed(() => errors.value.length > 0);

function dismiss() {
    const alert = document.getElementById('validationAlert');
    if (alert) {
        alert.classList.add('hidden');
    }
}
</script>

<template>
    <div
        v-if="hasErrors"
        id="validationAlert"
        class="fixed top-2 left-[40%] z-50 mb-4 rounded-md border-4 border-red-500 bg-white p-4 max-md:right-4 max-md:left-4"
    >
        <div class="flex items-center">
            <InfoIcon custom-class="mr-2 h-4 w-4 text-red-500" />
            <span class="sr-only">Ошибка</span>
            <h3 class="text-lg font-black text-red-500">Ошибка валидации!</h3>
        </div>
        <div class="mt-2 mb-4 text-sm text-black">
            <ul class="list-inside list-disc">
                <li v-for="(error, index) in errors" :key="index">{{ error }}</li>
            </ul>
        </div>
        <div class="flex">
            <button
                type="button"
                @click="dismiss"
                class="focus:ring-red/20 rounded-lg border-2 border-red-500 bg-transparent px-3 py-1.5 text-center text-base font-medium text-red-500 hover:bg-red-500 hover:text-white focus:ring-4 focus:outline-none"
            >
                Понятно
            </button>
        </div>
    </div>
</template>
