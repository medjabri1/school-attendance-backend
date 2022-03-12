<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();

            $table->string("first_name");
            $table->string("last_name");
            $table->string("apogee");
            $table->string("cin");
            $table->string("cne");
            $table->string("carte_id");

            $table->timestamps();

            $table->unsignedBigInteger("level_id");
            $table->foreign("level_id")->references("id")->on("levels");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
