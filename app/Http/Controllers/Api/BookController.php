<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::orderBy('created_at', 'desc')->get();
        return response()->json($books, Response::HTTP_OK);
    }

    public function show($id)
    {
        $book = Book::find($id);
        if (!$book) {
            return response()->json(['message' => 'Not Found'], Response::HTTP_NOT_FOUND);
        }
        return response()->json($book, Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:150',
            'author' => 'required|string|max:100',
            'year' => 'nullable|integer|max:' . date('Y'),
        ]);

        $book = Book::create($validated);
        return response()->json($book, Response::HTTP_CREATED);
    }

    public function update(Request $request, $id)
    {
        $book = Book::find($id);
        if (!$book) {
            return response()->json(['message' => 'Not Found'], Response::HTTP_NOT_FOUND);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:150',
            'author' => 'required|string|max:100',
            'year' => 'nullable|integer|max:' . date('Y'),
        ]);

        $book->update($validated);
        return response()->json($book, Response::HTTP_OK);
    }

    public function destroy($id)
    {
        $book = Book::find($id);
        if (!$book) {
            return response()->json(['message' => 'Not Found'], Response::HTTP_NOT_FOUND);
        }

        $book->delete();
        return response()->json(['message' => 'Book deleted successfully'], Response::HTTP_OK);
    }
}


