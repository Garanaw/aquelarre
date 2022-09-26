import Model from './Model';

const get = (target, prop, receiver) => {
    // const VueProps = [
    //     '__v_isReadonly',
    //     '__v_raw',
    //     '__v_skip',
    //     '__v_isRef',
    // ];
    //
    // if (VueProps.includes(prop)) {
    //     //return Reflect.get(target, prop, receiver);
    // }

    try {
        return target.getAttribute(prop);
    } catch (e) {
        console.log('error: ', e);
    }
};

const set = <T>(target: Model<T>, prop, value) => {
    target.setAttribute(prop, value);
    return true;
};

const call = (target, prop, args) => {
    console.log('__call', target, prop, args);
};

export default function Eloquent(constructor: Function) {
    return new Proxy(constructor, {
        construct: <T>(cls: T, args: any[] = []): T => {
            // @ts-ignore
            const $class = Reflect.construct(cls, ...args);

            return new Proxy($class, {
                get: get,
                set: set,
                apply: call
            });
        },
    });
}
