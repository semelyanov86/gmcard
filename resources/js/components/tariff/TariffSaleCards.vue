<script setup lang="ts">
import TariffFeatureItem from '@/components/tariff/TariffFeatureItem.vue';
import TariffProFeatureItem from '@/components/tariff/TariffProFeatureItem.vue';
</script>

<template>
    <div class="flex flex-wrap gap-6 justify-between saleWrapper">
        <div class="flex-shrink-0 w-sale-card-md bg-white rounded-3xl saleBlock p-4">
            <div class="flex flex-col items-center">
                <div class="relative">
                    <img src="/images/svg/saleBlocks/GR.svg" alt="image"
                         class="rectangles rectangles--first object-cover rounded-lg" />
                </div>
                <h2 class="font-bold text-4xl text-black mt-4 tariffName tariffName-F">Free</h2>
                <p class="text-sm text-slate-400 mt-2">Мне только посмотреть</p>
                <div class="space-y-2 mt-4">
                    <button
                        class="w-full py-4 px-12 bg-tariff-muted text-center text-sm text-[#8A9CAE] btnTariff">
                        Базовый тариф всегда <br />бесплатно для каждого 😉
                    </button>
                    <button
                        class="w-full py-4 goinBtn goinBtnFree rounded-lg bg-tariff-muted px-4 text-sm text-[#8A9CAE] font-bold text-center">
                        Активен ✔
                    </button>
                </div>
                <p class="mt-4 text-sm text-slate-400 dashes-underline cursor-pointer">У меня есть промокод</p>
            </div>
            <div class="border-t mt-4"></div>
            <div class="p-5 tariffAb text-black">
                <h3 class="font-bold text-sm mt-4">Что входит:</h3>
                <ul class="space-y-2 mt-2">
                    <TariffFeatureItem text="базовый набор возможностей" />
                    <TariffFeatureItem text="бесплатное создание акций" />
                    <TariffFeatureItem text="стандартный кэшбэк" />
                    <TariffFeatureItem text="редактируемый бейдж" />
                    <TariffFeatureItem text="стандартная комиссия за вывод средств" />
                    <TariffFeatureItem text="и многое другое, подробнее ниже" />
                </ul>
            </div>
        </div>

        <div class="flex-shrink-0 w-sale-card-md secondSale rounded-3xl saleBlock p-4">
            <div class="flex flex-col items-center">
                <div class="relative ">
                    <img src="/images/svg/saleBlocks/YR.svg" alt="image"
                         class="rectangles rectangles--second object-cover rounded-lg" />
                    <img src="/images/svg/saleBlocks/Hint.svg" class="popular-img" alt="">
                </div>


                <h2 class="font-bold text-4xl text-white mt-4 tariffName-F">Pro</h2>
                <p class="text-sm text-slate-400 mt-2">Уже посмотрел</p>
                <div class="space-y-2 mt-4 w-full">
                    <div
                        class="w-full py-4 pr-8 pl-7 rounded-lg bg-[#3d5b92] text-center text-sm text-white checkTariff">

                        <div class="flex items-center justify-between mb-4 firstCheckTariff">
                            <label for="radio1" class="flex items-center space-x-2 cursor-pointer">
                                <input type="radio" id="radio1" name="subscription" class="custom-radio hidden">
                                <span class="checkmark"></span>
                                <span>1 месяц</span>
                            </label>
                            <span>200 ₽ в мес.</span>
                        </div>

                        <div class="bg-main-tariff tariffRaz"></div>


                        <div class="flex items-center justify-between gap-[30px] mt-4 SecondCheckTariff">
                            <label for="radio2" class="flex items-center space-x-2 cursor-pointer">
                                <input type="radio" id="radio2" name="subscription" class="custom-radio hidden">
                                <span class="checkmark"></span>
                                <span>1 год</span>
                        <div class="bg-tariff-discount px-3 py-1 rounded-lg text-white discount">-25%</div>
                            </label>
                            <div class="flex items-center space-x-2">
                                <div class="text-tariff-muted line-through">200</div>
                                <span class="text-white">150 ₽ в мес.</span>
                            </div>
                        </div>
                    </div>
                    <button
                        class="w-full py-4 rounded-lg goinBtn px-4 text-sm text-black font-bold text-center bg-[#f4d710]">
                        Перейти
                    </button>
                </div>
                <p class="mt-4 text-sm text-white dashes-underline dashes-underline-second cursor-pointer">
                    У меня есть промокод
                </p>
            </div>
            <div class="borderSec mt-4"></div>
            <div class="p-5 tariffAb text-white">
                <h3 class="font-bold text-sm mt-4">Что входит:</h3>
                <ul class="space-y-2 mt-2">
                    <TariffProFeatureItem text="больше возможностей" />
                    <TariffProFeatureItem text="бесплатное создание акций" />
                    <TariffProFeatureItem text="повышенный кэшбэк" />
                    <TariffProFeatureItem text="премиум бейдж" />
                    <TariffProFeatureItem text="пониженная комиссия за вывод средств" />
                    <TariffProFeatureItem text="и многое другое, подробнее ниже" />
                </ul>
            </div>
        </div>

        <div class="flex-shrink-0 w-sale-card-md bg-white rounded-3xl saleBlock p-4">
            <div class="flex flex-col items-center">
                <div class="relative">
                    <img src="/images/svg/saleBlocks/BR.svg" alt="image"
                         class="rectangles rectangles--third object-cover rounded-lg" />
                </div>
                <h2 class="font-bold text-4xl text-black mt-4 tariffName-F">Exp</h2>
                <p class="text-sm text-slate-400 mt-2">Знаю чего хочу</p>
                <div
                    class="w-full py-4 pr-8 pl-7 rounded-lg mt-4 bg-tariff-muted text-center text-sm text-black checkTariffExp">
                    <div class="flex items-center justify-between mb-4 firstCheckTariff ">
                        <label for="radio3" class="flex items-center space-x-2 cursor-pointer">
                            <input type="radio" id="radio3" name="subscription" class="custom-radio hidden" />
                            <span class="checkmark checkmark--sec "></span>
                            <span>1 месяц</span>
                        </label>
                        <span>600 ₽ в мес.</span>
                    </div>
                    <div class="bg-white tariffRaz"></div>


                    <div class="flex items-center justify-between gap-[30px] mt-4 SecondCheckTariffExp">
                        <label for="radio4" class="flex items-center space-x-2 cursor-pointer">
                            <input type="radio" id="radio4" name="subscription" class="custom-radio hidden" />
                            <span class="checkmark checkmark--sec"></span>
                            <span>1 год</span>
                            <div class="bg-tariff-discount-alt px-3 py-1 rounded-lg text-black font-bold discount">-25%</div>
                        </label>
                        <div class="flex items-center space-x-2">
                            <div class="text-slate-400 line-through">600</div>
                            <span class="text-black">450 ₽ в мес.</span>
                        </div>
                    </div>
                </div>
                <button
                    class="w-full py-4 rounded-lg goinBtn px-4 text-sm text-black font-bold text-center mt-4 bg-[#f4d710]">
                    Перейти
                </button>
                <div class="hidden promoCodeDisplay mt-4 flex items-center justify-between w-full">
                    <span class="font-bold text-black">Промокод:</span>
                </div>
                <p class="mt-4 text-sm text-slate-400 dashes-underline cursor-pointer">У меня есть промокод</p>
            </div>
            <div class="border-t mt-4"></div>
            <div class="p-5 tariffAb text-black">
                <h3 class="font-bold text-sm mt-4">Что входит:</h3>
                <ul class="space-y-2 mt-2">
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
