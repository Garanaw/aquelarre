import { createApp } from 'vue';
import PrimeVue from 'primevue/config';
import App from './classic/App.vue';
import Aura from '@primevue/themes/aura';
import Nora from '@primevue/themes/nora';
import 'primeicons/primeicons.css';

import '../../../../bootstrap.js';

const app = createApp(App);
app.use(PrimeVue, {
    theme: {
        preset: Nora,
        options: {
            darkModeSelector: '.dark',
        }
    },
});
app.mount('#create-character-classic');
