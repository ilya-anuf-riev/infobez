@extends('layout')
@section('content')
<!-- <div class="text-center "> -->
<div class="card mt-3">
  <div class="card-body">
    <h5 class="card-title">{{$article->title}}</h5>
    <h6 class="card-subtitle mb-2 text-muted">{{$article->shortDesc}}</h6>
    <p class="card-text">{{$article->text}}</p>
    <div class="d-flex">
       <a class="btn btn-warning mr-3" href="/article/{{$article->id}}/edit" class="card-link">Edit article</a>
        <form action="" method="post">
            @csrf
            @METHOD('DELETE')
            <button type="submit" class="btn btn-danger">Delete article</button>
        </form> 
    </div>
    
  </div>
</div>
<!-- </div> -->
@endsection