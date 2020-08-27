<?php

namespace App\Http\Controllers;

use App\Menu_type;
use App\Restaurant;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
  public function edit( User $user, $id)
    {
       $user = User::findOrFail($id);
       
       return view("users.editAccount",compact('user'));
    }

    public function update(Request $request,User $user)
    { 

        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        $user->save();
        
        return redirect()->to("/restaurants");
    }
}
