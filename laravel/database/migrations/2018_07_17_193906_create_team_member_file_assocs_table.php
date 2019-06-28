<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamMemberFileAssocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team_member_file_assocs', function (Blueprint $table) {
            $table->integer('team_member_id')->unsigned();
            $table->integer('file_id')->unsigned();

            $table->foreign('team_member_id')->references('id')->on('team_members')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('file_id')->references('id')->on('files')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['team_member_id', 'file_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('team_member_file_assocs');
    }
}
