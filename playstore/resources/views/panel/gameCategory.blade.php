@extends("layout.panel")
@section("css")
<style>
    #muUl {
  counter-reset: index;  
  padding: 0;
  max-width: 300px;
}

/* List element */
#myIl {
  counter-increment: index; 
  display: flex;
  align-items: center;
  padding: 12px 0;
  
  border: 3px solid brown;
  border-radius: 20px;
}


/* Element counter */
#myIl::before {
  content: counters(index, ".", decimal-leading-zero);
  font-size: 1.5rem;
  text-align: right;
  font-weight: bold;
  min-width: 50px;
  padding-right: 12px;
  font-variant-numeric: tabular-nums;
  align-self: flex-start;
  background-image: linear-gradient(to bottom, aquamarine, orangered);
  background-attachment: fixed;
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}


/* Element separation */
#myIl + #myIl {
  border-top: 1px solid rgba(255,255,255,0.2);
}
.big-checkbox {width: 30px; height: 30px;}
.big-checkbox-text{
    font-size: 25px;
}


</style>
@endsection

@section("content")
<br><br><br><br>

<div class="container">
<div class="row">
<div class="col-md-6">
    <H1>GAMES</H1>
    <ul id="muUl">
    
        @foreach($games as $game)
        <a href="{{route('showGameCategory',$game->id)}}"><li id = "myIl"><img width="80px" height="100px" src="{{asset('')}}images/gameImages/{{$game->image}}" alt=""><h3>{{$game->name}}</h3></li></a>

        @endforeach
    </ul>
</div>
<div class="col-md-6">
    @if($gameId==null)
        <h1>CHOOSE A GAME</h1>
    @else
    <H1>RELATE THE CATEGORİES</H1>
        @php 
        $mydata=[];
        @endphp

        @if(count($selectedCategories)!=0)
            @foreach($selectedCategories as $selectedCategory)
            @php 
                array_push($mydata,$selectedCategory->category_id);
            @endphp
            @endforeach

        @endif
        <form action="{{route('gameCategoryProccess')}}" method="post">
            @csrf
            @foreach($categories as $category)
               
                @if(in_array($category->id,$mydata))
                <div class="form-check">
                    <input class="big-checkbox" class="form-check-input" type="checkbox" name="categories[]" value="  {{$category->id}}" id="defaultCheck1" checked >
                    <label class="big-checkbox-text" class="form-check-label" for="defaultCheck1">
                            {{$category->name}}
                    </label>

                </div>

                @else

                <div class="form-check">
                    <input class="big-checkbox" class="form-check-input" type="checkbox" name="categories[]" value="  {{$category->id}}" id="defaultCheck1" >
                    <label class="big-checkbox-text"class="form-check-label" for="defaultCheck1">
                            {{$category->name}}
                    </label>

                </div>


                @endif


                    

               
            @endforeach
            <input type="hidden" name="gameId" value="{{$gameId}}">
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    @endif
</div>
</div>
</div>
@endsection