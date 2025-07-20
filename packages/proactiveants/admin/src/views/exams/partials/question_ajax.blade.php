<div class="row">
    <div class="card-columns">
        @foreach ($questions as $question)
            <div class="card">
                <div class="card-body">
                <p class="card-text">{!! $question->question !!}</p>
                @foreach ($question->answers as $answer)
                    <p>
                        {{$answer->answer_number}}. {!! $answer->answer !!}
                        @if ($answer->is_correct==1)
                            <span data-feather="check" class="text-success"></span>
                        @endif
                    </p>
                @endforeach
                <button class="btn btn-link" onclick="addToPaper({{$question->id}})">+ Add to question paper</button>
                </div>
            </div>
        @endforeach
    </div>
</div>