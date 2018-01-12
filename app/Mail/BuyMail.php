<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class BuyMail extends Mailable
{
    use Queueable, SerializesModels;

    public $purchase;

    public function __construct(\App\Purchase $purchase)
    {
        $this->purchase = $purchase;
    }

    public function build()
    {
        return $this->bcc('diseloindumentaria@gmail.com')
            ->subject('Completá tu compra')
            ->view('emails.buy')
        ;
    }
}
