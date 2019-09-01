@extends('layouts.app')

@section('content')
    <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-default">
            <div class="panel-heading">Internet radio stations player <span class="pull-right" id="radio-now-playing"></span></div>
            <div id="hide-text" class="panel-body"><p> Selecteer radio station..</p></div>
            <div id="hide-player">
                <audio id="player" class="plyr--setup"><source id="link_from_id" src="" type="audio/mp3">
            </audio>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading"><i class="fas fa-signal"></i> Internet radio stations</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        @if ($internetradiostations->isEmpty()) <p>Er zijn Geen internet radio stations geconfigureerd</p> @else
                    <div class="row">
                        @foreach ($internetradiostations as $internetradiostation)
                        <div class="col-xs-6 col-md-1">
                            <a href="#{{ +$i }}" data-radio-link="{{ $internetradiostation->url}}" data-now-playing="{{ $internetradiostation->title}}" class="thumbnail" id="player-radio">
                                @if(is_null($internetradiostation->logo)) Geen logo
                                @else
                                    <img src="./logos/{{ $internetradiostation->logo}}" alt="{{ $internetradiostation->logo}}">@endif
                                <p>{{ $internetradiostation->title}}<br><i class="fas fa-play"></i><span class="pull-right">nr: {{ ++$i }}</span></p>
                            </a>
                        </div>
                        @endforeach
                        @endif
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('local-scripts')
<script type="application/javascript">
    if (document.getElementById('hide-player').style.display === '') {
        document.getElementById('hide-player').style.display = 'none'; }
    $(".thumbnail").on('click', function() {
        var strLink = ($(this).attr('data-radio-link'));
        var now_playing = ($(this).attr('data-now-playing'));
            if (document.getElementById('hide-player').style.display === 'block') {
                var players = plyr.get();
                players[0].source({
                    type:       'audio',
                    sources: [{
                        src:      strLink,
                        type:     'audio/mp3'
                    },{}]});
            }
            else {
            plyr.setup({autoplay: true});
            document.getElementById('hide-player').style.display = 'block';
            document.getElementById('hide-text').style.display = 'none';
            document.getElementById("link_from_id").setAttribute("src", strLink);
            }
        $("#radio-now-playing").text('Speelt af: ' + now_playing);

    });
</script>
@endsection