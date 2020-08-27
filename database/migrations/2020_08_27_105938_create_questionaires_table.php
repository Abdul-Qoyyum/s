<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questionaires', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        DB::table('questionaires')->insert([
            ['name' => 'Sample Commercial Questionaire','created_at'=> \Carbon\Carbon::now(),'updated_at' => \Carbon\Carbon::now() ],
            ['name' => 'Sample Family Portrait Questionaire','created_at'=> \Carbon\Carbon::now(),'updated_at' => \Carbon\Carbon::now() ],
            ['name' => 'Sample Wedding Questionaire','created_at'=> \Carbon\Carbon::now(),'updated_at' => \Carbon\Carbon::now() ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questionaires');
    }
}
