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
            $table->string('firstname');
            $table->string('lastname');
            $table->integer('age');
            $table->date('dob');
            $table->integer('contactNumber')->default(0);
            $table->integer('alternateContactNumber')->default(0);
            $table->integer('roleId');
            $table->integer('userId');
            $table->string('address')->default(0);
            $table->string('bloodGroup')->default(0);
            $table->string('identificationMark');
            $table->integer('parentNumber');
            $table->integer('homePhoneNumber')->default(0);
            $table->string('fatherSpouseName')->default(0);
            $table->string('motherName');
            $table->string('guardianName');
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
        Schema::dropIfExists('details');
    }
};
