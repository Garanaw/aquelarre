import { createApp } from 'vue';
import { DiceRoller } from '@dice-roller/rpg-dice-roller';
import Application from './Application';
import ErrorHandler from './Exceptions/Handler';
import { Store } from 'jeloquent';
import EloquentServiceProvider from './eloquent/domain/EloquentServiceProvider';

const container: Application = new Application();

// @ts-ignore
window.globalThis = {
    Store: new Store(),
}

container.errorHandler(ErrorHandler);
container.register(EloquentServiceProvider);
container.bootProviders();

const dice = new DiceRoller();

const createMyApp = (options: {}) => {
    const app = createApp(options)

    app.config.errorHandler = (error: any, vm: any, info: any) => container.vueError(error, vm, info);
    app.provide('$container', container);
    app.provide('$dice', dice);

    return app
}

export default createMyApp;
