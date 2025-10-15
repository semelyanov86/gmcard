<script setup lang="ts">
import { ref, computed, onMounted } from 'vue';
import '../../../css/internal/output.css';
import Footer from '@/components/Footer.vue';
import Header from '@/components/Header.vue';
import NavBar from '@/components/NavBar.vue';
import CategoriesMenu from '@/components/CategoriesMenu.vue';
import ToggleSwitch from '@/components/Promo/ToggleSwitch.vue';
import YouTubeBlock from '@/components/Promo/YouTubeBlock.vue';
import SocialLinksBlock from '@/components/Promo/SocialLinksBlock.vue';
import PromoTypeSelector from '@/components/Promo/PromoTypeSelector.vue';
import PhotoUploadBlock from '@/components/Promo/PhotoUploadBlock.vue';
import AddressContactBlock from '@/components/Promo/AddressContactBlock.vue';
import DiscountInputBlock from '@/components/Promo/DiscountInputBlock.vue';
import ConditionsExampleModal from '@/components/Promo/ConditionsExampleModal.vue';
import CategorySelector from '@/components/Promo/CategorySelector.vue';
import SideNavigation from '@/components/Promo/SideNavigation.vue';

defineProps<{
    contact: {
        email: string;
        phone: string;
    };
}>();

const selectedPromo = ref<number>(1);

const showPervyi = computed(() => [1, 2, 3].includes(selectedPromo.value));
const showPerviNew = computed(() => [6, 7].includes(selectedPromo.value));
const showVtoroi = computed(() => [1, 2].includes(selectedPromo.value));
const showTretiy = computed(() => [1, 2, 3, 4, 5, 6, 7].includes(selectedPromo.value));
const showChetvertyi = computed(() => [1, 2, 3, 7].includes(selectedPromo.value));

const discountAmount = ref('');
const currency1Value = ref('%');
const cashbackAmount = ref('');
const currency2Value = ref('%');

const deliveryOpen = ref(false);

const conditionsModalOpen = ref(false);

const textEditorOpen = ref(false);

const selectedCategories = ref<string[]>([]);

onMounted(() => {
    if (!(window as any).ClassicEditor) {
        const script = document.createElement('script');
        script.src = 'https://cdn.ckeditor.com/ckeditor5/35.3.0/classic/ckeditor.js';
        script.onload = () => {
            initializeEditors();
        };
        document.head.appendChild(script);
    } else {
        initializeEditors();
    }
});

function initializeEditors() {
    const ClassicEditor = (window as any).ClassicEditor;
    ['#editor', '#editor2'].forEach(selector => {
        const element = document.querySelector(selector);
        if (element) {
            ClassicEditor.create(element)
                .catch((error: any) => console.error(`Error initializing ${selector}:`, error));
        }
    });
}
</script>

