@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 text-center">
            <h4 class="display-4 font-weight-bold">පුස්තකාලය</h4>
            <br>
            <h4 class="text-dark font-weight-bold text-justify">ප්‍රාථමික අධ්‍යාපනයට අදාල වන ඉගෙනුම් ඉගෙන්වීම් සම්පත් රාශියක් මෙහිදී ලබාගත හැකි අතර මේ සඳහා අප විසින් කිසිදු ගාස්තුවක් අය නොකෙරේ. මෙහි ඇතුලත් සමහර සම්පත් බාහිර පාර්ශව වල ප්‍රකාශන සහ නිර්මාණ  නව අතර ඒවායේ අයිතියද ඔහුන් සතුවෙයි.</h4>
        </div>
    </div>
    <br>
    @foreach ($categories as $item)
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h1 class="font-weight-bold">{{$item->name}}</h1>
                <br>
                <div class="row row-cols-1 row-cols-5">
                    @foreach ($item->featuredMaterials as $i)
                        <div class="col mb-4">
                            <div class="card h-100">
                                <img src="{{url('lib/store_image/fetch_image')}}/{{$i->id}}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">{{$i->name}}</h5>
                                    <p class="card-text">{{$i->description}}</p>
                                </div>
                                <div class="card-footer">
                                    <a href="{{url('lib/m').'/'.$i->id}}" class="btn btn-primary btn-block">Download</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row text-center">
                    <div class="col text-center">
                        <a href="{{url('lib/c').'/'.$item->slang}}" class="btn btn-primary">See More</a>
                    </div>
                </div>
            </div>
        </div>
        <hr>
    @endforeach
</div>
@endsection