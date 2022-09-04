import Character from '../models/Character';

export default class CharacterFactory
{
    public static forCreation(): Character
    {
        const character = new Character({
            name: '',
        });

        console.log('creating', character);
        return character;
    }
}
