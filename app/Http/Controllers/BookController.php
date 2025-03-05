<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = \App\Models\Book::all();
        return view('book.index', compact('books'));
    }

    public function show($id)
    {
        $book = \App\Models\Book::findOrFail($id);
        return view('book.show', compact('book'));
    }

    public function create()
    {
        return view('book.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'description' => 'required',
        ]);

        $book = \App\Models\Book::create($validatedData);

        return redirect()->route('book.index')->with('success', 'Book created successfully.');
    }

    public function edit($id)
    {
        $book = \App\Models\Book::findOrFail($id);
        return view('book.edit', compact('book'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'description' => 'required',
        ]);

        $book = \App\Models\Book::findOrFail($id);
        $book->update($validatedData);

        return redirect()->route('book.index')->with('success', 'Book updated successfully.');
    }

    public function destroy($id)
    {
        $book = \App\Models\Book::findOrFail($id);
        $book->delete();

        return redirect()->route('book.index')->with('success', 'Book deleted successfully.');
    }
}
