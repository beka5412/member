@component('mail::message')
<div style="text-align:center;margin-bottom:24px;">
    <img src="{{ config('app.url') }}/storage/uploads/mail_member_area/{{ (!empty($store->mail_logo)) ? $store->mail_logo : 'rocketmember.png' }}" width="96px" heigth="auto" alt="Alt text" title="a title" />
</div>

Alguem solicitou a alteração de senha para sua conta no {{ $store->name }}. Clique no botão abaixo para alterar sua senha.

@component('mail::button', ['url' => $domain])
    Alterar senha
@endcomponent


Se você não solicitou a alteração de senha, ignore este email.

Para manter sua conta segura, não compartilhe este email com ninguém.
@endcomponent