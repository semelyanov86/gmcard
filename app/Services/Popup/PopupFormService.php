<?php

namespace App\Services\Popup;

use App\Data\PopUpData;
use App\Services\CRM\VtigerCrmAdapter;

class PopupFormService
{
    public function __construct(
        protected VtigerCrmAdapter $crm
    ) {}

    public function handle(PopUpData $data): array
    {
        return $this->crm->createLead($data);
    }
}
