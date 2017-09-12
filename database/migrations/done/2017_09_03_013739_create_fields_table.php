<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fields', function (Blueprint $table) {
            $table->string('id', 36)->primary();
            $table->string('collection_id', 36);
            $table->string('name')->unique();
            $table->string('type');
            $table->string('prefix')->nullable();
            $table->string('suffix')->nullable();
            $table->integer('max_length')->default(0);
            $table->integer('min_length')->default(0);
            $table->boolean('unique')->default(0);            
            $table->timestamp('deleted_at')->nullable();
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
        Schema::dropIfExists('fields');
    }
}
