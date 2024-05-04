@extends("layout.panel")
@section("tittle")
ADMİN-ADD-GAME
@endsection



@section("css")

@endsection

@section("content")
@if($errors->any())
  @foreach($errors->all() as $error)
      <div class="alert alert-warning" role="alert">
      {{$error}}
      </div>
  @endforeach

  

@endif


@if(session("success"))
<div class="alert alert-success" role="alert">
 {{session("success")}}
</div>
@endif

<form method="post" action="{{route('addGameProccess')}}" enctype="multipart/form-data">
    @csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Game Name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="gameName" >
   

  <div class="form-group">
    <label for="exampleInputPassword1">Game Price</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="gamePrice" >
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Game Description</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="gameDescription">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Game Image</label> <br>
    <input type="file" name="gameImage">
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>



@endsection









@section("js")

@endsection


