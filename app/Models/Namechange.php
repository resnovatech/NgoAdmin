<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Namechange extends Model
{
    use HasFactory;


    public $table = "namechanges";

    protected $fillable = [
        'previous_name_eng',
        'previous_name_ban',
        'present_name_eng',
        'present_ban',
        'status',
        'main_time',
        'user_id',

    ];
}
