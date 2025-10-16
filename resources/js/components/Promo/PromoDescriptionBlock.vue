<script setup lang="ts">
import { ref } from 'vue';
import { Ckeditor } from '@ckeditor/ckeditor5-vue';
import { ClassicEditor, Bold, Essentials, Italic, Paragraph, Undo, Link, List, Heading } from 'ckeditor5';
import ToggleSwitch from './ToggleSwitch.vue';

import 'ckeditor5/ckeditor5.css';

const props = defineProps<{
    defaultDescription: string;
}>();

const textEditorOpen = ref(false);
const description = ref(props.defaultDescription);
const conditions = ref('');

const editor = ClassicEditor;
const editorConfig = {
    plugins: [Essentials, Bold, Italic, Paragraph, Undo, Link, List, Heading],
    toolbar: {
        items: ['undo', 'redo', '|', 'heading', '|', 'bold', 'italic', '|', 'link', '|', 'bulletedList', 'numberedList']
    },
    licenseKey: 'GPL'
};

const emit = defineEmits<{
    openConditionsModal: [];
}>();
</script>

<template>
    <div class="mt-8 flex w-full flex-col rounded-2xl bg-white p-8 max-md:p-4">
        <h3 class="mb-4 font-bold">Описание акции</h3>
        <Ckeditor v-model="description" :editor="editor" :config="editorConfig" />
        <div class="my-6">
            <div class="h-[1px] w-full bg-black/30"></div>
            <div class="my-4 flex flex-row items-center justify-between max-md:flex-col max-md:items-start">
                <p class="all_text mr-10 text-black/50 max-md:mr-0 max-md:mb-4">
                    <strong class="text-base text-black">Допополнительные условия.</strong>
                    Если по вашей акции есть какие-то дополнительные условия, о которых вы считаете нужным заявить - вы можете сделать это ниже. Если
                    никаких дополнительных условий нет, то оставьте поле пустым.
                    <span @click="emit('openConditionsModal')" class="ml-3 cursor-pointer text-[#2578cf] hover:underline">Подробнее</span>
                </p>
                <ToggleSwitch v-model="textEditorOpen" />
            </div>
        </div>
        <div v-show="textEditorOpen" class="mb-4">
            <div class="h-[1px] w-full bg-black/30"></div>
            <Ckeditor v-model="conditions" :editor="editor" :config="editorConfig" />
        </div>
    </div>
</template>

<style>
.ck-editor__editable {
    min-height: 200px;
}
</style>
