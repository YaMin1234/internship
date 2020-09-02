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
        $menuType_id = $request->menuType_id;
        $menu_types = Menu_type::where("restaurant_id",$restaurant_id)->get();
        return view('menus.createMenu',compact('menu_types','restaurant_id','menuType_id'));
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $path = $request->file('photos')->store('photos');
        $validator = validator(request()->all(), [
          
            'restaurant_id' => 'required',
            'menu_type_id' => 'required',
            'name' => 'required',
            'price'=>'required',
            'photos'=>'image|mimes:png,jpg,jpeg|max:10000',
         ]);
         if($validator->fails())
         {
           return back()->withErrors($validator);
         }

         $menu = new Menu;
         $menu->restaurant_id = $request->restaurant_id;
         $menu->name = $request->name;
         $menu->menu_type_id = $request->menu_type_id;
         $menu->price=$request->price;
         $image=$request->file('photos');
         if($image){
             $imageName=$image->getClientOriginalName();
             $image->move('photos',$imageName);

             $menu->photos=$imageName;

         }
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
        $restaurant_id = $menu->restaurant_id;
        $menu_types = Menu_type::where("restaurant_id",$restaurant_id)->get();
      
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
    public function cart()
    {
        return view('foodDelivery.cart');
    }

    public function addToCart($id)
    {
        $menu = Menu::find($id);
 
        if(!$menu) 
        {
 
            abort(404);
 
        }
 
        $cart = session()->get('cart');
 
        // if cart is empty then this the first product
        if(!$cart) 
        {
 
            $cart = [
                    $id => [
                        "name" => $menu->name,
                        "quantity" => 1,
                        "price" => $menu->price,
                        "photo" => $menu->photos
                    ]
            ];
 
            session()->put('cart', $cart);
 
            return redirect()->back()->with('success', 'Menu added to cart successfully!');
        }
 
        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) 
        {
 
            $cart[$id]['quantity']++;
 
            session()->put('cart', $cart);
 
            return redirect()->back()->with('success', 'Menu added to cart successfully!');
 
        }
 
        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "name" => $menu->name,
            "quantity" => 1,
            "price" => $menu->price,
            "photo" => $menu->photo
        ];
 
        session()->put('cart', $cart);
 
        return redirect()->back()->with('success', 'Menu added to cart successfully!');
    }
   
   
}
