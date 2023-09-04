<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'admins';
    protected $primaryKey = 'adminId';
    protected $attributes = [
        'dailyLogin_yes_or_no' => 0,
        'notifications_Posted'=>0,
    ];
}
