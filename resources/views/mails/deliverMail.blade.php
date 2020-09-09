@component('mail::message')
Hello !!,  {{-- use double space for line break --}}
Food is on the way!  
Thank you for your order !


@component('mail::button', ['url' => $actionURL])
Go to your invoice
@endcomponent
Sincerely,  
@endcomponent