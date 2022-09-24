import createApp from '../../../../framework/createApp';
import { library } from '@fortawesome/fontawesome-svg-core';
import { faMars, faVenus, faCheck } from '@fortawesome/free-solid-svg-icons';
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";

library.add(faMars);
library.add(faVenus);
library.add(faCheck);

export default function (component) {
    createApp(component)
        .component('FontAwesomeIcon', FontAwesomeIcon)
        .mount('#app');
}
