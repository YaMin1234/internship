<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Restaurant;
use App\Menu_Type;
use App\Menu;


class CustomerController extends Controller
{
  
   public function index()
   {
        $restaurants = Restaurant::all();
        return view('foodDelivery.index',compact('restaurants'));          
   }
   public function category($id)
   {
       $restaurants = Restaurant::where('food_category_id',$id)->get();
       return view('foodDelivery.index',compact('restaurants'));          
   }
   public function show(Restaurant $restaurant,$id)
   {
        $restaurant = Restaurant::findOrFail($id);
        $restaurant = Restaurant::where('id', $id)->with('meal_types')->first();
        $meal_types = $restaurant->meal_types;    
        $menu_types = Menu_type::where('restaurant_id',$id)->get(); 
        $menus = Menu::where('restaurant_id',$id)->with('menu_type')->get();
        return view('foodDelivery.show',compact('restaurant','menus', 'meal_types','menu_types') );
   }

   public function showMenu(Menu_type $menu_type)
    {
        $id = $menu_type->restaurant->id;
        $restaurant = Restaurant::where('id', $id)->with('meal_types')->first();
        $meal_types = $restaurant->meal_types;
        $menus = Menu::where('restaurant_id',$id)->with('menu_type')->get();
        $menu_types= Menu_type::where('id',$menu_type->id)->get();
        
        return view('foodDelivery.showMenu',compact('restaurant','menus', 'meal_types','menu_types') );
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