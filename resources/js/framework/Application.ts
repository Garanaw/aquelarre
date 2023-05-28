import Container from 'laravel-micro.js/src/Container';
import ErrorHandler from './Exceptions/Handler';

/**
 * @template T
 * @method T make(string name)
 */
export default class Application extends Container
{
    constructor() {
        super();
    }

    vueError(error: any, vm: any, info: any) {
        if (this.errorHandler instanceof ErrorHandler) {
            this.errorHandler?.vue(error, vm, info);
        }
        console.error(error, vm, info);
    }

    resolveProvider(provider: any) {
        return new provider(this);
    }
}
