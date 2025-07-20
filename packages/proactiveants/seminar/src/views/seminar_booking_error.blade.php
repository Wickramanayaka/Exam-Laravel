@extends('layouts.app')

@section('content')
<div class="container">
    <div class="jumbotron">
        <h1 class="h1">කණගාටුයි, නැවත උත්සාහ කරන්න.</h1>
        <h3>ඔබ තෝරාගත් දිනය සම්මන්ත්‍රණයකට හෝ වැඩමුළුවකට ලබා ගත නොහැක.</h3>
        <hr class="my-4">
        <p class="lead">නැවත උත්සාහ කිරීමට පහත බොත්තම ක්ලික් කරන්න.</p>
        <a class="btn btn-primary btn-lg" href="{{url('sem')}}" role="button">නැවත උත්සාහ කිරීමට</a>
    </div>
</div>
@endsection