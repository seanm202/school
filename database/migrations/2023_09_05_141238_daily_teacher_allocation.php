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

          Schema::create('daily_Teacher_Allocation', function (Blueprint $table) {
              $table->id('daily_Teacher_AllocationId');
              $table->integer('classRoomId');
              $table->integer('teacherId');
              $table->integer('subjectId');
              $table->integer('dayId');
              $table->integer('hourId');
              $table->string('date');
              $table->integer('status');
              $table->integer('subjectForSectionId');
              $table->integer('batchId');
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
        Schema::dropIfExists('student_subject_attendances');
    }
};
