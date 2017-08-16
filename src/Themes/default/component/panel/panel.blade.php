<div {!! $attributes->prependClass('panel panel-' . $type ) !!}>

  @if( isset($heading) )
    <div class="panel-heading">
        {!! $heading !!}
    </div>
  @endif

  @if( isset($body) )
  <div class="panel-body">
    {!! $body !!}
  </div>
  @endif

  @if( !starts_with($slot, '<table') && !starts_with($slot, '<ul') )
    <div class="panel-body">
        {!! $slot !!}
    </div>
  @else
    {!! $slot !!}  
  @endif

  @if( isset($footer) )
    <div class="panel-footer">
    {!! $footer !!}
    </div>
  @endif

</div>