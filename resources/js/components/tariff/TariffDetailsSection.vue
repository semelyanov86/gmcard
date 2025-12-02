<script setup lang="ts">
import { onUnmounted, ref, watch } from 'vue';
import TariffInfoModal from '@/components/tariff/TariffInfoModal.vue';

const isModalOpen = ref(false);

const openModal = () => {
    isModalOpen.value = true;
};

const closeModal = () => {
    isModalOpen.value = false;
};

const handleKeydown = (event: KeyboardEvent) => {
    if (event.key === 'Escape') {
        closeModal();
    }
};

watch(
    isModalOpen,
    (value) => {
        if (value) {
            window.addEventListener('keydown', handleKeydown);
        } else {
            window.removeEventListener('keydown', handleKeydown);
        }
    },
    { immediate: true }
);

onUnmounted(() => {
    window.removeEventListener('keydown', handleKeydown);
});
</script>

<template>
    <section class="border-t border-brand w-full py-3">

        <div class="bg-slate-600 border-none rounded-2xl py-4 px-5 text-sm text-slate-400 flex w-112 relative info items-center flex-wrap">
            Чтобы увидеть подробности, нажмите знак
            <div id="popUpSecTrigger" role="button" tabindex="0" class="inline-flex items-center" @click="openModal" @keyup.enter.prevent="openModal" @keyup.space.prevent="openModal">
                <img src="/images/svg/tarif/question.svg" alt="Подробнее" class="tariff-info-image ml-2 mr-2" />
                <img src="/images/svg/tarif/questionHover.svg" alt="Подробнее" class="tariff-info-image-hover ml-2 mr-2" />
            </div>
            <br> <span class="text-continue">рядом с опцией</span>
        </div>

        <div class="tariff-details container grid grid-cols-2 gap-5 text-white mt-4 justify-around items-center sticky top-0 bg-brand-darker border-b border-brand z-10">


            <div class="tariff-header col-span-1">
                <h2 class="tariff-title text-4xl text-center leading-normal">Тарифы и что <br/> в них входит</h2>
            </div>


            <div class="tariff-plans col-span-1 grid grid-cols-3 gap-10">
                <!-- Тариф Free -->
                <div class="sr p-4 text-center bg-transparent rounded-[14px] rounded-2xl flex flex-col items-center gap-3 w-64 tarifFree">
                    <h3 class="tariff-name text-2xl font-bold">Free</h3>
                    <div class="tariff-status bg-[#1d3154] rounded-[12px] text-[#8a9cae] py-2 px-6 font-bold">Активен</div>
                </div>

                <!-- Тариф Pro -->
                <div class="sr p-4 text-center rounded-[14px] flex flex-col items-center gap-3 w-64 dark-blue rounded-b-none tarifPro">
                    <h3 class="tariff-name text-2xl font-bold tariffName">Pro</h3>
                    <div class="tariff-status bg-brand-yellow-dark rounded-[12px] text-black py-2 px-6 font-bold">Перейти</div>
                </div>

                <!-- Тариф Exp -->
                <div class="sr p-4 text-center bg-transparent rounded-[14px] flex flex-col items-center gap-3 w-64 tarifExp">
                    <h3 class="tariff-name text-2xl font-bold tariffName">Exp</h3>
                    <div class="tariff-status bg-brand-yellow-dark rounded-[12px] text-black py-2 px-6 font-bold">Перейти</div>
                </div>
            </div>
        </div>





        <div class="features-section container grid grid-cols-2 gap-5 text-white justify-around rounded-3xl items-center">


            <div class="features-description col-span-1">
                <h2 class="features-title text-16">Возможность создавать свои <br> акции, скидки, конкурсы и т.д.</h2>
            </div>


            <div class="features-images col-span-1 grid grid-cols-3 gap-10 h-100">
                <div class="image-item w-64 flex flex-col items-center justify-center h-full">
                    <img src="/images/svg/tarif/check_yz81wi204gqx.svg" alt="Image 1" class="w-6 h-auto markTariff"/>
                </div>
                <div class="image-item image-itemSec w-64 flex flex-col items-center dark-blue justify-center h-full">
                    <img src="/images/svg/tarif/check_yz81wi204gqx.svg" alt="Image 2" class="w-6 h-auto"/>
                </div>
                <div class="image-item w-64 flex flex-col items-center justify-center h-full">
                    <img src="/images/svg/tarif/check_yz81wi204gqx.svg" alt="Image 3" class="w-6 h-auto"/>
                </div>
            </div>
        </div>
        <div class="features-section container grid grid-cols-2 gap-5 text-white justify-around rounded-3xl items-center">


            <div class="features-description col-span-1">
                <h2 class="features-title text-16 relative">
                    Возможность создавать свои <br> акции, скидки, конкурсы и т.д.
                    <span
                        class="inline-flex absolute left-[100%] top-[47%] group"
                        role="button"
                        tabindex="0"
                        @click="openModal"
                        @keyup.enter.prevent="openModal"
                        @keyup.space.prevent="openModal"
                    >
                        <img src="/images/svg/tarif/question.svg" alt="Подробнее" class="tariff-info-image ml-2 mr-2 group-hover:hidden" />
                        <img src="/images/svg/tarif/questionHover.svg" alt="Подробнее" class="tariff-info-image-hover ml-2 mr-2 hidden group-hover:inline-block" />
                    </span>
                </h2>
            </div>


            <div class="features-images col-span-1 grid grid-cols-3 gap-10 h-100">
                <div class="image-item w-64 flex flex-col items-center justify-center h-full text-18">
                    1
                </div>
                <div class="image-item image-itemSec w-64 flex flex-col items-center justify-center h-full dark-blue text-18">
                    5
                </div>
                <div class="image-item w-64 flex flex-col items-center justify-center h-full text-18">
                    8
                </div>
            </div>

        </div>
        <div class="features-section container grid grid-cols-2 gap-5 text-white justify-around rounded-3xl  items-center">


            <div class="features-description col-span-1">
                <h2 class="features-title text-16">Возможность создавать свои <br> акции, скидки, конкурсы и т.д.</h2>
            </div>


            <div class="features-images col-span-1 grid grid-cols-3 gap-10 h-100">
                <div class="image-item w-64 flex flex-col items-center justify-center h-full text-18">
                    99
                </div>
                <div class="image-item image-itemSec w-64 flex flex-col items-center dark-blue justify-center h-full text-18">
                    190
                </div>
                <div class="image-item w-64 flex flex-col items-center justify-center h-full text-18">
                    500
                </div>
            </div>
        </div>
        <div class="features-section container grid grid-cols-2 gap-5 text-white justify-around rounded-3xl  items-center">


            <div class="features-description col-span-1">
                <h2 class="features-title text-16">Возможность создавать свои <br> акции, скидки, конкурсы и т.д.</h2>
            </div>


            <div class="features-images col-span-1 grid grid-cols-3 gap-10 h-100">
                <div class="image-item w-64 flex flex-col items-center justify-center h-full">
                    <img src="/images/svg/tarif/minus.svg" alt="Image 1" class="w-30 h-auto"/>
                </div>
                <div class="image-item image-itemSec w-64 flex flex-col items-center dark-blue justify-center h-full">
                    <img src="/images/svg/tarif/minus.svg" alt="Image 2" class="w-30 h-auto"/>
                </div>
                <div class="image-item w-64 flex flex-col items-center justify-center h-full">
                    <img src="/images/svg/tarif/check_yz81wi204gqx.svg" alt="Image 3" class="w-6 h-auto"/>
                </div>
            </div>
        </div>
        <div class="features-section container grid grid-cols-2 gap-5 text-white justify-around rounded-3xl items-center">


            <div class="features-description col-span-1">
                <h2 class="features-title text-16">Возможность создавать свои <br> акции, скидки, конкурсы и т.д.</h2>
            </div>


            <div class="features-images col-span-1 grid grid-cols-3 gap-10 h-100">
                <div class="image-item w-64 flex flex-col items-center justify-center h-full">
                    <img src="/images/svg/tarif/minus.svg" alt="Image 1" class="w-30 h-auto"/>
                </div>
                <div class="image-item image-itemSec w-64 flex flex-col items-center dark-blue justify-center h-full">
                    <img src="/images/svg/tarif/minus.svg" alt="Image 2" class="w-30 h-auto"/>
                </div>
                <div class="image-item w-64 flex flex-col items-center justify-center h-full">
                    <img src="/images/svg/tarif/check_yz81wi204gqx.svg" alt="Image 3" class="w-6 h-auto"/>
                </div>
            </div>
        </div>
        <div class="features-section container grid grid-cols-2 gap-5 text-white justify-around rounded-3xl items-center">


            <div class="features-description col-span-1">
                <h2 class="features-title text-16">Возможность создавать свои <br> акции, скидки, конкурсы и т.д.</h2>
            </div>


            <div class="features-images col-span-1 grid grid-cols-3 gap-10 h-100">
                <div class="image-item w-64 flex flex-col items-center justify-center h-full">
                    <img src="/images/svg/tarif/check_yz81wi204gqx.svg" alt="Image 1" class="w-30 h-auto"/>
                </div>
                <div class="image-item image-itemSec w-64 flex flex-col items-center dark-blue justify-center h-full">
                    <img src="/images/svg/tarif/check_yz81wi204gqx.svg" alt="Image 2" class="w-6 h-auto"/>
                </div>
                <div class="image-item w-64 flex flex-col items-center justify-center h-full">
                    <img src="/images/svg/tarif/check_yz81wi204gqx.svg" alt="Image 3" class="w-6 h-auto"/>
                </div>
            </div>

        </div>
        <div class="features-section container grid grid-cols-2 gap-5 text-white justify-around rounded-3xl items-center">


            <div class="features-description col-span-1">
                <h2 class="features-title text-16">Возможность создавать свои <br> акции, скидки, конкурсы и т.д.</h2>
            </div>

            <div class="features-images col-span-1 grid grid-cols-3 gap-10 h-100">
                <div class="image-item w-64 flex flex-col items-center justify-center h-full">
                    <img src="/images/svg/tarif/minus.svg" alt="Image 1" class="w-30 h-auto"/>
                </div>
                <div class="image-item image-itemSec w-64 flex flex-col items-center dark-blue justify-center h-full">
                    <img src="/images/svg/tarif/check_yz81wi204gqx.svg" alt="Image 2" class="w-6 h-auto"/>
                </div>
                <div class="image-item w-64 flex flex-col items-center justify-center h-full">
                    <img src="/images/svg/tarif/check_yz81wi204gqx.svg" alt="Image 3" class="w-6 h-auto"/>
                </div>
            </div>

        </div>
        <div class="features-section container grid grid-cols-2 gap-5 text-white justify-around rounded-3xl items-center">


            <div class="features-description col-span-1">
                <h2 class="features-title text-16 relative">
                    Возможность создавать свои <br> акции, скидки, конкурсы и т.д.
                    <span
                        class="inline-flex absolute left-[100%] top-[47%] group"
                        role="button"
                        tabindex="0"
                        @click="openModal"
                        @keyup.enter.prevent="openModal"
                        @keyup.space.prevent="openModal"
                    >
                        <img src="/images/svg/tarif/question.svg" alt="Подробнее" class="tariff-info-image ml-2 mr-2 group-hover:hidden" />
                        <img src="/images/svg/tarif/questionHover.svg" alt="Подробнее" class="tariff-info-image-hover ml-2 mr-2 hidden group-hover:inline-block" />
                    </span>
                </h2>
            </div>


            <div class="features-images col-span-1 grid grid-cols-3 gap-10 h-100">
                <div class="image-item w-64 flex flex-col items-center justify-center h-full text-18">
                    50%
                </div>
                <div class="image-item image-itemSec w-64 flex flex-col items-center dark-blue justify-center h-full text-18">
                    20%
                </div>
                <div class="image-item w-64 flex flex-col items-center justify-center h-full text-18">
                    5%
                </div>
            </div>

        </div>
        <div class="features-section container grid grid-cols-2 gap-5 text-white justify-around rounded-3xl items-center">


            <div class="features-description col-span-1">
                <h2 class="features-title text-16">Возможность создавать свои <br> акции, скидки, конкурсы и т.д.</h2>
            </div>

            <div class="features-images col-span-1 grid grid-cols-3 gap-10 h-100">
                <div class="image-item w-64 flex flex-col items-center justify-center h-full">
                    <img src="/images/svg/tarif/minus.svg" alt="Image 1" class="w-30 h-auto"/>
                </div>
                <div class="image-item image-itemSec w-64 flex flex-col items-center dark-blue justify-center h-full">
                    <img src="/images/svg/tarif/check_yz81wi204gqx.svg" alt="Image 2" class="w-6 h-auto"/>
                </div>
                <div class="image-item w-64 flex flex-col items-center justify-center h-full">
                    <img src="/images/svg/tarif/check_yz81wi204gqx.svg" alt="Image 3" class="w-6 h-auto"/>
                </div>
            </div>

        </div>

        <div class="tariff-details tariff-details-Bottom container grid grid-cols-2 gap-[250px] text-white justify-around items-center border-t border-brand">


            <div class="tariff-header col-span-1">
                <h2 class="tariff-title text-[36px] text-center leading-normal"></h2>
            </div>


            <div class="tariff-plans tariff-plans-Bottom col-span-1 grid grid-cols-3 gap-10 mr-2">

                <div class="sr p-4 text-center bg-transparent rounded-[14px] flex flex-col items-center gap-3 w-64 tarifFree">
                    <h3 class="tariff-name text-2xl font-bold"></h3>
                    <div class="tariff-status bg-[#1d3154] rounded-[12px] text-[#8a9cae] py-2 px-6 font-bold">Активен</div>
                </div>


                <div class="sr p-4 text-center rounded-[14px] flex flex-col items-center gap-3 w-64 dark-blue rounded-t-none tarifPro tarifPro-Bottom">
                    <h3 class="tariff-name text-2xl font-bold"></h3>
                    <div class="tariff-status bg-brand-yellow-dark rounded-[12px] text-black py-2 px-6 font-bold">Перейти</div>
                </div>


                <div class="sr p-4 text-center bg-transparent rounded-[14px] flex flex-col items-center gap-3 w-64 tarifExp">
                    <h3 class="tariff-name text-2xl font-bold"></h3>
                    <div class="tariff-status bg-brand-yellow-dark rounded-[12px] text-black py-2 px-6 font-bold">Перейти</div>
                </div>
            </div>
        </div>
    </section>
    <TariffInfoModal v-model="isModalOpen" />
</template>

<style scoped>
.info {
    left: 2%;
}

.dark-blue {
    background-color: #11254a;
}
</style>
