import ErrorHandler from 'laravel-micro.js/src/Exceptions/ErrorHandler';
import Exception from "framework/Exceptions/Exception";

export default class Handler extends ErrorHandler {
    private $dontReport: typeof Error[] = [];

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

    ignore(...errors: typeof Error[]) {
        this.$dontReport.push(...errors);
    }

    shouldntReport<E extends Error>(error: any) {
        if (process.env.NODE_ENV === 'development') {
            return true;
        }

        return this.$dontReport.find((e) => error instanceof e) !== undefined;
    }
}
