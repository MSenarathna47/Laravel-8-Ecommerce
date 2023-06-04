

<!-- == === skip_brand_product_1 PRODUCTS == ==== -->

<section class="section featured-product wow fadeInUp">
    <h3 class="section-title">
{{ $skip_brand_1->brand_name}}
      </h3>
    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">


      @foreach($skip_brand_product_1 as $product)
      <div class="item item-carousel">
              <div class="products">
                <div class="product">
                  <div class="product-image">
                    <div class="image"> <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug) }}"><img  src="{{ asset($product->product_thambnail) }}" alt=""></a> </div>
                    <!-- /.image -->

  @php
  $amount = $product->selling_price - $product->discount_price;
  $discount = ($amount/$product->selling_price) * 100;
  @endphp

    <div>
      @if ($product->discount_price == NULL)
      <div class="tag new"><span>new</span></div>
      @else
      <div class="tag hot"><span>{{ round($discount) }}%</span></div>
      @endif
    </div>
                   </div>

                  <!-- /.product-image -->

  <div class="product-info text-left">
    <h3 class="name"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug ) }}">
        {{ $product->product_name }}
      </a></h3>
    <div class="rating rateit-small"></div>
    <div class="description"></div>

   @if ($product->discount_price == NULL)
<div class="product-price"> <span class="price"> ${{ $product->selling_price }} </span>  </div>
   @else
<div class="product-price"> <span class="price"> ${{ $product->discount_price }} </span> <span class="price-before-discount">$ {{ $product->selling_price }}</span> </div>
   @endif


    <!-- /.product-price -->

  </div>
  <!-- /.product-info -->
  <div class="cart clearfix animate-effect">
    <div class="action">
      <ul class="list-unstyled">
        <li class="add-cart-button btn-group">

         <button class="btn btn-primary icon" type="button" title="Add Cart" data-toggle="modal" data-target="#exampleModal" id="{{ $product->id }}" onclick="productView(this.id)"> <i class="fa fa-shopping-cart"></i> </button>

  <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
</li>



  <button class="btn btn-primary icon" type="button" title="Wishlist" id="{{ $product->id }}" onclick="addToWishList(this.id)"> <i class="fa fa-heart"></i> </button>

        <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
      </ul>
    </div>
    <!-- /.action -->
  </div>
  <!-- /.cart -->
                </div>
                <!-- /.product -->

              </div>
              <!-- /.products -->
            </div>
      <!-- /.item -->
      @endforeach


    </div>
    <!-- /.home-owl-carousel -->
  </section>
  <!-- /.section -->
  <!-- == ==== skip_brand_product_1 PRODUCTS : END ==== === -->











