<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\Menulist;
use App\Models\Product;
use App\Models\Pbanner;
use App\Models\Menudetail;
use App\Models\Order;
use App\Models\Companybanner;
class FrontController extends Controller
{

    public function food_item_detail($eid ,$id){


        $tt = base64_decode($eid);

        $encode_data = $tt;

        $title_name = $id;

        $id = $eid;
        $product_list_new = Product::where('id',$title_name)->first();
        //dd($product_list_new);
        return view('new_front.food_item_detail',compact('product_list_new','encode_data','id','title_name'));

    }

    public function home_page($eid){

        $get_main_id =Session::get('get_main_id');
        $menu_list = Menulist::get();
        //dd($get_main_id);

        $tt = base64_decode($eid);

        $encode_data = $tt;

        $id = $eid;
        $product_list = Product::latest()->limit('3')->get();


        $product_list_new = Product::latest()->skip('3')->take('4')->get();


        $product_list_in_random = Product::latest()->skip('7')->limit('3')->get();

          $c_banner_list = Companybanner::where('status',1)->latest()->value('image');
        return view('new_front.home_page',compact('c_banner_list','product_list_in_random','product_list_new','product_list','id','eid','encode_data','get_main_id','menu_list'));
    }
    public function menu_list($eid){

        $get_main_id =Session::get('get_main_id');
        $menu_list = Menulist::get();
        //dd($get_main_id);

        $tt = base64_decode($eid);

        $encode_data = $tt;

        $id = $eid;


        return view('new_front.menu_list',compact('encode_data','id','get_main_id','menu_list'));


    }


    public function order_history($eid){

        $get_main_id =Session::get('get_main_id');
        $menu_list = Menulist::get();
        //dd($get_main_id);

        $tt = base64_decode($eid);

        $encode_data = $tt;

        $id = $eid;

        $offer_banner_list = Pbanner::latest()->get();

        $clientIP = \Request::getClientIp(true);


        $s_id = Session::get('m_order_id');

        if(empty($s_id)){


            $s_id_i = '123w';

        }else{
            $s_id_i = Session::get('m_order_id');

        }



        $order_id_search = Order::where('address_ip',$s_id_i)->latest()->get();

        return view('new_front.order_history',compact('order_id_search','offer_banner_list','encode_data','id','get_main_id','menu_list'));


    }



    public function offer_price($eid){

        $get_main_id =Session::get('get_main_id');
        $menu_list = Menulist::get();
        //dd($get_main_id);

        $tt = base64_decode($eid);

        $encode_data = $tt;

        $id = $eid;

        $offer_banner_list = Pbanner::latest()->get();


        return view('new_front.offer_price',compact('offer_banner_list','encode_data','id','get_main_id','menu_list'));
    }


    public function cart($eid){
        $get_main_id =Session::get('get_main_id');
        $menu_list = Menulist::get();
        //dd($get_main_id);

        $tt = base64_decode($eid);

        $encode_data = $tt;

        $id = $eid;

        $offer_banner_list = Pbanner::latest()->get();

        $cartCollection1 = \Cart::getContent();
        return view('new_front.cart',compact('cartCollection1','offer_banner_list','encode_data','id','get_main_id','menu_list'));
    }

    public function offer_item($eid ,$id){

        $item_list = Pbanner::where('slug',$id)->latest()->value('food_list');

        $item_list_type = Pbanner::where('slug',$id)->latest()->value('offer_type');

        $item_list_amount = Pbanner::where('slug',$id)->latest()->value('offer_amount');

        $separated_data_title = explode(",", $item_list );

        $final_item_list =Product::whereIn('name',$separated_data_title)->get();
        $get_main_id =Session::get('get_main_id');

        $tt = base64_decode($eid);

        $encode_data = $tt;

        $title_name = $id;

        $id = $eid;

        //dd($tt);
        return view('new_front.offer_item',compact('id','item_list_amount','item_list_type','eid','title_name','final_item_list','get_main_id','encode_data'));

    }

    public function category_wise_menu_list($eid ,$id){

        $tt = base64_decode($eid);

        $encode_data = $tt;
        $menu_list_name = Menulist::where('id',$id)->value('menu_name');

        $id_item_list = Menudetail::where('menu_id',$id)->latest()->get();

        $convert_name_title = $id_item_list->implode("item_id", " ");


$separated_data_title = explode(" ", $convert_name_title);

        $final_item_list =Product::whereIn('id',$separated_data_title)->get();

        //dd($separated_data_title);
        $id = $eid;
        return view('new_front.category_wise_menu_list',compact('id','menu_list_name','eid','id_item_list','encode_data','final_item_list'));

    }

}
