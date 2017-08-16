@extends('layouts.app')

@section('content')
 
        @component('VideoPlayer::component.player', ['src' => 'http://vjs.zencdn.net/v/oceans.mp4', 'type' => 'video/mp4'])

        @endcomponent
  
@endsection
