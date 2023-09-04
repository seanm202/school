<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class classRoom extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'class_rooms';
    protected $primaryKey = 'classroomDetailId';
    protected $attributes = [
        'grade' => 0,
        'roomNo' => 0,
        'section' => '',
        'departmentId' => 0,
        'semester' => '',
        'classTeacher' => '',
        'description' => 'Welcome',
        'capacity' => 0,
        'classTimeTableId' => 0,
    ];
}
