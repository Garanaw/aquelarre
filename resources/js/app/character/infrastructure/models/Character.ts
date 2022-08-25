import { Field, Model } from 'jeloquent';

export default class Character extends Model {
    constructor() {
        super([
            new Field('id', true),
            new Field('name'),
        ]);
    }
}
