@extends('admin::layouts.app')
@section('content')
<div class="container">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Exams</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <a href="{{url('adm/ex/paper')}}" class="btn btn-sm btn-outline-secondary" ><span data-feather="database"> </span>
                Add Question to Paper
            </a>  
            <a href="{{url('adm/ex/paper')}}" class="btn btn-sm btn-outline-secondary" >
                Exam Papers
            </a>
          </div>
          </button>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <h5>Exam Question List</h5>
        </div>
        <div class="col-auto">
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" name="keyword" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </div>    
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="row">
            <div class="col" id="questionList">

            </div>
        </div>
    </div>
</div>
@endsection
@section('javascript')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    function addToPaper(id){
        $.post('{{url('adm/ex/que/addToPaper')}}',{
            paper_id: {{$paper->id}},
            question_id: id
        },function(data, status){
            alert("The question has been added to the paper.");
        })
        .fail(function(error){
            alert("Something went wrong.");
        });
    }

    $(document).ready(function(){
        $.post('{{url('adm/ex/que/ajaxList')}}',{},function(data, status){
            $("#questionList").html(data);
        }).fail(function(error){
            alert("Something went wrong.");
        });
    });
</script>

@endsection