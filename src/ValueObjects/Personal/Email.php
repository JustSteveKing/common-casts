<?php

declare(strict_types=1);

namespace JustSteveKing\CommonCasts\ValueObjects\Personal;

use Illuminate\Support\Facades\Validator;
use JustSteveKing\CommonCasts\Contracts\ValueObjectContract;

final class Email implements ValueObjectContract
{
    public function __construct(
        private readonly string $value,
    ) {
    }

    public function get(): string
    {
        return $this->value;
    }

    public function validates(string $rule = 'email'): bool
    {
        /**
         * @var \Illuminate\Validation\Validator $validator
         */
        $validator = Validator::make(
            data: ['email' => $this->get()],
            rules: ['email' => ['required', $rule]],
        );

        return $validator->passes();
    }

    public function __toString(): string
    {
        return $this->get();
    }
}
