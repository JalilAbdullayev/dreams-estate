<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProfileController extends Controller {
    public function index(): View {
        $user = auth()->user();
        return view('admin.profile', compact('user'));
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse {
        $user = $request->user();
        $user->fill($request->validated());
        if($user->isDirty('email')) {
            $user->email_verified_at = null;
        }
        $user->phone = preg_replace('/[\s\(\)\-]+/', '', $request->phone);
        $user->whatsapp = preg_replace('/[\s\(\)\-]+/', '', $request->whatsapp);
        $user->save();
        return back()->withSuccess('Profile information updated successfully');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password', 'min:8', 'max:255'],
        ]);
        $user = $request->user();
        auth()->logout();
        $user->delete();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }
}
