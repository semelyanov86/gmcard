<?php

declare(strict_types=1);

namespace App\Services\Popup;

use App\Contracts\VtigerCrmInterface;
use App\Data\PopUpData;

class PopupFormService
{
    public function __construct(
        protected VtigerCrmInterface $crm
    ) {}

    public function handle(PopUpData $dto): array
    {
        return $this->crm->createLead($dto);
    }
}
