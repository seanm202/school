<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class semester extends Model
{
    use HasFactory;
   protected $table = 'semesters';
   protected $primaryKey = 'semesterId';
   protected $attributes = [
   'semesterId' => 0,
   'semesterName' => '',
     'batchId'=>0,
   ];
}
