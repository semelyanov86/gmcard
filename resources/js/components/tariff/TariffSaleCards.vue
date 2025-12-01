<script setup lang="ts">
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
                <p class="text-sm text-[#8A9CAE] mt-2">Мне только посмотреть</p>
                <div class="space-y-2 mt-4">
                    <button
                        class="w-full py-4 px-12 rounded-[10px] bg-[#F2F6FB] text-center text-sm text-[#8A9CAE] btnTariff">
                        Базовый тариф всегда <br />бесплатно для каждого 😉
                    </button>
                    <button
                        class="w-full py-4 goinBtn goinBtnFree rounded-[10px] bg-[#F2F6FB] px-4 text-sm text-[#8A9CAE] font-bold text-center">
                        Активен ✔
                    </button>
                    <div class="hidden promoCodeDisplay mt-4 flex items-center justify-between w-full">
                        <span class="font-bold text-black">Промокод:</span>
                        <div class="bg-[rgba(88,151,72,0.29)] rounded-[7px] px-2 py-1 text-[rgba(88,151,72,1)]">
                            SALE-2024-GM
                        </div>
                    </div>
                </div>
                <p class="mt-4 text-sm text-[#8A9CAE] dashes-underline cursor-pointer">У меня есть промокод</p>
            </div>
            <div class="border-t border-[#e7ecf3] mt-4"></div>
            <div class="p-5 tariffAb text-black">
                <h3 class="font-bold text-sm mt-4">Что входит:</h3>
                <ul class="space-y-2 mt-2">
                    <li class="flex items-center">
                        <img src="/images/svg/saleBlocks/plus.svg" alt="icon" class="w-6 h-6 mr-2" />
                        базовый набор возможностей
                    </li>
                    <li class="flex items-center">
                        <img src="/images/svg/saleBlocks/plus.svg" alt="icon" class="w-6 h-6 mr-2" />
                        бесплатное создание акций
                    </li>
                    <li class="flex items-center">
                        <img src="/images/svg/saleBlocks/plus.svg" alt="icon" class="w-6 h-6 mr-2" />
                        стандартный кэшбэк
                    </li>
                    <li class="flex items-center">
                        <img src="/images/svg/saleBlocks/plus.svg" alt="icon" class="w-6 h-6 mr-2" />
                        редактируемый бейдж
                    </li>
                    <li class="flex items-center">
                        <img src="/images/svg/saleBlocks/plus.svg" alt="icon" class="w-6 h-6 mr-2" />
                        стандартная комиссия за вывод средств
                    </li>
                    <li class="flex items-center">
                        <img src="/images/svg/saleBlocks/plus.svg" alt="icon" class="w-6 h-6 mr-2" />
                        и многое другое, подробнее ниже
                    </li>
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
                <p class="text-sm text-[#8A9CAE] mt-2">Уже посмотрел</p>
                <div class="space-y-2 mt-4 w-full">
                    <div
                        class="w-full py-4 pr-8 pl-7 rounded-[10px] bg-[#3d5b92] text-center text-sm text-white checkTariff">

                        <div class="flex items-center justify-between mb-4 firstCheckTariff">
                            <label for="radio1" class="flex items-center space-x-2 cursor-pointer">
                                <input type="radio" id="radio1" name="subscription" class="custom-radio hidden">
                                <span class="checkmark"></span>
                                <span>1 месяц</span>
                            </label>
                            <span>200 ₽ в мес.</span>
                        </div>

                        <div class="mr-[-2rem] ml-[-1.7rem] h-[1px] bg-[#5974a3] tariffRaz"></div>


                        <div class="flex items-center justify-between gap-[30px] mt-4 SecondCheckTariff">
                            <label for="radio2" class="flex items-center space-x-2 cursor-pointer">
                                <input type="radio" id="radio2" name="subscription" class="custom-radio hidden">
                                <span class="checkmark"></span>
                                <span>1 год</span>
                                <div class="bg-[#5973a2] px-3 py-1 rounded-lg text-white discount">-25%</div>
                            </label>
                            <div class="flex items-center space-x-2">
                                <div class="text-[#6d84ad] line-through">200</div>
                                <span class="text-white">150 ₽ в мес.</span>
                            </div>
                        </div>
                    </div>
                    <button
                        class="w-full py-4 rounded-[10px] goinBtn px-4 text-sm text-black font-bold text-center bg-[#f4d710]">
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
                    <li class="flex items-center">
                        <img src="/images/svg/saleBlocks/plusSec.svg" alt="icon" class="w-6 h-6 mr-2" />
                        больше возможностей
                    </li>
                    <li class="flex items-center">
                        <img src="/images/svg/saleBlocks/plusSec.svg" alt="icon" class="w-6 h-6 mr-2" />
                        бесплатное создание акций
                    </li>
                    <li class="flex items-center">
                        <img src="/images/svg/saleBlocks/plusSec.svg" alt="icon" class="w-6 h-6 mr-2" />
                        повышенный кэшбэк
                    </li>
                    <li class="flex items-center">
                        <img src="/images/svg/saleBlocks/plusSec.svg" alt="icon" class="w-6 h-6 mr-2" />
                        премиум бейдж
                    </li>
                    <li class="flex items-center">
                        <img src="/images/svg/saleBlocks/plusSec.svg" alt="icon" class="w-6 h-6 mr-2" />
                        пониженная комиссия за вывод средств
                    </li>
                    <li class="flex items-center">
                        <img src="/images/svg/saleBlocks/plusSec.svg" alt="icon" class="w-6 h-6 mr-2" />
                        и многое другое, подробнее ниже
                    </li>
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
                <p class="text-sm text-[#8A9CAE] mt-2">Знаю чего хочу</p>
                <div
                    class="w-full py-4 pr-8 pl-7 rounded-[10px] mt-4 bg-[#f2f6fb] text-center text-sm text-black checkTariffExp">
                    <div class="flex items-center justify-between mb-4 firstCheckTariff ">
                        <label for="radio3" class="flex items-center space-x-2 cursor-pointer">
                            <input type="radio" id="radio3" name="subscription" class="custom-radio hidden" />
                            <span class="checkmark checkmark--sec "></span>
                            <span>1 месяц</span>
                        </label>
                        <span>600 ₽ в мес.</span>
                    </div>
                    <div class="mr-[-2rem] ml-[-1.7rem] h-[1px] bg-[#dce4ef] tariffRaz"></div>


                    <div class="flex items-center justify-between gap-[30px] mt-4 SecondCheckTariffExp">
                        <label for="radio4" class="flex items-center space-x-2 cursor-pointer">
                            <input type="radio" id="radio4" name="subscription" class="custom-radio hidden" />
                            <span class="checkmark checkmark--sec"></span>
                            <span>1 год</span>
                            <div class="bg-[#dbe4ee] px-3 py-1 rounded-lg text-[#041a41] font-bold discount">-25%</div>
                        </label>
                        <div class="flex items-center space-x-2">
                            <div class="text-[#8a9cae] line-through">600</div>
                            <span class="text-black">450 ₽ в мес.</span>
                        </div>
                    </div>
                </div>
                <button
                    class="w-full py-4 rounded-[10px] goinBtn px-4 text-sm text-black font-bold text-center mt-4 bg-[#f4d710]">
                    Перейти
                </button>
                <div class="hidden promoCodeDisplay mt-4 flex items-center justify-between w-full">
                    <span class="font-bold text-black">Промокод:</span>
                    <div class="bg-[rgba(88,151,72,0.29)] rounded-[7px] px-2 py-1 text-[rgba(88,151,72,1)]">
                        SALE-2024-GM
                    </div>
                </div>
                <p class="mt-4 text-sm text-[#8A9CAE] dashes-underline cursor-pointer">У меня есть промокод</p>
            </div>
            <div class="border-t border-[#e7ecf3] mt-4"></div>
            <div class="p-5 tariffAb text-black">
                <h3 class="font-bold text-sm mt-4">Что входит:</h3>
                <ul class="space-y-2 mt-2">
                    <li class="flex items-center">
                        <img src="/images/svg/saleBlocks/plus.svg" alt="icon" class="w-6 h-6 mr-2" />
                        базовый набор возможностей
                    </li>
                    <li class="flex items-center">
                        <img src="/images/svg/saleBlocks/plus.svg" alt="icon" class="w-6 h-6 mr-2" />
                        бесплатное создание акций
                    </li>
                    <li class="flex items-center">
                        <img src="/images/svg/saleBlocks/plus.svg" alt="icon" class="w-6 h-6 mr-2" />
                        стандартный кэшбэк
                    </li>
                    <li class="flex items-center">
                        <img src="/images/svg/saleBlocks/plus.svg" alt="icon" class="w-6 h-6 mr-2" />
                        редактируемый бейдж
                    </li>
                    <li class="flex items-center">
                        <img src="/images/svg/saleBlocks/plus.svg" alt="icon" class="w-6 h-6 mr-2" />
                        стандартная комиссия за вывод средств
                    </li>
                    <li class="flex items-center">
                        <img src="/images/svg/saleBlocks/plus.svg" alt="icon" class="w-6 h-6 mr-2" />
                        и многое другое, подробнее ниже
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<style scoped>
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
