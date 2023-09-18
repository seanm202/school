<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dailyTeacherAllocation extends Model
{
    use HasFactory;

    protected $table = 'daily_Teacher_Allocation';
    protected $primaryKey = 'daily_Teacher_AllocationId';
    protected $attributes = [
    'classRoomId' => '',
        'teacherId' => 0,
        'subjectId' => '',
        'dayId' => 0,
        'hourId' => 0,
        'date' => 0,
        'status' => 0,
          'batchId'=>0,
          'subjectForSectionId'=>0,
    ];
}
