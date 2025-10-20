<script setup lang="ts">
import { computed, ref } from 'vue';
import ToggleSwitch from './ToggleSwitch.vue';

const props = defineProps<{
    modelValue: string;
}>();

const emit = defineEmits<{
    'update:modelValue': [value: string];
}>();

const isOpen = ref(props.modelValue !== '');

const localValue = computed({
    get: () => props.modelValue,
    set: (value: string) => emit('update:modelValue', value)
});
</script>

<template>
    <div class="mt-8 flex flex-col rounded-2xl bg-white p-8 max-md:p-4" id="sedmoi">
        <div class="flex flex-row items-center justify-between max-md:flex-col max-md:items-start">
            <p class="all_text max-w-md text-black/50 max-md:mb-4 max-md:w-full">
                <strong class="text-base text-black">Если у вас есть видео на YouTube о том, чем вы занимаетесь</strong>
                или продаете, вы можете указать здесь ссылку на него.
            </p>
            <ToggleSwitch v-model="isOpen" />
        </div>
        <div v-show="isOpen" class="my-4" id="youtube_link">
            <div class="h-px w-full bg-black/30"></div>
            <div class="mt-4 flex flex-col">
                <label for="" class="font-bold">Ссылка на ролик</label>
                <input v-model="localValue" type="text" class="mt-3 w-full rounded-lg border-gray-300" placeholder="https://www.youtube.com/watch?v=4kwHJWwJxnU" />
            </div>
        </div>
    </div>
</template>
