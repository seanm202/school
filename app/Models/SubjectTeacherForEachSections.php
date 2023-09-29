<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectTeacherForEachSections extends Model
{
  use HasFactory;
  /**
   * The table associated with the model.
   *
   * @var string
   */
  protected $table = 'subject_teacher_for_each_sections';
  protected $primaryKey = 'subjectForSectionId';
  protected $fillable = [
      'teacherId',
      'classRoomId',
      'subjectId',
      'departmentId',
      'semesterId',
      'status',
        'batchId'
  ];
}
