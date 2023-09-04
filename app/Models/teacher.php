<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class teacher extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'teachers';
    protected $primaryKey = 'teacherId';
    protected $attributes = [
        'teacherName' => 0,
        'userId'=>'',
        'teacherDetailId'=>0,
    ];
}
