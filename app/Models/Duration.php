<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Duration extends Model
{
    use HasFactory;


    public $table = "durations";

    protected $fillable = [
        'user_id',
        'start_date',
        'end_date',
        'status',
       
    ];
}
