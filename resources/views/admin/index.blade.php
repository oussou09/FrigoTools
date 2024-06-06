@extends('admin.AppAdmin')
@section('style')
    <link rel="stylesheet" href="{{ asset('css/admin/create.css') }}">
@endsection
@section('content')







  <main>
    <article>

      <section class="section product">
        <div class="container">

          <h2 class="h2 section-title">Bestsellers Products</h2>

          <ul class="product-list">

            @if ($products->currentPage() === 1)
                <li class="product-item">
                    <a href="{{ route('admin.create') }}">
                        <div class="product-card" tabindex="0">
                            <figure class="card-banner">
                                <img src="{{ asset('images/noun-add-688807.svg') }}" style="height: 300px;width: 290px;" loading="lazy"
                                alt="Running Sneaker Shoes" class="image-contain">
                            </figure>
                            <div class="card-content">
                                <h3 class="h3 card-title">
                                    <p>New Product</p>
                                </h3>
                            </div>
                        </div>
                    </a>
                </li>
            @endif


            {{-- loop foreach products --}}

            @foreach ($products as $product)
                <li class="product-item">
                    <div class="product-card" tabindex="0">

                        <figure class="card-banner">
                        <img src="{{ $product->imageUrl }}" width="312" height="350" loading="lazy"
                            alt="Running Sneaker Shoes" class="image-contain">

                        {{-- <div class="card-badge">New</div> --}}

                        <ul class="card-action-list">

                            <li class="card-action-item">
                                <a href="{{ route('admin.edit',['id' => $product->id ]) }}">
                                    <button class="card-action-btn" aria-labelledby="card-label-1">
                                        <ion-icon name="create-outline"></ion-icon>
                                    </button>
                                    <div class="card-action-tooltip" id="card-label-1">Edit</div>
                                </a>
                            </li>

                            <li class="card-action-item">
                                <form action="{{ route('admin.deletereq', ['id' => $product->id]) }}" method="POST">
                                    @csrf
                                    <button onclick="return confirm('Are you sure you want to delete this product?')"
                                         class="card-action-btn" aria-labelledby="card-label-2">
                                        <ion-icon name="trash-outline"></ion-icon>
                                    </button>
                                    <div class="card-action-tooltip" id="card-label-2">Delete</div>
                                </form>
                            </li>

                        </ul>
                        </figure>

                        <div class="card-content">

                            <h3 class="h3 card-title">
                                <a>{{ $product->productName }}</a>
                            </h3>
                            <data style=" display: flex; flex-direction: row; justify-content: center; align-items: center; " class="card-price" value="{{ $product->price }}">
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
        <div class="pagination" style="display: flex; justify-content: center; align-items: center; margin-bottom: 50px;">
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

    </article>
  </main>






  <!--
    - #GO TO TOP
  -->

  <a href="#top" class="go-top-btn" data-go-top>
    <ion-icon name="arrow-up-outline"></ion-icon>
  </a>

  <!--
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

  @endsection

