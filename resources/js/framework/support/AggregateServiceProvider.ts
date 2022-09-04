import ServiceProvider from 'laravel-micro.js/src/Support/ServiceProvider';

export default class AggregateServiceProvider extends ServiceProvider
{
    protected providers: Array<ServiceProvider> = [];

    protected instances: Array<any> = [];

    public register(): void {
        this.instances = [];

        // @ts-ignore
        this.instances = this.providers.map(provider => this.app.register(provider));
    }

    public provides(): Array<string> {
        return this.providers.map(provider => {
            // @ts-ignore
            return this.app.resolveProvider(provider).provides();
        });
    }
}
