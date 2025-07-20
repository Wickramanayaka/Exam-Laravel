@extends('layouts.app')

@section('content')
<div class="container" id="container">
    <div class="row justify-content-center">
        <h2 class="h3 font-weight-bold text-center">{{$course->name}} - {{$paper->name}}</h2>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-9 col-sm-12 border pt-5 pb-5" id="question">

        </div>
    </div>
</div>
@endsection
@section('javascript')
    <script>
        var q = 1;
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function(){
            $.post('{{url("exam/question/get")}}',
            {
                paper_id: {{$paper->id}},
                question_number: q
            },
            function(data, status){
                $('#question').html(data);
                eventhandler();
            })
            .fail(function(response){
                console.log(response);
            }); 
            var timer = setInterval(function(){
                $.post('{{url("exam/paper/updatetime")}}',
                {
                    paper_id: {{$paper->id}},
                    tryout_id: {{$tryout->id}}
                },
                function(data, status){
                    $('#timer').html(data);
                    if(data==0){
                        clearInterval(timer);
                        autosubmit();
                    }
                })
                .fail(function(response){
                    console.log(response);
                });
            },1000);           
        });
        function eventhandler(){
            $('.check-box').on('change',function(e){
                $('.check-box').not(this).prop('checked', false);
                answer();
            });
        }
        function back(){
            q--;
            $.post('{{url("exam/question/get")}}',
            {
                paper_id: {{$paper->id}},
                question_number: q
            },
            function(data, status){
                $('#question').html(data);
                eventhandler();
            })
            .fail(function(response){
                console.log(response);
            });  
        }
        function next(){
            q++;
            $.post('{{url("exam/question/get")}}',
            {
                paper_id: {{$paper->id}},
                question_number: q
            },
            function(data, status){
                $('#question').html(data);
                eventhandler();
            })
            .fail(function(response){
                console.log(response);
            });  
        }
        function answer(){
            $.post('{{url("exam/question/answer")}}',
            {
                paper_id: {{$paper->id}},
                question_number: q,
                answer: $('.check-box:checked').val()
            },
            function(data, status){
                console.log("Answer recorder.");
            })
            .fail(function(response){
                console.log(response);
            });  
        }
        function submit(){
            var c = confirm("Are you sure to submit the paper?");
            if(c){
                $.post('{{url("exam/paper/submit")}}',
                {
                    paper_id: {{$paper->id}}
                },
                function(data, status){
                    $('#question').html(data);
                })
                .fail(function(response){
                    console.log(response);
                });
            }
        }
        function autosubmit(){
            alert("The time is over, click ok to submit the paper.");
            $.post('{{url("exam/paper/submit")}}',
            {
                paper_id: {{$paper->id}}
            },
            function(data, status){
                $('#question').html(data);
            })
            .fail(function(response){
                console.log(response);
            });
        }
        function complete(){
            $.post('{{url("exam/paper/complete")}}',
                {
                    paper_id: {{$paper->id}}
                },
                function(data, status){
                    $('#question').html(data);
                })
                .fail(function(response){
                    console.log(response);
                });
        }

        function review(id){
            $.post('{{url("exam/paper/review")}}',
            {
                tryout_id: id
            },
            function(data, status){
                $('#question').html(data);
            })
            .fail(function(response){
                console.log(response);
            });
        }

    </script>
@endsection