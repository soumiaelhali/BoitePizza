      <!-- Trending products-->
      <section class="section section-md bg-default">
        <div class="container">


            <div class="col-lg-12">
              <div class="row row-30 justify-content-center">
                  @foreach ($produits as $item)


                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">

                    <!-- Product-->
                    <article class="product product-2 box-ordered-item wow slideInRight" >
                      <div class="unit flex-row flex-lg-column">

                          <div><img src="{{'storage/'.$item->imgPath}}" alt="{{$item->imgPath}}" style="width: 200px; height:200px;"/>
                            <div class="product-button"><a class="button button-md button-white button-ujarak" href="{{ url('add-to-cart/'.$item->id) }}">Ajouter au panier</a></div>
                          </div>

                        <div class="unit-body">
                          <h6 class="product-title"><a href="#">{{$item->nom}}</a></h6>
                          <div class="product-price-wrap">
                            <div class="product-price product-price-old">${{$item->prix}}</div>
                          <div class="product-price">${{$item->remise}}</div>
                          </div><a class="button button-sm button-secondary button-ujarak" href="{{ url('add-to-cart/'.$item->id) }}">Ajouter au panier</a>
                        </div>
                      </div>
                    </article>

                </div>
                @endforeach
              </div>
            </div>

        </div>
      </section>
