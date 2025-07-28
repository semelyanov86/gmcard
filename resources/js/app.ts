import '../css/app.css';

import '../css/bootstrap.min.css';
import '../css/font-awesome.min.css';
import '../css/style.css';

import '@splidejs/splide/dist/css/splide.min.css';

import '../css/bootstrap.min.css';
import '../css/font-awesome.min.css';
import '../css/style.css';

import '@splidejs/splide/dist/css/splide.min.css';

import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import type { DefineComponent } from 'vue';
import { createApp, h } from 'vue';
import { ZiggyVue } from 'ziggy-js';
import { initializeTheme } from './composables/useAppearance';

import { toastOptions } from '@/plugins/toastOptions';
import Toast from 'vue-toastification';

import 'vue-toastification/dist/index.css';

import { createHead } from '@vueuse/head';

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
    title: (title) => (title ? `${title} - ${appName}` : appName),
    resolve: (name) => resolvePageComponent(`./pages/${name}.vue`, import.meta.glob<DefineComponent>('./pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        const head = createHead();
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(head)
            .use(ZiggyVue)
            .use(Toast, toastOptions)
            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});

// This will set light / dark mode on page load...
initializeTheme();
