<?php

namespace App\Mail;

use App\Models\Store;
use App\Models\Student;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Crypt;

class NewUser extends Mailable
{
    use Queueable, SerializesModels;

    public $student;
    public $store;
    public $passwd;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Student $student, Store $store, $passwd)
    {
        $this->student = $student;
        $this->store = $store;
        $this->passwd = $passwd;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->subject('Bem vindo(a) à '. $this->store->name)
                ->to($this->student->email)
                ->markdown('emails.new_user',
                    ['student' => $this->student, 'store' => $this->store, 'passwd' => $this->passwd]
                );
    }
}
