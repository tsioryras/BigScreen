<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->char('type', [1])->nullable(false);
            $table->string('label')->nullable(false);
            $table->json('choices')->nullable(true);
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
        Schema::dropIfExists('questions');
    }
}
