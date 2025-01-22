<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParentNoteForConstitution extends Model
{
    use HasFactory;

    protected $table = "parent_note_for_constitutions";
    protected $fillable = [
        'nothi_detail_id',
        'serial_number',
        'subject',
        'name'
    ];
}
