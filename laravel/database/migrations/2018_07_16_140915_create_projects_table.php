<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Project;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->integer('project_number');
            $table->timestamps();
        });

        $data = array(
            array(
                'name' => 'project_1',
                'project_number' => 245
            ),
            array(
                'name' => 'project_2',
                'project_number' => 246
            ),
            array(
                'name' => 'project_3',
                'project_number' => 247
            ),
            array(
                'name' => 'project_4',
                'project_number' => 248
            )
        );

       Project::insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
