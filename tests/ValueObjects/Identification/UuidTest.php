<?php

declare(strict_types=1);

use JustSteveKing\CommonCasts\ValueObjects\Identification\Uuid;

it('can create a new uuid', function (string $uuid) {
    expect(
        new Uuid(
            value: $uuid,
        ),
    )->toBeInstanceOf(Uuid::class);
})->with('uuids');

it('can retrieve the uuid', function (string $uuid) {
    expect(
        (new Uuid(
            value: $uuid,
        ))->get(),
    )->toBeString()->toEqual($uuid);
})->with('uuids');

it('can validate a uuid', function (string $uuid) {
    expect(
        (new Uuid(
            value: $uuid,
        ))->validates(),
    )->toBeBool()->toEqual(true);
})->with('uuids');

it('can fail validation', function (string $uuid) {
    expect(
        (new Uuid(
            value: $uuid,
        ))->validates(),
    )->toBeBool()->toEqual(false);
})->with('strings');

it('can turn the value object to a string', function (string $uuid) {
    $object = new Uuid(
        value: $uuid,
    );

    expect(
        (string) $object,
    )->toBeString()->toEqual($uuid);
})->with('uuids');
