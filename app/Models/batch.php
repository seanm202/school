<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class batch extends Model
{
  use HasFactory;
  /**
   * The table associated with the model.
   *
   * @var string
   */
  protected $table = 'batches';
  protected $primaryKey = 'batchId';
  protected $attributes = [
    'batchId'=>'',
    'batchName'=>'',
      'batchStartingYear'=>'',
      'batchEndingYear'=>'',
      'status'=>0,
  ];
}
