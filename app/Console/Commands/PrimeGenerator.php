<?php

declare(strict_types=1);

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Jenssegers\Optimus\Energon;
use Jenssegers\Optimus\Exceptions\InvalidPrimeException;

use function Laravel\Prompts\table;

class PrimeGenerator extends Command
{
    protected $signature = 'prime:generate {prime?}';

    protected $description = 'Generate constructor values for your prime';

    public function handle()
    {
        try {
            [$prime, $inverse, $rand] = Energon::generate($this->argument('prime'));
        } catch (InvalidPrimeException) {
            $this->error('Invalid prime number');

            return;
        }

        table([
            ['Prime', $prime],
            ['Inverse', $inverse],
            ['Random', $rand],
        ]);
    }
}
