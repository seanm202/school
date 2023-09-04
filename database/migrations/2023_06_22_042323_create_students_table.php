<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id('studentId');
            $table->integer('userId');
            $table->integer('studentDetailsId');
            $table->integer('studentClassroom');
            $table->integer('studentGrade');
            $table->integer('studentSection');
            $table->integer('studentSemester');
            $table->integer('studentDepartmentId');
            $table->integer('status');
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
        Schema::dropIfExists('students');
    }
};
