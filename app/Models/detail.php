<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'details';
    protected $primaryKey = 'detailId';
    protected $attributes = [
    'firstname' => '',
    'lastname' => '',
        'age' => 0,
        'dob' => '',
        'contactNumber' => 0,
        'alternateContactNumber' => 0,
        'roleId' => 0,
        'userId' => 0,
        'address'=>'',
        'bloodGroup'=>'',
        'identificationMark'=>'',
        'parentNumber'=>0,
        'homePhoneNumber'=>0,
        'fatherSpouseName'=>'',
        'motherName'=>'',
        'guardianName'=>'',
    ];
}
