@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            {{ config('app.name') }}
        @endcomponent
    @endslot
    <div style="display: grid; justify-content: center" >
        <div>
            <h2>{{$name}}  вас приглашаем на зум : {{$start_time}}</h2>
        </div>
        <div>
            <a href="{{$join_url}}">{{$join_url}}</a>
        </div>
    </div>
    {{-- Footer --}}
    @slot('footer')
        @component('mail::footer')
            © {{ date('Y') }} {{ config('app.name') }}. @lang('All rights reserved.')
        @endcomponent
    @endslot
@endcomponent
