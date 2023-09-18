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
        Schema::create('details', function (Blueprint $table) {
            $table->id('detailId');
            $table->string('firstname')->default(NULL);
            $table->string('lastname')->default(NULL);
            $table->integer('age')->default(NULL);
            $table->date('dob')->default(NULL);
            $table->integer('contactNumber')->default(0);
            $table->integer('alternateContactNumber')->default(0);
            $table->integer('roleId');
            $table->integer('userId');
            $table->string('address')->default(0);
            $table->string('bloodGroup')->default(0);
            $table->string('identificationMark')->default(NULL);
            $table->integer('parentNumber')->default(NULL);
            $table->integer('homePhoneNumber')->default(0);
            $table->string('fatherSpouseName')->default(0);
            $table->string('motherName')->default(NULL);
            $table->string('guardianName')->default(NULL);
            $table->integer('status')->default(1);
            $table->integer('batchId')->default(0);
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
        Schema::dropIfExists('details');
    }
};
