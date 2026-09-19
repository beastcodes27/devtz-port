<?php

namespace App\Http\Controllers;

use App\Models\ContactInquiry;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Store a new contact and architecture inquiry.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate(ContactInquiry::validationRules());
        
        $validated['ip_address'] = $request->ip();
        $validated['status'] = 'new';

        ContactInquiry::create($validated);

        return redirect()->to('/#contact')
            ->with('success', 'Architecture Inquiry Received! A DevTZ Lead Architect will review your specs within 24 hours.');
    }
}
