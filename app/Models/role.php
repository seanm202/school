<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'roles';
    protected $primaryKey = 'roleId';
    protected $attributes = ['roleName'=>''];
    protected $fillable = ['roleName'];
}
