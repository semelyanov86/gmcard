<script setup lang="ts">
import TariffButton from '@/components/tariff/TariffButton.vue';
import TariffFeatureItem from '@/components/tariff/TariffFeatureItem.vue';
import TariffProFeatureItem from '@/components/tariff/TariffProFeatureItem.vue';
import type { TariffPlanModel } from '@/types/tariff/TariffPlanModel';
import { computed } from 'vue';

const { tariffPlans } = defineProps<{
    tariffPlans: TariffPlanModel[];
}>();

const freeTariff = tariffPlans[0];
const proTariff = tariffPlans[1];
const expTariff = tariffPlans[2];

const freeIncludedFeatures = computed(() => freeTariff.features.filter((f) => f.category === 'included'));
const proIncludedFeatures = computed(() => proTariff.features.filter((f) => f.category === 'included'));
const expIncludedFeatures = computed(() => expTariff.features.filter((f) => f.category === 'included'));
</script>

<template>
    <div class="saleWrapper flex gap-6 overflow-x-auto px-6 lg:flex-wrap lg:justify-between lg:overflow-visible lg:px-0">
        <div class="saleBlock w-sale-card-md flex-shrink-0 rounded-3xl bg-white p-4">
            <div class="flex flex-col items-center">
                <div class="relative">
                    <img src="/images/svg/saleBlocks/GR.svg" alt="image" class="rectangles rectangles--first rounded-lg object-cover" />
                </div>
                <h2 class="tariffName tariffName-F mt-4 text-4xl font-bold text-black">
                    {{ freeTariff.name }}
                </h2>
                <p class="mt-2 text-sm text-slate-400">Мне только посмотреть</p>
                <div class="mt-4 space-y-2">
                    <button class="bg-tariff-muted btnTariff w-full rounded-lg px-12 py-4 text-center text-sm text-gray-400">
                        Базовый тариф всегда <br />бесплатно для каждого 😉
                    </button>
                    <TariffButton :tariff="freeTariff" />
                </div>
                <p class="dashes-underline mt-4 cursor-pointer text-sm text-slate-400">У меня есть промокод</p>
            </div>
            <div class="mt-4 border-t"></div>
            <div v-if="freeTariff" class="tariffAb p-5 text-black">
                <h3 class="mt-4 text-sm font-bold">Что входит:</h3>
                <ul class="mt-2 space-y-2">
                    <TariffFeatureItem v-for="feature in freeIncludedFeatures" :key="feature.id" :text="feature.display_name" />
                </ul>
            </div>
        </div>

        <div class="secondSale saleBlock w-sale-card-md flex-shrink-0 rounded-3xl p-4">
            <div class="flex flex-col items-center">
                <div class="relative">
                    <img src="/images/svg/saleBlocks/YR.svg" alt="image" class="rectangles rectangles--second rounded-lg object-cover" />
                    <img src="/images/svg/saleBlocks/Hint.svg" class="popular-img" alt="" />
                </div>

                <h2 class="tariffName-F mt-4 text-4xl font-bold text-white">
                    {{ proTariff.name }}
                </h2>
                <p class="mt-2 text-sm text-slate-400">Уже посмотрел</p>
                <div class="mt-4 w-full space-y-2">
                    <div class="checkTariff w-full rounded-lg bg-[#3d5b92] p-4 pr-8 pl-7 text-center text-sm text-white">
                        <div class="firstCheckTariff mb-4 flex items-center justify-between">
                            <label for="radio1" class="flex cursor-pointer items-center space-x-2">
                                <input type="radio" id="radio1" name="subscription" class="custom-radio hidden" />
                                <span class="checkmark"></span>
                                <span>1 месяц</span>
                            </label>
                            <span>200 ₽ в мес.</span>
                        </div>

                        <div class="tariffRaz mr-[-2rem] h-[1px] bg-[#5974a3]"></div>

                        <div class="SecondCheckTariff mt-4 flex items-center justify-between gap-[30px]">
                            <label for="radio2" class="flex cursor-pointer items-center space-x-2">
                                <input type="radio" id="radio2" name="subscription" class="custom-radio hidden" />
                                <span class="checkmark"></span>
                                <span>1 год</span>
                                <div class="bg-tariff-discount discount rounded-lg px-3 py-1 text-white">-25%</div>
                            </label>
                            <div class="flex items-center space-x-2">
                                <div class="text-tariff-muted line-through">200</div>
                                <span class="text-white">150 ₽ в мес.</span>
                            </div>
                        </div>
                    </div>
                    <TariffButton :tariff="proTariff" />
                </div>
                <p class="dashes-underline dashes-underline-second mt-4 cursor-pointer text-sm text-white">У меня есть промокод</p>
            </div>
            <div class="borderSec mt-4"></div>
            <div v-if="proTariff" class="tariffAb p-5 text-white">
                <h3 class="mt-4 text-sm font-bold">Что входит:</h3>
                <ul class="mt-2 space-y-2">
                    <TariffProFeatureItem v-for="feature in proIncludedFeatures" :key="feature.id" :text="feature.display_name" />
                </ul>
            </div>
        </div>

        <div class="saleBlock w-sale-card-md flex-shrink-0 rounded-3xl bg-white p-4">
            <div class="flex flex-col items-center">
                <div class="relative">
                    <img src="/images/svg/saleBlocks/BR.svg" alt="image" class="rectangles rectangles--third rounded-lg object-cover" />
                </div>
                <h2 class="tariffName-F mt-4 text-4xl font-bold text-black">
                    {{ expTariff.name }}
                </h2>
                <p class="mt-2 text-sm text-slate-400">Знаю чего хочу</p>
                <div class="bg-tariff-muted checkTariffExp mt-4 w-full rounded-lg p-4 pr-8 pl-7 text-center text-sm text-black">
                    <div class="firstCheckTariff mb-4 flex items-center justify-between">
                        <label for="radio3" class="flex cursor-pointer items-center space-x-2">
                            <input type="radio" id="radio3" name="subscription" class="custom-radio hidden" />
                            <span class="checkmark checkmark--sec"></span>
                            <span>1 месяц</span>
                        </label>
                        <span>600 ₽ в мес.</span>
                    </div>
                    <div class="tariffRaz bg-white"></div>

                    <div class="SecondCheckTariffExp mt-4 flex items-center justify-between gap-[30px]">
                        <label for="radio4" class="flex cursor-pointer items-center space-x-2">
                            <input type="radio" id="radio4" name="subscription" class="custom-radio hidden" />
                            <span class="checkmark checkmark--sec"></span>
                            <span>1 год</span>
                            <div class="bg-tariff-discount-alt discount rounded-lg px-3 py-1 font-bold text-black">-25%</div>
                        </label>
                        <div class="flex items-center space-x-2">
                            <div class="text-slate-400 line-through">600</div>
                            <span class="text-black">450 ₽ в мес.</span>
                        </div>
                    </div>
                </div>
                <TariffButton :tariff="expTariff" />
                <div class="promoCodeDisplay mt-4 flex hidden w-full items-center justify-between">
                    <span class="font-bold text-black">Промокод:</span>
                </div>
                <p class="dashes-underline mt-4 cursor-pointer text-sm text-slate-400">У меня есть промокод</p>
            </div>
            <div class="mt-4 border-t"></div>
            <div v-if="expTariff" class="tariffAb p-5 text-black">
                <h3 class="mt-4 text-sm font-bold">Что входит:</h3>
                <ul class="mt-2 space-y-2">
                    <TariffFeatureItem v-for="feature in expIncludedFeatures" :key="feature.id" :text="feature.display_name" />
                </ul>
            </div>
        </div>
    </div>

    <div class="descSectionMob mt-6 block flex flex-col items-center text-center text-[#727e94] lg:hidden">
        <p class="mb-6 text-sm">Действие платных тарифов распространяется на все наши сервисы платформы</p>
        <p class="text-sm text-[#727e94]">
            В данный момент мы предоставляем только один сервис. <br />
            Остальные наши сервисы сейчас в разработке
        </p>
    </div>
