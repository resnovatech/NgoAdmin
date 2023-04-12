<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Renew extends Model
{
    use HasFactory;


    public $table = "renews";

    protected $fillable = [
        'user_id',
        'ngo_id',
        'main_time',
        'status',

    ];
}
