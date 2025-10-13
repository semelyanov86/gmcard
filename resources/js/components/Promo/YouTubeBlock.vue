<script setup lang="ts">
import { ref } from 'vue';
import ToggleSwitch from './ToggleSwitch.vue';

const isOpen = ref(false);
</script>

<template>
    <div class="flex bg-white p-8 max-md:p-4 mt-8 rounded-2xl flex-col" id="sedmoi">
        <div class="flex flex-row max-md:flex-col justify-between items-center max-md:items-start">
            <p class="w-[450px] max-md:w-full text-black/50 all_text max-md:mb-4">
                <strong class="text-black text-base">Если у вас есть видео на YouTube о том, чем вы занимаетесь</strong>
                или продаете, вы можете указать здесь ссылку на него.
            </p>
            <ToggleSwitch v-model="isOpen" />
        </div>
        <div v-show="isOpen" class="my-4" id="youtube_link">
            <div class="h-[1px] w-full bg-black/30"></div>
            <div class="flex flex-col mt-4">
                <label for="" class="font-bold">Ссылка на ролик</label>
                <input 
                    type="text" 
                    class="w-full rounded-lg mt-3 border-gray-300" 
                    placeholder="https://www.youtube.com/watch?v=4kwHJWwJxnU"
                >
            </div>
        </div>
    </div>
</template>

