import Character from '../models/Character';

export default class CharacterFactory
{
    public static forCreation(): Character
    {
        return new Character({
            name: '',
            sex: '',
        });
    }
}
