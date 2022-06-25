<?php

declare(strict_types=1);

namespace Aquelarre;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel;

class ConsoleKernel extends Kernel
{
    // phpcs:disable SlevomatCodingStandard.TypeHints.ParameterTypeHint.UselessAnnotation -- baseline
    /**
     * @param Schedule $schedule
     * @return void
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    // phpcs:enable SlevomatCodingStandard.TypeHints.ParameterTypeHint.UselessAnnotation -- baseline
    // phpcs:ignore SlevomatCodingStandard.Functions.UnusedParameter.UnusedParameter, SlevomatCodingStandard.TypeHints.ReturnTypeHint.MissingNativeTypeHint -- baseline
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
    }

    protected function commands(): void
    {
        // phpcs:ignore Squiz.Strings.ConcatenationSpacing.PaddingFound -- baseline
        $this->load(paths: __DIR__.'/Commands');

        collect(value: $this->app['config']['domain.available_domains'])
            // phpcs:ignore SlevomatCodingStandard.TypeHints.ReturnTypeHint.MissingNativeTypeHint -- baseline
            ->each(function (?array $subdomains, string $domain) {
                $this->registerDomainCommands(domain: $domain);

                if (empty($subdomains)) {
                    return;
                }

                collect(value: $subdomains)->each(
                    callback: fn (string $subdomain) => $this->registerDomainCommands(domain: $domain, subdomain: $subdomain)
                );
            });

        // phpcs:ignore PEAR.Files.IncludingFile.UseInclude -- baseline
        require base_path(path: 'routes/console.php');
    }

    protected function registerDomainCommands(string $domain, ?string $subdomain = null): void
    {
        $format = $subdomain
            // phpcs:ignore Squiz.WhiteSpace.OperatorSpacing.SpacingBefore -- baseline
            ? sprintf('app/%s/%s/Application/Commands', ucfirst($domain), ucfirst($subdomain))
            // phpcs:ignore Squiz.WhiteSpace.OperatorSpacing.SpacingBefore -- baseline
            : sprintf('app/%s/Application/Commands', ucfirst($domain));

        $this->load(paths: base_path(path: $format));
    }
}
