@extends("layout.panel")

@section("tittle")
ADMİN-ADD-GAME-KEY
@endsection

@section("content")


<div class="row">
    <div class="col-md-4" >  
        <img height = "600" width="450" src="{{asset('')}}images/gameImages/{{$game->image}}" alt="">
    </div>
    <div class="col-md-8">
        <h1>GAME NAME: &nbsp;&nbsp; {{$game->name}}</h1>
        <hr/> <br>

        <h1>GAME STOCK: &nbsp;&nbsp; {{count($gameKeys)}}</h1>
        <hr/> <br>
        <h2>Game Descriptiın</h2>
        <h3>{{$game->description}}</h3>
        
    </div>
</div>
<br><br><br><br>
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

@if(session("error"))
    <div class="alert alert-danger" role="alert">
    {{session("error")}}
    </div>

@endif



<form method="post" action="{{route('addGameKeyProccess')}}">
    @csrf"
    <input type="hidden" name="gameId" value="{{$game->id}}">
  <div class="form-group">
    <label for="exampleInputEmail1"><h1>NEW KEY</h1></label>
    <input type="text" class="form-control" name="gameKey" placeholder="XXXXX-XXXXX-XXXXX">
    
    
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>


<br><br><br><br>


<h6 class="mb-0 text-uppercase">{{$game->name}}&nbsp; KEYS</h6>
				<hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th>GAME-KEY ID</th>
										<th>GAME KEY</th>
                                        <th>GAME KEY DELETE</th>
										
                                       
										
									</tr>
								</thead>
                                
								<tbody>
                                    @if(count($gameKeys)!=0)
                                        @foreach($gameKeys as $gameKey)
                                            
                                            <tr>
                                                <td>{{$gameKey->id}}</td>
                                                <td>{{$gameKey->key}}</td>
                                                <td>x</td>

                                            </tr>
                                        @endforeach
									@endif
								</tbody>
								<tfoot>
									<tr>
                                        <th>GAME-KEY ID</th>
										<th>GAME KEY</th>
                                        <th>GAME KEY DELETE</th>
										
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
				</div>





@endsection