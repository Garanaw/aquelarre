import Model from 'laravel-micro.js/src/Database/Eloquent/Model';
import Sex from "../../../shared/enum/alive/Sex";

/**
 * @typedef {Object} Character
 * @property {number} id
 * @property {string} name
 */
export default class Character extends Model {
    id: number | null = null;
    name: string = '';
    // @ts-ignore
    sex: Sex;
    protected fields(): string[] {
        return [
            'id',
            'name',
            'sex',
        ];
    }
}
