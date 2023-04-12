<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Brand;
use App\Models\Tax;
use App\Models\Unit;
use App\Models\Vendor;
use App\Models\Warehouse;
use App\Models\Product;
use App\Models\Sell;
use App\Models\Selldetail;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;
use PDF;
class SellController extends Controller
{
    public $user;


    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }


    public function index()
    {
        if (is_null($this->user) || !$this->user->can('sell_view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any product !');
        }
        $users = Sell::latest()->get();


        return view('backend.sell.index', compact('users'));
    }


    public function create()
    {
        if (is_null($this->user) || !$this->user->can('sell_add')) {
            abort(403, 'Sorry !! You are Unauthorized to view any sell !');
        }
        $vendor_list = Vendor::all();
        $cat_list = Category::all();
        $sub_cat_list = Subcategory::all();
        $brand_list = Brand::all();
        $tax_list = Tax::all();
        $unit_list = Unit::all();
        $warehouse_list = Warehouse::all();
        $client_list_all=Client::all();
        $main_product_list_all = Product::all();

        return view('backend.sell.create', compact('main_product_list_all','client_list_all','vendor_list','cat_list','sub_cat_list','brand_list','tax_list','unit_list','warehouse_list'));
    }


    public function sell_information_price(Request $request){

        $main_product_price = Product::where('id',$request->main_product_id)->value('selling_price');

        $data = $main_product_price;
        return response()->json($data);

    }


    public function sell_information_tax(Request $request){

        $main_product_price = Product::where('id',$request->main_product_id)->value('tax');

        $data = $main_product_price;
        return response()->json($data);

    }



    public function sell_information_after_tax_price(Request $request){

        $main_product_price = Product::where('id',$request->main_product_id)->value('price_with_tax');

        $data = $main_product_price;
        return response()->json($data);

    }


    public function store (Request $request){

        $input = $request->all();

        $s_pay_date = date("Y-m-d", strtotime($request->pay_date));
        $s_due_date = date("Y-m-d", strtotime($request->due_date));


        $database_save = new Sell();
        $database_save->client_slug = $request->client_slug;
        $database_save->order_id = $request->order_id;
        $database_save->payment_term = $request->payment_term;
        $database_save->pay_date = $request->pay_date;
        $database_save->due_date = $request->due_date;
        $database_save->s_pay_date = $s_pay_date;
        $database_save->s_due_date = $s_due_date;
        $database_save->warehouse = $request->ware_house;

        $database_save->total_net_price = $request->total_net_price_f;
        $database_save->total_discount = $request->total_dis;
        $database_save->total_vat_tax = $request->total_net_price_tax;

        $database_save->grand_total = $request->total_grand_price_f;
        $database_save->total_pay = $request->total_payble_price;

        $database_save->due = $request->total_final_due;
        $database_save->save();


        $invoice_id = $database_save->id;


        $condition_main_product_id = $input['main_product_id'];

        foreach($condition_main_product_id as $key => $condition_main_product_id){
            $form= new Selldetail();
            $form->product_id=$input['main_product_id'][$key];
            $form->qty=$input['p_quantity'][$key];
            $form->price=$input['unit_price'][$key];
            $form->total_price=$input['total_amount'][$key];
            $form->tax=$input['unit_tax'][$key];
            $form->tax_price=$input['after_tax'][$key];
            $form->total_tax_price=$input['gafter_tax'][$key];
            $form->invoice_id =  $invoice_id;
            $form->client_slug = $request->client_slug;
            $form->order_id =  $request->order_id;
            $form->save();

            //first table quantity update



    $catch_previous_value = Product::where('id',$input['main_product_id'][$key])
                                       ->value('quantity');
                $get_result = $catch_previous_value - $input['p_quantity'][$key];

                $catch_previous_value1 = Product::where('id',$input['main_product_id'][$key])
                ->update([
                    'quantity' => $get_result
                 ]);
            //end first table quantity ypdate


       }

       return redirect('admin/sell_information_view/'.$invoice_id)->with('success','Created Successfully');


    }




    public function update(Request $request){

        $input = $request->all();

        $s_pay_date = date("Y-m-d", strtotime($request->pay_date));
        $s_due_date = date("Y-m-d", strtotime($request->due_date));


        $database_save = Sell::find($request->id);
        $database_save->client_slug = $request->client_slug;
        $database_save->order_id = $request->order_id;
        $database_save->payment_term = $request->payment_term;
        $database_save->pay_date = $request->pay_date;
        $database_save->due_date = $request->due_date;
        $database_save->s_pay_date = $s_pay_date;
        $database_save->s_due_date = $s_due_date;
        $database_save->warehouse = $request->ware_house;

        $database_save->total_net_price = $request->total_net_price_f;
        $database_save->total_discount = $request->total_dis;
        $database_save->total_vat_tax = $request->total_net_price_tax;

        $database_save->grand_total = $request->total_grand_price_f;
        $database_save->total_pay = $request->total_payble_price;

        $database_save->due = $request->total_final_due;
        $database_save->save();


        $invoice_id = $database_save->id;


        $condition_main_product_id = $input['main_product_id'];
        Selldetail::where('invoice_id',$invoice_id)->delete();
        foreach($condition_main_product_id as $key => $condition_main_product_id){
            $form= new Selldetail();
            $form->product_id=$input['main_product_id'][$key];
            $form->qty=$input['p_quantity'][$key];
            $form->price=$input['unit_price'][$key];
            $form->total_price=$input['total_amount'][$key];
            $form->tax=$input['unit_tax'][$key];
            $form->tax_price=$input['after_tax'][$key];
            $form->total_tax_price=$input['gafter_tax'][$key];
            $form->invoice_id =  $invoice_id;
            $form->client_slug = $request->client_slug;
            $form->order_id =  $request->order_id;
            $form->save();

            if(($input['main_product_id'][$key] == $input['p_p_id'][$key]) && ($input['p_quantity'][$key] == $input['d_quantity'][$key])){


            }else{

            //first table quantity update



    $catch_previous_value = Product::where('id',$input['main_product_id'][$key])
                                       ->value('quantity');
                $get_result = $catch_previous_value - $input['p_quantity'][$key];

                $catch_previous_value1 = Product::where('id',$input['main_product_id'][$key])
                ->update([
                    'quantity' => $get_result
                 ]);
            //end first table quantity ypdate

                }
       }

       return redirect('admin/sell_information_view/'.$invoice_id)->with('success','Updated Successfully');


    }




    public function view($id){

        $client_list_all = Client::latest()->get();

        $main_product_list_all =Product::latest()->get();

        $invoice =  Sell::where('id',$id)->first();
        $invoice_detail = Selldetail::where('invoice_id',$id)->get();

        $warehouse_list = Warehouse::all();





        return view('backend.sell.view',compact('client_list_all','main_product_list_all','invoice','invoice_detail','warehouse_list'));

    }


    public function edit($id){

        if (is_null($this->user) || !$this->user->can('sell_update')) {
            //abort(403, 'Sorry !! You are Unauthorized to view Product List !');

             return redirect('/admin/logout_session');
        }

        $client_list_all = Client::latest()->get();

        $main_product_list_all =Product::latest()->get();

        $invoice =  Sell::where('id',$id)->first();
        $invoice_detail = Selldetail::where('invoice_id',$id)->get();

        $warehouse_list = Warehouse::all();





        return view('backend.sell.edit',compact('client_list_all','main_product_list_all','invoice','invoice_detail','warehouse_list'));

    }


    public function delete($id)
    {
        //dd(1);
        if (is_null($this->user) || !$this->user->can('sell_delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any data !');
        }
        $admins = Sell::find($id);
        if (!is_null($admins)) {
            $admins->delete();
        }

        return redirect('admin/sell_information')->with('error','Deleted Successfully');
    }



    public function print($id){

        $invoice =  Sell::where('id',$id)->first();
        $invoice_detail = Selldetail::where('invoice_id',$id)->get();

        $client_list_all = Client::latest()->get();

        $main_product_list_all =Product::latest()->get();

        $warehouse_list = Warehouse::all();

        $file_Name_Custome = 'Invoice_main';


    $pdf=PDF::loadView('backend.sell.print',['client_list_all'=>$client_list_all,'invoice'=>$invoice,'main_product_list_all'=>$main_product_list_all,'invoice_detail'=>$invoice_detail,'warehouse_list'=>$warehouse_list],[],['format' => [75, 100]]);
return $pdf->stream($file_Name_Custome.''.'.pdf');

    }
}
