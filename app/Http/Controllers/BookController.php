<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Book;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        return View("books.index", [ 'books' => Book::orderByDesc("id")->paginate(5) ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        return View('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookRequest $request): RedirectResponse
    {
        Book::create($request->all());

        return redirect()->route('book.index')->with('success', __("books.created_ok"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return View('books.edit', ["item" => Book::findorfail($id) ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BookRequest $request, Book $book): RedirectResponse
    {
        $book->update($request->all());

        return redirect()->route('book.index')->with('success',__("books.updated_ok"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book): RedirectResponse
    {
        $book->delete();

        return redirect()->route('book.index')->with('success', __("books.deleted_ok"));
    }
}
