<?php

namespace App\Http\Controllers;

use Response;
use App\Models\batch;
use Illuminate\Http\Request;
use Redirect;

class BatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
      $validated = $request->validate([
        'batchName' => ['required'],
          'batchStartingYear' => ['required','date'],
            'batchEndingYear' => ['required','date'],
   [
    'batchName.required'=> 'A name must be specified for the batch.',
     'batchStartingYear.required'=> 'Year of beginning of the batch should be specified',
      'batchEndingYear.required'=> 'Year of end of the batch should be specified',
       'batchStartingYear.date'=> 'Year should of the proper format',
        'batchEndingYear.date'=> 'Year should of the proper format',
   ]
    ]);
          $batches= new batch;
          $batches->batchName=$request->batchName;
          $batches->batchStartingYear=$request->batchStartingYear;
          $batches->batchEndingYear=$request->batchEndingYear;
          $batches->status=1;
          $batches->save();
        // return Redirect::back();
        return redirect()->route('Admin',['id'=>'createTheBatches'])->with('success', 'Created successfully.');

        }
       public function currentBatch(Request $request)
       {

             $batches= batch::where('batchId','=',$request->currentBatchId)->first();
             $batches->status=0;
             $batches->save();

                 $batches= batch::where('batchId','=',$request->batchId)->first();
                 $batches->status=1;
                 $batches->save();
           // return Redirect::back();
           return redirect()->route('Admin',['id'=>'updateTheBatches'])
->with('success', 'Created successfully.');

           }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function show(batch $batch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function edit(batch $batch)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
      $validated = $request->validate([
        'batchName' => ['required'],
          'batchStartingYear' => ['required','date'],
            'batchEndingYear' => ['required','date'],
   [
    'batchName.required'=> 'A name must be specified for the batch.',
     'batchStartingYear.required'=> 'Year of beginning of the batch should be specified',
      'batchEndingYear.required'=> 'Year of end of the batch should be specified',
       'batchStartingYear.date'=> 'Year should of the proper format',
        'batchEndingYear.date'=> 'Year should of the proper format',
   ]
    ]);
      $batches = batch::where('batchId','=',$request->batchId)->first();
      $batches->batchName=$request->batchName;
      $batches->batchStartingYear=$request->batchStartingYear;
      $batches->batchEndingYear=$request->batchEndingYear;
      $batches->save();
      // return Redirect::back();
      return redirect()->route('Admin',['id'=>'updateTheBatches'])
->with('success', 'Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
      $batches = batch::where('batchId','=',$request->batchId)->first();
      $batches->delete();
      return Redirect::back();
    }
}
