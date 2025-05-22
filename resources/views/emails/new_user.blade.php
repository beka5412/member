@component('mail::message')

<div style="text-align:center;margin-bottom:24px;">
    <img src="{{ config('app.url') }}/storage/uploads/mail_member_area/{{ (!empty($store->mail_logo)) ? $store->mail_logo : 'rocketmember.png' }}" width="96px" heigth="auto" alt="Alt text" title="a title" />
</div>


Olá {{ $student->name }},
---------------------

Você acabou de receber acesso na área de membros Área de Membro - {{ $store->name }}. Clique no botão abaixo para acessar sua Área de membros.

@php
    $domain = $store->domains ?? "https://rocketmember.app/store/" . $store->slug;
@endphp

@component('mail::button', ['url' => $domain])
    Acessar conteúdo
@endcomponent

*1.* Acesse o link: {{ $domain }} <br>
*2.* Em “Usuário ou Email”, informe {{ $student->email }} <br>
*3.* No campo "Senha", informe a senha: {{ $passwd }}

Caso você não tenha uma senha de uma conta ou se tiver esquecido, é só gerar uma nova neste link: https://rocketmember.app/{{ $store->slug }}/student-password

Para dúvidas relacionadas ao conteúdo do produto, entre em contato com o(a) Produtor(a) através do email {{ $store->email }}.
@endcomponent