<?php

declare(strict_types=1);

namespace Tests\Mocks;

use App\Contracts\VtigerCrmInterface;
use App\Data\PopUpData;

class MockVtigerAdapter implements VtigerCrmInterface
{
    public function createLead(PopUpData $dto): array
    {
        return [
            'id' => '10x123',
            'lastname' => $dto->name ?? 'Test',
            'email' => $dto->email ?? 'test@example.com',
        ];
    }
}
