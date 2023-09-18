<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subject extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'subjects';
    protected $primaryKey = 'subjectId';
    protected $attributes = [
        'departmentId' => 0,
            'semesterId' => 0,
        'subjectName' => 0,
        'subjectGrade' => 0,
        'subjectMaxMarks' => 0,
        'subjectTextName'=>'',
          'batchId'=>0,
    ];
}
