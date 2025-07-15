declare module '@splidejs/vue-splide' {
    import type { DefineComponent } from 'vue';

    export const Splide: DefineComponent<{ options?: object }>;
    export const SplideSlide: DefineComponent<HTMLAttributes>;
}
