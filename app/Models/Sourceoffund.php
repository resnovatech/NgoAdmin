<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sourceoffund extends Model
{
    use HasFactory;

    public $table = "sourceoffunds";

    protected $fillable = [
        'user_id',
        'ngo_id',
        'main_time',
        'address',
        'name',
        'letter_file',

    ];
}
