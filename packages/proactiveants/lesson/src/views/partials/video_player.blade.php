<div class="row" id="player">
    <div class="col text-center">
        <h4>{{$video->name}}</h4>
    </div>
</div>
<hr>
<div class="row">
    <div class="col">
        @if ($video->free==1)
            <iframe width="100%" height="400" src="{{$video->url}}"></iframe>
        @else
        <iframe src="{{$video->url}}" width="100%" height="400" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
        @endif
        
    </div>
</div>
<hr>
<div class="row">
    <div class="col text-right">
        <p class="text-info">
            <b>නැරබුම් වාර {{$video->view->count}} | දායක වී ඇත {{$video->subscriptions->count()}}</b>
        </p>
    </div>
</div>
<div class="row">
    <div class="col">
        <h3><b>ගුරුවරයා ගැන</b></h3>
        <p class="lead">
            {{$video->teacher->description}}
        </p>
    </div>
</div>