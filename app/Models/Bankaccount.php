<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bankaccount extends Model
{
    use HasFactory;


    public $table = "bankaccounts";

    protected $fillable = [
        'user_id',
        'ngo_id',
        'account_number',
        'account_type',
        'name_of_bank',
        'branch_name_of_bank',
        'bank_address',
    ];
}
