<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Order;
use Illuminate\Contracts\Session\Session as SessionSession;
use Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session as FacadesSession;
use Symfony\Component\HttpFoundation\Session\Session as HttpFoundationSessionSession;

class CheckoutController extends Controller
{
    public function login_check()
    {
    	return view('pages.login');
    }

    public function customer_registration(Request $request)
    {
      $data=array();
      $data['customer_name']=$request->customer_name;
      $data['customer_email']=$request->customer_email;
      $data['password']=md5($request->password);
      $data['mobile_number']=$request->mobile_number;

        $customer_id=DB::table('customers')
                     ->insertGetId($data);

               session()->put('customer_id',$customer_id);
               session()->put('customer_name',$request->customer_name);
               return Redirect('/checkout');      

    }

    public function checkout()
    {
    	
      return view('pages.checkout');


    }

    public function save_shipping_details(Request $request)
    {

      $data=array();
      $data['shipping_email']=$request->shipping_email;
      $data['shipping_name']=$request->shipping_name;
      $data['shipping_address']=$request->shipping_address;
      $data['shipping_mobile_number']=$request->shipping_mobile_number;
      $data['shipping_city']=$request->shipping_city;

        $shipping_id=DB::table('shippings')
                     ->insertGetId($data);
           session()->put('shipping_id',$shipping_id);
           return Redirect::to('/payment'); 

    }

    public function customer_login(Request $request)
    {
      $customer_email=$request->customer_email;
      $password=md5($request->password);
      $result=DB::table('customers')
              ->where('customer_email',$customer_email)
              ->where('password',$password)
              ->first();

             if ($result) {
               
               session()->put('customer_id',$result->customer_id);
               return Redirect::to('/checkout');
             }else{
                
                return Redirect::to('/login_check');
             }
    }
  
    public function payment()
    {
      return view('pages.payment');
    }
    
    public function order_place(Request $request)
    {
      $payment_gateway=$request->payment_method;

      // $total=Cart::total();
      // echo $total;
      
      $pdata=array();
      $pdata['payment_method']=$payment_gateway;
      $pdata['payment_status']='pending';
      $payment_id=DB::table('payments')
             ->insertGetId($pdata);
  

      $odata=array();
      $odata['customer_id']=session()->get('customer_id');
      $odata['shipping_id']=session()->get('shipping_id');
      $odata['payment_id']=$payment_id;
      $odata['order_total']=$request->total;
      $odata['order_status']='0';
      $order_id=DB::table('orders')
               ->insertGetId($odata);
  
    
     $oddata=array();

     foreach(session('cart') as $id => $details)
     {
        $oddata['order_id']=$order_id;
        $oddata['menu_id']=$id;
        $oddata['menu_name']=$details['name'];
        $oddata['menu_price']=$details['price'];
        $oddata['menu_sales_quantity']=$details['quantity'];

        DB::table('order_details')
            ->insert($oddata);

     }

     if ($payment_gateway=='cash') 
     {
        session()->forget('cart');
          return view('pages.handcash');
         
        
     }elseif ($payment_gateway=='card') {
   
      echo "card";
      
     }  
     else{
      echo "not selected";
     }


    }

    public function manage_order()
    {
     
      $all_order_info=DB::table('orders')
                     ->join('customers','orders.customer_id','=','customers.customer_id')
                     ->select('orders.*','customers.customer_name')
                     ->get();

      
       return view('restaurants.manageOrder',compact('all_order_info'));
              

    }

  public function view_order($order_id)
  {
      $order_by_id=DB::table('orders')
              ->join('customers','orders.customer_id','=','customers.customer_id')
              ->join('order_details','orders.order_id','=','order_details.order_id')
              ->join('shippings','orders.shipping_id','=','shippings.shipping_id')
              ->select('orders.*','order_details.*','shippings.*','customers.*')
              ->where('orders.order_id',$order_id)
              ->get();

       
       return view('restaurants.viewOrder',compact('order_by_id'));

  }

   public function prepared_order($order_id)
    {
          DB::table('orders')
              ->where('order_id',$order_id)
              ->update(['order_status' => 1]);
          session()->put('message','Food being prepared!! ');
              return Redirect::to('manage-order');
    }

    public function delivered_order($order_id)
    {
          DB::table('orders')
              ->where('order_id',$order_id)
              ->update(['order_status' => 2]);
        session()->put('message', 'Food on the way !! ');
              return Redirect::to('manage-order');
    }
    public function pickup_order($order_id)
    {
          DB::table('orders')
              ->where('order_id',$order_id)
              ->update(['order_status' => 3]);
        session()->put('message', 'Food Pick up !! ');
              return Redirect::to('manage-order');
    }
    public function finish_order($order_id)
    {
          DB::table('orders')
              ->where('order_id',$order_id)
              ->update(['order_status' => 4]);
        session()->put('message', 'Order Complete !! ');
              return Redirect::to('manage-order');
    }

    public function destroy($order_id)
    {
     DB::table('orders')->where('order_id',$order_id)->delete();
     return Redirect::to('manage-order');
    }


    public function customer_logout(Request $request)
    {
      $request->session()->flush();
      return Redirect::to('/foodDelivery');
    }


    
}
