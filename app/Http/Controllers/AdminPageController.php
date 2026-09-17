<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminPageController extends Controller
{
    public function email(): View
    {
        return view('admin.email', [
            'contacts' => Contact::latest()->paginate(10),
        ]);
    }

    public function visiMisi(): View
    {
        return view('admin.visi-misi');
    }

    public function settings(): View
    {
        return view('admin.settings');
    }

    public function updateSettings(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email,' . $request->user()->id],
        ]);

        $request->user()->update($data);

        return back()->with('success', 'Account settings updated successfully.');
    }

    public function help(): View
    {
        return view('admin.help');
    }
}
