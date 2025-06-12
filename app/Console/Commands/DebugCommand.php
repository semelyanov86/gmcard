<?php
declare(strict_types=1);

namespace App\Console\Commands;

use Illuminate\Console\Command;

final class DebugCommand extends Command
{
    protected $signature = 'debug';

    protected $description = 'Command for debug purposes';

    public function handle(): void
    {
        $this->info('Executed successfully');
    }
}
