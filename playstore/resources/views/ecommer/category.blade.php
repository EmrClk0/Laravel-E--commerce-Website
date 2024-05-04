@extends("layout.ecommer")

@section("tittle")
{{$categoryName}} GAMES
@endsection

@section("content")

<section class="product_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
        {{$categoryName}} GAMES
        </h2>
      </div>
      <div class="row">
        
        @foreach($categoryGames as $game)
          @php 
           $stock = $game->getGameKeys;
           $stock=count($stock);
          
          @endphp
          <div class="col-sm-6 col-lg-4">
            <div class="box">
              <div class="img-box">
                <img src="{{asset('')}}images/gameImages/{{$game->image}}" alt="{{$game->name}}">
                <a href="{{route('addBasket',$game->id)}}" class="add_cart_btn">
                  <span>
                    Add To Cart
                  </span>
                </a>
              </div>
              <div class="detail-box">
                <h5>
                  {{$game->name}}
                </h5>
                <div class="product_info">
                  <h5>
                    <span>STOCK</span> {{$stock}}
                  </h5>
                  
                </div>
                <div class="product_info">
                  <h5>
                    <span>$</span> {{$game->price}}
                  </h5>
                  
                </div>
              </div>
            </div>
          </div>
          
        @endforeach
        
        
      </div>
      <div class="btn_box">
        <a href="" class="view_more-link">
          View More
        </a>
      </div>
    </div>
  </section>







@endsection