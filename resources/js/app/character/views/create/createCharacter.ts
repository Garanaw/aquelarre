import createApp from '../../../../framework/createApp';
import { library } from '@fortawesome/fontawesome-svg-core';
import { faMars, faVenus, faCheck } from '@fortawesome/free-solid-svg-icons';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import SectionsSetServiceProvider from '../../domain/providers/SectionsSetServiceProvider';

library.add(faMars);
library.add(faVenus);
library.add(faCheck);

const providers = [
    SectionsSetServiceProvider,
];

export default function (component) {
    createApp(component, providers)
        .component('FontAwesomeIcon', FontAwesomeIcon)
        .mount('#app');
}
