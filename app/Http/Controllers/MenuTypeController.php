<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Menu_type;
use App\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MenuTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::id();
        $menu_types = Menu_type::where("user_id",$id)->get();
        return view("menu_types.index",compact('menu_types'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $restaurant_id = $request->restaurant_id;
        
        return view('menu_types.create',compact('restaurant_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       Menu_type::create($request->all());
       return redirect()->to("/menu_types");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Menu_type  $menu_type
     * @return \Illuminate\Http\Response
     */
    public function show(Menu_type $menu_type)
    {
        $id = $menu_type->restaurant->id;
        $restaurant = Restaurant::where('id', $id)->with('meal_types')->first();
        $meal_types = $restaurant->meal_types;
        $menus = Menu::where('restaurant_id',$id)->with('menu_type')->get();
        $menu_types= Menu_type::where('id',$menu_type->id)->get();
        
        return view('menu_types.show',compact('restaurant','menus', 'meal_types','menu_types') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Menu_type  $menu_type
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu_type $menu_type,$id)
    {
      $menu_type = Menu_type::findOrFail($id);
      return view("menu_types.edit",compact('menu_type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Menu_type  $menu_type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu_type $menu_type,$id)
    {
        $menu_type = Menu_type::findOrFail($id);
        $menu_type->update($request->all());
        return redirect('/menu_types');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Menu_type  $menu_type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu_type $menu_type,$id)
    {
        $deleted_phase = Menu_type::findOrFail($id);
        $deleted_phase->delete();
        return back();
    }

    public function search(Request $request)
    {
      $menuTypeName = $request->search;
      $menu_types = Menu_type::where('name','LIKE','%'.$menuTypeName.'%')->get();
      if(count($menu_types) > 0)
      {
         return view('menu_types.index',compact('menu_types'));
      }

     else
     { 
         return redirect('/menu_types.index')->withErrors(['msg', 'No Details found. Try to search again !']);
     }
    }
    public function back()
    {
        return back();
    }
}
