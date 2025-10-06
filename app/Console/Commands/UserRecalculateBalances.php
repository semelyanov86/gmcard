<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Actions\User\RecalculateUserBalanceAction;
use App\Models\User;
use Illuminate\Console\Command;

final class UserRecalculateBalances extends Command
{
    protected $signature = 'user:recalc-balances {--chunk=500}';

    protected $description = 'Recalculate balances for all users';

    public function handle(): int
    {
        $chunkSize = (int) $this->option('chunk');
        $processed = 0;

        User::query()
            ->select('id')
            ->orderBy('id')
            ->chunk($chunkSize, function ($users) use (&$processed): void {
                foreach ($users as $user) {
                    RecalculateUserBalanceAction::run($user->id);
                    $processed++;
                }
                $this->info('Processed: ' . $processed);
            });

        $this->info('Done. Total users processed: ' . $processed);

        return self::SUCCESS;
    }
}


