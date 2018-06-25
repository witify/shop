<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Queue\ShouldQueue;

class Contact extends Mailable
{
    use Queueable, SerializesModels;

    public $title;
    public $fields;
    private $file;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($title, $fields, $file = null)
    {
        $this->title = $title;
        $this->fields = $fields;
        $this->file = $file;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $mail = $this
                ->view('emails.new_contact')
                ->subject($this->title);

        $file = $this->findFile();
        if ($file !== null) {
            $mail->attach($file);
        }

        return $mail;
    }

    private function findFile()
    {
        if ($this->file === null) {
            return null;
        }
        
        $path = storage_path('app/temp/' . $this->file);
        if (! file_exists($path)) {
            return null;
        }

        return $path;
    }
}
