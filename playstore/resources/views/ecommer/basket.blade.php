@extends("layout.ecommer")
@section("tittle")
BASKET
@endsection

@section("css")
<style>
    body {
    background: #eee;
    margin: 0;
    padding: 0;
    overflow-x: hidden;
  }

  .clearfix {
    content: "";
    display: table;
    clear: both;  
  }

  #site-header, #site-footer {
    background: #fff;
  }

  #site-header {
    margin: 0 0 30px 0;
  }

  #site-header h1 {
    font-size: 31px;
    font-weight: 300;
    padding: 40px 0;
    position: relative;
    margin: 0;
  }

  a {
    color: #000;
    text-decoration: none;

    -webkit-transition: color .2s linear;
    -moz-transition: color .2s linear;
    -ms-transition: color .2s linear;
    -o-transition: color .2s linear;
    transition: color .2s linear;
  }

  a:hover {
    color: #53b5aa;
  }

  #site-header h1 span {
    color: #53b5aa;
  }

  #site-header h1 span.last-span {
    background: #fff;
    padding-right: 150px;
    position: absolute;
    left: 217px;

    -webkit-transition: all .2s linear;
    -moz-transition: all .2s linear;
    -ms-transition: all .2s linear;
    -o-transition: all .2s linear;
    transition: all .2s linear;
  }

  #site-header h1:hover span.last-span, #site-header h1 span.is-open {
    left: 363px;
  }

  #site-header h1 em {
    font-size: 16px;
    font-style: normal;
    vertical-align: middle;
  }

  .container {
    font-family: 'Open Sans', sans-serif;
    margin: 0 auto;
    width: 980px;
  }

  #cart {
    width: 100%;
  }

  #cart h1 {
    font-weight: 300;
  }

  #cart a {
    color: #53b5aa;
    text-decoration: none;

    -webkit-transition: color .2s linear;
    -moz-transition: color .2s linear;
    -ms-transition: color .2s linear;
    -o-transition: color .2s linear;
    transition: color .2s linear;
  }

  #cart a:hover {
    color: #000;
  }

  .product.removed {
    margin-left: 980px !important;
    opacity: 0;
  }

  .product {
    border: 1px solid #eee;
    margin: 20px 0;
    width: 100%;
    height: 195px;
    position: relative;

    -webkit-transition: margin .2s linear, opacity .2s linear;
    -moz-transition: margin .2s linear, opacity .2s linear;
    -ms-transition: margin .2s linear, opacity .2s linear;
    -o-transition: margin .2s linear, opacity .2s linear;
    transition: margin .2s linear, opacity .2s linear;
  }

  .product img {
    width: 100%;
    height: 100%;
  }

  .product header, .product .content {
    background-color: #fff;
    border: 1px solid #ccc;
    border-style: none none solid none;
    float: left;
  }

  .product header {
    background: #000;
    margin: 0 1% 20px 0;
    overflow: hidden;
    padding: 0;
    position: relative;
    width: 24%;
    height: 195px;
  }

  .product header:hover img {
    opacity: .7;
  }

  .product header:hover h3 {
    bottom: 73px;
  }

  .product header h3 {
    background: #53b5aa;
    color: #fff;
    font-size: 22px;
    font-weight: 300;
    line-height: 49px;
    margin: 0;
    padding: 0 30px;
    position: absolute;
    bottom: -50px;
    right: 0;
    left: 0;

    -webkit-transition: bottom .2s linear;
    -moz-transition: bottom .2s linear;
    -ms-transition: bottom .2s linear;
    -o-transition: bottom .2s linear;
    transition: bottom .2s linear;
  }

  .remove {
    cursor: pointer;
  }

  .product .content {
    box-sizing: border-box;
    -moz-box-sizing: border-box;
    height: 140px;
    padding: 0 20px;
    width: 75%;
  }

  .product h1 {
    color: #53b5aa;
    font-size: 25px;
    font-weight: 300;
    margin: 17px 0 20px 0;
  }

  .product footer.content {
    height: 50px;
    margin: 6px 0 0 0;
    padding: 0;
  }

  .product footer .price {
    background: #fcfcfc;
    color: #000;
    float: right;
    font-size: 15px;
    font-weight: 300;
    line-height: 49px;
    margin: 0;
    padding: 0 30px;
  }

  .product footer .full-price {
    background: #53b5aa;
    color: #fff;
    float: right;
    font-size: 22px;
    font-weight: 300;
    line-height: 49px;
    margin: 0;
    padding: 0 30px;

    -webkit-transition: margin .15s linear;
    -moz-transition: margin .15s linear;
    -ms-transition: margin .15s linear;
    -o-transition: margin .15s linear;
    transition: margin .15s linear;
  }

  .qt, .qt-plus, .qt-minus {
    display: block;
    float: left;
  }

  .qt {
    font-size: 19px;
    line-height: 50px;
    width: 70px;
    text-align: center;
  }

  .qt-plus, .qt-minus {
    background: #fcfcfc;
    border: none;
    font-size: 30px;
    font-weight: 300;
    height: 100%;
    padding: 0 20px;
    -webkit-transition: background .2s linear;
    -moz-transition: background .2s linear;
    -ms-transition: background .2s linear;
    -o-transition: background .2s linear;
    transition: background .2s linear;
  }

  .qt-plus:hover, .qt-minus:hover {
    background: #53b5aa;
    color: #fff;
    cursor: pointer;
  }

  .qt-plus {
    line-height: 50px;
  }

  .qt-minus {
    line-height: 47px;
  }

  #site-footer {
    margin: 30px 0 0 0;
  }

  #site-footer {
    padding: 40px;
  }

  #site-footer h1 {
    background: #fcfcfc;
    border: 1px solid #ccc;
    border-style: none none solid none;
    font-size: 24px;
    font-weight: 300;
    margin: 0 0 7px 0;
    padding: 14px 40px;
    text-align: center;
  }

  #site-footer h2 {
    font-size: 24px;
    font-weight: 300;
    margin: 10px 0 0 0;
  }

  #site-footer h3 {
    font-size: 19px;
    font-weight: 300;
    margin: 15px 0;
  }

  .left {
    float: left;
  }

  .right {
    float: right;
  }

  .btn {
    background: #53b5aa;
    border: 1px solid #999;
    border-style: none none solid none;
    cursor: pointer;
    display: block;
    color: #fff;
    font-size: 20px;
    font-weight: 300;
    padding: 16px 0;
    width: 290px;
    text-align: center;

    -webkit-transition: all .2s linear;
    -moz-transition: all .2s linear;
    -ms-transition: all .2s linear;
    -o-transition: all .2s linear;
    transition: all .2s linear;
  }

  .btn:hover {
    color: #fff;
    background: #429188;
  }

  .type {
    background: #fcfcfc;
    font-size: 13px;
    padding: 10px 16px;
    left: 100%;
  }

  .type, .color {
    border: 1px solid #ccc;
    border-style: none none solid none;
    position: absolute;
  }

  .color {
    width: 40px;
    height: 40px;
    right: -40px;
  }

  .red {
    background: #cb5a5e;
  }

  .yellow {
    background: #f1c40f;
  }

  .blue {
    background: #3598dc;
  }

  .minused {
    margin: 0 50px 0 0 !important;
  }

  .added {
    margin: 0 -50px 0 0 !important;
  }
