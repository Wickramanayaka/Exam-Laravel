<div class="row">
    <div class="col-md-10 offset-md-1">
        <h5 class="text-right text-danger font-weight-bold" id="timer"></h5>
        <hr>
        <br>
        <h5>{{$question->getOriginal('pivot_question_number')}}.</h5> {!! $question->question !!}
        <hr>
        @foreach ($question->answers as $answer)
        <div class="form-group">
            @if ($user_answer==null)
                <h5><input class="check-box" type="checkbox" name="answer[]" id="a{{$answer->answer_number}}" value="{{$answer->id}}">&nbsp; {{$answer->answer_number}}. {{$answer->answer}}</h5>
            @else
                <h5><input class="check-box" {{$answer->id==$user_answer->ex_answer_id?"checked":""}} type="checkbox" name="answer[]" id="a{{$answer->answer_number}}" value="{{$answer->id}}">&nbsp; {{$answer->answer_number}}. {{$answer->answer}}</h5>
            @endif
        </div>
        @endforeach
        <hr>
        <div class="row">
            @if ($question->getOriginal('pivot_question_number')<>1)
                <div class="col text-left">
                    <button class="btn btn-outline-primary btn-lg" onclick="back()">ආපසු</button>
                </div>
            @else
                <div class="col text-left">
                    
                </div>
            @endif
            <div class="col text-center"><h5>{{$question->getOriginal('pivot_question_number')}}/{{$count}}</h5></div>
            @if ($question->getOriginal('pivot_question_number')< $count)
                <div class="col text-right">
                    <button class="btn btn-outline-primary btn-lg" onclick="next()">ඉදිරියට</button>
                </div>
            @else
                <div class="col text-right">
                    <button class="btn btn-outline-danger btn-lg" onclick="submit()">පිළිතුරු පරීක්ෂා කිරීමට</button>
                </div>
            @endif
        </div>
    </div>
</div>
