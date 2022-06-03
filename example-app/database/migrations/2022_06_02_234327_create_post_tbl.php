<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    
        Schema::create('posts', function (Blueprint $table2) {
            $table2->id();
            $table2->string('title');
            $table2->text('description');
            $table2->timestamps();
            $table2->text('idCat');
            $table2->text('idimg');
        });

        Schema::create('categories',function(Blueprint $table){
            $table->id();
            $table->string('title'); 
            $table->timestamps();
        });

        Schema::create('images',function(Blueprint $table3){
            $table3->id();
            $table3->string('name'); 
            $table3->string('path'); 
            $table3->bigInteger('size'); 
            $table3->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
