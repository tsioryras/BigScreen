<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_type', function (Blueprint $table) {
            $table->increments('id');
            $table->char('value')->unique()->nullable(false);
            $table->string('description')->nullable(false);
            $table->dateTime('created_at')->default(now()); // DATETIME
            $table->dateTime('updated_at')->nullable(); // DATETIME
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('question_type');
    }
}