</template>

<style scoped>
.saleWrapper {
    padding-bottom: 80px;
    padding-top: 60px;
    padding-left: 16px;
    padding-right: 16px;
    overflow-x: auto;
}

.saleWrapper::-webkit-scrollbar {
    display: none;
}

.saleBlock {
    transition:
        transform 0.3s ease,
        box-shadow 0.3s ease;
}

.saleBlock:hover {
    transform: translateY(-10px);
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    transition:
        transform 0.3s ease,
        box-shadow 0.3s ease;
}

.rectangles {
    margin-top: -3rem;
    width: 6rem;
    height: 6rem;
}

.rectangles--first {
    filter: blur(0px) drop-shadow(0px -3px 10px rgba(255, 255, 255, 0.75));
}

.rectangles--second {
    filter: blur(0px) drop-shadow(0px -3px 15px rgb(244, 185, 16));
    width: 6rem;
    height: 6rem;
}

.rectangles--third {
    filter: blur(0px) drop-shadow(0px -3px 15px rgb(62, 119, 220));
}

.goinBtn {
    background-color: #f4d710;
    transition: 0.3s linear;

    &:hover {
        background-color: #ffeb24;
    }
}

.goinBtnFree {
    background-color: #e7ecf3;

    &:hover {
        background-color: #d7dadd;
    }
}

