<script setup lang="ts">
interface Props {
    isOpen?: boolean;
}

withDefaults(defineProps<Props>(), {
    isOpen: false,
});

const emit = defineEmits<{
    'close': [];
}>();

function closeModal() {
    emit('close');
}
</script>

<template>
    <div 
        v-show="isOpen" 
        class="fixed bg-black/50 z-50 top-0 left-0 w-full h-full flex items-start justify-center py-5" 
        @click="closeModal"
    >
        <div 
            @click.stop 
            class="p-2 bg-white rounded-md border-4 border-[#2578cf] relative w-full max-w-4xl max-h-[80vh] overflow-y-auto"
        >
            <div class="flex flex-col gap-4">
                <div class="flex items-start justify-between bg-[#0066cb] p-4 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-white">Пример вопросов</h3>
                    <svg 
                        @click="closeModal" 
                        xmlns="http://www.w3.org/2000/svg" 
                        class="w-6 h-6 hover:bg-black/50 hover:text-white cursor-pointer text-white" 
                        fill="none" 
                        viewBox="0 0 24 24" 
                        stroke-width="1.5" 
                        stroke="currentColor"
                    >
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </div>

                <!-- Контент -->
                <div class="p-3 sm:p-6 space-y-4">
                    <p class="text-base text-gray-700 dark:text-gray-300 font-semibold text-center">
                        Пункты раздела «дополнительные условия» отображаются здесь:
                    </p>

                    <div class="flex justify-center">
                        <img src="/images/png/constructor/img-doc.png" alt="Пример документа" class="rounded-md border shadow-md max-w-md max-h-64 object-contain">
                    </div>

                    <p class="text-gray-700 dark:text-gray-300">
                        В данном блоке необходимо указывать все дополнительные условия, чтобы не вводить пользователей в заблуждение.
                    </p>

                    <p class="text-gray-700 dark:text-gray-300">
                        Когда, например, при создании акции вы заполняете такие блоки как «код для скидки», «минимальная сумма заказа», «бесплатная доставка» и т.д., то данный блок включается автоматически и там прописываются дополнительные условия, которые будут отображены в акции. Вы можете редактировать данный блок самостоятельно, кратко, но не злоупотребляя им.
                    </p>

                    <p class="text-gray-700 dark:text-gray-300 font-semibold">
                        В качестве примера несколько условий:
                    </p>

                    <ul class="list-disc list-inside text-gray-700 dark:text-gray-300 space-y-1">
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

