<script setup lang="ts">
import ChevronDownIcon from '@/components/primitives/icons/ChevronDownIcon.vue';
import TrashIcon from '@/components/primitives/icons/TrashIcon.vue';
import { onBeforeUnmount, ref } from 'vue';

const isOpen = ref(false);
const showSlot5 = ref(false);

const photos = defineModel<Array<File | null>>({ required: true });

const previews = ref<Array<string | null>>(Array(5).fill(null));

onBeforeUnmount(() => {
    for (const url of previews.value) {
        if (url) URL.revokeObjectURL(url);
    }
});

function handleFileChange(slotIndex: number, event: Event) {
    const input = event.target as HTMLInputElement;
    const file = input.files?.[0];
    if (!file) return;

    if (previews.value[slotIndex]) URL.revokeObjectURL(previews.value[slotIndex]!);
    previews.value[slotIndex] = URL.createObjectURL(file);
    const targetIndex = 3 + slotIndex;
    photos.value[targetIndex] = file;
    input.value = '';
}

function removePhoto(slotIndex: number) {
    if (previews.value[slotIndex]) URL.revokeObjectURL(previews.value[slotIndex]!);
    previews.value[slotIndex] = null;
    const targetIndex = 3 + slotIndex;
    photos.value[targetIndex] = null;
    if (slotIndex === 4) showSlot5.value = false;
}
</script>

<template>
    <div>
        <div class="mt-5 flex cursor-pointer items-center justify-center" @click="isOpen = !isOpen">
            <p class="border-b border-dashed border-[#2578cf] text-base text-[#2578cf] max-sm:text-sm">Загрузить дополнительные фотографии</p>
            <ChevronDownIcon :custom-class="`morePhotosChevron ${isOpen ? 'morePhotosChevronOpen' : ''}`" />
        </div>

        <div v-if="isOpen" class="mt-5 flex flex-col">
            <h3 class="text-center font-bold">Дополнительные фото в карточке под спойлером (не обязательно)</h3>
            <p class="all_text mt-5 px-0 text-center text-black/50 sm:px-16">
                Выберите стиль отображения дополнительных фото, увидеть отличия вы сможете при просмотре акции.
            </p>

            <div class="relative mt-4 flex flex-wrap justify-between">
                <!-- Слоты 1-4 -->
                <div v-for="i in 4" :key="i" class="additionalPhotoSlot relative h-full overflow-hidden">
                    <template v-if="!previews[i - 1]">
                        <div class="additionalPhotoPlaceholderBg additionalPhotoThumb relative w-full rounded-2xl" />
                        <div class="additionalPhotoFooter relative flex w-full flex-col items-center">
                            <input
                                type="file"
                                :id="`additionalPhoto${i}`"
                                accept="image/*"
                                class="custom-file-inputs absolute top-4 left-0 w-full focus:border-none focus:outline-none"
                                @change="(e) => handleFileChange(i - 1, e)"
                            />
                            <label :for="`additionalPhoto${i}`" class="additionalPhotoLabel absolute top-14 text-sm"> Файл не выбран </label>
                        </div>
                    </template>

                    <template v-else>
                        <img :src="previews[i - 1]!" class="additionalPhotoThumb w-full rounded-2xl object-cover" alt="Фото" />
                        <button type="button" class="absolute top-0 right-0 z-50 rounded-md bg-white hover:opacity-80" @click="removePhoto(i - 1)">
                            <TrashIcon custom-class="w-7 h-7 text-black/30" />
                        </button>
                    </template>
                </div>

                <!-- Кнопка добавить 5-й слот -->
                <div
                    v-if="!showSlot5"
                    class="additionalPhotoAdd additionalPhotoSlot additionalPhotoAddHoverBorder relative flex flex-col items-center justify-center overflow-hidden rounded-2xl border bg-white hover:cursor-pointer hover:border-dashed"
                    @click="showSlot5 = true"
                >
                    <span class="absolute bottom-8 px-4 text-center text-sm"
                        >Добавить еще место <br />
                        под фото</span
                    >
                </div>

                <!-- Слот 5 -->
                <div v-if="showSlot5" class="additionalPhotoSlot relative h-full overflow-hidden">
                    <template v-if="!previews[4]">
                        <div class="additionalPhotoPlaceholderBg additionalPhotoThumb relative w-full rounded-2xl" />
                        <div class="additionalPhotoFooter relative flex w-full flex-col items-center">
                            <input
                                type="file"
                                id="additionalPhoto5"
                                accept="image/*"
                                class="custom-file-inputs absolute top-4 left-0 w-full focus:border-none focus:outline-none"
                                @change="(e) => handleFileChange(4, e)"
                            />
                            <label for="additionalPhoto5" class="additionalPhotoLabel absolute top-14 text-sm"> Файл не выбран </label>
                        </div>
                    </template>

                    <template v-else>
                        <img :src="previews[4]!" class="additionalPhotoThumb w-full rounded-2xl object-cover" alt="Фото" />
                        <button type="button" class="absolute top-0 right-0 z-50 rounded-md bg-white hover:opacity-80" @click="removePhoto(4)">
                            <TrashIcon custom-class="w-7 h-7 text-black/30" />
                        </button>
                    </template>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
.additionalPhotoSlot {
    width: 130px;
}

.additionalPhotoPlaceholderBg {
    background: #e9eef1;
}

.additionalPhotoThumb {
    height: 130px;
}

.additionalPhotoFooter {
    height: 80px;
}

.additionalPhotoAdd {
    height: 200px;
}

.additionalPhotoLabel {
    color: #a1a5a6;
}

.additionalPhotoAddHoverBorder:hover {
    border-color: #0066cb;
}

.morePhotosChevron {
    color: #2578cf;
    width: 20px;
    height: 20px;
    transition: transform 150ms ease;
}

.morePhotosChevronOpen {
    transform: rotate(180deg);
}
</style>
