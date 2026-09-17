<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class NewsController extends Controller
{
    public function index(): View
    {
        return view('news.index', [
            'newsItems' => News::latest()->paginate(10),
        ]);
    }

    public function create(): View
    {
        return view('news.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validated($request);
        $data['user_id'] = $request->user()->id;
        $data['slug'] = News::makeSlug($data['title']);
        $data['published_at'] = $data['status'] === 'published' ? now() : null;

        News::create($data);

        return redirect()->route('news.index')->with('success', 'News created successfully.');
    }

    public function edit(News $news): View
    {
        return view('news.edit', compact('news'));
    }

    public function update(Request $request, News $news): RedirectResponse
    {
        $data = $this->validated($request);
        $data['slug'] = News::makeSlug($data['title'], $news->id);
        $data['published_at'] = $data['status'] === 'published'
            ? ($news->published_at ?? now())
            : null;

        $news->update($data);

        return redirect()->route('news.index')->with('success', 'News updated successfully.');
    }

    public function destroy(News $news): RedirectResponse
    {
        $news->delete();

        return redirect()->route('news.index')->with('success', 'News deleted successfully.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'tag' => ['nullable', 'string', 'max:80'],
            'description' => ['required', 'string'],
            'status' => ['required', 'in:draft,published'],
        ]);
    }
}
