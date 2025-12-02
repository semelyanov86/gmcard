<script setup lang="ts">
const props = defineProps<{
    modelValue: boolean;
}>();

const emit = defineEmits<{
    (e: 'update:modelValue', value: boolean): void;
}>();

const close = () => emit('update:modelValue', false);
</script>

<template>
    <teleport to="body">
        <div v-if="modelValue" class="modalSec" role="dialog" aria-modal="true" @click.self="close">
            <div class="modal-content modal-content-Sec">
                <div class="modal-header flex justify-between p-6">
                    <h2 class="text-lg font-bold text-black">Введите промокод</h2>
                    <button class="close-button close-button-Sec" type="button" @click="close">
                        <img src="/images/svg/pop-up/close.svg" alt="Закрыть" />
                    </button>
                </div>
                <div class="h-[1px] bg-[#e7ecf3]"></div>
                <div class="popUpImg flex justify-center py-10">
                    <img src="/images/svg/pop-up/Info.svg" alt="Информация" />
                </div>
                <div class="modal-body modal-body-Sec text-left">
                    <h1 class="text-[36px] font-bold text-black leading-tight">
                        Возможность создавать свои акции, скидки, конкурсы и т.д.
                    </h1>
                    <p class="text-[16px] text-black mt-4">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    </p>
                    <p class="text-[16px] text-[#8A9CAE] mt-2">
                        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    </p>
                </div>
            </div>
        </div>
    </teleport>
</template>
