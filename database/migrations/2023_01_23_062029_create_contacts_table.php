<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            
            $table->increments('id');
            $table->string('name',100);
            //$table->bigInteger('mobile')->unique();
            
            $table->string('address',200);
            $table->string('email',100)->unique();
            $table->date('birthdate');
            $table->string('social',200);
            $table->string('notes',100);
            
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
        Schema::dropIfExists('contacts');
    }
}
