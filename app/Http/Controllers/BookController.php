<?php

namespace App\Http\Controllers;

use App\Http\Requests\createBookRequest;
use App\Http\Requests\DeleteBookRequest;
use App\Http\Requests\ListBookRequest;
use App\Http\Requests\RestoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function createBook(createBookRequest $request)
    {
        $fields = $request->validated();

        $book = Book::create($fields);

        return response()->json([
            'message' => 'Successfully Created Book',
            'book' => $book
        ]);
    }

    public function list(ListBookRequest $request)
    {
        $fields = $request->validated();
        $fields['term'] = $fields['term']?? '';
        

        $book = Book::where('title','ilike',"%{$fields['term']}%")->orWhere('author','ilike',"%{$fields['term']}%")->get();
        
        return response()->json([
            'message' => 'Successfully Created Book List',
            'book' => $book
        ]);
    }

    public function update(UpdateBookRequest $request)
    {
        $fields = $request->validated();

        $book = Book::find($fields['id']);
        
        $book->update([

            "title" =>$fields['title'],
            "author" =>$fields['author'],
            "year_of_release" =>$fields['year_of_release']
        ]);

        return response()->json([
            'message' => 'Successfully Created Updated Book',
            'book' => $book
        ]);
    }

    public function destroy(DeleteBookRequest $request)
    {
        $fields = $request->validated();

        $book = Book::find($fields['id'])->delete();

        return response()->json([
            'message' => 'Successfully Deleted Book',
            'book' => $book
        ]);
    }

    public function restore(RestoreBookRequest $request)
    {
        $fields = $request->validated();

        $book = Book::withTrashed()->find($fields['id'])->restore();

        return response()->json([
            'message' => 'Successfully Deleted Book',
            'book' => $book
        ]);
    }
}
