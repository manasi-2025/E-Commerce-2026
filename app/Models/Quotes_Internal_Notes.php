<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotes_Internal_Notes extends Model
{
    use HasFactory;

    protected $table = 'quotes_internal_note';

    protected $fillable = [
        'quote_id',
        'posted_by',
        'note'
    ];

}
