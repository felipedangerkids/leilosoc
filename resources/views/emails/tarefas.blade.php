@component('mail::message')
Email enviado pela LeiloSoc.
Voce recebeu um link de compartilhamento de tarefa.

@component('mail::button', ['url' => $tarefa_link])
Clique Aqui
@endcomponent

{{$tarefa_texto}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
