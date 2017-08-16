@component('component.alert.alert')
    @slot('type')
        danger
    @endslot

    @slot('icon')
        exclamation-circle
    @endslot

    {{ $slot }}
@endcomponent
