import Model from './Model';

export default class NullModel extends Model
{
    resourceName() {
        return 'NullModel';
    }

    makeFetchRequest(url) {
        // @ts-ignore
        return new this.constructor();
    }

    isNull() {
        return true;
    }
}
