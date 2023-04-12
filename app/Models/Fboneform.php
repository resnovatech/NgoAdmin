<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fboneform extends Model
{
    use HasFactory;


    public $table = "fboneforms";

    protected $fillable = [
        'address_of_head_office_eng',
        'registration_number',
        'organization_name',
        'organization_name_ban',
        'organization_address',
        'address_of_head_office',
        'country_of_origin',
        'name_of_head_in_bd',
        'job_type',
        'address',
        'phone',
        'email',
        'citizenship',
        'profession',
        'plan_of_operation',
        'district',
        'sub_district',
        'annual_budget',
        'treasury_number',
        'attach_the__supporting_papers',
        'vat_invoice_number',
        'board_of_revenue_on_fees',
        'ngo_id',
        'user_id',
        'main_time',
        'complete_status',
        's_pdf',
        'reg_no_get_from_admin',



    ];
}
