import { createApp } from 'vue';
import { DiceRoller } from '@dice-roller/rpg-dice-roller';
import Application from './Application';
import ErrorHandler from './Exceptions/Handler';
import EloquentServiceProvider from './database/eloquent/domain/EloquentServiceProvider';

const container: Application = new Application();

container.errorHandler(ErrorHandler);
container.register(EloquentServiceProvider);

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
