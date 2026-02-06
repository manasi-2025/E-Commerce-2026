<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotes extends Model
{
    use HasFactory;

    protected $table = 'quote_table';

    protected $fillable = [ 'quote_number' ,'claim_hadOne' , 'claimKnowOne' , 'specialTerms' , 'status'];


}
