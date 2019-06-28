<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email');
            $table->string('institute_name');
            $table->string('name');            
            $table->integer('project_id')->unsigned();
            $table->foreign('project_id')->references('id')->on('projects')->nullable($value = true);;
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->nullable($value = true);;
            $table->integer('team_size');
            $table->boolean('agreement')->default(false);
            $table->boolean('is_profile_updated')->default(false);
            $table->string('payment_type')->nullable($value = true);
            $table->string('transaction_id')->nullable($value = true);
            $table->bigInteger('amount')->nullable($value = true);
            $table->boolean('payment_verified')->default(false);
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
        Schema::dropIfExists('teams');
    }
}
