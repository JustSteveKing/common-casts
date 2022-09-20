<?php

declare(strict_types=1);

use JustSteveKing\CommonCasts\ValueObjects\Finance\Money;
use Money\Currency;

it('can create a new money class', function (int $amount) {
    expect(
        new Money(
            amount: $amount,
            currency: new Currency(
                code: 'GBP',
            ),
        ),
    )->toBeInstanceOf(Money::class);
})->with('numbers');

it('can retrieve the amount of money', function () {
    expect(
        (new Money(
            amount: 1000000,
            currency: new Currency(
                code: 'GBP',
            ),
        ))->get(),
    )->toBeString()->toEqual('£10,000.00');
});
