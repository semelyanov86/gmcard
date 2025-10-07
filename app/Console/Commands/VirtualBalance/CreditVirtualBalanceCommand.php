<?php

declare(strict_types=1);

namespace App\Console\Commands\VirtualBalance;

use App\Actions\VirtualBalance\CreditVirtualBalanceAction;
use App\Data\VirtualBalanceData;
use App\Enums\PaymentType;
use App\Models\User;
use Illuminate\Console\Command;
use Exception;

class CreditVirtualBalanceCommand extends Command
{
    protected $signature = 'create:credit-balance {user_id} {amount} {description? : Description of the operation}';

    protected $description = 'Command for virtual balance credit';

    public function __construct(
        protected CreditVirtualBalanceAction $creditAction
    ) {
        parent::__construct();
    }

    public function handle(): int
    {
        $userId = (int) $this->argument('user_id');
        $amount = (int) $this->argument('amount');

        $user = User::find($userId);
        if (! $user) {
            $this->error("User with ID {$userId} not found");

            return self::FAILURE;
        }

        $this->info('User: ' . $user->name);
        $this->info('Virtual balance BEFORE: ' . $user->virtual_balance . ' points');
        $this->newLine();

        try {
            $description = $this->argument('description') ?: 'Test credit via command';

            $data = new VirtualBalanceData(
                user_id: $userId,
                compensation_date: now(),
                amount: $amount,
                type: PaymentType::INCOMING,
                description: $description
            );

            $result = $this->creditAction->handle($data);

            $user->refresh();
            $this->info('Successfully credited!');
            $this->newLine();
            $this->info('Credited: ' . $amount . ' points');
            $this->info('Virtual balance AFTER: ' . $user->virtual_balance . ' points');
            $this->info('Record id: ' . $result->id);
            $this->info('Description: ' . ($result->description ?? 'Not Available '));

            return self::SUCCESS;
        } catch (Exception $e) {
            $this->error('Error: ' . $e->getMessage());

            return self::FAILURE;
        }
    }
}
