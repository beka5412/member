<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class NewUserMailTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_send_email_new_user()
    {
        Mail::send([], [], function ($message) {
            $message->to('duocriative@gmail.com')
                    ->subject('Teste de envio de email')
                    ->setBody('Este é um email de teste enviado pelo Laravel.');
        });

        $this->assertTrue(true);
    }
}
