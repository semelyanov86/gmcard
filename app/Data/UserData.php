<?php

declare(strict_types=1);

namespace App\Data;

use App\Enums\GenderType;
use App\Enums\JobStatusType;
use App\Models\User;
use SensitiveParameter;
use Spatie\LaravelData\Attributes\Hidden;
use Spatie\LaravelData\Data;

final class UserData extends Data
{
    public function __construct(
        public string $name,
        public string $email,
        #[SensitiveParameter]
        #[Hidden]
        public string $password,
        public ?string $last_name = null,
        public ?int $age = null,
        public ?int $id = null,
        public ?int $balance = null,
        public ?int $virtual_balance = null,
        public ?string $job = null,
        public ?JobStatusType $job_status = null,
        public ?int $city = null,
        public ?string $country = null,
        public ?string $birth_date = null,
        public ?string $role = null,
        public ?GenderType $gender = null,
        public ?string $code = null,
    ) {}

    public static function fromModel(User $user): self
    {
        if (! $user->relationLoaded('roles')) {
            $user->load('roles');
        }

        /** @var \Illuminate\Support\Carbon|null $birthDate */
        $birthDate = $user->birth_date;
        /** @var \Spatie\Permission\Models\Role|null $role */
        $role = $user->roles->first();

        return self::from([
            'name' => $user->name,
            'email' => $user->email,
            'password' => '',
            'last_name' => $user->last_name,
            'age' => $user->age,
            'id' => $user->id,
            'balance' => $user->getRawOriginal('balance'),
            'virtual_balance' => $user->virtual_balance,
            'job' => $user->job,
            'job_status' => $user->job_status,
            'city' => $user->city,
            'country' => $user->country,
            'birth_date' => $birthDate?->format('Y-m-d'),
            'role' => $role?->name,
            'gender' => $user->gender,
            'code' => $user->code,
        ]);
    }
}
