<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
class CivilController extends Controller
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


        if (is_null($this->user) || !$this->user->can('civil_info_view')) {
            abort(403, 'Sorry !! You are Unauthorized to view !');
        }


        $country_list = DB::table('civilinfos')->orderBy('id','desc')->get();

        return view('backend.civil_info.index',compact('country_list'));


    }


    public function store(Request $request){

        if (is_null($this->user) || !$this->user->can('civil_info_add')) {
            abort(403, 'Sorry !! You are Unauthorized to view !');
        }

        DB::table('civilinfos')->insert(
            [
                'division' =>$request->division,
                'division_bn' =>$request->division_bn,
                'district' =>$request->district,
                'district_bn' =>$request->district_bn,
                'thana' =>$request->thana,
                'thana_bn' =>$request->thana_bn
            ]
            );



            return redirect()->back()->with('success','Created Successfully');


    }


    public function update(Request $request){
        if (is_null($this->user) || !$this->user->can('civil_info_update')) {
            abort(403, 'Sorry !! You are Unauthorized to view !');
        }
        DB::table('civilinfos')
            ->where('id', $request->id)
            ->update([
                'division' =>$request->division,
                'division_bn' =>$request->division_bn,
                'district' =>$request->district,
                'district_bn' =>$request->district_bn,
                'thana' =>$request->thana,
                'thana_bn' =>$request->thana_bn
            ]);

            return redirect()->back()->with('info','Updated Successfully');
    }


    public function delete($id)
    {
        //dd(1);
        if (is_null($this->user) || !$this->user->can('civil_info_delete')) {
            abort(403, 'Sorry !! You are Unauthorized to view any country !');
        }
        $admins = DB::table('civilinfos')->where('id',$id)->delete();



        return back()->with('error','Deleted successfully!');
    }
}
