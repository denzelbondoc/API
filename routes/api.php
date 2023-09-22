<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowerController;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('ab', function(){
return 'Hello';
});

//Book Routes
Route::post('/book/create',[BookController::class, 'createBook']);
Route::get('/listbook/show',[BookController::class, 'list']);
Route::post('/update/book',[BookController::class, 'update']);
Route::delete('/delete/book',[BookController::class, 'destroy']);
Route::post('/restore/book',[BookController::class, 'restore']);

//Borrower Routes
Route::post('/borrower/create',[BorrowerController::class, 'create']);
Route::get('/listborrower/show',[BorrowerController::class, 'list']);
Route::post('/update/borrower',[BorrowerController::class, 'update']);
Route::delete('/delete/borrower',[BorrowerController::class, 'destroy']);
Route::post('/restore/borrower',[BorrowerController::class, 'restore']);

Route::get('/new/listbook', function(){
    $data = Http::get("192.168.1.17:8000/api/book/list");
   
    $books = $data->json('data');
    foreach($books as $book){
        dd($book);
        
        Book::create([
            'title'=> $book['title'],
            'author'=> "Juan D",
            'year_of_release'=>now()
        ]);
    }
});