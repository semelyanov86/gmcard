<script setup lang="ts">
import { ref } from 'vue';
import ToggleSwitch from './ToggleSwitch.vue';

interface SocialLink {
    id: string;
    value: string;
}

const isOpen = ref(false);

const webVisible = ref(false);
const emailVisible = ref(false);
const vkVisible = ref(false);
const insVisible = ref(false);
const youVisible = ref(false);
const linVisible = ref(false);
const okVisible = ref(false);
const telVisible = ref(false);
const whaVisible = ref(false);
const vibVisible = ref(false);

const webLinks = ref<SocialLink[]>([{ id: 'web1', value: '' }]);
const emailLinks = ref<SocialLink[]>([{ id: 'email1', value: '' }]);
const vkLinks = ref<SocialLink[]>([{ id: 'vk1', value: '' }]);
const insLinks = ref<SocialLink[]>([{ id: 'ins1', value: '' }]);
const youLinks = ref<SocialLink[]>([{ id: 'you1', value: '' }]);
const linLinks = ref<SocialLink[]>([{ id: 'lin1', value: '' }]);
const okLinks = ref<SocialLink[]>([{ id: 'ok1', value: '' }]);
const telLinks = ref<SocialLink[]>([{ id: 'tel1', value: '' }]);
const whaLinks = ref<SocialLink[]>([{ id: 'wha1', value: '' }]);
const vibLinks = ref<SocialLink[]>([{ id: 'vib1', value: '' }]);

function addLink(links: SocialLink[], prefix: string) {
    const newId = `${prefix}${links.length + 1}`;
    links.push({ id: newId, value: '' });
}

function removeLink(links: SocialLink[], index: number, visibleRef: any, prefix: string) {

    links.splice(index, 1);

    if (links.length === 0) {
        visibleRef.value = false;
        links.push({ id: `${prefix}1`, value: '' });
    }
}

const deleteIconPath = 'M17,8 C17.5522847,8 18,8.44771525 18,9 L18,19 C18,20.6568542 16.6568542,22 15,22 L9,22 C7.34314575,22 6,20.6568542 6,19 L6,9 C6,8.44771525 6.44771525,8 7,8 L17,8 Z M16,10 L8,10 L8,19 C8,19.5522847 8.44771525,20 9,20 L15,20 C15.5522847,20 16,19.5522847 16,19 L16,10 Z M9,3 C9,2.44771525 9.44771525,2 10,2 L14,2 C14.5522847,2 15,2.44771525 15,3 L15,4 L19,4 C19.5522847,4 20,4.44771525 20,5 C20,5.55228475 19.5522847,6 19,6 L5,6 C4.44771525,6 4,5.55228475 4,5 C4,4.44771525 4.44771525,4 5,4 L9,4 L9,3 Z';
</script>

