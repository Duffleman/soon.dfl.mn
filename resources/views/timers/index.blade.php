@extends('app')

@section('content')

    <div class="container">
        @forelse($timers->chunk(4) as $chunk)
            <div class="row">
                @foreach($chunk as $timer)
                    <div class="col-md-4">
                        <div class="card card-block p-a m-t text-center">
                            <h5 class="card-title">
                                {{ $timer->name }}
                                @if(auth()->check() && auth()->user()->id === $timer->user_id)
                                    <a href="/timers/{{$timer->id}}/destroy"><i class="pull-right fa fa-trash text-red"></i></a>
                                @endif
                            </h5>
                            <h3 data-countdown="{{$timer->date}}">{{ $timer->date->format('jS M \'y - H:i') }}</h3>
                            <small class="card-text text-muted">{{ $timer->date->format('jS F Y \a\t H:i') }}</small>
                        </div>
                    </div>
                @endforeach
            </div>
        @empty
            <div class="row">
                <div class="col-lg-4 col-lg-offset-4">
                    <div class="card card-block m-t text-center">
                        <h4 class="card-title">No Timers!</h4>
                        <p class="card-text">Add a timer above.</p>
                    </div>
                </div>
            </div>
        @endforelse
    </div>
@endsection

@section('javascript')
<script>
    $(document).ready(function() {
        $('[data-countdown]').each(function() {
            var $this = $(this), finalDate = $(this).data('countdown');
            $this.countdown(finalDate, function(event) {
                $this.html(event.strftime('%-Dd %Hh %Mm'));
            });
        });
    });
</script>
@endsection