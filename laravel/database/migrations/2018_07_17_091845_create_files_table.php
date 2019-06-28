<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\File;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->increments('id');
            // $table->integer('team_member_id')->unsigned();
            // $table->foreign('team_member_id')->references('id')->on('team_members');
            // $table->string('file_type');
            $table->string('file');
            $table->string('file_name');
            $table->timestamps();
        });

        File::create([
            // 'file_type' => "aadhaar",
            'file' => "aadhaar",
            'file_name' => "aadhaar"
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('files');
    }
}
