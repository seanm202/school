<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class studentSubjectAttendance extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */

    protected $table = 'student_subject_attendances';
    protected $primaryKey = 'id';
    protected $attributes = [
    'classRoomId' => '',
    'studentId' => '',
        'teacherId' => 0,
        'subjectId' => '',
        'dayId' => 0,
        'hourId' => 0,
        'presentOrAbsent' => 0,
        'submitted' => 0,
        'dailyTeacherAllocationId' => 0,
        'status' => 0,
          'batchId'=>0,
    ];
}
