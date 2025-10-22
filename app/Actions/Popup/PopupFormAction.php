<?php

declare(strict_types=1);

namespace App\Actions\Popup;

use App\Contracts\VtigerCrmInterface;
use App\Data\PopUpData;
use Lorisleiva\Actions\Concerns\AsAction;

/**
 * @method static void run(PopUpData $dto)
 */
final readonly class PopupFormAction
{
    use AsAction;

    public function __construct(
        protected VtigerCrmInterface $crm
    ) {}

    public function handle(PopUpData $dto): void
    {
        $this->crm->createLead($dto);
    }
}
