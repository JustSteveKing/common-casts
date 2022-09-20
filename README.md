# Common Casts

A PHP package that provides common Data and Value Objects, that are Laravel castable.

## Installation

```bash
composer require juststeveking/common-casts
```

## Usage

### Email Object

You can create an Email object like so:

```php
use JustSteveKing\CommonCasts\ValueObjects\Personal\Email;

$email = new Email(
    value: 'test@email.com',
);

if ($email->validates()) {
    // perform logic
}
```

### Uuid

You can create a Uuid object like so:

```php
use Illuminate\Support\Str;
use JustSteveKing\CommonCasts\ValueObjects\Identification\Uuid;

$uuid = new Uuid(
    value: Str::uuid()->toString(),
);

if ($uuid->validates()) {
    // perform logic
}
```

### Money

You can create a Uuid object like so:

```php
use JustSteveKing\CommonCasts\ValueObjects\Finance\Money;use Money\Currency;

$money = new Money(
    amount: 10_000,
    currency: new Currency(
        code: 'GBP',
    ),
);

if ($money->validates()) {
    // perform logic
}

$money->get(); // Outputs the formatted money string.
```
