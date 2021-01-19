<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OpenLiveAccountSuccess extends Mailable
{

    /**
     * @var array
     */
    protected $user;

    /**
     * @var $token
     */
    protected $account;
    protected $password;



    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $account, $password)
    {
        $this->user = $user;
        $this->account = $account;
        $this->password = $password;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.openliveaccount')
            ->subject('Tài khoản MT4 Real đã được tạo')
            ->with([
                'firstName' => $this->user['first_name'],
                'lastName' => $this->user['last_name'],
                'login' => $this->account['login'],
                'password' => $this->password,
                'leverage' => $this->account['leverage']
            ]);
    }
}
