<script setup lang="ts">
import TariffInfoModal from '@/components/tariff/TariffInfoModal.vue';
import { onUnmounted, ref, watch } from 'vue';

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
    { immediate: true },
);

onUnmounted(() => {
    window.removeEventListener('keydown', handleKeydown);
});
</script>

<template>
    <section class="border-brand w-full border-t py-3">
        <div class="info relative flex w-112 flex-wrap items-center rounded-2xl border-none bg-slate-600 px-5 py-4 text-sm text-slate-400">
            Чтобы увидеть подробности, нажмите знак
            <div
                id="popUpSecTrigger"
                role="button"
                tabindex="0"
                class="inline-flex items-center"
                @click="openModal"
                @keyup.enter.prevent="openModal"
                @keyup.space.prevent="openModal"
            >
                <img src="/images/svg/tarif/question.svg" alt="Подробнее" class="tariff-info-image mr-2 ml-2" />
                <img src="/images/svg/tarif/questionHover.svg" alt="Подробнее" class="tariff-info-image-hover mr-2 ml-2" />
            </div>
            <br />
            <span class="text-continue">рядом с опцией</span>
        </div>

        <div
            class="tariff-details bg-brand-darker border-brand sticky top-0 z-10 container mt-4 grid grid-cols-2 items-center justify-around gap-5 border-b text-white"
        >
            <div class="tariff-header col-span-1">
                <h2 class="tariff-title text-center text-4xl leading-normal">
                    Тарифы и что <br />
                    в них входит
                </h2>
            </div>

            <div class="tariff-plans col-span-1 grid grid-cols-3 gap-10">
                <!-- Тариф Free -->
                <div class="sr tarifFree flex w-64 flex-col items-center gap-3 rounded-2xl rounded-[14px] bg-transparent p-4 text-center">
                    <h3 class="tariff-name text-2xl font-bold">Free</h3>
                    <div class="tariff-status rounded-[12px] bg-[#1d3154] px-6 py-2 font-bold text-[#8a9cae]">Активен</div>
                </div>

                <!-- Тариф Pro -->
                <div class="sr dark-blue tarifPro flex w-64 flex-col items-center gap-3 rounded-[14px] rounded-b-none p-4 text-center">
                    <h3 class="tariff-name tariffName text-2xl font-bold">Pro</h3>
                    <div class="tariff-status bg-brand-yellow-dark rounded-[12px] px-6 py-2 font-bold text-black">Перейти</div>
                </div>

                <!-- Тариф Exp -->
                <div class="sr tarifExp flex w-64 flex-col items-center gap-3 rounded-[14px] bg-transparent p-4 text-center">
                    <h3 class="tariff-name tariffName text-2xl font-bold">Exp</h3>
                    <div class="tariff-status bg-brand-yellow-dark rounded-[12px] px-6 py-2 font-bold text-black">Перейти</div>
                </div>
            </div>
        </div>

        <div class="features-section container grid grid-cols-2 items-center justify-around gap-5 rounded-3xl text-white">
            <div class="features-description col-span-1">
                <h2 class="features-title text-16">
                    Возможность создавать свои <br />
                    акции, скидки, конкурсы и т.д.
                </h2>
            </div>

            <div class="features-images col-span-1 grid h-100 grid-cols-3 gap-10">
                <div class="image-item flex h-full w-64 flex-col items-center justify-center">
                    <img src="/images/svg/tarif/check_yz81wi204gqx.svg" alt="Image 1" class="markTariff h-auto w-6" />
                </div>
                <div class="image-item image-itemSec dark-blue flex h-full w-64 flex-col items-center justify-center">
                    <img src="/images/svg/tarif/check_yz81wi204gqx.svg" alt="Image 2" class="h-auto w-6" />
                </div>
                <div class="image-item flex h-full w-64 flex-col items-center justify-center">
                    <img src="/images/svg/tarif/check_yz81wi204gqx.svg" alt="Image 3" class="h-auto w-6" />
                </div>
            </div>
        </div>
        <div class="features-section container grid grid-cols-2 items-center justify-around gap-5 rounded-3xl text-white">
            <div class="features-description col-span-1">
                <h2 class="features-title text-16 relative">
                    Возможность создавать свои <br />
                    акции, скидки, конкурсы и т.д.
                    <span
                        class="group absolute top-[47%] left-[100%] inline-flex"
                        role="button"
                        tabindex="0"
                        @click="openModal"
                        @keyup.enter.prevent="openModal"
                        @keyup.space.prevent="openModal"
                    >
                        <img src="/images/svg/tarif/question.svg" alt="Подробнее" class="tariff-info-image mr-2 ml-2 group-hover:hidden" />
                        <img
                            src="/images/svg/tarif/questionHover.svg"
                            alt="Подробнее"
                            class="tariff-info-image-hover mr-2 ml-2 hidden group-hover:inline-block"
                        />
                    </span>
                </h2>
            </div>

            <div class="features-images col-span-1 grid h-100 grid-cols-3 gap-10">
                <div class="image-item text-18 flex h-full w-64 flex-col items-center justify-center">1</div>
                <div class="image-item image-itemSec dark-blue text-18 flex h-full w-64 flex-col items-center justify-center">5</div>
                <div class="image-item text-18 flex h-full w-64 flex-col items-center justify-center">8</div>
            </div>
        </div>
        <div class="features-section container grid grid-cols-2 items-center justify-around gap-5 rounded-3xl text-white">
            <div class="features-description col-span-1">
                <h2 class="features-title text-16">
                    Возможность создавать свои <br />
                    акции, скидки, конкурсы и т.д.
                </h2>
            </div>

            <div class="features-images col-span-1 grid h-100 grid-cols-3 gap-10">
                <div class="image-item text-18 flex h-full w-64 flex-col items-center justify-center">99</div>
                <div class="image-item image-itemSec dark-blue text-18 flex h-full w-64 flex-col items-center justify-center">190</div>
                <div class="image-item text-18 flex h-full w-64 flex-col items-center justify-center">500</div>
            </div>
        </div>
        <div class="features-section container grid grid-cols-2 items-center justify-around gap-5 rounded-3xl text-white">
            <div class="features-description col-span-1">
                <h2 class="features-title text-16">
                    Возможность создавать свои <br />
                    акции, скидки, конкурсы и т.д.
                </h2>
            </div>

            <div class="features-images col-span-1 grid h-100 grid-cols-3 gap-10">
                <div class="image-item flex h-full w-64 flex-col items-center justify-center">
                    <img src="/images/svg/tarif/minus.svg" alt="Image 1" class="h-auto w-30" />
                </div>
                <div class="image-item image-itemSec dark-blue flex h-full w-64 flex-col items-center justify-center">
                    <img src="/images/svg/tarif/minus.svg" alt="Image 2" class="h-auto w-30" />
                </div>
                <div class="image-item flex h-full w-64 flex-col items-center justify-center">
                    <img src="/images/svg/tarif/check_yz81wi204gqx.svg" alt="Image 3" class="h-auto w-6" />
                </div>
            </div>
        </div>
        <div class="features-section container grid grid-cols-2 items-center justify-around gap-5 rounded-3xl text-white">
            <div class="features-description col-span-1">
                <h2 class="features-title text-16">
                    Возможность создавать свои <br />
                    акции, скидки, конкурсы и т.д.
                </h2>
            </div>

            <div class="features-images col-span-1 grid h-100 grid-cols-3 gap-10">
                <div class="image-item flex h-full w-64 flex-col items-center justify-center">
                    <img src="/images/svg/tarif/minus.svg" alt="Image 1" class="h-auto w-30" />
                </div>
                <div class="image-item image-itemSec dark-blue flex h-full w-64 flex-col items-center justify-center">
                    <img src="/images/svg/tarif/minus.svg" alt="Image 2" class="h-auto w-30" />
                </div>
                <div class="image-item flex h-full w-64 flex-col items-center justify-center">
                    <img src="/images/svg/tarif/check_yz81wi204gqx.svg" alt="Image 3" class="h-auto w-6" />
                </div>
            </div>
        </div>
        <div class="features-section container grid grid-cols-2 items-center justify-around gap-5 rounded-3xl text-white">
            <div class="features-description col-span-1">
                <h2 class="features-title text-16">
                    Возможность создавать свои <br />
                    акции, скидки, конкурсы и т.д.
                </h2>
            </div>

            <div class="features-images col-span-1 grid h-100 grid-cols-3 gap-10">
                <div class="image-item flex h-full w-64 flex-col items-center justify-center">
                    <img src="/images/svg/tarif/check_yz81wi204gqx.svg" alt="Image 1" class="h-auto w-30" />
                </div>
                <div class="image-item image-itemSec dark-blue flex h-full w-64 flex-col items-center justify-center">
                    <img src="/images/svg/tarif/check_yz81wi204gqx.svg" alt="Image 2" class="h-auto w-6" />
                </div>
                <div class="image-item flex h-full w-64 flex-col items-center justify-center">
                    <img src="/images/svg/tarif/check_yz81wi204gqx.svg" alt="Image 3" class="h-auto w-6" />
                </div>
            </div>
        </div>
        <div class="features-section container grid grid-cols-2 items-center justify-around gap-5 rounded-3xl text-white">
            <div class="features-description col-span-1">
                <h2 class="features-title text-16">
                    Возможность создавать свои <br />
                    акции, скидки, конкурсы и т.д.
                </h2>
            </div>

            <div class="features-images col-span-1 grid h-100 grid-cols-3 gap-10">
                <div class="image-item flex h-full w-64 flex-col items-center justify-center">
                    <img src="/images/svg/tarif/minus.svg" alt="Image 1" class="h-auto w-30" />
                </div>
                <div class="image-item image-itemSec dark-blue flex h-full w-64 flex-col items-center justify-center">
                    <img src="/images/svg/tarif/check_yz81wi204gqx.svg" alt="Image 2" class="h-auto w-6" />
                </div>
                <div class="image-item flex h-full w-64 flex-col items-center justify-center">
                    <img src="/images/svg/tarif/check_yz81wi204gqx.svg" alt="Image 3" class="h-auto w-6" />
                </div>
            </div>
        </div>
        <div class="features-section container grid grid-cols-2 items-center justify-around gap-5 rounded-3xl text-white">
            <div class="features-description col-span-1">
                <h2 class="features-title text-16 relative">
                    Возможность создавать свои <br />
                    акции, скидки, конкурсы и т.д.
                    <span
                        class="group absolute top-[47%] left-[100%] inline-flex"
                        role="button"
                        tabindex="0"
                        @click="openModal"
                        @keyup.enter.prevent="openModal"
                        @keyup.space.prevent="openModal"
                    >
                        <img src="/images/svg/tarif/question.svg" alt="Подробнее" class="tariff-info-image mr-2 ml-2 group-hover:hidden" />
                        <img
                            src="/images/svg/tarif/questionHover.svg"
                            alt="Подробнее"
                            class="tariff-info-image-hover mr-2 ml-2 hidden group-hover:inline-block"
                        />
                    </span>
                </h2>
            </div>

            <div class="features-images col-span-1 grid h-100 grid-cols-3 gap-10">
                <div class="image-item text-18 flex h-full w-64 flex-col items-center justify-center">50%</div>
                <div class="image-item image-itemSec dark-blue text-18 flex h-full w-64 flex-col items-center justify-center">20%</div>
                <div class="image-item text-18 flex h-full w-64 flex-col items-center justify-center">5%</div>
            </div>
        </div>
        <div class="features-section container grid grid-cols-2 items-center justify-around gap-5 rounded-3xl text-white">
            <div class="features-description col-span-1">
                <h2 class="features-title text-16">
                    Возможность создавать свои <br />
                    акции, скидки, конкурсы и т.д.
                </h2>
            </div>

            <div class="features-images col-span-1 grid h-100 grid-cols-3 gap-10">
                <div class="image-item flex h-full w-64 flex-col items-center justify-center">
                    <img src="/images/svg/tarif/minus.svg" alt="Image 1" class="h-auto w-30" />
                </div>
                <div class="image-item image-itemSec dark-blue flex h-full w-64 flex-col items-center justify-center">
                    <img src="/images/svg/tarif/check_yz81wi204gqx.svg" alt="Image 2" class="h-auto w-6" />
                </div>
                <div class="image-item flex h-full w-64 flex-col items-center justify-center">
                    <img src="/images/svg/tarif/check_yz81wi204gqx.svg" alt="Image 3" class="h-auto w-6" />
                </div>
            </div>
        </div>

        <div
            class="tariff-details tariff-details-Bottom border-brand container grid grid-cols-2 items-center justify-around gap-[250px] border-t text-white"
        >
            <div class="tariff-header col-span-1">
                <h2 class="tariff-title text-center text-[36px] leading-normal"></h2>
            </div>

            <div class="tariff-plans tariff-plans-Bottom col-span-1 mr-2 grid grid-cols-3 gap-10">
                <div class="sr tarifFree flex w-64 flex-col items-center gap-3 rounded-[14px] bg-transparent p-4 text-center">
                    <h3 class="tariff-name text-2xl font-bold"></h3>
                    <div class="tariff-status rounded-[12px] bg-[#1d3154] px-6 py-2 font-bold text-[#8a9cae]">Активен</div>
                </div>

                <div
                    class="sr dark-blue tarifPro tarifPro-Bottom flex w-64 flex-col items-center gap-3 rounded-[14px] rounded-t-none p-4 text-center"
                >
                    <h3 class="tariff-name text-2xl font-bold"></h3>
                    <div class="tariff-status bg-brand-yellow-dark rounded-[12px] px-6 py-2 font-bold text-black">Перейти</div>
                </div>

                <div class="sr tarifExp flex w-64 flex-col items-center gap-3 rounded-[14px] bg-transparent p-4 text-center">
                    <h3 class="tariff-name text-2xl font-bold"></h3>
                    <div class="tariff-status bg-brand-yellow-dark rounded-[12px] px-6 py-2 font-bold text-black">Перейти</div>
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
