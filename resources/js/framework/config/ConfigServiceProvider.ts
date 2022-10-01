import ServiceProvider from 'laravel-micro.js/src/Support/ServiceProvider';
import Repository from 'laravel-micro.js/src/Support/Repository';
import cfg from '../../config';

export default class ConfigServiceProvider extends ServiceProvider
{
    public register() {
        const config = new Repository();

        super.app.singleton('Config', config);

        Object.keys(cfg).forEach((key) => {
            config.set(key, cfg[key]);
        });
    }

    get provides() {
        return [
            'Config',
        ];
    }
}
