import createApp from '../../../../framework/createApp';
import App from './classic/App.vue';
import { library } from '@fortawesome/fontawesome-svg-core';
import { faMars, faVenus } from '@fortawesome/free-solid-svg-icons';
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";

library.add(faMars);
library.add(faVenus);

createApp(App)
    .component('FontAwesomeIcon', FontAwesomeIcon)
    .mount('#app');
