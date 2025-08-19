<?php

use App\Actions\LocaleAction;

test('can change locale successfully', function (string $locale) {
    $this->startSession();

    $action = new LocaleAction;
    $action->handle($locale);

    expect(app()->getLocale())->toBe($locale);
    expect(session('locale'))->toBe($locale);
})->with([['en'], ['ar']]);

test('cannot change locale to unsupported languages', function (string $locale) {
    $this->startSession();

    $action = new LocaleAction;
    $action->handle($locale);

    expect(app()->getLocale())->not()->toBe($locale);
    expect(session('locale'))->not()->toBe($locale);
})->with([['fr'], ['it']]);
