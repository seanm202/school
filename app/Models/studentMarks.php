<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class studentMarks extends Model
{
    use HasFactory;
   protected $table = 'student_marks';
   protected $primaryKey = 'student_marksId';
   protected $attributes = [
       'userId' => 0,
           'studentId' => 0,
       'classRoomId' => 0,
       'subjectId' => 0,
       'marks' => 0,
   'status' => 0,
     'batchId'=>0,
   ];

}
