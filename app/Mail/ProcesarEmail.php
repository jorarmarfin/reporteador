<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ProcesarEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data = $this->data;
        if ($data['tipo']==1) {
            return $this->from('luis.mayta@drinux.com')
                        ->subject($data['asunto'])
                        ->text('emails.simple-text');
        }else{
            return $this->from('luis.mayta@drinux.com')
                        ->subject($data['asunto'])
                        ->view('emails.plantilla');

        }
    }
}
