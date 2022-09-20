<?php

declare(strict_types=1);

namespace JustSteveKing\CommonCasts\ValueObjects\Finance;

use Illuminate\Support\Facades\Validator;
use JustSteveKing\CommonCasts\Contracts\ValueObjectContract;
use Money\Currencies\ISOCurrencies;
use Money\Currency;
use Money\Formatter\IntlMoneyFormatter;
use Money\Money as MoneyPHP;
use NumberFormatter;

final class Money implements ValueObjectContract
{
    public function __construct(
        private readonly int $amount,
        private readonly Currency $currency,
    ) {}

    public function validates(string $rule): bool
    {
        /**
         * @var \Illuminate\Validation\Validator $validator
         */
        $validator = Validator::make(
            data: ['amount' => $this->amount],
            rules: ['amount' => ['required', $rule]],
        );

        return $validator->passes();
    }

    public function get(): string
    {
        $formatter = new IntlMoneyFormatter(
            formatter: new NumberFormatter(
                locale: 'en_GB',
                style: NumberFormatter::CURRENCY,
            ),
            currencies: new ISOCurrencies(),
        );

        return $formatter->format(
            money: new MoneyPHP(
                amount: $this->amount,
                currency: $this->currency,
            ),
        );
    }

    public function __toString(): string
    {
        return $this->get();
    }
}
