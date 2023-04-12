<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fdoneformadviser extends Model
{
    use HasFactory;

    public $table = "fdoneformadvisers";

    protected $fillable = [
        'name',
        'information',
         'main_time',
         'ngo_id',
        'user_id',

    ];
}
