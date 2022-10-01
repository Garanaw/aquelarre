import AggregateServiceProvider from './support/AggregateServiceProvider';
import ServiceProvider from 'laravel-micro.js/src/Support/ServiceProvider';
import ConfigServiceProvider from './config/ConfigServiceProvider';
import EloquentServiceProvider from './database/eloquent/domain/EloquentServiceProvider';

export default class BootstrapServiceProvider extends AggregateServiceProvider
{
    protected providers: Array<ServiceProvider> = [
        ConfigServiceProvider,
        EloquentServiceProvider,
    ];
}