<template>
    <div class="flex bg-white p-8 max-md:p-4 mt-8 rounded-2xl flex-col" id="devyatyi">
        <div class="flex flex-row max-md:flex-col justify-between items-center max-md:items-start">
            <h3 class="mr-4 max-md:mr-0 max-md:mb-4 font-bold">
                При наличии, добавьте ссылки на ваш сайт или страницы в соцсетях.
            </h3>
            <ToggleSwitch v-model="isOpen" />
        </div>
        <div v-show="isOpen" class="my-4" id="allSocial">
            <div class="h-[1px] w-full bg-black/30"></div>

            <!-- Кнопки выбора соцсетей -->
            <div class="flex flex-wrap gap-3 mt-6">
                <div @click="webVisible = !webVisible" class="flex px-3 rounded-md items-center py-2 bg-[#E5ECF0] cursor-pointer" id="socWeb">
                    <img src="/images/png/constructor/socialWeb.png" alt="web">
                    <span class="text-base max-sm:text-sm ml-1">Веб-сайт</span>
                </div>
                <div @click="emailVisible = !emailVisible" class="flex px-3 rounded-md items-center py-2 bg-[#E5ECF0] cursor-pointer" id="socEmail">
                    <img src="/images/png/constructor/socialemail.png" alt="Email">
                    <span class="text-base max-sm:text-sm ml-1">Электронная почта</span>
                </div>
                <div @click="vkVisible = !vkVisible" class="flex px-3 rounded-md items-center py-2 bg-[#E5ECF0] cursor-pointer" id="socVk">
                    <img src="/images/png/constructor/socialVk.png" alt="Vk">
                    <span class="text-base max-sm:text-sm ml-1">Вконтакте</span>
                </div>
                <div @click="insVisible = !insVisible" class="flex px-3 rounded-md items-center py-2 bg-[#E5ECF0] cursor-pointer" id="socIns">
                    <img src="/images/png/constructor/socialIns.png" alt="ins">
                    <span class="text-base max-sm:text-sm ml-1">Instagram</span>
                </div>
                <div @click="youVisible = !youVisible" class="flex px-3 rounded-md items-center py-2 bg-[#E5ECF0] cursor-pointer" id="socYou">
                    <img src="/images/png/constructor/socialYou.png" alt="Youtube">
                    <span class="text-base max-sm:text-sm ml-1">YouTube</span>
                </div>
                <div @click="linVisible = !linVisible" class="flex px-3 rounded-md items-center py-2 bg-[#E5ECF0] cursor-pointer" id="socLin">
                    <img src="/images/png/constructor/socialLinkedin.png" alt="Linkedin">
                    <span class="text-base max-sm:text-sm ml-1">Linkedin</span>
                </div>
                <div @click="okVisible = !okVisible" class="flex px-3 rounded-md items-center py-2 bg-[#E5ECF0] cursor-pointer" id="socOk">
                    <img src="/images/png/constructor/socialOk.png" alt="OK">
                    <span class="text-base max-sm:text-sm ml-1">Одноклассники</span>
                </div>
                <div @click="telVisible = !telVisible" class="flex px-3 rounded-md items-center py-2 bg-[#E5ECF0] cursor-pointer" id="socTel">
                    <img src="/images/png/constructor/socialTelegram.png" alt="telegram">
                    <span class="text-base max-sm:text-sm ml-1">Telegram</span>
                </div>
                <div @click="whaVisible = !whaVisible" class="flex px-3 rounded-md items-center py-2 bg-[#E5ECF0] cursor-pointer" id="socWha">
                    <img src="/images/png/constructor/socialWha.png" alt="Whattsapp">
                    <span class="text-base max-sm:text-sm ml-1">WhatsApp</span>
                </div>
                <div @click="vibVisible = !vibVisible" class="flex px-3 rounded-md items-center py-2 bg-[#E5ECF0] cursor-pointer" id="socViber">
                    <img src="/images/png/constructor/socialViber.png" alt="Viber">
                    <span class="text-base max-sm:text-sm ml-1">Viber</span>
                </div>
                <div class="text-xs text-gray-500 mt-4">Instagram - соцсеть принадлежит компании Meta, признанной экстремистской и запрещенной на территории России</div>
            </div>

            <!-- Формы для ввода ссылок -->
            <div class="mt-6">
                <!-- Веб-сайт -->
                <div v-show="webVisible" id="webDiv">
                    <div v-for="(link, index) in webLinks" :key="link.id" class="flex flex-row max-md:flex-col items-center max-md:items-start gap-4 mt-4">
                        <div class="relative">
                            <div class="flex items-center absolute top-3 left-2">
                                <img src="/images/png/constructor/socialWeb.png" alt="web">
                            </div>
                            <input v-model="link.value" type="text" class="w-[450px] max-md:w-full link_url rounded-md ring-black/30 link_social" placeholder="Веб-сайт">
                            <div class="absolute top-1 left_del left-[415px] h-[34px] w-[2px] bg-black/30"></div>
                            <svg @click="removeLink(webLinks, index, webVisible, 'web')" fill="currentColor" class="w-6 h-6 absolute top-2 text-black/50 left_delSvg left-[420px] hover:text-black/30 cursor-pointer" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" :d="deleteIconPath"/>
                            </svg>
                        </div>
                        <span v-if="index === webLinks.length - 1 && webLinks.length < 2" @click="addLink(webLinks, 'web')" class="text-sm text-[#0066CC] hover:text-[#993300] cursor-pointer">+ еще Веб-сайт</span>
                    </div>
                </div>

                <!-- Email -->
                <div v-show="emailVisible" id="emailDiv">
                    <div v-for="(link, index) in emailLinks" :key="link.id" class="flex flex-row max-md:flex-col items-center max-md:items-start gap-4 mt-4">
                        <div class="relative">
                            <div class="flex items-center absolute top-3 left-2">
                                <img src="/images/png/constructor/socialemail.png" alt="Email">
                            </div>
                            <input v-model="link.value" type="text" class="w-[450px] max-md:w-full link_url rounded-md ring-black/30 link_social" placeholder="Электронная почта">
                            <div class="absolute top-1 left_del left-[415px] h-[34px] w-[2px] bg-black/30"></div>
                            <svg @click="removeLink(emailLinks, index, emailVisible, 'email')" fill="currentColor" class="w-6 h-6 absolute top-2 text-black/50 left_delSvg left-[420px] hover:text-black/30 cursor-pointer" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" :d="deleteIconPath"/>
                            </svg>
                        </div>
                        <span v-if="index === emailLinks.length - 1 && emailLinks.length < 2" @click="addLink(emailLinks, 'email')" class="text-sm text-[#0066CC] hover:text-[#993300] cursor-pointer">+ еще Электронная почта</span>
                    </div>
                </div>

                <!-- Instagram -->
                <div v-show="insVisible" id="insDiv">
                    <div v-for="(link, index) in insLinks" :key="link.id" class="flex flex-row max-md:flex-col items-center max-md:items-start gap-4 mt-4">
                        <div class="relative">
                            <div class="flex items-center absolute top-3 left-2">
                                <img src="/images/png/constructor/socialIns.png" alt="Instagram">
                            </div>
                            <input v-model="link.value" type="text" class="w-[450px] max-md:w-full link_url rounded-md ring-black/30 link_social" placeholder="Instagram">
                            <div class="absolute top-1 left_del left-[415px] h-[34px] w-[2px] bg-black/30"></div>
                            <svg @click="removeLink(insLinks, index, insVisible, 'ins')" fill="currentColor" class="w-6 h-6 absolute top-2 text-black/50 left_delSvg left-[420px] hover:text-black/30 cursor-pointer" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" :d="deleteIconPath"/>
                            </svg>
                        </div>
                        <span v-if="index === insLinks.length - 1 && insLinks.length < 2" @click="addLink(insLinks, 'ins')" class="text-sm text-[#0066CC] hover:text-[#993300] cursor-pointer">+ еще Instagram</span>
                    </div>
                </div>

                <!-- Вконтакте -->
                <div v-show="vkVisible" id="vkDiv">
                    <div v-for="(link, index) in vkLinks" :key="link.id" class="flex flex-row max-md:flex-col items-center max-md:items-start gap-4 mt-4">
                        <div class="relative">
                            <div class="flex items-center absolute top-3 left-2">
                                <img src="/images/png/constructor/socialVk.png" alt="Vk">
                            </div>
                            <input v-model="link.value" type="text" class="w-[450px] max-md:w-full link_url rounded-md ring-black/30 link_social" placeholder="Вконтакте">
                            <div class="absolute top-1 left_del left-[415px] h-[34px] w-[2px] bg-black/30"></div>
                            <svg @click="removeLink(vkLinks, index, vkVisible, 'vk')" fill="currentColor" class="w-6 h-6 absolute top-2 text-black/50 left_delSvg left-[420px] hover:text-black/30 cursor-pointer" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" :d="deleteIconPath"/>
                            </svg>
                        </div>
                        <span v-if="index === vkLinks.length - 1 && vkLinks.length < 2" @click="addLink(vkLinks, 'vk')" class="text-sm text-[#0066CC] hover:text-[#993300] cursor-pointer">+ еще Вконтакте</span>
                    </div>
                </div>

                <!-- YouTube -->
                <div v-show="youVisible" id="YouDiv">
                    <div v-for="(link, index) in youLinks" :key="link.id" class="flex flex-row max-md:flex-col items-center max-md:items-start gap-4 mt-4">
                        <div class="relative">
                            <div class="flex items-center absolute top-3 left-2">
                                <img src="/images/png/constructor/socialYou.png" alt="YouTube">
                            </div>
                            <input v-model="link.value" type="text" class="w-[450px] max-md:w-full link_url rounded-md ring-black/30 link_social" placeholder="YouTube">
                            <div class="absolute top-1 left_del left-[415px] h-[34px] w-[2px] bg-black/30"></div>
                            <svg @click="removeLink(youLinks, index, youVisible, 'you')" fill="currentColor" class="w-6 h-6 absolute top-2 text-black/50 left_delSvg left-[420px] hover:text-black/30 cursor-pointer" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" :d="deleteIconPath"/>
                            </svg>
                        </div>
                        <span v-if="index === youLinks.length - 1 && youLinks.length < 2" @click="addLink(youLinks, 'you')" class="text-sm text-[#0066CC] hover:text-[#993300] cursor-pointer">+ еще YouTube</span>
                    </div>
                </div>

                <!-- Linkedin -->
                <div v-show="linVisible" id="linDiv">
                    <div v-for="(link, index) in linLinks" :key="link.id" class="flex flex-row max-md:flex-col items-center max-md:items-start gap-4 mt-4">
                        <div class="relative">
                            <div class="flex items-center absolute top-3 left-2">
                                <img src="/images/png/constructor/socialLinkedin.png" alt="Linkedin">
                            </div>
                            <input v-model="link.value" type="text" class="w-[450px] max-md:w-full link_url rounded-md ring-black/30 link_social" placeholder="Linkedin">
                            <div class="absolute top-1 left_del left-[415px] h-[34px] w-[2px] bg-black/30"></div>
                            <svg @click="removeLink(linLinks, index, linVisible, 'lin')" fill="currentColor" class="w-6 h-6 absolute top-2 text-black/50 left_delSvg left-[420px] hover:text-black/30 cursor-pointer" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" :d="deleteIconPath"/>
                            </svg>
                        </div>
                        <span v-if="index === linLinks.length - 1 && linLinks.length < 2" @click="addLink(linLinks, 'lin')" class="text-sm text-[#0066CC] hover:text-[#993300] cursor-pointer">+ еще Linkedin</span>
                    </div>
                </div>

                <!-- Одноклассники -->
                <div v-show="okVisible" id="okDiv">
                    <div v-for="(link, index) in okLinks" :key="link.id" class="flex flex-row max-md:flex-col items-center max-md:items-start gap-4 mt-4">
                        <div class="relative">
                            <div class="flex items-center absolute top-3 left-2">
                                <img src="/images/png/constructor/socialOk.png" alt="OK">
                            </div>
                            <input v-model="link.value" type="text" class="w-[450px] max-md:w-full link_url rounded-md ring-black/30 link_social" placeholder="Одноклассники">
                            <div class="absolute top-1 left_del left-[415px] h-[34px] w-[2px] bg-black/30"></div>
                            <svg @click="removeLink(okLinks, index, okVisible, 'ok')" fill="currentColor" class="w-6 h-6 absolute top-2 text-black/50 left_delSvg left-[420px] hover:text-black/30 cursor-pointer" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" :d="deleteIconPath"/>
                            </svg>
                        </div>
                        <span v-if="index === okLinks.length - 1 && okLinks.length < 2" @click="addLink(okLinks, 'ok')" class="text-sm text-[#0066CC] hover:text-[#993300] cursor-pointer">+ еще Одноклассники</span>
                    </div>
                </div>

                <!-- Telegram -->
                <div v-show="telVisible" id="telDiv">
                    <div v-for="(link, index) in telLinks" :key="link.id" class="flex flex-row max-md:flex-col items-center max-md:items-start gap-4 mt-4">
                        <div class="relative">
                            <div class="flex items-center absolute top-3 left-2">
                                <img src="/images/png/constructor/socialTelegram.png" alt="Telegram">
                            </div>
                            <input v-model="link.value" type="text" class="w-[450px] max-md:w-full link_url rounded-md ring-black/30 link_social" placeholder="Telegram">
                            <div class="absolute top-1 left_del left-[415px] h-[34px] w-[2px] bg-black/30"></div>
                            <svg @click="removeLink(telLinks, index, telVisible, 'tel')" fill="currentColor" class="w-6 h-6 absolute top-2 text-black/50 left_delSvg left-[420px] hover:text-black/30 cursor-pointer" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" :d="deleteIconPath"/>
                            </svg>
                        </div>
                        <span v-if="index === telLinks.length - 1 && telLinks.length < 2" @click="addLink(telLinks, 'tel')" class="text-sm text-[#0066CC] hover:text-[#993300] cursor-pointer">+ еще Telegram</span>
                    </div>
                </div>

                <!-- WhatsApp -->
                <div v-show="whaVisible" id="whaDiv">
                    <div v-for="(link, index) in whaLinks" :key="link.id" class="flex flex-row max-md:flex-col items-center max-md:items-start gap-4 mt-4">
                        <div class="relative">
                            <div class="flex items-center absolute top-3 left-2">
                                <img src="/images/png/constructor/socialWha.png" alt="WhatsApp">
                            </div>
                            <input v-model="link.value" type="text" class="w-[450px] max-md:w-full link_url rounded-md ring-black/30 link_social" placeholder="WhatsApp">
                            <div class="absolute top-1 left_del left-[415px] h-[34px] w-[2px] bg-black/30"></div>
                            <svg @click="removeLink(whaLinks, index, whaVisible, 'wha')" fill="currentColor" class="w-6 h-6 absolute top-2 text-black/50 left_delSvg left-[420px] hover:text-black/30 cursor-pointer" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" :d="deleteIconPath"/>
                            </svg>
                        </div>
                        <span v-if="index === whaLinks.length - 1 && whaLinks.length < 2" @click="addLink(whaLinks, 'wha')" class="text-sm text-[#0066CC] hover:text-[#993300] cursor-pointer">+ еще WhatsApp</span>
                    </div>
                </div>

                <!-- Viber -->
                <div v-show="vibVisible" id="vibDiv">
                    <div v-for="(link, index) in vibLinks" :key="link.id" class="flex flex-row max-md:flex-col items-center max-md:items-start gap-4 mt-4">
                        <div class="relative">
                            <div class="flex items-center absolute top-3 left-2">
                                <img src="/images/png/constructor/socialViber.png" alt="Viber">
                            </div>
                            <input v-model="link.value" type="text" class="w-[450px] max-md:w-full link_url rounded-md ring-black/30 link_social" placeholder="Viber">
                            <div class="absolute top-1 left_del left-[415px] h-[34px] w-[2px] bg-black/30"></div>
                            <svg @click="removeLink(vibLinks, index, vibVisible, 'vib')" fill="currentColor" class="w-6 h-6 absolute top-2 text-black/50 left_delSvg left-[420px] hover:text-black/30 cursor-pointer" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" :d="deleteIconPath"/>
                            </svg>
                        </div>
                        <span v-if="index === vibLinks.length - 1 && vibLinks.length < 2" @click="addLink(vibLinks, 'vib')" class="text-sm text-[#0066CC] hover:text-[#993300] cursor-pointer">+ еще Viber</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

