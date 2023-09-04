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
        Schema::create('class_rooms', function (Blueprint $table) {
            $table->id('classroomDetailId');
            $table->string('grade');
            $table->string('roomNo');
            $table->string('section')->default(0);
            $table->integer('departmentId')->default(NULL);
            $table->integer('semester')->default(NULL);
            $table->string('classTeacher')->default(0);
            $table->string('description');
            $table->integer('capacity')->default(0);
            $table->integer('classTimeTableId')->default(0);
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
        Schema::dropIfExists('class_rooms');
    }
};
