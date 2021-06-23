<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    /** @var Mailable*/
    public $mail;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($mail)
    {
        $this->mail = $mail;

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        echo 'Handle Email' . PHP_EOL;
        try {
            Mail::to($this->mail->email)
                ->send($this->mail);
        }catch (\Exception $exception){
            echo $exception->getMessage();
        }

    }
}
