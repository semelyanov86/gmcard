<?php

namespace App\Contracts;

use App\Data\PopUpData;

interface VtigerCrmInterface
{
    public function createLead(PopUpData $dto): array;
}
