<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class adminController extends Controller
{
    
    public function index()
    {   
        $id = Auth::user()->id;
    
        $users= DB::table('users')->where('id','!=',$id)->get();
        return view("admin.index",compact('users'));
   }
 
    
    public function destroy($id)
     {
         User::find($id)->delete();
         return back();
     }
}
