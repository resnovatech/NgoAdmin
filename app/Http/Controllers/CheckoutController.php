<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\Orderdetail;
use Session;
class CheckoutController extends Controller
{
    public function checkout_data(Request $request){


        Session::put('customer_name', $request->name);
        Session::put('customer_phone', $request->phone);


        $input = $request->all();
        $new_save = new Order();
        $new_save->order_id =random_int(100000, 999999);
        $new_save->table_number =$request->table_no;
        $new_save->name =$request->name;
        $new_save->address_ip =$request->ip();
        $new_save->phone =$request->phone;
        $new_save->delivery_status ='pending';
        $new_save->qr_code_status ='pending';
        $new_save->save();

        $order_id = $new_save->id;
        $token_number = $new_save->order_id;


        $cartCollection = \Cart::getContent();
        foreach ($cartCollection as $cartProduct){

            $new_insert = new Orderdetail();
               $new_insert->item_name = $cartProduct->name;
               $new_insert->item_price = $cartProduct->price;
               $new_insert->item_quantity = $cartProduct->quantity;
               $new_insert->order_id = $order_id;
               $new_insert->save();

        }


        \Cart::clear();
return redirect('success_page/'.$request->table_data_raw.'/'.$token_number);

    }
}
