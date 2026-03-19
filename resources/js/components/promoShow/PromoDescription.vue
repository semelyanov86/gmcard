<script setup lang="ts">
import { ref } from 'vue';

const showGallery = ref(false);

const toggleGallery = () => {
    showGallery.value = !showGallery.value;
};
</script>

<template>
    <div class="rounded-b-3xl bg-white px-0 py-1 2xl:px-4">
        <div class="masrginsBlock shareBlocks m-10 mt-4 mb-5 flex items-center justify-between">
            <div class="shareBlockses flex items-center gap-2">
                <h3 class="font-black">Поделиться</h3>
                <div class="flex gap-2">
                    <a href="#" class="promo-share-ok flex items-center rounded-sm px-2">
                        <img src="/images/png/sale/ok-svgrepo-com.svg" class="w-4" alt="ok" />
                        <span class="font-sans text-sm text-white">13</span>
                    </a>
                    <a href="#" class="promo-share-fb flex items-center rounded-sm px-2">
                        <img src="/images/png/sale/facebook-color-svgrepo-com.svg" class="w-4" alt="facebook" />
                        <span class="font-sans text-sm text-white">13</span>
                    </a>
                    <a class="promo-share-tw flex items-center rounded-sm px-2" href="#">
                        <img src="/images/png/sale/sale_twit.png" class="w-3" alt="Twitter" />
                        <span class="font-sans text-sm text-white">13</span>
                    </a>
                    <a class="promo-share-other flex items-center rounded-sm px-2" href="#">
                        <span class="font-sans text-sm text-white">13</span>
                    </a>
                </div>
            </div>
            <div class="btnAndLike flex items-center gap-2">
                <div class="flex cursor-pointer items-center gap-4 rounded-md border border-black/20 px-2 py-1 hover:border-black/50">
                    <img src="/images/png/sale/heart-svgrepo-com.svg" class="w-5" alt="лайк" />
                    <span>1245</span>
                </div>
                <div @click="toggleGallery" class="promo-gallery-toggle flex cursor-pointer items-center rounded-md px-2 py-2 hover:bg-opacity-50">
                    <img src="/images/png/constructor/picture-sale.png" alt="More Photo" class="w-10" />
                    <span class="ml-2 text-xs">
                        Показать
                        <br />
                        еще 5 фото
                    </span>
                    <svg
                        :class="['icon ml-4 h-4 w-4 transition-transform', showGallery ? 'rotate-180' : '']"
                        viewBox="0 0 1024 1024"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path d="M903.232 256l56.768 50.432L512 768 64 306.432 120.768 256 512 659.072z" fill="currentColor" />
                    </svg>
                </div>
            </div>
        </div>
        <div class="h-px w-full bg-black/20"></div>
        <div v-show="showGallery" id="galBlock" class="mx-10 mt-5 mb-5 flex justify-between">
            <a
                id="gal1"
                class="relative flex items-center justify-center"
                href="https://i.artfile.me/wallpaper/27-05-2013/800x600/amia-mith-devushki-shuba-ulybka-podarok-726076.jpg"
                data-fancybox="gallery"
                data-caption="Caption #1"
            >
                <img
                    class="moreImgAfterBtn promo-gallery-thumb rounded-md object-cover"
                    src="https://i.artfile.me/wallpaper/27-05-2013/800x600/amia-mith-devushki-shuba-ulybka-podarok-726076.jpg"
                />
                <div id="galD1" class="absolute flex hidden h-full w-full items-center justify-center rounded-md bg-black/80">
                    <img src="/images/png/sale/maximize.svg" class="w-16" alt="max" />
                </div>
            </a>
            <a
                id="gal2"
                class="relative flex items-center justify-center"
                href="https://vorle.ru/media/konkurs/logo/shuba1.jpg/"
                data-fancybox="gallery"
                data-caption="Caption #2"
            >
                <img class="moreImgAfterBtn promo-gallery-thumb rounded-md object-cover" src="https://vorle.ru/media/konkurs/logo/shuba1.jpg/" />
                <div id="galD2" class="absolute flex hidden h-full w-full items-center justify-center rounded-md bg-black/80">
                    <img src="/images/png/sale/maximize.svg" class="w-16" alt="max" />
                </div>
            </a>
            <a
                id="gal3"
                class="relative flex items-center justify-center"
                href="https://i.artfile.me/wallpaper/27-05-2013/800x600/amia-mith-devushki-shuba-ulybka-podarok-726076.jpg"
                data-fancybox="gallery"
                data-caption="Caption #1"
            >
                <img
                    class="moreImgAfterBtn promo-gallery-thumb rounded-md object-cover"
                    src="https://i.artfile.me/wallpaper/27-05-2013/800x600/amia-мith-devushki-shuba-ulybka-podarok-726076.jpg"
                />
                <div id="galD3" class="absolute flex hidden h-full w-full items-center justify-center rounded-md bg-black/80">
                    <img src="/images/png/sale/maximize.svg" class="w-16" alt="max" />
                </div>
            </a>
            <a
                id="gal4"
                class="relative flex items-center justify-center"
                href="https://vorle.ru/media/konkurs/logo/shuba1.jpg/"
                data-fancybox="gallery"
                data-caption="Caption #2"
            >
                <img class="moreImgAfterBtn promo-gallery-thumb rounded-md object-cover" src="https://vorle.ru/media/konkurs/logo/shuba1.jpg/" />
                <div id="galD4" class="absolute flex hidden h-full w-full items-center justify-center rounded-md bg-black/80">
                    <img src="/images/png/sale/maximize.svg" class="w-16" alt="max" />
                </div>
            </a>
            <a
                id="gal5"
                class="relative flex items-center justify-center"
                href="https://i.artfile.me/wallpaper/27-05-2013/800x600/amia-mith-devushki-shuba-ulybka-podarok-726076.jpg"
                data-fancybox="gallery"
                data-caption="Caption #1"
            >
                <img
                    class="moreImgAfterBtn promo-gallery-thumb rounded-md object-cover"
                    src="https://i.artfile.me/wallpaper/27-05-2013/800x600/amia-mith-devushki-shuba-ulybka-podarok-726076.jpg"
                />
                <div id="galD5" class="absolute flex hidden h-full w-full items-center justify-center rounded-md bg-black/80">
                    <img src="/images/png/sale/maximize.svg" class="w-16" alt="max" />
                </div>
            </a>
        </div>
        <div v-show="showGallery" id="border_line" class="h-px w-full bg-black/20"></div>
        <div class="masrginsBlock m-10 flex flex-col gap-4">
            <h3 class="promo-text font-bold">
                «Снежная Королева» — крупнейшая российская сеть мультибрендовых магазинов модной одежды. Открытие первого магазина компании состоялось
                в Москве в 1998 году. Сегодня в обеих столицах и крупных региональных городах открыто более ста магазинов компании.
            </h3>
            <p class="promo-text">
                Более 16 лет своего существования компания «Снежная Королева» успешно развивает формат престижного Department Store, предоставляя
                своим покупателям любые виды женской, мужской одежды и аксессуаров высокого качества в пределах одного магазина, и уже зарекомендовала
                себя экспертом в области торговли верхней одеждой из кожи и меха, гарантом качества и специалистом в сфере предоставления услуг по
                формированию стиля.
            </p>
            <p class="promo-text">
                Создание собственных торговых марок, сотрудничество с ведущими мировыми производителями, динамичное развитие формата розничной
                торговли в соответствии с международными тенденциями, проведение масштабных рекламных кампаний — все это характеризует деятельность
                «Снежной Королевы».
            </p>
            <p class="promo-text">
                Сегодня в любом магазине «Снежная Королева» можно подобрать одежду и аксессуары для создания целостных модных и гармоничных образов на
                разные случаи жизни и любую погоду.
            </p>
            <h3 class="promo-text font-bold uppercase">ФИНАЛЬНАЯ РАСПРОДАЖА! СКИДКИ ДО 70% НА ВСЕ!</h3>
            <p class="promo-text">
                Сохранить семейный бюджет и обновить гардероб модной одеждой на разные случаи жизни и любую погоду — легко!Нужно лишь творчески
                подойти к вопросу и выбрать правильное место для шоппинга! «Снежная Королева» приглашает за удачными покупками и объявляет грандиозные
                скидки — до 70% на всю коллекцию весна-лето с 28 июля до 31 августа!
            </p>
            <h3 class="promo-text font-bold">Условия и ограничения:</h3>
            <p class="promo-text">
                Акция действует во всех магазинах сети «Снежная Королева» и интернет-магазине.Акция не распространяется на модели из новой коллекции.
                Скидка по данной акции не суммируется со скидкой по Картам Королевского Клуба. Товары, участвующие в акции, не могут быть оформлены в
                кредит «без переплаты».
            </p>
        </div>
        <div class="youtubeBlocks promo-youtube w-full p-10 pr-24 pb-5">
            <iframe
                class="box-border h-full w-full overflow-hidden rounded-lg"
                src="https://www.youtube.com/embed/ZSkx7B13kH4?rel=0&showinfo=0&modestbranding=1&iv_load_policy=3"
                frameborder="0"
            ></iframe>
        </div>
        <ul class="masrginsBlock m-10 mb-5 flex items-center gap-2">
            <li class="rounded-full shadow-2xl">
                <a href="#"><img src="/images/png/sale/sale_ins.png" class="w-7" alt="Соц сети" /></a>
            </li>
            <li class="rounded-full shadow-2xl">
                <a href="#"><img src="/images/png/sale/sale_ok.png" class="w-7" alt="Соц сети" /></a>
            </li>
            <li class="rounded-full shadow-2xl">
                <a href="#"><img src="/images/png/sale/sale_sky.png" class="w-7" alt="Соц сети" /></a>
            </li>
            <li class="rounded-full shadow-2xl">
                <a href="#"><img src="/images/png/sale/sale_twit.png" class="w-7" alt="Соц сети" /></a>
            </li>
            <li class="rounded-full shadow-2xl">
                <a href="#"><img src="/images/png/sale/sale_lin.png" class="w-7" alt="Соц сети" /></a>
            </li>
            <li class="rounded-full shadow-2xl">
                <a href="#"><img src="/images/png/sale/sale_you.png" class="w-7" alt="Соц сети" /></a>
            </li>
        </ul>
        <div class="masrginsBlock m-10 mb-5 flex items-center gap-2">
            <span>Наш сайт:</span>
            <a href="#" class="promo-main-link hover:underline">goo.gl/2cSMwl</a>
        </div>
    </div>
</template>

<style scoped>
.promo-share-ok {
    background-color: #ee8208;
}

.promo-share-fb {
    background-color: #4460a0;
}

.promo-share-tw {
    background-color: #00aaec;
}

.promo-share-other {
    background-color: #355dcd;
}

.promo-gallery-toggle {
    background-color: #e5ecf0;
}

.promo-gallery-thumb {
    height: 110px;
    width: 110px;
}

.promo-text {
    letter-spacing: 0.5px;
}

.promo-youtube {
    height: 400px;
}

.promo-main-link {
    color: #1463b9;
}
</style>
