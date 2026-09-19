<?php

namespace App\Http\Controllers;

use App\Models\NewsletterSubscriber;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    /**
     * Subscribe email to DevTZ Engineering Radar.
     */
    public function subscribe(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'email' => ['required', 'email', 'max:150'],
        ]);

        NewsletterSubscriber::firstOrCreate(
            ['email' => $validated['email']],
            [
                'status' => 'active',
                'ip_address' => $request->ip(),
            ]
        );

        return redirect()->back()
            ->with('success', 'Subscribed! You are now connected to the DevTZ Engineering Radar.');
    }
}
