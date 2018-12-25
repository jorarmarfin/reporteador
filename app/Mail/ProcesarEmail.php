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
    public $item;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data,$item)
    {
        $this->data = $data;
        $this->item = $item;
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
            return $this->from($data['remitente'])
                        ->subject($data['asunto'])
                        ->text('emails.simple-text');
        }else{
            return $this->from($data['remitente'])
                        ->subject($data['asunto'])
                        ->view('emails.plantilla');

        }
    }
}
