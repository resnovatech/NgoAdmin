<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ngo_committee_member extends Model
{
    use HasFactory;


    public $table = "ngo_committee_members";

    protected $fillable = [
        'name',
        'name_slug',
        'desi',
        'dob',
        'nid_no',
        'phone',
        'father_name',
        'present_address',
        'permanent_address',
        'name_supouse',
        'edu_quali',
        'profession',
        'job_des',
        'service_status',
        'remarks',
        'main_date',
        'total_year',
        'to_date',
        'form_date',
        'main_time',
        'ngo_id',
        'user_id',
        'complete_status',
        's_pdf',
        'image',

    ];
}
