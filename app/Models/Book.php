<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'title',
        'author',
        'year_of_release'  

    ];

    public function borrowers(){
        return $this->belongsToMany(Borrower::class);
    }
}