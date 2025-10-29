<script setup lang="ts">
import type { ScheduleModel, WeekdayModel } from '@/types';
import { ref, watch } from 'vue';
import Input from '@/components/primitives/Input.vue';
import ToggleSwitch from './ToggleSwitch.vue';

const props = defineProps<{
    weekdays: WeekdayModel[];
    modelValue: ScheduleModel;
}>();

const emit = defineEmits<{
    'update:modelValue': [value: ScheduleModel];
}>();

const isEnabled = ref(props.modelValue.enabled);
const selectedDayCodes = ref<string[]>([...props.modelValue.days]);
const timeRangeEnabled = ref(props.modelValue.timeRange.enabled);

const parseTime = (timeString: string) => {
    const [hours = '00', minutes = '00'] = timeString.split(':');
    return { hours, minutes };
};

const startTime = parseTime(props.modelValue.timeRange.start);
const endTime = parseTime(props.modelValue.timeRange.end);

const startHours = ref(startTime.hours);
const startMinutes = ref(startTime.minutes);
const endHours = ref(endTime.hours);
const endMinutes = ref(endTime.minutes);

function toggleDay(dayCode: string) {
    const index = selectedDayCodes.value.indexOf(dayCode);
    if (index === -1) {
        selectedDayCodes.value.push(dayCode);
    } else {
        selectedDayCodes.value.splice(index, 1);
    }
    emitChanges();
}

function isDaySelected(dayCode: string) {
    return selectedDayCodes.value.includes(dayCode);
}

function emitChanges() {
    emit('update:modelValue', {
        enabled: isEnabled.value,
        days: selectedDayCodes.value,
        timeRange: {
            enabled: timeRangeEnabled.value,
            start: `${startHours.value}:${startMinutes.value}`,
            end: `${endHours.value}:${endMinutes.value}`,
        },
    });
}

watch([isEnabled, timeRangeEnabled, startHours, startMinutes, endHours, endMinutes], () => {
    emitChanges();
});

watch(isEnabled, (newValue) => {
    if (!newValue) {
        selectedDayCodes.value = [];
        timeRangeEnabled.value = false;
        startHours.value = '00';
        startMinutes.value = '00';
        endHours.value = '00';
        endMinutes.value = '00';
    }
});

watch(timeRangeEnabled, (newValue) => {
    if (!newValue) {
        startHours.value = '00';
        startMinutes.value = '00';
        endHours.value = '00';
        endMinutes.value = '00';
    }
});
</script>

<template>
    <div class="mt-8 flex flex-col rounded-2xl bg-white p-8 max-md:p-4">
        <div class="flex flex-row items-start max-md:flex-col max-md:items-start">
            <div class="max-md:mb-4">
                <h3 class="font-bold">Если ваша акция доступна только в определенные дни и часы.</h3>
                <p class="all_text text-black/50">
                    Общий отсчет времени до конца акции не прекратится, она так же будет находится на сайте, но пользователи смогут перейти в нее
                    только в указанные вами дни и часы.
                </p>
            </div>
            <ToggleSwitch v-model="isEnabled" class="ml-10 max-md:ml-0" />
        </div>
        <div v-show="isEnabled" class="mt-5">
            <div class="h-px w-full bg-black/20"></div>
            <div class="mt-5 flex flex-row items-center gap-3 max-md:flex-col max-md:items-start">
                <div class="flex items-center gap-2">
                    <label class="font-bold">Акция доступна в</label>
                </div>
                <ul class="flex flex-wrap items-center gap-2">
                    <li
                        v-for="day in weekdays"
                        :key="day.id"
                        @click="isEnabled ? toggleDay(day.id) : null"
                        class="rounded-md px-3 py-2"
                        :class="[
                            !isEnabled ? 'cursor-not-allowed opacity-50' : 'cursor-pointer',
                            isDaySelected(day.id) ? 'bg-blue-500 text-white' : 'bg-slate-100 hover:bg-blue-200',
                        ]"
                    >
                        {{ day.label }}
                    </li>
                </ul>
            </div>
            <div class="mt-5 flex flex-row items-center gap-3 max-md:flex-col max-md:items-start">
                <div class="flex items-center gap-2">
                    <input
                        v-model="timeRangeEnabled"
                        type="checkbox"
                        :disabled="!isEnabled"
                        class="rounded-md"
                        :class="{ 'cursor-not-allowed opacity-50': !isEnabled }"
                    />
                    <label class="font-bold" :class="{ 'opacity-50': !isEnabled }">Акция доступна с</label>
                </div>
                <div v-if="timeRangeEnabled" class="flex items-center gap-3">
                    <div class="flex items-center gap-2">
                        <Input
                            v-model="startHours"
                            type="text"
                            :disabled="!isEnabled || !timeRangeEnabled"
                            placeholder="00"
                            maxlength="2"
                            class="w-11"
                        />
                        <span>:</span>
                        <Input
                            v-model="startMinutes"
                            type="text"
                            :disabled="!isEnabled || !timeRangeEnabled"
                            placeholder="00"
                            maxlength="2"
                            class="w-11"
                        />
                    </div>
                    <span>- до</span>
                    <div class="flex items-center gap-2">
                        <Input
                            v-model="endHours"
                            type="text"
                            :disabled="!isEnabled || !timeRangeEnabled"
                            placeholder="00"
                            maxlength="2"
                            class="w-11"
                        />
                        <span>:</span>
                        <Input
                            v-model="endMinutes"
                            type="text"
                            :disabled="!isEnabled || !timeRangeEnabled"
                            placeholder="00"
                            maxlength="2"
                            class="w-11"
                        />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
