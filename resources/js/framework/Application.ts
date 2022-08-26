import Container from 'laravel-micro.js/src/Container';

export default class Application extends Container
{
    constructor() {
        super();
    }

    vueError(error: any, vm: any, info: any) {
        super._errorHandler?.vue(error, vm, info);
        console.error(error, vm, info);
    }

    errorHandler(errorHandler: any) {
        super.errorHandler(errorHandler);
    }

    register(serviceProvider: any) {
        super.register(serviceProvider);
    }

    bootProviders() {
        super.bootProviders();
    }

    resolveProvider(provider: any) {
        return new provider(this);
    }
}
