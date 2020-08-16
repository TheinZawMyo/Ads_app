<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdsUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads__users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('supplier_id');
            $table->unsignedBigInteger('ads_id');
            $table->string('status');
            $table->timestamps();
            $table->foreign('customer_id')->references('id')->on('users')->delete('cascade');
            $table->foreign('supplier_id')->references('id')->on('users')->delete('cascade');
            $table->foreign('ads_id')->references('id')->on('ads')->delete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ads__users');
    }
}
