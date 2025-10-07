<?php

declare(strict_types=1);

namespace App\Console\Commands\VirtualBalance;

use App\Actions\VirtualBalance\DebitVirtualBalanceAction;
use App\Data\VirtualBalanceData;
use App\Enums\PaymentType;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Validation\ValidationException;

class DebitVirtualBalanceCommand extends Command
{
    protected $signature = 'create:debit-balance {user_id} {amount} {description? : Description of the operation}';

    protected $description = 'Command for virtual balance debit';

    public function __construct(
        protected DebitVirtualBalanceAction $debitAction
    ) {
        parent::__construct();
    }

    public function handle(): int
    {
        $userId = (int) $this->argument('user_id');
        $amount = (int) $this->argument('amount');

        $user = User::find($userId);
        if (!$user) {
            $this->error("User with ID {$userId} not found");
            return self::FAILURE;
        }

        $this->info('User: ' . $user->name);
        $this->info('Virtual balance BEFORE: ' . $user->virtual_balance . ' points');
        $this->newLine();

        try {
            $description = $this->argument('description') ?: 'Test debit via command';

            $data = new VirtualBalanceData(
                user_id: $userId,
                compensation_date: now(),
                amount: $amount,
                type: PaymentType::OUTGOING,
                description: $description
            );

            $result = $this->debitAction->handle($data);

            $user->refresh();
            $this->info('Successfully debited!');
            $this->newLine();
            $this->info('Debited: ' . $amount . ' points');
            $this->info('Virtual balance AFTER: ' . $user->virtual_balance . ' points');
            $this->info('Record id: ' . $result->id);
            $this->info('Description: ' . $result->description);
            $this->info('Date: ' . $result->compensation_date->format('Y-m-d H:i:s'));

            return self::SUCCESS;
        } catch (ValidationException $e) {
            $this->error('Validation error: ' . $e->getMessage());
            foreach ($e->errors() as $field => $errors) {
                foreach ($errors as $error) {
                    $this->error("  - {$error}");
                }
            }
            return self::FAILURE;
        } catch (\Exception $e) {
            $this->error('Error: ' . $e->getMessage());
            return self::FAILURE;
        }
    }
}

