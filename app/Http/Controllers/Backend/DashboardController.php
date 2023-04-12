<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\Ngostatus;
use App\Models\Renew;
use App\Models\Namechange;
use DB;
use Carbon\Carbon;
use App\Models\SystemInformation;
class DashboardController extends Controller
{
	public $user;


    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }
    public function index(){
if (is_null($this->user) || !$this->user->can('dashboard.view')) {
            // abort(403, 'Sorry !! You are Unauthorized to view dashboard !');

            return redirect('/admin/logout_session');
        }


        $ins_vat = SystemInformation::value('vat');






        $count_admin = Admin::where('id','!=',1)->count();

        $totalRegisteredNgo = Ngostatus::where('status','Accepted')->count();
        $totalRejectedNgo = Ngostatus::where('status','Rejected')->count();



        $totalRenewNgoRequest = Renew::count();
        $totalRejectedRenewNgoRequest = Renew::where('status','Rejected')->count();

        $totalNameChangeNgoRequest = Namechange::count();
        $totalRejectedNameChangeNgoRequest = Namechange::where('status','Rejected')->count();

$all_data_for_new_list = Ngostatus::where('status','Ongoing')->latest()->limit(5)->get();
$all_data_for_new_list_name_change = Namechange::where('status','Ongoing')->latest()->limit(5)->get();
$all_data_for_new_list_renew = Renew::where('status','Ongoing')->latest()->limit(5)->get();
    	return view('backend.index',compact(
'totalRegisteredNgo','totalRejectedNgo','totalRenewNgoRequest','totalRejectedRenewNgoRequest','totalNameChangeNgoRequest','totalRejectedNameChangeNgoRequest','all_data_for_new_list',
          'all_data_for_new_list_name_change',
          'all_data_for_new_list_renew',
            'count_admin',
            'ins_vat'));
    }
}
