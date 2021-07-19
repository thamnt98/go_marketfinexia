<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ForgotPassword extends Mailable
{
    /**
     * @var array
     */
    protected $email;

    /**
     * @var $token
     */
    protected $token;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email, $token)
    {
        $this->email = $email;
        $this->token = $token;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.resetpassword')
        ->subject('Cài đặt lại  mật khẩu sử dụng  MarketFinexia')
        ->with([
            'url' => url('/password/reset') . '?token=' . $this->token .
                '&email=' . urlencode($this->email)
        ]);
    }
}
