<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConstantController extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'constant_controllers';
    protected $primaryKey = 'constantId';
    protected $fillable = [
        'constantName',
        'constantValue'
    ];
}
