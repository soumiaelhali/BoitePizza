
  <?php $total = 0 ?>
  @foreach((array) session('cart') as $id => $details)
      <?php $total += $details['price'] * $details['quantity'] ?>
  @endforeach

<div class="rd-navbar-basket-wrap">
    <button class="rd-navbar-basket fl-bigmug-line-shopping198" data-rd-navbar-toggle=".cart-inline"><span>{{ count((array) session('cart')) }}</span></button>
    <div class="cart-inline">
      <div class="cart-inline-header">
        <h5 class="cart-inline-title">On Panier : <span>{{ count((array) session('cart')) }}</span> Produits</h5>
        <h6 class="cart-inline-title">Prix Total : <span>${{$total}}</span></h6>
      </div>
      <div class="cart-inline-body" >

        @if(session('cart'))
        @foreach(session('cart') as $id => $details)
        <div class="cart-inline-item">
          <div class="unit align-items-center">
            <a class="cart-inline-figure" href="#"><img  src="{{'storage/'.$details['photo'] }}" alt="" /></a>
            <div class="unit-body">
              <h6 class="cart-inline-name"><a href="#">{{ $details['name'] }}</a></h6>
              <div>
                <div class="group-xs group-inline-middle">
                  <div class="table-cart-stepper">
                    <input class="form-input" type="number" data-zeros="true" value="{{ $details['quantity'] }}" min="1" max="1000">
                  </div>
                  <h6 class="cart-inline-title">${{ $details['price'] * $details['quantity'] }}</h6>
                </div>
              </div>
            </div>
          </div>
        </div>

        @endforeach
        @endif

      </div>
      <div class="cart-inline-footer">
      <div class="group-sm"><a class="button button-md button-default-outline-2 button-wapasha" href="{{route('go-to-cart')}}">Panier</a><a class="button button-md button-primary button-pipaluk" href="#">Check-out</a></div>
      </div>
    </div>
  </div><a class="rd-navbar-basket rd-navbar-basket-mobile fl-bigmug-line-shopping198" href="#"><span>2</span></a>
