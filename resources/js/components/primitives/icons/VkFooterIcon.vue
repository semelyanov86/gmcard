<script setup lang="ts">
interface Props {
    customClass?: string;
}

const props = withDefaults(defineProps<Props>(), {
    customClass: '',
});
</script>

<template>
    <svg
        xmlns="http://www.w3.org/2000/svg"
        xml:space="preserve"
        :class="['h-5 w-5', props.customClass]"
        viewBox="0 0 3.12 3.12"
    >
        <path
            fill="currentColor"
            d="M2.22 1.56c0.15,-0.14 0.2,-0.12 0.36,-0.35 0.08,-0.1 0.2,-0.32 0.21,-0.48l-0.42 0c-0.11,0.29 -0.32,0.62 -0.64,0.66l0 -0.66 -0.42 0 -0.01 1.15c-0.23,-0.07 -0.36,-0.23 -0.46,-0.42 -0.13,-0.27 -0.12,-0.42 -0.15,-0.73l-0.45 0c-0.03,0.19 0.04,0.52 0.1,0.69 0.19,0.62 0.64,0.97 1.39,0.97l0 -0.59c0.2,0.02 0.35,0.1 0.45,0.21 0.43,0.44 -0.05,0.38 0.71,0.38 -0.04,-0.19 -0.16,-0.39 -0.26,-0.5 -0.2,-0.24 -0.35,-0.28 -0.41,-0.33z"
        />
    </svg>
</template>

