<script setup lang="ts">
import ChevronDownIcon from '@/components/primitives/icons/ChevronDownIcon.vue';
import type { PromoActionButtonModel } from '@/types/PromoActionButtonModel';
import { computed, ref } from 'vue';

interface Props {
    buttons: PromoActionButtonModel[];
    error?: string;
}

const props = defineProps<Props>();

const model = defineModel<number | null>({ required: true });

const isOpen = ref(false);

const selectedTitle = computed(() => {
    if (model.value === null) {
        return null;
    }
    const item = props.buttons.find((b) => b.id === model.value);

    return item?.title ?? null;
});

function selectOption(id: number): void {
    model.value = id;
    isOpen.value = false;
}

function closeDropdown(): void {
    setTimeout(() => {
        isOpen.value = false;
    }, 200);
}
</script>

<template>
    <div class="mt-8 flex flex-row items-center justify-between rounded-2xl bg-white p-8 max-md:flex-col max-md:p-4">
        <div class="flex max-w-md flex-col max-md:w-full">
            <h3 class="text-base font-bold">Выберите обязательный текст кнопки для акции</h3>
            <p class="all_text text-black/50">Выберите вариант текста, который будет показан на кнопке акции.</p>
        </div>
        <div class="ml-12 flex min-h-20 w-52 flex-col max-md:mt-4 max-md:ml-0 max-md:h-auto max-md:w-full">
            <label for="simple_action_button_id" class="text-sm font-bold">Текст кнопки</label>
            <div class="custom-select relative mt-3 w-full">
                <button
                    id="simple_action_button_id"
                    type="button"
                    class="focus:shadow-outline flex h-12 w-full cursor-pointer items-center justify-between rounded-md border bg-white px-4 py-2 pr-3 text-left text-sm leading-tight shadow-sm focus:outline-none"
                    :class="props.error ? 'border-red-600' : 'border-gray-300'"
                    @blur="closeDropdown"
                    @click="isOpen = !isOpen"
                >
                    <span class="min-w-0 truncate text-gray-600">
                        {{ selectedTitle ?? 'Выберите вариант' }}
                    </span>
                    <ChevronDownIcon custom-class="pointer-events-none h-5 w-5 shrink-0 text-gray-600" />
                </button>
                <ul
                    v-show="isOpen"
                    class="absolute z-50 mt-1 max-h-60 w-full overflow-y-auto rounded-md border border-gray-300 bg-white p-0 shadow-lg"
                >
                    <li
                        v-for="item in props.buttons"
                        :key="item.id"
                        class="cursor-pointer px-4 py-2 text-sm text-black hover:bg-gray-100"
                        :class="{ 'bg-slate-100': model === item.id }"
                        @mousedown.prevent="selectOption(item.id)"
                    >
                        {{ item.title }}
                    </li>
                </ul>
            </div>
            <p v-if="props.error" class="mt-2 text-sm text-red-600">
                {{ props.error }}
            </p>
        </div>
    </div>
</template>
