<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ContactInquiry;
use App\Models\NewsletterSubscriber;
use App\Models\Project;
use App\Models\Service;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Render the main mission control dashboard.
     */
    public function index(): View
    {
        $stats = [
            'inquiries_count' => ContactInquiry::count(),
            'new_inquiries_count' => ContactInquiry::where('status', 'new')->count(),
            'projects_count' => Project::count(),
            'articles_count' => Article::count(),
            'subscribers_count' => NewsletterSubscriber::where('status', 'active')->count(),
            'services_count' => Service::count(),
        ];

        $recentInquiries = ContactInquiry::latest()->take(5)->get();
        $recentProjects = Project::latest()->take(4)->get();

        return view('admin.dashboard', compact('stats', 'recentInquiries', 'recentProjects'));
    }
}
