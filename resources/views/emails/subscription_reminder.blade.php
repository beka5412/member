@component('mail::message')
<div style="text-align:center;margin-bottom:24px;">
    <img src="{{ config('app.url') }}/storage/uploads/mail_member_area/{{ (!empty($store->mail_logo)) ? $store->mail_logo : 'rocketmember.png' }}" width="96px" heigth="auto" alt="Alt text" title="a title" />
</div>

# Caro(a) {{ $student_name }}

Esperamos que você esteja aproveitando ao máximo os recursos disponíveis através da sua assinatura conosco. Gostaríamos de informá-lo(a) que sua assinatura estará vencendo em {{ $days }} dias. Se você deseja continuar acessando nossos recursos sem interrupção, por favor, faça a renovação da sua assinatura.
<br>
Você pode renovar sua assinatura facilmente através do {{ $link }}.
<br>
Se houver alguma questão ou se precisar de assistência adicional, não hesite em entrar em contato conosco pelo e-mail {{ $store->mail }}.
<br>
Agradecemos por escolher {{ $store->name }} como sua plataforma de aprendizagem.
<br>
Atenciosamente,
<br><br>
{{ $store->name }}

@endcomponent