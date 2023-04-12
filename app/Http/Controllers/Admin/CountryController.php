<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
class CountryController extends Controller
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


        if (is_null($this->user) || !$this->user->can('country_view')) {
            abort(403, 'Sorry !! You are Unauthorized to view !');
        }


        $country_list = DB::table('country')->orderBy('id','desc')->get();

        return view('backend.country.index',compact('country_list'));


    }


    public function store(Request $request){

        if (is_null($this->user) || !$this->user->can('country_add')) {
            abort(403, 'Sorry !! You are Unauthorized to view !');
        }

        DB::table('country')->insert(
            ['name' =>$request->name, 'name_bn' =>$request->name_bn,'city_eng' =>$request->city_eng, 'city_bangla' =>$request->city_bangla]
            );



            return redirect()->back()->with('success','Created Successfully');


    }


    public function update(Request $request){
        if (is_null($this->user) || !$this->user->can('country_update')) {
            abort(403, 'Sorry !! You are Unauthorized to view !');
        }
        DB::table('country')
            ->where('id', $request->id)
            ->update(['name' =>$request->name, 'name_bn' =>$request->name_bn,'city_eng' =>$request->city_eng, 'city_bangla' =>$request->city_bangla]);

            return redirect()->back()->with('info','Updated Successfully');
    }


    public function delete($id)
    {
        //dd(1);
        if (is_null($this->user) || !$this->user->can('country_delete')) {
            abort(403, 'Sorry !! You are Unauthorized to view any country !');
        }
        $admins = DB::table('country')->where('id',$id)->delete();



        return back()->with('error','Deleted successfully!');
    }
}
