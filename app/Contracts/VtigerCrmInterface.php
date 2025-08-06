<?php

declare(strict_types=1);

namespace App\Contracts;

use App\Data\PopUpData;

interface VtigerCrmInterface
{
    /**
     * @return array<string, mixed>
     */
    public function createLead(PopUpData $dto): array;
}
