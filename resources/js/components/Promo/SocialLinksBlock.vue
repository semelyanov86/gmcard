<script setup lang="ts">
import TrashIcon from '@/components/primitives/icons/TrashIcon.vue';
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
</script>

<template>
    <div class="mt-8 flex flex-col rounded-2xl bg-white p-8 max-md:p-4" id="devyatyi">
        <div class="flex flex-row items-center justify-between max-md:flex-col max-md:items-start">
            <h3 class="mr-4 font-bold max-md:mr-0 max-md:mb-4">При наличии, добавьте ссылки на ваш сайт или страницы в соцсетях.</h3>
            <ToggleSwitch v-model="isOpen" />
        </div>
        <div v-show="isOpen" class="my-4" id="allSocial">
            <div class="h-[1px] w-full bg-black/30"></div>

            <!-- Кнопки выбора соцсетей -->
            <div class="mt-6 flex flex-wrap gap-3">
                <div @click="webVisible = !webVisible" class="flex cursor-pointer items-center rounded-md bg-[#E5ECF0] px-3 py-2" id="socWeb">
                    <img src="/images/png/constructor/socialWeb.png" alt="web" />
                    <span class="ml-1 text-base max-sm:text-sm">Веб-сайт</span>
                </div>
                <div @click="emailVisible = !emailVisible" class="flex cursor-pointer items-center rounded-md bg-[#E5ECF0] px-3 py-2" id="socEmail">
                    <img src="/images/png/constructor/socialemail.png" alt="Email" />
                    <span class="ml-1 text-base max-sm:text-sm">Электронная почта</span>
                </div>
                <div @click="vkVisible = !vkVisible" class="flex cursor-pointer items-center rounded-md bg-[#E5ECF0] px-3 py-2" id="socVk">
                    <img src="/images/png/constructor/socialVk.png" alt="Vk" />
                    <span class="ml-1 text-base max-sm:text-sm">Вконтакте</span>
                </div>
                <div @click="insVisible = !insVisible" class="flex cursor-pointer items-center rounded-md bg-[#E5ECF0] px-3 py-2" id="socIns">
                    <img src="/images/png/constructor/socialIns.png" alt="ins" />
                    <span class="ml-1 text-base max-sm:text-sm">Instagram</span>
                </div>
                <div @click="youVisible = !youVisible" class="flex cursor-pointer items-center rounded-md bg-[#E5ECF0] px-3 py-2" id="socYou">
                    <img src="/images/png/constructor/socialYou.png" alt="Youtube" />
                    <span class="ml-1 text-base max-sm:text-sm">YouTube</span>
                </div>
                <div @click="linVisible = !linVisible" class="flex cursor-pointer items-center rounded-md bg-[#E5ECF0] px-3 py-2" id="socLin">
                    <img src="/images/png/constructor/socialLinkedin.png" alt="Linkedin" />
                    <span class="ml-1 text-base max-sm:text-sm">Linkedin</span>
                </div>
                <div @click="okVisible = !okVisible" class="flex cursor-pointer items-center rounded-md bg-[#E5ECF0] px-3 py-2" id="socOk">
                    <img src="/images/png/constructor/socialOk.png" alt="OK" />
                    <span class="ml-1 text-base max-sm:text-sm">Одноклассники</span>
                </div>
                <div @click="telVisible = !telVisible" class="flex cursor-pointer items-center rounded-md bg-[#E5ECF0] px-3 py-2" id="socTel">
                    <img src="/images/png/constructor/socialTelegram.png" alt="telegram" />
                    <span class="ml-1 text-base max-sm:text-sm">Telegram</span>
                </div>
                <div @click="whaVisible = !whaVisible" class="flex cursor-pointer items-center rounded-md bg-[#E5ECF0] px-3 py-2" id="socWha">
                    <img src="/images/png/constructor/socialWha.png" alt="Whattsapp" />
                    <span class="ml-1 text-base max-sm:text-sm">WhatsApp</span>
                </div>
                <div @click="vibVisible = !vibVisible" class="flex cursor-pointer items-center rounded-md bg-[#E5ECF0] px-3 py-2" id="socViber">
                    <img src="/images/png/constructor/socialViber.png" alt="Viber" />
                    <span class="ml-1 text-base max-sm:text-sm">Viber</span>
                </div>
                <div class="mt-4 text-xs text-gray-500">
                    Instagram - соцсеть принадлежит компании Meta, признанной экстремистской и запрещенной на территории России
                </div>
            </div>

            <!-- Формы для ввода ссылок -->
            <div class="mt-6">
                <!-- Веб-сайт -->
                <div v-show="webVisible" id="webDiv">
                    <div
                        v-for="(link, index) in webLinks"
                        :key="link.id"
                        class="mt-4 flex flex-row items-center gap-4 max-md:flex-col max-md:items-start"
                    >
                        <div class="relative">
                            <div class="absolute top-3 left-2 flex items-center">
                                <img src="/images/png/constructor/socialWeb.png" alt="web" />
                            </div>
                            <input
                                v-model="link.value"
                                type="text"
                                class="link_url link_social w-[450px] rounded-md ring-black/30 max-md:w-full"
                                placeholder="Веб-сайт"
                            />
                            <div class="left_del absolute top-1 left-[415px] h-[34px] w-[2px] bg-black/30"></div>
                            <TrashIcon
                                @click="removeLink(webLinks, index, webVisible, 'web')"
                                custom-class="w-6 h-6 absolute top-2 text-black/50 left_delSvg left-[420px] hover:text-black/30 cursor-pointer"
                            />
                        </div>
                        <span
                            v-if="index === webLinks.length - 1 && webLinks.length < 2"
                            @click="addLink(webLinks, 'web')"
                            class="cursor-pointer text-sm text-[#0066CC] hover:text-[#993300]"
                            >+ еще Веб-сайт</span
                        >
                    </div>
                </div>

                <!-- Email -->
                <div v-show="emailVisible" id="emailDiv">
                    <div
                        v-for="(link, index) in emailLinks"
                        :key="link.id"
                        class="mt-4 flex flex-row items-center gap-4 max-md:flex-col max-md:items-start"
                    >
                        <div class="relative">
                            <div class="absolute top-3 left-2 flex items-center">
                                <img src="/images/png/constructor/socialemail.png" alt="Email" />
                            </div>
                            <input
                                v-model="link.value"
                                type="text"
                                class="link_url link_social w-[450px] rounded-md ring-black/30 max-md:w-full"
                                placeholder="Электронная почта"
                            />
                            <div class="left_del absolute top-1 left-[415px] h-[34px] w-[2px] bg-black/30"></div>
                            <TrashIcon
                                @click="removeLink(emailLinks, index, emailVisible, 'email')"
                                custom-class="w-6 h-6 absolute top-2 text-black/50 left_delSvg left-[420px] hover:text-black/30 cursor-pointer"
                            />
                        </div>
                        <span
                            v-if="index === emailLinks.length - 1 && emailLinks.length < 2"
                            @click="addLink(emailLinks, 'email')"
                            class="cursor-pointer text-sm text-[#0066CC] hover:text-[#993300]"
                            >+ еще Электронная почта</span
                        >
                    </div>
                </div>

                <!-- Instagram -->
                <div v-show="insVisible" id="insDiv">
                    <div
                        v-for="(link, index) in insLinks"
                        :key="link.id"
                        class="mt-4 flex flex-row items-center gap-4 max-md:flex-col max-md:items-start"
                    >
                        <div class="relative">
                            <div class="absolute top-3 left-2 flex items-center">
                                <img src="/images/png/constructor/socialIns.png" alt="Instagram" />
                            </div>
                            <input
                                v-model="link.value"
                                type="text"
                                class="link_url link_social w-[450px] rounded-md ring-black/30 max-md:w-full"
                                placeholder="Instagram"
                            />
                            <div class="left_del absolute top-1 left-[415px] h-[34px] w-[2px] bg-black/30"></div>
                            <TrashIcon
                                @click="removeLink(insLinks, index, insVisible, 'ins')"
                                custom-class="w-6 h-6 absolute top-2 text-black/50 left_delSvg left-[420px] hover:text-black/30 cursor-pointer"
                            />
                        </div>
                        <span
                            v-if="index === insLinks.length - 1 && insLinks.length < 2"
                            @click="addLink(insLinks, 'ins')"
                            class="cursor-pointer text-sm text-[#0066CC] hover:text-[#993300]"
                            >+ еще Instagram</span
                        >
                    </div>
                </div>

                <!-- Вконтакте -->
                <div v-show="vkVisible" id="vkDiv">
                    <div
                        v-for="(link, index) in vkLinks"
                        :key="link.id"
                        class="mt-4 flex flex-row items-center gap-4 max-md:flex-col max-md:items-start"
                    >
                        <div class="relative">
                            <div class="absolute top-3 left-2 flex items-center">
                                <img src="/images/png/constructor/socialVk.png" alt="Vk" />
                            </div>
                            <input
                                v-model="link.value"
                                type="text"
                                class="link_url link_social w-[450px] rounded-md ring-black/30 max-md:w-full"
                                placeholder="Вконтакте"
                            />
                            <div class="left_del absolute top-1 left-[415px] h-[34px] w-[2px] bg-black/30"></div>
                            <TrashIcon
                                @click="removeLink(vkLinks, index, vkVisible, 'vk')"
                                custom-class="w-6 h-6 absolute top-2 text-black/50 left_delSvg left-[420px] hover:text-black/30 cursor-pointer"
                            />
                        </div>
                        <span
                            v-if="index === vkLinks.length - 1 && vkLinks.length < 2"
                            @click="addLink(vkLinks, 'vk')"
                            class="cursor-pointer text-sm text-[#0066CC] hover:text-[#993300]"
                            >+ еще Вконтакте</span
                        >
                    </div>
                </div>

                <!-- YouTube -->
                <div v-show="youVisible" id="YouDiv">
                    <div
                        v-for="(link, index) in youLinks"
                        :key="link.id"
                        class="mt-4 flex flex-row items-center gap-4 max-md:flex-col max-md:items-start"
                    >
                        <div class="relative">
                            <div class="absolute top-3 left-2 flex items-center">
                                <img src="/images/png/constructor/socialYou.png" alt="YouTube" />
                            </div>
                            <input
                                v-model="link.value"
                                type="text"
                                class="link_url link_social w-[450px] rounded-md ring-black/30 max-md:w-full"
                                placeholder="YouTube"
                            />
                            <div class="left_del absolute top-1 left-[415px] h-[34px] w-[2px] bg-black/30"></div>
                            <TrashIcon
                                @click="removeLink(youLinks, index, youVisible, 'you')"
                                custom-class="w-6 h-6 absolute top-2 text-black/50 left_delSvg left-[420px] hover:text-black/30 cursor-pointer"
                            />
                        </div>
                        <span
                            v-if="index === youLinks.length - 1 && youLinks.length < 2"
                            @click="addLink(youLinks, 'you')"
                            class="cursor-pointer text-sm text-[#0066CC] hover:text-[#993300]"
                            >+ еще YouTube</span
                        >
                    </div>
                </div>

                <!-- Linkedin -->
                <div v-show="linVisible" id="linDiv">
                    <div
                        v-for="(link, index) in linLinks"
                        :key="link.id"
                        class="mt-4 flex flex-row items-center gap-4 max-md:flex-col max-md:items-start"
                    >
                        <div class="relative">
                            <div class="absolute top-3 left-2 flex items-center">
                                <img src="/images/png/constructor/socialLinkedin.png" alt="Linkedin" />
                            </div>
                            <input
                                v-model="link.value"
                                type="text"
                                class="link_url link_social w-[450px] rounded-md ring-black/30 max-md:w-full"
                                placeholder="Linkedin"
                            />
                            <div class="left_del absolute top-1 left-[415px] h-[34px] w-[2px] bg-black/30"></div>
                            <TrashIcon
                                @click="removeLink(linLinks, index, linVisible, 'lin')"
                                custom-class="w-6 h-6 absolute top-2 text-black/50 left_delSvg left-[420px] hover:text-black/30 cursor-pointer"
                            />
                        </div>
                        <span
                            v-if="index === linLinks.length - 1 && linLinks.length < 2"
                            @click="addLink(linLinks, 'lin')"
                            class="cursor-pointer text-sm text-[#0066CC] hover:text-[#993300]"
                            >+ еще Linkedin</span
                        >
                    </div>
                </div>

                <!-- Одноклассники -->
                <div v-show="okVisible" id="okDiv">
                    <div
                        v-for="(link, index) in okLinks"
                        :key="link.id"
                        class="mt-4 flex flex-row items-center gap-4 max-md:flex-col max-md:items-start"
                    >
                        <div class="relative">
                            <div class="absolute top-3 left-2 flex items-center">
                                <img src="/images/png/constructor/socialOk.png" alt="OK" />
                            </div>
                            <input
                                v-model="link.value"
                                type="text"
                                class="link_url link_social w-[450px] rounded-md ring-black/30 max-md:w-full"
                                placeholder="Одноклассники"
                            />
                            <div class="left_del absolute top-1 left-[415px] h-[34px] w-[2px] bg-black/30"></div>
                            <TrashIcon
                                @click="removeLink(okLinks, index, okVisible, 'ok')"
                                custom-class="w-6 h-6 absolute top-2 text-black/50 left_delSvg left-[420px] hover:text-black/30 cursor-pointer"
                            />
                        </div>
                        <span
                            v-if="index === okLinks.length - 1 && okLinks.length < 2"
                            @click="addLink(okLinks, 'ok')"
                            class="cursor-pointer text-sm text-[#0066CC] hover:text-[#993300]"
                            >+ еще Одноклассники</span
                        >
                    </div>
                </div>

                <!-- Telegram -->
                <div v-show="telVisible" id="telDiv">
                    <div
                        v-for="(link, index) in telLinks"
                        :key="link.id"
                        class="mt-4 flex flex-row items-center gap-4 max-md:flex-col max-md:items-start"
                    >
                        <div class="relative">
                            <div class="absolute top-3 left-2 flex items-center">
                                <img src="/images/png/constructor/socialTelegram.png" alt="Telegram" />
                            </div>
                            <input
                                v-model="link.value"
                                type="text"
                                class="link_url link_social w-[450px] rounded-md ring-black/30 max-md:w-full"
                                placeholder="Telegram"
                            />
                            <div class="left_del absolute top-1 left-[415px] h-[34px] w-[2px] bg-black/30"></div>
                            <TrashIcon
                                @click="removeLink(telLinks, index, telVisible, 'tel')"
                                custom-class="w-6 h-6 absolute top-2 text-black/50 left_delSvg left-[420px] hover:text-black/30 cursor-pointer"
                            />
                        </div>
                        <span
                            v-if="index === telLinks.length - 1 && telLinks.length < 2"
                            @click="addLink(telLinks, 'tel')"
                            class="cursor-pointer text-sm text-[#0066CC] hover:text-[#993300]"
                            >+ еще Telegram</span
                        >
                    </div>
                </div>

                <!-- WhatsApp -->
                <div v-show="whaVisible" id="whaDiv">
                    <div
                        v-for="(link, index) in whaLinks"
                        :key="link.id"
                        class="mt-4 flex flex-row items-center gap-4 max-md:flex-col max-md:items-start"
                    >
                        <div class="relative">
                            <div class="absolute top-3 left-2 flex items-center">
                                <img src="/images/png/constructor/socialWha.png" alt="WhatsApp" />
                            </div>
                            <input
                                v-model="link.value"
                                type="text"
                                class="link_url link_social w-[450px] rounded-md ring-black/30 max-md:w-full"
                                placeholder="WhatsApp"
                            />
                            <div class="left_del absolute top-1 left-[415px] h-[34px] w-[2px] bg-black/30"></div>
                            <TrashIcon
                                @click="removeLink(whaLinks, index, whaVisible, 'wha')"
                                custom-class="w-6 h-6 absolute top-2 text-black/50 left_delSvg left-[420px] hover:text-black/30 cursor-pointer"
                            />
                        </div>
                        <span
                            v-if="index === whaLinks.length - 1 && whaLinks.length < 2"
                            @click="addLink(whaLinks, 'wha')"
                            class="cursor-pointer text-sm text-[#0066CC] hover:text-[#993300]"
                            >+ еще WhatsApp</span
                        >
                    </div>
                </div>

                <!-- Viber -->
                <div v-show="vibVisible" id="vibDiv">
                    <div
                        v-for="(link, index) in vibLinks"
                        :key="link.id"
                        class="mt-4 flex flex-row items-center gap-4 max-md:flex-col max-md:items-start"
                    >
                        <div class="relative">
                            <div class="absolute top-3 left-2 flex items-center">
                                <img src="/images/png/constructor/socialViber.png" alt="Viber" />
                            </div>
                            <input
                                v-model="link.value"
                                type="text"
                                class="link_url link_social w-[450px] rounded-md ring-black/30 max-md:w-full"
                                placeholder="Viber"
                            />
                            <div class="left_del absolute top-1 left-[415px] h-[34px] w-[2px] bg-black/30"></div>
                            <TrashIcon
                                @click="removeLink(vibLinks, index, vibVisible, 'vib')"
                                custom-class="w-6 h-6 absolute top-2 text-black/50 left_delSvg left-[420px] hover:text-black/30 cursor-pointer"
                            />
                        </div>
                        <span
                            v-if="index === vibLinks.length - 1 && vibLinks.length < 2"
                            @click="addLink(vibLinks, 'vib')"
                            class="cursor-pointer text-sm text-[#0066CC] hover:text-[#993300]"
                            >+ еще Viber</span
                        >
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
