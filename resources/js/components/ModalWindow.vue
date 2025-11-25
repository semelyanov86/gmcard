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
    <div v-if="props.isOpen" class="bg-opacity-30 fixed top-0 left-0 z-50 h-full w-full overflow-auto bg-black" @click.self="closeModal">
        <div class="flex w-full justify-center px-4 py-10">
            <div class="relative z-50 max-h-full w-full max-w-2xl">
                <div
                    class="relative rounded-lg bg-white shadow dark:bg-gray-700"
                    style="background: repeating-linear-gradient(-45deg, #e3e9ef, #e3e9ef 2.5%, #fff 0, #fff 10%)"
                >
                    <div class="flex items-start justify-between rounded-t border-b bg-button p-4 dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-white dark:text-white">{{ props.title }}</h3>
                        <button
                            type="button"
                            class="ml-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white"
                            @click="closeModal"
                        >
                            <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path
                                    stroke="currentColor"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"
                                />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <div class="p-3 sm:p-6">
                        <div class="space-y-6 bg-white p-3 sm:p-6">
                            <slot />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
