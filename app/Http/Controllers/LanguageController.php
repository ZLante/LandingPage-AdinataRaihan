<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class LanguageController extends Controller
{
    public function update(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'language' => ['required', Rule::in(['en', 'id'])],
        ]);

        if ($request->user()) {
            $request->user()->update(['language' => $data['language']]);
        }

        $request->session()->put('language', $data['language']);

        return back();
    }
}
