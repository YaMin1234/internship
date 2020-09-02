<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class adminController extends Controller
{
    
    public function index()
    {
        $users = User::all();
        return view("admin.index",compact('users'));
   }
 
    
    public function destroy($id)
     {
         User::find($id)->delete();
         return back();
     }
}
