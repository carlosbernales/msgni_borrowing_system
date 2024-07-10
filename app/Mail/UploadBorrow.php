<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UploadBorrow extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct()
    {
    }
    public function build()
    {
        return $this->from('carlosbernales24@gmail.com')
                    ->subject('New Borrow Request')
                    ->view('emails.upload_borrow'); // Adjust the view as needed
    }




}

