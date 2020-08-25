<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRestaurantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurants', function (Blueprint $table) {
            $table->bigIncrements('id');
             $table->integer('user_id');
            $table->string('name');
            $table->string('address');
            $table->integer('township_id');
            $table->integer('food_category_id');
            $table->string('delivery_hour');
            $table->string('phone');
            $table->string('photos')->nullable();
            $table->softDeletes()->nullable();
            $table->timestamps();
        });

       
                  
                  
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('restaurants');
    }
}
