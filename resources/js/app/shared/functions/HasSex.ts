import Sex from '../enum/alive/Sex';

type SexType = 'man' | 'woman' | Sex;

type Sexeable = {
    sex: SexType,
    setSex?(sex: SexType): void,
    getSex?(): SexType,
}

export default function useSex(sex: SexType, sexeable: Sexeable | unknown) {
    if (!(sexeable instanceof Object )|| !('sex' in sexeable)) {
        throw new Error('The nameable object must have a name property.');
    }

    if ('setSex' in sexeable && typeof sexeable.setSex === 'function') {
        sexeable.setSex(sex);
        return;
    }

    sexeable.sex = sex;
}
