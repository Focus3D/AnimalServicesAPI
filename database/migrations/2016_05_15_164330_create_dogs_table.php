<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dogs', function (Blueprint $table) {
            $table->increments('id');

            // Static attributes
            $table->string('reference_num')->unique();
            $table->string('name');
            $table->string('image')->nullable();
            $table->integer('age')->nullable();
            $table->enum('size', ['small', 'medium', 'large']);
            $table->enum('gender', ['male', 'female']);
            $table->string('breed')->nullable();
            $table->string('color');
            $table->boolean('declawed');
            $table->boolean('neutered');
            $table->text('location');
            $table->date('intake_date');

            // Comparative Attributes
            $table->tinyInteger('noise_level');
            $table->tinyInteger('activity_level');
            $table->tinyInteger('friend_level');
            $table->tinyInteger('train_level');
            $table->tinyInteger('health_level');

            // Descriptions
            $table->text('description')->nullable();
            $table->string('excerpt')->nullable();
            $table->text('special_needs')->nullable();
            
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
        Schema::dropIfExists('dogs');
    }
}
