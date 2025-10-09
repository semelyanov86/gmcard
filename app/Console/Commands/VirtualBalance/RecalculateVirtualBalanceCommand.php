<?php

declare(strict_types=1);

namespace App\Console\Commands\VirtualBalance;

use App\Actions\VirtualBalance\RecalculateVirtualBalanceAction;
use App\Models\User;
use Illuminate\Console\Command;
use Exception;

class RecalculateVirtualBalanceCommand extends Command
{
    protected $signature = 'create:recalculate-balance {user_id}';

    protected $description = 'Command for virtual balance recalculation';

    public function __construct(
        protected RecalculateVirtualBalanceAction $recalculateAction
    ) {
        parent::__construct();
    }

    public function handle(): int
    {
        $userId = (int) $this->argument('user_id');

        $user = User::find($userId);
        if (! $user) {
            $this->error("User with ID {$userId} not found");

            return self::FAILURE;
        }

        $this->info('User: ' . $user->name);
        $this->info('Virtual balance BEFORE: ' . $user->virtual_balance . ' points');
        $this->newLine();

        try {
            $this->recalculateAction->handle($userId);

            $user->refresh();
            $this->info('Successfully recalculated!');
            $this->newLine();
            $this->info('Virtual balance AFTER: ' . $user->virtual_balance . ' points');

            return self::SUCCESS;
        } catch (Exception $e) {
            $this->error('Error: ' . $e->getMessage());

            return self::FAILURE;
        }
    }
}
