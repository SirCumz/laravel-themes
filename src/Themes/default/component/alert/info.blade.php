@component('component.alert.alert')
    @slot('type')
        info
    @endslot

    @slot('icon')
        info
    @endslot

    {{ $slot }}
@endcomponent
