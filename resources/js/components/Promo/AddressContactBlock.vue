<script setup lang="ts">
import DeleteIcon from '@/components/primitives/icons/DeleteIcon.vue';
import LocationPinIcon from '@/components/primitives/icons/LocationPinIcon.vue';
import VerticalDivider from '@/components/primitives/VerticalDivider.vue';
import type { AddressData } from '@/types/address/AddressData';
import { computed } from 'vue';

const phoneMask = '+{7} (000) 000-00-00';

interface Props {
    modelValue: AddressData[];
}

const props = withDefaults(defineProps<Props>(), {
    modelValue: () => [],
});

const emit = defineEmits<{
    'update:modelValue': [value: AddressData[]];
}>();

const addresses = computed({
    get: () => props.modelValue,
    set: (value: AddressData[]) => emit('update:modelValue', value),
});

function updateAddress(index: number, field: keyof AddressData, value: string | undefined) {
    const updated = [...addresses.value];

    if (!updated[index]) {
        updated[index] = { address: '', schedule: '', phone: '' };
    }

    if (value === undefined) {
        const newObj = { ...updated[index] };
        delete newObj[field];
        updated[index] = newObj;
    } else {
        updated[index] = { ...updated[index], [field]: value };
    }

    addresses.value = updated;
}

function addAddress() {
    const updated = [...addresses.value];
    updated.push({ address: '', schedule: '', phone: '' });
    addresses.value = updated;
}

function removeAddress(index: number) {
    const updated = [...addresses.value];
    updated.splice(index, 1);
    addresses.value = updated;
}

if (addresses.value.length === 0) {
    addAddress();
}
</script>

<template>
    <div class="mt-8 flex flex-col rounded-2xl bg-white p-8 max-md:p-4" id="desyatyi">
        <h3 class="text-base font-bold">Укажите в блоке: график работы, адрес и телефоны</h3>
        <p class="all_text text-black/50">для одной акции можно заполнить не более 4-х блоков</p>

        <div v-for="(address, index) in addresses" :key="index" class="mt-5 h-full w-full rounded-lg bg-slate-100">
            <div class="flex justify-between p-6">
                <div class="flex items-center gap-1">
                    <LocationPinIcon />
                    <span class="text-base font-bold">Адрес {{ index + 1 }}</span>
                </div>
                <DeleteIcon v-if="index > 0" @click="removeAddress(index)" class="cursor-pointer" />
            </div>
            <div class="h-px w-full bg-black/10"></div>
            <div class="flex w-full flex-row flex-wrap items-center p-6 max-md:flex-col">
                <div class="flex w-full flex-col p-3 max-md:w-full md:w-1/2">
                    <label :for="`address-${index}`" class="mb-2 text-sm font-bold">Адрес</label>
                    <input
                        :id="`address-${index}`"
                        type="text"
                        :value="address.address"
                        @input="updateAddress(index, 'address', ($event.target as HTMLInputElement).value)"
                        class="rounded-md border-none"
                        placeholder="Москва, проспект Мира 82 корпус 1"
                    />
                </div>
                <div class="flex w-full flex-col p-3 max-md:w-full md:w-1/2">
                    <label :for="`schedule-${index}`" class="mb-2 text-sm font-bold">График работы:</label>
                    <input
                        :id="`schedule-${index}`"
                        type="text"
                        :value="address.schedule"
                        @input="updateAddress(index, 'schedule', ($event.target as HTMLInputElement).value)"
                        class="rounded-md border-none"
                        placeholder="пн-сб:с 10.00 до 20.00 вс с 10.00 до 16.00"
                    />
                </div>
                <div class="flex w-full flex-col p-3 max-md:w-full md:w-1/2">
                    <label :for="`phone-${index}`" class="mb-2 text-sm font-bold">Телефон</label>
                    <input
                        :id="`phone-${index}`"
                        v-imask="phoneMask"
                        type="tel"
                        :value="address.phone"
                        @input="updateAddress(index, 'phone', ($event.target as HTMLInputElement).value)"
                        class="rounded-md border-none"
                        placeholder="+7 (000) 000-00-00"
                    />
                </div>
                <div v-if="address.phone2" class="relative w-full flex-col p-3 max-md:w-full md:w-1/2">
                    <label :for="`phone2-${index}`" class="mb-2 text-sm font-bold">Телефон 2</label>
                    <div class="relative">
                        <input
                            :id="`phone2-${index}`"
                            v-imask="phoneMask"
                            type="tel"
                            :value="address.phone2"
                            @input="updateAddress(index, 'phone2', ($event.target as HTMLInputElement).value)"
                            class="rounded-md border-none pr-10"
                            placeholder="+7 (000) 000-00-00"
                        />
                        <VerticalDivider custom-class="right-12 bottom-4" />
                        <DeleteIcon @click="updateAddress(index, 'phone2', undefined)" custom-class="absolute bottom-5 right-5 cursor-pointer" />
                    </div>
                </div>
                <span
                    v-if="!address.phone2"
                    @click="updateAddress(index, 'phone2', '+7 (')"
                    class="mt-6 ml-6 cursor-pointer text-sm font-bold text-blue-400 hover:border-b-2 hover:border-dashed hover:border-blue-400"
                    >+ еще телефон</span
                >
            </div>
        </div>

        <div v-if="addresses.length < 4" class="flex justify-center">
            <p
                @click="addAddress"
                class="mt-5 cursor-pointer text-center text-sm font-bold text-blue-400 hover:border-b-2 hover:border-dashed hover:border-blue-400"
            >
                Добавить еще организацию
            </p>
        </div>
    </div>
</template>
