<script setup lang="ts">
import { Modal } from '@inertiaui/modal-vue';
</script>

<template>
    <Modal :close-button="false" padding-classes="p-0" panel-classes="bg-transparent shadow-none" max-width="md" v-slot="{ close }">
        <div class="modalSec" role="dialog" aria-modal="true" @click.self="close">
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
                    <h1 class="text-[36px] leading-tight font-bold text-black">Возможность создавать свои акции, скидки, конкурсы и т.д.</h1>
                    <p class="mt-4 text-[16px] text-black">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    </p>
                    <p class="mt-2 text-[16px] text-[#8A9CAE]">
                        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    </p>
                </div>
            </div>
        </div>
    </Modal>
</template>

<style scoped>
.modalSec {
    display: flex;
    justify-content: center;
    align-items: center;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    z-index: 1000;
}

.modal-content-Sec {
    background-color: #ffffff;
    border-radius: 8px;
    width: 400px;
    max-width: 100%;
}

.modal-body-Sec {
    padding-bottom: 54px;
    padding-top: 32px;
    padding-left: 40px;
    padding-right: 40px;
}
</style>
