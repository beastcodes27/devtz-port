<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsletterSubscriber;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AdminSubscriberController extends Controller
{
    /**
     * Display a listing of radar newsletter subscribers.
     */
    public function index(): View
    {
        $subscribers = NewsletterSubscriber::latest()->paginate(20);

        return view('admin.subscribers.index', compact('subscribers'));
    }

    /**
     * Toggle subscriber status between active and unsubscribed.
     */
    public function toggle(NewsletterSubscriber $subscriber): RedirectResponse
    {
        $newStatus = $subscriber->status === 'active' ? 'unsubscribed' : 'active';
        $subscriber->update(['status' => $newStatus]);

        return redirect()->back()
            ->with('success', 'Subscriber ' . $subscriber->email . ' is now ' . strtoupper($newStatus) . '.');
    }

    /**
     * Remove the subscriber from storage.
     */
    public function destroy(NewsletterSubscriber $subscriber): RedirectResponse
    {
        $email = $subscriber->email;
        $subscriber->delete();

        return redirect()->back()
            ->with('success', 'Subscriber ' . $email . ' removed.');
    }
}
