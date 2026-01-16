<script setup lang="ts"></script>

<template>
    <div class="filter_block z-31 mb-6 flex h-[46px] items-center justify-between lg:h-full">
        <h3 class="text_filter text-2xl font-bold text-white">Фильтровать</h3>
        <div class="gapper filter_inp relative flex h-full items-center gap-6">
            <label for="city" class="text-[15px] text-white">Ваш город</label>
            <div class="selected_block relative inline-block h-[46px]">
                <div
                    class="custom-select focus:shadow-outline flex h-[46px] w-[202px] appearance-none items-center rounded-md border border-white bg-none px-4 py-2 pr-8 leading-tight text-white shadow hover:border-gray-300 focus:outline-none"
                >
                    <span class="mr-2">Чебоксары</span>
                    <img
                        src="/images/png/icons/down.png"
                        class="pointer-events-none absolute top-2 right-0 mt-3 mr-2 h-[5px] w-2"
                        alt="Вверх"
                        id="icons"
                    />
                </div>
                <div
                    class="custom-options absolute z-50 mt-1 hidden h-[200px] w-[202px] overflow-y-scroll rounded-b border border-gray-400 bg-white shadow-lg"
                >
                    <div class="custom-option cursor-pointer bg-[#F9D914] px-4 py-2 hover:bg-gray-200">Чебоксары</div>
                    <div class="custom-option cursor-pointer px-4 py-2 hover:bg-gray-200">Москва</div>
                    <div class="custom-option cursor-pointer px-4 py-2 hover:bg-gray-200">Санкт-Петербург</div>
                    <div class="custom-option cursor-pointer px-4 py-2 hover:bg-gray-200">Другой город</div>
                </div>
            </div>
        </div>
        <div class="gapper filter_inp relative flex items-center gap-6">
            <label for="shop" class="tex-[15px] text-white">Скидки</label>
            <div class="selected_block relative inline-block h-[46px]">
                <div
                    id="custom_select"
                    class="custom_select focus:shadow-outline flex h-[46px] w-[202px] appearance-none items-center rounded-md border border-white bg-none px-4 py-2 pr-8 leading-tight text-white shadow hover:border-gray-300 focus:outline-none"
                >
                    <div id="spaner" class="mr-2">Не менее 5%</div>
                    <img
                        src="/images/png/icons/down.png"
                        class="pointer-events-none absolute top-2 right-0 mt-3 mr-2 h-[5px] w-2"
                        alt="Вверх"
                        id="icons"
                    />
                </div>
                <div
                    class="custom-options_1 absolute z-50 mt-1 hidden h-[200px] w-[202px] overflow-y-scroll rounded-b border border-gray-400 bg-white shadow-lg"
                >
                    <div class="custom-option_1 cursor-pointer bg-[#F9D914] px-4 py-2 hover:bg-gray-200">Не менее 5%</div>
                    <div class="custom-option_1 cursor-pointer px-4 py-2 hover:bg-gray-200">Не менее 10%</div>
                    <div class="custom-option_1 cursor-pointer px-4 py-2 hover:bg-gray-200">Не менее 15%</div>
                    <div class="custom-option_1 cursor-pointer px-4 py-2 hover:bg-gray-200">Не менее 20%</div>
                    <div class="custom-option_1 cursor-pointer px-4 py-2 hover:bg-gray-200">Не менее 25%</div>
                    <div class="custom-option_1 cursor-pointer px-4 py-2 hover:bg-gray-200">Не менее 30%</div>
                    <div class="custom-option_1 cursor-pointer px-4 py-2 hover:bg-gray-200">Не менее 35%</div>
                    <div class="custom-option_1 cursor-pointer px-4 py-2 hover:bg-gray-200">Не менее 40%</div>
                    <div class="custom-option_1 cursor-pointer px-4 py-2 hover:bg-gray-200">Не менее 45%</div>
                    <div class="custom-option_1 cursor-pointer px-4 py-2 hover:bg-gray-200">Не менее 50%</div>
                    <div class="custom-option_1 cursor-pointer px-4 py-2 hover:bg-gray-200">Не менее 55%</div>
                    <div class="custom-option_1 cursor-pointer px-4 py-2 hover:bg-gray-200">Не менее 60%</div>
                    <div class="custom-option_1 cursor-pointer px-4 py-2 hover:bg-gray-200">Не менее 65%</div>
                    <div class="custom-option_1 cursor-pointer px-4 py-2 hover:bg-gray-200">Не менее 70%</div>
                    <div class="custom-option_1 cursor-pointer px-4 py-2 hover:bg-gray-200">Не менее 75%</div>
                    <div class="custom-option_1 cursor-pointer px-4 py-2 hover:bg-gray-200">Не менее 80%</div>
                    <div class="custom-option_1 cursor-pointer px-4 py-2 hover:bg-gray-200">Не менее 85%</div>
                    <div class="custom-option_1 cursor-pointer px-4 py-2 hover:bg-gray-200">Не менее 90%</div>
                    <div class="custom-option_1 cursor-pointer px-4 py-2 hover:bg-gray-200">Не менее 95%</div>
                    <div class="custom-option_1 cursor-pointer px-4 py-2 hover:bg-gray-200">Не менее 100%</div>
                </div>
            </div>
        </div>
        <div class="gapper filter_inp relative flex items-center gap-6">
            <label for="sale" class="tex-[15px] text-white">Вид акции</label>
            <div class="selected_block relative inline-block h-[46px]">
                <div
                    class="custom_selected focus:shadow-outline flex h-[46px] w-[202px] appearance-none items-center rounded-md border border-white bg-none px-4 py-2 pr-8 leading-tight text-white shadow hover:border-gray-300 focus:outline-none"
                >
                    <div id="spaner1" class="mr-2">Все</div>
                    <img
                        src="/images/png/icons/down.png"
                        class="pointer-events-none absolute top-2 right-0 mt-3 mr-2 h-[5px] w-2"
                        alt="Вверх"
                        id="icons"
                    />
                </div>
                <div
                    class="custom-options_2 absolute z-50 mt-1 hidden h-[200px] w-[202px] overflow-y-scroll rounded-b border border-gray-400 bg-white shadow-lg"
                >
                    <div class="custom-option_2 cursor-pointer bg-[#F9D914] px-4 py-2 hover:bg-gray-200">Все</div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped></style>
