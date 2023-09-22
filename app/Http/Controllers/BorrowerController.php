<?php

namespace App\Http\Controllers;

use App\Http\Requests\createBorrowerRequest;
use App\Http\Requests\DeleteBorrowerRequest;
use App\Http\Requests\ListBorrowerRequest;
use App\Http\Requests\RestoreBorrowerRequest;
use App\Http\Requests\UpdateBorrowerRequest;
use App\Models\Borrower;
use Illuminate\Http\Request;

class BorrowerController extends Controller
{
   public function create(createBorrowerRequest $request)
   {
    $fields = $request->validated();

    $borrower = Borrower::create($fields);

    return response()->json([
        'messsage' => 'Successfully Created Borrower',
        'borrower' => $borrower
    ]);
   }

   public function list(ListBorrowerRequest $request)
   {
        $fields = $request->validated();
        $fields['term'] = $fields['term']?? '';

        $borrower = Borrower::where('name','ilike',"%{$fields['term']}%")->orWhere('contact_number','ilike',"%{$fields['term']}%")->get();

        return response()->json([
            'message'=> 'Successfully Created Book List',
            'borrower'=>$borrower
        ]);
   }

   public function update(UpdateBorrowerRequest $request)
   {
        $fields = $request->validated();

        $borrower = Borrower::find($fields['id']);

        $borrower->update([
            "name"=>$fields['name'],
            "contact_number"=>$fields['contact_number'],
            "book_id"=>$fields['book_id'],
            "borrowed_date"=>$fields['borrowed_date'],
            "return_date"=>$fields['return_date'],
        ]);

        return response()->json([
            'message'=> 'Successfully Updated Borrower',
            'borrower'=>$borrower
        ]);
   }

   public function destroy(DeleteBorrowerRequest $request)
   {
    $fields = $request->validated();

    $borrower = Borrower::find($fields['id'])->delete();

    return response()->json([
        'message'=> 'Succesfully Deleted Borrower',
        'borrower'=> $borrower
    ]);
   }

   public function restore(RestoreBorrowerRequest $request)
   {
    $fields = $request->validated();

    $borrower = Borrower::withTrashed()->find($fields['id'])->restore();

    return response()->json([
        'message'=>'Succefully Restored Borrower',
        'borrower'=>$borrower
    ]);
   }
    
}
