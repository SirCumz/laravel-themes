@component('component.alert.alert')
    @slot('type')
        warning
    @endslot

    @slot('icon')
        exclamation-triangle
    @endslot

    {{ $slot }}
@endcomponent
