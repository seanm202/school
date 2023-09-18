<?php

namespace App\Providers;
use App\Models\batch;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
      $currentBatchId=batch::where('batches.status','=',1)->select('batchId')->first();
      $currentBatchIdNow=$currentBatchId->batchId;
      view()->share('currentBatchId', $currentBatchIdNow);
    }
}
