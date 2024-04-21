<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->string('description', 256);
            $table->double('total')->nullable(false);
            $table->unsignedBigInteger('accountcategory_id');
            $table->unsignedBigInteger('user_id');
            $table->date('date');
            $table->timestamps();
            $table->foreign('accountcategory_id')->references('id')->on('accountcategories');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('accounts');
    }
}

