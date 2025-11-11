<?php

declare(strict_types=1);

namespace App\Exceptions;

use Exception;
use Throwable;

final class VtigerCrmException extends Exception
{
    public function __construct(
        string $message,
        public readonly ?string $context = null,
        ?Throwable $previous = null
    ) {
        parent::__construct($message, 0, $previous);
    }

    public static function failedToCreateLead(string $email, Throwable $previous): self
    {
        return new self(
            message: "Failed to create lead in Vtiger CRM",
            context: $email,
            previous: $previous
        );
    }

    public static function failedToCreateContact(string $email, Throwable $previous): self
    {
        return new self(
            message: "Failed to create contact in Vtiger CRM",
            context: $email,
            previous: $previous
        );
    }

    public static function failedToCreatePotential(string $name, Throwable $previous): self
    {
        return new self(
            message: "Failed to create potential in Vtiger CRM",
            context: $name,
            previous: $previous
        );
    }

    public static function failedToFindContact(string $email, Throwable $previous): self
    {
        return new self(
            message: "Failed to find contact by email in Vtiger CRM",
            context: $email,
            previous: $previous
        );
    }
}

