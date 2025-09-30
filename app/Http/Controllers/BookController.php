<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::orderBy('created_at', 'desc')->get();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:150',
            'author' => 'required|string|max:100',
            'year' => 'nullable|integer|max:' . date('Y')
        ]);

        Book::create($validated);
        
        return redirect()->route('books.index')
                        ->with('success', 'Buku berhasil ditambahkan!');
    }

    public function show($id)
    {
        $book = Book::findOrFail($id);
        return response()->json($book);
    }

    public function edit($id)
    {
        $book = Book::findOrFail($id);
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);
        
        $validated = $request->validate([
            'title' => 'required|string|max:150',
            'author' => 'required|string|max:100',
            'year' => 'nullable|integer|max:' . date('Y')
        ]);

        $book->update($validated);
        
        return redirect()->route('books.index')
                        ->with('success', 'Buku berhasil diupdate!');
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();
        
        return redirect()->route('books.index')
                        ->with('success', 'Buku berhasil dihapus!');
    }
}