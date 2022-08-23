import { createApp } from 'vue';
import Application from './Application';
import ErrorHandler from './Exceptions/Handler';
import { DiceRoller } from '@dice-roller/rpg-dice-roller';

const container: Application = new Application();

// @ts-ignore
container.errorHandler(ErrorHandler);
const dice = new DiceRoller();

const createMyApp = (options: {}) => {
    const app = createApp(options)

    app.config.errorHandler = (error: any, vm: any, info: any) => container.vueError(error, vm, info);
    app.provide('$container', container);
    app.provide('$dice', dice);

    return app
}

export default createMyApp;
