<?php

declare(strict_types=1);

namespace JustSteveKing\CommonCasts\Contracts;

interface ValueObjectContract
{
    public function get(): string;

    public function __toString(): string;

    public function validates(string $rule): bool;
}
