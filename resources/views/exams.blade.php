@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="row justify-content-center">
            @foreach ($courses as $item)
              <div class="card" style="max-width: 18rem; padding: 5px;">
                <img src="{{asset('images/exam/card_bg.png')}}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">{{$item->name}}</h5>
                  <p>උත්සාහ කිරීමට ප්‍රශ්න පත්‍රය මත ක්ලික් කරන්න.</p>
                  @foreach ($item->papers as $paper)
                    @if($paper->published==1 && $paper->is_free==1)
                      <p class="card-text">
                        <a href="{{route('paper_view',['c' => $item->id, 'id' => $paper->id])}}">
                          {{$paper->name}}
                          @if ($paper->is_free==1)
                            <span class='badge badge-danger'>FREE</span>
                          @endif
                        </a>
                      </p>
                    @endif
                  @endforeach
                  <p>තවත් ප්‍රශ්න පත්‍ර බැලීමට ඉදිරියට යන්න ක්ලික් කරන්න</p>
                  <a href="{{url('exam/c').'/'.$item->id}}" class="btn btn-primary">ඉදිරියට යන්න...</a>
                </div>
              </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
