<?php

namespace App\Jobs\Emailverify;

use App\Mail\Sendnotify;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Bus\Dispatchable;

class AllemailPendingVerification implements ShouldQueue
{
    use Queueable,Dispatchable;
    public $data;
    public $email;
    /**
     * Create a new job instance.
     */
    public function __construct($email,$user)
    {
        $this->email = $email;
        $this->data = $user;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $subject = "Finish Setting Up Your Account – Verify Your Email";
        Mail::to($this->email)->send(new Sendnotify($this->data,$subject));
    }
}
