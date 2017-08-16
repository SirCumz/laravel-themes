@component('component.alert.alert')
    @slot('type')
        success
    @endslot

    @slot('icon')
        thumbs-o-up
    @endslot

    {{ $slot }}
@endcomponent
