<script setup lang="ts">
import TariffFeatureItem from '@/components/tariff/TariffFeatureItem.vue';
import TariffProFeatureItem from '@/components/tariff/TariffProFeatureItem.vue';
</script>

<template>
    <div class="saleWrapper flex flex-wrap justify-between gap-6">
        <div class="saleBlock w-sale-card-md flex-shrink-0 rounded-3xl bg-white p-4">
            <div class="flex flex-col items-center">
                <div class="relative">
                    <img src="/images/svg/saleBlocks/GR.svg" alt="image" class="rectangles rectangles--first rounded-lg object-cover" />
                </div>
                <h2 class="tariffName tariffName-F mt-4 text-4xl font-bold text-black">Free</h2>
                <p class="mt-2 text-sm text-slate-400">Мне только посмотреть</p>
                <div class="mt-4 space-y-2">
                    <button class="bg-tariff-muted btnTariff w-full px-12 py-4 text-center text-sm text-[#8A9CAE]">
                        Базовый тариф всегда <br />бесплатно для каждого 😉
                    </button>
                    <button class="goinBtn goinBtnFree bg-tariff-muted w-full rounded-lg px-4 py-4 text-center text-sm font-bold text-[#8A9CAE]">
                        Активен ✔
                    </button>
                </div>
                <p class="dashes-underline mt-4 cursor-pointer text-sm text-slate-400">У меня есть промокод</p>
            </div>
            <div class="mt-4 border-t"></div>
            <div class="tariffAb p-5 text-black">
                <h3 class="mt-4 text-sm font-bold">Что входит:</h3>
                <ul class="mt-2 space-y-2">
                    <TariffFeatureItem text="базовый набор возможностей" />
                    <TariffFeatureItem text="бесплатное создание акций" />
                    <TariffFeatureItem text="стандартный кэшбэк" />
                    <TariffFeatureItem text="редактируемый бейдж" />
                    <TariffFeatureItem text="стандартная комиссия за вывод средств" />
                    <TariffFeatureItem text="и многое другое, подробнее ниже" />
                </ul>
            </div>
        </div>

        <div class="secondSale saleBlock w-sale-card-md flex-shrink-0 rounded-3xl p-4">
            <div class="flex flex-col items-center">
                <div class="relative">
                    <img src="/images/svg/saleBlocks/YR.svg" alt="image" class="rectangles rectangles--second rounded-lg object-cover" />
                    <img src="/images/svg/saleBlocks/Hint.svg" class="popular-img" alt="" />
                </div>

                <h2 class="tariffName-F mt-4 text-4xl font-bold text-white">Pro</h2>
                <p class="mt-2 text-sm text-slate-400">Уже посмотрел</p>
                <div class="mt-4 w-full space-y-2">
                    <div class="checkTariff w-full rounded-lg bg-[#3d5b92] py-4 pr-8 pl-7 text-center text-sm text-white">
                        <div class="firstCheckTariff mb-4 flex items-center justify-between">
                            <label for="radio1" class="flex cursor-pointer items-center space-x-2">
                                <input type="radio" id="radio1" name="subscription" class="custom-radio hidden" />
                                <span class="checkmark"></span>
                                <span>1 месяц</span>
                            </label>
                            <span>200 ₽ в мес.</span>
                        </div>

                        <div class="bg-main-tariff tariffRaz"></div>

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
                    <button class="goinBtn bg-brand-yellow-dark w-full rounded-lg px-4 py-4 text-center text-sm font-bold text-black">Перейти</button>
                </div>
                <p class="dashes-underline dashes-underline-second mt-4 cursor-pointer text-sm text-white">У меня есть промокод</p>
            </div>
            <div class="borderSec mt-4"></div>
            <div class="tariffAb p-5 text-white">
                <h3 class="mt-4 text-sm font-bold">Что входит:</h3>
                <ul class="mt-2 space-y-2">
                    <TariffProFeatureItem text="больше возможностей" />
                    <TariffProFeatureItem text="бесплатное создание акций" />
                    <TariffProFeatureItem text="повышенный кэшбэк" />
                    <TariffProFeatureItem text="премиум бейдж" />
                    <TariffProFeatureItem text="пониженная комиссия за вывод средств" />
                    <TariffProFeatureItem text="и многое другое, подробнее ниже" />
                </ul>
            </div>
        </div>

        <div class="saleBlock w-sale-card-md flex-shrink-0 rounded-3xl bg-white p-4">
            <div class="flex flex-col items-center">
                <div class="relative">
                    <img src="/images/svg/saleBlocks/BR.svg" alt="image" class="rectangles rectangles--third rounded-lg object-cover" />
                </div>
                <h2 class="tariffName-F mt-4 text-4xl font-bold text-black">Exp</h2>
                <p class="mt-2 text-sm text-slate-400">Знаю чего хочу</p>
                <div class="bg-tariff-muted checkTariffExp mt-4 w-full rounded-lg py-4 pr-8 pl-7 text-center text-sm text-black">
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
                <button class="goinBtn bg-brand-yellow-dark mt-4 w-full rounded-lg px-4 py-4 text-center text-sm font-bold text-black">
                    Перейти
                </button>
                <div class="promoCodeDisplay mt-4 flex hidden w-full items-center justify-between">
                    <span class="font-bold text-black">Промокод:</span>
                </div>
                <p class="dashes-underline mt-4 cursor-pointer text-sm text-slate-400">У меня есть промокод</p>
            </div>
            <div class="mt-4 border-t"></div>
            <div class="tariffAb p-5 text-black">
                <h3 class="mt-4 text-sm font-bold">Что входит:</h3>
                <ul class="mt-2 space-y-2">
                    <TariffFeatureItem text="базовый набор возможностей" />
                    <TariffFeatureItem text="бесплатное создание акций" />
                    <TariffFeatureItem text="стандартный кэшбэк" />
                    <TariffFeatureItem text="редактируемый бейдж" />
                    <TariffFeatureItem text="стандартная комиссия за вывод средств" />
                    <TariffFeatureItem text="и многое другое, подробнее ниже" />
                </ul>
            </div>
        </div>
    </div>
</template>

<style scoped>
.tariffRaz {
    margin-right: -2rem;
    margin-left: -1.7rem;
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
}
</style>
