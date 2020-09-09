<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NewUserNotification extends Mailable
{
    use Queueable, SerializesModels;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    private $order_id;
    public function __construct($id)
    {
        $this->order_id = $id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      $order_id = $this->order_id;
      
      $order = DB::table('orders')->where('order_id',$order_id)
                                         ->first();
    
      $email =  Auth::user()->email;
        
        if($order->order_status==0)
        {
            $view = 'mails.confirmMail';
        }
        elseif($order->order_status==1)
        {
            $view = 'mails.prepareMail';
        }
        elseif($order->order_status==2)
        {
            $view = 'mails.deliverMail';
        }
        
          return $this->from($email, 'Mailtrap')
            ->subject('Mailtrap Confirmation')
            ->markdown($view)
            ->with([
               
             'actionURL'=>route('invoice',$this->order_id),
            ]);
         
         
         
        //  if($order_status=1)
         
        // return $this->from($email, 'Mailtrap')
        //     ->subject('Mailtrap Confirmation')
        //     ->markdown('mails.prepareMail')
        //     ->with([
               
        //         'actionURL'=>route('invoice',$this->order_id),
        //     ]);
         
        //  if($order_status=2)
         
        // return $this->from($email, 'Mailtrap')
        //     ->subject('Mailtrap Confirmation')
        //     ->markdown('mails.deliverMail')
        //     ->with([
               
        //         'actionURL'=>route('invoice',$this->order_id),
        //     ]);
         
        
    }
}
