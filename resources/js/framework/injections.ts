import {InjectionKey} from 'vue';
import Application from './Application';
import { DiceRoller } from "@dice-roller/rpg-dice-roller";

export const $CONTAINER: InjectionKey<Application> = Symbol('$container');
export const $DICE: InjectionKey<DiceRoller> = Symbol('$dice');
