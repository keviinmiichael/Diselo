@component('mail::message')
# Consulta

<p><strong>Nombre:</strong> {{ $data['name'] }}</p>

<p><strong>Email:</strong> {{ $data['email'] }}</p>

<p><strong>Asunto:</strong> {{ $data['subject'] }}</p>

<p><strong>Mensaje:</strong> {{ $data['message'] }}</p>

@endcomponent
