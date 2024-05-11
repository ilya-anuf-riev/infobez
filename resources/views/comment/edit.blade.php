@extends ('layout') 
@section ('content')
<form action="/comment/update/{{$comment->id}}" method="POST"> 
 
 @csrf 
 <div class="mb-3"> 
 <label for="exampleInputEmail1" class="form-label">Заголовок</label> 
 <input type="text" class="form-control" id="exampleInputEmail1" name="title" aria-describedby="emailHelp" value="{{$comment->title}}"> 
 </div> 
 <div class="mb-3"> 
 <label for="exampleInputPassword1" class="form-label">Текст</label> 
 <textarea class="form-control" id="exampleInputPassword1" name="desc">{{$comment->desc}}</textarea> 
 </div> 
 <input type="hidden" name="article_id" value="{{$comment->article_id}}"> 
 <button type="submit" class="btn btn-primary">Update</button> 
 </form> 
 @endsection