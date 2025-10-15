<script setup lang="ts">

interface Props {
    selectedCategories?: string[];
}

withDefaults(defineProps<Props>(), {
    selectedCategories: () => [],
});
</script>

<template>
    <div class="flex bg-white p-8 max-md:p-4 max-md:hidden mt-8 rounded-2xl flex-col min-h-[100vh]" id="trinadsat">
        <h3 class="font-bold ml-8">Выберите категории, к которым будет прикреплена ваша акция</h3>
        <div class="mt-5 bg-category w-full flex max-h-[100vh]" id="container_block">
            <ul class="bg-[#fdfdfd] w-[150px] overflow-y-scroll max-h-[100vh]" id="category_list1">
                <li class="hoverable py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex justify-between">Кафе/Бары <span class="strelka">›</span></li>
                <li class="hoverable py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex justify-between">Для нее <span class="strelka">›</span></li>
                <li class="hoverable py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex justify-between">Для него <span class="strelka">›</span></li>
                <li class="hoverable py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex justify-between">Детям <span class="strelka">›</span></li>
                <li class="hoverable py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex justify-between">Для дома <span class="strelka">›</span></li>
                <li class="hoverable py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex justify-between">Техника <span class="strelka">›</span></li>
                <li class="hoverable py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex justify-between">Услуги <span class="strelka">›</span></li>
                <li class="hoverable py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex justify-between">Красота <span class="strelka">›</span></li>
                <li class="hoverable py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex justify-between">Туры и отели <span class="strelka">›</span></li>
                <li class="hoverable py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex justify-between">Магазины <span class="strelka">›</span></li>
                <li class="hoverable py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex justify-between">Для авто <span class="strelka">›</span></li>
                <li class="hoverable py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex justify-between">Курсы <span class="strelka">›</span></li>
                <li class="hoverable py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex justify-between">Репетиторы <span class="strelka">›</span></li>
            </ul>
            <ul class="bg-[#fdfdfd] min-w-[200px] hidden overflow-y-scroll max-h-[100vh]" id="category_list2">
                <li class="hoverable2 py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex justify-between">🚗Грузоперевозки <span class="strelka">›</span></li>
                <li class="hoverable2 py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex justify-between">Фото, видео, аудио<span class="strelka">›</span></li>
                <li class="hoverable2 py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex justify-between">Свадьба и торжества <span class="strelka">›</span></li>
                <li class="hoverable2 py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex justify-between">Все для красоты <span class="strelka">›</span></li>
                <li class="hoverable2 py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex justify-between">Врачи <span class="strelka">›</span></li>
                <li class="hoverable2 py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex justify-between">IT-фрилансеры <span class="strelka">›</span></li>
                <li class="hoverable2 py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex justify-between">Ремонт и стройка <span class="strelka">›</span></li>
                <li class="hoverable2 py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex justify-between">Для авто <span class="strelka">›</span></li>
                <li class="hoverable2 py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex justify-between">Бухгалтеры <span class="strelka">›</span></li>
                <li class="hoverable2 py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex justify-between">Ветеринары <span class="strelka">›</span></li>
                <li class="hoverable2 py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex justify-between">Автоинструкторы <span class="strelka">›</span></li>
                <li class="hoverable2 py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex justify-between">Домашний персонал <span class="strelka">›</span></li>
                <li class="hoverable2 py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex justify-between">Уборка <span class="strelka">›</span></li>
                <li class="hoverable2 py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex justify-between">Туризм <span class="strelka">›</span></li>
                <li class="hoverable2 py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex justify-between">Авиабилеты <span class="strelka">›</span></li>
                <li class="hoverable2 py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex justify-between">Деньги <span class="strelka">›</span></li>
            </ul>
            <ul class="bg-[#fdfdfd] min-w-[350px] hidden overflow-y-scroll max-h-[100vh]" id="category_list3">
                <li class=" py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex items-center gap-3"><input type="checkbox" value="item1">Аренда инструмента</li>
                <li class=" py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex items-center gap-3"><input type="checkbox" value="item2">Благоустройства территории</li>
                <li class=" py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex items-center gap-3"><input type="checkbox" value="item3">Бурение скважин</li>
                <li class=" py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex items-center gap-3"><input type="checkbox" value="item4">Бытовая техника</li>
                <li class=" py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex items-center gap-3"><input type="checkbox" value="item5">Вентиляция и кондиционеры</li>
                <li class=" py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex items-center gap-3"><input type="checkbox" value="item6">Возведение стен и перегородок</li>
                <li class=" py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex items-center gap-3"><input type="checkbox" value="item7">Вывоз мусора</li>
                <li class=" py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex items-center gap-3"><input type="checkbox" value="item8">Гипсокартон</li>
                <li class=" py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex items-center gap-3"><input type="checkbox" value="item9">Гончарные работы</li>
                <li class=" py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex items-center gap-3"><input type="checkbox" value="item10">Двери</li>
                <li class=" py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex items-center gap-3"><input type="checkbox" value="item11">Витражи</li>
                <li class=" py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex items-center gap-3"><input type="checkbox" value="item12">Декоративно-прикладный работы</li>
                <li class=" py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex items-center gap-3"><input type="checkbox" value="item13">Демонтаж сооружений и конструкций</li>
                <li class=" py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex items-center gap-3"><input type="checkbox" value="item14">Сантехника</li>
                <li class=" py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex items-center gap-3"><input type="checkbox" value="item15">Сантехника</li>
            </ul>
            <ul class="bg-[#fdfdfd] min-w-[350px] hidden overflow-y-scroll max-h-[100vh]" id="category_list4">
                <li class=" py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex items-center gap-3"><input type="checkbox" value="item1">Аренда инструмента</li>
                <li class=" py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex items-center gap-3"><input type="checkbox" value="item2">Благоустройства территории</li>
                <li class=" py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex items-center gap-3"><input type="checkbox" value="item3">Бурение скважин</li>
                <li class=" py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex items-center gap-3"><input type="checkbox" value="item4">Бытовая техника</li>
                <li class=" py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex items-center gap-3"><input type="checkbox" value="item5">Вентиляция и кондиционеры</li>
                <li class=" py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex items-center gap-3"><input type="checkbox" value="item6">Возведение стен и перегородок</li>
                <li class=" py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex items-center gap-3"><input type="checkbox" value="item7">Вывоз мусора</li>
                <li class=" py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex items-center gap-3"><input type="checkbox" value="item8">Гипсокартон</li>
                <li class=" py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex items-center gap-3"><input type="checkbox" value="item9">Гончарные работы</li>
                <li class=" py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex items-center gap-3"><input type="checkbox" value="item10">Двери</li>
                <li class=" py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex items-center gap-3"><input type="checkbox" value="item11">Витражи</li>
                <li class=" py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex items-center gap-3"><input type="checkbox" value="item12">Декоративно-прикладный работы</li>
                <li class=" py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex items-center gap-3"><input type="checkbox" value="item13">Демонтаж сооружений и конструкций</li>
                <li class=" py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex items-center gap-3"><input type="checkbox" value="item14">Сантехника</li>
                <li class=" py-2 px-4 hover:bg-[#0066cb] hover:text-white border-t-[1px] flex items-center gap-3"><input type="checkbox" value="item15">Сантехника</li>
            </ul>
        </div>
        <div class="mx-8">
            <h3 class="font-bold mt-5">Вы выбрали</h3>
            <div id="tag-container" class="flex flex-wrap gap-3 py-3"></div>
        </div>
    </div>
</template>

