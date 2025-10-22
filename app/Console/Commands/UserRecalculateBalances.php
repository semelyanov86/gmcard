<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Actions\User\RecalculateUserBalanceAction;
use App\Models\User;
use Illuminate\Console\Command;
use Throwable;

final class UserRecalculateBalances extends Command
{
    protected $signature = 'user:recalc-balances {--chunk=500}';

    protected $description = 'Recalculate balances for all users';

    public function handle(): int
    {
        $chunkSize = (int) $this->option('chunk');
        $processed = 0;
        $errors = 0;

        User::query()
            ->select('id')
            ->orderBy('id')
            ->chunk($chunkSize, function ($users) use (&$processed, &$errors): void {
                foreach ($users as $user) {
                    try {
                        RecalculateUserBalanceAction::run($user->id);
                        $processed++;
                    } catch (Throwable $e) {
                        $errors++;
                        $this->error("Error processing user {$user->id}: {$e->getMessage()}");
                    }
                }
                $this->info("Processed: {$processed}, Errors: {$errors}");
            });

        $this->info("Done. Total users processed: {$processed}, Total errors: {$errors}");

        return $errors > 0 ? self::FAILURE : self::SUCCESS;
    }
}
