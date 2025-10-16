<script setup lang="ts">
import { ref } from 'vue';
import ToggleSwitch from './ToggleSwitch.vue';

const isOpen = ref(false);
</script>

<template>
    <div class="mt-8 flex flex-col rounded-2xl bg-white p-8 max-md:p-4" id="sedmoi">
        <div class="flex flex-row items-center justify-between max-md:flex-col max-md:items-start">
            <p class="all_text w-[450px] text-black/50 max-md:mb-4 max-md:w-full">
                <strong class="text-base text-black">Если у вас есть видео на YouTube о том, чем вы занимаетесь</strong>
                или продаете, вы можете указать здесь ссылку на него.
            </p>
            <ToggleSwitch v-model="isOpen" />
        </div>
        <div v-show="isOpen" class="my-4" id="youtube_link">
            <div class="h-[1px] w-full bg-black/30"></div>
            <div class="mt-4 flex flex-col">
                <label for="" class="font-bold">Ссылка на ролик</label>
                <input type="text" class="mt-3 w-full rounded-lg border-gray-300" placeholder="https://www.youtube.com/watch?v=4kwHJWwJxnU" />
            </div>
        </div>
    </div>
</template>
