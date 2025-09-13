import { createApp } from 'vue';
import PrimeVue from 'primevue/config';
import App from './classic/App.vue';
import Aura from '@primevue/themes/aura';
import Nora from '@primevue/themes/nora';
import 'primeicons/primeicons.css';

import '../../../../bootstrap.js';
import {createPinia} from "pinia";

const app = createApp(App);
const pinia = createPinia();
app.use(PrimeVue, {
    ripple: true,
    theme: {
        preset: Aura,
        options: {
            darkModeSelector: '.dark',
        }
    },
});
app.use(pinia);
app.mount('#create-character-classic');
