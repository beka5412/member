@component('mail::message')
<div style="text-align:center;margin-bottom:24px;">
    <img src="{{ config('app.url') }}/storage/uploads/mail_member_area/{{ (!empty($store->mail_logo)) ? $store->mail_logo : 'rocketmember.png' }}" width="96px" heigth="auto" alt="Alt text" title="a title" />
</div>

# Olá {{ $student_name }}

Parabéns pela sua decisão de adquirir novos cursos na nossa plataforma! 🎉 <br> <br>

Desejamos a você uma experiência enriquecedora e gratificante em cada curso que escolheu. Lembre-se de que nossa equipe está sempre à disposição para auxiliá-lo em sua jornada educacional.
<br><br>
Continue se desafiando e buscando a excelência. Estamos ansiosos para celebrar suas conquistas e vitórias futuras!
<br><br>
Sucesso e ótimos estudos!

Atenciosamente, <br>
{{ $store->name }}
<br>
@endcomponent