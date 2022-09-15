<?php

declare(strict_types=1);

namespace JustSteveKing\CommonCasts\ValueObjects\Personal;

use Illuminate\Support\Facades\Validator;

final class Email
{
    public function __construct(
        private readonly string $value,
    ) {}

    public function get(): string
    {
        return $this->value;
    }

    public function validates(string $rule = 'email')
    {
        return Validator::make(
            data: ['email' => $this->get()],
            rules: ['email' => ['required', $rule]],
        )->passes();
    }
}
