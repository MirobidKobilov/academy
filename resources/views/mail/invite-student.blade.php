@component('mail::message')
    <h2>Пожалуйста пройдите по ссылке, чтобы начать экзамен</h2>
    @component('mail::button', ['url' => $url])
        пройти
    @endcomponent
    Webparadox
@endcomponent
