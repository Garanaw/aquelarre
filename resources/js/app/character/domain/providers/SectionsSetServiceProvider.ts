import ServiceProvider from 'laravel-micro.js/src/Support/ServiceProvider';
import SetElements from '../../views/create/shared/domain/services/SetElements';
import Elements from '../../views/create/shared/domain/enum/Elements';
import Sections from '../../views/create/shared/domain/enum/Sections';
import SectionElements from '../../views/create/shared/domain/enum/SectionElements';

export default class SectionsSetServiceProvider extends ServiceProvider {
    register() {
        this.app.singleton('SetElements', () => {
            const areSet = new Map<string, boolean>([]);
            for (let i in Elements) {
                areSet.set(i.toString(), false);
            }

            const setSections = new Map<string, boolean>([]);
            for (let i in Sections) {
                setSections.set(i.toString(), false);
            }

            const sectionElements = new Map<string, string[]>([]);
            for (let i in SectionElements) {
                sectionElements.set(i.toString(), []);
            }

            return new SetElements(
                areSet,
                setSections,
                sectionElements,
                new Map()
            );
        });
    }

    provides() {
        return ['SetElements'];
    }
}
