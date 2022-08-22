import Container from 'laravel-micro.js/src/Container';

export default class Application extends Container {
    constructor() {
        super();
    }

    vueError(error: any, vm: any, info: any) {
        super._errorHandler.vue(error, vm, info);
    }
}