</style>
@endsection


@section("content")
@if(session("error"))
<div class="alert alert-danger" role="alert">
  {{session("error")}}
</div>

@endif

@if(session("success"))
<div class="alert alert-danger" role="alert">
  {{session("success")}}
</div>

@endif
<div class="container">

    <section id="cart"> 
      @php 
        $total =0;
      @endphp
      @foreach($basketProducts as $basketProduct)
      @php
        $game = $basketProduct->getGame;
        $fullPrice = $game->price * $basketProduct->piece;
        $total+= $fullPrice;
      @endphp
      <article class="product">
        <header >
          <a class="remove">
            <img  src="{{asset('')}}images/gameImages/{{$game->image}}" alt="">

            <a href = "{{route('removeProduct',$basketProduct->id)}}"><h3>Remove product</h3></a>
          </a>
        </header>

        <div class="content">

          <h1>{{$game->name}}</h1>

          {{$game->description}}

        </div>
       

        <footer class="content">

          @if($basketProduct->piece > 1)
              <a href="{{route('decreasePiece',$basketProduct->id)}}">  <span class="qt-minus">-</span> </a>
          @else
            <a href = "{{route('removeProduct',$basketProduct->id)}}">  <span class="qt-minus">-</span> </a>
          @endif
          
          <span class="qt">{{$basketProduct->piece}}</span>
          <a href="{{route('increasePiece',$basketProduct->id)}}">   <span class="qt-plus">+</span>  </a>

          <h2 class="full-price">
          {{$fullPrice}}
          </h2>

          <h2 class="price">
          {{$game->price}} $
          </h2>
        </footer>
      </article>
      @endforeach
      

      

    </section>

  </div>

  <footer id="site-footer">
    <div class="container clearfix">

      <div class="left">
        <h2 class="subtotal">Subtotal: <span>163.96</span>€</h2>
        <h3 class="tax">Taxes (5%): <span>8.2</span>€</h3>
        <h3 class="shipping">Shipping: <span>5.00</span>€</h3>
      </div>

      <div class="right">
        <h1 class="total">Total: <span>{{$total}}</span>$</h1>
        <form action="{{route('checkout')}}" method="post">
            @csrf
          <input type="hidden" name="basketProducts" value="{{$basketProducts}}">
          <input type="hidden" name="total" value="{{$total}}">
          <button type="submit" class="btn">Checkout</button>

        </form>
        
      </div>

    </div>
  </footer>
