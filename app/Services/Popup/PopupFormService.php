<?php

declare(strict_types=1);

namespace App\Services\Popup;

use App\Data\PopUpData;
use App\Services\CRM\VtigerCrmAdapter;

class PopupFormService
{
    public function __construct(
        protected VtigerCrmAdapter $crm
    ) {}

    public function handle(PopUpData $dto): array
    {
        return $this->crm->createLead($dto);
    }
}
