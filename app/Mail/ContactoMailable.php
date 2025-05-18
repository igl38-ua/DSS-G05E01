<?php
namespace App\Mail;

use Illuminate\Mail\Mailable;

class ContactoMailable extends Mailable
{
    public $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function build()
    {
        return $this->subject('Nuevo mensaje de contacto: '.$this->data['asunto'])
                    ->markdown('emails.contacto');
    }
}
