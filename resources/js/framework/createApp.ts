import { createApp } from 'vue';
import Application from './Application';
import ErrorHandler from './Exceptions/Handler';
import { DiceRoller } from '@dice-roller/rpg-dice-roller';

const container: Application = new Application();

// @ts-ignore
container.errorHandler(ErrorHandler);

const createMyApp = (options: {}) => {
    const app = createApp(options)

    app.config.errorHandler = (error: any, vm: any, info: any) => container.vueError(error, vm, info);
    app.config.globalProperties.$container = container;
    app.config.globalProperties.$dice = new DiceRoller();

    return app
}

export default createMyApp;
