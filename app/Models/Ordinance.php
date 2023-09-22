<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ordinance extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'document_id', 
        'approved_no.',
        'approved_date'

    ]; 

}
