<?php

declare(strict_types=1);

use Illuminate\Support\Str;

dataset('uuids', [
    Str::uuid()->toString(),
    Str::uuid()->toString(),
    Str::uuid()->toString(),
    Str::uuid()->toString(),
    Str::uuid()->toString(),
    Str::uuid()->toString(),
]);
