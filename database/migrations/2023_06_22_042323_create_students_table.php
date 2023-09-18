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
            $table->integer('studentDetailsId')->default(NULL);
            $table->integer('studentClassroom')->default(NULL);
            $table->integer('studentGrade')->default(NULL);
            $table->integer('studentSection')->default(NULL);
            $table->integer('studentSemester')->default(NULL);
            $table->integer('studentDepartmentId')->default(NULL);
            $table->integer('status')->default(NULL);
            $table->integer('batchId')->default(NULL);
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
