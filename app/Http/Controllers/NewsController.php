<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
        $data['image'] = $this->storeImage($request);

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

        if ($request->hasFile('image')) {
            $this->deleteImage($news->image);
            $data['image'] = $this->storeImage($request);
        } else {
            unset($data['image']);
        }

        $news->update($data);

        return redirect()->route('news.index')->with('success', 'News updated successfully.');
    }

    public function destroy(News $news): RedirectResponse
    {
        $this->deleteImage($news->image);
        $news->delete();

        return redirect()->route('news.index')->with('success', 'News deleted successfully.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'tag' => ['nullable', 'string', 'max:80'],
            'link' => ['nullable', 'url', 'max:2048'],
            'description' => ['required', 'string'],
            'status' => ['required', 'in:draft,published'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
        ]);
    }

    private function storeImage(Request $request): ?string
    {
        return $request->hasFile('image')
            ? $request->file('image')->store('news', 'public')
            : null;
    }

    private function deleteImage(?string $image): void
    {
        if ($image) {
            Storage::disk('public')->delete($image);
        }
    }
}
