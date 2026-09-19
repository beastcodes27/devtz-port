<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class AdminArticleController extends Controller
{
    /**
     * Display listing of articles.
     */
    public function index(): View
    {
        $articles = Article::latest()->paginate(10);

        return view('admin.articles.index', compact('articles'));
    }

    /**
     * Show form for creating a new article.
     */
    public function create(): View
    {
        return view('admin.articles.create');
    }

    /**
     * Store newly created article.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'author' => ['required', 'string', 'max:150'],
            'author_role' => ['required', 'string', 'max:150'],
            'category' => ['required', 'string', 'max:100'],
            'summary' => ['required', 'string'],
            'content' => ['required', 'string'],
            'read_time_minutes' => ['required', 'integer', 'min:1'],
            'tags_input' => ['nullable', 'string'],
            'cover_image' => ['nullable', 'string', 'max:500'],
        ]);

        $slug = Str::slug($validated['title']);
        $validated['slug'] = Article::where('slug', $slug)->exists() ? $slug . '-' . time() : $slug;

        $tags = array_filter(array_map('trim', explode(',', $request->input('tags_input', ''))));
        $validated['tags'] = !empty($tags) ? $tags : ['Engineering', 'Laravel'];
        $validated['is_featured'] = $request->boolean('is_featured', true);
        $validated['published_at'] = now();

        $article = Article::create($validated);

        return redirect()->route('admin.articles.index')
            ->with('success', 'Article "' . $article->title . '" published to Radar.');
    }

    /**
     * Show form for editing the article.
     */
    public function edit(Article $article): View
    {
        return view('admin.articles.edit', compact('article'));
    }

    /**
     * Update the specified article.
     */
    public function update(Request $request, Article $article): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'author' => ['required', 'string', 'max:150'],
            'author_role' => ['required', 'string', 'max:150'],
            'category' => ['required', 'string', 'max:100'],
            'summary' => ['required', 'string'],
            'content' => ['required', 'string'],
            'read_time_minutes' => ['required', 'integer', 'min:1'],
            'tags_input' => ['nullable', 'string'],
            'cover_image' => ['nullable', 'string', 'max:500'],
        ]);

        $tags = array_filter(array_map('trim', explode(',', $request->input('tags_input', ''))));
        $validated['tags'] = !empty($tags) ? $tags : $article->tags;
        $validated['is_featured'] = $request->boolean('is_featured', true);

        $article->update($validated);

        return redirect()->route('admin.articles.index')
            ->with('success', 'Article "' . $article->title . '" updated successfully.');
    }

    /**
     * Delete the specified article.
     */
    public function destroy(Article $article): RedirectResponse
    {
        $title = $article->title;
        $article->delete();

        return redirect()->route('admin.articles.index')
            ->with('success', 'Article "' . $title . '" deleted.');
    }
}
