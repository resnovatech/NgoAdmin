<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acounntotherinfo extends Model
{
    use HasFactory;


    public $table = "acounntotherinfos";

    protected $fillable = [
        'user_id',
        'ngo_id',
        'information_type',
    ];
}
