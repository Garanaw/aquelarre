import { createApp } from 'vue';
import { DiceRoller } from '@dice-roller/rpg-dice-roller';
import Application from './Application';
import { $CONTAINER, $DICE } from './injections';
import ErrorHandler from './Exceptions/Handler';
import EloquentServiceProvider from './database/eloquent/domain/EloquentServiceProvider';
import ServiceProvider from "laravel-micro.js/src/Support/ServiceProvider";

const container: Application = new Application();

container.setErrorHandler(ErrorHandler);
container.register(EloquentServiceProvider);

const dice = new DiceRoller();

export default function createMyApp(options: {}, providers: typeof ServiceProvider[]) {
    const app = createApp(options);

    app.config.errorHandler = (error: any, vm: any, info: any) => container.vueError(error, vm, info);

    providers.forEach((provider: typeof ServiceProvider) => {
        container.register(provider);
    });

    container.bootProviders();
    app.provide($CONTAINER, container);
    app.provide($DICE, dice);

    return app
}
