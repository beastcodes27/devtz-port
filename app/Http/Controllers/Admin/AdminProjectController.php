<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectMetric;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
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
            'category' => ['required', 'in:web,mobile,cloud,ai'],
            'tagline' => ['required', 'string', 'max:255'],
            'summary' => ['required', 'string'],
            'challenge' => ['required', 'string'],
            'solution' => ['required', 'string'],
            'banner_image' => ['nullable', 'string', 'max:500'],
            'live_url' => ['nullable', 'string', 'max:500'],
            'github_url' => ['nullable', 'string', 'max:500'],
            'tech_stack_input' => ['nullable', 'string'],
            'order' => ['nullable', 'integer'],
        ]);

        $slug = Str::slug($validated['title']);
        $validated['slug'] = Project::where('slug', $slug)->exists() ? $slug . '-' . time() : $slug;

        // Parse screenshots (either array or newline/comma separated)
        $screenshotsRaw = $request->input('screenshots_input', '');
        $screenshots = array_filter(array_map('trim', preg_split('/[\r\n,]+/', $screenshotsRaw)));
        if (!empty($validated['banner_image']) && !in_array($validated['banner_image'], $screenshots)) {
            array_unshift($screenshots, $validated['banner_image']);
        }
        $validated['screenshots'] = !empty($screenshots) ? array_values($screenshots) : ($validated['banner_image'] ? [$validated['banner_image']] : []);

        // Parse tech stack comma separated string
        $techs = array_filter(array_map('trim', explode(',', $request->input('tech_stack_input', ''))));
        $validated['tech_stack'] = !empty($techs) ? $techs : ['Laravel', 'Tailwind CSS'];
        $validated['is_featured'] = $request->boolean('is_featured', true);
        $validated['order'] = $validated['order'] ?? (Project::max('order') + 1);

        $project = Project::create($validated);

        // Process metrics array
        $metricLabels = $request->input('metric_labels', []);
        $metricValues = $request->input('metric_values', []);

        foreach ($metricLabels as $idx => $label) {
            if (!empty($label) && !empty($metricValues[$idx])) {
                ProjectMetric::create([
                    'project_id' => $project->id,
                    'label' => $label,
                    'value' => $metricValues[$idx],
                    'order' => $idx + 1,
                ]);
            }
        }

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project "' . $project->title . '" deployed successfully to portfolio.');
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
            'category' => ['required', 'in:web,mobile,cloud,ai'],
            'tagline' => ['required', 'string', 'max:255'],
            'summary' => ['required', 'string'],
            'challenge' => ['required', 'string'],
            'solution' => ['required', 'string'],
            'banner_image' => ['nullable', 'string', 'max:500'],
            'live_url' => ['nullable', 'string', 'max:500'],
            'github_url' => ['nullable', 'string', 'max:500'],
            'tech_stack_input' => ['nullable', 'string'],
            'order' => ['nullable', 'integer'],
        ]);

        $techs = array_filter(array_map('trim', explode(',', $request->input('tech_stack_input', ''))));
        $validated['tech_stack'] = !empty($techs) ? $techs : $project->tech_stack;
        $validated['is_featured'] = $request->boolean('is_featured', true);

        // Parse screenshots
        $screenshotsRaw = $request->input('screenshots_input', '');
        $screenshots = array_filter(array_map('trim', preg_split('/[\r\n,]+/', $screenshotsRaw)));
        if (!empty($validated['banner_image']) && !in_array($validated['banner_image'], $screenshots)) {
            array_unshift($screenshots, $validated['banner_image']);
        }
        $validated['screenshots'] = !empty($screenshots) ? array_values($screenshots) : ($validated['banner_image'] ? [$validated['banner_image']] : $project->screenshots);

        $project->update($validated);

        // Update metrics
        $project->metrics()->delete();
        $metricLabels = $request->input('metric_labels', []);
        $metricValues = $request->input('metric_values', []);

        foreach ($metricLabels as $idx => $label) {
            if (!empty($label) && !empty($metricValues[$idx])) {
                ProjectMetric::create([
                    'project_id' => $project->id,
                    'label' => $label,
                    'value' => $metricValues[$idx],
                    'order' => $idx + 1,
                ]);
            }
        }

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project "' . $project->title . '" updated successfully.');
    }

    /**
     * Remove the specified project from storage.
     */
    public function destroy(Project $project): RedirectResponse
    {
        $title = $project->title;
        $project->delete();

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project "' . $title . '" removed from showcase.');
    }
}

