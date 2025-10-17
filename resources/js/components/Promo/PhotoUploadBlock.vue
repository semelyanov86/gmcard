<script setup lang="ts">
import ChevronDownIcon from '@/components/primitives/icons/ChevronDownIcon.vue';
import TrashIcon from '@/components/primitives/icons/TrashIcon.vue';
import { ref } from 'vue';
import PhotoHelpModal from './PhotoHelpModal.vue';

const photoModalOpen = ref(false);
</script>

<template>
    <div class="mt-8 flex w-full flex-col rounded-2xl bg-white p-8 md:p-4" id="shestoi">
        <div class="mb-8 flex w-full flex-row justify-between max-md:flex-col">
            <div>
                <h3 class="text-base font-bold">Загрузите привлекательное изображение для вашей акции</h3>
                <p class="all_text text-black/50">Обязательна только 1 (первая) фотография, остальные по желанию.</p>
            </div>
            <div class="flex items-center gap-2 max-md:mt-4">
                <img src="/images/png/constructor/picture-sale.png" class="h-6 w-8" alt="Картинка" />
                <button type="button" @click="photoModalOpen = true" class="text-sm font-semibold text-[#2578cf] hover:underline">
                    У меня нет фото,<br class="max-sm:hidden" />
                    что делать?
                </button>
                <PhotoHelpModal :isOpen="photoModalOpen" @close="photoModalOpen = false" />
            </div>
        </div>
        <div class="flex flex-wrap justify-between gap-2">
            <div
                class="file_upload files_img relative flex h-[230px] w-[230px] flex-col items-center justify-center overflow-hidden rounded-2xl bg-[#fae115]"
            >
                <div id="file_block" class="relative flex h-full w-full flex-col items-center justify-center">
                    <h2 class="text-sm font-bold lg:text-base">Обложка (обязательно)</h2>
                    <label for="" class="text-sm text-[#a1a5a6]">Файл не выбран</label>
                    <input
                        type="file"
                        id="uploadImage"
                        class="files_inp custom-file-input absolute bottom-10 left-10 focus:border-none focus:outline-none"
                    />
                </div>
                <img id="cropperResult" alt="Cropped Image" class="hidden h-full w-full rounded-2xl object-cover" />
                <div id="cropModal" class="modal z-50 h-auto w-full">
                    <div class="modal-content w-[600px] bg-white p-4">
                        <h2 class="mb-4 text-xl">Фотография на вашей странице</h2>
                        <div class="cropper-container">
                            <img id="cropperImage" alt="Crop Image" class="w-full object-cover" />
                        </div>
                        <div class="flex flex-col items-center justify-between gap-2 p-4 sm:flex-row sm:gap-0">
                            <h2 class="text-base">Выберите длинное изображение</h2>
                            <div class="flex gap-4">
                                <button id="cancelButton" class="rounded-md bg-black/10 px-10 py-2 text-black hover:bg-black/20">Отмена</button>
                                <button id="cropButton" class="hover:bg-opacity-80 rounded-md bg-[#0066cb] px-10 py-2 text-white">Сохранить</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div
                class="file_uploaded files_img relative flex h-[230px] w-[230px] flex-col items-center justify-center overflow-hidden rounded-2xl bg-[#e9eef1]"
            >
                <div id="file_block2" class="relative flex h-full w-full flex-col items-center justify-center">
                    <h2 class="text-sm font-bold lg:text-base">Обложка (необязательно)</h2>
                    <label for="" class="text-sm text-[#a1a5a6]">Файл не выбран</label>
                    <input
                        type="file"
                        id="uploadImage2"
                        class="files_inp custom-file-input absolute bottom-10 left-10 focus:border-none focus:outline-none"
                    />
                </div>
                <img id="cropperResult2" alt="Cropped Image" class="hidden h-full w-full rounded-2xl object-cover" />
                <div id="cropModal2" class="modal z-50 h-auto w-full">
                    <div class="modal-content w-[600px] bg-white p-4">
                        <h2 class="mb-4 text-xl">Фотография на вашей странице</h2>
                        <div class="cropper-container">
                            <img id="cropperImage2" alt="Crop Image" class="w-full" />
                        </div>
                        <div class="flex flex-col items-center justify-between gap-2 p-4 sm:flex-row sm:gap-0">
                            <h2 class="text-base">Выберите длинное изображение</h2>
                            <div class="flex gap-4">
                                <button id="cancelButton2" class="rounded-md bg-black/10 px-10 py-2 text-black hover:bg-black/20">Отмена</button>
                                <button id="cropButton2" class="hover:bg-opacity-80 rounded-md bg-[#0066cb] px-10 py-2 text-white">Сохранить</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div
                class="file_uploadPlus files_img relative flex h-[230px] w-[230px] flex-col items-center justify-center overflow-hidden rounded-2xl border bg-white p-8 hover:cursor-pointer hover:border-dashed hover:border-[#0066cb]"
            >
                <span class="textPlus absolute bottom-10 text-center"
                    >Добавить еще место <br />
                    под фото</span
                >
            </div>
            <div
                id="fileUpload3"
                class="file_upload files_img relative hidden h-[230px] w-[230px] flex-col items-center justify-center overflow-hidden rounded-2xl bg-[#e9eef1]"
            >
                <div id="file_block3" class="relative flex h-full w-full flex-col items-center justify-center">
                    <h2 class="text-sm font-bold lg:text-base">Обложка (необязательно)</h2>
                    <label for="" class="text-sm text-[#a1a5a6]">Файл не выбран</label>
                    <input
                        type="file"
                        id="uploadImage3"
                        class="files_inp custom-file-input absolute bottom-10 left-10 focus:border-none focus:outline-none"
                    />
                </div>
                <img id="cropperResult3" alt="Cropped Image" class="hidden h-full w-full rounded-2xl object-cover" />
                <div id="cropModal3" class="modal z-50 h-auto w-full">
                    <div class="modal-content w-[600px] bg-white p-4">
                        <h2 class="mb-4 text-xl">Фотография на вашей странице</h2>
                        <div class="cropper-container">
                            <img id="cropperImage3" alt="Crop Image" class="w-full object-cover" />
                        </div>
                        <div class="flex flex-col items-center justify-between gap-2 p-4 sm:flex-row sm:gap-0">
                            <h2 class="text-base">Выберите длинное изображение</h2>
                            <div class="flex gap-4">
                                <button id="cancelButton3" class="rounded-md bg-black/10 px-10 py-2 text-black hover:bg-black/20">Отмена</button>
                                <button id="cropButton3" class="hover:bg-opacity-80 rounded-md bg-[#0066cb] px-10 py-2 text-white">Сохранить</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-5 flex items-center justify-center">
            <p class="cursor-pointer border-b border-dashed border-[#2578cf] text-base text-[#2578cf] max-sm:text-sm" id="moreImg">
                Загрузить дополнительные фотографии
            </p>
            <ChevronDownIcon id="svgImg" custom-class="w-5 h-5 text-[#2578cf] cursor-pointer" />
        </div>
        <div id="moreImgShow" class="mt-5 flex hidden flex-col">
            <h3 class="text-center font-bold">Дополнительные фото в карточке под спойлером (не обязательно)</h3>
            <p class="all_text mt-5 px-0 text-center text-black/50 sm:px-16">
                Выберите стиль отображения дополнительных фото, увидеть отличия вы сможете при просмотре акции.
            </p>
            <div class="add_more_photos relative mt-4 flex flex-wrap justify-between">
                <div id="photoBlock" class="relative h-full w-[130px] overflow-hidden">
                    <div id="photoCard" class="customPhoto1 relative h-[130px] w-full rounded-2xl bg-[#e9eef1]">
                        <TrashIcon
                            id="delPhoto"
                            custom-class="hidden w-7 h-7 absolute z-50 text-black/30 right-0 bg-white rounded-md hover:opacity-80 cursor-pointer"
                        />
                    </div>
                    <img src="" id="photoPlace" class="hidden h-[130px] w-full rounded-2xl object-cover" alt="Фото" />
                    <div id="blockFile" class="relative flex h-[80px] w-full flex-col items-center">
                        <input
                            type="file"
                            id="photoOne"
                            class="custom-file-inputs absolute top-4 left-0 w-full focus:border-none focus:outline-none"
                        />
                        <label for="photoOne" class="absolute top-14 text-sm text-[#a1a5a6]">Файл не выбран</label>
                    </div>
                </div>
                <div id="photoBlock2" class="relative h-full w-[130px] overflow-hidden">
                    <div id="photoCard2" class="customPhoto1 relative h-[130px] w-full rounded-2xl bg-[#e9eef1]">
                        <TrashIcon
                            id="delPhoto2"
                            custom-class="hidden w-7 h-7 absolute z-50 text-black/30 right-0 bg-white rounded-md hover:opacity-80 cursor-pointer"
                        />
                    </div>
                    <img src="" id="photoPlace2" class="hidden h-[130px] w-full rounded-2xl object-cover" alt="Фото" />
                    <div id="blockFile2" class="relative flex h-[80px] w-full flex-col items-center">
                        <input
                            type="file"
                            id="photoOne2"
                            class="custom-file-inputs absolute top-4 left-0 w-full focus:border-none focus:outline-none"
                        />
                        <label for="photoOne" class="absolute top-14 text-sm text-[#a1a5a6]">Файл не выбран</label>
                    </div>
                </div>
                <div id="photoBlock3" class="relative h-full w-[130px] overflow-hidden">
                    <div id="photoCard3" class="customPhoto1 relative h-[130px] w-full rounded-2xl bg-[#e9eef1]">
                        <TrashIcon
                            id="delPhoto3"
                            custom-class="hidden w-7 h-7 absolute z-50 text-black/30 right-0 bg-white rounded-md hover:opacity-80 cursor-pointer"
                        />
                    </div>
                    <img src="" id="photoPlace3" class="hidden h-[130px] w-full rounded-2xl object-cover" alt="Фото" />
                    <div id="blockFile3" class="relative flex h-[80px] w-full flex-col items-center">
                        <input
                            type="file"
                            id="photoOne3"
                            class="custom-file-inputs absolute top-4 left-0 w-full focus:border-none focus:outline-none"
                        />
                        <label for="photoOne" class="absolute top-14 text-sm text-[#a1a5a6]">Файл не выбран</label>
                    </div>
                </div>
                <div id="photoBlock4" class="relative h-full w-[130px] overflow-hidden">
                    <div id="photoCard4" class="customPhoto1 relative h-[130px] w-full rounded-2xl bg-[#e9eef1]">
                        <TrashIcon
                            id="delPhoto4"
                            custom-class="hidden w-7 h-7 absolute z-50 text-black/30 right-0 bg-white rounded-md hover:opacity-80 cursor-pointer"
                        />
                    </div>
                    <img src="" id="photoPlace4" class="hidden h-[130px] w-full rounded-2xl object-cover" alt="Фото" />
                    <div id="blockFile4" class="relative flex h-[80px] w-full flex-col items-center">
                        <input
                            type="file"
                            id="photoOne4"
                            class="custom-file-inputs absolute top-4 left-0 w-full focus:border-none focus:outline-none"
                        />
                        <label for="photoOne" class="absolute top-14 text-sm text-[#a1a5a6]">Файл не выбран</label>
                    </div>
                </div>
                <div
                    id="morePhotos"
                    class="reltive morePhoto relative flex h-[200px] w-[130px] flex-col items-center justify-center overflow-hidden rounded-2xl border bg-white hover:cursor-pointer hover:border-dashed hover:border-[#0066cb]"
                >
                    <span class="absolute bottom-8 px-4 text-center text-sm"
                        >Добавить еще место <br />
                        под фото</span
                    >
                </div>
                <div id="photoBlock5" class="relative hidden h-full w-[130px] overflow-hidden">
                    <div id="photoCard5" class="customPhoto1 relative h-[130px] w-full rounded-2xl bg-[#e9eef1]">
                        <TrashIcon
                            id="delPhoto5"
                            custom-class="hidden w-7 h-7 absolute z-50 text-black/30 right-0 bg-white rounded-md hover:opacity-80 cursor-pointer"
                        />
                    </div>
                    <img src="" id="photoPlace5" class="hidden h-[130px] w-full rounded-2xl object-cover" alt="Фото" />
                    <div id="blockFile5" class="relative flex h-[80px] w-full flex-col items-center">
                        <input
                            type="file"
                            id="photoOne5"
                            class="custom-file-inputs absolute top-4 left-0 w-full focus:border-none focus:outline-none"
                        />
                        <label for="photoOne" class="absolute top-14 text-sm text-[#a1a5a6]">Файл не выбран</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
