import createApp from '../../../../framework/createApp';
import { library } from '@fortawesome/fontawesome-svg-core';
import { faMars, faVenus, faCheck } from '@fortawesome/free-solid-svg-icons';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import SectionsSetServiceProvider from '../../domain/providers/SectionsSetServiceProvider';
import ServiceProvider from 'laravel-micro.js/src/Support/ServiceProvider';

library.add(faMars);
library.add(faVenus);
library.add(faCheck);

export default function (component) {
    const providers: (typeof ServiceProvider)[] = [
        SectionsSetServiceProvider,
    ];

    createApp(component, providers)
        .component('FontAwesomeIcon', FontAwesomeIcon)
        .mount('#app');
}
