<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Borrower extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'name',
        'contact_number',
        'book_id',
        'borrowed_date',
        'return_date'
        
    ];
    
    public function books(){
        return $this->belongsToMany(Book::class);
    }
}
