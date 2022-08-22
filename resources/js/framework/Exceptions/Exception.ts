import { Exception as BaseException } from 'laravel-micro.js/src/Exceptions/Exception';

export default class Exception extends BaseException {
    constructor(message: string, code: number) {
        super(message, code);

        Object.defineProperty(this, 'message', {
            configurable: true,
            enumerable: false,
            value: message,
            writable: true
        });

        Object.defineProperty(this, 'name', {
            configurable: true,
            enumerable: false,
            value: this.constructor.name,
            writable: false
        });

        Object.defineProperty(this, 'code', {
            configurable: true,
            enumerable: false,
            value: code,
            writable: false
        });

        if (Error.hasOwnProperty('captureStackTrace')) {
            Error.captureStackTrace(this, this.constructor);
            return;
        }

        Object.defineProperty(this, 'stack', {
            configurable: true,
            enumerable: false,
            value: (new Error(message)).stack,
            writable: true
        });
    }

    getMessage(): string {
        // @ts-ignore
        return this.message;
    }

    getCode(): number {
        // @ts-ignore
        return this.code;
    }

    getTrace(): string | undefined {
        // @ts-ignore
        return this.stack;
    }

    toString(): string {
        return `${this.getMessage()} (Code: ${this.getCode()})`;
    }
}
