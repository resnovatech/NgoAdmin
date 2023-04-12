<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Menudetail;
use App\Models\Menulist;
use App\Models\Order;
class SearchController extends Controller
{
    public function search(Request $request){


        $search_list_product = Product::where('name','LIKE','%'.$request->main_search.'%')
        ->latest()->get();

        //$id = $request->main_search_dis;


        $tt = base64_decode($request->main_search_dis);

        $encode_data = $tt;

        $title_name = $request->main_search_dis;

        $id = $request->main_search_dis;

       // dd($request->main_search);

       $search_list_menu =Menulist::where('menu_name','LIKE','%'.$request->main_search.'%')->get();

        return view('new_front.search',compact('search_list_menu','title_name','encode_data','search_list_product','id'));





    }

    public function main_history_search(Request $request){
        $search_list_product = Product::where('name','LIKE','%'.$request->search_value.'%')
        ->latest()->get();

        $search_value_t = $request->search_value_t;

        $data = view('new_front.search',compact('search_list_product','search_value_t'))->render();


        return response()->json($data);

    }


    public function menu_wise_search(Request $request){


        $item_list =Menulist::where('menu_name',$request->catch_data)->value('id');



                $search_list_product =Menulist::where('menu_name','LIKE','%'.$request->search_value.'%')->get();

                   $search_value_t = $request->search_value_t;

                $data = view('new_front.menu_wise_search',compact('search_value_t','search_list_product'))->render();


                return response()->json($data);


    }


    public function order_history_search(Request $request){

        $clientIP = \Request::getClientIp(true);
        //return $request->search_value;

        $order_id_search = Order::where('address_ip',$clientIP)->where('order_id','LIKE','%'.$request->search_value.'%')->latest()->get();
        $data = view('front.order_history_search',compact('order_id_search',))->render();


                return response()->json($data);
    }
}
