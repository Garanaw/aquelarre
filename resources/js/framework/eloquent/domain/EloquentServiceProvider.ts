import ServiceProvider from 'laravel-micro.js/src/Support/ServiceProvider';
import { Database, Model } from 'jeloquent';
import Character from '../../../app/character/infrastructure/models/Character';

export default class EloquentServiceProvider extends ServiceProvider
{
    boot() {
        globalThis.Store.add(new Database('default', this.getModels()));

        // @ts-ignore
        this.app.singleton('store', () => globalThis.Store);
    }

    private getModels(): Array<Model>
    {
        return [
            // @ts-ignore
            Character,
        ];
    }

    get provides(): Array<Object> {
        return [
            'store',
        ];
    }
}
