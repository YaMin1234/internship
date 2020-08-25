<?php

use Illuminate\Database\Seeder;

use function Ramsey\Uuid\v1;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleTableSeeder::class);
        $this->call(UserTableSeeder::class);

        

        factory(App\Township::class)->create([
            "name" => "Alone",
            "postal_code" => 11121,
            ]);

        factory(App\Township::class)->create([
            "name" => "Bahan",
            "postal_code" => 11201,
            ]);
        factory(App\Township::class)->create([
            "name" => "Botahtaung",
            "postal_code" => 11162,
            ]);
        factory(App\Township::class)->create([
            "name" => "Dagon",
            "postal_code" => 11191,
            ]);
        factory(App\Township::class)->create([
            "name" => "Dawbon",
            "postal_code" => 11241,
            ]);
        factory(App\Township::class)->create([
            "name" => "Hlaing",
            "postal_code" => 11051,
             ]);
        factory(App\Township::class)->create([
            "name" => "HlaingTharYar",
            "postal_code" => 11052,
             ]);
        factory(App\Township::class)->create([
            "name" => "Insein",
             "postal_code" => 11011,
             ]);
        factory(App\Township::class)->create([
            "name" => "Kamayut",
             "postal_code" => 11041,
             ]);
        factory(App\Township::class)->create([
            "name" => "Kyauktada",
             "postal_code" => 11182,
             ]);

        factory(App\Township::class)->create([
            "name" => "Kyeemyindaing",
            "postal_code" =>11101,
            ]);
        factory(App\Township::class)->create([
             "name" => "Lanmadaw",
             "postal_code" =>11131,
             ]);
        factory(App\Township::class)->create([
            "name" => "Latha",
             "postal_code" =>11131,
            ]);
         factory(App\Township::class)->create([
            "name" => "Mayangone",
             "postal_code" =>11062,
            ]);
        factory(App\Township::class)->create([
            "name" => "Mingalartaungnyunt",
            "postal_code" =>11221,
            ]);
        factory(App\Township::class)->create([
             "name" => "Okkalapa (North)",
             "postal_code" => 11031,
            ]);
       factory(App\Township::class)->create([
              "name" => "Pabedan",
              "postal_code" => 11143,
            ]);
       factory(App\Township::class)->create([
            "name" => "Pazundaung",
            "postal_code" => 11171,
             ]);
        factory(App\Township::class)->create([
            "name" => "Sanchaung",
             "postal_code" => 11111,
            ]);  
        factory(App\Township::class)->create([
            "name" => "Shwe Pyi Thar",
             "postal_code" =>11411,
             ]);
        factory(App\Township::class)->create([
             "name" => "Tamwe",
             "postal_code" =>11211,
             ]);
        factory(App\Township::class)->create([
             "name" => "Tharkayta",
             "postal_code" =>11231,
             ]);
        factory(App\Township::class)->create([
            "name" => "Thingangyun",
             "postal_code" =>11071,
             ]);
        factory(App\Township::class)->create([
             "name" => "Yankin",
            "postal_code" =>11082,
            ]); 


        factory(App\Meal_type::class)->create([
                "name" => "Breakfast",
                ]);
           factory(App\Meal_type::class)->create([
                "name" => "Lunch",
               ]);
           factory(App\Meal_type::class)->create([
               "name" => "Branch",
                ]);
           factory(App\Meal_type::class)->create([
                "name" => "Dinner",
               ]); 
               
            factory(App\Food_category::class)->create([
                "name" => "Asian",
               ]);
            factory(App\Food_category::class)->create([
                "name" => "Greek",
               ]);
             factory(App\Food_category::class)->create([
                "name" => "American",
               ]);
            factory(App\Food_category::class)->create([
                "name" => "Burmese",
               ]);
            factory(App\Food_category::class)->create([
                "name" => "Chinese",
               ]);
            factory(App\Food_category::class)->create([
                "name" => "Bevarages",
              ]);
            factory(App\Food_category::class)->create([
                "name" => "Desserts",
               ]);
            factory(App\Food_category::class)->create([
                "name" => "Western",
               ]);
            factory(App\Food_category::class)->create([
                "name" => "European",
               ]);
            factory(App\Food_category::class)->create([
                "name" => "Japanese",
               ]);
            factory(App\Food_category::class)->create([
                "name" => "Thai",
               ]);
            factory(App\Food_category::class)->create([
                "name" => "Fast food",
               ]);  
            factory(App\Food_category::class)->create([
                "name" => "Indian",
               ]);  
            factory(App\Food_category::class)->create([
                "name" => "Filipino",
               ]); 
               factory(App\Food_category::class)->create([
                "name" => "French",
               ]);  
               factory(App\Food_category::class)->create([
                "name" => "German",
               ]);  
               factory(App\Food_category::class)->create([
                "name" => "Greek",
               ]);  
               factory(App\Food_category::class)->create([
                "name" => "Healthy Food",
               ]);  
               factory(App\Food_category::class)->create([
                "name" => "Filipino",
               ]);   
                factory(App\Food_category::class)->create([
                "name" => "Indonesian",
               ]);    
               factory(App\Food_category::class)->create([
                "name" => "Italian",
               ]); 
               factory(App\Food_category::class)->create([
                "name" => "Korean",
               ]);  
               factory(App\Food_category::class)->create([
                "name" => "Mexican",
               ]);  
               factory(App\Food_category::class)->create([
                "name" => "Spanish",
               ]);    
               factory(App\Food_category::class)->create([
                "name" => "Vegetarian",
               ]);  
                


               factory(App\Menu_type::class)->create([
                "name" => "Gunkan Sushi & Hand Rolls",
               ]);  
               factory(App\Menu_type::class)->create([
                "name" => "Maki Sushi",
               ]);  
               factory(App\Menu_type::class)->create([
                "name" => "Nigiri Sushi",
               ]);  
               factory(App\Menu_type::class)->create([
                "name" => "Sushi Set",
               ]);  
               factory(App\Menu_type::class)->create([
                "name" => "Japanese Meal Set",
               ]);  
               factory(App\Menu_type::class)->create([
                "name" => "Rice & Noodle",
               ]);  
               factory(App\Menu_type::class)->create([
                "name" => "Sashimi",
               ]);  
               factory(App\Menu_type::class)->create([
                "name" => "Soup & Stir Food",
               ]);  
               factory(App\Menu_type::class)->create([
                "name" => "Salad",
               ]);  
               factory(App\Menu_type::class)->create([
                "name" => "Appetizer",
               ]);  
               factory(App\Menu_type::class)->create([
                "name" => "Grilled & Deep Fried",
               ]);  
               factory(App\Menu_type::class)->create([
                "name" => "Noodle & Soup",
               ]);  
               factory(App\Menu_type::class)->create([
                "name" => "Main Grab",
               ]);  
               factory(App\Menu_type::class)->create([
                "name" => "Specialities",
               ]);  
               factory(App\Menu_type::class)->create([
                "name" => "Bevarages",
               ]);  
               factory(App\Menu_type::class)->create([
                "name" => "Sandwich",
               ]);  
               factory(App\Menu_type::class)->create([
                "name" => "Ala Carte",
               ]);  
               factory(App\Menu_type::class)->create([
                "name" => "Pasta",
               ]);  
               factory(App\Menu_type::class)->create([
                "name" => "Pizza",
               ]);  
               factory(App\Menu_type::class)->create([
                "name" => "Set Menu",
               ]);
               factory(App\Menu_type::class)->create([
                "name" => "Main Menu",
               ]);
               factory(App\Menu_type::class)->create([
                "name" => "Quarter Chicken",
               ]);
               factory(App\Menu_type::class)->create([
                "name" => "Wings",
               ]);
               factory(App\Menu_type::class)->create([
                "name" => "Fired Rice and Fired Noodle",
               ]);
               factory(App\Menu_type::class)->create([
                "name" => " Porridge",
               ]);
               factory(App\Menu_type::class)->create([
                "name" => "Rice",
               ]);
               factory(App\Menu_type::class)->create([
                "name" => "Chicken",
               ]); 
               factory(App\Menu_type::class)->create([
                "name" => "BBQ",
               ]); 
               factory(App\Menu_type::class)->create([
                "name" => "Sea Food",
               ]);

              
               
               


  
                           



                                                 
    }
}
