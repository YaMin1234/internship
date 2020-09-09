<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Mail\NewUserNotification;
use App\Notifications\InvoicePaid;
use App\Order;
use App\OrderDetail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function sendNotification($id)
    {
       $order = Order::where('order_id',$id)->first();
       $customer_id = $order->customer_id;
      $customer = Customer::where('customer_id',$customer_id)->first();
      $user = User::all()->first();
      
           $details = [
            'greeting'=>$customer->customer_name,
            'body'=>'notification from Food Delivery',
            'thanks'=>'Thank you for using Food Delivery!',
            'actionText'=>'View my site',
            'actionURL'=>url('/foodDelivery'),
             'order_id'=>$id
        ];
    $user->notify(new InvoicePaid($details));
        dd('done');
    }

    public function sendMail($id)
    {
       $order = Order::where('order_id',$id)->first();
       $customer_id = $order->customer_id;
       $customer = Customer::where('customer_id',$customer_id)->first();
    
       
        Mail::to($customer->customer_email)->send(new NewUserNotification($id)); 
    
        return 'A message has been sent to Mailtrap!';
    }
    
    public function invoice($id)
    {
   
    return view('mails.invoice');
    }
}
