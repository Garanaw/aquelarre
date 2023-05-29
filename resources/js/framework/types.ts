import type { Container } from "laravel-micro.js/src/types";

type RequestConfig = {
    url: string;
    method: string;
    data?: any;
}

type AnyObject = { [key: string]: any };

type Application = Container & {
    vueError(error: any, vm: any, info: any): void;
    resolveProvider(provider: any): any;
}

export {
    RequestConfig,
    AnyObject,
    Application,
};
