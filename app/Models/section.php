<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class section extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'sections';
    protected $primaryKey = 'sectionId';
    protected $attributes = [
        'sectionName' => '',
        'status'=>0,
    ];
    protected $fillable = ['secionName'];
}
