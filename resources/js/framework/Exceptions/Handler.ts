// @ts-ignore
import { ErrorHandler } from 'laravel-micro.js';

const dontReport: string[] = [

];

export default class Handler extends ErrorHandler {
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

    report(error: Error) {
        if (this.shouldntReport(error)) {
            return;
        }

        // @ts-ignore
        if (typeof error?.report === 'function') {
            try {
                // @ts-ignore
                return error.report(this.app)
            } catch (e) {
                console.error(e)
            }
        }
        console.error(error);
    }

    shouldntReport(error: any) {
        if (process.env.NODE_ENV === 'development') {
            return true;
        }

        return dontReport.includes(error.constructor.name);
    }
}
