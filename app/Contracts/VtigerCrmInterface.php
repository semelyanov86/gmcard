<?php

declare(strict_types=1);

namespace App\Contracts;

use App\Data\PopUpData;
use App\Data\VtigerContactData;
use App\Data\VtigerPotentialData;

interface VtigerCrmInterface
{
    /**
     * @return array<string, mixed>
     */
    public function createLead(PopUpData $dto): array;

    /**
     * @return array<string, mixed>
     */
    public function createContact(VtigerContactData $dto): array;

    /**
     * @return array<string, mixed>
     */
    public function createPotential(VtigerPotentialData $dto): array;

    public function findContactByEmail(string $email): ?string;
}
