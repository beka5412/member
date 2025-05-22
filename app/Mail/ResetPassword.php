<?php

namespace App\Mail;

use App\Models\Store;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResetPassword extends Mailable
{
    use Queueable, SerializesModels;

    public $store;
    public $slug;
    public $email;
    public $domain;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Store $store, $slug, $email, $domain)
    {
        $this->store = $store;
        $this->slug = $slug;
        $this->email = $email;
        $this->domain = $domain;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Alterar senha')
                ->to($this->email)
                ->markdown('emails.reset_password',
                    ['store' => $this->store,'slug' => $this->slug, 'domain' => $this->domain]
                );
    }
}
