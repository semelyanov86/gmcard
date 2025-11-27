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
    <section class="border-t border-[#25385a] w-full py-3">

        <div class="bg-[#364867] border-none rounded-[14px] py-4 px-5 text-sm text-[#9aa4b3] flex w-[440px] relative left-[2%] items-center flex-wrap">
            Чтобы увидеть подробности, нажмите знак
            <div id="popUpSecTrigger" role="button" tabindex="0" class="inline-flex items-center" @click="openModal" @keyup.enter.prevent="openModal" @keyup.space.prevent="openModal">
                <img src="/images/svg/tarif/question.svg" alt="Подробнее" class="tariff-info-image ml-2 mr-2" />
                <img src="/images/svg/tarif/questionHover.svg" alt="Подробнее" class="tariff-info-image-hover ml-2 mr-2" />
            </div>
            <br> <span class="text-continue">рядом с опцией</span>
        </div>

        <div class="tariff-details container grid grid-cols-2 gap-[20px] text-white mt-[15px] justify-around items-center sticky top-0 bg-[#041a41] border-b border-[#203457] z-10">


            <div class="tariff-header col-span-1">
                <h2 class="tariff-title text-[36px] text-center leading-normal">Тарифы и что <br/> в них входит</h2>
            </div>


            <div class="tariff-plans col-span-1 grid grid-cols-3 gap-[40px]">
                <!-- Тариф Free -->
                <div class="sr p-4 text-center bg-transparent rounded-[14px] flex flex-col items-center gap-3 w-64 tarifFree">
                    <h3 class="tariff-name text-[24px] font-bold">Free</h3>
                    <div class="tariff-status bg-[#1d3154] rounded-[12px] text-[#8a9cae] py-2 px-6 font-bold">Активен</div>
                </div>

                <!-- Тариф Pro -->
                <div class="sr p-4 text-center rounded-[14px] flex flex-col items-center gap-3 w-64 bg-[#11254a] rounded-b-none tarifPro">
                    <h3 class="tariff-name text-[24px] font-bold tariffName">Pro</h3>
                    <div class="tariff-status bg-[#f4d710] rounded-[12px] text-black py-2 px-6 font-bold">Перейти</div>
                </div>

                <!-- Тариф Exp -->
                <div class="sr p-4 text-center bg-transparent rounded-[14px] flex flex-col items-center gap-3 w-64 tarifExp">
                    <h3 class="tariff-name text-[24px] font-bold tariffName">Exp</h3>
                    <div class="tariff-status bg-[#f4d710] rounded-[12px] text-black py-2 px-6 font-bold">Перейти</div>
                </div>
            </div>
        </div>





        <div class="features-section container grid grid-cols-2 gap-[20px] text-white justify-around rounded-[20px] items-center">


            <div class="features-description col-span-1">
                <h2 class="features-title text-[16px]">Возможность создавать свои <br> акции, скидки, конкурсы и т.д.</h2>
            </div>


            <div class="features-images col-span-1 grid grid-cols-3 gap-[40px] h-[100px]">
                <div class="image-item w-64 flex flex-col items-center justify-center h-full">
                    <img src="/images/svg/tarif/check_yz81wi204gqx.svg" alt="Image 1" class="w-[25px] h-auto markTariff"/>
                </div>
                <div class="image-item image-itemSec w-64 flex flex-col items-center bg-[#11254a] justify-center h-full">
                    <img src="/images/svg/tarif/check_yz81wi204gqx.svg" alt="Image 2" class="w-[25px] h-auto"/>
                </div>
                <div class="image-item w-64 flex flex-col items-center justify-center h-full">
                    <img src="/images/svg/tarif/check_yz81wi204gqx.svg" alt="Image 3" class="w-[25px] h-auto"/>
                </div>
            </div>
        </div>
        <div class="features-section container grid grid-cols-2 gap-[20px] text-white justify-around rounded-[20px]  items-center">


            <div class="features-description col-span-1">
                <h2 class="features-title text-[16px] relative">
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


            <div class="features-images col-span-1 grid grid-cols-3 gap-[40px] h-[100px]">
                <div class="image-item w-64 flex flex-col items-center justify-center h-full text-[18px]">
                    1
                </div>
                <div class="image-item image-itemSec w-64 flex flex-col items-center justify-center h-full bg-[#11254a] text-[18px]">
                    5
                </div>
                <div class="image-item w-64 flex flex-col items-center justify-center h-full text-[18px]">
                    8
                </div>
            </div>

        </div>
        <div class="features-section container grid grid-cols-2 gap-[20px] text-white justify-around rounded-[20px]  items-center">


            <div class="features-description col-span-1">
                <h2 class="features-title text-[16px]">Возможность создавать свои <br> акции, скидки, конкурсы и т.д.</h2>
            </div>


            <div class="features-images col-span-1 grid grid-cols-3 gap-[40px] h-[100px]">
                <div class="image-item w-64 flex flex-col items-center justify-center h-full text-[18px]">
                    99
                </div>
                <div class="image-item image-itemSec w-64 flex flex-col items-center bg-[#11254a] justify-center h-full text-[18px]">
                    190
                </div>
                <div class="image-item w-64 flex flex-col items-center justify-center h-full text-[18px]">
                    500
                </div>
            </div>
        </div>
        <div class="features-section container grid grid-cols-2 gap-[20px] text-white justify-around rounded-[20px]  items-center">


            <div class="features-description col-span-1">
                <h2 class="features-title text-[16px]">Возможность создавать свои <br> акции, скидки, конкурсы и т.д.</h2>
            </div>


            <div class="features-images col-span-1 grid grid-cols-3 gap-[40px] h-[100px]">
                <div class="image-item w-64 flex flex-col items-center justify-center h-full">
                    <img src="/images/svg/tarif/minus.svg" alt="Image 1" class="w-[30px] h-auto"/>
                </div>
                <div class="image-item image-itemSec w-64 flex flex-col items-center bg-[#11254a] justify-center h-full">
                    <img src="/images/svg/tarif/minus.svg" alt="Image 2" class="w-[30px] h-auto"/>
                </div>
                <div class="image-item w-64 flex flex-col items-center justify-center h-full">
                    <img src="/images/svg/tarif/check_yz81wi204gqx.svg" alt="Image 3" class="w-[25px] h-auto"/>
                </div>
            </div>
        </div>
        <div class="features-section container grid grid-cols-2 gap-[20px] text-white justify-around rounded-[20px]  items-center">


            <div class="features-description col-span-1">
                <h2 class="features-title text-[16px]">Возможность создавать свои <br> акции, скидки, конкурсы и т.д.</h2>
            </div>


            <div class="features-images col-span-1 grid grid-cols-3 gap-[40px] h-[100px]">
                <div class="image-item w-64 flex flex-col items-center justify-center h-full">
                    <img src="/images/svg/tarif/minus.svg" alt="Image 1" class="w-[30px] h-auto"/>
                </div>
                <div class="image-item image-itemSec w-64 flex flex-col items-center bg-[#11254a] justify-center h-full">
                    <img src="/images/svg/tarif/minus.svg" alt="Image 2" class="w-[30px] h-auto"/>
                </div>
                <div class="image-item w-64 flex flex-col items-center justify-center h-full">
                    <img src="/images/svg/tarif/check_yz81wi204gqx.svg" alt="Image 3" class="w-[25px] h-auto"/>
                </div>
            </div>
        </div>
        <div class="features-section container grid grid-cols-2 gap-[20px] text-white justify-around rounded-[20px] items-center">


            <div class="features-description col-span-1">
                <h2 class="features-title text-[16px]">Возможность создавать свои <br> акции, скидки, конкурсы и т.д.</h2>
            </div>


            <div class="features-images col-span-1 grid grid-cols-3 gap-[40px] h-[100px]">
                <div class="image-item w-64 flex flex-col items-center justify-center h-full">
                    <img src="/images/svg/tarif/check_yz81wi204gqx.svg" alt="Image 1" class="w-[30px] h-auto"/>
                </div>
                <div class="image-item image-itemSec w-64 flex flex-col items-center bg-[#11254a] justify-center h-full">
                    <img src="/images/svg/tarif/check_yz81wi204gqx.svg" alt="Image 2" class="w-[25px] h-auto"/>
                </div>
                <div class="image-item w-64 flex flex-col items-center justify-center h-full">
                    <img src="/images/svg/tarif/check_yz81wi204gqx.svg" alt="Image 3" class="w-[25px] h-auto"/>
                </div>
            </div>

        </div>
        <div class="features-section container grid grid-cols-2 gap-[20px] text-white justify-around rounded-[20px] items-center">


            <div class="features-description col-span-1">
                <h2 class="features-title text-[16px]">Возможность создавать свои <br> акции, скидки, конкурсы и т.д.</h2>
            </div>

            <div class="features-images col-span-1 grid grid-cols-3 gap-[40px] h-[100px]">
                <div class="image-item w-64 flex flex-col items-center justify-center h-full">
                    <img src="/images/svg/tarif/minus.svg" alt="Image 1" class="w-[30px] h-auto"/>
                </div>
                <div class="image-item image-itemSec w-64 flex flex-col items-center bg-[#11254a] justify-center h-full">
                    <img src="/images/svg/tarif/check_yz81wi204gqx.svg" alt="Image 2" class="w-[25px] h-auto"/>
                </div>
                <div class="image-item w-64 flex flex-col items-center justify-center h-full">
                    <img src="/images/svg/tarif/check_yz81wi204gqx.svg" alt="Image 3" class="w-[25px] h-auto"/>
                </div>
            </div>

        </div>
        <div class="features-section container grid grid-cols-2 gap-[20px] text-white justify-around rounded-[20px] items-center">


            <div class="features-description col-span-1">
                <h2 class="features-title text-[16px] relative">
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


            <div class="features-images col-span-1 grid grid-cols-3 gap-[40px] h-[100px]">
                <div class="image-item w-64 flex flex-col items-center justify-center h-full text-[18px]">
                    50%
                </div>
                <div class="image-item image-itemSec w-64 flex flex-col items-center bg-[#11254a] justify-center h-full text-[18px]">
                    20%
                </div>
                <div class="image-item w-64 flex flex-col items-center justify-center h-full text-[18px]">
                    5%
                </div>
            </div>

        </div>
        <div class="features-section container grid grid-cols-2 gap-[20px] text-white justify-around rounded-[20px] items-center">


            <div class="features-description col-span-1">
                <h2 class="features-title text-[16px]">Возможность создавать свои <br> акции, скидки, конкурсы и т.д.</h2>
            </div>

            <div class="features-images col-span-1 grid grid-cols-3 gap-[40px] h-[100px]">
                <div class="image-item w-64 flex flex-col items-center justify-center h-full">
                    <img src="/images/svg/tarif/minus.svg" alt="Image 1" class="w-[30px] h-auto"/>
                </div>
                <div class="image-item image-itemSec w-64 flex flex-col items-center bg-[#11254a] justify-center h-full">
                    <img src="/images/svg/tarif/check_yz81wi204gqx.svg" alt="Image 2" class="w-[25px] h-auto"/>
                </div>
                <div class="image-item w-64 flex flex-col items-center justify-center h-full">
                    <img src="/images/svg/tarif/check_yz81wi204gqx.svg" alt="Image 3" class="w-[25px] h-auto"/>
                </div>
            </div>

        </div>

        <div class="tariff-details tariff-details-Bottom container grid grid-cols-2 gap-[250px] text-white justify-around items-center border-t border-[#203457]">


            <div class="tariff-header col-span-1">
                <h2 class="tariff-title text-[36px] text-center leading-normal"></h2>
            </div>


            <div class="tariff-plans tariff-plans-Bottom col-span-1 grid grid-cols-3 gap-[40px] mr-2">

                <div class="sr p-4 text-center bg-transparent rounded-[14px] flex flex-col items-center gap-3 w-64 tarifFree">
                    <h3 class="tariff-name text-[24px] font-bold"></h3>
                    <div class="tariff-status bg-[#1d3154] rounded-[12px] text-[#8a9cae] py-2 px-6 font-bold">Активен</div>
                </div>


                <div class="sr p-4 text-center rounded-[14px] flex flex-col items-center gap-3 w-64 bg-[#11254a] rounded-t-none tarifPro tarifPro-Bottom">
                    <h3 class="tariff-name text-[24px] font-bold"></h3>
                    <div class="tariff-status bg-[#f4d710] rounded-[12px] text-black py-2 px-6 font-bold">Перейти</div>
                </div>


                <div class="sr p-4 text-center bg-transparent rounded-[14px] flex flex-col items-center gap-3 w-64 tarifExp">
                    <h3 class="tariff-name text-[24px] font-bold"></h3>
                    <div class="tariff-status bg-[#f4d710] rounded-[12px] text-black py-2 px-6 font-bold">Перейти</div>
                </div>
            </div>
        </div>
    </section>
    <TariffInfoModal v-model="isModalOpen" />
</template>

