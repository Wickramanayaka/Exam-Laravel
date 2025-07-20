@foreach ($categories as $category)
    <ul class="list-group">
        <li class="list-group-item active"><h3>{{$category->name}}</h3></li>
        @foreach ($category->subCategories as $item)
            <li class="list-group-item"><a href="{{url('bookshop/c/'.$item->slang)}}#container" class="font-weight-bold" style="font-size: 1rem">{{$item->name}}</a></li>
        @endforeach
    </ul>
    <br>
@endforeach