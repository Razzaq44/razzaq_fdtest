<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Book;

class BookController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'description' => 'required|string',
            'thumbnail' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'rating' => 'required|integer|min:0|max:5',
        ]);

        $path = $request->file('thumbnail')->store('thumbnails', 'public');

        Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'description' => $request->description,
            'thumbnail' => $path,
            'rating' => $request->rating,
        ]);

        return back()->with('success', 'Book created successfully!');
    }

    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);

        $validated = $request->validate([
        'title' => 'required',
        'author' => 'required',
        'description' => 'required|string',
        'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'rating' => 'required|integer|min:1|max:5',
    ]);

    if ($request->hasFile('thumbnail')) {
        if ($book->thumbnail) {
            Storage::disk('public')->delete($book->thumbnail);
        }

        $validated['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
    }

    $book->update($validated);
        return back()->with('success', 'Book updated successfully!');
    }
}
