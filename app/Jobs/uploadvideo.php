<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class uploadvideo implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public $requestData;
    public $profilePicCustomName;
    public function __construct($video)
    {
      $this->requestData=$video;
   
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {

      $profilePicFile = $this->file('videos');
      $profilePic= time() . '.' . $profilePicFile->getClientOriginalExtension();
    ///  uploadvideo::dispatch($profilePicFile,$profilePic);
          // dd($profilePicFile);
          // die();

    $profilePicFile ->move(public_path("assets/images/videos"),$profilePic);
      
    }
}
