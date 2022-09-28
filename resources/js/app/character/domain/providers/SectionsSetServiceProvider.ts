import ServiceProvider from 'laravel-micro.js/src/Support/ServiceProvider';
import SetElements from '../../views/create/shared/domain/services/SetElements';
import Elements from '../../views/create/shared/domain/enum/Elements';
import Sections from '../../views/create/shared/domain/enum/Sections';
import SectionElements from '../../views/create/shared/domain/enum/SectionElements';

export default class SectionsSetServiceProvider extends ServiceProvider {
    register() {
        // @ts-ignore
        this.app.singleton('SetElements', () => {
            // @ts-ignore
            const areSet = Object.keys(Elements).reduce((acc: Map<string, boolean>, key: string) => {
                acc.set(Elements[key], false);
                return acc;
            }, new Map());

            // @ts-ignore
            const setSections = Object.keys(Sections).reduce((acc: Map<string, boolean>, key: string) => {
                acc.set(Sections[key], false);
                return acc;
            }, new Map());

            return new SetElements(
                areSet,
                setSections,
                // @ts-ignore
                new Map([SectionElements]),
                new Map()
            );
        });
    }

    get provides() {
        return ['SetElements'];
    }
}
