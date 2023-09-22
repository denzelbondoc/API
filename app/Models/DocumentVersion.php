<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DocumentVersion extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'version',
        'document_id'
    ];
}
