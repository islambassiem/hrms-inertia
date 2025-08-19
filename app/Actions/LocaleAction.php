<?php

namespace App\Actions;

class LocaleAction
{
    public function handle(string $locale): void
    {
        if (in_array($locale, ['en', 'ar'])) {
            session(['locale' => $locale]);
            app()->setLocale($locale);
        }
    }
}
