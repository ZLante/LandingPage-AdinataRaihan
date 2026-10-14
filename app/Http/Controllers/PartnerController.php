<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class PartnerController extends Controller
{
    public function index(): View
    {
        return view('admin.partners.index', [
            'partners' => Partner::orderBy('sort_order')->orderBy('name')->paginate(15),
        ]);
    }

    public function create(): View
    {
        return view('admin.partners.form');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validated($request);
        $data['logo'] = $request->file('logo')?->store('partners', 'public');

        Partner::create($data);

        return redirect()->route('partners.index')->with('success', 'Collaboration added successfully.');
    }

    public function edit(Partner $partner): View
    {
        return view('admin.partners.form', compact('partner'));
    }

    public function update(Request $request, Partner $partner): RedirectResponse
    {
        $data = $this->validated($request);

        if ($request->hasFile('logo')) {
            if ($partner->logo) {
                Storage::disk('public')->delete($partner->logo);
            }
            $data['logo'] = $request->file('logo')->store('partners', 'public');
        } else {
            unset($data['logo']);
        }

        $partner->update($data);

        return redirect()->route('partners.index')->with('success', 'Collaboration updated successfully.');
    }

    public function destroy(Partner $partner): RedirectResponse
    {
        if ($partner->logo) {
            Storage::disk('public')->delete($partner->logo);
        }

        $partner->delete();

        return redirect()->route('partners.index')->with('success', 'Collaboration deleted successfully.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:2000'],
            'website' => ['nullable', 'url', 'max:2048'],
            'sort_order' => ['required', 'integer', 'min:0', 'max:9999'],
            'icon' => ['required', Rule::in(Partner::ICONS)],
            'theme' => ['required', Rule::in(Partner::THEMES)],
            'logo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
        ]);
    }
}
