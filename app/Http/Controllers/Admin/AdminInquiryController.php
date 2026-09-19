<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactInquiry;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminInquiryController extends Controller
{
    /**
     * Display a listing of incoming contact inquiries.
     */
    public function index(Request $request): View
    {
        $status = $request->query('status');
        
        $query = ContactInquiry::latest();
        if ($status && in_array($status, ['new', 'reviewed', 'scheduled', 'archived'])) {
            $query->where('status', $status);
        }

        $inquiries = $query->paginate(15);
        $counts = [
            'all' => ContactInquiry::count(),
            'new' => ContactInquiry::where('status', 'new')->count(),
            'reviewed' => ContactInquiry::where('status', 'reviewed')->count(),
            'scheduled' => ContactInquiry::where('status', 'scheduled')->count(),
            'archived' => ContactInquiry::where('status', 'archived')->count(),
        ];

        return view('admin.inquiries.index', compact('inquiries', 'counts', 'status'));
    }

    /**
     * Display the specified inquiry details.
     */
    public function show(ContactInquiry $inquiry): View
    {
        if ($inquiry->status === 'new') {
            $inquiry->update(['status' => 'reviewed']);
        }

        return view('admin.inquiries.show', compact('inquiry'));
    }

    /**
     * Update the status of an inquiry.
     */
    public function updateStatus(Request $request, ContactInquiry $inquiry): RedirectResponse
    {
        $validated = $request->validate([
            'status' => ['required', 'in:new,reviewed,scheduled,archived'],
        ]);

        $inquiry->update(['status' => $validated['status']]);

        return redirect()->back()
            ->with('success', 'Inquiry from ' . $inquiry->name . ' marked as ' . strtoupper($validated['status']) . '.');
    }

    /**
     * Delete the specified inquiry.
     */
    public function destroy(ContactInquiry $inquiry): RedirectResponse
    {
        $name = $inquiry->name;
        $inquiry->delete();

        return redirect()->route('admin.inquiries.index')
            ->with('success', 'Inquiry from ' . $name . ' purged.');
    }
}