<template>
   <Header></Header>
    <section id="section-1" class="body max-w-full h-full pb-9 overflow-hidden">
        <div class="py-4 px-12 bg-[#28A8EB] shadow-lg font-semibold rounded-b-md w-full hidden animated-block">
            <ul class="flex flex-col">
                <li class="py-3 opacity-85 hover:opacity-100"><a href="#" class="text-white text-base">Главная</a></li>
                <li class="py-3 opacity-85 hover:opacity-100"><a href="discount.html" class="text-white text-base">Пользователям</a></li>
                <li class="py-3 opacity-85 hover:opacity-100"><a href="kashback.html" class="text-white text-base">Кэшбек</a></li>
                <li class="py-3 opacity-85 hover:opacity-100"><a href="buis.html" class="text-white text-base">Для бизнеса</a></li>
                <li class="py-3 opacity-85 hover:opacity-100"><a href="help.html" class="text-white text-base">Правила</a></li>
                <li class="py-3 opacity-85 hover:opacity-100"><a href="help.html" class="text-white text-base">Контакты</a></li>
            </ul>
        </div>
        <div class="2xl:w-full 2xl:px-4 w-[1140px] mx-auto">
           <NavBar></NavBar>
            <CategoriesMenu></CategoriesMenu>
                <!-- mobile modal -->
                <div class="fixed top-0 left-0 h-screen z-50 overflow-auto bg-white w-full hidden" id="modal_sub">
                    <div class="relative w-full h-full  m-auto flex-col flex p-6">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" id="modal-closeSub" stroke="currentColor" class="w-5 h-5 text-[#7f8588] font-extrabold absolute right-5 top-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        <div class="bg-white rounded-lg px-4 py-8">
                            <ul class="mb-6 list-none" id="list_subMenu">

                            </ul>
                        </div>
                    </div>
                </div>
                <!-- mobile modal -->
            <div class="w-full h-[1px] bg-white opacity-10"></div>
            <div class=" items-center justify-between mb-6 lg:h-full h-[46px] filter_block hidden">
                <h3 class="text-2xl text-white font-bold text_filter">Фильтровать</h3>
                <div class="flex items-center lg:flex-col gapper gap-6 h-full relative filter_inp">
                    <label for="city" class="text-white text-[15px]">Ваш город</label>
                    <div class="relative inline-block selected_block h-[46px]">
                        <div class="custom-select h-[46px] flex items-center appearance-none w-[202px] bg-none border text-white border-white hover:border-gray-300 px-4 py-2 pr-8 rounded-md shadow leading-tight focus:outline-none focus:shadow-outline">
                            <span class=" mr-2">Чебоксары</span>
                            <img src="/assets/icons/down.png" class="h-[5px] w-2 absolute right-0 top-2 mt-3 mr-2 pointer-events-none" alt="Вверх" id="icons">
                        </div>
                        <div class="custom-options absolute hidden mt-1 w-[202px] h-[200px] overflow-y-scroll bg-white shadow-lg rounded-b border border-gray-400 z-50">
                            <div class="custom-option px-4 py-2 cursor-pointer bg-[#F9D914] hover:bg-gray-200">Чебоксары</div>
                            <div class="custom-option px-4 py-2 cursor-pointer hover:bg-gray-200">Москва </div>
                            <div class="custom-option px-4 py-2 cursor-pointer hover:bg-gray-200">Санкт-Петербург</div>
                            <div class="custom-option px-4 py-2 cursor-pointer hover:bg-gray-200">Другой город</div>
                        </div>
                    </div>
                </div>
                <div class="flex items-center lg:flex-col gapper gap-6 relative filter_inp">
                    <label for="shop" class="text-white tex-[15px]">Скидки</label>
                    <div class="relative inline-block selected_block h-[46px]">
                        <div id="custom_select" class="custom_select h-[46px] flex items-center appearance-none w-[202px] bg-none border text-white border-white hover:border-gray-300 px-4 py-2 pr-8 rounded-md shadow leading-tight focus:outline-none focus:shadow-outline">
                            <div id="spaner" class="mr-2">Не менее 5%</div>
                            <img src="/assets/icons/down.png" class="h-[5px] w-2 absolute right-0 top-2 mt-3 mr-2 pointer-events-none" alt="Вверх" id="icons">
                        </div>
                        <div class="custom-options_1 absolute hidden mt-1 w-[202px] h-[200px] overflow-y-scroll bg-white shadow-lg rounded-b border border-gray-400 z-50">
                            <div class="custom-option_1 px-4 py-2 cursor-pointer bg-[#F9D914] hover:bg-gray-200">Не менее 5%</div>
                            <div class="custom-option_1 px-4 py-2 cursor-pointer hover:bg-gray-200">Не менее 10%</div>
                            <div class="custom-option_1 px-4 py-2 cursor-pointer hover:bg-gray-200">Не менее 15%</div>
                            <div class="custom-option_1 px-4 py-2 cursor-pointer hover:bg-gray-200">Не менее 20%</div>
                            <div class="custom-option_1 px-4 py-2 cursor-pointer hover:bg-gray-200">Не менее 25%</div>
                            <div class="custom-option_1 px-4 py-2 cursor-pointer hover:bg-gray-200">Не менее 30%</div>
                            <div class="custom-option_1 px-4 py-2 cursor-pointer hover:bg-gray-200">Не менее 35%</div>
                            <div class="custom-option_1 px-4 py-2 cursor-pointer hover:bg-gray-200">Не менее 40%</div>
                            <div class="custom-option_1 px-4 py-2 cursor-pointer hover:bg-gray-200">Не менее 45%</div>
                            <div class="custom-option_1 px-4 py-2 cursor-pointer hover:bg-gray-200">Не менее 50%</div>
                            <div class="custom-option_1 px-4 py-2 cursor-pointer hover:bg-gray-200">Не менее 55%</div>
                            <div class="custom-option_1 px-4 py-2 cursor-pointer hover:bg-gray-200">Не менее 60%</div>
                            <div class="custom-option_1 px-4 py-2 cursor-pointer hover:bg-gray-200">Не менее 65%</div>
                            <div class="custom-option_1 px-4 py-2 cursor-pointer hover:bg-gray-200">Не менее 70%</div>
                            <div class="custom-option_1 px-4 py-2 cursor-pointer hover:bg-gray-200">Не менее 75%</div>
                            <div class="custom-option_1 px-4 py-2 cursor-pointer hover:bg-gray-200">Не менее 80%</div>
                            <div class="custom-option_1 px-4 py-2 cursor-pointer hover:bg-gray-200">Не менее 85%</div>
                            <div class="custom-option_1 px-4 py-2 cursor-pointer hover:bg-gray-200">Не менее 90%</div>
                            <div class="custom-option_1 px-4 py-2 cursor-pointer hover:bg-gray-200">Не менее 95%</div>
                            <div class="custom-option_1 px-4 py-2 cursor-pointer hover:bg-gray-200">Не менее 100%</div>
                        </div>
                    </div>
                </div>
                <div class="flex items-center lg:flex-col gapper gap-6 relative filter_inp">
                    <label for="sale" class="text-white tex-[15px]">Вид акции</label>
                    <div class="relative inline-block selected_block h-[46px]">
                        <div class="custom_selected h-[46px] flex items-center appearance-none w-[202px] bg-none border text-white border-white hover:border-gray-300 px-4 py-2 pr-8 rounded-md shadow leading-tight focus:outline-none focus:shadow-outline">
                            <div id="spaner1" class="mr-2">Все</div>
                            <img src="/assets/icons/down.png" class="h-[5px] w-2 absolute right-0 top-2 mt-3 mr-2 pointer-events-none" alt="Вверх" id="icons">
                        </div>
                        <div class="custom-options_2 absolute hidden mt-1 w-[202px] h-[200px] overflow-y-scroll bg-white shadow-lg rounded-b border border-gray-400 z-50">
                            <div class="custom-option_2 px-4 py-2 cursor-pointer bg-[#F9D914] hover:bg-gray-200">Все</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex myBlocks gap-10 w-full h-full mt-12">
                <SideNavigation mode="mobile" />
                <div class="w-3/4 md:w-full main_block bg-[#063966] p-8 md:p-4 rounded-2xl">
                    <h2 class="text-4xl md:text-3xl font-bold text-white">Создание новой акции, выберите тип акции</h2>
                    <PromoTypeSelector 
                        :selectedPromo="selectedPromo"
                        @update:selectedPromo="selectedPromo = $event"
                    />
                    <DiscountInputBlock
                        :show="showPervyi"
                        label="Какой % скидки или суммы в рублях вы готовы предоставить?"
                        v-model:amount="discountAmount"
                        v-model:currency="currency1Value"
                    />
                    <DiscountInputBlock
                        :show="showPerviNew"
                        label="Какой % кэшбэка вы готовы предоставить?"
                        v-model:amount="cashbackAmount"
                        v-model:currency="currency2Value"
                    />
                    <div v-show="showTretiy" class="flex bg-white p-8 max-md:p-4 mt-8 m-8 rounded-2xl flex-row max-md:flex-col justify-between items-center" id="tretiy">
                        <div class="flex flex-col w-[450px] max-md:w-full">
                            <p class="text-black/50 all_text"> <strong class="text-black text-base">Если одним из условий является минимальная сумма заказа,</strong> то необходимо указать от какой суммы именно. Если такого условия нет, то оставьте поле пустым.</p>
                        </div>
                        <div class="flex flex-col w-[210px] h-[74px] ml-12 max-md:w-full max-md:h-auto max-md:mt-4 max-md:ml-0 relative">
                            <label for="code_for_sale" class="text-sm font-bold">Минимальная сумма заказа</label>
                            <input type="text" name="code_for_sale" placeholder="1000" class="border-gray-300 rounded-lg w-full mt-3 pl-3 pr-8">
                            <span class="absolute bottom-2 right-3 text-black/50">₽</span>
                        </div>
                    </div>
                    <div v-show="showVtoroi" class="flex bg-white p-8 max-md:p-4 mt-8 rounded-2xl flex-row max-md:flex-col justify-between items-center" id="vtoroi">
                        <div class="flex flex-col w-[450px] max-md:w-full">
                            <h3 class="text-base font-bold">Если для получения скидки необходимо вводить код</h3>
                            <p class="text-black/50 all_text">(например интернет-магазин), то вы можете указать его здесь. Если ничего вводить не нужно, то оставьте поле пустым.</p>
                        </div>
                        <div class="flex flex-col w-[210px] h-[74px] ml-12 max-md:w-full max-md:h-auto max-md:mt-4 max-md:ml-0">
                            <label for="code_for_sale" class="text-sm font-bold">Код для скидки</label>
                            <input type="text" name="code_for_sale" placeholder="NJTON564YNN565N56" class="border-gray-300 rounded-lg w-full mt-3">
                        </div>
                    </div>
                    <div v-show="showChetvertyi" class="flex bg-white p-8 max-md:p-4 mt-8 rounded-2xl flex-col" id="chetvertyi">
                        <div class="flex flex-row max-md:flex-col justify-between items-center">
                            <div class="w-[450px] price_block">
                                <h3 class="text-base font-bold">Если у вас есть бесплатная доставка, то вы можете отметить этот пункт.</h3>
                                <p class="text-black/50 all_text">Если бесплатной доставки нет, то ничего отмечать не нужно.</p>
                            </div>
                            <ToggleSwitch v-model="deliveryOpen" class="max-md:mt-4" />
                        </div>
                        <div v-show="deliveryOpen" class="my-4" id="delivaryBlock">
                            <div class="h-[1px] w-full bg-black/30"></div>
                            <div class="mt-4 flex flex-row max-sm:flex-col justify-between items-center">
                                <div class="">
                                    <p class="text-black/50 all_text"><strong class="text-black text-base">Есть бесплатная доставка.</strong> Если бесплатная доставка действует при заказе от определенной суммы, то необходимо указать это здесь.</p>
                                </div>
                                <div class="flex flex-col w-[200px] ml-12 max-sm:w-full max-sm:mt-4 max-sm:ml-0 relative">
                                    <label for="code_for_sale" class="text-sm font-bold">Действует при заказе от</label>
                                    <input type="number" name="code_for_sale_new_prom" placeholder="1000" class="border-gray-300 rounded-lg w-full mt-3 pl-3 pr-8">
                                    <span class="absolute bottom-12 right-3 text-black/50">₽</span>
                                    <button class="mt-2 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                                        Сохранить
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex bg-white p-8 max-md:p-4 mt-8 rounded-2xl flex-col w-full" id="pyatyi">
                        <h3 class="text-base font-bold">Введите заголовок (названии акции), максимум 64 символа.</h3>
                        <p class="text-black/50 all_text">Вы можете указать в заголовке имя своего бренда (пример в строке), что поможет пользователям отслеживать все ваши акции и возможно сделает вас более узнаваемым.</p>
                        <div class="relative">
                            <input type="text" oninput="countDown(event)" class="border-gray-300 w-full rounded-lg mt-3" placeholder="Скидки до 30% в Desigual! Зарядись энергией Desigual!" id="textSymbol" maxlength="64">
                            <span id="count" class="absolute right-3 bottom-[10px] text-[#2578cf] font-bold">64</span>
                        </div>
                    </div>
                    <PhotoUploadBlock />
                    <YouTubeBlock />
                    <div class="flex bg-white p-8 max-md:p-4 mt-8 rounded-2xl flex-col w-full" id="vosmoi">
                        <h3 class="font-bold mb-4">Описание акции</h3>
                        <textarea id="editor" class="w-full h-[200px]">✨ «-30% на всё от Desigual» ✨<br><br>Приготовьтесь к яркому обновлению гардероба! Бренд Desigual дарит вам уникальную возможность приобрести любую вещь из своего ассортимента со скидкой 30%.<br><br>🗓️ Срок действия акции: Предложение действует с [Укажите дату начала акции] по [Укажите последний день текущего месяца]. Успейте воспользоваться!<br><br>🛍️ Что входит в акцию: Скидка 30% распространяется на абсолютно все товары в каталоге Desigual:<br>Одежда: платья, юбки, брюки, джинсы, куртки, пальто, футболки, рубашки, свитера и многое другое для мужчин и женщин.<br>Обувь: кроссовки, ботинки, сапоги, туфли, сандалии.<br>Аксессуары: сумки, рюкзаки, шарфы, головные уборы, украшения, ремни.<br>И другие категории товаров бренда Desigual.<br><br><br>📍 Где действует акция:<br>Онлайн: на официальном сайте Desigual [укажите ссылку на сайт, если применимо].<br>Оффлайн: во всех фирменных магазинах Desigual, расположенных в [укажите города или регионы, где действует акция, например: "Москве и Санкт-Петербурге"].<br><br><br>⚠️ Важные условия:<br>Скидка 30% применяется автоматически при оформлении заказа или на кассе.<br>Акция не суммируется с другими скидками, специальными предложениями и промокодами.<br>Количество товаров ограничено.<br>Возврат и обмен товаров осуществляется согласно стандартным правилам магазина.<br>Организатор акции оставляет за собой право изменить условия или досрочно завершить акцию.<br>Не упустите шанс добавить красок в свою жизнь с Desigual! 💖</textarea>
                        <div class="my-6">
                            <div class="h-[1px] w-full bg-black/30"></div>
                            <div class="flex flex-row max-md:flex-col justify-between items-center max-md:items-start my-4">
                                <p class="mr-10 max-md:mr-0 max-md:mb-4 text-black/50 all_text"><strong class="text-black text-base">Допополнительные условия.</strong>
                                    Если по вашей акции есть какие-то дополнительные условия, о которых вы считаете нужным заявить - вы можете сделать это ниже. Если никаких дополнительных условий нет, то оставьте поле пустым.
                                    <span @click="conditionsModalOpen = true" id="MOre_examp" class="text-[#2578cf] ml-3 hover:underline cursor-pointer">Подробнее</span>
                                </p>
                                <ToggleSwitch v-model="textEditorOpen" />
                            </div>
                        </div>
                        <div v-show="textEditorOpen" class="mb-4" id="text_editor">
                            <div class="h-[1px] w-full bg-black/30"></div>
                            <textarea id="editor2" class="w-full min-h-[200px]"></textarea>
                        </div>
                    </div>
                    <ConditionsExampleModal
                        :isOpen="conditionsModalOpen"
                        @close="conditionsModalOpen = false"
                    />
                    <SocialLinksBlock />
                    <AddressContactBlock />
                    <div class="flex bg-white p-8 max-md:p-4 mt-8 rounded-2xl flex-col" id="odinnadsat">
                        <div class="flex flex-row max-md:flex-col items-start max-md:items-start">
                            <div class="max-md:mb-4">
                                <h3 class="font-bold">Если ваша акция доступна только в определенные дни и часы.</h3>
                                <p class="text-black/50 all_text">Общий отсчет времени до конца акции не прекратится, она так же будет находится на сайте, но пользователи смогут перейти в нее только в указанные вами дни и часы.</p>
                            </div>
                            <label class="toggle-switch relative inline-flex items-center cursor-pointer ml-10 max-md:ml-0">
                                <input type="checkbox" value="" class="sr-only peer" id="graphicsCkeck">
                                <div class="w-14 h-7 bg-gray-200 border border-gray-200 peer-focus:outline-none rounded-full peer-checked:after:translate-x-[1.75rem] peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all peer-checked:bg-blue-600 peer-checked:border-blue-600"></div>
                            </label>
                        </div>
                        <div class="mt-5 hidden" id="grphicsBlock">
                            <div class="h-[1px] w-full bg-black/20"></div>
                            <div class="mt-5 flex flex-row max-md:flex-col items-center max-md:items-start gap-3">
                                <div class="flex items-center gap-2">
                                    <input type="checkbox" name="check_day" id="checkDay" class="check_day rounded-md">
                                    <label for="check_day" class="font-bold">Акция доступна в</label>
                                </div>
                                <ul class="flex flex-wrap items-center gap-2">
                                    <li id="md" class="px-3 py-2 cursor-pointer bg-[#e9eef1] rounded-md">пн</li>
                                    <li id="tu" class="px-3 py-2 cursor-pointer bg-[#e9eef1] rounded-md">вт</li>
                                    <li id="wd" class="px-3 py-2 cursor-pointer bg-[#e9eef1] rounded-md">ср</li>
                                    <li id="th" class="px-3 py-2 cursor-pointer bg-[#e9eef1] rounded-md">чт</li>
                                    <li id="fr" class="px-3 py-2 cursor-pointer bg-[#e9eef1] rounded-md">пт</li>
                                    <li id="su" class="px-3 py-2 cursor-pointer bg-[#e9eef1] rounded-md">сб</li>
                                    <li id="sn" class="px-3 py-2 cursor-pointer bg-[#e9eef1] rounded-md">вс</li>
                                </ul>
                            </div>
                            <div class="mt-5 flex flex-row max-md:flex-col items-center max-md:items-start gap-3">
                                <div class="flex items-center gap-2">
                                    <input type="checkbox" name="check_day" id="checkTime" class="check_day rounded-md">
                                    <label for="check_day" class="font-bold">Акция доступна с</label>
                                </div>
                                <div class="flex items-center gap-3">
                                    <div class="flex items-center gap-2">
                                        <input type="text" placeholder="00" maxlength="2"  class="w-[45px] rounded-lg border border-gray-300" >
                                        <span>:</span>
                                        <input type="text" placeholder="00" maxlength="2"  class="w-[45px] rounded-lg border border-gray-300" >
                                    </div>
                                    <span>- до</span>
                                    <div class="flex items-center gap-2">
                                        <input type="text" placeholder="00" maxlength="2"  class="w-[45px] rounded-lg border border-gray-300" >
                                        <span>:</span>
                                        <input type="text" placeholder="00" maxlength="2"  class="w-[45px] rounded-lg border border-gray-300" >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex bg-white p-8 max-md:p-4 mt-8 rounded-2xl flex-col" id="dvenadsat">
                        <h3 class="font-bold">География акции, не более 20 городов</h3>
                        <div class="custom-select relative w-full mt-5">
                            <input type="text" class="select-input w-full rounded-md border-gray-300" placeholder="Укажите город">
                            <ul class="select-dropdown hidden absolute z-50 w-full p-0 mt-1 bg-white border border-[#ccc] max-h-[200px] overflow-y-auto">
                                <li class="p-1 cursor-pointer hover:bg-[#f5f5f5]">Москва</li>
                                <li class="p-1 cursor-pointer hover:bg-[#f5f5f5]">Санкт-Петербург</li>
                                <li class="p-1 cursor-pointer hover:bg-[#f5f5f5]">Новосибирск</li>
                                <li class="p-1 cursor-pointer hover:bg-[#f5f5f5]">Екатеринбург</li>
                                <li class="p-1 cursor-pointer hover:bg-[#f5f5f5]">Казань</li>
                                <li class="p-1 cursor-pointer hover:bg-[#f5f5f5]">Нижний Новгород</li>
                                <li class="p-1 cursor-pointer hover:bg-[#f5f5f5]">Челябинск</li>
                                <li class="p-1 cursor-pointer hover:bg-[#f5f5f5]">Самара</li>
                                <li class="p-1 cursor-pointer hover:bg-[#f5f5f5]">Омск</li>
                                <li class="p-1 cursor-pointer hover:bg-[#f5f5f5]">Ростов-на-Дону</li>
                            </ul>
                        </div>
                        <div>
                            <div id="selectedCities" class="mt-5 flex flex-wrap gap-4 all_text"></div>
                        </div>
                    </div>
                    <div class="flex bg-white p-4 max-md:p-4 mt-8 rounded-2xl flex-col max-md:flex hidden" id="">
                        <div class="flex flex-col">
                            <h2 class="font-bold">
                                К каким категориям относится ваша акция?
                            </h2>
                            <button class="bg-[#0066cb] text-white py-3 flex justify-between px-8 mt-2 rounded-lg">Открыть категории
                                <svg class="text-white w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10 7L15 12L10 17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </button>
                        </div>
                        <!-- <div class="mx-8">
                            <h3 class="font-bold mt-5">Вы выбрали</h3>
                            <div id="tag-container" class="flex flex-wrap gap-3 py-3"></div>
                        </div> -->
                    </div>
                    <CategorySelector v-model:selectedCategories="selectedCategories" />
                    <div class="flex bg-white p-8 max-md:p-4 mt-8 rounded-2xl justify-between flex-row max-md:flex-col" id="chetyrnadsat">
                        <p class="w-[380px] max-md:w-full text-black/50 max-md:mb-4"><strong class="text-black">На какое количество дней будет запущена акция?</strong><br>Максимум 30 дней.</p>
                        <div class="flex items-center gap-4">
                            <div class="flex items-center gap-2 relative w-[180px] max-md:w-full">
                                <span class="text-xs opacity-80">0</span>
                                <input id="slider" class="w-[150px]" type="range" min="0" max="30" value="0">
                                <div id="slider-value" class="slider-value">0</div>
                                <span class="text-xs opacity-80">30</span>
                            </div>
                            <div class="border text-center py-2 w-[50px] rounded-md text-lg" id="slider_value">0</div>
                        </div>
                    </div>
                    <div class="flex bg-white p-8 max-md:p-4 mt-8 rounded-2xl justify-between items-start flex-row max-md:flex-col" id="pyatnadsat">
                        <div class="w-[450px] max-md:w-full max-md:mb-4">
                            <h3 class="font-bold">Желаете чтобы ваша акция так же появлялась и в баннере на главной странице сайта?<span id="hiddenText" class="hidden font-normal text-black/50">В этом случае стоимость запуска акции будет в 3 раза дороже. Бесплатно, если вы предлагаете скидку более 50%.</span></h3>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="text-base all_text" id="notAgree">Нет</span>
                            <label class="toggle-switch relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" value="" class="sr-only peer" id="saleValue">
                                <div class="w-14 h-7 bg-gray-200 border border-gray-200 peer-focus:outline-none rounded-full peer-checked:after:translate-x-[1.75rem] peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all peer-checked:bg-blue-600 peer-checked:border-blue-600"></div>
                            </label>
                            <span class="text-base all_text text_opac" id="agree">Да, желаю</span>
                        </div>
                    </div>
                    <div class="flex bg-white p-8 max-md:p-4 mt-8 rounded-2xl flex-col" id="shestnadsat">
                        <div class="flex items-center justify-between w-full flex-row max-md:flex-col max-md:items-start">
                            <h3 class="font-bold w-auto max-md:w-full max-md:mb-2">Дополнительные опции (нужен премиум)</h3>
                            <a href="#" class="text-[#0066CB] hover:underline w-auto max-md:w-full">Смотреть тарифы</a>
                        </div>
                        <div class="w-full h-[1px] bg-black/20 my-5"></div>
                        <div class="flex justify-between items-center flex-row max-md:flex-col max-md:items-start">
                            <div class="flex items-center gap-1 max-md:mb-4">
                                <p class="text-base all_text">Поднимать акцию на первое<br>место каждые</p>
                                <input type="text" id="timeValue" class="w-[45px] bg_inp rounded-md border-gray-300" placeholder="0">
                                <label for="timeValue" class="text-base max-sm:text-sm">часа</label>
                            </div>
                            <label class="toggle-switch relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" value="" class="sr-only peer" id="timeValueCheck">
                                <div class="w-14 h-7 bg-gray-200 border border-gray-200 peer-focus:outline-none rounded-full peer-checked:after:translate-x-[1.75rem] peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all peer-checked:bg-blue-600 peer-checked:border-blue-600"></div>
                            </label>
                        </div>
                        <div class="w-full h-[1px] bg-black/20 my-5"></div>
                        <div class="flex justify-between items-center flex-row max-md:flex-col max-md:items-start">
                            <div class="flex items-center gap-1 max-md:mb-4">
                                <p class="text-base all_text">Автоматически перезапускать акцию после завершения на</p>
                                <input type="text" id="dayValue" class="w-[45px] bg_inp rounded-md border-gray-300" placeholder="0">
                                <label for="dayValue">дней</label>
                            </div>
                            <label class="toggle-switch relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" value="" class="sr-only peer" id="dayValueCheck">
                                <div class="w-14 h-7 bg-gray-200 border border-gray-200 peer-focus:outline-none rounded-full peer-checked:after:translate-x-[1.75rem] peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all peer-checked:bg-blue-600 peer-checked:border-blue-600"></div>
                            </label>
                        </div>
                    </div>
                    <div class="pt-8 flex justify-between flex-row max-md:flex-col">
                        <div class="flex flex-col w-[450px] max-md:w-full">
                            <div class="flex pricer_blocks justify-between">
                                <div class="">
                                    <span class="text-[#159FF5] text-base">Ваш баланс</span>
                                    <h3 class="text-white text-3xl price_text">100 000 руб.</h3>
                                </div>
                                <div class="">
                                    <span class="text-[#159FF5] text-base">Стоимость акции составит</span>
                                    <h3 class="text-white text-3xl price_text">594 руб.</h3>
                                </div>
                            </div>
                            <div class="flex gap-2  items-center mt-5">
                                <input type="checkbox" name="" id="rules" >
                                <label for="rules" class="text-[#607990] all_text">С условиями пользования сервисом и стоимостью ознакомлен и полностью согласен</label>
                            </div>
                        </div>
                        <div class="flex flex-col gap-3 max-md:mt-4">
                            <div class="w-[238px] h-[56px] max-md:w-full bg-[#1d89f2] flex items-center justify-center shadow-lg gap-3 rounded-md hover:opacity-90">
                                <img class="w-6 h-6" src="/images/png/constructor/eye.svg" alt="eye">
                                <a href="#" class="text-white all_text">Предпросмотр акции</a>
                            </div>
                            <div class="w-[238px] h-[56px] max-md:w-full bg-[#1d89f2] flex items-center justify-center shadow-lg gap-3 rounded-md hover:opacity-90">
                                <img class="w-6 h-6" src="/images/png/constructor/file.svg" alt="eye">
                                <button class="text-white all_text">Сохранить как черновик</button>
                            </div>
                        </div>
                    </div>
                    <button class="w-full text-3xl text-white font-bold py-8 mt-5 bg-[#1d89f2] rounded-md shadow-lg hover:opacity-90">Запустить акцию</button>
                </div>
                <SideNavigation mode="desktop" />
            </div>
        </div>
    </section>
    <div id="alertFile" class="fixed top-2 left-[40%] p-4 mb-4 border-4 border-[#0066CB] rounded-md bg-white hidden" >
        <div class="flex items-center">
            <svg class="w-4 h-4 mr-2 text-[#0066CB]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <span class="sr-only">Info</span>
            <h3 class="text-lg font-black ">Внимание!</h3>
        </div>
        <div class="mt-2 mb-4 text-sm text-black">
            Файл слишком большой. Максимальный размер файла - 10 МБ.
        </div>
        <div class="flex">
            <button type="button" id="alertClose" class="text-[#0066CB] bg-transparent border-2 border-[#0066CB] hover:bg-[#0066CB] hover:text-white focus:ring-4 focus:outline-none focus:ring-blue/20 font-medium rounded-lg text-base px-3 py-1.5 text-center dark:hover:bg-red-600 dark:border-red-600 dark:text-red-500 dark:hover:text-white dark:focus:ring-red-800">
                Понятно
            </button>
        </div>
    </div>
    <Footer :contact="contact"></Footer>
</template>

<style>
.ck-editor__editable {
    min-height: 200px;
}

.toggle-switch input:checked ~ div::after {
    transform: translateX(1.75rem);
}
</style>
