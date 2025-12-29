<?php

declare(strict_types=1);

namespace App\ValueObjects;

use App\Data\MenuData;
use Illuminate\Support\Uri;
use JsonSerializable;
use Spatie\LaravelData\Casts\Cast;
use Spatie\LaravelData\Support\Creation\CreationContext;
use Spatie\LaravelData\Support\DataProperty;
use Stringable;

final readonly class UrlValueObject implements Cast, JsonSerializable, Stringable
{
    public function __construct(
        private Uri $uri
    ) {}

    public static function from(string|Uri $value): self
    {
        if ($value instanceof Uri) {
            return new self($value);
        }

        return new self(Uri::of($value));
    }

    public function getUri(): Uri
    {
        return $this->uri;
    }

    public function host(): ?string
    {
        return $this->uri->host();
    }

    public function path(): string
    {
        return $this->uri->path();
    }

    /**
     * @param  array<string, mixed>  $properties
     * @param  CreationContext<MenuData>  $context
     */
    public function cast(DataProperty $property, mixed $value, array $properties, CreationContext $context): mixed
    {
        if ($value === null) {
            return null;
        }

        if ($value instanceof self) {
            return $value;
        }

        if ($value instanceof Uri) {
            return new self($value);
        }

        if (is_string($value)) {
            return self::from($value);
        }

        return null;
    }

    public function __toString(): string
    {
        return (string) $this->uri;
    }

    public function jsonSerialize(): string
    {
        return (string) $this->uri;
    }
}
