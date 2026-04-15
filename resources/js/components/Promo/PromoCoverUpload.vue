<script setup lang="ts">
import Cropper from 'cropperjs';
import { computed, nextTick, onBeforeUnmount, ref, watch } from 'vue';

const props = defineProps<{
    modelValue: File | null;
    existingPhoto?: string | null;
}>();

const emit = defineEmits<{
    (e: 'update:modelValue', value: File | null): void;
}>();

const objectUrl = ref<string | null>(null);

const existingPhotoUrl = computed<string | null>(() => {
    if (!props.existingPhoto) return null;
    return props.existingPhoto.startsWith('http') ? props.existingPhoto : `/storage/${props.existingPhoto}`;
});

const coverPreviewUrl = computed(() => objectUrl.value ?? existingPhotoUrl.value);
const hasCoverPreview = computed(() => !!coverPreviewUrl.value);

const isPendingCrop = ref(false);
const selectedFile = ref<File | null>(null);
const selectedObjectUrl = ref<string | null>(null);
const validationModalOpen = ref(false);
const validationModalMessage = ref('');

const cropperImageRef = ref<HTMLImageElement | null>(null);
let cropper: any = null;

const OUTPUT_WIDTH = 1200;
const OUTPUT_HEIGHT = 585;
const COVER_ASPECT_RATIO = OUTPUT_WIDTH / OUTPUT_HEIGHT;

const MIN_SAVE_CROP_HEIGHT_PX = 260;
const MIN_SAVE_CROP_WIDTH_PX = MIN_SAVE_CROP_HEIGHT_PX * COVER_ASPECT_RATIO;

watch(
    () => props.modelValue,
    (file) => {
        if (objectUrl.value) URL.revokeObjectURL(objectUrl.value);
        objectUrl.value = file ? URL.createObjectURL(file) : null;
    },
    { immediate: true },
);

onBeforeUnmount(() => {
    if (objectUrl.value) URL.revokeObjectURL(objectUrl.value);
    if (selectedObjectUrl.value) URL.revokeObjectURL(selectedObjectUrl.value);
    if (cropper) cropper.destroy();
});

function destroyCropper() {
    if (!cropper) return;
    cropper.destroy();
    cropper = null;
}

async function initCropper() {
    await nextTick();
    await new Promise<void>((resolve) => requestAnimationFrame(() => requestAnimationFrame(() => resolve())));
    if (!cropperImageRef.value) return;
    destroyCropper();

    cropper = new Cropper(cropperImageRef.value, {
        template: `
            <cropper-canvas background style="width:100%;height:100%;display:block;">
                <cropper-image rotatable scalable skewable translatable initial-center-size="contain"></cropper-image>
                <cropper-shade hidden></cropper-shade>
                <cropper-handle action="select" plain></cropper-handle>
                <cropper-selection initial-coverage="0.5" movable resizable aspect-ratio="${COVER_ASPECT_RATIO}">
                    <cropper-grid role="grid" bordered covered></cropper-grid>
                    <cropper-crosshair centered></cropper-crosshair>
                    <cropper-handle action="move" theme-color="rgba(255, 255, 255, 0.35)"></cropper-handle>
                    <cropper-handle action="n-resize" style="width: 100%; height: 22px; min-height: 22px;"></cropper-handle>
                    <cropper-handle action="e-resize" style="width: 22px; height: 100%; min-width: 22px;"></cropper-handle>
                    <cropper-handle action="s-resize" style="width: 100%; height: 22px; min-height: 22px;"></cropper-handle>
                    <cropper-handle action="w-resize" style="width: 22px; height: 100%; min-width: 22px;"></cropper-handle>
                    <cropper-handle action="ne-resize" style="width: 22px; height: 22px; min-width: 22px; min-height: 22px;"></cropper-handle>
                    <cropper-handle action="nw-resize" style="width: 22px; height: 22px; min-width: 22px; min-height: 22px;"></cropper-handle>
                    <cropper-handle action="se-resize" style="width: 22px; height: 22px; min-width: 22px; min-height: 22px;"></cropper-handle>
                    <cropper-handle action="sw-resize" style="width: 22px; height: 22px; min-width: 22px; min-height: 22px;"></cropper-handle>
                </cropper-selection>
            </cropper-canvas>
        `,
    } as any);
}

function cleanupPending() {
    if (selectedObjectUrl.value) URL.revokeObjectURL(selectedObjectUrl.value);
    selectedObjectUrl.value = null;
    selectedFile.value = null;
    isPendingCrop.value = false;
    destroyCropper();
}

function openValidationModal(message: string) {
    validationModalMessage.value = message;
    validationModalOpen.value = true;
}

function closeValidationModal() {
    validationModalOpen.value = false;
    validationModalMessage.value = '';
}

function handleFileChange(event: Event) {
    const input = event.target as HTMLInputElement;
    const file = input.files?.[0] ?? null;
    if (!file) return;

    if (file.size > 10 * 1024 * 1024) {
        openValidationModal('Файл слишком большой (макс. 10 МБ).');
        input.value = '';
        return;
    }

    selectedFile.value = file;
    if (selectedObjectUrl.value) URL.revokeObjectURL(selectedObjectUrl.value);
    selectedObjectUrl.value = URL.createObjectURL(file);
    isPendingCrop.value = true;
    input.value = '';
}

