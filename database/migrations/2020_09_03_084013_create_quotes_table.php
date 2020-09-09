<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('body')->nullable();
            $table->text('description')->nullable();
            $table->float('price')->nullable();
            $table->integer('quantity')->nullable();
            $table->float('discount')->nullable();
            $table->float('subtotal')->default(99.99);
            $table->float('total')->default(99.99);
            $table->string('quote_id')->default(Str::replaceArray('-',['',''],\Carbon\Carbon::now()->toDateString()));
            $table->date('issue_date')->default(\Carbon\Carbon::now());
            $table->string('po_number')->nullable();
            $table->unsignedBigInteger('task_id');
            $table->string('notes')->nullable();
            $table->text('contracts')->nullable();
            $table->foreign('task_id')->references('id')->on('tasks')->onDelete('cascade');
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
        Schema::dropIfExists('quotes');
    }
}