.secondSale {
    background-color: #0b3277;
}

.tariffRaz {
    margin-right: -2rem;
    margin-left: -1rem;
    height: 1px;
}

.popular-img {
    position: absolute;
    left: 114%;
    bottom: 40%;
    height: auto;
    width: 100%;
}

.w-sale-card-md {
    width: 360px;
    flex-shrink: 0;
}

.custom-radio {
    display: none;
}

.custom-radio + .checkmark--sec {
    background-color: #dce4ef;
}

.custom-radio:checked + .checkmark {
    background-color: #f4d710;
    border-color: #f4d710;
}

.custom-radio:checked + .checkmark::after {
    content: '';
    position: absolute;
    width: 7px;
    height: 11px;
    border: solid black;
    border-width: 0 3px 3px 0;
    transform: rotate(45deg);
    left: 9px;
    top: 5px;
    border-radius: 2px;
}

.checkmark {
    width: 24px;
    height: 24px;
    background-color: #6d84ad;
    border: none;
    border-radius: 50%;
    display: inline-block;
    position: relative;
    transition:
        background-color 0.3s,
        border-color 0.3s;
}

.borderSec {
    --tw-border-opacity: 1;
    border-top-width: 1px;
    border-color: rgb(35, 70, 133);
}

.descSectionMob {
    padding: 0 12px;
    margin-bottom: 24px;
}

@media (min-width: 1024px) {
    .descSectionMob {
        display: none !important;
    }
}

@media (max-width: 440px) {
    .saleWrapper {
        padding-bottom: 0px;
    }

    .saleBlock {
        width: 310px;
        padding: 2px 25px;
        height: auto;
        margin-left: 5px !important;
        margin-right: 5px !important;
    }

    .rectangles {
        margin-top: -1.5rem;
        width: 5rem;
        height: 5rem;
    }

    .tariffName-F {
        font-size: 2.65rem;
    }

    .btnTariff {
        padding: 14px 33px;
    }

    .goinBtnFree {
        padding-top: 12px;
        padding-bottom: 12px;
        padding-left: 1rem;
        padding-right: 1rem;
    }

    .tariffAb {
        padding: 0;
        margin-bottom: 10px;
    }
}

@media (max-width: 768px) {
    .btnTariff {
        padding: 16px 35px;
    }

    .tariffRaz {
        margin-left: -0.5rem;
        margin-right: -0.5rem;
    }

    .checkTariff {
        padding: 8px;
    }

    .checkTariffExp {
        padding: 8px;
        margin-bottom: 9px;
    }

    .firstCheckTariff {
        margin-bottom: 7px;
    }

    .SecondCheckTariff {
        gap: 0;
        margin-top: 9px;
    }

    .SecondCheckTariffExp {
        gap: 0;
        margin-top: 9px;
    }
}

@media (min-width: 1024px) {
    .saleWrapper {
        padding-left: 0;
        padding-right: 0;
    }
}
</style>
