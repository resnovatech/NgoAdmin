<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ngo_member_doc extends Model
{
    use HasFactory;


    public $table = "ngo_member_docs";

    protected $fillable = [
        'person_name',
        'person_image',
        'person_nid_copy',
        'person_nid_copy_size',
        'ngo_id',
        'main_time',
        'user_id',

    ];
}
