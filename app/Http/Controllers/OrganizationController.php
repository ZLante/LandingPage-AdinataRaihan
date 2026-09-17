<?php

namespace App\Http\Controllers;

use App\Models\OrganizationMember;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class OrganizationController extends Controller
{
    public function index(): View
    {
        return view('admin.organization', [
            'members' => OrganizationMember::with('children')->whereNull('parent_id')->orderBy('sort_order')->get(),
            'allMembers' => OrganizationMember::orderBy('name')->get(),
        ]);
    }

    public function create(): View
    {
        return view('admin.organization-form', [
            'members' => OrganizationMember::orderBy('name')->get(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        OrganizationMember::create($this->validated($request));

        return redirect()->route('organization.index')->with('success', 'Organization member added.');
    }

    public function edit(OrganizationMember $organization): View
    {
        return view('admin.organization-form', [
            'organization' => $organization,
            'members' => OrganizationMember::where('id', '!=', $organization->id)->orderBy('name')->get(),
        ]);
    }

    public function update(Request $request, OrganizationMember $organization): RedirectResponse
    {
        $organization->update($this->validated($request, $organization));

        return redirect()->route('organization.index')->with('success', 'Organization member updated.');
    }

    public function destroy(OrganizationMember $organization): RedirectResponse
    {
        if ($organization->photo) {
            Storage::disk('public')->delete($organization->photo);
        }

        $organization->delete();

        return redirect()->route('organization.index')->with('success', 'Organization member deleted.');
    }

    private function validated(Request $request, ?OrganizationMember $organization = null): array
    {
        $data = $request->validate([
            'parent_id' => ['nullable', 'exists:organization_members,id'],
            'name' => ['required', 'string', 'max:255'],
            'position' => ['required', 'string', 'max:255'],
            'sort_order' => ['nullable', 'integer', 'min:0', 'max:999'],
            'photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
        ]);

        if ($organization && (int) ($data['parent_id'] ?? 0) === $organization->id) {
            abort(422, 'An organization member cannot be their own parent.');
        }

        if ($request->hasFile('photo')) {
            if ($organization?->photo) {
                Storage::disk('public')->delete($organization->photo);
            }
            $data['photo'] = $request->file('photo')->store('organization', 'public');
        } else {
            unset($data['photo']);
        }

        return $data;
    }
}
