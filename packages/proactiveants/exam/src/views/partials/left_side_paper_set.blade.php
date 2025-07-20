@foreach ($sets as $item)
    <ul class="list-group">
        <li class="list-group-item active"><h3>{{$item->name}}</h3></li>
        @foreach ($item->papers as $paper)
            <li class="list-group-item">
                <a href="{{url('exam/c/'.$category->slang.'/p/'.$paper->slang)}}#container" class="font-weight-bold" style="font-size: 1rem">{{$paper->name}}</a>
            </li>
        @endforeach
    </ul>
    <br>
@endforeach