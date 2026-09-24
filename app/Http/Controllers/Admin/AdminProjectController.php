<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectMetric;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class AdminProjectController extends Controller
{
    /**
     * Display a listing of portfolio projects.
     */
    public function index(): View
    {
        $projects = Project::with('metrics')->orderBy('order', 'asc')->get();

        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new project.
     */
    public function create(): View
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created project in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'client_name' => ['required', 'string', 'max:255'],
            'industry' => ['nullable', 'string', 'max:255'],
            'category' => ['required', 'in:web,mobile,cloud,ai'],
            'tagline' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'summary' => ['nullable', 'string'],
            'challenge' => ['nullable', 'string'],
            'solution' => ['nullable', 'string'],
            'outcome' => ['nullable', 'string'],
            'banner_image' => ['nullable', 'string', 'max:500'],
            'banner_file' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp,gif,svg', 'max:10240'],
            'live_url' => ['nullable', 'string', 'max:500'],
            'demo_link' => ['nullable', 'string', 'max:500'],
            'github_url' => ['nullable', 'string', 'max:500'],
            'tech_stack_input' => ['nullable', 'string'],
            'order' => ['nullable', 'integer'],
            'screenshot_files' => ['nullable', 'array'],
            'screenshot_files.*' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp,gif,svg', 'max:10240'],
        ]);

        // Demo link resolution
        if (! empty($request->input('demo_link')) && empty($validated['live_url'])) {
            $validated['live_url'] = $request->input('demo_link');
        }

        // Description and summary synchronization
        if (! empty($validated['description']) && empty($validated['summary'])) {
            $validated['summary'] = Str::limit(strip_tags($validated['description']), 180);
        } elseif (! empty($validated['summary']) && empty($validated['description'])) {
            $validated['description'] = $validated['summary'];
        } else {
            $validated['description'] = $validated['description'] ?? ($validated['tagline'] ?? '');
            $validated['summary'] = $validated['summary'] ?? ($validated['tagline'] ?? '');
        }

        // Defaults for challenge and solution
        $validated['challenge'] = ! empty($validated['challenge']) ? $validated['challenge'] : 'Engineering high-concurrency architecture, resilient data pipelines, and responsive interfaces.';
        $validated['solution'] = ! empty($validated['solution']) ? $validated['solution'] : 'Custom architecture implemented with modern full-stack frameworks, caching, and automated cloud delivery.';

        // Handle banner file upload
        if ($request->hasFile('banner_file') && $request->file('banner_file')->isValid()) {
            $bannerPath = $request->file('banner_file')->store('projects/banners', 'public');
            $validated['banner_image'] = '/storage/'.$bannerPath;
        }

        $slug = Str::slug($validated['title']);
        $validated['slug'] = Project::where('slug', $slug)->exists() ? $slug.'-'.time() : $slug;

        // Process screenshot uploads and URLs
        $screenshots = [];
        if ($request->hasFile('screenshot_files')) {
            foreach ($request->file('screenshot_files') as $file) {
                if ($file && $file->isValid()) {
                    $path = $file->store('projects/screenshots', 'public');
                    $screenshots[] = '/storage/'.$path;
                }
            }
        }

        $screenshotsRaw = $request->input('screenshots_input', '');
        if (! empty($screenshotsRaw)) {
            $urlScreenshots = array_filter(array_map('trim', preg_split('/[\r\n,]+/', $screenshotsRaw)));
            foreach ($urlScreenshots as $url) {
                if (! in_array($url, $screenshots)) {
                    $screenshots[] = $url;
                }
            }
        }

        if (! empty($validated['banner_image']) && ! in_array($validated['banner_image'], $screenshots)) {
            array_unshift($screenshots, $validated['banner_image']);
        }

        $validated['screenshots'] = ! empty($screenshots) ? array_values($screenshots) : ($validated['banner_image'] ? [$validated['banner_image']] : []);

        // Parse tech stack comma separated string
        $techs = array_filter(array_map('trim', explode(',', $request->input('tech_stack_input', ''))));
        $validated['tech_stack'] = ! empty($techs) ? $techs : ['Laravel', 'Tailwind CSS'];
        $validated['is_featured'] = $request->boolean('is_featured', true);
        $validated['order'] = $validated['order'] ?? (Project::max('order') + 1);

        $project = Project::create($validated);

        // Process metrics array
        $metricLabels = $request->input('metric_labels', []);
        $metricValues = $request->input('metric_values', []);

        foreach ($metricLabels as $idx => $label) {
            if (! empty($label) && ! empty($metricValues[$idx])) {
                ProjectMetric::create([
                    'project_id' => $project->id,
                    'label' => $label,
                    'value' => $metricValues[$idx],
                    'order' => $idx + 1,
                ]);
            }
        }

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project "'.$project->title.'" deployed successfully with screenshots and demo link.');
    }

    /**
     * Show the form for editing the project.
     */
    public function edit(Project $project): View
    {
        $project->load('metrics');

        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified project in storage.
     */
    public function update(Request $request, Project $project): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'client_name' => ['required', 'string', 'max:255'],
            'industry' => ['nullable', 'string', 'max:255'],
            'category' => ['required', 'in:web,mobile,cloud,ai'],
            'tagline' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'summary' => ['nullable', 'string'],
            'challenge' => ['nullable', 'string'],
            'solution' => ['nullable', 'string'],
            'outcome' => ['nullable', 'string'],
            'banner_image' => ['nullable', 'string', 'max:500'],
            'banner_file' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp,gif,svg', 'max:10240'],
            'live_url' => ['nullable', 'string', 'max:500'],
            'demo_link' => ['nullable', 'string', 'max:500'],
            'github_url' => ['nullable', 'string', 'max:500'],
            'tech_stack_input' => ['nullable', 'string'],
            'order' => ['nullable', 'integer'],
            'screenshot_files' => ['nullable', 'array'],
            'screenshot_files.*' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp,gif,svg', 'max:10240'],
        ]);

        // Demo link resolution
        if (! empty($request->input('demo_link')) && empty($validated['live_url'])) {
            $validated['live_url'] = $request->input('demo_link');
        }

        // Description and summary synchronization
        if (! empty($validated['description']) && empty($validated['summary'])) {
            $validated['summary'] = Str::limit(strip_tags($validated['description']), 180);
        } elseif (! empty($validated['summary']) && empty($validated['description'])) {
            $validated['description'] = $validated['summary'];
        }

        // Handle banner file upload
        if ($request->hasFile('banner_file') && $request->file('banner_file')->isValid()) {
            $bannerPath = $request->file('banner_file')->store('projects/banners', 'public');
            $validated['banner_image'] = '/storage/'.$bannerPath;
        }

        $techs = array_filter(array_map('trim', explode(',', $request->input('tech_stack_input', ''))));
        $validated['tech_stack'] = ! empty($techs) ? $techs : $project->tech_stack;
        $validated['is_featured'] = $request->boolean('is_featured', true);

        // Existing screenshots handling
        $existingScreenshots = $request->input('existing_screenshots', $project->screenshots ?? []);
        if (! is_array($existingScreenshots)) {
            $existingScreenshots = [];
        }

        // Upload newly provided screenshots
        if ($request->hasFile('screenshot_files')) {
            foreach ($request->file('screenshot_files') as $file) {
                if ($file && $file->isValid()) {
                    $path = $file->store('projects/screenshots', 'public');
                    $existingScreenshots[] = '/storage/'.$path;
                }
            }
        }

        // Parse any additional raw URLs
        $screenshotsRaw = $request->input('screenshots_input', '');
        if (! empty($screenshotsRaw)) {
            $urlScreenshots = array_filter(array_map('trim', preg_split('/[\r\n,]+/', $screenshotsRaw)));
            foreach ($urlScreenshots as $url) {
                if (! in_array($url, $existingScreenshots)) {
                    $existingScreenshots[] = $url;
                }
            }
        }

        if (! empty($validated['banner_image']) && ! in_array($validated['banner_image'], $existingScreenshots)) {
            array_unshift($existingScreenshots, $validated['banner_image']);
        }

        $validated['screenshots'] = ! empty($existingScreenshots) ? array_values(array_unique($existingScreenshots)) : ($project->screenshots ?? []);

        $project->update($validated);

        // Update metrics
        $project->metrics()->delete();
        $metricLabels = $request->input('metric_labels', []);
        $metricValues = $request->input('metric_values', []);

        foreach ($metricLabels as $idx => $label) {
            if (! empty($label) && ! empty($metricValues[$idx])) {
                ProjectMetric::create([
                    'project_id' => $project->id,
                    'label' => $label,
                    'value' => $metricValues[$idx],
                    'order' => $idx + 1,
                ]);
            }
        }

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project "'.$project->title.'" updated successfully with screenshots and demo link.');
    }

    /**
     * Remove the specified project from storage.
     */
    public function destroy(Project $project): RedirectResponse
    {
        $title = $project->title;
        $project->delete();

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project "'.$title.'" removed from showcase.');
    }
}
