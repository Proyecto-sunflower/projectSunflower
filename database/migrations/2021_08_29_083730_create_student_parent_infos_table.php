<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentParentInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_parent_infos', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('student_id');
            $table->string('main_parent_name');
            $table->string('main_parent_phone');
            $table->string('substitute_name');
            $table->string('substitute_phone');
            $table->string('main_parent_address');
            $table->string('substitute_address')->nullable();

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
        Schema::dropIfExists('student_parent_infos');
    }
}
