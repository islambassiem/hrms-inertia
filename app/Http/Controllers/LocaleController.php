<?php

namespace App\Http\Controllers;

use App\Actions\LocaleAction;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LocaleController extends Controller
{
    public function set(Request $request, LocaleAction $action): RedirectResponse
    {
        $locale = $request->input('locale', app()->getLocale());
        $action->handle($locale);

        return redirect()->back();
    }
}
