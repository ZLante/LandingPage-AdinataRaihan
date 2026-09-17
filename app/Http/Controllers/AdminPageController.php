<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\PageContent;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
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
        $content = PageContent::firstOrCreate(
            ['page' => 'visi-misi'],
            [
                'visi' => '[Masukkan visi organisasi, sekolah, kampus, atau perusahaan di sini. Visi berisi tujuan atau gambaran besar yang ingin dicapai di masa depan.]',
                'misi' => [
                    '[Misi pertama yang menjelaskan langkah untuk mencapai visi.]',
                    '[Misi kedua yang menjelaskan langkah atau upaya yang dilakukan.]',
                    '[Misi ketiga yang menjelaskan tujuan atau program utama.]',
                    '[Misi keempat jika diperlukan.]',
                ],
            ],
        );

        return view('admin.visi-misi', compact('content'));
    }

    public function editVisiMisi(): View
    {
        $content = PageContent::firstOrCreate(
            ['page' => 'visi-misi'],
            [
                'visi' => '[Masukkan visi organisasi, sekolah, kampus, atau perusahaan di sini. Visi berisi tujuan atau gambaran besar yang ingin dicapai di masa depan.]',
                'misi' => [
                    '[Misi pertama yang menjelaskan langkah untuk mencapai visi.]',
                    '[Misi kedua yang menjelaskan langkah atau upaya yang dilakukan.]',
                    '[Misi ketiga yang menjelaskan tujuan atau program utama.]',
                    '[Misi keempat jika diperlukan.]',
                ],
            ],
        );

        return view('admin.visi-misi-edit', compact('content'));
    }

    public function updateVisiMisi(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'visi' => ['required', 'string'],
            'misi' => ['required', 'array', 'min:1'],
            'misi.*' => ['required', 'string'],
        ]);

        PageContent::updateOrCreate(
            ['page' => 'visi-misi'],
            ['visi' => $data['visi'], 'misi' => array_values($data['misi'])],
        );

        return redirect()->route('visi-misi')->with('success', 'Visi & Misi updated successfully.');
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
            'language' => ['required', 'in:id,en,ms,zh'],
            'timezone' => ['required', 'timezone'],
            'notifications_enabled' => ['nullable', 'boolean'],
            'profile_photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
            'remove_profile_photo' => ['nullable', 'boolean'],
            'current_password' => ['nullable', 'current_password'],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ]);

        $user = $request->user();
        if ($request->filled('password') && !Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'The current password is incorrect.'])->withInput();
        }

        if ($request->hasFile('profile_photo')) {
            if ($user->profile_photo) {
                Storage::disk('public')->delete($user->profile_photo);
            }
            $data['profile_photo'] = $request->file('profile_photo')->store('profiles', 'public');
        } elseif ($request->boolean('remove_profile_photo')) {
            if ($user->profile_photo) {
                Storage::disk('public')->delete($user->profile_photo);
            }
            $data['profile_photo'] = null;
        }

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        } else {
            unset($data['password']);
        }

        $data['notifications_enabled'] = $request->boolean('notifications_enabled');
        unset($data['remove_profile_photo'], $data['current_password']);
        $request->user()->update($data);

        return back()->with('success', 'Account settings updated successfully.');
    }

    public function help(): View
    {
        return view('admin.help');
    }
}
