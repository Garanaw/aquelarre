import Model from 'laravel-micro.js/src/Database/Eloquent/Model';

/**
 * @typedef {Object} Character
 * @property {number} id
 * @property {string} name
 */
export default class Character extends Model {
    protected fields(): string[] {
        return [];
    }
}
