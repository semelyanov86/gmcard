<script setup lang="ts">
interface Props {
    isOpen: boolean;
    title: string;
}

const props = defineProps<Props>();

const emit = defineEmits<{
    (e: 'close'): void;
}>();

const closeModal = () => {
    emit('close');
};
</script>

<template>
    <div
        v-if="props.isOpen"
        class="fixed top-0 left-0 w-full h-full z-50 bg-black bg-opacity-30 overflow-auto"
        @click.self="closeModal"
    >
        <div class="flex justify-center py-10 w-full px-4">
            <div class="relative w-full max-w-2xl max-h-full z-50">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700" style="background: repeating-linear-gradient(-45deg, #e3e9ef, #e3e9ef 2.5%, #fff 0, #fff 10%);">
                    <div class="flex items-start justify-between bg-[#0066cb] p-4 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-white dark:text-white">{{ props.title }}</h3>
                        <button
                            type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            @click="closeModal"
                        >
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <div class="p-3 sm:p-6">
                        <div class="bg-white p-3 sm:p-6 space-y-6">
                            <slot />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

