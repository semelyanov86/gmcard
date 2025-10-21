<script setup lang="ts">
interface Props {
    customClass?: string;
}

const props = withDefaults(defineProps<Props>(), {
    customClass: '',
});
</script>

<template>
    <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" :class="['h-5 w-5', props.customClass]" viewBox="0 0 11.6 11.6">
        <g>
            <path
                fill="currentColor"
                d="M4.58 9.44c0.22,0 0.32,-0.11 0.45,-0.23 0.2,-0.19 2.72,-2.64 2.72,-2.64l-1.55 -0.38 -1.44 0.91 -0.18 2.26 0 0.08z"
            />
            <path
                fill="currentColor"
                d="M4.73 7.13l3.66 2.7c0.41,0.22 0.72,0.11 0.82,-0.39l1.49 -7.02c0.15,-0.61 -0.23,-0.88 -0.63,-0.7l-8.75 3.37c-0.59,0.24 -0.59,0.58 -0.1,0.72l2.24 0.7 5.2 -3.27c0.24,-0.15 0.47,-0.07 0.29,0.1l-4.22 3.79z"
            />
        </g>
    </svg>
</template>

