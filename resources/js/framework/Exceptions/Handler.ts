import ErrorHandler from 'laravel-micro.js/src/Exceptions/ErrorHandler';
import Exception from './Exception';
import VoidException from './VoidException';
import IConstructor from '../support/IConstructor';

export default class Handler extends ErrorHandler {
    private $dontReport: IConstructor<Error|Exception>[] = [
        VoidException,
    ];

    handle(error: Error) {
        this.report(error);
        return super.handle(error);
    }

    vue(error: any, vm: any, info: any) {
        this.handle(error);
        console.error(error);
        console.log(vm);
        console.info(info);
    }

    report(error: Error|Exception) {
        if (this.shouldntReport(error)) {
            return;
        }

        if ('report' in error && typeof error?.report === 'function') {
            try {
                return error.report(this.app)
            } catch(e) {
                console.error(e as Error);
            }
        }
        console.error(error);
    }

    ignore(...errors: IConstructor<|Exception>[]) {
        errors.forEach((error) => this.$dontReport.push(error));
    }

    shouldntReport<E extends Error|Exception>(error: E) {
        if (process.env.NODE_ENV === 'development') {
            return true;
        }

        return this.$dontReport
            .find((e) => error instanceof e) !== undefined;
    }
}
