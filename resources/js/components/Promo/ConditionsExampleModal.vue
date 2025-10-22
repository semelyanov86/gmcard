<script setup lang="ts">
import CloseIcon from '@/components/primitives/icons/CloseIcon.vue';
interface Props {
    isOpen?: boolean;
}

withDefaults(defineProps<Props>(), {
    isOpen: false,
});

const emit = defineEmits<{
    close: [];
}>();

function closeModal() {
    emit('close');
}
</script>

<template>
    <div v-show="isOpen" class="fixed top-0 left-0 z-50 flex h-full w-full items-start justify-center bg-black/50 py-5" @click="closeModal">
        <div @click.stop class="relative max-h-[80vh] w-full max-w-4xl overflow-y-auto rounded-md border-4 border-blue-600 bg-white p-2">
            <div class="flex flex-col gap-4">
                <div class="flex items-start justify-between rounded-t border-b bg-blue-700 p-4 dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-white">Пример вопросов</h3>
                    <CloseIcon @click="closeModal" custom-class="w-6 h-6 hover:bg-black/50 hover:text-white cursor-pointer text-white" />
                </div>
                <div class="space-y-4 p-3 sm:p-6">
                    <p class="text-center text-base font-semibold text-gray-700 dark:text-gray-300">
                        Пункты раздела «дополнительные условия» отображаются здесь:
                    </p>

                    <div class="flex justify-center">
                        <img
                            src="/images/png/constructor/img-doc.png"
                            alt="Пример документа"
                            class="max-h-64 max-w-md rounded-md border object-contain shadow-md"
                        />
                    </div>

                    <p class="text-gray-700 dark:text-gray-300">
                        В данном блоке необходимо указывать все дополнительные условия, чтобы не вводить пользователей в заблуждение.
                    </p>

                    <p class="text-gray-700 dark:text-gray-300">
                        Когда, например, при создании акции вы заполняете такие блоки как «код для скидки», «минимальная сумма заказа», «бесплатная
                        доставка» и т.д., то данный блок включается автоматически и там прописываются дополнительные условия, которые будут отображены
                        в акции. Вы можете редактировать данный блок самостоятельно, кратко, но не злоупотребляя им.
                    </p>

                    <p class="font-semibold text-gray-700 dark:text-gray-300">В качестве примера несколько условий:</p>

                    <ul class="list-inside list-disc space-y-1 text-gray-700 dark:text-gray-300">
                        <li>Минимальная сумма 10 000 рублей</li>
                        <li>В конкурсе могут участвовать только лица, достигшие 18 лет и имеющие художественное образование</li>
                        <li>Сделай покупку на сумму свыше 60 000 рублей и используй промокод чтобы получить кэшбэк 10%</li>
                        <li>Соверши покупку на сумму от 10 000 рублей и получи сумочку из натуральной кожи в подарок</li>
                        <li>Сделай покупку на сумму свыше 60 000 рублей и используй промокод чтобы получить скидку 10 000 рублей</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>
