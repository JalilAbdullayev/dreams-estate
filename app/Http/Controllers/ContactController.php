<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ContactController extends Controller {
    public function index(): View {
        $contact = Contact::first();
        return view('admin.contact', compact('contact'));
    }

    public function update(ContactRequest $request): RedirectResponse {
        $contact = Contact::first();
        $contact->update($request->validated());
        return back()->withSuccess('Contact information updated successfully');
    }
}
