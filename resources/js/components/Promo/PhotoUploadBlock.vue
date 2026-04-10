<script setup lang="ts">
import PromoAdditionalPhotos from '@/components/Promo/PromoAdditionalPhotos.vue';
import PromoCoverUpload from '@/components/Promo/PromoCoverUpload.vue';
import { ModalLink } from '@inertiaui/modal-vue';
import { computed, onBeforeUnmount, ref, watch } from 'vue';

const props = defineProps<{
    existingPhoto?: string | null;
    existingPhotoPaths?: string[] | null;
}>();

const photos = defineModel<Array<File | null>>({ required: true });

function resolvePath(path: string): string {
    return path.startsWith('http') ? path : `/storage/${path}`;
}

const paths = computed(() => props.existingPhotoPaths?.filter(Boolean) ?? []);

const coverExistingPhoto = computed(() => paths.value[0] ?? props.existingPhoto ?? null);

const existingSlot2Url = computed(() => (paths.value[1] ? resolvePath(paths.value[1]) : null));
const existingSlot3Url = computed(() => (paths.value[2] ? resolvePath(paths.value[2]) : null));

const displayUrl2 = computed(() => objectUrl2.value ?? existingSlot2Url.value);
const displayUrl3 = computed(() => objectUrl3.value ?? existingSlot3Url.value);

const cover1File = computed<File | null>({
    get: () => photos.value[0] ?? null,
    set: (file) => {
        if (!file) return;
        photos.value = [file, ...photos.value.slice(1)];
    },
});

const objectUrl2 = ref<string | null>(null);
const objectUrl3 = ref<string | null>(null);
const showFileUpload3 = ref(false);

watch(
    paths,
    (p) => {
        if (p.length > 2) {
            showFileUpload3.value = true;
        }
    },
    { immediate: true },
);

onBeforeUnmount(() => {
    if (objectUrl2.value) URL.revokeObjectURL(objectUrl2.value);
    if (objectUrl3.value) URL.revokeObjectURL(objectUrl3.value);
});

function handleFileChange2(event: Event) {
    const input = event.target as HTMLInputElement;
    const file = input.files?.[0];
    if (!file) return;

    if (objectUrl2.value) URL.revokeObjectURL(objectUrl2.value);
    objectUrl2.value = URL.createObjectURL(file);

    const next = photos.value.slice();
    next[1] = file;
    photos.value = next;
}

function handleFileChange3(event: Event) {
    const input = event.target as HTMLInputElement;
    const file = input.files?.[0];
    if (!file) return;

    if (objectUrl3.value) URL.revokeObjectURL(objectUrl3.value);
    objectUrl3.value = URL.createObjectURL(file);

    const next = photos.value.slice();
    next[2] = file;
    photos.value = next;
}
</script>

<template>
    <div class="mt-8 flex w-full flex-col rounded-2xl bg-white p-8 md:p-4">
        <div class="mb-8 flex w-full flex-row justify-between max-md:flex-col">
            <div>
                <h3 class="text-base font-bold">Загрузите привлекательное изображение для вашей акции</h3>
                <p class="all_text text-black/50">Обязательна только 1 (первая) фотография, остальные по желанию.</p>
            </div>
            <div class="flex items-center gap-2 max-md:mt-4">
                <img src="/images/png/constructor/picture-sale.png" class="h-6 w-8" alt="Картинка" />
                <ModalLink :href="route('promos.photo-help')" :navigate="true" class="text-left text-sm font-semibold text-blue-600 hover:underline">
                    У меня нет фото,<br class="max-sm:hidden" />
                    что делать?
                </ModalLink>
            </div>
        </div>
        <div class="flex flex-wrap justify-between gap-2">
            <PromoCoverUpload v-model="cover1File" :existing-photo="coverExistingPhoto" />

            <div
                class="file_uploaded files_img relative flex h-56 w-56 flex-col items-center justify-center overflow-hidden rounded-2xl bg-slate-100"
            >
                <div class="relative z-10 flex h-full w-full flex-col items-center justify-center">
                    <h2 v-if="!displayUrl2" class="text-sm font-bold lg:text-base">Обложка (необязательно)</h2>
                    <label v-if="!displayUrl2" for="uploadImage2" class="text-sm text-gray-400">Файл не выбран</label>
                    <input
                        type="file"
                        id="uploadImage2"
                        accept="image/*"
                        :class="
                            displayUrl2
                                ? 'absolute inset-0 z-20 opacity-0 focus:border-none focus:outline-none'
                                : 'files_inp custom-file-input absolute bottom-10 left-10 focus:border-none focus:outline-none'
                        "
                        @change="handleFileChange2"
                    />
                </div>
                <img v-if="displayUrl2" :src="displayUrl2" alt="Обложка 2" class="absolute inset-0 z-0 h-full w-full rounded-2xl object-cover" />
            </div>

            <div
                class="file_uploadPlus files_img relative flex h-56 w-56 flex-col items-center justify-center overflow-hidden rounded-2xl border bg-white p-8 hover:cursor-pointer hover:border-dashed hover:border-blue-700"
                :class="{ hidden: showFileUpload3 }"
                @click="showFileUpload3 = true"
            >
                <span class="textPlus absolute bottom-10 text-center"
                    >Добавить еще место <br />
                    под фото</span
                >
            </div>

            <div
                class="file_upload files_img relative flex h-56 w-56 flex-col items-center justify-center overflow-hidden rounded-2xl bg-slate-100"
                :class="{ hidden: !showFileUpload3 }"
            >
                <div class="relative z-10 flex h-full w-full flex-col items-center justify-center">
                    <h2 v-if="!displayUrl3" class="text-sm font-bold lg:text-base">Обложка (необязательно)</h2>
                    <label v-if="!displayUrl3" for="uploadImage3" class="text-sm text-gray-400">Файл не выбран</label>
                    <input
                        type="file"
                        id="uploadImage3"
                        accept="image/*"
                        :class="
                            displayUrl3
                                ? 'absolute inset-0 z-20 opacity-0 focus:border-none focus:outline-none'
                                : 'files_inp custom-file-input absolute bottom-10 left-10 focus:border-none focus:outline-none'
                        "
                        @change="handleFileChange3"
                    />
                </div>
                <img v-if="displayUrl3" :src="displayUrl3" alt="Обложка 3" class="absolute inset-0 z-0 h-full w-full rounded-2xl object-cover" />
            </div>
        </div>

        <div v-if="!photos[0] && props.existingPhoto && (!props.existingPhotoPaths || props.existingPhotoPaths.length === 0)" class="mt-5">
            <p class="text-sm text-black/60">Текущее изображение</p>
            <img
                :src="props.existingPhoto.startsWith('http') ? props.existingPhoto : `/storage/${props.existingPhoto}`"
                alt="Текущее изображение акции"
                class="mt-2 h-56 w-56 rounded-2xl object-cover"
            />
        </div>

        <PromoAdditionalPhotos v-model="photos" :initial-server-paths="paths.slice(3)" />
    </div>
</template>
