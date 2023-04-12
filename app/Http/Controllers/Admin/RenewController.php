<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
Use DB;
use Mail;
use App\Models\Ngostatus;
use App\Models\Namechange;
use App\Models\Renew;
use App\Models\Duration;
use Carbon\Carbon;
class RenewController extends Controller
{
    public $user;


    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }







    public function new_renew_list(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('register_new_list')) {
            abort(403, 'Sorry !! You are Unauthorized to view !');
        }


        $all_data_for_new_list = Renew::where('status','Ongoing')->latest()->get();


      return view('backend.renew_list.new_renew_list',compact('all_data_for_new_list'));
    }


    public function revision_renew_list(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('register_new_list')) {
            abort(403, 'Sorry !! You are Unauthorized to view !');
        }


        $all_data_for_new_list = Renew::where('status','Rejected')->latest()->get();


      return view('backend.renew_list.revision_renew_list',compact('all_data_for_new_list'));
    }


    public function already_renew_list(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('register_new_list')) {
            abort(403, 'Sorry !! You are Unauthorized to view !');
        }


        $all_data_for_new_list = Renew::where('status','Accepted')->latest()->get();


      return view('backend.renew_list.already_renew_list',compact('all_data_for_new_list'));
    }


    public function renew_view($id){





             try {

            $r_status = Ngostatus::where('user_id',$id)->value('status');
            $name_change_status = Namechange::where('user_id',$id)->value('status');
            $renew_status = Renew::where('user_id',$id)->value('status');


            $all_data_for_new_list_all = Ngostatus::where('user_id',$id)->first();
            $form_one_data = DB::table('fboneforms')->where('user_id',$all_data_for_new_list_all->user_id)->first();
            $form_eight_data = DB::table('ngo_committee_members')->where('user_id',$all_data_for_new_list_all->user_id)->get();
            $form_member_data = DB::table('ngomembers')->where('user_id',$all_data_for_new_list_all->user_id)->get();


            $form_member_data_doc_renew = DB::table('ngorenewinfos')->where('user_id',$all_data_for_new_list_all->user_id)->get();


 $duration_list_all1 = DB::table('durations')->where('user_id',$all_data_for_new_list_all->user_id)->value('end_date');
            $duration_list_all = DB::table('durations')->where('user_id',$all_data_for_new_list_all->user_id)->value('start_date');

            $form_member_data_doc = DB::table('ngo_member_docs')->where('user_id',$all_data_for_new_list_all->user_id)->get();
            $form_ngo_data_doc = DB::table('ngodocs')->where('user_id',$all_data_for_new_list_all->user_id)->get();

            $users_info = DB::table('users')->where('id',$all_data_for_new_list_all->user_id)->first();

            $all_source_of_fund = DB::table('sourceoffunds')->where('user_id',$all_data_for_new_list_all->user_id)->get();

            $all_partiw = DB::table('fdoneform_staffs')->where('user_id',$all_data_for_new_list_all->user_id)->get();


            $get_all_data_adviser_bank = DB::table('bankaccounts')->where('user_id',$all_data_for_new_list_all->user_id)
            ->first();


            $get_all_data_other= DB::table('acounntotherinfos')->where('user_id',$all_data_for_new_list_all->user_id)
            ->get();

            $get_all_data_adviser = DB::table('fdoneformadvisers')->where('user_id',$all_data_for_new_list_all->user_id)
    ->get();


            //dd($users_info);
        } catch (Exception $e) {



            return $e->getMessage();

        }



        return view('backend.registration_list.registration_view',compact('duration_list_all1','duration_list_all','renew_status','name_change_status','r_status','form_member_data_doc_renew','get_all_data_adviser','get_all_data_other','get_all_data_adviser_bank','all_partiw','all_source_of_fund','users_info','form_ngo_data_doc','form_member_data_doc','form_member_data','form_eight_data','all_data_for_new_list_all','form_one_data'));
    }


    public function update_status_renew_form(Request $request){

        $data_save = Renew::find($request->id);
        $data_save->status = $request->status;
        $data_save->save();

$get_user_id = Renew::where('id',$request->id)->value('user_id');
        if($request->status == 'Accepted'){

            $date = date('Y-m-d');
    $newDate = date('Y-m-d', strtotime($date. ' + 10 years'));



        $data_save = new Duration();
        $data_save->user_id = $get_user_id;
        $data_save->status = $request->status;
        $data_save->end_date = $newDate;
        $data_save->start_date =date('Y-m-d');
        $data_save->save();
        }

        Mail::send('emails.passwordResetEmail', ['id' => $request->status], function($message) use($request){
            $message->to($request->email);
            $message->subject('NGO AB');
        });

        return redirect()->back()->with('success','Updated Successfully');
    }
}
