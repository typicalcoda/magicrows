<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIdeasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ideas', function (Blueprint $table) {
            $table->string('id', 36);
            $table->string('name');
            $table->string('category_id', 36)->nullable();
            $table->string('user_id', 36)->nullable();
            $table->text('description')->nullable();
            $table->integer('access_lvl')->nullable();
            $table->integer('max_records')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ideas');
    }
}
