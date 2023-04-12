<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ngo_type_and_language extends Model
{
    use HasFactory;

    public $table = "ngo_type_and_languages";

    protected $fillable = [
        'ngo_type',
        'ngo_language',
        'second_form_check_status',
        'first_form_check_status',
        'ngo_id',
        'main_time',
        'user_id',

    ];
}