@endsection

@section("js")
  <script>
    var check = false;

  function changeVal(el) {
    var qt = parseFloat(el.parent().children(".qt").html());
    var price = parseFloat(el.parent().children(".price").html());
    var eq = Math.round(price * qt * 100) / 100;
    
    el.parent().children(".full-price").html( eq + "€" );
    
    changeTotal();      
  }

  function changeTotal() {
    
    var price = 0;
    
    $(".full-price").each(function(index){
      price += parseFloat($(".full-price").eq(index).html());
    });
    
    price = Math.round(price * 100) / 100;
    var tax = Math.round(price * 0.05 * 100) / 100
    var shipping = parseFloat($(".shipping span").html());
    var fullPrice = Math.round((price + tax + shipping) *100) / 100;
    
    if(price == 0) {
      fullPrice = 0;
    }
    
    $(".subtotal span").html(price);
    $(".tax span").html(tax);
    $(".total span").html(fullPrice);
  }

  $(document).ready(function(){
    
    $(".remove").click(function(){
      var el = $(this);
      el.parent().parent().addClass("removed");
      window.setTimeout(
        function(){
          el.parent().parent().slideUp('fast', function() { 
            el.parent().parent().remove(); 
            if($(".product").length == 0) {
              if(check) {
                $("#cart").html("<h1>The shop does not function, yet!</h1><p>If you liked my shopping cart, please take a second and heart this Pen on <a href='https://codepen.io/ziga-miklic/pen/xhpob'>CodePen</a>. Thank you!</p>");
              } else {
                $("#cart").html("<h1>No products!</h1>");
              }
            }
            changeTotal(); 
          });
        }, 200);
    });
    
    $(".qt-plus").click(function(){
      $(this).parent().children(".qt").html(parseInt($(this).parent().children(".qt").html()) + 1);
      
      $(this).parent().children(".full-price").addClass("added");
      
      var el = $(this);
      window.setTimeout(function(){el.parent().children(".full-price").removeClass("added"); changeVal(el);}, 150);
    });
    
    $(".qt-minus").click(function(){
      
      child = $(this).parent().children(".qt");
      
      if(parseInt(child.html()) > 1) {
        child.html(parseInt(child.html()) - 1);
      }
      
      $(this).parent().children(".full-price").addClass("minused");
      
      var el = $(this);
      window.setTimeout(function(){el.parent().children(".full-price").removeClass("minused"); changeVal(el);}, 150);
    });
    
    window.setTimeout(function(){$(".is-open").removeClass("is-open")}, 1200);
    
    $(".btn").click(function(){
      check = true;
      $(".remove").click();
    });
  });
</script>
@endsection