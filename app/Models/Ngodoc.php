<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ngodoc extends Model
{
    use HasFactory;

    public $table = "ngodocs";

    protected $fillable = [
        'primary_portal',
        'primary_portal_size',
        'ngo_id',
        'main_time',
        'user_id',

    ];
}
