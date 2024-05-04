@extends("layout.panel")
@section("tittle")
ADMİN-GAME-DATA
@endsection










@section("css")
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
<link rel=”stylesheet” href=”//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css”>
@endsection

@section("content")
<br><br><br><br><br>
@if(session('success'))
    <div class="alert alert-success" role="alert">
    {{session('success')}}
    </div>
@endif
<h6 class="mb-0 text-uppercase">DataTable Example</h6>
				<hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th>GAME ID</th>
										<th>GAME IMAGE</th>
										<th>GAME NAME</th>
										<th>GAME PRİCE</th>
                                        <th>GAME STOCK</th>
										<th>GAME DELETE</th>
                                       
										
									</tr>
								</thead>
								<tbody>
                                    @if($games)
                                        @foreach($games as $game)
                                            @php 
                                            $stock = count($game->getGameKeys);
                                            @endphp
                                            <tr>
                                                <td>{{$game->id}}</td>
                                                <td><img height="120" width="68" src="{{asset('')}}images/gameImages/{{$game->image}}" alt=""></td>
                                                <td>{{$game->name}}</td>
												<td>{{$game->price}} $</td>
												@if($stock ==0)
												<td><a href="{{route('showAddGameKey',$game->id)}}" class="btn btn-danger">{{$stock}} </a></td>

												@else
												<td><a href="{{route('showAddGameKey',$game->id)}}" class="btn btn-primary">{{$stock}}</a></td>
												@endif
                                                <td><a href="" class="btn btn-danger"> DELETE GAME</a>  </BR>
													ALSO YOU WİLL DELETE ALL KEYS</td>
                                                
                                                
                                                
                                            </tr>
                                        @endforeach
									@endif
								</tbody>
								<tfoot>
									<tr>
                                        <th>GAME ID</th>
										<th>GAME IMAGE</th>
										<th>GAME NAME</th>
										<th>GAME PRİCE</th>
                                        <th>GAME STOCK</th>
										<th>GAME DELETE</th>

									</tr>
								</tfoot>
							</table>
						</div>
					</div>
				</div>

@endsection









@section("js")
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
<script src=”//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js”></script>
	<script>
		$(document).ready(function() {
			$('#example').DataTable();
		  } );
	</script>
@endsection


