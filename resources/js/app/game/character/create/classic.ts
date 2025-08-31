import { createApp } from 'vue';
import PrimeVue from 'primevue/config';
import App from './classic/App.vue';
import Aura from '@primevue/themes/aura'
import 'primeicons/primeicons.css';

const app = createApp(App);
app.use(PrimeVue, {
    theme: {
        preset: Aura,
        options: {
            darkModeSelector: '.dark',
        }
    },
});
app.mount('#create-character-classic');
