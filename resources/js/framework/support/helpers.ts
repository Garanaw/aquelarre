import { inject, InjectionKey } from 'vue';
import { $CONTAINER } from '../injections';
import { Application } from "../types";
import Container from '../Application';

export function strictInject<T>(key: InjectionKey<T>): T;
export function strictInject<T>(key: InjectionKey<T>, defaultValue: T): T;
export function strictInject<T>(key: InjectionKey<T>, defaultValue?: T): T {
    const resolved = defaultValue ? inject(key, defaultValue) : inject(key);

    if (!resolved) {
        throw new Error(`Could not resolve ${key.description}`);
    }

    return resolved as T;
}

export function injectContainer(): Application {
    return strictInject($CONTAINER, new Container());
}

export function objectKeys(obj: {}): (keyof {})[] {
    return Object.keys(obj) as (keyof {})[];
}
