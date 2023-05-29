import Exception from './Exception';

export default class VoidException extends Exception {
    message: string = 'Void exception';

    constructor(message, code = 500) {
        super(message, code);
    }
}