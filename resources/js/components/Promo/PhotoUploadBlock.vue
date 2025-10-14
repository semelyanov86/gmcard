<script setup lang="ts">
import { ref } from 'vue';
import PhotoHelpModal from './PhotoHelpModal.vue';

const photoModalOpen = ref(false);
</script>

<template>
    <div class="flex flex-col bg-white p-8 md:p-4 mt-8 rounded-2xl w-full" id="shestoi">
        <div class="flex flex-row max-md:flex-col justify-between mb-8 w-full">
            <div>
                <h3 class="text-base font-bold">Загрузите привлекательное изображение для вашей акции</h3>
                <p class="text-black/50 all_text">Обязательна только 1 (первая) фотография, остальные по желанию.</p>
            </div>
            <div class="flex gap-2 items-center max-md:mt-4">
                <img src="/images/png/constructor/picture-sale.png" class="w-8 h-6 " alt="Картинка">
                <button type="button" @click="photoModalOpen = true" class="text-sm text-[#2578cf] font-semibold hover:underline">
                    У меня нет фото,<br class="max-sm:hidden"> что делать?
                </button>
                <PhotoHelpModal :isOpen="photoModalOpen" @close="photoModalOpen = false" />
            </div>
        </div>
        <div class="flex flex-wrap gap-2 justify-between">
            <div class="file_upload files_img w-[230px] h-[230px] bg-[#fae115] rounded-2xl flex flex-col justify-center items-center relative overflow-hidden">
                <div id="file_block" class="flex flex-col items-center justify-center relative w-full h-full ">
                    <h2 class="font-bold text-sm lg:text-base">Обложка (обязательно)</h2>
                    <label for="" class="text-[#a1a5a6] text-sm">Файл не выбран</label>
                    <input type="file" id="uploadImage" class="absolute files_inp left-10 bottom-10 custom-file-input focus:outline-none focus:border-none">
                </div>
                <img id="cropperResult" alt="Cropped Image" class="hidden w-full object-cover h-full rounded-2xl">
                <div id="cropModal" class="modal z-50 w-full h-auto">
                    <div class="modal-content w-[600px] p-4 bg-white">
                        <h2 class="text-xl mb-4">Фотография на вашей странице</h2>
                        <div class="cropper-container">
                            <img id="cropperImage" alt="Crop Image" class="w-full object-cover">
                        </div>
                        <div class="flex flex-col gap-2 sm:gap-0 sm:flex-row items-center p-4 justify-between">
                            <h2 class="text-base">Выберите длинное изображение</h2>
                            <div class="flex gap-4">
                                <button id="cancelButton" class="px-10 py-2 bg-black/10 text-black rounded-md hover:bg-black/20">Отмена</button>
                                <button id="cropButton" class="px-10 py-2 bg-[#0066cb] text-white rounded-md hover:bg-opacity-80">Сохранить</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="file_uploaded files_img w-[230px] h-[230px] bg-[#e9eef1] rounded-2xl flex flex-col justify-center items-center relative overflow-hidden">
                <div id="file_block2" class="flex flex-col items-center justify-center relative w-full h-full">
                    <h2 class="font-bold text-sm lg:text-base">Обложка (необязательно)</h2>
                    <label for="" class="text-[#a1a5a6] text-sm">Файл не выбран</label>
                    <input type="file" id="uploadImage2" class="absolute files_inp left-10 bottom-10 custom-file-input focus:outline-none focus:border-none">
                </div>
                <img id="cropperResult2" alt="Cropped Image" class="hidden w-full object-cover h-full rounded-2xl">
                <div id="cropModal2" class="modal z-50 w-full h-auto">
                    <div class="modal-content w-[600px] p-4 bg-white">
                        <h2 class="text-xl mb-4">Фотография на вашей странице</h2>
                        <div class="cropper-container ">
                            <img id="cropperImage2" alt="Crop Image" class="w-full ">
                        </div>
                        <div class="flex flex-col gap-2 sm:gap-0 sm:flex-row items-center p-4 justify-between">
                            <h2 class="text-base">Выберите длинное изображение</h2>
                            <div class="flex gap-4">
                                <button id="cancelButton2" class="px-10 py-2 bg-black/10 text-black rounded-md hover:bg-black/20">Отмена</button>
                                <button id="cropButton2" class="px-10 py-2 bg-[#0066cb] text-white rounded-md hover:bg-opacity-80">Сохранить</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="file_uploadPlus files_img w-[230px] h-[230px] p-8 bg-white border rounded-2xl flex flex-col justify-center items-center relative overflow-hidden hover:cursor-pointer hover:border-[#0066cb] hover:border-dashed">
                <span class="textPlus text-center absolute bottom-10">Добавить еще место <br> под фото</span>
            </div>
            <div id="fileUpload3" class="file_upload files_img hidden w-[230px] h-[230px] bg-[#e9eef1] rounded-2xl flex-col justify-center items-center relative overflow-hidden">
                <div id="file_block3" class="flex flex-col items-center justify-center relative w-full h-full">
                    <h2 class="font-bold text-sm lg:text-base">Обложка (необязательно)</h2>
                    <label for="" class="text-[#a1a5a6] text-sm">Файл не выбран</label>
                    <input type="file" id="uploadImage3" class="absolute files_inp left-10 bottom-10 custom-file-input focus:outline-none focus:border-none">
                </div>
                <img id="cropperResult3" alt="Cropped Image" class="hidden w-full object-cover h-full rounded-2xl">
                <div id="cropModal3" class="modal z-50 w-full h-auto">
                    <div class="modal-content w-[600px] p-4 bg-white">
                        <h2 class="text-xl mb-4">Фотография на вашей странице</h2>
                        <div class="cropper-container">
                            <img id="cropperImage3" alt="Crop Image" class="w-full object-cover">
                        </div>
                        <div class="flex flex-col gap-2 sm:gap-0 sm:flex-row items-center p-4 justify-between">
                            <h2 class="text-base">Выберите длинное изображение</h2>
                            <div class="flex gap-4">
                                <button id="cancelButton3" class="px-10 py-2 bg-black/10 text-black rounded-md hover:bg-black/20">Отмена</button>
                                <button id="cropButton3" class="px-10 py-2 bg-[#0066cb] text-white rounded-md hover:bg-opacity-80">Сохранить</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex items-center justify-center mt-5">
            <p class="text-[#2578cf] text-base max-sm:text-sm border-b border-dashed border-[#2578cf] cursor-pointer" id="moreImg">
                Загрузить дополнительные фотографии
            </p>
            <svg id="svgImg" class="w-5 h-5 text-[#2578cf] cursor-pointer" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M7 10L12 15L17 10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </div>
        <div id="moreImgShow" class="hidden flex flex-col mt-5">
            <h3 class="font-bold text-center">Дополнительные фото в карточке под спойлером (не обязательно)</h3>
            <p class="text-center mt-5 text-black/50 px-0 sm:px-16 all_text">Выберите стиль отображения дополнительных фото, увидеть отличия вы сможете при просмотре акции.</p>
            <div class="relative flex flex-wrap justify-between mt-4 add_more_photos">
                <div id="photoBlock" class="overflow-hidden relative w-[130px] h-full">
                    <div id="photoCard" class="relative bg-[#e9eef1] w-full h-[130px] rounded-2xl customPhoto1">
                        <svg fill="currentColor" id="delPhoto" class="hidden w-7 h-7 absolute z-50 text-black/30 right-0 bg-white rounded-md hover:opacity-80 cursor-pointer" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M17,8 C17.5522847,8 18,8.44771525 18,9 L18,19 C18,20.6568542 16.6568542,22 15,22 L9,22 C7.34314575,22 6,20.6568542 6,19 L6,9 C6,8.44771525 6.44771525,8 7,8 L17,8 Z M16,10 L8,10 L8,19 C8,19.5522847 8.44771525,20 9,20 L15,20 C15.5522847,20 16,19.5522847 16,19 L16,10 Z M9,3 C9,2.44771525 9.44771525,2 10,2 L14,2 C14.5522847,2 15,2.44771525 15,3 L15,4 L19,4 C19.5522847,4 20,4.44771525 20,5 C20,5.55228475 19.5522847,6 19,6 L5,6 C4.44771525,6 4,5.55228475 4,5 C4,4.44771525 4.44771525,4 5,4 L9,4 L9,3 Z"/>
                        </svg>
                    </div>
                    <img src="" id="photoPlace" class="w-full object-cover h-[130px] rounded-2xl hidden" alt="Фото">
                    <div id="blockFile" class="flex flex-col items-center relative w-full h-[80px]">
                        <input type="file" id="photoOne" class="absolute left-0 w-full top-4 custom-file-inputs focus:outline-none focus:border-none">
                        <label for="photoOne" class="text-[#a1a5a6] text-sm absolute top-14">Файл не выбран</label>
                    </div>
                </div>
                <div id="photoBlock2" class="overflow-hidden relative w-[130px] h-full">
                    <div id="photoCard2" class="relative bg-[#e9eef1] w-full h-[130px] rounded-2xl customPhoto1">
                        <svg fill="currentColor" id="delPhoto2" class="hidden w-7 h-7 absolute z-50 text-black/30 right-0 bg-white rounded-md hover:opacity-80 cursor-pointer" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M17,8 C17.5522847,8 18,8.44771525 18,9 L18,19 C18,20.6568542 16.6568542,22 15,22 L9,22 C7.34314575,22 6,20.6568542 6,19 L6,9 C6,8.44771525 6.44771525,8 7,8 L17,8 Z M16,10 L8,10 L8,19 C8,19.5522847 8.44771525,20 9,20 L15,20 C15.5522847,20 16,19.5522847 16,19 L16,10 Z M9,3 C9,2.44771525 9.44771525,2 10,2 L14,2 C14.5522847,2 15,2.44771525 15,3 L15,4 L19,4 C19.5522847,4 20,4.44771525 20,5 C20,5.55228475 19.5522847,6 19,6 L5,6 C4.44771525,6 4,5.55228475 4,5 C4,4.44771525 4.44771525,4 5,4 L9,4 L9,3 Z"/>
                        </svg>
                    </div>
                    <img src="" id="photoPlace2" class="w-full object-cover h-[130px] rounded-2xl hidden" alt="Фото">
                    <div id="blockFile2" class="flex flex-col items-center relative w-full h-[80px]">
                        <input type="file" id="photoOne2" class="absolute left-0 w-full top-4 custom-file-inputs focus:outline-none focus:border-none">
                        <label for="photoOne" class="text-[#a1a5a6] text-sm absolute top-14">Файл не выбран</label>
                    </div>
                </div>
                <div id="photoBlock3" class="overflow-hidden relative w-[130px] h-full">
                    <div id="photoCard3" class="relative bg-[#e9eef1] w-full h-[130px] rounded-2xl customPhoto1">
                        <svg fill="currentColor" id="delPhoto3" class="hidden w-7 h-7 absolute z-50 text-black/30 right-0 bg-white rounded-md hover:opacity-80 cursor-pointer" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M17,8 C17.5522847,8 18,8.44771525 18,9 L18,19 C18,20.6568542 16.6568542,22 15,22 L9,22 C7.34314575,22 6,20.6568542 6,19 L6,9 C6,8.44771525 6.44771525,8 7,8 L17,8 Z M16,10 L8,10 L8,19 C8,19.5522847 8.44771525,20 9,20 L15,20 C15.5522847,20 16,19.5522847 16,19 L16,10 Z M9,3 C9,2.44771525 9.44771525,2 10,2 L14,2 C14.5522847,2 15,2.44771525 15,3 L15,4 L19,4 C19.5522847,4 20,4.44771525 20,5 C20,5.55228475 19.5522847,6 19,6 L5,6 C4.44771525,6 4,5.55228475 4,5 C4,4.44771525 4.44771525,4 5,4 L9,4 L9,3 Z"/>
                        </svg>
                    </div>
                    <img src="" id="photoPlace3" class="w-full object-cover h-[130px] rounded-2xl hidden" alt="Фото">
                    <div id="blockFile3" class="flex flex-col items-center relative w-full h-[80px]">
                        <input type="file" id="photoOne3" class="absolute left-0 w-full top-4 custom-file-inputs focus:outline-none focus:border-none">
                        <label for="photoOne" class="text-[#a1a5a6] text-sm absolute top-14">Файл не выбран</label>
                    </div>
                </div>
                <div id="photoBlock4" class="overflow-hidden relative w-[130px] h-full">
                    <div id="photoCard4" class="relative bg-[#e9eef1] w-full h-[130px] rounded-2xl customPhoto1">
                        <svg fill="currentColor" id="delPhoto4" class="hidden w-7 h-7 absolute z-50 text-black/30 right-0 bg-white rounded-md hover:opacity-80 cursor-pointer" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M17,8 C17.5522847,8 18,8.44771525 18,9 L18,19 C18,20.6568542 16.6568542,22 15,22 L9,22 C7.34314575,22 6,20.6568542 6,19 L6,9 C6,8.44771525 6.44771525,8 7,8 L17,8 Z M16,10 L8,10 L8,19 C8,19.5522847 8.44771525,20 9,20 L15,20 C15.5522847,20 16,19.5522847 16,19 L16,10 Z M9,3 C9,2.44771525 9.44771525,2 10,2 L14,2 C14.5522847,2 15,2.44771525 15,3 L15,4 L19,4 C19.5522847,4 20,4.44771525 20,5 C20,5.55228475 19.5522847,6 19,6 L5,6 C4.44771525,6 4,5.55228475 4,5 C4,4.44771525 4.44771525,4 5,4 L9,4 L9,3 Z"/>
                        </svg>
                    </div>
                    <img src="" id="photoPlace4" class="w-full object-cover h-[130px] rounded-2xl hidden" alt="Фото">
                    <div id="blockFile4" class="flex flex-col items-center relative w-full h-[80px]">
                        <input type="file" id="photoOne4" class="absolute left-0 w-full top-4 custom-file-inputs focus:outline-none focus:border-none">
                        <label for="photoOne" class="text-[#a1a5a6] text-sm absolute top-14">Файл не выбран</label>
                    </div>
                </div>
                <div id="morePhotos" class="w-[130px] h-[200px] reltive morePhoto bg-white border rounded-2xl flex flex-col justify-center items-center relative overflow-hidden hover:cursor-pointer hover:border-[#0066cb] hover:border-dashed">
                    <span class="absolute bottom-8 text-sm text-center px-4">Добавить еще место <br> под фото</span>
                </div>
                <div id="photoBlock5" class="overflow-hidden relative w-[130px] h-full hidden">
                    <div id="photoCard5" class="relative bg-[#e9eef1] w-full h-[130px] rounded-2xl customPhoto1">
                        <svg fill="currentColor" id="delPhoto5" class="hidden w-7 h-7 absolute z-50 text-black/30 right-0 bg-white rounded-md hover:opacity-80 cursor-pointer" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M17,8 C17.5522847,8 18,8.44771525 18,9 L18,19 C18,20.6568542 16.6568542,22 15,22 L9,22 C7.34314575,22 6,20.6568542 6,19 L6,9 C6,8.44771525 6.44771525,8 7,8 L17,8 Z M16,10 L8,10 L8,19 C8,19.5522847 8.44771525,20 9,20 L15,20 C15.5522847,20 16,19.5522847 16,19 L16,10 Z M9,3 C9,2.44771525 9.44771525,2 10,2 L14,2 C14.5522847,2 15,2.44771525 15,3 L15,4 L19,4 C19.5522847,4 20,4.44771525 20,5 C20,5.55228475 19.5522847,6 19,6 L5,6 C4.44771525,6 4,5.55228475 4,5 C4,4.44771525 4.44771525,4 5,4 L9,4 L9,3 Z"/>
                        </svg>
                    </div>
                    <img src="" id="photoPlace5" class="w-full object-cover h-[130px] rounded-2xl hidden" alt="Фото">
                    <div id="blockFile5" class="flex flex-col items-center relative w-full h-[80px]">
                        <input type="file" id="photoOne5" class="absolute left-0 w-full top-4 custom-file-inputs focus:outline-none focus:border-none">
                        <label for="photoOne" class="text-[#a1a5a6] text-sm absolute top-14">Файл не выбран</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

