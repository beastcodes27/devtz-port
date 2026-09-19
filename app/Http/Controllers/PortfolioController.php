<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\CompanyStat;
use App\Models\Project;
use App\Models\Service;
use App\Models\Testimonial;
use Illuminate\View\View;

class PortfolioController extends Controller
{
    /**
     * Display the DevTZ main portfolio landing page.
     */
    public function index(): View
    {
        $services = Service::featured()->get();
        $projects = Project::featured()->with('metrics')->get();
        $stats = CompanyStat::orderBy('order', 'asc')->get();
        $testimonials = Testimonial::featured()->get();
        $articles = Article::featured()->take(3)->get();

        return view('portfolio', compact('services', 'projects', 'stats', 'testimonials', 'articles'));
    }
}
