<?php

namespace App\Http\Controllers;

use App\Food_category;
use App\Meal_type;
use App\meal_type_restaurant;
use App\Menu;
use App\Menu_type;
use App\Restaurant;
use App\Township;
use App\User;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RestaurantController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::id();
        // $user = User::where('id',"=",$user_id)->get();
        // $email = $request->email;
        // $password = bcrypt($request->password);

        $restaurants = Restaurant::where('user_id',"=",$id)->get();
      
        return view("restaurants.list",compact('restaurants'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $townships = Township::all();
        $categories = Food_category::all();
        $meals = Meal_type::all();
        return view('restaurants.createRestaurant',compact('townships','categories','meals'));
    }
    // public function login(Request $request)
    // {
    //     $validator = validator(request()->all(), [
    //         'name' => 'required',
    //         'email' =>'required',
    //         'password' => 'required',
    //         ]);
    //         if($validator->fails())
    //         {
    //           return back()->withErrors($validator);
    //         }
    //     $user = User::create(['name'=>$request->name,'email'=>$request->email,'password'=> bcrypt($request->password)]);

    //      $user->assignRole('restaurant');
    //      $user_id = $user->id;

    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
        $path = $request->file('photos')->store('photos');
        
        $meal_type_id = $request->meal_type_id;
        $validator = validator(request()->all(), [
            'user_id' => 'required',
            'name' => 'required',
            'address' => 'required',
            'township_id'=>'required',
            'food_category_id'=>'required',
            'meal_type_id'=>'required',
            'delivery_hour'=>'required',
            'phone'=>'required',
            'photos'=>'image|mimes:png,jpg,jpeg|max:10000',
         ]);

        if($validator->fails())
         {
           return back()->withErrors($validator);
         }
       

         $restaurant = new Restaurant;
       
         $restaurant->user_id = $request->user_id;
         $restaurant->name = $request->name;
         $restaurant->address = $request->address;
         $restaurant->township_id=$request->township_id;
         $restaurant->food_category_id=$request->food_category_id;
         $restaurant->delivery_hour = $request->delivery_hour;
         $restaurant->phone = $request->phone;

         $image=$request->file('photos');
         if($image){
             $imageName=$image->getClientOriginalName();
             $image->move('photos',$imageName);

             $restaurant->photos=$imageName;

         }
         $restaurant->save();
         $restaurant->meal_types()->sync($meal_type_id);
         return redirect('/restaurants');   
         
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant)
    {
        $id = $restaurant->id;
        $restaurant = Restaurant::where('id', $id)->with('meal_types')->first();
        $meal_types = $restaurant->meal_types;
       
        $menu_types = Menu_type::where('restaurant_id',$id)->get();
        $menus = Menu::where('restaurant_id',$id)->with('menu_type')->get();
        
        return view('restaurants.showRestaurant',compact('restaurant','menus', 'meal_types','menu_types') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit( Restaurant $restaurant, $id)
    {
       $restaurant = Restaurant::findOrFail($id);
        $townships = Township::all();
        $categories = Food_category::all();
        $meals = Meal_type::all();
       
       return view("restaurants.editRestaurant",compact('restaurant','townships','categories','meals'));
    }
    


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurant $restaurant, $id)
    {
        $restaurant = Restaurant::findOrFail($id);
        $image=$request->file('photos');
        if($image){
            $imageName=$image->getClientOriginalName();
            $image->move('photos',$imageName);

            $restaurant->photos=$imageName;

        }
         $restaurant->user_id = $request->user_id;
         $restaurant->name = $request->name;
         $restaurant->address = $request->address;
         $restaurant->township_id=$request->township_id;
         $restaurant->food_category_id=$request->food_category_id;
         $restaurant->delivery_hour = $request->delivery_hour;
         $restaurant->phone = $request->phone;
        $restaurant->save();
    
        return redirect('/restaurants');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     Restaurant::find($id)->delete();
    //     return back();
    // }

    public function trash()
    {
       
         $restaurant = Restaurant::onlyTrashed()->get();
        return view('restaurants.softdeleted')->with('restaurants',$restaurant);
    }

    public function hdelete($id)
    {
      $restaurant = Restaurant::withTrashed()->where('id',$id)->first();
      $restaurant->Delete();
        return back();
    }
    public function restore($id)
    {
      $restaurant = Restaurant::withTrashed()->where('id',$id)->first();
      $restaurant->restore();
        return back();
    }

    
   
}
