@component('mail::message')
<h1>New Message From {{ $contact_form_data['email']}}</h1>
<p>Name  {{ $contact_form_data['name']}}</p>
<p>Phone  {{ $contact_form_data['phone']}}</p>
<p>Message  {{ $contact_form_data['message']}}</p>
@endcomponent
