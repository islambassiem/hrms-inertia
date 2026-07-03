<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Resources\ContactResource;
use App\Queries\ContactsQuery;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

final class ContactController extends Controller
{
    public function index(Request $request): Response
    {
        $employees = (new ContactsQuery())('%'.$request->string('search')->value().'%');

        return Inertia::render('contacts')
            ->with('employees', ContactResource::collection($employees))
            ->with('filters', $request->only(['search']));
    }
}
