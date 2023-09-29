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
    protected $fillable = [
    'classRoomId',
    'studentId',
        'teacherId',
        'subjectId',
        'dayId',
        'hourId',
        'presentOrAbsent',
        'submitted',
        'dailyTeacherAllocationId',
        'status',
          'batchId'
    ];
}
