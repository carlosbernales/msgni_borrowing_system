<?php

namespace App\Mail;

use App\Models\Borrow;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BorrowDeny extends Mailable
{
    use Queueable, SerializesModels;

    public $borrow;

    public function __construct(Borrow $borrow)
    {
        $this->borrow = $borrow;
    }

    public function build()
    {
        return $this->view('emails.borrow_deny')
                    ->subject('Borrow Deny');
    }
}
