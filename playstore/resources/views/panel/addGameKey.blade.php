@extends("layout.panel")
@section("tittle")
ADMİN-ADD-GAME-KEY
@endsection

@section("content")
@foreach($games as $game)
@php 
$stock = count($game->getGameKeys);
@endphp
@if($stock ==0)
        <a href="{{route('showAddGameKey',$game->id)}}" class="btn btn-danger"><h1>{{$game->name}}</h1> <h4>{{$stock}}</h4> </a>

        @else
        <a href="{{route('showAddGameKey',$game->id)}}" class="btn btn-primary"><h1>{{$game->name}}</h1> <h4>{{$stock}}</h4></a>
        @endif
@endforeach
@endsection