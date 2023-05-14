<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserVerifyMailable extends Mailable
{
    use Queueable, SerializesModels;
    private  $user;
    private  $route;
    public $subject;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
        $this->route = route('auth.verify.email',['token' => $user->activation_code]) ;
        $this->subject = trans('admin.verify_your_email');
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.userVerify')->with(['user' => $this->user,'route' => $this->route]);
    }
}
