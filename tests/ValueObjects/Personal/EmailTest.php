<?php

declare(strict_types=1);

use JustSteveKing\CommonCasts\ValueObjects\Personal\Email;

it('can create a new email', function (string $email) {
    expect(
        new Email(
            value: $email,
        ),
    )->toBeInstanceOf(Email::class);
})->with('emails');

it('can retrieve the email', function (string $email) {
    expect(
        (new Email(
            value: $email,
        ))->get(),
    )->toBeString()->toEqual($email);
})->with('emails');

it('can validate an email', function (string $email) {
    expect(
        (new Email(
            value: $email,
        ))->validates(),
    )->toBeBool()->toEqual(true);
})->with('emails');

it('can fail validation', function (string $string) {
    expect(
        (new Email(
            value: $string,
        ))->validates(),
    )->toBeBool()->toEqual(false);
})->with('strings');

it('can customise the email validation rule', function (string $email) {
    expect(
        (new Email(
            value: $email,
        ))->validates(
            rule: 'email:rfc,dns'
        ),
    )->toBeBool()->toEqual(false);
})->with('fakeEmails');
