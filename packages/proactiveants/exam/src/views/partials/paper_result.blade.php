<div class="row">
    <div class="col-md-10 offset-md-1">
        <h2 class="h3 font-weight-bold text-center">පිළිතුරු සාරාංශය</h2>
        <br>
        @foreach ($tryout->paper->questions as $question)
            <h5>{{$question->getOriginal('pivot_question_number')}}.</h5> {!! $question->question !!}
            @foreach ($question->answers as $answer)
                <h5>
                    @php
                        $checked = "";
                        $is_user_answer_correct = 0;
                        foreach ($tryout->userAnswers as $ua) {
                            if($ua->ex_question_id==$question->id){
                                if($ua->ex_answer_id==$answer->id){
                                    $checked = "checked";
                                }
                                if($ua->is_correct==1){
                                    $is_user_answer_correct=1;
                                }
                            }
                        }
                    @endphp
                    <input readonly disabled class="check-box" type="checkbox" {{$checked}} name="answer[]" id="a{{$answer->answer_number}}" value="{{$answer->id}}">&nbsp; {{$answer->answer_number}}. {{$answer->answer}}
                    @if ($answer->is_correct==1)
                        <i class="fa fa-check text-success"></i>
                    @else
                        <i class="fa fa-times text-danger"></i>
                    @endif
                </h5>
            @endforeach
            <p class="text-center text-light bg-secondary">
                @if ($is_user_answer_correct==1)
                    <i class="fa fa-check fa-fw text-success"></i> Your asnwer is correct
                @else
                    <i class="fa fa-times fa-fw text-danger"></i> Wrong answer
                @endif
            </p>
            <hr>
        @endforeach
        <button class="btn btn-primary" onclick="complete()">උත්සාහක ලැයිස්තුව බලන්න</button>
        <a href="{{route('paper_view',['c' => $tryout->paper->course->id, 'id' => $tryout->paper->id])}}" class="btn btn-success">නැවත උත්සහා කරන්න</a>
    </div>
</div>
