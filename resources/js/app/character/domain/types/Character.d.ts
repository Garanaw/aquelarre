import Sex from '../../../shared/enum/alive/Sex';

export type Character = {
    id: number | null,
    name: string,
    sex: Sex,
}
