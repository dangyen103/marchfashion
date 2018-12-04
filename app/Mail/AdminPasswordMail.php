<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AdminPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $password)
    {
        $this->name = $name;
        $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->subject('[MarchFashion:Account] Tạo tài khoản thành công')
            ->from('contact.marchfashion@gmail.com', 'March Fashion')
            ->view('mails.admin-password')->with([
                'name' => $this->name,
                'password' => $this->password
            ]);
    }
}
