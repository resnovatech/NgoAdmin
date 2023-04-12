<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ngorenewinfo extends Model
{
    use HasFactory;


    public $table = "ngorenewinfos";

    protected $fillable = [
        'registration_number',
        'organization_name',
        'organization_address',
        'address_of_head_office',
        'country_of_origin',
        'name_of_head_in_bd',
        'job_type',
        'address',
        'phone',
        'phone_new',
        'email',
        'email_new',
        'telephone_number',
        'telephone_number_new',
        'citizenship',
        'profession',
        'plan_of_operation',
        'district',
        'sub_district',
        'fee_paid_status',
        'supporting_paper',
        'foregin_pdf',
        'yearly_budget',
        'copy_of_chalan',
        'ngo_id',
        'user_id',
        'main_account_type',
        'due_vat_pdf',
        'main_account_number',
        'change_ac_number',
        'main_account_name_of_branch',
        'name_of_bank',
        'bank_address_main',
        'web_site_name',
        'mobile_new',
        'mobile',

    ];
}
