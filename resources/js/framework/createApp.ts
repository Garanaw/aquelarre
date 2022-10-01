import { createApp } from 'vue';
import { DiceRoller } from '@dice-roller/rpg-dice-roller';
import Application from './Application';
import ErrorHandler from './Exceptions/Handler';
import { Store } from 'jeloquent';
import BootstrapServiceProvider from './BootstrapServiceProvider';

const container: Application = new Application();

// @ts-ignore
window.globalThis = {
    Store: new Store(),
}

container.errorHandler(ErrorHandler);
container.register(BootstrapServiceProvider);

const dice = new DiceRoller();

const createMyApp = (options: {}, providers: any[] = []) => {
    const app = createApp(options)

    app.config.errorHandler = (error: any, vm: any, info: any) => container.vueError(error, vm, info);

    providers.forEach((provider: any) => {
        container.register(provider);
    });

    container.bootProviders();
    app.provide('$container', container);
    app.provide('$dice', dice);

    return app
}

export default createMyApp;
