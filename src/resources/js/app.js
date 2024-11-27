import './bootstrap';
import '../css/app.css';
// import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy';
import { createApp, h } from 'vue/dist/vue.esm-bundler.js';


const appName = import.meta.env.VITE_APP_NAME || 'Laravel';



// Import Vue and your custom component
import AdminPage from './Pages/Admin.vue';

// Create a new Vue instance for your custom component
const customApp = createApp({});

// Register the custom component
customApp.component('admin-page', AdminPage);

// Mount the custom Vue instance to a specific DOM element
customApp.mount('#custom-app');

// Debugging: Log Vue instance initialization
console.log('Custom Vue app initialized');


createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        return createApp({
            render: () => h(App, props),
        })
            .use(plugin)
            .use(ZiggyVue)
            .mount(el);
    },

    progress: {
        color: '#4B5563',
    },
});

