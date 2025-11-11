<?php

declare(strict_types=1);

namespace Tests\Mocks;

use App\Contracts\VtigerCrmInterface;
use App\Data\PopUpData;
use App\Data\VtigerContactData;
use App\Data\VtigerPotentialData;

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

    public function createContact(VtigerContactData $dto): array
    {
        return [
            'id' => '12x456',
            'firstname' => $dto->firstname,
            'lastname' => $dto->lastname,
            'email' => $dto->email,
        ];
    }

    public function createPotential(VtigerPotentialData $dto): array
    {
        return [
            'id' => '13x789',
            'potentialname' => $dto->potentialname,
            'sales_stage' => $dto->sales_stage,
        ];
    }

    public function findContactByEmail(string $email): ?string
    {
        return '12x456';
    }
}
