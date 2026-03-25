<script setup lang="ts">
import { onBeforeUnmount, ref } from 'vue';
import ChevronDownIcon from '@/components/primitives/icons/ChevronDownIcon.vue';
import TrashIcon from '@/components/primitives/icons/TrashIcon.vue';

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
        <div class="mt-5 flex items-center justify-center cursor-pointer" @click="isOpen = !isOpen">
            <p class="border-b border-dashed border-[#2578cf] text-base text-[#2578cf] max-sm:text-sm">
                Загрузить дополнительные фотографии
            </p>
            <ChevronDownIcon
                :custom-class="`morePhotosChevron ${isOpen ? 'morePhotosChevronOpen' : ''}`"
            />
        </div>

        <div v-if="isOpen" class="mt-5 flex flex-col">
            <h3 class="font-bold text-center">Дополнительные фото в карточке под спойлером (не обязательно)</h3>
            <p class="text-center mt-5 text-black/50 px-0 sm:px-16 all_text">
                Выберите стиль отображения дополнительных фото, увидеть отличия вы сможете при просмотре акции.
            </p>

            <div class="relative flex flex-wrap justify-between mt-4">
                <!-- Слоты 1-4 -->
                <div
                    v-for="i in 4"
                    :key="i"
                    class="overflow-hidden relative additionalPhotoSlot h-full"
                >
                    <template v-if="!previews[i - 1]">
                        <div class="relative additionalPhotoPlaceholderBg w-full additionalPhotoThumb rounded-2xl" />
                        <div class="flex flex-col items-center relative w-full additionalPhotoFooter">
                            <input
                                type="file"
                                :id="`additionalPhoto${i}`"
                                accept="image/*"
                                class="absolute left-0 w-full top-4 custom-file-inputs focus:outline-none focus:border-none"
                                @change="(e) => handleFileChange(i - 1, e)"
                            />
                            <label :for="`additionalPhoto${i}`" class="additionalPhotoLabel text-sm absolute top-14">
                                Файл не выбран
                            </label>
                        </div>
                    </template>

                    <template v-else>
                        <img
                            :src="previews[i - 1]!"
                            class="w-full object-cover additionalPhotoThumb rounded-2xl"
                            alt="Фото"
                        />
                        <button
                            type="button"
                            class="absolute top-0 right-0 z-50 bg-white rounded-md hover:opacity-80"
                            @click="removePhoto(i - 1)"
                        >
                            <TrashIcon custom-class="w-7 h-7 text-black/30" />
                        </button>
                    </template>
                </div>

                <!-- Кнопка добавить 5-й слот -->
                <div
                    v-if="!showSlot5"
                    class="relative flex additionalPhotoAdd flex-col items-center justify-center overflow-hidden rounded-2xl border bg-white hover:cursor-pointer hover:border-dashed additionalPhotoSlot additionalPhotoAddHoverBorder"
                    @click="showSlot5 = true"
                >
                    <span class="absolute bottom-8 text-sm text-center px-4">Добавить еще место <br /> под фото</span>
                </div>

                <!-- Слот 5 -->
                <div v-if="showSlot5" class="overflow-hidden relative additionalPhotoSlot h-full">
                    <template v-if="!previews[4]">
                        <div class="relative additionalPhotoPlaceholderBg w-full additionalPhotoThumb rounded-2xl" />
                        <div class="flex flex-col items-center relative w-full additionalPhotoFooter">
                            <input
                                type="file"
                                id="additionalPhoto5"
                                accept="image/*"
                                class="absolute left-0 w-full top-4 custom-file-inputs focus:outline-none focus:border-none"
                                @change="(e) => handleFileChange(4, e)"
                            />
                            <label for="additionalPhoto5" class="additionalPhotoLabel text-sm absolute top-14">
                                Файл не выбран
                            </label>
                        </div>
                    </template>

                    <template v-else>
                        <img
                            :src="previews[4]!"
                            class="w-full object-cover additionalPhotoThumb rounded-2xl"
                            alt="Фото"
                        />
                        <button
                            type="button"
                            class="absolute top-0 right-0 z-50 bg-white rounded-md hover:opacity-80"
                            @click="removePhoto(4)"
                        >
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
