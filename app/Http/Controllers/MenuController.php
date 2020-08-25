<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Menu_type;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {   
        $restaurant_id = $request->restaurant_id;
        $menu_types = Menu_type::all();
        return view('menus.createMenu',compact('menu_types','restaurant_id'));
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $menu = new Menu;
         $menu->restaurant_id = $request->restaurant_id;
         $menu->name = $request->name;
         $menu->menu_type_id = $request->menu_type_id;
         $menu->price=$request->price;
         $menu->save();
         return redirect()->to('/restaurants');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu,$id)
    {
        $menu = Menu::findOrFail($id);
        $menu_types = Menu_type::all();
        return view('menus.editMenu',compact('menu_types','menu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu,$id)
    {
        $menu = Menu::findOrFail($id);
        $menu->update($request->all());
        return redirect('/restaurants');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu,$id)
    {
        $deleted_phase = Menu::findOrFail($id);
        $deleted_phase->delete();
        return back();
    }
}
