<?php

declare(strict_types=1);

namespace JustSteveKing\CommonCasts\Contracts;

interface ValueObjectContract
{
    public function __toString(): string;
}
