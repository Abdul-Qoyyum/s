<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('lastname')->nullable();
            $table->string('company')->nullable();
            $table->string('businessno')->nullable();
            $table->string('phone')->nullable();
            $table->string('email');
            $table->string('address')->nullable();
            $table->string('town')->nullable();
            $table->string('postcode')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->text('notes')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
