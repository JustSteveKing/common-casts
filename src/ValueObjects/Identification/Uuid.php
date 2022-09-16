<?php

declare(strict_types=1);

namespace JustSteveKing\CommonCasts\ValueObjects\Identification;

use Illuminate\Support\Facades\Validator;
use JustSteveKing\CommonCasts\Contracts\ValueObjectContract;

final class Uuid implements ValueObjectContract
{
    public function __construct(
        private readonly string $value,
    ) {}

    public function validates(string $rule = 'uuid'): bool
    {
        /**
         * @var \Illuminate\Validation\Validator $validator
         */
        $validator = Validator::make(
            data: ['uuid' => $this->get()],
            rules: ['uuid' => ['required', $rule]],
        );

        return $validator->passes();
    }

    public function get(): string
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return $this->get();
    }
}
