@extends('user.Appuser')

@section('style')
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('content')

<article>

    <section class="section hero" style="background-image: url('{{ asset('images/hero-banner copy.png') }}');">
      <div class="container">

        <h2 class="h1 hero-title">
            Explore Our <strong>Frigo Tools Collection</strong>
          </h2>

          <p class="hero-text">
            Frigo Tools offers a comprehensive range of products for all your refrigeration needs, from installation to maintenance. Our selection includes everything from Panneau Sandwich to specialized profiles and finishes.
          </p>

          <button class="btn btn-primary">
            <span>Shop Now</span>
            <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
          </button>

      </div>
    </section>





    <!--
      - #PRODUCT
    -->

    <section class="section product">
      <div class="container">

        <h2 class="h2 section-title">Bestselling Refrigeration Products</h2>

        <ul class="product-list">



            @foreach ($products as $product)
            <li class="product-item">
                <div class="product-card" tabindex="0">

                    <figure style="height: 330px; width: 330px;" class="card-banner">
                    <img src="{{ $product->imageUrl }}" width="300" height="300" loading="lazy"
                        alt="Running Sneaker Shoes" class="image-contain">

                    {{-- <div class="card-badge">New</div> --}}

                    <ul class="card-action-list">

                        @if (Auth::guard('user')->check())
                            <li class="card-action-item">
                                <button class="card-action-btn" aria-labelledby="card-label-1">
                                <ion-icon name="cart-outline"></ion-icon>
                                </button>

                                <div class="card-action-tooltip" id="card-label-1">Add to Cart</div>
                            </li>

                            <li class="card-action-item">
                                <form action="{{ route('user.likes',['Product_id'=>$product->id]) }}" method="post">
                                    @csrf
                                    @if (Auth::guard('user')->user()->liked($product->id))
                                        <button class="card-action-btn" aria-labelledby="card-label-2">
                                            <ion-icon name="heart"></ion-icon>
                                        </button>
                                        <div class="card-action-tooltip" id="card-label-2">{{ $product->likesByAny()->count() > 0 ? $product->likesByAny()->count() : '' }} UnLike</div>
                                    @else
                                        <button class="card-action-btn" aria-labelledby="card-label-2">
                                            <ion-icon name="heart-outline"></ion-icon>
                                        </button>
                                        <div class="card-action-tooltip" id="card-label-2">{{ $product->likesByAny()->count() > 0 ? $product->likesByAny()->count() : '' }} like</div>
                                    @endif
                                </form>
                            </li>

                            <li class="card-action-item">
                                <a href="{{ route('home.show',['id' => $product->id]) }}">
                                    <button class="card-action-btn" aria-labelledby="card-label-3">
                                    <ion-icon name="eye-outline"></ion-icon>
                                    </button>

                                    <div class="card-action-tooltip" id="card-label-3">Quick View</div>
                                </a>
                            </li>
                        @else
                            <li class="card-action-item">
                                <a href="{{ route('home.show',['id' => $product->id]) }}">
                                    <button class="card-action-btn" aria-labelledby="card-label-3">
                                    <ion-icon name="eye-outline"></ion-icon>
                                    </button>

                                    <div class="card-action-tooltip" id="card-label-3">Quick View</div>
                                </a>
                            </li>
                        @endif


                    </ul>
                    </figure>

                    <div class="card-content">

                        <h3 class="h3 card-title" style="word-wrap: break-word;">
                            <a>{{ $product->productName }}</a>
                        </h3>
                        <data  style=" display: flex; flex-direction: row; justify-content: center; align-items: center; " class="card-price" value="{{ $product->price }}">
                            ${{ $product->price }}<span style="color: black;font-size: 20px;margin-left: 5px;"> par(m)</span>
                        </data>

                    </div>

                </div>
            </li>
        @endforeach


        </ul>

      </div>
    </section>

    <div class="paginate">

        @if ($products->hasPages())
          <div class="pagination" style="display: flex; justify-content: center; align-items: center; margin-top: 20px;">
            {{-- Previous Button --}}
            @if ($products->onFirstPage())
                <span class="page-link disabled" style="display: inline-block; padding: 10px 15px; margin: 0 5px; border-radius: 4px; text-decoration: none; color: #333; background-color: #f66b5e; border: 1px solid #ddd; transition: background-color 0.3s; pointer-events: none; opacity: 0.6;"><i class="fas fa-chevron-left"></i> Previous</span>
            @else
                <a href="{{ $products->previousPageUrl() }}" class="page-link" style="display: inline-block; padding: 10px 15px; margin: 0 5px; border-radius: 4px; text-decoration: none; color: #333; background-color: #f66b5e; border: 1px solid #ddd; transition: background-color 0.3s;"><i class="fas fa-chevron-left"></i> Previous</a>
            @endif

            <span class="page-info" style="margin: 0 10px;">Page {{ $products->currentPage() }} of {{ $products->lastPage() }}</span>

            {{-- Next Button --}}
            @if ($products->hasMorePages())
                <a href="{{ $products->nextPageUrl() }}" class="page-link" style="display: inline-block; padding: 10px 15px; margin: 0 5px; border-radius: 4px; text-decoration: none; color: #333; background-color: #f66b5e; border: 1px solid #ddd; transition: background-color 0.3s;">Next <i class="fas fa-chevron-right"></i></a>
            @else
                <span class="page-link disabled" style="display: inline-block; padding: 10px 15px; margin: 0 5px; border-radius: 4px; text-decoration: none; color: #333; background-color: #f66b5e; border: 1px solid #ddd; transition: background-color 0.3s; pointer-events: none; opacity: 0.6;">Next <i class="fas fa-chevron-right"></i></span>
            @endif
          </div>
        @endif

      </div>







    {{-- <section class="section special">
      <div class="container">

        <div class="special-banner" style="background-image: url('./assets/images/special-banner.jpg')">
          <h2 class="h3 banner-title">New Trend Edition</h2>

          <a href="#" class="btn btn-link">
            <span>Explore All</span>

            <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
          </a>
        </div>

        <div class="special-product">

          <h2 class="h2 section-title">
            <span class="text">Nike Special</span>

            <span class="line"></span>
          </h2>

          <ul class="has-scrollbar">

            <li class="product-item">
              <div class="product-card" tabindex="0">

                <figure class="card-banner">
                  <img src="./assets/images/product-1.jpg" width="312" height="350" loading="lazy"
                    alt="Running Sneaker Shoes" class="image-contain">

                  <div class="card-badge">New</div>

                  <ul class="card-action-list">

                    <li class="card-action-item">
                      <button class="card-action-btn" aria-labelledby="card-label-1">
                        <ion-icon name="cart-outline"></ion-icon>
                      </button>

                      <div class="card-action-tooltip" id="card-label-1">Add to Cart</div>
                    </li>

                    <li class="card-action-item">
                      <button class="card-action-btn" aria-labelledby="card-label-2">
                        <ion-icon name="heart-outline"></ion-icon>
                      </button>

                      <div class="card-action-tooltip" id="card-label-2">Add to Whishlist</div>
                    </li>

                    <li class="card-action-item">
                      <button class="card-action-btn" aria-labelledby="card-label-3">
                        <ion-icon name="eye-outline"></ion-icon>
                      </button>

                      <div class="card-action-tooltip" id="card-label-3">Quick View</div>
                    </li>

                    <li class="card-action-item">
                      <button class="card-action-btn" aria-labelledby="card-label-4">
                        <ion-icon name="repeat-outline"></ion-icon>
                      </button>

                      <div class="card-action-tooltip" id="card-label-4">Compare</div>
                    </li>

                  </ul>
                </figure>

                <div class="card-content">

                  <div class="card-cat">
                    <a href="#" class="card-cat-link">Men</a> /
                    <a href="#" class="card-cat-link">Women</a>
                  </div>

                  <h3 class="h3 card-title">
                    <a href="#">Running Sneaker Shoes</a>
                  </h3>

                  <data class="card-price" value="180.85">$180.85</data>

                </div>

              </div>
            </li>

            <li class="product-item">
              <div class="product-card" tabindex="0">

                <figure class="card-banner">
                  <img src="./assets/images/product-2.jpg" width="312" height="350" loading="lazy"
                    alt="Leather Mens Slipper" class="image-contain">

                  <ul class="card-action-list">

                    <li class="card-action-item">
                      <button class="card-action-btn" aria-labelledby="card-label-1">
                        <ion-icon name="cart-outline"></ion-icon>
                      </button>

                      <div class="card-action-tooltip" id="card-label-1">Add to Cart</div>
                    </li>

                    <li class="card-action-item">
                      <button class="card-action-btn" aria-labelledby="card-label-2">
                        <ion-icon name="heart-outline"></ion-icon>
                      </button>

                      <div class="card-action-tooltip" id="card-label-2">Add to Whishlist</div>
                    </li>

                    <li class="card-action-item">
                      <button class="card-action-btn" aria-labelledby="card-label-3">
                        <ion-icon name="eye-outline"></ion-icon>
                      </button>

                      <div class="card-action-tooltip" id="card-label-3">Quick View</div>
                    </li>

                    <li class="card-action-item">
                      <button class="card-action-btn" aria-labelledby="card-label-4">
                        <ion-icon name="repeat-outline"></ion-icon>
                      </button>

                      <div class="card-action-tooltip" id="card-label-4">Compare</div>
                    </li>

                  </ul>
                </figure>

                <div class="card-content">

                  <div class="card-cat">
                    <a href="#" class="card-cat-link">Men</a> /
                    <a href="#" class="card-cat-link">Sports</a>
                  </div>

                  <h3 class="h3 card-title">
                    <a href="#">Leather Mens Slipper</a>
                  </h3>

                  <data class="card-price" value="190.85">$190.85</data>

                </div>

              </div>
            </li>

            <li class="product-item">
              <div class="product-card" tabindex="0">

                <figure class="card-banner">
                  <img src="./assets/images/product-3.jpg" width="312" height="350" loading="lazy"
                    alt="Simple Fabric Shoe" class="image-contain">

                  <div class="card-badge">New</div>

                  <ul class="card-action-list">

                    <li class="card-action-item">
                      <button class="card-action-btn" aria-labelledby="card-label-1">
                        <ion-icon name="cart-outline"></ion-icon>
                      </button>

                      <div class="card-action-tooltip" id="card-label-1">Add to Cart</div>
                    </li>

                    <li class="card-action-item">
                      <button class="card-action-btn" aria-labelledby="card-label-2">
                        <ion-icon name="heart-outline"></ion-icon>
                      </button>

                      <div class="card-action-tooltip" id="card-label-2">Add to Whishlist</div>
                    </li>

                    <li class="card-action-item">
                      <button class="card-action-btn" aria-labelledby="card-label-3">
                        <ion-icon name="eye-outline"></ion-icon>
                      </button>

                      <div class="card-action-tooltip" id="card-label-3">Quick View</div>
                    </li>

                    <li class="card-action-item">
                      <button class="card-action-btn" aria-labelledby="card-label-4">
                        <ion-icon name="repeat-outline"></ion-icon>
                      </button>

                      <div class="card-action-tooltip" id="card-label-4">Compare</div>
                    </li>

                  </ul>
                </figure>

                <div class="card-content">

                  <div class="card-cat">
                    <a href="#" class="card-cat-link">Men</a> /
                    <a href="#" class="card-cat-link">Women</a>
                  </div>

                  <h3 class="h3 card-title">
                    <a href="#">Simple Fabric Shoe</a>
                  </h3>

                  <data class="card-price" value="160.85">$160.85</data>

                </div>

              </div>
            </li>

            <li class="product-item">
              <div class="product-card" tabindex="0">

                <figure class="card-banner">
                  <img src="./assets/images/product-4.jpg" width="312" height="350" loading="lazy"
                    alt="Air Jordan 7 Retro " class="image-contain">

                  <div class="card-badge"> -25%</div>

                  <ul class="card-action-list">

                    <li class="card-action-item">
                      <button class="card-action-btn" aria-labelledby="card-label-1">
                        <ion-icon name="cart-outline"></ion-icon>
                      </button>

                      <div class="card-action-tooltip" id="card-label-1">Add to Cart</div>
                    </li>

                    <li class="card-action-item">
                      <button class="card-action-btn" aria-labelledby="card-label-2">
                        <ion-icon name="heart-outline"></ion-icon>
                      </button>

                      <div class="card-action-tooltip" id="card-label-2">Add to Whishlist</div>
                    </li>

                    <li class="card-action-item">
                      <button class="card-action-btn" aria-labelledby="card-label-3">
                        <ion-icon name="eye-outline"></ion-icon>
                      </button>

                      <div class="card-action-tooltip" id="card-label-3">Quick View</div>
                    </li>

                    <li class="card-action-item">
                      <button class="card-action-btn" aria-labelledby="card-label-4">
                        <ion-icon name="repeat-outline"></ion-icon>
                      </button>

                      <div class="card-action-tooltip" id="card-label-4">Compare</div>
                    </li>

                  </ul>
                </figure>

                <div class="card-content">

                  <div class="card-cat">
                    <a href="#" class="card-cat-link">Men</a> /
                    <a href="#" class="card-cat-link">Sports</a>
                  </div>

                  <h3 class="h3 card-title">
                    <a href="#">Air Jordan 7 Retro </a>
                  </h3>

                  <data class="card-price" value="170.85">$170.85 <del>$200.21</del></data>

                </div>

              </div>
            </li>

          </ul>

        </div>

      </div>
    </section> --}}



    <!--
      - #SERVICE
    -->

    <section class="section service">
      <div class="container">

        <ul class="service-list">

          <li class="service-item">
            <div class="service-card">

              <div class="card-icon">
                <img src="{{ asset('images/service-1.png') }}" width="53" height="28" loading="lazy" alt="Service icon">
              </div>

              <div>
                <h3 class="h4 card-title">Free Shiping</h3>

                <p class="card-text">
                  All orders over <span>$150</span>
                </p>
              </div>

            </div>
          </li>

          <li class="service-item">
            <div class="service-card">

              <div class="card-icon">
                <img src="{{ asset('images/service-2.png') }}" width="43" height="35" loading="lazy" alt="Service icon">
              </div>

              <div>
                <h3 class="h4 card-title">Quick Payment</h3>

                <p class="card-text">
                  100% secure payment
                </p>
              </div>

            </div>
          </li>

          <li class="service-item">
            <div class="service-card">

              <div class="card-icon">
                <img src="{{ asset('images/service-3.png') }}" width="40" height="40" loading="lazy" alt="Service icon">
              </div>

              <div>
                <h3 class="h4 card-title">Free Returns</h3>

                <p class="card-text">
                  Money back in 30 days
                </p>
              </div>

            </div>
          </li>

          <li class="service-item">
            <div class="service-card">

              <div class="card-icon">
                <img src="{{ asset('images/service-4.png') }}" width="40" height="40" loading="lazy" alt="Service icon">
              </div>

              <div>
                <h3 class="h4 card-title">24/7 Support</h3>

                <p class="card-text">
                  Get Quick Support
                </p>
              </div>

            </div>
          </li>

        </ul>

      </div>
    </section>







  </article>

@endsection
