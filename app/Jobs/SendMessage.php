<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Notifications\GeneralNotification;

class SendMessage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(GeneralNotification $generalNotification)
    {
        $this->generalNotification = $generalNotification;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle($users)
    {
        if(is_array($users)){
            foreach ($users as $user){

                $this->generalNotification->toDatabase();
            }
        }
    }
}
