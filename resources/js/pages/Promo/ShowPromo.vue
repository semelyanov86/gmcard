<script setup lang="ts">
import CategoriesMenu from '@/components/CategoriesMenu.vue';
import DiscountCoupons from '@/components/main/DiscountCoupons.vue';
import Footer from '@/components/Footer.vue';
import Header from '@/components/Header.vue';
import MobileMenu from '@/components/MobileMenu.vue';
import NavBar from '@/components/NavBar.vue';
import MainInfo from '@/components/promoShow/MainInfo.vue';
import type { AppPageProps, CategoryModel, ContactModel, MenuData } from '@/types';
import { usePage } from '@inertiajs/vue3';
import { ref } from 'vue';
import '../../../css/internal/output.css';

const page = usePage<AppPageProps>();

const props = defineProps<{
    contact: ContactModel;
    navbarMenu: MenuData[];
    categories: CategoryModel[];
}>();

const showAddress1 = ref(false);
const showAddress2 = ref(false);
const showAddress3 = ref(false);
const showAddress4 = ref(false);
const showPromoCode = ref(false);
</script>

<template>
    <div class="promo-page">
        <Header :user-data="page.props.userData" />

        <section class="body h-full max-w-full overflow-hidden pb-9">
            <MobileMenu />
            <div class="mx-auto w-[1140px] 2xl:w-full 2xl:px-4">
                <NavBar :menu-items="props.navbarMenu" />

                <CategoriesMenu :categories="props.categories" />

                <div class="flex w-full h-full mt-12 saleBlocks">
                    <div id="promoHiddenMob" class="bg-white py-4 rounded-3xl shadow-2xl border mb-10 hidden salesLink1">
                        <div class="">
                            <p class="px-6 py-2 flex items-center">
                                До конца акции
                                <img src="/images/png/images/alarm.png" class="mx-2 opacity-50" alt="time" />
                                <strong>4 дня 15:13:15</strong>
                            </p>
                            <div class="w-full h-[1px] bg-black/20"></div>
                            <div class="px-6 py-2">
                                <h2 class="text-lg mt-2">Зимняя распродажа до -50% на все в Снежная Королева!</h2>
                                <div class="flex items-center gap-2 mt-4">
                                    <img src="/images/png/images/discount.png" class="w-12" alt="discount" />
                                    <span class="text-2xl font-bold">Скидка 50%</span>
                                </div>
                                <div class="flex flex-col items-start relative">
                                    <div class="absolute left-10 bg-[#0CA563] w-[3px] h-full"></div>
                                    <h4 class="ml-14 text-sm font-bold">Дополнительный условия</h4>
                                    <p class="ml-14 text-sm">Сделай покупки на сумму выше 60 000 рублей и используй промокод что бы получить скидку до 10 000 рублей</p>
                                    <h4 class="ml-14 text-sm font-bold mt-4">Минимальная сумма</h4>
                                    <p class="ml-14 text-sm">10 000 рублей</p>
                                </div>
                            </div>
                            <div class="px-3 w-full">
                                <button id="openThePromoMob" class="bg-[#0CA563] w-full py-4 inline-block text-center mt-5 rounded-xl text-white text-lg opacity-80 hover:opacity-100">
                                    Получить промокод
                                </button>
                            </div>
                        </div>
                    </div>
                    <div id="promoCopyMob" class="bg-white py-4 rounded-3xl shadow-2xl border mb-10 hidden">
                        <div class="w-full h-full rounded-3xl shadow-2xl py-20 px-12 relative">
                            <svg id="closeThePromoMob" class="w-8 h-8 absolute top-4 right-4 p-1 rounded-full cursor-pointer hover:bg-black/50" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="24" height="24" fill="white" />
                                <path d="M7 17L16.8995 7.10051" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M7 7.00001L16.8995 16.8995" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div class="flex flex-col items-center justify-center relative">
                                <div class="bg-[#F4D710] w-12 p-2 rounded-lg rotate-12">
                                    <img src="/images/png/constructor/constructor_sale2_hover.png" class="w-full" alt="promo" />
                                </div>
                                <h4 class="text-black/50 mt-1">Ваш промокод</h4>
                                <h2 id="promoCodeMob" class="text-lg mt-2 font-bold">vesna-9LSwVx-sWxB-MNbT0</h2>
                                <div class="bg-black/20 w-full h-[1px] mt-4"></div>
                                <button id="copyBtnMob" class="w-full py-4 bg-[#F4D710] mt-4 rounded-3xl font-bold">
                                    Скопировать и перейти на сайт
                                </button>
                                <p id="copyJustMob" class="text-black/50 mt-4 cursor-pointer">Просто скопировать</p>
                                <p id="copyYesMob" class="py-2 px-3 shadow-xl rounded-xl absolute -bottom-10 text-center hidden">Скопировано!</p>
                            </div>
                        </div>
                    </div>
                    <div class="w-[780px] box-border h-full rightBlocsks">
                        <!-- Carousel -->
                        <!--
                        <div id="indicators-carousel" class="relative w-full" data-carousel="static">
                            <div class="relative w-full h-[380px] carouselHeight overflow-hidden flex items-center rounded-t-3xl">
                                <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
                                    <img src="https://vorle.ru/media/konkurs/logo/shuba1.jpg/" class="absolute block w-full h-full object-cover -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 mt-6 rounded-t-3xl" alt="..." />
                                    <div class="absolute top-0 left-10 z-50">
                                        <img class="w-[90px] h-[90px] specImgSale" src="/images/png/images/discount.png" alt="Скидка на товар" />
                                    </div>
                                    <div class="absolute top-0 right-10 z-50">
                                        <img class="w-[120px] h-[70px] specImgSale object-contain" src="/images/png/sale/delivary.png" alt="Скидка на товар" />
                                        <p id="sale_for_promo" class="bg-white px-2 py-1 rounded-lg font-bold text-black inline-block border border-gray-200 shadow-sm"></p>
                                    </div>
                                </div>
                                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                    <img src="https://i.artfile.me/wallpaper/27-05-2013/800x600/amia-mith-devushki-shuba-ulybka-podarok-726076.jpg" class="absolute block w-full h-full object-cover -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 mt-6 rounded-t-3xl" alt="..." />
                                </div>
                                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                    <img src="https://o-tendencii.com/uploads/posts/2023-04/thumbs/1680742575_o-tendencii-com-p-korotkaya-shuba-cheburashka-s-chem-nosit-f-17.jpg" class="absolute block w-full h-full object-cover -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 mt-6 rounded-t-3xl" alt="..." />
                                </div>
                            </div>
                            <div class="absolute z-50 flex space-x-3 -translate-x-1/2 bottom-3 left-1/2">
                                <button type="button" class="w-[100px] md:w-10 h-1 rounded-2xl z-50" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                                <button type="button" class="w-[100px] md:w-10 h-1 rounded-2xl z-50" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
                                <button type="button" class="w-[100px] md:w-10 h-1 rounded-2xl z-50" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
                            </div>
                            <button type="button" class="absolute top-0 left-5 btnPrev z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-black/30 hover:bg-black/50 group-focus:outline-none">
                                    <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4" />
                                    </svg>
                                    <span class="sr-only">Previous</span>
                                </span>
                            </button>
                            <button type="button" class="absolute top-0 right-14 btnNext z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-black/30 hover:bg-black/50 group-focus:outline-none">
                                    <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                                    </svg>
                                    <span class="sr-only">Next</span>
                                </span>
                            </button>
                        </div>
                        -->
                        <div class="relative w-full h-[380px] overflow-visible rounded-t-3xl">
                            <div class="absolute -top-6 left-4 z-10">
                                <img class="w-[90px] h-[90px] specImgSale" src="/images/png/images/discount.png" alt="Скидка на товар" />
                            </div>
                            <div class="absolute -top-6 right-10 z-10">
                                <img class="w-[120px] h-[70px] specImgSale object-contain" src="/images/png/sale/delivary.png" alt="Скидка на товар" />
                                <p id="sale_for_promo" class="bg-white px-2 py-1 rounded-lg font-bold text-black inline-block border border-gray-200 shadow-sm"></p>
                            </div>
                            <img src="https://vorle.ru/media/konkurs/logo/shuba1.jpg/" class="w-full h-full object-cover rounded-t-3xl" alt="Promo" />
                        </div>
                        <div class="bg-white rounded-b-3xl py-1 px-0 2xl:px-4">
                            <div class="flex items-center justify-between masrginsBlock m-10 mt-4 mb-5 shareBlocks">
                                <div class="shareBlockses flex items-center gap-2">
                                    <h3 class="font-black">Поделиться</h3>
                                    <div class="flex gap-2">
                                        <a href="#" class="flex items-center bg-[#EE8208] rounded-sm px-2">
                                            <img src="/images/png/sale/ok-svgrepo-com.svg" class="w-4" alt="ok" />
                                            <span class="text-sm text-white font-sans">13</span>
                                        </a>
                                        <a href="#" class="flex items-center bg-[#4460A0] rounded-sm px-2">
                                            <img src="/images/png/sale/facebook-color-svgrepo-com.svg" class="w-4" alt="facebook" />
                                            <span class="text-sm text-white font-sans">13</span>
                                        </a>
                                        <a class="flex items-center bg-[#00AAEC] rounded-sm px-2" href="#">
                                            <img src="/images/png/sale/sale_twit.png" class="w-3" alt="Twitter" />
                                            <span class="text-sm text-white font-sans">13</span>
                                        </a>
                                        <a class="flex items-center bg-[#355dcd] rounded-sm px-2" href="#">
                                            <!-- mailru icon removed -->
                                            <span class="text-sm text-white font-sans">13</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="flex items-center gap-2 btnAndLike">
                                    <div class="flex items-center gap-4 border px-2 py-1 rounded-md border-black/20 cursor-pointer hover:border-black/50">
                                        <img src="/images/png/sale/heart-svgrepo-com.svg" class="w-5" alt="лайк" />
                                        <span>1245</span>
                                    </div>
                                    <div id="showGalBlock" class="flex items-center bg-[#E5ECF0] py-2 px-2 rounded-md hover:bg-opacity-50 cursor-pointer">
                                        <img src="/images/png/constructor/picture-sale.png" alt="More Photo" class="w-10" />
                                        <span class="text-xs ml-2">
                                            Показать
                                            <br />
                                            еще 5 фото
                                        </span>
                                          <svg id="galUp" class="w-4 h-4 ml-4 icon" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M903.232 256l56.768 50.432L512 768 64 306.432 120.768 256 512 659.072z" fill="currentColor" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full h-[1px] bg-black/20"></div>
                            <div id="galBlock" class="flex mx-10 justify-between mb-5 mt-5 hidden">
                                <a id="gal1" class="relative flex items-center justify-center" href="https://i.artfile.me/wallpaper/27-05-2013/800x600/amia-mith-devushki-shuba-ulybka-podarok-726076.jpg" data-fancybox="gallery" data-caption="Caption #1">
                                    <img class="w-[110px] h-[110px] moreImgAfterBtn rounded-md object-cover" src="https://i.artfile.me/wallpaper/27-05-2013/800x600/amia-mith-devushki-shuba-ulybka-podarok-726076.jpg" />
                                    <div id="galD1" class="absolute w-full h-full flex items-center justify-center rounded-md bg-black/80 hidden">
                                        <img src="/images/png/sale/maximize.svg" class="w-16" alt="max" />
                                    </div>
                                </a>
                                <a id="gal2" class="relative flex items-center justify-center" href="https://vorle.ru/media/konkurs/logo/shuba1.jpg/" data-fancybox="gallery" data-caption="Caption #2">
                                    <img class="w-[110px] h-[110px] moreImgAfterBtn rounded-md object-cover" src="https://vorle.ru/media/konkurs/logo/shuba1.jpg/" />
                                    <div id="galD2" class="absolute w-full h-full flex items-center justify-center rounded-md bg-black/80 hidden">
                                        <img src="/images/png/sale/maximize.svg" class="w-16" alt="max" />
                                    </div>
                                </a>
                                <a id="gal3" class="relative flex items-center justify-center" href="https://i.artfile.me/wallpaper/27-05-2013/800x600/amia-mith-devushki-shuba-ulybka-podarok-726076.jpg" data-fancybox="gallery" data-caption="Caption #1">
                                    <img class="w-[110px] h-[110px] moreImgAfterBtn rounded-md object-cover" src="https://i.artfile.me/wallpaper/27-05-2013/800x600/amia-mith-devushki-shuba-ulybka-podarok-726076.jpg" />
                                    <div id="galD3" class="absolute w-full h-full flex items-center justify-center rounded-md bg-black/80 hidden">
                                        <img src="/images/png/sale/maximize.svg" class="w-16" alt="max" />
                                    </div>
                                </a>
                                <a id="gal4" class="relative flex items-center justify-center" href="https://vorle.ru/media/konkurs/logo/shuba1.jpg/" data-fancybox="gallery" data-caption="Caption #2">
                                    <img class="w-[110px] h-[110px] moreImgAfterBtn rounded-md object-cover" src="https://vorle.ru/media/konkurs/logo/shuba1.jpg/" />
                                    <div id="galD4" class="absolute w-full h-full flex items-center justify-center rounded-md bg-black/80 hidden">
                                        <img src="/images/png/sale/maximize.svg" class="w-16" alt="max" />
                                    </div>
                                </a>
                                <a id="gal5" class="relative flex items-center justify-center" href="https://i.artfile.me/wallpaper/27-05-2013/800x600/amia-mith-devushki-shuba-ulybka-podarok-726076.jpg" data-fancybox="gallery" data-caption="Caption #1">
                                    <img class="w-[110px] h-[110px] moreImgAfterBtn rounded-md object-cover" src="https://i.artfile.me/wallpaper/27-05-2013/800x600/amia-mith-devushki-shuba-ulybka-podarok-726076.jpg" />
                                    <div id="galD5" class="absolute w-full h-full flex items-center justify-center rounded-md bg-black/80 hidden">
                                        <img src="/images/png/sale/maximize.svg" class="w-16" alt="max" />
                                    </div>
                                </a>
                            </div>
                            <div id="border_line" class="w-full h-[1px] bg-black/20 hidden"></div>
                            <div class="flex flex-col gap-4 masrginsBlock m-10">
                                <h3 class="font-bold tracking-[0.5px]">«Снежная Королева» — крупнейшая российская сеть мультибрендовых магазинов модной одежды. Открытие первого магазина компании состоялось в Москве в 1998 году. Сегодня в обеих столицах и крупных региональных городах открыто более ста магазинов компании.</h3>
                                <p class="tracking-[0.5px]">Более 16 лет своего существования компания «Снежная Королева» успешно развивает формат престижного Department Store, предоставляя своим покупателям любые виды женской, мужской одежды и аксессуаров высокого качества в пределах одного магазина, и уже зарекомендовала себя экспертом в области торговли верхней одеждой из кожи и меха, гарантом качества и специалистом в сфере предоставления услуг по формированию стиля.</p>
                                <p class="tracking-[0.5px]">Создание собственных торговых марок, сотрудничество с ведущими мировыми производителями, динамичное развитие формата розничной торговли в соответствии с международными тенденциями, проведение масштабных рекламных кампаний — все это характеризует деятельность «Снежной Королевы».</p>
                                <p class="tracking-[0.5px]">Сегодня в любом магазине «Снежная Королева» можно подобрать одежду и аксессуары для создания целостных модных и гармоничных образов на разные случаи жизни и любую погоду.</p>
                                <h3 class="font-bold tracking-[0.5px] uppercase">ФИНАЛЬНАЯ РАСПРОДАЖА! СКИДКИ ДО 70% НА ВСЕ!</h3>
                                <p class="tracking-[0.5px]">Сохранить семейный бюджет и обновить гардероб модной одеждой на разные случаи жизни и любую погоду — легко!Нужно лишь творчески подойти к вопросу и выбрать правильное место для шоппинга! «Снежная Королева» приглашает за удачными покупками и объявляет грандиозные скидки — до 70% на всю коллекцию весна-лето с 28 июля до 31 августа!</p>
                                <h3 class="font-bold tracking-[0.5px]">Условия и ограничения:</h3>
                                <p class="tracking-[0.5px]">Акция действует во всех магазинах сети «Снежная Королева» и интернет-магазине.Акция не распространяется на модели из новой коллекции. Скидка по данной акции не суммируется со скидкой по Картам Королевского Клуба. Товары, участвующие в акции, не могут быть оформлены в кредит «без переплаты».</p>
                            </div>
                            <div class="p-10 pr-24 pb-5 w-full h-[400px] youtubeBlocks">
                                <iframe class="w-full h-full rounded-lg overflow-hidden box-border" src="https://www.youtube.com/embed/ZSkx7B13kH4?rel=0&showinfo=0&modestbranding=1&iv_load_policy=3" frameborder="0"></iframe>
                            </div>
                            <ul class="flex items-center gap-2 masrginsBlock m-10 mb-5">
                                <li class="shadow-2xl rounded-full">
                                    <a href="#"><img src="/images/png/sale/sale_ins.png" class="w-7" alt="Соц сети" /></a>
                                </li>
                                <li class="shadow-2xl rounded-full">
                                    <a href="#"><img src="/images/png/sale/sale_ok.png" class="w-7" alt="Соц сети" /></a>
                                </li>
                                <li class="shadow-2xl rounded-full">
                                    <a href="#"><img src="/images/png/sale/sale_sky.png" class="w-7" alt="Соц сети" /></a>
                                </li>
                                <li class="shadow-2xl rounded-full">
                                    <a href="#"><img src="/images/png/sale/sale_twit.png" class="w-7" alt="Соц сети" /></a>
                                </li>
                                <li class="shadow-2xl rounded-full">
                                    <a href="#"><img src="/images/png/sale/sale_lin.png" class="w-7" alt="Соц сети" /></a>
                                </li>
                                <li class="shadow-2xl rounded-full">
                                    <a href="#"><img src="/images/png/sale/sale_you.png" class="w-7" alt="Соц сети" /></a>
                                </li>
                            </ul>
                            <div class="flex items-center gap-2 masrginsBlock m-10 mb-5">
                                <span>Наш сайт:</span>
                                <a href="#" class="text-[#1463B9] hover:underline">goo.gl/2cSMwl</a>
                            </div>
                        </div>
                    </div>
                    <div class="relative w-[410px] h-full leftMainBlocks">
                        <div class="absolute w-[400px] top-12 -left-[20px] z-40 h-full leftBlocsk">
                            <MainInfo v-if="!showPromoCode" @get-promo-code="showPromoCode = true" />
                            <div v-show="showPromoCode" class="bg-white p-4 rounded-3xl shadow-2xl border salesLink2">
                                <div class="w-full h-full rounded-3xl shadow-2xl py-20 px-12 relative">
                                    <svg @click="showPromoCode = false" class="w-8 h-8 absolute top-4 right-4 p-1 rounded-full cursor-pointer hover:bg-black/50" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect width="24" height="24" fill="white" />
                                        <path d="M7 17L16.8995 7.10051" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M7 7.00001L16.8995 16.8995" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <div class="flex flex-col items-center justify-center relative">
                                        <div class="bg-[#F4D710] w-12 p-2 rounded-lg rotate-12">
                                            <img src="/images/png/constructor/constructor_sale2_hover.png" class="w-full" alt="promo" />
                                        </div>
                                        <h4 class="text-black/50 mt-1">Ваш промокод</h4>
                                        <h2 id="promoCode" class="text-lg mt-2 font-bold">vesna-9LSwVx-sWxB-MNbT0</h2>
                                        <div class="bg-black/20 w-full h-[1px] mt-4"></div>
                                        <button id="copyBtn" class="w-full py-4 bg-[#F4D710] mt-4 rounded-3xl font-bold">
                                            Скопировать и перейти на сайт
                                        </button>
                                        <p id="copyJust" class="text-black/50 mt-4 cursor-pointer">Просто скопировать</p>
                                        <p id="copyYes" class="py-2 px-3 shadow-xl rounded-xl absolute -bottom-10 text-center hidden">Скопировано!</p>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-white py-4 rounded-3xl shadow-2xl border mt-8">
                                <div class="relative overflow-hidden p-4">
                                    <a href="https://yandex.ru/maps/213/moscow/?utm_medium=mapframe&utm_source=maps" style="color:#eee;font-size:12px;position:absolute;top:0px;">Москва</a>
                                    <a href="https://yandex.ru/maps/213/moscow/?ll=37.643243%2C55.745426&rl=37.232355%2C55.867221&utm_medium=mapframe&utm_source=maps&z=12" style="color:#eee;font-size:12px;position:absolute;top:14px;">Москва — Яндекс Карты</a>
                                    <iframe src="https://yandex.ru/map-widget/v1/?ll=37.643243%2C55.745426&rl=37.232355%2C55.867221&z=12" class="w-full h-[200px] border rounded-md" frameborder="1" allowfullscreen="true" style="position:relative;"></iframe>
                                </div>
                                <div class="w-full h-[1px] bg-black/20"></div>
                                <div class="p-4">
                                    <h3 class="text-2xl font-bold text-black/90">Контакты</h3>
                                    <div @click="showAddress1 = !showAddress1" class="bg-[#F2F2F2] p-4 flex items-center rounded-lg opacity-90 mt-5 cursor-pointer justify-between">
                                        <div>
                                            <h3 class="font-bold text-lg">Адрес 1</h3>
                                            <p>Россия, Москва, Калужско-Рижская линия, метро Ленинский проспект</p>
                                        </div>
                                        <svg :class="['w-6 h-6 ml-4 stroke-4 icon transition-transform', showAddress1 ? 'rotate-180' : '']" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M903.232 256l56.768 50.432L512 768 64 306.432 120.768 256 512 659.072z" fill="currentColor" />
                                        </svg>
                                    </div>
                                    <div v-show="showAddress1" class="opacity-90 my-5">
                                        <div class="flex gap-2 mb-2">
                                            <img src="/images/png/sale/time-icon.png" class="w-5 h-5 mt-2" alt="time" />
                                            <div>
                                                <h3 class="text-lg font-bold">График работы</h3>
                                                <p>
                                                    Вс. -Чт. с 10:00 до 22:00,<br />
                                                    Пт. - Сб. с 10:00 до 23:00
                                                </p>
                                            </div>
                                        </div>
                                        <div class="flex gap-2 mb-2">
                                            <img src="/images/png/sale/phone-icon.png" class="w-5 h-5 mt-2" alt="time" />
                                            <div>
                                                <h3 class="text-lg font-bold">Телефоны</h3>
                                                <p>800-2000-600-700</p>
                                            </div>
                                        </div>
                                        <div class="flex gap-2 mb-2">
                                            <img src="/images/png/sale/link-icon.png" class="w-5 h-5 mt-2" alt="time" />
                                            <div>
                                                <h3 class="text-lg font-bold">Сайт</h3>
                                                <a href="#" class="text-[#1463B9] hover:underline">goo.gl/2cSMwl</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full h-[1px] bg-black/20"></div>
                                <div class="px-4">
                                    <div @click="showAddress2 = !showAddress2" class="bg-[#F2F2F2] p-4 flex items-center rounded-lg opacity-90 my-5 cursor-pointer justify-between">
                                        <div>
                                            <h3 class="font-bold text-lg">Адрес 2</h3>
                                            <p>Россия, Москва, Калужско-Рижская линия, метро Ленинский проспект</p>
                                        </div>
                                        <svg :class="['w-6 h-6 ml-4 stroke-4 icon transition-transform', showAddress2 ? 'rotate-180' : '']" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M903.232 256l56.768 50.432L512 768 64 306.432 120.768 256 512 659.072z" fill="currentColor" />
                                        </svg>
                                    </div>
                                    <div v-show="showAddress2" class="opacity-90 my-5">
                                        <div class="flex gap-2 mb-2">
                                            <img src="/images/png/sale/time-icon.png" class="w-5 h-5 mt-2" alt="time" />
                                            <div>
                                                <h3 class="text-lg font-bold">График работы</h3>
                                                <p>
                                                    Вс. -Чт. с 10:00 до 22:00,<br />
                                                    Пт. - Сб. с 10:00 до 23:00
                                                </p>
                                            </div>
                                        </div>
                                        <div class="flex gap-2 mb-2">
                                            <img src="/images/png/sale/phone-icon.png" class="w-5 h-5 mt-2" alt="time" />
                                            <div>
                                                <h3 class="text-lg font-bold">Телефоны</h3>
                                                <p>800-2000-600-700</p>
                                            </div>
                                        </div>
                                        <div class="flex gap-2 mb-2">
                                            <img src="/images/png/sale/link-icon.png" class="w-5 h-5 mt-2" alt="time" />
                                            <div>
                                                <h3 class="text-lg font-bold">Сайт</h3>
                                                <a href="#" class="text-[#1463B9] hover:underline">goo.gl/2cSMwl</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full h-[1px] bg-black/20"></div>
                                <div class="px-4">
                                    <div @click="showAddress3 = !showAddress3" class="bg-[#F2F2F2] p-4 flex items-center rounded-lg opacity-90 my-5 cursor-pointer justify-between">
                                        <div>
                                            <h3 class="font-bold text-lg">Адрес 3</h3>
                                            <p>Россия, Москва, Калужско-Рижская линия, метро Ленинский проспект</p>
                                        </div>
                                        <svg :class="['w-6 h-6 ml-4 stroke-4 icon transition-transform', showAddress3 ? 'rotate-180' : '']" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M903.232 256l56.768 50.432L512 768 64 306.432 120.768 256 512 659.072z" fill="currentColor" />
                                        </svg>
                                    </div>
                                    <div v-show="showAddress3" class="opacity-90 my-5">
                                        <div class="flex gap-2 mb-2">
                                            <img src="/images/png/sale/time-icon.png" class="w-5 h-5 mt-2" alt="time" />
                                            <div>
                                                <h3 class="text-lg font-bold">График работы</h3>
                                                <p>
                                                    Вс. -Чт. с 10:00 до 22:00,<br />
                                                    Пт. - Сб. с 10:00 до 23:00
                                                </p>
                                            </div>
                                        </div>
                                        <div class="flex gap-2 mb-2">
                                            <img src="/images/png/sale/phone-icon.png" class="w-5 h-5 mt-2" alt="time" />
                                            <div>
                                                <h3 class="text-lg font-bold">Телефоны</h3>
                                                <p>800-2000-600-700</p>
                                            </div>
                                        </div>
                                        <div class="flex gap-2 mb-2">
                                            <img src="/images/png/sale/link-icon.png" class="w-5 h-5 mt-2" alt="time" />
                                            <div>
                                                <h3 class="text-lg font-bold">Сайт</h3>
                                                <a href="#" class="text-[#1463B9] hover:underline">goo.gl/2cSMwl</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full h-[1px] bg-black/20"></div>
                                <div class="px-4">
                                    <div @click="showAddress4 = !showAddress4" class="bg-[#F2F2F2] p-4 flex items-center rounded-lg opacity-90 my-5 cursor-pointer justify-between">
                                        <div>
                                            <h3 class="font-bold text-lg">Адрес 4</h3>
                                            <p>Россия, Москва, Калужско-Рижская линия, метро Ленинский проспект</p>
                                        </div>
                                        <svg :class="['w-6 h-6 ml-4 stroke-4 icon transition-transform', showAddress4 ? 'rotate-180' : '']" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M903.232 256l56.768 50.432L512 768 64 306.432 120.768 256 512 659.072z" fill="currentColor" />
                                        </svg>
                                    </div>
                                    <div v-show="showAddress4" class="opacity-90 my-5">
                                        <div class="flex gap-2 mb-2">
                                            <img src="/images/png/sale/time-icon.png" class="w-5 h-5 mt-2" alt="time" />
                                            <div>
                                                <h3 class="text-lg font-bold">График работы</h3>
                                                <p>
                                                    Вс. -Чт. с 10:00 до 22:00,<br />
                                                    Пт. - Сб. с 10:00 до 23:00
                                                </p>
                                            </div>
                                        </div>
                                        <div class="flex gap-2 mb-2">
                                            <img src="/images/png/sale/phone-icon.png" class="w-5 h-5 mt-2" alt="time" />
                                            <div>
                                                <h3 class="text-lg font-bold">Телефоны</h3>
                                                <p>800-2000-600-700</p>
                                            </div>
                                        </div>
                                        <div class="flex gap-2 mb-2">
                                            <img src="/images/png/sale/link-icon.png" class="w-5 h-5 mt-2" alt="time" />
                                            <div>
                                                <h3 class="text-lg font-bold">Сайт</h3>
                                                <a href="#" class="text-[#1463B9] hover:underline">goo.gl/2cSMwl</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <DiscountCoupons />
            </div>
        </section>

        <Footer :contact="contact" />
    </div>
</template>

<style scoped></style>
