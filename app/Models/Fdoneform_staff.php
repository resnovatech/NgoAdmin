<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fdoneform_staff extends Model
{
    use HasFactory;


    public $table = "fdoneform_staffs";

    protected $fillable = [
        'name',
        'position',
        'address',
        'date_of_join',
        'citizenship',
        'salary_statement',
        'other_occupation',
        'main_time',
        'now_working_at',
        'ngo_id',
        'user_id',
      
    ];
}
