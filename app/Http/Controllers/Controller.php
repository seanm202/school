<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function __construct()
  {
    //its just a dummy data object.
    $currentBatchId =\App\Models\batch::where('batches.status','=',1)->select('batchId')->first();

    // Sharing is caring
    \View::share('currentBatchId', $currentBatchId);
  }
}