function handleCropperImageLoad() {
    if (isPendingCrop.value) void initCropper();
}

async function handleSave() {
    if (!cropper || !selectedFile.value) return;

    const selection = (cropper as any).getCropperSelection?.();
    if (!selection) return;

    if (selection.width < MIN_SAVE_CROP_WIDTH_PX || selection.height < MIN_SAVE_CROP_HEIGHT_PX) {
        openValidationModal(
            `Минимальный размер области обрезки — примерно ${Math.round(MIN_SAVE_CROP_WIDTH_PX)}×${MIN_SAVE_CROP_HEIGHT_PX} пикселей (соотношение ${OUTPUT_WIDTH}:${OUTPUT_HEIGHT}).`,
        );
        return;
    }

    const croppedCanvas = (await (selection as any).$toCanvas({
        width: OUTPUT_WIDTH,
        height: OUTPUT_HEIGHT,
    })) as HTMLCanvasElement | null;
    if (!croppedCanvas) return;

    croppedCanvas.toBlob(
        (blob: Blob | null) => {
            if (!blob) return;
            const file = new File([blob], selectedFile.value!.name, {
                type: blob.type || selectedFile.value!.type || 'image/png',
            });
            emit('update:modelValue', file);
            cleanupPending();
        },
        'image/png',
        1,
    );
}
</script>

<template>
    <div class="file_upload files_img relative flex h-56 w-56 flex-col items-center justify-center overflow-hidden rounded-2xl bg-yellow-300">
        <div class="relative z-10 flex h-full w-full flex-col items-center justify-center">
            <h2 v-if="!hasCoverPreview" class="text-sm font-bold lg:text-base">Обложка (обязательно)</h2>
            <label v-if="!hasCoverPreview && !isPendingCrop" for="uploadImage" class="text-sm text-gray-400"> Файл не выбран </label>
            <input
                type="file"
                id="uploadImage"
                accept="image/*"
                :class="
                    hasCoverPreview
                        ? 'absolute inset-0 z-20 opacity-0 focus:border-none focus:outline-none'
                        : 'files_inp custom-file-input absolute bottom-10 left-10 focus:border-none focus:outline-none'
                "
                @change="handleFileChange"
            />
        </div>

        <img v-if="coverPreviewUrl" :src="coverPreviewUrl" alt="Обложка" class="absolute inset-0 z-0 h-full w-full rounded-2xl object-cover" />

        <Teleport to="body">
            <div
                v-if="isPendingCrop"
                :style="{
                    position: 'fixed',
                    inset: '0',
                    zIndex: 9999,
                    backgroundColor: 'rgba(0,0,0,0.8)',
                    display: 'flex',
                    alignItems: 'flex-start',
                    justifyContent: 'center',
                    paddingTop: '40px',
                    overflowY: 'auto',
                }"
            >
                <div
                    :style="{
                        display: 'flex',
                        flexDirection: 'column',
                        width: '600px',
                        maxWidth: '95vw',
                        backgroundColor: 'white',
                        padding: '16px',
                        borderRadius: '8px',
                    }"
                >
                    <h2 class="mb-4 text-xl">Фотография на вашей странице</h2>
                    <div
                        class="crop-container promo-cover-cropper"
                        :style="{
                            position: 'relative',
                            overflow: 'hidden',
                            width: '100%',
                            height: '560px',
                        }"
                    >
                        <img
                            ref="cropperImageRef"
                            :src="selectedObjectUrl ?? undefined"
                            alt="Crop Image"
                            style="display: block; max-width: 100%"
                            @load="handleCropperImageLoad"
                        />
                    </div>
                    <div class="flex flex-col items-center justify-between gap-2 p-4 sm:flex-row sm:gap-0">
                        <div class="text-center sm:text-left">
                            <span class="block text-base">Выберите длинное изображение</span>
                            <span class="text-sm text-red-600">
                                Область обрезки должна быть не меньше {{ Math.round(MIN_SAVE_CROP_WIDTH_PX) }}x{{ MIN_SAVE_CROP_HEIGHT_PX }} px
                            </span>
                        </div>
                        <div class="flex gap-4">
                            <button class="rounded-md bg-black/10 px-10 py-2 text-black hover:bg-black/20" type="button" @click="cleanupPending">
                                Отмена
                            </button>
                            <button class="rounded-md bg-blue-700 px-10 py-2 text-white hover:bg-blue-800" type="button" @click="handleSave">
                                Сохранить
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </Teleport>
        <Teleport to="body">
            <div v-show="validationModalOpen" class="fixed inset-0 z-[10000] flex items-center justify-center bg-black/50 px-4" @click="closeValidationModal">
                <div class="w-full max-w-md rounded-xl bg-white p-5 shadow-2xl" @click.stop>
                    <h3 class="text-lg font-bold text-gray-900">Проверьте изображение</h3>
                    <p class="mt-2 text-sm text-gray-700">{{ validationModalMessage }}</p>
                    <div class="mt-5 flex justify-end">
                        <button
                            type="button"
                            class="rounded-md bg-blue-700 px-4 py-2 text-sm font-semibold text-white hover:bg-blue-800"
                            @click="closeValidationModal"
                        >
                            Понятно
                        </button>
                    </div>
                </div>
            </div>
        </Teleport>
    </div>
</template>
