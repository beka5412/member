<?php

namespace App\Mail;

use App\Models\Store;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UpdateCoursesMail extends Mailable
{
    use Queueable, SerializesModels;

    public $student;
    public $store;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Store $store, $student)
    {
        $this->student = $student;
        $this->store = $store;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Olá '. $this->student->name)
                ->to($this->student->email)
                ->markdown('emails.update_courses',
                ['student_name' => $this->student->name, 'store' => $this->store]
            );
    }
}
