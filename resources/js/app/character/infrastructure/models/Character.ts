import Model from '../../../../framework/database/eloquent/Model';
import Eloquent from "../../../../framework/database/eloquent/Eloquent";

/**
 * @typedef {Object} Character
 * @property {number} id
 * @property {string} name
 */
// @ts-ignore
@Eloquent
export default class Character extends Model {
}
