<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuildingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buildings', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignId('user_id')->constrained('users');
            $table->string('tenant_id')->constrained('users')->nullable();
            $table->integer('rc_no')->nullable();
            $table->integer('ifc_no')->nullable();
            $table->integer('flat_no')->nullable();
            $table->integer('villa_no')->nullable();
            $table->integer('lot_no')->nullable();
            $table->integer('block_no')->nullable();
            $table->string('street');
            $table->string('description');
            $table->boolean('status')->default(0);
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
        Schema::dropIfExists('buildings');
    }
}
