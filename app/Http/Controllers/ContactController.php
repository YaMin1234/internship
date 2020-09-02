<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class ContactController extends Controller
{
    public function contact() {
    	return view('pages.contact');
    }


     public function save_contact(Request $request)
   {
      $data=array();
        $data['first_name']=$request->first_name;
        $data['last_name']=$request->last_name;
        $data['email']=$request->email;
        $data['body']=$request->body;
        $data['publication_status']=$request->publication_status; 

     	

            DB::table('contacts')->insert($data);
            session()->put('message','Message sent successfully!!');
            return Redirect::to('/contact');


   }


    public function all_message()
    {
       $all_message_info=DB::table('contacts')
       						->get();
       return view('restaurants.allMessage',compact('all_message_info'));
      
    }

    public function unactive_contact($contact_id)
    {
          DB::table('contacts')
              ->where('contact_id',$contact_id)
              ->update(['publication_status' => 0]);
          session()->put('message','Message seen successfully !! ');
              return Redirect::to('/all-message');
    }

    public function active_contact($contact_id)
    {
          DB::table('contacts')
              ->where('contact_id',$contact_id)
              ->update(['publication_status' => 1]);
         session()->put('message','Message Unseen successfully !! ');
              return Redirect::to('/all-message');
    }

     public function view_message($contact_id)
    {
       $view_message_info=DB::table('contacts')
       						 ->where('contact_id',$contact_id)
       						->first();
		       	 // echo "<pre>";
		         // print_r($view_message_info);
		         // echo "</pre>";
		         // exit();
       return view('restaurants.viewMessage',compact('view_message_info'));
    }


    public function delete_message($contact_id)
    {
    	DB::table('contacts')
    	    ->where('contact_id',$contact_id)
    	    ->delete();
    	session()->put('message','Message Deleted successfully! ');
    	return Redirect::to('/all-message');    
    }


    public function ok_message($contact_id)
    {
             session()->get('message','Message Okk !');
             return Redirect::to('/all-message');
    }



}
