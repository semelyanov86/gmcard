<template>
    <div
        class="tariff-details tariff-details-Bottom border-brand grid-cols-30-70 container grid items-center justify-around gap-5 border-t text-white"
    >
        <div class="tariff-header col-span-1">
            <h2 class="tariff-title text-[36px] leading-normal"></h2>
        </div>

        <div class="tariff-plans tariff-plans-Bottom col-span-1 grid grid-cols-3 gap-10">
            <div class="sr tarifFree flex w-64 flex-col items-center gap-3 rounded-[14px] bg-transparent p-4 text-center">
                <h3 class="tariff-name text-2xl font-bold"></h3>
                <div class="tariff-status rounded-[12px] bg-[#1d3154] px-6 py-2 font-bold text-[#8a9cae]">Активен</div>
            </div>

            <div class="sr dark-blue tarifPro tarifPro-Bottom flex w-64 flex-col items-center gap-3 rounded-[14px] rounded-t-none p-4 text-center">
                <h3 class="tariff-name text-2xl font-bold"></h3>
                <div class="tariff-status bg-brand-yellow-dark rounded-[12px] px-6 py-2 font-bold text-black">Перейти</div>
            </div>

            <div class="sr tarifExp flex w-64 flex-col items-center gap-3 rounded-[14px] bg-transparent p-4 text-center">
                <h3 class="tariff-name text-2xl font-bold"></h3>
                <div class="tariff-status bg-brand-yellow-dark rounded-[12px] px-6 py-2 font-bold text-black">Перейти</div>
            </div>
        </div>
    </div>
</template>
